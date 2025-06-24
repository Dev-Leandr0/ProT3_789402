<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Validación -->
      <?php $validation = \Config\Services::validation(); ?>

      <!-- Inicio Formulario -->
      <form method="post" action="<?= base_url('/enviar-form') ?>">
        <input type="hidden" name="page_origin" value="<?= esc($page_origin ?? 'index') ?>">
        <?= csrf_field(); ?>

        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Registro de Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <!-- Mensaje flash -->
        <?php if (!empty(session()->getFlashdata('fail'))): ?>
          <div class="alert alert-danger"><?= esc(session()->getFlashdata('fail')) ?></div>
        <?php endif; ?>

        <?php if (!empty(session()->getFlashdata('success'))): ?>
          <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif; ?>

        <div class="modal-body">

          <div class="mb-3">
            <label for="registerNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="registerNombre" name="nombre" placeholder="Nombre" value="<?= esc(old('nombre')) ?>">

            <!-- Alerta de error -->
            <?php if ($validation->getError('nombre')): ?>
              <div class='alert alert-danger mt-2'>
                <?= esc($validation->getError('nombre')) ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="registerApellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="registerApellido" name="apellido" placeholder="Apellido" value="<?= esc(old('apellido')) ?>">

            <!-- Alerta de error -->
            <?php if ($validation->getError('apellido')): ?>
              <div class='alert alert-danger mt-2'>
                <?= esc($validation->getError('apellido')) ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="registerUsuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="registerUsuario" name="usuario" placeholder="Usuario" value="<?= esc(old('usuario')) ?>">

            <!-- Alerta de error -->
            <?php if ($validation->getError('usuario')): ?>
              <div class='alert alert-danger mt-2'>
                <?= esc($validation->getError('usuario')) ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="registerEmail" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Email" value="<?= esc(old('email')) ?>">

            <!-- Alerta de error -->
            <?php if ($validation->getError('email')): ?>
              <div class='alert alert-danger mt-2'>
                <?= esc($validation->getError('email')) ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="registerPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="registerPassword" name="pass" placeholder="Contraseña">

            <!-- Alerta de error -->
            <?php if ($validation->getError('pass')): ?>
              <div class='alert alert-danger mt-2'>
                <?= esc($validation->getError('pass')) ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary">Registrarse</button>
          <button type="reset" class="btn btn-secondary">Borrar</button>
        </div>
      </form>
    </div>
  </div>
</div>