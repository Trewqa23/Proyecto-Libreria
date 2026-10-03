<?php
$sql_usuarios="SELECT us.id_usuario,us.dni,us.nombres,us.apellidos,us.email,us.cambiar_password,rol.rol FROM tb_usuarios us INNER JOIN tb_roles rol ON us.Id_rol=rol.Id_rol";
$query_usuarios=$pdo->prepare($sql_usuarios); $query_usuarios->execute(); $datosusuarios=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);
