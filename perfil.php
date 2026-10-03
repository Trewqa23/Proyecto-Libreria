<?php include("app/config.php");
include("layaout/sesion.php");
include("layaout/parte1.php"); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><i class="fas fa-user-circle text-primary mr-2"></i>Mi perfil</h1>
            <p class="page-subtitle">Consulta la información asociada a tu cuenta.</p>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="profile-avatar"><i class="fas fa-user"></i></div>
                                <h4 class="mt-3 mb-0"><?= htmlspecialchars(trim($nombres_session . ' ' . $apellidos_session)) ?></h4><span class="badge badge-primary mt-2"><?= htmlspecialchars($rol_session) ?></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-tile"><small>Nombre completo</small><strong><?= htmlspecialchars(trim($nombres_session . ' ' . $apellidos_session)) ?></strong></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-tile"><small>Correo electrónico</small><strong><?= htmlspecialchars($email_sesion) ?></strong></div>
                                </div>
                            </div>
                            <div class="info-tile"><small>Rol asignado</small><strong><?= htmlspecialchars($rol_session) ?></strong></div>
                            <div class="text-right mt-4"><a href="index.php" class="btn btn-light border mr-2"><i class="fas fa-arrow-left mr-1"></i>Volver</a><a href="cambiar_clave.php" class="btn btn-warning"><i class="fas fa-key mr-1"></i>Cambiar contraseña</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("layaout/parte2.php");
include("layaout/mensajes.php"); ?>