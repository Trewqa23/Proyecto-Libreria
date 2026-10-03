<?php 

  include('../app/config.php');
  include('../layaout/sesion.php');
include('../layaout/solo_admin.php');
  include('../layaout/parte1.php'); 
  
  include('../app/controller/roles/update_roles.php');
  
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizacion de un Rol </h1>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-tiltle">Actualizar Rol</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                       <div class="row">
                          <div class="col-md-12">
                            <form action="../app/controller/roles/update.php" method="post">
                              <div class="form-group">
                                <input type="text" name="id_rol" value="<?php echo $id_rol_get; ?> " hidden>
                                <label for="">Nombre del Rol</label>
                                <input type="text" name="rol" class="form-control" value="<?php echo $rol; ?>" placeholder="Escribir el nombre aqui.........." required>
                            </div>
                            <hr>
                            <div class="form-group">
                              <a href="index.php" class="btn btn-secondary">caneclar</a>
                              <button type="submit" class="btn btn-success">Actualizar</button>
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
  
