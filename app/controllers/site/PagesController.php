<?php
namespace app\controllers\site;

use system\library\Controller;

class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array('name' => "Welcome to Page");
        return $this->render("site", "Pages/notFound.twig", $data);
    }
    public function create()
    {

    }
    public function store()
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
};
