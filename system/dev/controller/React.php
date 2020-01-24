<?php
namespace system\dev\controller;

class React
{
    public function generateComponent()
    {
        $responce = [];
        $input = input()->all();
        $file_name = $input['file_name'];
        $folder_name = $input['folder_name'];
        $dir = ROOT_FOLDER . "/js/react";
        $this->checkFolder("js/react");
        $command = ROOT_FOLDER . "/node_modules/.bin/rg component " . $file_name . " -d ./" . $folder_name . " -f";
        if (!file_exists("js/react/" . $folder_name . '/' . $file_name . '/' . $file_name . ".js")) {
            $change_dir = chdir($dir);
            $info = shell_exec('export PATH="/usr/local/bin/" ; ' . $command . " 2>&1");
            if ($info) {
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = $info;
                array_push($responce, $proced);
                shell_exec('chmod -R 777 ' . $dir . ' 2>&1');
            } else {
                $proced = new \stdClass();
                $proced->status = "fail";
                $proced->message = $info;
                array_push($responce, $proced);
            }

        } else {
            $proced = new \stdClass();
            $proced->status = "fail";
            $proced->message = "File you are trying to create is already  exist";
            array_push($responce, $proced);
        }
        echo json_encode($responce);
    }

    public function checkFolder($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            chmod($dir, 0777);
        }
        return true;
    }
}
