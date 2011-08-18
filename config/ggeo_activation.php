<?php
/**
 * Ggeo plugin activation
 *
 * Description
 *
 * @package  Croogo
 * @author Juraj Jancuska <jjancuska@gmail.com>
 */
class GgeoActivation {
        
        /**
         * Schema directory
         *
         * @var string
         */
        private $SchemaDir;

        /**
         * DB connection
         *
         * @var object
         */
        private $db;

        /**
         * Constructor
         *
         * @return vodi
         */
         public function  __construct() {

                 $this->SchemaDir = APP.'plugins'.DS.'ggeo'.DS.'config'.DS.'schemas';
                 $this->db =& ConnectionManager::getDataSource('default');

        }

        /**
         * Before onActivation
         *
         * @param object $controller
         * @return boolean
         */
        public function beforeActivation(&$controller) {

                App::Import('CakeSchema');
                $CakeSchema = new CakeSchema();

                // list schema files from config/schema dir
                if ($cake_schema_files = $this->_listSchemas($this->SchemaDir)) {

                        // create table for each schema (if not exists)
                        foreach ($cake_schema_files as $schema_file) {
                                $schema_name = substr($schema_file, 0, -4);
                                $schema_class_name = Inflector::camelize($schema_name).'Schema';
                                $table_name = $schema_name;

                                if (!in_array($table_name, $this->db->_sources)) {
                                         include_once($this->SchemaDir.DS.$schema_file);
                                         $ActiveSchema = new $schema_class_name;
                                         if(!$this->db->execute($this->db->createSchema($ActiveSchema, $table_name))) {
                                                 return false;
                                         }
                                }

                        }
                }

                return true;

        }

        /**
         * Activation of plugin,
         * called only if beforeActivation return true
         *
         * @param object $controller
         * @return void
         */
        public function onActivation(&$controller) {

                // set default key for localhost
                $key = 'ABQIAAAAo-SbMn-1PmPtomz3ko2vGRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxRVIvebD8GqI3rgvXuX4mheBSsQzw';
                $controller->Setting->write('Ggeo.gmap_api_key', $key, array(
                    'editable' => 1, 'description' => __('Google maps API key', true))
                );
                $controller->Setting->write('Ggeo.default_lat_lon', '46.785016,8.22876', array(
                    'editable' => 1, 'description' => __('Default comma separated latitude,longitude', true))
                );

                // simple map block
                if (!$controller->Block->save(array(
                        'region_id' => 4, // defalt "right" region
                        'title' => 'Map',
                        'alias' => 'ggeo_map',
                        'body' => '[element:simple_map plugin="Ggeo"]',
                        'show_title' => 0,
                        'status' => 1
                        ))) return false;
                // relatives block
                $controller->Block->create();
                if (!$controller->Block->save(array(
                        'region_id' => 4, // defalt "right" region
                        'title' => 'Relatives',
                        'alias' => 'ggeo_relatives',
                        'body' => '[element:relatives plugin="Ggeo"]',
                        'show_title' => 0,
                        'status' => 1
                        ))) return false;

                // accos
                $controller->Croogo->addAco('GgeoGeos/near', array('registered', 'public'));

        }

        /**
         * Before onDeactivation
         *
         * @param object $controller
         * @return boolean
         */
        public function beforeDeactivation(&$controller) {

                // list schema files from config/schema dir
                if ($cake_schema_files = $this->_listSchemas($this->SchemaDir)) {

                        // delete tables for each schema
                        foreach ($cake_schema_files as $schema_file) {
                                $schema_name = substr($schema_file, 0, -4);
                                $table_name = $schema_name;
                                /*if(!$this->db->execute('DROP TABLE '.$table_name)) {
                                        return false;
                                }*/
                        }
                }

                return true;

        }

        /**
         * Deactivation of plugin,
         * called only if beforeActivation return true
         *
         * @param object $controller
         * @return void
         */
        public function onDeactivation(&$controller) {

                // remove aco
                $controller->Croogo->removeAco('GgeoGeos');
                // remove ggeomap block
                $controller->Block->deleteAll(array('Block.alias' => 'ggeo_map'));
                // remove ggeo_relatives block
                $controller->Block->deleteAll(array('Block.alias' => 'ggeo_relatives'));
                // remove config
                $controller->Setting->deleteKey('Ggeo');
        }

        /**
         * List schemas
         *
         * @return array
         */
        private function _listSchemas($dir = false) {

                if (!$dir) return false;

                $cake_schema_files = array();
                if ($h = opendir($dir)) {
                        while (false !== ($file = readdir($h))) {
                                if (($file != ".") && ($file != "..")) {
                                        $cake_schema_files[] = $file;
                                }
                        }
                } else {
                        return false;
                }

                return $cake_schema_files;

        }
}
?>