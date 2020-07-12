<?php

namespace system\library;

use Nette\Http\Response;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use system\dev\controller\errorsExec;
use \Exception;

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
    public static function init($routes, $condition = null)
    {
        if (isContain(url(), '/api')) {
            header('Access-Control-Allow-Headers: Content-type');
            header('Content-type: application/json');
        }
        /* ----------------------
         * Developer routes
         * ----------------------
         */

        if (_env('DEVELOPMENT', true) === 'true') {
            if (isContain(url(), '/dev/ui')) {
                parent::group(['prefix' => "/dev/ui"], function () {

                    parent::get('/', 'system\dev\controller\Home@welcome');
                    parent::get('/{path}', 'system\dev\controller\Home@welcome')->where(['path' => '(database)']);
                    // API
                    parent::group(['prefix' => "/api"], function () {
                        parent::post('/generate', 'system\dev\controller\Generate@init');
                        parent::get('/run-migration', 'system\dev\controller\Database@runMigration');
                        parent::get('/reverse-migration', 'system\dev\controller\Database@reverseMigration');
                        parent::get('/run-seeder', 'system\dev\controller\Database@runSeeder');
                        parent::get('/reverse-seeder', 'system\dev\controller\Database@reverseSeeder');
                        parent::post('/angular-g-component', 'system\dev\controller\Angular@generateComponent');
                        parent::post('/angular-g-service', 'system\dev\controller\Angular@generateService');
                        parent::post('/create-vue-component', 'system\dev\controller\Vue@generateComponent');
                        parent::post('/create-react-component', 'system\dev\controller\React@generateComponent');
                        parent::get('/build-js', 'system\dev\controller\Build@buildComponent');
                    });
                });
                parent::start();
                exit;
            }
        }
        /* ----------------------
         * End of developer routes
         * ----------------------
         */
        if ($condition['ENABLED']) {
            $except = $condition['EXCEPT'];
            $routes = array_filter(
                $routes,
                function ($e) use ($except) {
                    foreach ($except as $value) {
                        return $e['path'] == $value;
                    }
                }
            );
            if (count($routes) > 0) {
                // All routes
                Router::processRoutes($routes);
            }
            $router = $condition['ALL_TO'];
            $router['method'] = 'GET';
            parent::error(function (Request $request, \Exception $exception) use ($router) {
                if ($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
                    Router::onSingleRoute($router);
                    responce("", 200);
                }
            });
        } else {
            // All routes
            Router::processRoutes($routes);
        }
        // Allow to start routing
        parent::start();
    }
    /**
     * @desc Allow to run process array of routes
     * @param $routes - Array of routes
     */
    public static function processRoutes($routes)
    {
        // Load middleware classes from file
        $middleware = null;
        require 'config/middleware.php';
        foreach ($routes as $router) {
            // All request without notfound page
            if ($router['path'] != '*') {
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
            } else {
                parent::error(function (Request $request, \Exception $exception) use ($router) {
                    if ($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
                        Router::onSingleRoute($router);
                        responce("", 404);
                    }
                });
            }
        }
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
            if (!_env('DEVELOPMENT', true) === 'true') {
                SimpleRouter::response()->httpCode(404);
                exit;
            }
        }
    }
    public static function onSingleRoute($router)
    {
        $return = $router['return'];
        // Check is string
        if (is_string($return) && $return !== '') {
            // Check if contain @ symbol
            if (strpos($return, '@') !== false) {
                $filter_class_and_fun = trim($return, '@');
                $filter_class_and_fun = explode('@', $filter_class_and_fun);
                $controller_path = 'app/controllers/' . $router['folder'] . '/' . $filter_class_and_fun[0] . '.php';
                // Controller name
                $controller_name = $filter_class_and_fun[0];
                //Funtion name
                $funtion_name = $filter_class_and_fun[1];
                if (file_exists($controller_path)) {
                    $folder = $router['folder'];
                    if (method_exists("app\controllers\\" . $folder . "\\" . $controller_name, $funtion_name)) {
                        // get responce
                        $class = "app\controllers\\" . $folder . "\\" . $controller_name;
                        $error_class = new $class();
                        echo $error_class->$funtion_name();
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
                echo $string;
            }
        } else if (is_int($return) && $return !== '') {
            // When is intiger
            $int = $return;
            echo $int;
        } else {
            // Get responce
            echo $return;
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
                        $controller_path = 'app/controllers/' . $router['folder'] . '/' . $filter_class_and_fun[0] . '.php';
                        // Controller name
                        $controller_name = $filter_class_and_fun[0];
                        //Funtion name
                        $funtion_name = $filter_class_and_fun[1];
                        if (file_exists($controller_path)) {
                            $folder = $router['folder'];
                            $returned_controller = "app\controllers\\" . $folder . "\\" . $controller_name . "@" . $funtion_name;
                            if (method_exists("app\controllers\\" . $folder . "\\" . $controller_name, $funtion_name)) {
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
                    $controller_path = 'app/controllers/' . $router['folder'] . '/' . $filter_class_and_fun[0] . '.php';
                    // Controller name
                    $controller_name = $filter_class_and_fun[0];
                    //Funtion name
                    $funtion_name = $filter_class_and_fun[1];
                    if (file_exists($controller_path)) {
                        $folder = $router['folder'];
                        $returned_controller = "app\controllers\\" . $folder . "\\" . $controller_name . "@" . $funtion_name;
                        if (method_exists("app\controllers\\" . $folder . "\\" . $controller_name, $funtion_name)) {
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
