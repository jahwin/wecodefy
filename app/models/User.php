<?php
namespace app\models;

use system\library\DB;
use system\library\Models;

class User extends Models
{
    public function getUser()
    {
        $data = DB::table('tb_user')->orderBy('id', 'desc')->get();
        return $data;
    }
};
