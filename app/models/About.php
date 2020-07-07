<?php
    namespace app\models;

    use system\library\Models;
    use system\library\DB;

    class About extends Models
        {
            public function getUser() {
                $data = DB::table( 'table_name' )->orderBy( 'id', 'desc' )->get();
                return $data;
            }
        };
?>