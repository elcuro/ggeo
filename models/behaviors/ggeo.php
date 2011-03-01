<?php
/**
* Ggeo behavior
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class GgeoBehavior extends ModelBehavior {

        /**
         * Temporary attribute for relatives
         * beforeFind save Node.id => array('distance' => n)
         * afterFind sort result by this attribute
         *
         * @var array $__relatives
         */
        private $__relatives = false;

        /**
         * Before find callback
         *
         * @param object $model
         * @param array $query
         * @return array $query
         */
        public function beforeFind(&$model, $query) {

                $model->bindModel(array(
                    'hasOne' => array('GgeoGeo')
                ));
                
                if (isset($query['relatives'])) {
                        $query = $this->__queryRelatives($model, $query);
                        
                }

                return $query;

        }

        /**
         * After find callback
         *
         * @param object $model
         * @param array $results
         * @param boolean $primary
         * @return array
         */
         public function  afterFind(&$model, $results, $primary) {

                if (is_array($this->__relatives)) {
                        $results = $this->__mergeRelatives($model, $results);
                        $this->__relatives = false;
                }

                return $results;
         }

        /**
         * after save
         *
         * @param object $model
         * @return void
         */
        public function  afterSave(&$model, $created) {

                if (isset($model->data['GgeoGeo'])) {
                        // save geo
                        if (is_numeric($model->data['GgeoGeo']['lat']) && is_numeric($model->data['GgeoGeo']['lon'])) {
                                $model->data['GgeoGeo']['node_id'] = $model->id;
                                $model->GgeoGeo->create();
                                $model->GgeoGeo->save($model->data['GgeoGeo']);
                        } 
                        //delete geo
                        if (($model->data['GgeoGeo']['lat'] == '') && ($model->data['GgeoGeo']['lon'] == '') && is_numeric($model->data['GgeoGeo']['id'])) {
                                $model->GgeoGeo->id = $model->data['GgeoGeo']['id'];
                                $model->GgeoGeo->delete();
                        }

                }
                
        }

        /**
         * Find by distance
         *
         * @param array $var
         * @return array
         */
        private function __queryRelatives(&$model, $query = array()) {

                $default_lat_lon = explode(',', Configure::read('Ggeo.default_lat_lon'));
                $_query = array(
                    'relatives' => array(
                        'from_lat' => $default_lat_lon[0],
                        'from_lon' => $default_lat_lon[1],
                        'distance' => 10
                    )
                );
                $query = Set::merge($_query, $query);

                // haversine formula
                $from_lat = $query['relatives']['from_lat'];
                $from_lon = $query['relatives']['from_lon'];
                $distance  = $query['relatives']['distance'];
                $q = "SELECT node_id, (((ACOS(SIN(".$from_lat." * PI() / 180) * SIN(lat * PI() / 180) + COS(".$from_lat." * PI() / 180) * COS(lat * PI() / 180) * COS((".$from_lon." - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) * 1.61) AS distance
                        FROM ggeo_geos HAVING distance <= '".$distance."' ORDER BY distance ASC LIMIT 0,20";
                $res = $model->query($q);

                $this->__relatives = array();
                $node_query = array();
                foreach ($res as $geo) {
                        $this->__relatives[$geo['ggeo_geos']['node_id']] = $geo[0];
                        $node_query[] = array('Node.id' => $geo['ggeo_geos']['node_id']);
                }
                $query['conditions'] = array(
                    'AND' => array(
                        array('OR' => $node_query),
                        $query['conditions']
                    )
                );
                return $query;

        }

        /**
         * Merge relatives
         *
         * @param object $model
         * @param array $result
         * @return array
         */
        private function __mergeRelatives(&$model, $results) {

                if (count($results) > 0) {
                        $_result = array();
                        foreach ($results as $i => $node) {
                                $results[$i]['Distance'] = $this->__relatives[$node['Node']['id']]['distance'];
                        }
                }
                return $results;
        }

}
?>