<?php
require_once('../../config.php'); session_start();
$email=$_SESSION['recuperacion_email']??''; if (empty($_SESSION['recuperacion_verificada']) || $email==='') { header('Location: '.$URL.'/recuperar/'); exit; }
$p=$_POST['password']??''; $r=$_POST['password_repeat']??'';
if (strlen($p)<6 || $p!==$r) { $_SESSION['recuperar_mensaje']=$p!==$r?'Las contraseñas no coinciden.':'La contraseña debe tener al menos 6 caracteres.'; header('Location: '.$URL.'/recuperar/nueva_clave.php'); exit; }
$hash=password_hash($p,PASSWORD_DEFAULT); $stmt=$pdo->prepare("UPDATE tb_usuarios SET password=:password, token='', token_expira=NULL, fyh_actualizacion=:fecha WHERE email=:email"); $stmt->execute([':password'=>$hash,':fecha'=>$fechaHora,':email'=>$email]);
unset($_SESSION['recuperacion_email'],$_SESSION['recuperacion_verificada']); $_SESSION['mensaje']='Contraseña restablecida correctamente. Ya puedes iniciar sesión.'; $_SESSION['icono']='success'; header('Location: '.$URL.'/login/'); exit;
