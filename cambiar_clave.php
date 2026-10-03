<?php include("app/config.php");
include("layaout/sesion.php");
include("layaout/parte1.php"); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><i class="fas fa-key text-warning mr-2"></i>Cambiar contraseña</h1>
            <p class="page-subtitle">Actualiza tu clave de acceso de forma segura.</p>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h3 class="card-title"><i class="fas fa-shield-alt mr-2"></i>Seguridad de la cuenta</h3>
                        </div>
                        <form action="app/controller/usuarios/cambiar_clave.php" method="post">
                            <div class="card-body p-4">
                                <div class="alert alert-light border"><i class="fas fa-info-circle text-warning mr-2"></i>Usa una contraseña que no compartas con otras cuentas.</div>
                                <div class="form-group"><label>Contraseña actual</label>
                                    <div class="input-group"><input type="password" name="password_actual" class="form-control" required>
                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
                                    </div>
                                </div>
                                <div class="form-group"><label>Nueva contraseña</label><input type="password" name="password_nueva" class="form-control" minlength="6" placeholder="Mínimo 6 caracteres" required></div>
                                <div class="form-group"><label>Confirmar nueva contraseña</label><input type="password" name="password_repeat" class="form-control" minlength="6" required></div>
                            </div>
                            <div class="card-footer bg-white text-right"><a href="perfil.php" class="btn btn-light border mr-2">Cancelar</a><button class="btn btn-warning" type="submit"><i class="fas fa-save mr-1"></i>Actualizar contraseña</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("layaout/parte2.php");
include("layaout/mensajes.php"); ?>