<?php

/**
 * Description of nodeattachments_controller
 *
 * @author Duro
 */
class GgeoGeosController extends GgeoAppController {
        /**
         * Controller Name
         *
         * @var string
         */
        public $name ='GgeoGeos';

        /**
         * All nodes nar node
         *
         * @param string $slug
         * @return void
         */
        public function nodesNear() {

                $node = false;
                if (isset($this->params['named']['slug']) && ($this->params['named']['slug'] <> '')) {
                        $node = $this->Node->find('first', array(
                            'conditions' => array(
                                'Node.slug' => $this->params['named']['slug'],
                                'Node.status' => 1,
                                'OR' => array(
                                    'Node.visibility_roles' => '',
                                    'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
                                ),
                            ),
                            'contain' => array(
                                'Meta',
                                'Taxonomy' => array(
                                    'Term',
                                    'Vocabulary',
                                ),
                                'User',
                            ),
                            'cache' => array(
                                'name' => 'node_' . $this->Croogo->roleId . '_' . $this->params['named']['slug'],
                                'config' => 'nodes_view',
                        )));
                        if (!isset($node['GgeoGeo']['lat'])) {
                                $node = false;
                        }
                }
                if (!$node) {
                        $this->Session->setFlash(__d('ggeo', 'Invalid node', true), 'default', array('class' => 'error'));
                        $this->redirect('/');
                } 

                $distance = 10;
                if (isset($this->params['named']['distance']) && is_numeric($this->params['named']['distance'])) {
                        $distance = $this->params['named']['distance'];
                }
                $options['relatives'] = array(
                    'from_lat' => $node['GgeoGeo']['lat'],
                    'from_lon' => $node['GgeoGeo']['lon'],
                    'distance' => $distance
                );

                $options['conditions'] = array(
                    'Node.id <>' => $node['Node']['id'],
                    'Node.status' => 1,
                    'OR' => array(
                        'Node.visibility_roles' => '',
                        'Node.visibility_roles LIKE' => '%"' . $this->Croogo->roleId . '"%',
                    )
                );
                $options['cache'] = array(
                    'prefix' => 'nodes_plugin_ggeo_nodes_near',
                    'config' => 'nodes_index',
                );

                $nodes = $this->Node->find('all', $options);
                $this->set('nodes', $nodes);
                
        }

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
