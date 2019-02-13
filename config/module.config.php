<?php

return  [
    'view_manager' => [
        'template_map' => [
            'zend-developer-tools/toolbar/db-queries'
            => __DIR__ . '/../view/zend-developer-tools/toolbar/db-queries.phtml',
        ],
    ],
    'zenddevelopertools' => [
        'profiler' => [
            'collectors' => [
                'dbqueries.toolbar' => 'dbqueries.toolbar',
            ],
        ],
        'toolbar'  => [
            'entries' => [
                'dbqueries.toolbar' => 'zend-developer-tools/toolbar/db-queries',
            ],
        ],
    ],
];
