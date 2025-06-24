<!-- Contenedor principal-->
<div class="container mt-5 mb-5" style="max-width: 700px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

  <div class="card shadow-sm border-0">

    <!-- Encabezado de la tarjeta -->
    <div class="card-header bg-secondary text-white text-center">

      <!-- Nombre completo del usuario -->
      <h3 class="fw-bold mb-0"><?= esc($usuario['nombre']) ?> <?= esc($usuario['apellido']) ?></h3>

      <!-- Se muestra si es administrador o cliente -->
      <small class="fst-italic"><?= esc($usuario['perfil_id'] == 1 ? 'Administrador' : 'Cliente') ?></small>
    </div>

    <!-- Tarjeta donde va la info personal -->
    <div class="card-body bg-white">
      <h5 class="card-title border-bottom pb-2 mb-4 text-primary">Información Personal</h5>

      <!-- Lista de datos -->
      <dl class="row mb-0">
        <dt class="col-sm-4 fw-semibold text-secondary">Apellido:</dt>
        <dd class="col-sm-8"><?= esc($usuario['apellido']) ?></dd>

        <dt class="col-sm-4 fw-semibold text-secondary">Nombre:</dt>
        <dd class="col-sm-8"><?= esc($usuario['nombre']) ?></dd>

        <dt class="col-sm-4 fw-semibold text-secondary">Usuario:</dt>
        <dd class="col-sm-8"><?= esc($usuario['usuario']) ?></dd>

        <dt class="col-sm-4 fw-semibold text-secondary">Email:</dt>
        <dd class="col-sm-8"><?= esc($usuario['email']) ?></dd>

        <dt class="col-sm-4 fw-semibold text-secondary">Estado:</dt>
        <dd class="col-sm-8">

          <!-- Se muestra un cartelito verde o rojo según si está activo o inactivo -->
          <span class="badge <?= $usuario['baja'] == 'NO' ? 'bg-success' : 'bg-danger' ?>">
            <?= esc($usuario['baja'] == 'NO' ? 'Activo' : 'Inactivo') ?>
          </span>
        </dd>
      </dl>
    </div>
    <div class="card-footer bg-light">
      <div class="d-flex justify-content-between">
        <!-- Botón para volver al listado de usuarios -->
        <a href="<?= base_url('panel') ?>" class="btn btn-outline-primary btn-sm px-4">
          Volver
        </a>
        <!-- Botón para editar el perfil -->
        <a href="<?= base_url('perfil/editar') ?>" class="btn btn-primary btn-sm px-4">
          Editar perfil
        </a>
      </div>
    </div>

    <!-- Pie de la tarjeta con botones para volver o editar -->

  </div>
</div>