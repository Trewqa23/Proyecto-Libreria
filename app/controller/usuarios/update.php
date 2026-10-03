<?php
require_once("../admin_guard.php");
session_start();
if (!isset($_SESSION["sesion_email"])) { header("Location: " . $URL . "/login/"); exit; }

$id_usuario = (int)($_POST["id_usuario"] ?? 0);
$nombre = trim($_POST["nombres"] ?? "");
$apellidos = trim($_POST["apellidos"] ?? "");
$dni = trim($_POST["dni"] ?? "");
$email = trim($_POST["email"] ?? "");
$rol = (int)($_POST["rol"] ?? 0);
$password_user = $_POST["password_user"] ?? "";
$password_repeat = $_POST["password_repeat"] ?? "";

if ($id_usuario <= 0 || $nombre === "" || $apellidos === "" || !preg_match('/^[0-9]{8}$/', $dni) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $rol <= 0) {
    $_SESSION["mensaje"] = "Datos inválidos."; $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/usuarios/"); exit;
}

$checkDni = $pdo->prepare("SELECT COUNT(*) FROM tb_usuarios WHERE dni = :dni AND id_usuario <> :id");
$checkDni->execute([":dni"=>$dni, ":id"=>$id_usuario]);
if ((int)$checkDni->fetchColumn() > 0) { $_SESSION["mensaje"]="El DNI ya pertenece a otro trabajador."; $_SESSION["icono"]="warning"; header("Location: " . $URL . "/usuarios/update.php?id=".$id_usuario); exit; }

$check = $pdo->prepare("SELECT COUNT(*) FROM tb_usuarios WHERE email = :email AND id_usuario <> :id");
$check->execute([":email"=>$email, ":id"=>$id_usuario]);
if ((int)$check->fetchColumn() > 0) {
    $_SESSION["mensaje"] = "El correo ya pertenece a otro usuario."; $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/usuarios/update.php?id=".$id_usuario); exit;
}

if ($password_user !== "") {
    if ($password_user !== $password_repeat) {
        $_SESSION["mensaje"] = "Las contraseñas no coinciden."; $_SESSION["icono"] = "error";
        header("Location: " . $URL . "/usuarios/update.php?id=".$id_usuario); exit;
    }
    $stmt = $pdo->prepare("UPDATE tb_usuarios SET dni=:dni, nombres=:nombres, apellidos=:apellidos, email=:email, Id_rol=:rol, password=:password, fyh_actualizacion=:fecha WHERE id_usuario=:id");
    $stmt->execute([":dni"=>$dni, ":nombres"=>$nombre, ":apellidos"=>$apellidos, ":email"=>$email, ":rol"=>$rol, ":password"=>password_hash($password_user, PASSWORD_DEFAULT), ":fecha"=>$fechaHora, ":id"=>$id_usuario]);
} else {
    $stmt = $pdo->prepare("UPDATE tb_usuarios SET dni=:dni, nombres=:nombres, apellidos=:apellidos, email=:email, Id_rol=:rol, fyh_actualizacion=:fecha WHERE id_usuario=:id");
    $stmt->execute([":dni"=>$dni, ":nombres"=>$nombre, ":apellidos"=>$apellidos, ":email"=>$email, ":rol"=>$rol, ":fecha"=>$fechaHora, ":id"=>$id_usuario]);
}

$_SESSION["mensaje"] = "Usuario actualizado correctamente."; $_SESSION["icono"] = "success";
header("Location: " . $URL . "/usuarios/"); exit;
