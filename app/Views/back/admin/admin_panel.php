<!-- mensaje de baja -->
<?php if (session()->getFlashdata('msg_baja')): ?>
  <div class="alert alert-success alert-dismissible fade show mensaje-flash" role="alert">
    <?= session()->getFlashdata('msg_baja') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>

<!-- mensaje baja de uno mismo -->
<?php if (session()->getFlashdata('msg_baja_error')): ?>
  <div class="alert alert-danger fw-semibold">
    <?= session()->getFlashdata('msg_baja_error') ?>
  </div>
<?php endif; ?>

<!-- mensaje de alta -->
<?php if (session()->getFlashdata('msg_alta')): ?>
  <div class="alert alert-success alert-dismissible fade show mensaje-flash" role="alert">
    <?= session()->getFlashdata('msg_alta') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>


<div class="container mt-5">
  <h2 class="mb-4"><?= esc($titulo) ?></h2>

  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <!-- Filtro de estado -->
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Mostrar: <?= esc(ucfirst($estado_actual)) ?>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item <?= $estado_actual == 'todos' ? 'active' : '' ?>" href="<?= base_url('admin') ?>">Todos</a></li>
        <li><a class="dropdown-item <?= $estado_actual == 'activos' ? 'active' : '' ?>" href="<?= base_url('admin?estado=activos') ?>">Activos</a></li>
        <li><a class="dropdown-item <?= $estado_actual == 'inactivos' ? 'active' : '' ?>" href="<?= base_url('admin?estado=inactivos') ?>">Inactivos</a></li>
      </ul>
    </div>

    <!-- Buscador -->
    <form class="d-flex" method="get" action="<?= base_url('admin') ?>">
      <!-- Mantener el estado seleccionado -->
      <input type="hidden" name="estado" value="<?= esc($estado_actual) ?>">
      <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar usuario..." value="<?= esc($busqueda_actual ?? '') ?>">
      <button class="btn btn-outline-secondary" type="submit">Buscar</button>
    </form>
  </div>

  <?php if (isset($usuarios) && count($usuarios) > 0): ?>
    <!-- Tabla de usuarios -->
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Baja</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td><?= esc($usuario['id_usuario']) ?></td>
              <td><?= esc($usuario['nombre']) ?></td>
              <td><?= esc($usuario['apellido']) ?></td>
              <td><?= esc($usuario['usuario']) ?></td>
              <td><?= esc($usuario['email']) ?></td>
              <td><?= esc($usuario['perfil_id'] == 1 ? 'Admin' : 'Cliente') ?></td>
              <td><?= esc($usuario['baja']) ?></td>
              <td>
                <?php if ($usuario['baja'] == 'NO'): ?>
                  <button class="btn btn-danger btn-sm btn-baja" data-url="<?= base_url('admin/baja/' . $usuario['id_usuario']) ?>">
                    Dar de baja
                  </button>
                <?php else: ?>
                  <button class="btn btn-success btn-sm btn-alta" data-url="<?= base_url('admin/alta/' . $usuario['id_usuario']) ?>">
                    Dar de alta
                  </button>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>


  <?php else: ?>
    <div class="alert alert-warning mt-4">
      <!-- mensaje de busqueda -->
      <?php if (!empty($busqueda_actual)): ?>
        No se encontraron resultados para "<strong><?= esc($busqueda_actual) ?></strong>"
        <?= $estado_actual != 'todos' ? 'en el filtro "' . esc($estado_actual) . '"' : '' ?>.
        <!-- Mensajes según el filtro -->
      <?php elseif ($estado_actual == 'activos'): ?>
        No hay usuarios activos en este momento.
      <?php elseif ($estado_actual == 'inactivos'): ?>
        No hay usuarios inactivos en este momento.
      <?php else: ?>
        No hay usuarios registrados.
      <?php endif; ?>
    </div>
  <?php endif; ?>

</div>

<script src="<?= base_url('assets/js/admin_panel.js') ?>"></script>