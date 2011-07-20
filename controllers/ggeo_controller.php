<?php

/**
 * Description of nodeattachments_controller
 *
 * @author Duro
 */
class GgeoController extends GgeoAppController {
        /**
         * Controller Name
         *
         * @var string
         */
        public $name ='Ggeo';

        /**
         * Used models
         *
         * @var array
         */
        public $uses = array(
            'Setting',
            'Node'
        );

        /**
         * Get relatives via request action
         *
         * @param array $node
         * @param string $node_type 'node' is default
         * @param float $distance
         * @return array
         */
        public function requestRelatives($node, $show_type = 'node', $distance = 10) {

                $query = array(
                    'relatives' => array(
                        'from_lat' => $node['GgeoGeo']['lat'],
                        'from_lon' => $node['GgeoGeo']['lon'],
                        'distance' => $distance
                    ),
                    'conditions' => array(
                        'Node.id <>' => $node['Node']['id'],
                        'Node.status' => 1),
                    'cache' => array(
                       'name' => 'node_relatives_'.$this->Croogo->roleId.'_'.$show_type.'_'.$node['Node']['slug'],
                       'config' => 'nodes_view',
                        ),
                );
                $this->Node->type = $show_type;
                $res = $this->Node->find('all', $query);
                if (count($res) > 0) {
                        return $res;
                }

                return false;

        }



}
?>
