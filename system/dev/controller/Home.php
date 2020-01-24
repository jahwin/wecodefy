<?php
namespace system\dev\controller;

class Home
{

    public function welcome()
    {
        $this->app_url = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'];
        require 'system/dev/views/dev_home.php';
    }

}
