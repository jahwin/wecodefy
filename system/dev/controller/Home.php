<?php
namespace system\dev\controller;

class Home
{

    public function welcome()
    {
        $this->app_url = _env('APP_URL', "");
        require 'system/dev/views/dev_home.php';
    }

}
