<?php
use Illuminate\Database\Schema\Blueprint;
/**
 * --------------------------------------------
 * Setting up database
 * -------------------------------------------
 * Don't change this variable name
 */
$db_up_migration = [
    [
        'key' => 1,
        'table' => 'tb_user',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        }
        ,
        'reason' => 'Creating tb_user table',
    ],
];

/**
 * --------------------------------------------
 * Rollback database
 * -------------------------------------------
 * Don't change this variable name
 */
$db_down_migration = [
    [
        'key' => 1,
        'table' => 'tb_user',
        'todo' => 'delete',
        'run' => 'drop',
        'reason' => 'Removing tb_user table',
    ],
];
