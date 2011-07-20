<?php
$request_path = array(
    'plugin' => 'ggeo',
    'controller' => 'ggeo',
    'action' => 'requestRelatives');
if (!isset($distance)) $distance = 10;
if (!isset($node_type)) $node_type = 'node';

if (isset($node)) {
        if ($relatives = $this->requestAction($request_path, array('pass' => array($node, $node_type, $distance)))) {
                $nodes_output = '';
                foreach ($relatives as $node) {
                        $node_link = $this->Html->link($node['Node']['title'], $node['Node']['url']);
                        $node_link .= " [[".round($node['Distance'], 1)." km]]";
                        $nodes_output .= $this->Html->tag('li', $node_link);
                }
                if (!empty($nodes_output)) {
                        echo  $this->Html->tag('ul',$nodes_output);
                }
        }
}
?>
