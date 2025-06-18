<!-- mensaje de baja -->
<?php if (session()->getFlashdata('msg_baja')): ?>
  <div class="alert alert-success alert-dismissible fade show mensaje-flash" role="alert">
    <?= esc(session()->getFlashdata('msg_baja')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>

<!-- mensaje de alta -->
<?php if (session()->getFlashdata('msg_alta')): ?>
  <div class="alert alert-success alert-dismissible fade show mensaje-flash" role="alert">
    <?= esc(session()->getFlashdata('msg_alta')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>

<!-- mensaje baja de uno mismo -->
<?php if (session()->getFlashdata('msg_baja_error')): ?>
  <div class="alert alert-danger alert-dismissible fade show mensaje-flash" role="alert">
    <?= esc(session()->getFlashdata('msg_baja_error')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>

<!-- mensaje alta de uno mismo -->
<?php if (session()->getFlashdata('msg_alta_error')): ?>
  <div class="alert alert-danger alert-dismissible fade show mensaje-flash" role="alert">
    <?= esc(session()->getFlashdata('msg_alta_error')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>



<!-- ============================================================================ -->
<!-- Contenedor principal -->
<div class="container mt-5">
  <h2 class="mb-4"><?= esc($titulo) ?></h2>

  <!-- Contenedor de filtros y búsqueda -->
  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

    <!-- Filtros agrupados a la izquierda -->
    <div class="d-flex flex-wrap gap-2">
      <!-- Boton de filtro de estado desplegable -->
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Mostrar: <?= esc(ucfirst($estado_actual)) ?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item <?= $estado_actual == 'todos' ? 'active' : '' ?>" href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['estado' => 'todos'])) ?>">Todos</a></li>
          <li><a class="dropdown-item <?= $estado_actual == 'activos' ? 'active' : '' ?>" href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['estado' => 'activos'])) ?>">Activos</a></li>
          <li><a class="dropdown-item <?= $estado_actual == 'inactivos' ? 'active' : '' ?>" href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['estado' => 'inactivos'])) ?>">Inactivos</a></li>
        </ul>
      </div>

      <!-- Boton de filtro por perfil -->
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Perfil: <?= esc(ucfirst($perfil_actual)) ?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item <?= $perfil_actual == 'todos' ? 'active' : '' ?>" href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['perfil' => 'todos'])) ?>">Todos</a></li>
          <li><a class="dropdown-item <?= $perfil_actual == 'admin' ? 'active' : '' ?>" href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['perfil' => 'admin'])) ?>">Admin</a></li>
          <li><a class="dropdown-item <?= $perfil_actual == 'cliente' ? 'active' : '' ?>" href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['perfil' => 'cliente'])) ?>">Cliente</a></li>
        </ul>
      </div>
    </div>

    <!-- Buscador alineado a la derecha -->
    <form class="d-flex" method="get" action="<?= base_url('admin') ?>">

      <input type="hidden" name="estado" value="<?= esc($estado_actual) ?>">
      <input type="hidden" name="perfil" value="<?= esc($perfil_actual) ?>">

      <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar usuario..." value="<?= esc($busqueda_actual ?? '') ?>">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </form>
  </div>

  <!-- ============================================================================ -->

  <?php if (isset($usuarios) && count($usuarios) > 0): ?>

    <div class="table-responsive">
      <!-- Tabla de usuarios -->
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <?php
            function th_ordenable($campo, $label, $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual)
            {
              $nueva_direccion = ($orden_actual == $campo && $direccion_actual == 'asc') ? 'desc' : 'asc';
              $url = base_url('admin?estado=' . $estado_actual .
                '&buscar=' . urlencode($busqueda_actual) .
                '&ordenar_por=' . $campo .
                '&orden_direccion=' . $nueva_direccion);
              $flecha = '';
              if ($orden_actual == $campo) {
                $flecha = $direccion_actual == 'asc' ? ' ↑' : ' ↓';
              }
              return "<th><a href=\"$url\" class=\"text-white text-decoration-none\">$label$flecha</a></th>";
            }
            ?>

            <?= th_ordenable('id_usuario', 'ID', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('nombre', 'Nombre', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('apellido', 'Apellido', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('usuario', 'Usuario', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('email', 'Email', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <th>Perfil</th>
            <?= th_ordenable('baja', 'Baja', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
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

    <!-- ============================================================================ -->

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

<!-- contiene los Sweetalert de la tabla -->
<script src="<?= base_url('assets/js/admin_panel.js') ?>"></script>

<!-- ============================================================================ -->
<!-- 13/06 se agrego alta y baja -->
<!-- 13/06 se agrego js personalizado -->
<!-- 14/06 se agrego boton desplegable -->
<!-- 17/06 se agrego ordenar por campo  -->
<!-- 17/06 se agrego contenedor para los botones -->