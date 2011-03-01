<?php
if ($relatives = $this->Ggeo->relatives()) {
        echo $this->Html->tag('h3', __('Relatives', true));
        $nodes_output = '';
        foreach ($relatives as $node) {
                $node_link = $this->Html->link($node['Node']['title'], $node['Node']['url']);
                $node_link .= " (".round($node['Distance'], 1)." km)";
                $nodes_output .= $this->Html->tag('li', $node_link);
        }
        if (!empty($nodes_output)) {
                echo  $this->Html->tag('ul',$nodes_output);
        }
}
?>
