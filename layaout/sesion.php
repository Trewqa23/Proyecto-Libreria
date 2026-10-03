<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["sesion_email"])) {
    header("Location: " . $URL . "/login/");
    exit;
}

$email_sesion = $_SESSION["sesion_email"];

$sql = "SELECT us.id_usuario, us.nombres, us.apellidos, us.email, us.Id_rol, us.cambiar_password, rol.rol
        FROM tb_usuarios AS us
        INNER JOIN tb_roles AS rol ON us.Id_rol = rol.Id_rol
        WHERE us.email = :email
        LIMIT 1";
$query = $pdo->prepare($sql);
$query->execute([":email" => $email_sesion]);
$usuario_session = $query->fetch();

if (!$usuario_session) {
    session_unset();
    session_destroy();
    header("Location: " . $URL . "/login/");
    exit;
}

$id_usuario = $usuario_session["id_usuario"];
$nombres_session = $usuario_session["nombres"];
$apellidos_session = $usuario_session["apellidos"] ?? "";
$rol_session = $usuario_session["rol"];
$id_rol_session = $usuario_session["Id_rol"];
$cambiar_password_session = (int)$usuario_session["cambiar_password"];
if ($cambiar_password_session === 1 && basename($_SERVER["PHP_SELF"]) !== "primer_acceso.php") { header("Location: " . $URL . "/primer_acceso.php"); exit; }
