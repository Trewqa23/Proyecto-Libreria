<?php include('../app/config.php');
include('../layaout/sesion.php');
include('../layaout/solo_admin.php');
include('../layaout/parte1.php');
include('../app/controller/roles/listado_roles.php');
include('../app/controller/usuarios/update_usuario.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><i class="fas fa-user-edit text-success mr-2"></i>Editar trabajador</h1>
            <p class="page-subtitle">Actualiza los datos y el rol asignado.</p>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title"><i class="fas fa-address-card mr-2"></i>Datos del trabajador</h3>
                        </div>
                        <div class="card-body p-4">
                            <form action="../app/controller/usuarios/update.php" method="post"><input type="hidden" name="id_usuario" value="<?= (int)$id_usuario_get ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label>DNI</label><input type="text" name="dni" class="form-control" maxlength="8" pattern="[0-9]{8}" value="<?= htmlspecialchars($dni) ?>" required></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Nombres</label><input type="text" name="nombres" class="form-control" value="<?= htmlspecialchars($nombres) ?>" required></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Apellidos</label><input type="text" name="apellidos" class="form-control" value="<?= htmlspecialchars($apellidos) ?>" required></div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group"><label>Correo electrónico</label><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group"><label>Rol</label><select name="rol" class="form-control" required><?php foreach ($datosroles as $r): ?><option value="<?= (int)$r['Id_rol'] ?>" <?= $r['rol'] === $rol ? 'selected' : '' ?>><?= htmlspecialchars($r['rol']) ?></option><?php endforeach; ?></select></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="alert alert-light border"><i class="fas fa-key text-success mr-2"></i>Deja los campos de contraseña vacíos si no deseas cambiarla.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Nueva contraseña (opcional)</label><input type="password" name="password_user" class="form-control" minlength="6"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label>Confirmar contraseña</label><input type="password" name="password_repeat" class="form-control" minlength="6"></div>
                                    </div>
                                </div>
                                <div class="text-right"><a href="index.php" class="btn btn-light border mr-2">Cancelar</a><button class="btn btn-success px-4"><i class="fas fa-save mr-1"></i>Guardar cambios</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php include('../layaout/parte2.php');
        include('../layaout/mensajes.php'); ?>