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

}
?>