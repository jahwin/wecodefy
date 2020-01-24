<?php
use system\library\Cors;
$cols = new Cors();
$cols->init([
    'allowedOrigins' => '*',
    'allowedMethods' => 'POST, DELETE, PUT, PATCH, OPTIONS',
    'allowedHeaders' => 'Content-Type, Authorization, X-Requested-With',
    'maxAge' => 10000,
]);