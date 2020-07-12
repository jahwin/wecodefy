<?php
namespace app\controllers\api;

use app\models\User;
use system\library\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = new User();
        $data = $user->getUser();
        responce(json_encode($data), 200);
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
