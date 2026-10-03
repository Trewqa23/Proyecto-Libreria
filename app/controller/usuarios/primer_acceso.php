<?php
require_once('../../config.php'); session_start();
if (!isset($_SESSION['sesion_email'])) { header('Location: '.$URL.'/login/'); exit; }
$p=$_POST['password_nueva']??''; $r=$_POST['password_repeat']??'';
if (strlen($p)<8 || $p!==$r) {
    $_SESSION['mensaje']=$p!==$r?'Las contraseñas no coinciden.':'Usa una contraseña de al menos 8 caracteres.'; $_SESSION['icono']='warning';
    header('Location: '.$URL.'/primer_acceso.php'); exit;
}
$stmt=$pdo->prepare('UPDATE tb_usuarios SET password=:password,cambiar_password=0,fyh_actualizacion=:fecha WHERE email=:email');
$stmt->execute([':password'=>password_hash($p,PASSWORD_DEFAULT),':fecha'=>$fechaHora,':email'=>$_SESSION['sesion_email']]);
$_SESSION['mensaje']='Contraseña personal creada correctamente. Bienvenido al sistema.'; $_SESSION['icono']='success';
header('Location: '.$URL.'/index.php'); exit;
