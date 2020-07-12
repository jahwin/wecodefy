<?php
namespace app\controllers\site;

use system\library\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        return $this->render('site', 'Home/index.twig', $data);
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
