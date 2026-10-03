<?php include('../app/config.php');
include('../layaout/sesion.php');
include('../layaout/solo_admin.php');
include('../layaout/parte1.php');
include('../app/controller/usuarios/show_usuario.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><i class="fas fa-id-card text-info mr-2"></i>Detalle del trabajador</h1>
            <p class="page-subtitle">Información registrada y estado de acceso.</p>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="profile-avatar"><i class="fas fa-user-tie"></i></div>
                                <h4 class="mt-3 mb-1"><?= htmlspecialchars(trim($nombres . ' ' . $apellidos)) ?></h4><span class="badge badge-info"><?= htmlspecialchars($rol) ?></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-tile"><small>DNI</small><strong><?= htmlspecialchars($dni ?: '-') ?></strong></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-tile"><small>Correo</small><strong><?= htmlspecialchars($email) ?></strong></div>
                                </div>
                            </div>
                            <div class="info-tile"><small>Estado de cuenta</small><strong><?php if ($cambiar_password === 1): ?><span class="badge badge-warning">Primer acceso pendiente</span><?php else: ?><span class="badge badge-success">Activo</span><?php endif; ?></strong></div>
                            <div class="text-right mt-4"><a href="index.php" class="btn btn-light border mr-2"><i class="fas fa-arrow-left mr-1"></i>Volver</a><a href="update.php?id=<?= (int)$id_usuario_get ?>" class="btn btn-success"><i class="fas fa-edit mr-1"></i>Editar trabajador</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php include('../layaout/parte2.php');
        include('../layaout/mensajes.php'); ?>