<?php session_start();
require_once('../app/config.php');
if (empty($_SESSION['recuperacion_verificada']) || empty($_SESSION['recuperacion_email'])) {
    header('Location: ' . $URL . '/recuperar/');
    exit;
}
$mensaje = $_SESSION['recuperar_mensaje'] ?? null;
unset($_SESSION['recuperar_mensaje']); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Nueva contraseña | El Tintero</title>
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/tintero.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page auth-bg">
    <div class="login-box" style="width:420px;max-width:94%">
        <div class="card auth-card">
            <div class="auth-head">
                <div class="auth-icon"><i class="fas fa-key"></i></div>
                <h4>Crea una nueva contraseña</h4><small>Tu código ya fue verificado</small>
            </div>
            <div class="card-body p-4">
                <form action="../app/controller/login/restablecer_clave.php" method="post">
                    <div class="form-group"><label>Nueva contraseña</label><input type="password" class="form-control" name="password" minlength="6" required></div>
                    <div class="form-group"><label>Confirmar contraseña</label><input type="password" class="form-control" name="password_repeat" minlength="6" required></div><button class="btn btn-success btn-block py-2"><i class="fas fa-save mr-1"></i>Guardar nueva contraseña</button>
                </form>
            </div>
        </div>
    </div><?php if ($mensaje): ?><script>
            Swal.fire({
                icon: 'error',
                text: <?= json_encode($mensaje) ?>
            });
        </script><?php endif; ?>
</body>

</html>