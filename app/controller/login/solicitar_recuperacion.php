<?php
require_once('../../config.php'); require_once('../../mail_config.php'); session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: '.$URL.'/recuperar/'); exit; }
$email=trim($_POST['email']??'');
if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { $_SESSION['recuperar_mensaje']='Ingresa un correo válido.'; $_SESSION['recuperar_icono']='warning'; header('Location: '.$URL.'/recuperar/'); exit; }
$stmt=$pdo->prepare('SELECT id_usuario FROM tb_usuarios WHERE email=:email LIMIT 1'); $stmt->execute([':email'=>$email]); $u=$stmt->fetch();
if (!$u) { $_SESSION['recuperar_mensaje']='No existe un usuario registrado con ese correo.'; $_SESSION['recuperar_icono']='error'; header('Location: '.$URL.'/recuperar/'); exit; }
$codigo=(string)random_int(100000,999999); $hash=password_hash($codigo,PASSWORD_DEFAULT); $expira=date('Y-m-d H:i:s',time()+600);
$up=$pdo->prepare('UPDATE tb_usuarios SET token=:token, token_expira=:expira WHERE id_usuario=:id'); $up->execute([':token'=>$hash,':expira'=>$expira,':id'=>$u['id_usuario']]);
$_SESSION['recuperacion_email']=$email; unset($_SESSION['recuperacion_verificada']);
if (enviarCodigoRecuperacion($email,$codigo)) { $_SESSION['recuperar_mensaje']='Se envió un código de 6 dígitos a tu correo. Vence en 10 minutos.'; $_SESSION['recuperar_icono']='success'; }
else { $_SESSION['recuperar_mensaje']='El código fue generado, pero XAMPP aún no tiene configurado el envío de correo. Revisa PHPMailer y la configuración SMTP en app/config/correo.php.'; $_SESSION['recuperar_icono']='warning'; }
header('Location: '.$URL.'/recuperar/verificar.php'); exit;
