<?php

include('../app/config.php');
include('../layaout/sesion.php');
include('../layaout/solo_admin.php');
include('../layaout/parte1.php');
include('../app/controller/usuarios/show_usuario.php');


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Eliminar Usuario</h1>
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
        <div class="col-md-5">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-tiltle">¿Estas seguro de elminar este ususario?</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <div class="row">
                <div class="col-md-12">
                  <form action="../app/controller/usuarios/delete_usuario.php" method="post">
                    <div class="form-group">
                      <input type="text" name="id_usuario" value="<?php echo $id_usuario_get ?>" hidden>
                      <label for="">Nombres</label>
                      <input type="text" name="nombres" value="<?php echo $nombres ?>" class="form-control" placeholder="Escribir su nombre aqui.........." disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Escribir su email aqui.........." disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Rol</label>
                      <input type="text" name="rol" value="<?php echo $rol ?>" class="form-control" placeholder="Escribir su email aqui.........." disabled>
                    </div>
                    <hr>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">volver</a>
                      <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php
include('../layaout/parte2.php');
include('../layaout/mensajes.php');
?>