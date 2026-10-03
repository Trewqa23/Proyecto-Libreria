<?php session_start();
require_once('../app/config.php');
$mensaje = $_SESSION['recuperar_mensaje'] ?? null;
$icono = $_SESSION['recuperar_icono'] ?? 'info';
unset($_SESSION['recuperar_mensaje'], $_SESSION['recuperar_icono']); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Recuperar contraseña | El Tintero</title>
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/tintero.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page auth-bg">
    <div class="login-box" style="width:420px;max-width:94%">
        <div class="card auth-card">
            <div class="auth-head">
                <div class="auth-icon"><i class="fas fa-envelope-open-text"></i></div>
                <h4 class="mb-1">Recuperar contraseña</h4><small>Te enviaremos un código de verificación</small>
            </div>
            <div class="card-body p-4">
                <p class="text-muted text-center mb-4">Ingresa el correo registrado en el sistema.</p>
                <form action="../app/controller/login/solicitar_recuperacion.php" method="post">
                    <div class="form-group"><label>Correo electrónico</label>
                        <div class="input-group"><input type="email" name="email" class="form-control" placeholder="trabajador@correo.com" required>
                            <div class="input-group-append"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                        </div>
                    </div><button class="btn btn-primary btn-block py-2"><i class="fas fa-paper-plane mr-2"></i>Enviar código</button>
                </form>
                <div class="text-center mt-4"><a href="../login/"><i class="fas fa-arrow-left mr-1"></i>Volver al inicio de sesión</a></div>
            </div>
        </div>
    </div><?php if ($mensaje): ?><script>
            Swal.fire({
                icon: <?= json_encode($icono) ?>,
                title: 'Recuperación de acceso',
                text: <?= json_encode($mensaje) ?>
            });
        </script><?php endif; ?>
</body>

</html>