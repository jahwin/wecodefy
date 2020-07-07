<?php
namespace app\http\site\controllers;

use system\library\Controller;

class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
        $data = array();
        return $this->render('site', 'Home/index.twig', $data);
    }

}
