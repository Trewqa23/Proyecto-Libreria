<?php

include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];



$sentencia = $pdo->prepare("UPDATE tb_roles SET
        rol = :rol,
        fyh_actualizacion = :fyh_actualizacion
        WHERE Id_rol = :Id_rol");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('Id_rol', $id_rol);

if ($sentencia->execute()) {


    session_start();

    $_SESSION['mensaje'] = "Se Actualizo correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/roles/');
} else {
    session_start();

    $_SESSION['mensaje'] = "No se pudo actualizar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/roles/update.php?id='.$id_rol);
}
