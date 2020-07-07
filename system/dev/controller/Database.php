<?php
namespace system\dev\controller;

use system\library\DBmanager;
use system\library\Seeder;

class Database
{

    public function runMigration()
    {
        $migration = new DBmanager();
        $responce = $migration->up();
        echo json_encode($responce);
    }
    public function reverseMigration()
    {
        $migration = new DBmanager();
        $responce = $migration->down();
        echo json_encode($responce);
    }

    public function runSeeder()
    {
        $seeder = new Seeder();
        $responce = $seeder->up();
        echo json_encode($responce);
    }
    public function reverseSeeder()
    {
        $seeder = new Seeder();
        $responce = $seeder->down();
        echo json_encode($responce);
    }
}
