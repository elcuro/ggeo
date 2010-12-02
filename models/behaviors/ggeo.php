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

                return $query;

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

}
?>