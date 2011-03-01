<?php
/**
* Ggeo component
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2011 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class GgeoComponent extends Object {

        /**
         * beforeRender callback
         *
         * @param object $controller
         * @return void
         */
        public function beforeRender(&$controller) {
                
                $this->controller =& $controller;
                $this->controller->set('relatives_for_layout', $this->relatives());
        }

        /**
         * get realatives within distance
         *
         * @param float $from_lat
         * @param float $from_lon
         * @param float $distance
         * @return array
         */
        public function relatives() {

                if (isset($this->controller->viewVars['node']['GgeoGeo']['id'])) {
                        $node = $this->controller->viewVars['node'];
                        $query = array(
                            'relatives' => array(
                                'from_lat' => $node['GgeoGeo']['lat'],
                                'from_lon' => $node['GgeoGeo']['lon']
                            ),
                            'conditions' => array('Node.id <>' => $node['Node']['id'])
                        );
                        $res = $this->controller->Node->find('all', $query);
                        if (count($res) > 0) {
                                return $res;
                        }
                }
                return false;
        }
        
}
