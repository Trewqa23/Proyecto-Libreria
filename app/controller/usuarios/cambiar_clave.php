<?php
require_once("../../config.php");
session_start();
if (!isset($_SESSION["sesion_email"])) { header("Location: " . $URL . "/login/"); exit; }

$actual = $_POST["password_actual"] ?? "";
$nueva = $_POST["password_nueva"] ?? "";
$repeat = $_POST["password_repeat"] ?? "";

$stmt = $pdo->prepare("SELECT password FROM tb_usuarios WHERE email = :email LIMIT 1");
$stmt->execute([":email"=>$_SESSION["sesion_email"]]);
$usuario = $stmt->fetch();

if (!$usuario || !password_verify($actual, $usuario["password"])) {
    $_SESSION["mensaje"] = "La contraseña actual es incorrecta."; $_SESSION["icono"] = "error";
    header("Location: " . $URL . "/cambiar_clave.php"); exit;
}
if (strlen($nueva) < 6 || $nueva !== $repeat) {
    $_SESSION["mensaje"] = "La nueva contraseña debe tener al menos 6 caracteres y coincidir en ambos campos."; $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/cambiar_clave.php"); exit;
}

$stmt = $pdo->prepare("UPDATE tb_usuarios SET password=:password, fyh_actualizacion=:fecha WHERE email=:email");
$stmt->execute([":password"=>password_hash($nueva, PASSWORD_DEFAULT), ":fecha"=>$fechaHora, ":email"=>$_SESSION["sesion_email"]]);

$_SESSION["mensaje"] = "Contraseña actualizada correctamente."; $_SESSION["icono"] = "success";
header("Location: " . $URL . "/perfil.php"); exit;
