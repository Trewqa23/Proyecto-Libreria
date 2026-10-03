<?php
require_once(__DIR__ . "/../config.php");
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

if (!isset($_SESSION["sesion_email"])) {
    header("Location: " . $URL . "/login/");
    exit;
}

$stmt = $pdo->prepare("SELECT Id_rol FROM tb_usuarios WHERE email = :email LIMIT 1");
$stmt->execute([":email" => $_SESSION["sesion_email"]]);
$idRol = (int)$stmt->fetchColumn();
if ($idRol !== 1) {
    $_SESSION["mensaje"] = "No tiene permisos para realizar esta acción.";
    $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/index.php");
    exit;
}
