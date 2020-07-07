<?php
namespace app\http\api\controllers;

use app\models\User;
use system\library\Controller;

class Home extends Controller
{
    public function welcome()
    {
        $user = new User();
        $data = $user->getUser();
        responce(json_encode($data), 200);
    }
}
