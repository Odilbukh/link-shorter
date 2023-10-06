<?php
function dbConnect($config)
{
    $con = new PDO("mysql:host={$config['host']};dbname={$config['database']}", $config['user'], $config['password']);

    if (!$con) {
        die('Ошибка подключения: ' . $con->errorCode());
    }

    return $con;
}
