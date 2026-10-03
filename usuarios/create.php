<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../layaout/solo_admin.php');
include('../layaout/parte1.php');
include('../app/controller/roles/listado_roles.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1><i class="fas fa-user-plus text-primary mr-2"></i>Registrar trabajador</h1>
                    <p class="text-muted mb-0">El sistema generará una contraseña temporal y la enviará al correo registrado.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0" style="border-radius:16px;overflow:hidden">
                        <div class="card-header bg-primary py-3">
                            <h3 class="card-title"><i class="fas fa-id-card mr-2"></i>Datos del trabajador</h3>
                        </div>
                        <div class="card-body p-4">
                            <form action="../app/controller/usuarios/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label>DNI</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div><input type="text" name="dni" class="form-control" maxlength="8" minlength="8" pattern="[0-9]{8}" inputmode="numeric" placeholder="8 dígitos" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Nombres</label><input type="text" name="nombres" class="form-control" placeholder="Ej. Juan Carlos" required></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>Apellidos</label><input type="text" name="apellidos" class="form-control" placeholder="Ej. Pérez López" required></div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group"><label>Correo electrónico</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div><input type="email" name="email" class="form-control" placeholder="trabajador@correo.com" required>
                                            </div><small class="text-muted">Este correo será también su usuario de acceso.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group"><label>Rol asignado</label><select name="rol" class="form-control" required>
                                                <option value="">Seleccione un rol</option><?php foreach ($datosroles as $r): ?><option value="<?= (int)$r['Id_rol'] ?>"><?= htmlspecialchars($r['rol']) ?></option><?php endforeach; ?>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="alert alert-light border"><i class="fas fa-shield-alt text-primary mr-2"></i><strong>Acceso seguro:</strong> no necesitas escribir una contraseña. Se creará automáticamente y el trabajador deberá cambiarla en su primer ingreso.</div>
                                <div class="text-right"><a href="index.php" class="btn btn-light border mr-2"><i class="fas fa-times mr-1"></i>Cancelar</a><button type="submit" class="btn btn-primary px-4"><i class="fas fa-paper-plane mr-1"></i>Registrar y enviar acceso</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('../layaout/parte2.php');
include('../layaout/mensajes.php'); ?>