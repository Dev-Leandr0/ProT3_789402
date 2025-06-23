<!-- ============================================================================ -->
<!-- Mensajes Flash -->
<!-- ============================================================================ -->

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
<!-- ============================================================================ -->

<div class="container mt-5">
  <h2 class="mb-4"><?= esc($titulo) ?></h2>

  <!-- ============================================================================ -->
  <!-- Contenedor Principal Botones de filtro y cuadro de Búsqueda -->
  <!-- ============================================================================ -->
  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

    <!-- ============================================================================ -->
    <!-- Contenedor Botones de filtro -->
    <!-- ============================================================================ -->
    <div class="d-flex flex-wrap gap-2">

      <!--Botón Mostrar: Todos/Activos/Inactivos -->

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

      <!--Botón Perfil: Todos/Admin/Cliente -->
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

    <!--Caja de Búsqueda Botón Buscador -->
    <form class="d-flex" method="get" action="<?= base_url('admin') ?>">

      <input type="hidden" name="estado" value="<?= esc($estado_actual) ?>">
      <input type="hidden" name="perfil" value="<?= esc($perfil_actual) ?>">

      <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar usuario..." value="<?= esc($busqueda_actual ?? '') ?>">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </form>
  </div>

  <!-- ============================================================================ -->
  <!-- Tabla  -->
  <!-- ============================================================================ -->

  <?php if (isset($usuarios) && count($usuarios) > 0): ?>

    <div class="table-responsive">

      <table class="table table-striped table-hover">

        <!-- ============================================================================ -->
        <!-- Config ordenar Tabla -->
        <!-- ============================================================================ -->
        <thead class="table-dark">
          <tr>
            <!-- Funcion para ordenar -->
            <?php
            function th_ordenable($campo, $label, $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual)
            {
              $nueva_direccion = ($orden_actual == $campo && $direccion_actual == 'asc') ? 'desc' : 'asc';

              $url = base_url('admin?estado=' . $estado_actual .
                '&buscar=' . urlencode($busqueda_actual) .
                '&perfil=' . urlencode($_GET['perfil'] ?? 'todos') .
                '&ordenar_por=' . $campo .
                '&orden_direccion=' . $nueva_direccion);

              $flecha = '';
              if ($orden_actual == $campo) {
                $icono = $direccion_actual === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill';
                $flecha = " <i class=\"bi $icono ms-1\"></i>";
              }

              return "<th><a href=\"$url\" class=\"text-white text-decoration-none\"><span class=\"d-inline-flex align-items-center\">$label$flecha</span></a></th>";
            }
            ?>
            <?= th_ordenable('id_usuario', 'ID', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('nombre', 'Nombre', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('apellido', 'Apellido', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('usuario', 'Usuario', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <?= th_ordenable('email', 'Email', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <th>Perfil</th>
            <?= th_ordenable('baja', 'Estado', $estado_actual, $busqueda_actual, $orden_actual, $direccion_actual) ?>
            <th>Acción</th>
          </tr>
        </thead>

        <!-- ============================================================================ -->
        <!-- Config Front Tabla  -->
        <!-- ============================================================================ -->

        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td><?= esc($usuario['id_usuario']) ?></td>
              <td><?= esc($usuario['nombre']) ?></td>
              <td><?= esc($usuario['apellido']) ?></td>
              <td><?= esc($usuario['usuario']) ?></td>
              <td><?= esc($usuario['email']) ?></td>
              <td>
                <?php if ($usuario['perfil_id'] == 1): ?>
                  <span class="badge bg-primary fs-6">
                    <i class="bi bi-person-badge-fill"></i> <?= esc('Admin') ?>
                  </span>
                <?php else: ?>
                  <span class="badge bg-secondary fs-6">
                    <i class="bi bi-person-fill"></i> <?= esc('Cliente') ?>
                  </span>
                <?php endif; ?>
              </td>
              <td>
                <span class="badge <?= $usuario['baja'] === 'NO' ? 'bg-success' : 'bg-danger' ?> text-light fs-6">
                  <?php if ($usuario['baja'] === 'NO'): ?>
                    <i class="bi bi-check-circle-fill"></i> <?= esc('Activo') ?>
                  <?php else: ?>
                    <i class="bi bi-x-circle-fill"></i> <?= esc('Inactivo') ?>
                  <?php endif; ?>
                </span>
              </td>
              <td class="acciones text-nowrap">
                <div class="d-flex gap-2">
                  <a href="<?= esc(base_url('admin/ver/' . $usuario['id_usuario']), 'attr') ?>" class="btn btn-info btn-sm flex-shrink-0">
                    <i class="bi bi-eye fs-6"></i> <?= esc('Ver') ?>
                  </a>

                  <a href="<?= esc(base_url('admin/editar/' . $usuario['id_usuario']), 'attr') ?>" class="btn btn-warning btn-sm flex-shrink-0">
                    <i class="bi bi-pencil fs-6"></i> <?= esc('Editar') ?>
                  </a>

                  <?php if ($usuario['baja'] == 'NO'): ?>
                    <button class="btn btn-danger btn-sm btn-baja flex-shrink-0"
                      data-url="<?= esc(base_url('admin/baja/' . $usuario['id_usuario']), 'attr') ?>">
                      <i class="bi bi-person-dash fs-6"></i> <?= esc('Dar de baja') ?>
                    </button>
                  <?php else: ?>
                    <button class="btn btn-success btn-sm btn-alta flex-shrink-0"
                      data-url="<?= esc(base_url('admin/alta/' . $usuario['id_usuario']), 'attr') ?>">
                      <i class="bi bi-person-check fs-6"></i> <?= esc('Dar de alta') ?>
                    </button>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php if (isset($pager) && $pager): ?>
        <div class="d-flex justify-content-center mt-4">
          <?= $pager->links('usuarios', 'default_full') ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- ============================================================================ -->
    <!-- Mensajes dentro de la tabla -->
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

<!-- contiene los Sweetalert de la tabla 
        - Mensaje de aviso de confirmación Alta y Baja
-->
<script src="<?= base_url('assets/js/admin_panel.js') ?>"></script>

<!-- ============================================================================ -->
<!-- 13/06 se agrego alta y baja -->
<!-- 13/06 se agrego js personalizado -->
<!-- 14/06 se agrego botón desplegable -->
<!-- 17/06 se agrego ordenar por campo  -->
<!-- 17/06 se agrego contenedor para los botones -->
<!-- 18/06 se agrego cambios en los nombres de la tabla bajo por estado y SI-NO por activo e inactivo-->
<!-- 18/06 se agrego iconos a Activos-Inactivos, Ver/Editar/Baja-Alta -->
<!-- 18/06 se agrego color a Activos-Inactivos, Ver/Editar/Baja-Alta -->
<!-- 18/06 se agrego Nueva documentación al php -->