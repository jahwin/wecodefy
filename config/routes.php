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
        'return' => 'Home@welcome',
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
 * -----
 * This condition will be good for Vue,Angular,React
 * -----
 * Let that framework to handle routes
 * ----
 * You can enable or disable this condition
 * ------------------------------
 */
$route_condition = [
    'ENABLED' => false,
    'ALL_TO' => [
        'folder' => 'site',
        'return' => 'Home@welcome',
    ],
    'EXCEPT' => ['/api'],
];

// Init routing
Router::init($routes, $route_condition);
