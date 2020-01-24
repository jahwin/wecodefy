<?php
define('ROOT_FOLDER', __DIR__);
// Checking if loader file are exist
if (file_exists(__DIR__ . "/system/loader.php")) {
    //Loading loader file
    require __DIR__ . '/system/loader.php';
} else {
    //  Error
    echo "Loader file not exists";
}
