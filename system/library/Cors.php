<?php
namespace system\library;

class Cors
{
    public function init($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin:' . $data['allowedOrigins']);
            header('Access-Control-Allow-Methods:' . $data['allowedMethods']);
            header('Access-Control-Allow-Headers:' . $data['allowedHeaders']);
            header('Access-Control-Max-Age:' . $data['maxAge']);
            header('Content-Length: 0');
            header('Content-Type: text/plain');
            die();
        }

        header('Access-Control-Allow-Origin:' . $data['allowedOrigins']);
        header('Access-Control-Allow-Methods:' . $data['allowedMethods']);
        header('Access-Control-Allow-Headers:' . $data['allowedHeaders']);
        header('Access-Control-Max-Age:' . $data['maxAge']);
    }

}