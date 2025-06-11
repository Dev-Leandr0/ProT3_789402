<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<?php if (session()->perfil_id == 1): ?>
  <div class="btn btn-secondary active btnUser btn-sm">
    <a href="">ADMIN: <?php echo session('nombre'); ?></a>
  </div>


<?php elseif (session()->perfil_id == 2): ?>
  <div class="btn btn-info active btnUser btn-sm">
    <a href="">CLIENTE: <?php echo session('nombre'); ?></a>
  </div>

<?php else: ?>
<?php endif; ?>

<a href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a>

<nav class="navbar navbar-expand-lg sticky-top navbar-customizado ">
  <div class="container-fluid animate__animated animate__bounceInLeft">
    <a class="navbar-brand d-flex align-items-center animate__animated animate__pulse animate__delay-1s animate__infinite" href="<?= site_url('principal') ?>">
      <img src="<?= base_url('assets/img/icons/logo/logo-2.svg') ?>" alt="Red Bull Racing" height="30" class="me-2">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active text-white fw-semibold" href="<?= site_url('principal') ?>">Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="<?= site_url('monoplaza') ?>">Monoplaza</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active text-white fw-semibold" href="<?= site_url('pilotos') ?>">Pilotos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="<?= site_url('contacto') ?>">Contacto</a>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="navbarUsuario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuario
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUsuario">
            <li>
              <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
            </li>
            <li>
              <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</button>
            </li>
          </ul>
        </li>
      </ul>

      <form class="d-flex" role="search" id="formulario-busqueda">
        <input class="form-control me-2 border-0 shadow-sm" type="search" placeholder="Buscar..." aria-label="Buscar" id="entrada-busqueda">
        <button class="btn btn-danger fw-bold btn-buscar-icon" type="submit">Buscar</button>
        <button type="button" class="btn btn-outline-light ms-3 btn-login-icon" data-bs-toggle="modal" data-bs-target="#loginModal">
          <i class="bi bi-person-circle fs-6"></i>
        </button>
      </form>

    </div>
  </div>
</nav>

<body>