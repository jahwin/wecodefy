<?php
namespace system\dev\controller;

class Vue
{

    public function generateComponent()
    {
        $responce = [];
        $input = input()->all();
        $file_name = $input['file_name'];
        $folder_name = $input['folder_name'];
        $dir = ROOT_FOLDER . "/js/vue/" . $folder_name;
        $this->checkFolder("js/vue/" . $folder_name);
        $command = ROOT_FOLDER . "/node_modules/.bin/vgc -s " . $file_name;
        if (!file_exists("js/vue/" . $folder_name . '/' . $file_name . ".vue")) {
            $change_dir = chdir($dir);
            $info = shell_exec('export PATH="/usr/local/bin/" ; ' . $command . " 2>&1");
            if (!$info) {
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = $file_name . ".vue was successfully created";
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
