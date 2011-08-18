<?php
App::import('Model', 'Node');

class GgeoGeoTestCase extends CakeTestCase {

        public $fixtures = array(
            'aco',
            'aro',
            'aros_aco',
            'block',
            'comment',
            'contact',
            'i18n',
            'language',
            'link',
            'menu',
            'message',
            'meta',
            'plugin.ggeo.node',
            'plugin.ggeo.nodes_taxonomy',
            'region',
            'role',
            'setting',
            'taxonomy',
            'term',
            'type',
            'types_vocabulary',
            'user',
            'vocabulary',
            'plugin.ggeo.ggeo_geo'
        );


        public function startTest() {
                
                $this->Node = & ClassRegistry::init('Node');
        }

        
        public function testAfterDelete() {

                $this->Node->delete(2);
                $this->assertFalse($this->Node->GgeoGeo->findById(1));
        }


        public function endTest() {
        
                unset($this->Node);
                ClassRegistry::flush();
        }

}

?>