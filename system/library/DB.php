<?php
namespace system\library;

/**
 * Date: 03/01/2019
 * Time: 10:52
 */
use Illuminate\Database\Capsule\Manager as Database;
use system\dev\controller\errorsExec;

$capsule = new Database;
$conn = $capsule->addConnection([
    'driver' => 'mysql',
    'host' => _env('DB_HOST', '127.0.0.1'),
    'database' => _env('DB_NAME', 'wecodefy'),
    'username' => _env('DB_USER', 'root'),
    'password' => _env('DB_PASS', ''),
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

class DB extends Database
{}

try {
    $result = DB::schema()->hasTable("test-wecodefy-database");
} catch (\Illuminate\Database\QueryException $ex) {
    if ($ex->getCode() == 2002) {
        $error = array(
            'Type' => 'Database problem',
            'Message' => 'Database host socket is invalid, try to correct it in constant file',
            'Dir' => 'app/config',
            'Code' => $ex->getCode(),
        );
        errorsExec::show($error);
    } elseif ($ex->getCode() == 1049) {
        $error = array(
            'Type' => 'Database problem',
            'Message' => 'Database <b>' . DB_NAME . ' </b> not found, try to correct it in constant file',
            'Dir' => 'app/config',
            'Code' => $ex->getCode(),
        );
        errorsExec::show($error);
    } elseif ($ex->getCode() == 1044) {
        $error = array(
            'Type' => 'Database problem',
            'Message' => 'Database user called <b>' . DB_USER . ' </b> not found, try to correct it in constant file',
            'Dir' => 'app/config',
            'Code' => $ex->getCode(),
        );
        errorsExec::show($error);
    } elseif ($ex->getCode() == 1045) {
        $error = array(
            'Type' => 'Database problem',
            'Message' => 'Database password is not correct, try to correct it in constant file',
            'Dir' => 'app/config',
            'Code' => $ex->getCode(),
        );
        errorsExec::show($error);
    }
    exit;
}
