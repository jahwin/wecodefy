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
		'table'=>'tb_client',
		"todo" =>'create',
        'run' => function( Blueprint $table ) {
            $table->string( 'email' )->index();
            $table->string( 'token' )->index();
            $table->timestamps();
        }
        ,
        'reason'=>'Creating tb_client table'
    ],
    [
        'key' => 2,
		'table'=>'tb_books',
		"todo" =>'create',
        'run' => function( Blueprint $table ) {
            $table->string( 'name' )->index();
            $table->timestamps();
        }
        ,
        'reason'=>'Creating tb_books table'
	]
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
        'table'=>'tb_client',
        'todo' =>'delete',
        'run' => 'drop',
        'reason'=>'Removing tb_client table'
    ],
    [
        'key' => 2,
        'table'=>'tb_book',
        'todo' =>'delete',
        'run' => 'drop',
        'reason'=>'Removing tb_book table'
    ]
];

?>