<?php
namespace system\library;

use Illuminate\Database\Schema\Blueprint;
use system\library\DB;

/**
 * @desc this class will hold functions for inserting test data to database
 * @author Abe Jahwin
 */

class Seeder
{
    public $table_prefix = "";

    public function init()
    {
        $this->table_prefix = _env('DB_PREFIX', "") ? _env('DB_PREFIX', "") . "_" : "";
        if (DB::schema()->hasTable("seeder") == false) {
            DB::schema()->create("seeder", function (Blueprint $table) {
                $table->increments('id');
                $table->string('key');
                $table->string('type');
                $table->text('reason')->nullable();
            });
        }
    }

    public function saveHistory($item, $type)
    {
        DB::table("seeder")->insert([
            'key' => $item['key'],
            'type' => $type,
            'reason' => 'Generating data in ' . $this->table_prefix . $item['table'] . ' table',
        ]);
    }
    public function up()
    {
        $this->init();
        $responce = [];
        $database_seeder = null;
        $item_to_seed = false;
        require_once 'config/seeder.php';
        foreach ($database_seeder as $item) {
            if (!DB::table("seeder")->where([['key', '=', $item['key']], ['type', '=', "up"]])->exists()) {
                if (DB::schema()->hasTable($this->table_prefix . $item['table'])) {
                    $this->saveHistory($item, "up");
                    $item_to_seed = true;
                    for ($i = 0; $i < $item['rows']; $i++) {
                        DB::table($this->table_prefix . $item['table'])->insert($item['fields']());
                    }
                    $proced = new \stdClass();
                    $proced->status = "success";
                    $proced->message = 'Data was genelated successfully in table called ' . $this->table_prefix . $item['table'];
                    array_push($responce, $proced);
                } else {
                    $proced = new \stdClass();
                    $proced->status = "fail";
                    $proced->message = 'Table ' . $this->table_prefix . $item['table'] . ' not found in database';
                    array_push($responce, $proced);
                }
            }
        }
        if (!$item_to_seed) {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = "Nothing to generate";
            array_push($responce, $proced);
            return $responce;
        } else {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = 'Sedding is done';
            array_push($responce, $proced);
            return $responce;
        }
    }
    public function down()
    {
        $this->init();
        $responce = [];
        $database_seeder = null;
        $item_to_seed = false;
        require_once 'config/seeder.php';
        $seeder_item = DB::table("seeder")->where([['type', '=', "up"]])->orderBy('id', 'desc')->first();
        if (isset($seeder_item->key)) {
            $key = $seeder_item->key;
            foreach ($database_seeder as $item) {
                if ($item['key'] == $key) {
                    if (DB::schema()->hasTable($this->table_prefix . $item['table'])) {
                        $this->saveHistory($item, "down");
                        $item_to_seed = true;
                        DB::table($this->table_prefix . $item['table'])->truncate();
                        $proced = new \stdClass();
                        $proced->status = "success";
                        $proced->message = 'Data in ' . $this->table_prefix . $item['table'] . ' table was successfully removed';
                        array_push($responce, $proced);
                        // Remove that migration history
                        DB::table("seeder")->where([['key', '=', $item['key']], ['type', '=', "up"]])->delete();
                    } else {
                        $proced = new \stdClass();
                        $proced->status = "fail";
                        $proced->message = 'Table ' . $this->table_prefix . $item['table'] . ' not found in database';
                        array_push($responce, $proced);
                    }
                }
            }
            if (!$item_to_seed) {
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = "Nothing to reverse on last seeder, Ref key =>" . $key;
                array_push($responce, $proced);
                return $responce;
            } else {
                $proced = new \stdClass();
                $proced->status = "success";
                $proced->message = 'Sedding rollback is done, Go to seeder file to fix the problem caused to reverse, Ref key =>' . $key;
                array_push($responce, $proced);
                return $responce;
            }
        } else {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = "Nothing to reverse";
            array_push($responce, $proced);
            return $responce;
        }
    }

}
