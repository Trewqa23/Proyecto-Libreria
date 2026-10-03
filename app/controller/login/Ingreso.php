<?php
require_once("../../config.php");
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: " . $URL . "/login/"); exit; }
$email = strtolower(trim($_POST["email"] ?? ""));
$password_user = $_POST["password_user"] ?? "";
$stmt = $pdo->prepare("SELECT id_usuario,email,password,cambiar_password FROM tb_usuarios WHERE email=:email LIMIT 1");
$stmt->execute([":email"=>$email]); $usuario=$stmt->fetch();
if ($usuario && password_verify($password_user,$usuario["password"])) {
    session_start(); session_regenerate_id(true); $_SESSION["sesion_email"]=$usuario["email"];
    unset($_SESSION["mensaje"],$_SESSION["icono"]);
    header("Location: " . $URL . ((int)$usuario['cambiar_password']===1 ? "/primer_acceso.php" : "/index.php")); exit;
}
session_start(); $_SESSION["mensaje"]="Email o contraseña incorrectos."; $_SESSION["icono"]="error";
header("Location: " . $URL . "/login/"); exit;
