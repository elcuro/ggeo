<?php
        Croogo::hookRoutes('Ggeo');

        Croogo::hookBehavior('Node', 'Ggeo.Ggeo');
        Croogo::hookHelper('Nodes', 'Ggeo.Ggeo');
        Croogo::hookComponent('Nodes', 'Ggeo.Ggeo');

        Croogo::hookAdminMenu('Ggeo');
        Croogo::hookAdminTab('Nodes/admin_edit', 'Geos', 'ggeo.admin_tab_node');
        Croogo::hookAdminTab('Nodes/admin_add', 'Geos', 'ggeo.admin_tab_node');

        Cache::config('ggeo', array(
            'engine' => 'File',
            'duration'=> '+1 week',
            'path' => CACHE.'queries',
        ));
?>