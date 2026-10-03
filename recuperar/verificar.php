<?php session_start();
require_once('../app/config.php');
if (empty($_SESSION['recuperacion_email'])) {
    header('Location: ' . $URL . '/recuperar/');
    exit;
}
$mensaje = $_SESSION['recuperar_mensaje'] ?? null;
$icono = $_SESSION['recuperar_icono'] ?? 'error';
unset($_SESSION['recuperar_mensaje'], $_SESSION['recuperar_icono']); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Verificar código | El Tintero</title>
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/tintero.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page auth-bg">
    <div class="login-box" style="width:420px;max-width:94%">
        <div class="card auth-card">
            <div class="auth-head">
                <div class="auth-icon"><i class="fas fa-shield-alt"></i></div>
                <h4>Verifica tu identidad</h4><small>Código de seguridad de 6 dígitos</small>
            </div>
            <div class="card-body p-4">
                <p class="text-muted text-center">Revisa tu correo e ingresa el código recibido.</p>
                <form action="../app/controller/login/verificar_codigo.php" method="post"><input class="form-control text-center mb-3" style="font-size:1.45rem;letter-spacing:.35rem;height:54px" name="codigo" inputmode="numeric" pattern="[0-9]{6}" maxlength="6" placeholder="000000" required><button class="btn btn-primary btn-block py-2"><i class="fas fa-check-circle mr-1"></i>Verificar código</button></form>
                <div class="text-center mt-4"><a href="index.php">Solicitar otro código</a></div>
            </div>
        </div>
    </div><?php if ($mensaje): ?><script>
            Swal.fire({
                icon: <?= json_encode($icono) ?>,
                text: <?= json_encode($mensaje) ?>
            });
        </script><?php endif; ?>
</body>

</html>