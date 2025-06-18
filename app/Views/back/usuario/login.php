<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Mensaje flash -->
      <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-warning">
          <?= esc(session()->getFlashdata('msg')) ?>
        </div>
      <?php endif; ?>

      <!-- Validación -->
      <?php $validation = \Config\Services::validation(); ?>

      <!-- Inicio Formulario -->
      <form method="post" action="<?= base_url('/enviarlogin') ?>">
        <?= csrf_field(); ?>

        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label for="loginEmail" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="loginEmail" name="email"
              value="<?= esc(old('email')) ?>" required>

            <!-- Mensaje de Alerta -->
            <?php if ($validation->getError('email')): ?>
              <div class="alert alert-danger mt-2">
                <?= esc($validation->getError('email')); ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="loginPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="loginPassword" name="pass" required>

            <!-- Mensaje de Alerta -->
            <?php if ($validation->getError('pass')): ?>
              <div class="alert alert-danger mt-2">
                <?= esc($validation->getError('pass')); ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="recordarme" name="recordarme">
            <label class="form-check-label" for="recordarme">
              Recuérdame
            </label>
          </div>

          <div class="mb-3">
            <a href="#" class="link-primary">¿Olvidaste tu contraseña?</a>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-submit">Iniciar Sesión</button>
          <button type="reset" class="btn btn-secondary">Borrar</button>
        </div>
      </form>

      <div class="px-3 pb-3">
        <p class="registro">¿Aún no tienes cuenta? <a href="#" id="abrirRegistro">Registrarme</a></p>
      </div>
    </div>
  </div>
</div>