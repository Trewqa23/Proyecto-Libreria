<?php
require_once("../admin_guard.php");
session_start();
if (!isset($_SESSION["sesion_email"])) { header("Location: " . $URL . "/login/"); exit; }

$id_usuario = (int)($_POST["id_usuario"] ?? 0);
$stmt = $pdo->prepare("SELECT email FROM tb_usuarios WHERE id_usuario = :id");
$stmt->execute([":id"=>$id_usuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    $_SESSION["mensaje"] = "El usuario no existe."; $_SESSION["icono"] = "error";
    header("Location: " . $URL . "/usuarios/"); exit;
}
if ($usuario["email"] === $_SESSION["sesion_email"]) {
    $_SESSION["mensaje"] = "No puede eliminar su propio usuario mientras está conectado."; $_SESSION["icono"] = "warning";
    header("Location: " . $URL . "/usuarios/"); exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario = :id");
    $stmt->execute([":id"=>$id_usuario]);
    $_SESSION["mensaje"] = "Usuario eliminado correctamente."; $_SESSION["icono"] = "success";
} catch (PDOException $e) {
    $_SESSION["mensaje"] = "No se puede eliminar el usuario porque tiene registros relacionados."; $_SESSION["icono"] = "error";
}
header("Location: " . $URL . "/usuarios/"); exit;
