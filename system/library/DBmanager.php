<?php
namespace system\library;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use system\library\DB;

/**
 * @desc this class will hold functions for database management
 * @author Abe Jahwin
 */
class DBmanager extends Migration
{

    public function init()
    {
        if (DB::schema()->hasTable("migration") == false) {
            DB::schema()->create("migration", function (Blueprint $table) {
                $table->increments('id');
                $table->string('key');
                $table->string('type');
                $table->text('reason')->nullable();
            });
        }
    }

    public function saveHistory($item, $type)
    {
        DB::table("migration")->insert([
            'key' => $item['key'],
            'type' => $type,
            'reason' => $item['reason'],
        ]);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        $this->init();
        $db_up_migration = null;
        $item_to_migrate = false;
        $responce = [];
        require_once 'config/migration.php';
        foreach ($db_up_migration as $item) {
            if (!DB::table("migration")->where([['key', '=', $item['key']], ['type', '=', "up"]])->exists()) {
                $item_to_migrate = true;
                // on create table
                if ($item['todo'] == 'create') {
                    if (is_callable($item['run'])) {
                        if (DB::schema()->hasTable($item['table']) == false) {
                            $this->saveHistory($item, "up");
                            DB::schema()->create($item['table'], $item['run']);
                            $proced = new \stdClass();
                            $proced->status = "success";
                            $proced->message = $item['reason'];
                            array_push($responce, $proced);
                        } else {
                            $proced = new \stdClass();
                            $proced->status = "fail";
                            $proced->message = $item['table'] . ' table already exist';
                            array_push($responce, $proced);
                        }
                    }
                    // on update table columns
                } else if ($item['todo'] == 'update') {
                    if (is_callable($item['run'])) {
                        if (DB::schema()->hasTable($item['table'])) {
                            $this->saveHistory($item, "up");
                            DB::schema()->table($item['table'], $item['run']);
                            $proced = new \stdClass();
                            $proced->status = "success";
                            $proced->message = $item['reason'];
                            array_push($responce, $proced);
                        } else {
                            $proced = new \stdClass();
                            $proced->status = "fail";
                            $proced->message = $item['table'] . ' table not exist to update its columns';
                            array_push($responce, $proced);
                        }
                    }
                    // on delete table
                } else if ($item['todo'] == 'delete') {
                    if ($item['run'] == 'drop') {
                        if (DB::schema()->hasTable($item['table'])) {
                            $this->saveHistory($item, "up");
                            DB::schema()->drop($item['table']);
                            $proced = new \stdClass();
                            $proced->status = "success";
                            $proced->message = $item['reason'];
                            array_push($responce, $proced);
                        } else {
                            $proced = new \stdClass();
                            $proced->status = "fail";
                            $proced->message = $item['table'] . ' table not exist to delete';
                            array_push($responce, $proced);
                        }

                    }
                    // on raname table
                } else if ($item['todo'] == 'rename') {
                    if (DB::schema()->hasTable($item['table'])) {
                        $this->saveHistory($item, "up");
                        DB::schema()->rename($item['table'], $item['run']);
                        $proced = new \stdClass();
                        $proced->status = "success";
                        $proced->message = $item['reason'];
                        array_push($responce, $proced);
                    } else {
                        $proced = new \stdClass();
                        $proced->status = "fail";
                        $proced->message = $item['table'] . ' table not exist to rename';
                        array_push($responce, $proced);
                    }
                }
            }
        }
        if (!$item_to_migrate) {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = "Nothing to migrate";
            array_push($responce, $proced);
            return $responce;
        } else {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = 'Migration done';
            array_push($responce, $proced);
            return $responce;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        $this->init();
        $db_down_migration = null;
        $item_to_migrate = false;
        $responce = [];
        require_once 'config/migration.php';
        foreach ($db_down_migration as $item) {
            if (!DB::table("migration")->where([['key', '=', $item['key']], ['type', '=', "down"]])->exists()) {
                $item_to_migrate = true;
                // on create table
                if ($item['todo'] == 'create') {
                    if (is_callable($item['run'])) {
                        if (DB::schema()->hasTable($item['table']) == false) {
                            $this->saveHistory($item, "down");
                            DB::schema()->create($item['table'], $item['run']);
                            $proced = new \stdClass();
                            $proced->status = "success";
                            $proced->message = $item['reason'];
                            array_push($responce, $proced);
                        } else {
                            $proced = new \stdClass();
                            $proced->status = "fail";
                            $proced->message = $item['table'] . ' table already exist';
                            array_push($responce, $proced);
                        }
                    }
                    // on update table columns
                } else if ($item['todo'] == 'update') {
                    if (is_callable($item['run'])) {
                        if (DB::schema()->hasTable($item['table'])) {
                            $this->saveHistory($item, "down");
                            DB::schema()->table($item['table'], $item['run']);
                            $proced = new \stdClass();
                            $proced->status = "success";
                            $proced->message = $item['reason'];
                            array_push($responce, $proced);
                        } else {
                            $proced = new \stdClass();
                            $proced->status = "fail";
                            $proced->message = $item['table'] . ' table not exist to update its columns';
                            array_push($responce, $proced);
                        }
                    }
                    // on delete table
                } else if ($item['todo'] == 'delete') {
                    if ($item['run'] == 'drop') {
                        if (DB::schema()->hasTable($item['table'])) {
                            $this->saveHistory($item, "down");
                            DB::schema()->drop($item['table']);
                            $proced = new \stdClass();
                            $proced->status = "success";
                            $proced->message = $item['reason'];
                            array_push($responce, $proced);
                        } else {
                            $proced = new \stdClass();
                            $proced->status = "fail";
                            $proced->message = $item['table'] . ' table not exist to delete';
                            array_push($responce, $proced);
                        }

                    }
                    // on raname table
                } else if ($item['todo'] == 'rename') {
                    if (DB::schema()->hasTable($item['table'])) {
                        $this->saveHistory($item, "down");
                        DB::schema()->rename($item['table'], $item['run']);
                        $proced = new \stdClass();
                        $proced->status = "success";
                        $proced->message = $item['reason'];
                        array_push($responce, $proced);
                    } else {
                        $proced = new \stdClass();
                        $proced->status = "fail";
                        $proced->message = $item['table'] . ' table not exist to rename';
                        array_push($responce, $proced);
                    }
                }
            }
        }
        if (!$item_to_migrate) {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = "Nothing to reverse migrate";
            array_push($responce, $proced);
            return $responce;
        } else {
            $proced = new \stdClass();
            $proced->status = "success";
            $proced->message = 'Reverse the migrations done';
            array_push($responce, $proced);
            return $responce;
        }
    }

}
