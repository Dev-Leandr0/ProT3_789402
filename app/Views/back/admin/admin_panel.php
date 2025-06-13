<!-- mensaje de baja -->
<?php if (session()->getFlashdata('msg_baja')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('msg_baja') ?>
  </div>
<?php endif; ?>

<div class="container mt-5">
  <h2 class="mb-4"><?= esc($titulo) ?></h2>

  <?php if (isset($usuarios) && count($usuarios) > 0): ?>
    <table class="table table-striped">
      <thead>
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
                <a href="<?= base_url('admin/baja/' . $usuario['id_usuario']) ?>" class="btn btn-danger btn-sm">Dar de baja</a>
              <?php else: ?>
                <span class="text-muted">Ya dado de baja</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No hay usuarios registrados.</p>
  <?php endif; ?>
</div>