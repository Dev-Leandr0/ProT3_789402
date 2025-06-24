<?php if (isset($_COOKIE['msg_login'])): ?>
  <div class="notificaciones">
    <?= esc($_COOKIE['msg_login']) ?>
  </div>
  <?php setcookie('msg_login', '', time() - 3600, '/'); ?>
<?php endif; ?>

<div class="contenedor-bienvenida">
  <div class="bloque-bienvenida animacion-entrada">

    <h3 class="titulo-bienvenida">¡Bienvenido a Red Bull Racing!</h3>

    <p class="subtitulo-bienvenida">
      Tu cuenta está lista para la carrera
    </p>

    <?php if (session()->get('nombre')): ?>
      <p class="nombre-usuario">
        Usuario: <strong><?= esc(session()->get('nombre')); ?></strong>
      </p>

    <?php endif; ?>

    <?php if (session()->perfil_id == 1): ?>
      <img src="<?= base_url('assets/img/perfil/usuarios/admin.png') ?>"
        class="imagen-perfil perfil-admin"
        alt="Perfil Administrador">
      <p class="rol-usuario rol-admin">Administrador</p>

    <?php elseif (session()->perfil_id == 2): ?>
      <img src="<?= base_url('assets/img/perfil/usuarios/cliente.png') ?>"
        class="imagen-perfil perfil-cliente"
        alt="Perfil Cliente">
      <p class="rol-usuario rol-cliente">Cliente</p>
    <?php endif; ?>

    <a href="<?= base_url('panel/perfil'); ?>" class="boton-cerrar-sesion">
      Ver perfil
    </a>
    <a href="<?= base_url('logout'); ?>" class="boton-cerrar-sesion">
      Cerrar sesión
    </a>

  </div>

</div>