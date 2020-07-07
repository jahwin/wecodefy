<?php
ini_set('pcre.jit', '0');
use system\dev\controller\errorsExec;

spl_autoload_register(function ($className) {
    $file = $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (file_exists($file)) {
        require $file;
        if (!class_exists($className)) {
            $error = array(
                'Type' => 'Class not found',
                'Message' => 'Class `' . $className . '` not found',
                'Dir' => "/",
                'Code' => '0002',
            );
            errorsExec::show($error);
        }
    }
});

// env file
if (!file_exists('.env')) {
    echo '
    <body style="position:fixed;left:0;right:0;bottom:0;top:0;display:flex;align-items: center;justify-content:center;">
      <h1 style="color:#08565c">.env file not found, please create it then copy all variables from .env.examples file to .env file you have created.</h1>
    </body>
    ';
    exit;
}

//php packages
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    echo '
    <body style="position:fixed;left:0;right:0;bottom:0;top:0;display:flex;align-items: center;justify-content:center;">
      <h1 style="color:#08565c">PHP package not found, please use "composer install" to install it.</h1>
    </body>
    ';
    exit;
}

//load env file
$dotenv = Dotenv\Dotenv::createImmutable(ROOT_FOLDER);
$dotenv->load();

// helper
require 'system/library/helpers.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\CallbackHandler(function ($exception, $inspector, $run) {
    if ($exception->getCode() != 404) {
        if (_env('DEVELOPMENT', true) === 'true') {
            $error = array(
                'Type' => 'PHP error found on line ' . $exception->getLine(),
                'Message' => $exception->getMessage(),
                'Dir' => $exception->getFile(),
                'Code' => $exception->getCode(),
            );
            errorsExec::show($error);
        } else {
            echo '
         <body style="position:fixed;left:0;right:0;bottom:0;top:0;display:flex;align-items: center;justify-content:center;">
           <h1 style="color:#08565c">Something went wrong to your website</h1>
         </body>
         ';
        }
    } else {
        responce("", 404);
    }
}));
$whoops->register();

//Cors
require 'config/cors.php';
// routes
require 'system/dev/routes.php';
require 'config/routes.php';
