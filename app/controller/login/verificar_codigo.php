<?php
require_once('../../config.php'); session_start();
$email=$_SESSION['recuperacion_email']??''; $codigo=trim($_POST['codigo']??'');
if ($email==='' || !preg_match('/^\d{6}$/',$codigo)) { $_SESSION['recuperar_mensaje']='Código inválido.'; $_SESSION['recuperar_icono']='error'; header('Location: '.$URL.'/recuperar/verificar.php'); exit; }
$stmt=$pdo->prepare('SELECT token, token_expira FROM tb_usuarios WHERE email=:email LIMIT 1'); $stmt->execute([':email'=>$email]); $u=$stmt->fetch();
$valido=$u && !empty($u['token']) && !empty($u['token_expira']) && strtotime($u['token_expira'])>=time() && password_verify($codigo,$u['token']);
if (!$valido) { $_SESSION['recuperar_mensaje']='El código es incorrecto o ya venció.'; $_SESSION['recuperar_icono']='error'; header('Location: '.$URL.'/recuperar/verificar.php'); exit; }
$_SESSION['recuperacion_verificada']=true; header('Location: '.$URL.'/recuperar/nueva_clave.php'); exit;
