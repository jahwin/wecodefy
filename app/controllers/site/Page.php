<?php
namespace app\controllers\site;

use system\library\Controller;

class Page extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notFound()
    {
        $data = array('name' => "Welcome to Page");
        return $this->render("site", "Pages/notFound.twig", $data);
    }
};
