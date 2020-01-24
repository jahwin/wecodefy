<?php
namespace system\dev\controller;

class Angular
{

    public function generateComponent()
    {
        $responce = [];
        $input = input()->all();
        $name = $input['name'];
        $dir = ROOT_FOLDER . "/js/angular";
        $change_dir = chdir($dir);
        $command = ROOT_FOLDER . "/node_modules/.bin/ng generate component " . $name . " --skipTests=true";
        if ($change_dir) {
            $info = shell_exec('export PATH="/usr/local/bin/" ; ' . $command . " 2>&1");
            $output = explode(" ", $info);
            if ($output[0] !== "ERROR!") {
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
            $proced->message = "Failed to angular locate to new directory";
            array_push($responce, $proced);
        }
        echo json_encode($responce);
    }
    public function generateService()
    {

        $responce = [];
        $input = input()->all();
        $name = $input['name'];
        $dir = ROOT_FOLDER . "/js/angular";
        $change_dir = chdir($dir);
        $command = ROOT_FOLDER . "/node_modules/.bin/ng generate service " . $name . " --skipTests=true";
        if ($change_dir) {
            $info = shell_exec('export PATH="/usr/local/bin/" ; ' . $command . " 2>&1");
            $output = explode(" ", $info);
            if ($output[0] !== "ERROR!") {
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
            $proced->message = "Failed to angular locate to new directory";
            array_push($responce, $proced);
        }
        echo json_encode($responce);

    }
}
