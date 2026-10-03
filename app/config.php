<?php

define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("BD", "sistemaventas");

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]);
} catch (PDOException $e) {
    die("Error en conectar a la base de datos: " . $e->getMessage());
}

$URL = "http://localhost/proyecto-libreria";
date_default_timezone_set("America/Lima");
$fechaHora = date("Y-m-d H:i:s");
