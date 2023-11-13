<?php

$dsn = "mysql:dbname=php_pdo;host=localhost;charset=utf8";
$user = "pdo";
$pass = "test";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (Exception $error) {
    echo "<h1>ERREUR de connexion à la DB</h1>";
    echo "<pre>";
    print_r($error);
    echo "</pre>";
    exit();
}