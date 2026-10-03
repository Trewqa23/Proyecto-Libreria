<?php
include('app/config.php');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['sesion_email'])) {
    header('Location: ' . $URL . '/login/');
    exit;
}
$stmt = $pdo->prepare('SELECT nombres,apellidos,cambiar_password FROM tb_usuarios WHERE email=:email LIMIT 1');
$stmt->execute([':email' => $_SESSION['sesion_email']]);
$u = $stmt->fetch();
if (!$u || (int)$u['cambiar_password'] !== 1) {
    header('Location: ' . $URL . '/index.php');
    exit;
}
$mensaje = $_SESSION['mensaje'] ?? null;
$icono = $_SESSION['icono'] ?? 'info';
unset($_SESSION['mensaje'], $_SESSION['icono']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Primer acceso</title>
    <link rel="stylesheet" href="public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="public/css/tintero.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(135deg, #eef4ff, #f8fafc)
        }

        .access-card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, .12);
            overflow: hidden
        }

        .access-head {
            background: #1f5fbf;
            color: #fff;
            padding: 26px
        }

        .form-control {
            height: 48px;
            border-radius: 10px
        }

        .btn {
            border-radius: 10px
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="width:420px;max-width:94%">
        <div class="card access-card">
            <div class="access-head text-center"><i class="fas fa-user-shield fa-3x mb-2"></i>
                <h4 class="mb-1">Primer inicio de sesión</h4><small>Hola, <?= htmlspecialchars(trim($u['nombres'] . ' ' . $u['apellidos'])) ?></small>
            </div>
            <div class="card-body p-4">
                <p class="text-muted">La contraseña recibida por correo es temporal. Crea ahora tu contraseña personal.</p>
                <form action="app/controller/usuarios/primer_acceso.php" method="post">
                    <div class="form-group"><label>Nueva contraseña</label><input type="password" name="password_nueva" class="form-control" minlength="8" required></div>
                    <div class="form-group"><label>Confirmar contraseña</label><input type="password" name="password_repeat" class="form-control" minlength="8" required></div><button class="btn btn-primary btn-block py-2"><i class="fas fa-key mr-1"></i> Guardar y continuar</button>
                </form>
            </div>
        </div>
    </div>
    <?php if ($mensaje): ?><script>
            Swal.fire({
                icon: <?= json_encode($icono) ?>,
                text: <?= json_encode($mensaje) ?>
            });
        </script><?php endif; ?>
</body>

</html>