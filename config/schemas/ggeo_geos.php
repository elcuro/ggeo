<?php

class GgeoGeosSchema extends CakeSchema {

        /**
         * Schema name
         *
         * @var string
         */
        public $name = 'GgeoGeos';

        /**
         * CakePHP schema
         *
         * @var array
         */
        public $ggeo_geos = array(
            'id' => array('type' => 'integer', 'null' => false, 'lenght' => 11, 'key' => 'primary'),
            'node_id' => array('type' => 'integer', 'null' => false, 'lenght' => 11),
            'lat' => array('type' => 'string', 'null' => false),
            'lon' => array('type' => 'string', 'null' => false),
            'radius' => array('type' => 'float', 'null' => true, 'default' => 1),
            'created' => array('type' => 'timestamp', 'null' => false, 'length' => NULL),
            'updated' => array('type' => 'timestamp', 'null' => false, 'length' => NULL),
            'tableParameters' => array('charset' => 'utf8', 'engine' => 'MyISAM')
        );

        /**
         * Before callback
         *
         * @param array $event
         * @return void
         */
        public function before($event = array()) {

        }

        /**
         * After callback
         *
         * @param array $event
         * @return void
         */
        public function after($event = array()) {

        }

}

?>