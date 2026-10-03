<?php

include('app/config.php');

// Variables inicializadas para el analizador estático; sesion.php las reemplaza con los datos reales.
$id_rol_session = 0;
$rol_session = '';
$nombres_session = '';
$apellidos_session = '';

include('layaout/sesion.php');
include('layaout/parte1.php');
if ((int)$id_rol_session === 1) {
  include('app/controller/usuarios/listadodeusuarios.php');
  include('app/controller/roles/listado_roles.php');
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">
            Bienvenido - <?php echo htmlspecialchars($nombres_session . ' ' . $apellidos_session); ?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Acciones de usuario</h3>
            </div>
            <div class="card-body">
              <p>Sesión iniciada como <strong><?php echo htmlspecialchars($nombres_session); ?></strong>.</p>
              <a href="<?php echo $URL; ?>/perfil.php" class="btn btn-info"><i class="fas fa-user"></i> Mi perfil</a>
              <a href="<?php echo $URL; ?>/cambiar_clave.php" class="btn btn-warning"><i class="fas fa-key"></i> Cambiar contraseña</a>
            </div>
          </div>
        </div>

        <?php if ((int)$id_rol_session === 1): ?>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_u = 0;
                foreach ($datosusuarios as $datousuario) {
                  $contador_u = $contador_u + 1;
                }
                ?>
                <h3><?php echo $contador_u  ?></h3>
                <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/usuarios/create.php">
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                Mas detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>




          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_r = 0;
                foreach ($datosroles as $datorol) {
                  $contador_r = $contador_r + 1;
                }
                ?>
                <h3><?php echo $contador_r  ?></h3>
                <p>Roles Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/roles/create.php">
                <div class="icon">
                  <i class="fas fa-address-card"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                Mas detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>


        <?php endif; ?>
      </div>

      <hr>








    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php include('layaout/parte2.php'); ?>