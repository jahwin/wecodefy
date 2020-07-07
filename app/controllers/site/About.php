<?php
  namespace app\controllers\site;

  use system\library\Controller;

  class About extends Controller
    {
        public function __construct(){
            parent::__construct();
        }

        public function welcome(){
            $data = array('name' => "Welcome to About");
            return $this->render("site","About/index.twig", $data);
        }
    };
?>