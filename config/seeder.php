<?php
use Faker\Factory;
$generate = Factory::create();
/**
* --------------------------------------------
* Enserting fake data in database
* -------------------------------------------
* Don't change this variable name
*/
$database_seeder = [
    [
        'table' => 'user',
        'rows' => 10,
        'fields'=> function() use($generate){
            return  [
                'first_name' =>   $generate->name,
                'last_name'=>   $generate->name,
                'email' =>   $generate->email,
                'password' =>  $generate->password,
            ];
        }
    ]
];
?>