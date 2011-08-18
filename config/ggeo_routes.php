<?php
    CroogoRouter::connect('/near/:slug/*', array('plugin' => 'ggeo', 'controller' => 'ggeo_geos', 'action' => 'near'));
    CroogoRouter::connect('/:termslug/near/:slug/*', array('plugin' => 'ggeo', 'controller' => 'ggeo_geos', 'action' => 'near'));
?>