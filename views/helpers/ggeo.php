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
         * map function
         * return data for element
         *
         * @param array $options
         * @return void
         */
        public function map($options) {

                if (isset($this->Layout->View->viewVars['node']['GgeoGeo']['id'])) {
                        $node = $this->Layout->View->viewVars['node'];
                        $_options = array(
                            'mapType' => 'G_HYBRID_MAP',
                            'tagAttributes' => array(
                                'id' => 'ggeo-map-'.$node['GgeoGeo']['id'],
                                'style' => 'width:275px;height:275px'
                            ));
                        $options = array_merge($_options, $options);
                        return array(
                            'options' => $options,
                            'node' => $this->Layout->View->viewVars['node']);
                }

                return FALSE;
        }

}
?>