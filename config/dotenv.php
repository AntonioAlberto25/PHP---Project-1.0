<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$driver = $_ENV['DB_DRIVER'];
$host = $_ENV['DB_HOST'];
$dbname =  $_ENV['DB_NAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

return [
    'database' => [
        'driver' => $driver,
        'host' => $host,
        'dbname' => $dbname,
        'user' => $username,
        'password' => $password,
    ]
];