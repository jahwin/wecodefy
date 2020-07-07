<?php
use system\library\Router;

Router::group(['prefix' => "/dev/ui"], function () {
    if (_env('DEVELOPMENT', true) === 'true') {
        Router::get('/', 'system\dev\controller\Home@welcome');
        Router::get('/{path}', 'system\dev\controller\Home@welcome')->where(['path' => '(database)']);
        // APi
        Router::group(['prefix' => "/api"], function () {
            Router::post('/generate', 'system\dev\controller\Generate@init');
            Router::get('/run-migration', 'system\dev\controller\Database@runMigration');
            Router::get('/reverse-migration', 'system\dev\controller\Database@reverseMigration');
            Router::get('/run-seeder', 'system\dev\controller\Database@runSeeder');
            Router::get('/reverse-seeder', 'system\dev\controller\Database@reverseSeeder');
            Router::post('/angular-g-component', 'system\dev\controller\Angular@generateComponent');
            Router::post('/angular-g-service', 'system\dev\controller\Angular@generateService');
            Router::post('/create-vue-component', 'system\dev\controller\Vue@generateComponent');
            Router::post('/create-react-component', 'system\dev\controller\React@generateComponent');
            Router::get('/build-js', 'system\dev\controller\Build@buildComponent');
        });
    }
});
