<?php
namespace system\dev\controller;

use Carbon\Carbon;

class Generate
{

    public function init()
    {
        $generate = input()->all();
        $folder_name = $generate['folder_name'];
        $file_name = ucfirst($generate['class_name']);
        $controller = $generate['controller'];
        $model = $generate['model'];
        $view = $generate['view'];
        $responce = [];
        $date_now = Carbon::now()->isoFormat('dddd, MMMM Do YYYY, h:mm:ss A');

        $controller_folder = $this->checkControllerFolder($folder_name);
        // Check
        if ($controller && $controller_folder) {
            // Check or create controller file
            $file = "app/controllers/{$folder_name}/" . $file_name . "Controller.php";
            if (!file_exists($file)) {
                $content = $this->getControllerContent($folder_name, $file_name);
                file_put_contents($file, $content);
                chmod($file, 0777);
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = ucfirst($file_name) . "Controller" . " controller has been  created successfully - " . $date_now;
                array_push($responce, $proced);
            } else {
                $proced = new \stdClass();
                $proced->status = "fail";
                $proced->message = ucfirst($file_name) . "Controller" . " controller file you are trying to create is already exist - " . $date_now;
                array_push($responce, $proced);
            }
        }

        $model_folder = $this->checkModelFolder($folder_name);

        if ($model && $model_folder) {
            // Check or create model file
            $file = "app/models/" . $file_name . ".php";
            if (!file_exists($file)) {
                $content = $this->getModelContent($folder_name, $file_name);
                file_put_contents($file, $content);
                chmod($file, 0777);
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = ucfirst($file_name) . " model has been created successfully - " . $date_now;
                array_push($responce, $proced);
            } else {
                $proced = new \stdClass();
                $proced->status = "fail";
                $proced->message = ucfirst($file_name) . "  model file you are trying to create is already exist - " . $date_now;
                array_push($responce, $proced);
            }
        }

        if ($view) {
            $view_folder = $this->checkViewFolder($folder_name, $file_name);
            // Check or create view file
            $file = "scheme/views/" . $folder_name . "/" . $file_name . "/index.twig";
            if (!file_exists($file)) {
                $content = $this->getViewContent($folder_name, $file_name);
                file_put_contents($file, $content);
                chmod($file, 0777);
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = "Twig template has been created successfully - " . $date_now;
                array_push($responce, $proced);
            } else {
                $proced = new \stdClass();
                $proced->status = "fail";
                $proced->message = "Template file you are trying to create is already exist - " . $date_now;
                array_push($responce, $proced);
            }
        }

        // Return responce
        echo json_encode($responce);

    }
    // Check if folder is exists if not create it
    public function checkControllerFolder($folder_name)
    {
        $dir = "app/controllers/{$folder_name}";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            chmod($dir, 0777);
        }
        return true;
    }
    // Check if model folder exist
    public function checkModelFolder($folder_name)
    {
        $dir = "app/models";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            chmod($dir, 0777);
        }
        return true;
    }
    // Check if view location folder exist
    public function checkViewFolder($folder_name, $file_name)
    {
        $dir = "scheme/views/" . $folder_name . "/" . $file_name;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            chmod($dir, 0777);
        }
        return true;
    }
    //Get controller content;
    public function getControllerContent($folder, $name)
    {
        return '<?php
  namespace app\controllers\\' . $folder . ';

  use system\library\Controller;

  class ' . ucfirst($name) . 'Controller extends Controller
    {
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $data = array(\'name\' => "Welcome to ' . $name . '");
            return $this->render("' . $folder . '","' . $name . '/index.twig", $data);
        }
        public function create(){

        }
        public function  store(){

        }

        public function show($id){

        }

        public function edit($id){

        }

        public function update($id){

        }

        public function destroy($id){

        }
    };
?>';
    }
    // Get model content
    public function getModelContent($folder_name, $file_name)
    {
        return '<?php
    namespace app\models;

    use system\library\Models;
    use system\library\DB;

    class ' . ucfirst($file_name) . ' extends Models
        {
            public function getUser() {
                $data = DB::table( \'table_name\' )->orderBy( \'id\', \'desc\' )->get();
                return $data;
            }
        };
?>';
    }
    //Get View content
    public function getViewContent($folder_name, $file_name)
    {
        return '<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <base href="/">
   <meta name="theme-color" content="#000000" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Welcome to ' . $file_name . '</title>
 </head>
 <body>
   <h1>Welcome to ' . $file_name . '</h1>
     <hr>
     {{name}}
 </body>
 <script type="text/javascript" src="/assets/js/main.js"></script>
</html>';
    }

}
