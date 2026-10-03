<?php

if (!isset($id_rol_session) || (int)$id_rol_session !== 1) {
    $_SESSION["mensaje"] = "No tiene permisos para acceder a esta sección.";
    $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/index.php");
    exit;
}
