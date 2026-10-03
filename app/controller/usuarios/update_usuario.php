<?php
$id_usuario_get=(int)($_GET['id']??0);
$stmt=$pdo->prepare("SELECT us.id_usuario,us.dni,us.nombres,us.apellidos,us.email,us.cambiar_password,rol.rol FROM tb_usuarios us INNER JOIN tb_roles rol ON us.Id_rol=rol.Id_rol WHERE us.id_usuario=:id LIMIT 1");
$stmt->execute([':id'=>$id_usuario_get]); $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$usuario){ header('Location: '.$URL.'/usuarios/'); exit; }
$dni=$usuario['dni']??''; $nombres=$usuario['nombres']??''; $apellidos=$usuario['apellidos']??''; $email=$usuario['email']??''; $rol=$usuario['rol']??''; $cambiar_password=(int)($usuario['cambiar_password']??0);
