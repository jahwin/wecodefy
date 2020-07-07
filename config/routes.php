<?php
use system\library\Router;

/* -----------------------------
 * This is router array, please don't change any key just add values
 * -----------------------------
 */
$routes = [
    [
        'path' => '/',
        'method' => 'GET',
        'folder' => 'site',
        'middleware' => 'web',
        'return' => 'home@welcome',
    ],
    [
        'path' => '/api',
        "children" => [
            [
                'path' => '/user',
                'method' => 'GET',
                'folder' => 'api',
                'return' => 'home@welcome',
            ],
        ],

    ],
    [
        'path' => '*',
        'method' => 'GET',
        'folder' => 'site',
        'return' => 'Page@notFound',
    ],
];

/* -----------------------------
 * This is condition array, please don't change any key just add values
 * This will be user if you want to redirect all route to the same controller function
 * ------------------------------
 */
$route_condition = [
    'ENABLED' => false,
    'ALL_TO' => function () {
        return array(
            'folder' => 'site',
            'return' => 'home@welcome',
        );
    },
    'EXEPT' => ['/api'],
];

// Init routing , condition valiable is optional
Router::init($routes, $route_condition);
