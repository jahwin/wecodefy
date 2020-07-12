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
        'return' => 'HomeController@index',
    ],
    [
        'path' => '/api',
        "children" => [
            [
                'path' => '/user',
                'method' => 'GET',
                'folder' => 'api',
                'return' => 'HomeController@index',
            ],
        ],

    ],
    [
        'path' => '*',
        'folder' => 'site',
        'return' => 'PagesController@index',
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
        'return' => 'HomeController@index',
    ],
    'EXCEPT' => ['/api'],
];

// Init routing
Router::init($routes, $route_condition);
