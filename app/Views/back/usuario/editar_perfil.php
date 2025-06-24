<?php $errors = session('errors') ?? []; ?>

<?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= esc(session()->getFlashdata('error')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>


<?php if (session()->getFlashdata('mensaje')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= esc(session()->getFlashdata('mensaje')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>


<?php if (session()->getFlashdata('msg_baja_error')): ?>
  <div class="alert alert-danger alert-dismissible fade show mensaje-flash" role="alert">
    <?= esc(session()->getFlashdata('msg_baja_error')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>

<form action="<?= base_url('perfil/actualizar') ?>" method="post" class="needs-validation" novalidate>
  <?= csrf_field() ?>

  <div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4 position-relative" style="width: 100%; max-width: 800px; border-radius: 16px;">

      <a href="<?= base_url('panel/perfil') ?>" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Cerrar"></a>

      <h4 class="text-center mb-4 text-primary fw-bold">EDITAR USUARIO</h4>

      <div class="text-center mb-4">
        <p class="mb-0 text-muted fw-semibold">
          ID <?= esc($usuario['id_usuario']) ?> - <?= esc($usuario['nombre']) ?> <?= esc($usuario['apellido']) ?>
        </p>
      </div>

      <div class="row g-3">
        <!-- Nombre -->
        <div class="col-md-6">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control <?= isset($errors['nombre']) ? 'is-invalid' : '' ?>" id="nombre" name="nombre"
            value="<?= old('nombre') ?? esc($usuario['nombre']); ?>" required>
          <div class="invalid-feedback">
            <?= isset($errors['nombre']) ? esc($errors['nombre']) : 'Por favor ingresa un nombre válido.' ?>
          </div>
        </div>

        <!-- Apellido -->
        <div class="col-md-6">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control <?= isset($errors['apellido']) ? 'is-invalid' : '' ?>" id="apellido" name="apellido"
            value="<?= old('apellido') ?? esc($usuario['apellido']); ?>" required>
          <div class="invalid-feedback">
            <?= isset($errors['apellido']) ? esc($errors['apellido']) : 'Por favor ingresa un apellido válido.' ?>
          </div>
        </div>

        <!-- Usuario -->
        <div class="col-md-6">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text" class="form-control <?= isset($errors['usuario']) ? 'is-invalid' : '' ?>" id="usuario" name="usuario"
            value="<?= old('usuario') ?? esc($usuario['usuario']); ?>" required>
          <div class="invalid-feedback">
            <?= isset($errors['usuario']) ? esc($errors['usuario']) : 'Por favor ingresa un nombre de usuario válido.' ?>
          </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email"
            value="<?= old('email') ?? esc($usuario['email']); ?>" required>
          <div class="invalid-feedback">
            <?= isset($errors['email']) ? esc($errors['email']) : 'Por favor ingresa un email válido.' ?>
          </div>
        </div>

        <!-- Botones -->
        <div class="col-12 mt-3 d-flex gap-3">
          <button type="button" id="btnGuardar" class="btn btn-primary w-50 fw-semibold py-2 rounded-pill">
            Guardar
          </button>
          <a href="#" id="btnBorrar" class="btn btn-outline-secondary w-50 fw-semibold py-2 rounded-pill">
            Borrar
          </a>
        </div>
      </div>
    </div>
  </div>
</form>

<script src="<?= base_url('assets/js/editar_usuario.js') ?>"></script>