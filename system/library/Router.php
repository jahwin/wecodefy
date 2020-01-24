<?php

namespace system\library;

use Nette\Http\Response;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;
use system\dev\exec\errorsExec;



/**
 * @desc this class will hold functions for routing
 * @author Abe Jahwin
 */

class Router extends SimpleRouter
{

    /**
     * @desc Allow init routing
     * @param $routes - Array of routes
     */
    public static function init($routes)
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (isContain($url, '/api')) {
            header('Access-Control-Allow-Headers: Content-type');
            header('Content-type: application/json');
        }
        // Load middleware classes from file
        $middleware = null;
        require 'config/middleware.php';
        // All routes
        foreach ($routes as $router) {
            // Check if there are children routes
            if (isset($router['children'])) {
                // Check Auth for group
                if (isset($router['middleware'])) {
                    if (isset($middleware[$router['middleware']])) {
                        $children_routers = $router['children'];
                        // Group routing
                        parent::group([
                            'prefix' => $router['path'],
                            'middleware' => $middleware[$router['middleware']],
                        ], function () use ($children_routers) {
                            // All children routing
                            foreach ($children_routers as $children_router) {
                                // Check auth
                                if (isset($children_router['middleware'])) {
                                    if (isset($middleware[$children_router['middleware']])) {
                                        // Load responce and check method
                                        Router::methodIntegration($children_router);
                                    } else {
                                        $error = array(
                                            'Type' => 'Middleware not found',
                                            'Message' => 'Middleware  with key <b>' . $children_router['middleware'] . '</b> not found ',
                                            'Dir' => 'config/middleware.php',
                                            'Code' => '0006',
                                        );
                                        errorsExec::show($error);
                                    }
                                } else {
                                    Router::methodIntegration($children_router);
                                }

                            }
                        });

                    } else {
                        $error = array(
                            'Type' => 'Middleware not found',
                            'Message' => 'Middleware  with key <b>' . $router['middleware'] . '</b> not found ',
                            'Dir' => 'config/middleware.php',
                            'Code' => '0006',
                        );
                        errorsExec::show($error);
                    }
                } else {
                    // No auth on group
                    $children_routers = $router['children'];
                    //Group routing
                    parent::group([
                        'prefix' => $router['path']], function () use ($children_routers) {
                        // Get a list of middleware
                        $middleware = null;
                        require 'config/middleware.php';
                        // Load children routes
                        foreach ($children_routers as $children_router) {
                            //Auth routes
                            if (isset($children_router['middleware'])) {
                                if (isset($middleware[$children_router['middleware']])) {
                                    // Load responce and check method
                                    Router::methodIntegration($children_router);
                                } else {
                                    $error = array(
                                        'Type' => 'Middleware not found',
                                        'Message' => 'Middleware  with key <b>' . $children_router['middleware'] . '</b> not found ',
                                        'Dir' => 'config/middleware.php',
                                        'Code' => '0006',
                                    );
                                    errorsExec::show($error);
                                }
                            } else {
                                // No Auth for route
                                Router::methodIntegration($children_router);
                            }

                        }
                    });
                }
            } else {
                // Load responce and check method for single route
                Router::methodIntegration($router);
            }
        }
        // Allow to start routing
        parent::start();
    }
    /**
     * @desc Allow to add method
     * @param $routes - Array of routes
     */
    public static function methodIntegration($router)
    {
        if (!url()->contains('/dev-ui')) {
            if ($router['method'] == 'GET') {
                Router::validate($router, 'get');
            } else if ($router['method'] == 'POST') {
                Router::validate($router, 'post');
            } else if ($router['method'] == 'PUT') {
                Router::validate($router, 'put');
            } else if ($router['method'] == 'DELETE') {
                Router::validate($router, 'delete');
            } else if ($router['method'] == 'PATCH') {
                Router::validate($router, 'patch');
            } else if ($router['method'] == 'OPTIONS') {
                Router::validate($router, 'options');
            }
        } else {
            if (!_env('DEVELOPMENT',true) === 'true') {
                SimpleRouter::response()->httpCode(404);
                exit;
            }
        }
    }

    /**
     * @desc Allow init routing
     * @param $routes - Array of routes
     */
    public static function validate($router, $method)
    {
        // Load list of middleware classes
        $middleware = null;
        require 'config/middleware.php';
        // What to return on routes
        $return = $router['return'];

        // Check Auth
        if (isset($router['middleware'])) {
            // Load Auth
            if (isset($middleware[$router['middleware']])) {
                // Check if is string
                if (is_string($return) && $return !== '') {
                    // Check if contain @ symbol
                    if (strpos($return, '@') !== false) {
                        $filter_class_and_fun = trim($return, '@');
                        $filter_class_and_fun = explode('@', $filter_class_and_fun);
                        $controller_path = 'app/http/' . $router['folder'] . '/controllers/' . $filter_class_and_fun[0] . '.php';
                        // Controller name
                        $controller_name = $filter_class_and_fun[0];
                        //Funtion name
                        $funtion_name = $filter_class_and_fun[1];
                        if (file_exists($controller_path)) {
                            $folder = $router['folder'];
                            $returned_controller = "app\http\\" . $folder . "\controllers\\" . $controller_name . "@" . $funtion_name;
                            if (method_exists("app\http\\" . $folder . "\controllers\\" . $controller_name, $funtion_name)) {
                                // get responce
                                parent::$method($router["path"], $returned_controller, ['middleware' => $middleware[$router['middleware']]]);
                            } else {
                                $error = array(
                                    'Type' => 'Funtion not found',
                                    'Message' => 'Function <b>' . $funtion_name . '</b> not found in class called <b>' . $controller_name . '</b> in [' . $controller_path . '] file',
                                    'Dir' => $controller_path,
                                    'Code' => '0003',
                                );
                                errorsExec::show($error);
                            }

                        } else {
                            $error = array(
                                'Type' => 'File missing',
                                'Message' => 'Controller file not found in [' . $controller_path . ']',
                                'Dir' => $controller_path,
                                'Code' => '0001',
                            );
                            errorsExec::show($error);
                        }
                    } else {
                        // when is string
                        $string = $return;
                        // get responce
                        parent::$method($router["path"], function () use ($string) {
                            //return string
                            echo $string;
                        }, ['middleware' => $middleware[$router['middleware']]]);
                    }
                } else if (is_int($return) && $return !== '') {
                    // When is intiger
                    $int = $return;
                    // get responce
                    parent::$method($router['path'], function () use ($int) {
                        //return int
                        echo $int;
                    }, ['middleware' => $middleware[$router['middleware']]]
                    );
                } else {
                    // get responce
                    parent::$method($router['path'], $return, ['middleware' => $middleware[$router['middleware']]]);
                }
            } else {
                $error = array(
                    'Type' => 'Middleware not found',
                    'Message' => 'Middleware  with key <b>' . $router['middleware'] . '</b> not found ',
                    'Dir' => 'config/middleware.php',
                    'Code' => '0006',
                );
                errorsExec::show($error);
            }

        } else {
            // No auth
            // Check is string
            if (is_string($return) && $return !== '') {
                // Check if contain @ symbol
                if (strpos($return, '@') !== false) {
                    $filter_class_and_fun = trim($return, '@');
                    $filter_class_and_fun = explode('@', $filter_class_and_fun);
                    $controller_path = 'app/http/' . $router['folder'] . '/controllers/' . $filter_class_and_fun[0] . '.php';
                    // Controller name
                    $controller_name = $filter_class_and_fun[0];
                    //Funtion name
                    $funtion_name = $filter_class_and_fun[1];
                    if (file_exists($controller_path)) {
                        $folder = $router['folder'];
                        $returned_controller = "app\http\\" . $folder . "\controllers\\" . $controller_name . "@" . $funtion_name;
                        if (method_exists("app\http\\" . $folder . "\controllers\\" . $controller_name, $funtion_name)) {
                            // get responce
                            parent::$method($router["path"], $returned_controller);
                        } else {
                            $error = array(
                                'Type' => 'Funtion not found',
                                'Message' => 'Function <b>' . $funtion_name . '</b> not found in class called <b>' . $controller_name . '</b> in [' . $controller_path . '] file',
                                'Dir' => $controller_path,
                                'Code' => '0003',
                            );
                            errorsExec::show($error);
                        }

                    } else {
                        $error = array(
                            'Type' => 'File missing',
                            'Message' => 'Controller file not found in [' . $controller_path . ']',
                            'Dir' => $controller_path,
                            'Code' => '0001',
                        );
                        errorsExec::show($error);
                    }
                } else {
                    // When is string
                    $string = $return;
                    parent::$method($router["path"], function () use ($string) {
                        //return string
                        echo $string;
                    });
                }
            } else if (is_int($return) && $return !== '') {
                // When is intiger
                $int = $return;
                parent::$method($router['path'], function () use ($int) {
                    //return int
                    echo $int;
                }
                );
            } else {
                // Get responce
                parent::$method($router['path'], $return);
            }
        }
    }
}
