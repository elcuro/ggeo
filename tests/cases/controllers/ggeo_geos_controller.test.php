<?php

App::import('Controller', 'Ggeo.GgeoGeos');

class TestGgeoGeosController extends GgeoGeosController {

        public $name = 'GgeoGeos';
        public $autoRender = false;
        public $testView = false;

        public function redirect($url, $status = null, $exit = true) {
                $this->redirectUrl = $url;
        }

        public function render($action = null, $layout = null, $file = null) {
                if (!$this->testView) {
                        $this->renderedAction = $action;
                } else {
                        return parent::render($action, $layout, $file);
                }
        }

        public function _stop($status = 0) {
                $this->stopped = $status;
        }

        public function __securityError() {
                
        }

}


class GgeoGeosControllerTestCase extends CakeTestCase {

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
                
                $this->GgeoGeos = new TestGgeoGeosController();
                $this->GgeoGeos->constructClasses();
                $this->GgeoGeos->params['named'] = array();
                $this->GgeoGeos->params['controller'] = 'ggeo_geos';
                $this->GgeoGeos->params['pass'] = array();
                $this->GgeoGeos->params['named'] = array();                
        }


        public function initNodesNearBySlug($slug = false) {

                $this->GgeoGeos->params['action'] = 'nodes_near';
                $this->GgeoGeos->params['url']['url'] = 'ggeo/ggeo_geos/nodesNear';
                $this->GgeoGeos->params['named']['slug'] = $slug;
                $this->GgeoGeos->Component->initialize($this->GgeoGeos);
                $this->GgeoGeos->Session->write('Auth.User', array(
                    'id' => 1,
                    'username' => 'admin'
                ));
        }

        
        public function testNodesNearWithoutSlug() {

                $this->initNodesNearBySlug(false);

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual($this->GgeoGeos->redirectUrl, '/');
        }


        public function testNodesNearWithWrongSlug() {

                $this->initNodesNearBySlug('xxxx');

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual($this->GgeoGeos->redirectUrl, '/');
        }


        public function testNodesNearWithNodeWithoutGeo() {

                $this->initNodesNearBySlug('hello-world');

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual($this->GgeoGeos->redirectUrl, '/');
        }
        
        
        public function testnear() {

                $this->initNodesNearBySlug('point-1');
                
                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual(2, count($this->GgeoGeos->viewVars['nodes']));
                $this->assertEqual(55, $this->GgeoGeos->viewVars['nodes'][0]['Node']['id']);
        }


        public function testNodesNearCustomDistance() {

                $this->initNodesNearBySlug('point-1');
                $this->GgeoGeos->params['named']['distance'] = 500;

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual(4, count($this->GgeoGeos->viewVars['nodes']));
                $this->assertEqual(55, $this->GgeoGeos->viewVars['nodes'][0]['Node']['id']);
        }


        public function testNodesNearFilterType() {

                $this->initNodesNearBySlug('point-1');
                $this->GgeoGeos->params['named']['distance'] = 500;
                $this->GgeoGeos->params['named']['type'] = 'page';

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual(1, count($this->GgeoGeos->viewVars['nodes']));
                $this->assertEqual(2, $this->GgeoGeos->viewVars['nodes'][0]['Node']['id']);
        }


        public function testNodesNearFilterTerm() {

                $this->initNodesNearBySlug('point-1');
                $this->GgeoGeos->params['named']['distance'] = 50;
                $this->GgeoGeos->params['named']['termslug'] = 'uncategorized';

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual(2, count($this->GgeoGeos->viewVars['nodes']));
                $this->assertEqual(53, $this->GgeoGeos->viewVars['nodes'][0]['Node']['id']);
        }


        public function testNodesNearFilterInvalidTerm() {

                $this->initNodesNearBySlug('point-1');
                $this->GgeoGeos->params['named']['distance'] = 50;
                $this->GgeoGeos->params['named']['termslug'] = 'dfsdfssads';

                $this->GgeoGeos->beforeFilter();
                $this->GgeoGeos->Component->startup($this->GgeoGeos);
                $this->GgeoGeos->near();

                $this->assertEqual($this->GgeoGeos->redirectUrl, '/');
        }


        public function endTest() {
                $this->GgeoGeos->Session->destroy();
                unset($this->GgeoGeos);
                ClassRegistry::flush();
        }

}

?>