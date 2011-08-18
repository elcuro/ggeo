<div class="nodes">
        <h2><?php echo $title_for_layout; ?></h2>

        <?php
        if (count($nodes) == 0) {
                __d('geo', 'No items found.');
        } 
        ?>

        <?php
        foreach ($nodes AS $node) {
                $this->Layout->setNode($node);
        ?>
                <div id="node-<?php echo $this->Layout->node('id'); ?>" class="node node-type-<?php echo $this->Layout->node('type'); ?>">
                        <h2>
                        <?php echo $html->link($this->Layout->node('title'), $this->Layout->node('url')); ?>
                        , <?php echo __d('geo', 'distance', true).' '.round($this->Layout->node('distance'), 1);?> km
                </h2>
                <?php
                        echo $this->Layout->nodeInfo();
                        echo $this->Layout->nodeBody();
                        echo $this->Layout->nodeMoreInfo();
                ?>
                </div>
        <?php
                }
        ?>

</div>