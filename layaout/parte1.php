<?php

// Valores de respaldo para análisis estático cuando este archivo se abre de forma independiente.
if (!isset($nombres_session)) {
  $nombres_session = '';
}
if (!isset($id_rol_session)) {
  $id_rol_session = 0;
}
if (!isset($rol_session)) { $rol_session = ''; }
if (!isset($apellidos_session)) { $apellidos_session = ''; }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sitema de Ventas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/css/tintero.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- jQuery -->
  <script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <div class="wrapper">



      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">SISTEMA DE VENTAS</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo $URL; ?>" class="brand-link">
          <img src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/img/0902a028-64a3-4629-afbc-0b3da9604a88.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">
            <?php echo htmlspecialchars($rol_session); ?>
          </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
              <a href="<?php echo $URL; ?>/perfil.php" class="d-block"><?php echo htmlspecialchars(trim($nombres_session . ' ' . $apellidos_session)); ?></a>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


              <?php if ((int)$id_rol_session === 1): ?>
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      USUARIOS
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo $URL; ?>/usuarios" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Listado de Usuarios</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo $URL; ?>/usuarios/create.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Creacion de Usuarios</p>
                      </a>
                    </li>
                  </ul>
                </li>


                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                      ROLES
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo $URL; ?>/roles" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Listado de Roles</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo $URL; ?>/roles/create.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Creacion de Roles</p>
                      </a>
                    </li>
                  </ul>
                </li>






              <?php endif; ?>

              <li class="nav-item">
                <a href="<?php echo $URL; ?>/perfil.php" class="nav-link">
                  <i class="nav-icon fas fa-user-circle"></i>
                  <p>Mi perfil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo $URL; ?>/app/controller/login/cerrar_sesion.php" class="nav-link">
                  <i class="nav-icon fas fa-door-closed"></i>
                  <p>
                    Cerrar Sesión
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>