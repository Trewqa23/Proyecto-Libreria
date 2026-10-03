<?php
require_once("../admin_guard.php");
require_once("../../mail_config.php");
session_start();
if (!isset($_SESSION["sesion_email"])) { header("Location: " . $URL . "/login/"); exit; }

$dni = trim($_POST["dni"] ?? "");
$nombres = trim($_POST["nombres"] ?? "");
$apellidos = trim($_POST["apellidos"] ?? "");
$email = strtolower(trim($_POST["email"] ?? ""));
$rol = (int)($_POST["rol"] ?? 0);

if (!preg_match('/^\d{8}$/', $dni) || $nombres === "" || $apellidos === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $rol <= 0) {
    $_SESSION["mensaje"] = "Completa correctamente DNI, nombres, apellidos, correo y rol.";
    $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/usuarios/create.php"); exit;
}

$check = $pdo->prepare("SELECT dni, email FROM tb_usuarios WHERE dni=:dni OR email=:email LIMIT 1");
$check->execute([":dni"=>$dni, ":email"=>$email]);
$existente = $check->fetch();
if ($existente) {
    $_SESSION["mensaje"] = ($existente['dni'] === $dni) ? "El DNI ya está registrado." : "El correo ya está registrado.";
    $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/usuarios/create.php"); exit;
}

$may = 'ABCDEFGHJKLMNPQRSTUVWXYZ'; $min = 'abcdefghijkmnopqrstuvwxyz'; $num = '23456789'; $esp = '!@#$%';
$passwordTemporal = $may[random_int(0, strlen($may)-1)] . $min[random_int(0, strlen($min)-1)] . $num[random_int(0, strlen($num)-1)] . $esp[random_int(0, strlen($esp)-1)];
$pool = $may.$min.$num;
for ($i=0; $i<6; $i++) $passwordTemporal .= $pool[random_int(0, strlen($pool)-1)];
$passwordTemporal = str_shuffle($passwordTemporal);
$hash = password_hash($passwordTemporal, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO tb_usuarios (dni,nombres,apellidos,email,password,cambiar_password,token,Id_rol,fyh_creacion,fyh_actualizacion) VALUES (:dni,:nombres,:apellidos,:email,:password,1,'',:rol,:fecha,:fecha)");
$stmt->execute([":dni"=>$dni,":nombres"=>$nombres,":apellidos"=>$apellidos,":email"=>$email,":password"=>$hash,":rol"=>$rol,":fecha"=>$fechaHora]);

$enviado = enviarCredencialesTrabajador($email, $nombres.' '.$apellidos, $passwordTemporal);
$_SESSION["mensaje"] = $enviado
    ? "Trabajador registrado. Las credenciales temporales fueron enviadas a su correo."
    : "Trabajador registrado, pero el correo no pudo enviarse. Revisa PHPMailer y la configuración SMTP en app/config/correo.php.";
$_SESSION["icono"] = $enviado ? "success" : "warning";
header("Location: " . $URL . "/usuarios/"); exit;
