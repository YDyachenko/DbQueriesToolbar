<?php

return array (
    'view_manager' => array (
        'template_map' => array (
            'zend-developer-tools/toolbar/db-queries'
            => __DIR__ . '/../view/zend-developer-tools/toolbar/db-queries.phtml',
        ),
    ),
    'zenddevelopertools' => array (
        'profiler' => array (
            'collectors' => array (
                'dbqueries.toolbar' => 'dbqueries.toolbar',
            ),
        ),
        'toolbar'  => array (
            'entries' => array (
                'dbqueries.toolbar' => 'zend-developer-tools/toolbar/db-queries',
            ),
        ),
    ),
);
