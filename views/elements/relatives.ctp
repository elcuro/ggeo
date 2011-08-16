<?php
if (is_array($this->viewVars['relatives_for_layout'])) {
        $nodes_output = '';
        foreach ($this->viewVars['relatives_for_layout'] as $node) {
                $node_link = $this->Html->link($node['Node']['title'], $node['Node']['url']);
                $node_link .= " [".round($node['Distance'], 1)." km]";
                $nodes_output .= $this->Html->tag('li', $node_link);
        }
        if (!empty($nodes_output)) {
                echo  $this->Html->tag('ul',$nodes_output);
        }
}
?>
