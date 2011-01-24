<?php
/**
 * Ggeo helper
 *
 *
 * @package  Croogo
 * @author Juraj Jancuska <jjancuska@gmail.com>
 */
class GgeoHelper extends AppHelper {
        
        /**
         * Used helpers
         *
         * @var array
         */
        public $helpers = array(
            'Html',
            'Layout'
        );

        /**
         * Link google map
         *
         * @return void
         */
        public function loadGMap() {

                $key = Configure::read('Ggeo.gmap_api_key');
                return $this->Html->script(
                        'http://maps.google.com/maps?file=api&v=2&key='.$key.'&sensor=false');

        }

        /**
         * Add map to view
         *
         * @return void
         */
        public function afterSetNode() {

                $this->Layout->setNodeField('body',
                        $this->Layout->node('body') . $this->Layout->View->element('simple_map', array('node' => $this->Layout->node, 'plugin' => 'ggeo')));

        }

}
?>