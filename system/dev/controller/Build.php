<?php
namespace system\dev\controller;

class Build
{
    public function buildComponent()
    {
        $responce = [];
        $dir = ROOT_FOLDER;
        $command = "NODE_ENV=production node_modules/.bin/webpack  --no-progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js";
        $change_dir = chdir($dir);
        $assets_dir = $dir.'/assets';
        $info = shell_exec('export PATH="/usr/local/bin" ; ' . $command . " 2>&1");
        if ($info) {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = $info;
            array_push($responce, $proced);
            shell_exec('chmod -R 777 ' . $assets_dir . ' 2>&1');
        } else {
            $proced = new \stdClass();
            $proced->status = "fail";
            $proced->message = $info;
            array_push($responce, $proced);
        }
        echo json_encode($responce);
    }
}
