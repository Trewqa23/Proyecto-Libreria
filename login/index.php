<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistema Librería | Acceso</title>
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/tintero.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body.login-page {
            background: linear-gradient(135deg, #eaf2ff 0%, #f7f9fc 55%, #edf7f4 100%)
        }

        .login-box {
            width: 400px;
            max-width: 94%
        }

        .login-card {
            border: 0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 55px rgba(31, 54, 88, .18)
        }

        .brand-panel {
            padding: 26px 28px 18px;
            text-align: center;
            background: #fff
        }

        .brand-panel img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .15)
        }

        .brand-panel h3 {
            font-weight: 700;
            margin: 14px 0 3px
        }

        .card-body {
            padding: 10px 32px 30px
        }

        .form-control,
        .input-group-text {
            height: 48px
        }

        .btn-login {
            height: 48px;
            border-radius: 10px;
            font-weight: 600
        }

        .input-group-text {
            border-radius: 0 10px 10px 0
        }

        .form-control {
            border-radius: 10px 0 0 10px
        }
    </style>
</head>

<body class="hold-transition login-page">
    <?php session_start();
    $m = $_SESSION['mensaje'] ?? null;
    $i = $_SESSION['icono'] ?? 'error';
    unset($_SESSION['mensaje'], $_SESSION['icono']); ?>
    <div class="login-box">
        <div class="card login-card">
            <div class="brand-panel"><img src="../public/templates/AdminLTE-3.2.0/dist/img/0902a028-64a3-4629-afbc-0b3da9604a88.jpg" alt="Logo">
                <h3>Librería EduStore</h3><span class="text-muted">Sistema de gestión</span>
            </div>
            <div class="card-body">
                <p class="text-center text-muted mb-4">Ingresa con las credenciales asignadas</p>
                <form action="../app/controller/login/Ingreso.php" method="post">
                    <div class="input-group mb-3"><input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-4"><input type="password" name="password_user" class="form-control" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div><button class="btn btn-primary btn-block btn-login"><i class="fas fa-sign-in-alt mr-2"></i>Iniciar sesión</button>
                </form>
                <div class="text-center mt-4"><a href="../recuperar/"><i class="fas fa-key mr-1"></i>¿Olvidaste tu contraseña?</a></div>
                <hr><small class="text-muted d-block text-center"><i class="fas fa-shield-alt mr-1"></i>Acceso exclusivo para personal autorizado</small>
            </div>
        </div>
    </div>
    <?php if ($m): ?><script>
            Swal.fire({
                icon: <?= json_encode($i) ?>,
                title: 'Sistema de Librería',
                text: <?= json_encode($m) ?>
            });
        </script><?php endif; ?>
    <script src="../public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <script src="../public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>