<?php
namespace system\library;

use system\library\DB;

/**
 * @desc this class will hold functions for inserting test data to database
 * @author Abe Jahwin
 */

class Seeder
{
    public function init()
    {

        $responce = [];
        $database_seeder = null;
        require_once 'config/seeder.php';
        foreach ($database_seeder as $item) {
            for ($i = 0; $i < $item['rows']; $i++) {
                DB::table($item['table'])->insert($item['fields']());
            }
        }
        $proced = new \stdClass();
        $proced->status = "success";
        $proced->message = 'Database seeding is done';
        array_push($responce, $proced);
        return $responce;
    }

}
