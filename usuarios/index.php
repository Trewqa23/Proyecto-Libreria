<?php

include('../app/config.php');

// Variables inicializadas para el analizador estático; sesion.php las reemplaza con los datos reales.
$id_usuario = 0;

include('../layaout/sesion.php');
include('../layaout/solo_admin.php');
include('../layaout/parte1.php');
include('../app/controller/usuarios/listadodeusuarios.php');



?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-users text-primary mr-2"></i>Trabajadores</h1><p class="page-subtitle">Administra las cuentas, roles y estados de acceso.</p>
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
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Trabajadores registrados</h3><div class="card-tools"><a href="create.php" class="btn btn-light btn-sm"><i class="fas fa-user-plus mr-1"></i>Nuevo trabajador</a></div>
              
            </div>
            <div class="card-body" style="display: block;">
              <table id="table_usuarios" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>
                      <center>Nro</center>
                    </th>
                    <th>
                      <center>DNI</center>
                    </th>
                    <th>
                      <center>Trabajador</center>
                    </th>
                    <th>
                      <center>Correo</center>
                    </th>
                    <th><center>Rol</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($datosusuarios as $usuario) { 
                    $id_usuario = $usuario['id_usuario']; ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1; ?></td>
                      <td><?= htmlspecialchars($usuario['dni'] ?? '-') ?></td>
                      <td><?= htmlspecialchars(trim(($usuario['nombres'] ?? '').' '.($usuario['apellidos'] ?? ''))) ?></td>
                      <td><?= htmlspecialchars($usuario['email']) ?></td>
                      <td><center><?= htmlspecialchars($usuario['rol']) ?></center></td>
                      <td><center><?php if((int)($usuario['cambiar_password']??0)===1): ?><span class="badge badge-warning">Primer acceso pendiente</span><?php else: ?><span class="badge badge-success">Activo</span><?php endif; ?></center></td>
                      <td>
                        <center>
                          <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-info action-icon"> <i class="fa fa-eye"></i></a>
                          <a href="update.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-success action-icon"> <i class="fa fa-pencil-alt"></i></a>
                          <a href="delete.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger action-icon"> <i class="fa fa-trash"></i></a>
                        </center>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
                
              </table>
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
<script>
  $(function() {
  $("#table_usuarios").DataTable({
    "pageLength": 5,
    "language": {
      "emptyTable": "No hay información",
      "decimal": "",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
      "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
      "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Usuarios",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron resultados",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": [{
      extend: 'collection',
      text: 'Reportes',
      buttons: [
        { text: 'Copiar', extend: 'copy' },
        { extend: 'pdf' },
        { extend: 'csv' },
        { extend: 'excel' },
        { text: 'Imprimir', extend: 'print' }
      ]
    },
    {
      extend: 'colvis',
      text: 'Visibilidad de columnas'
    }]
  }).buttons().container().appendTo('#table_usuarios_wrapper .col-md-6:eq(0)');
});

</script>


