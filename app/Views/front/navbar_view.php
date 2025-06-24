<?php $session = session(); ?>
<nav class="navbar navbar-expand-lg sticky-top navbar-customizado">
  <div class="container-fluid">
    <!-- <div class="container-fluid animate__animated animate__bounceInLeft"> -->
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

        <!-- Visto solo admin -->
        <?php if ($session->get('logged_in') && $session->get('perfil_id') == 1): ?>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold" href="<?= site_url('admin') ?>">Panel Admin</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="<?= site_url('monoplaza') ?>">Monoplaza</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white fw-semibold" href="<?= site_url('pilotos') ?>">Pilotos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold" href="<?= site_url('contacto') ?>">Contacto</a>
        </li>

        <?php if (!$session->get('logged_in')): ?>
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
        <?php endif; ?>
      </ul>

      <form class="d-flex" role="search" id="formulario-busqueda">
        <input class="form-control me-2 border-0 shadow-sm" type="search" placeholder="Buscar..." aria-label="Buscar" id="entrada-busqueda">
        <button class="btn btn-danger fw-bold btn-buscar-icon" type="submit">Buscar</button>

        <!-- Modal con informacion del usuario -->
        <?php if ($session->get('logged_in')): ?>
          <div class="dropdown ms-3">
            <a href="#" class="btn btn-user-icon" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-6"></i>
            </a>
            <ul class="dropdown-menu user-info-card dropdown-menu-end" aria-labelledby="userDropdown">
              <li class="px-3 py-2">
                <strong class="user-name"><?= esc($session->get('nombre')) ?> <?= esc($session->get('apellido')) ?></strong><br>
                <small class="user-email"><?= esc($session->get('email')) ?></small>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= base_url('panel/perfil') ?>">Ver Perfil</a></li>
              <li><a class="dropdown-item" href="<?= base_url('perfil/editar') ?>">Editar Perfil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Cerrar sesión</a></li>
            </ul>
          </div>
        <?php else: ?>
          <button type="button" class="btn btn-user-icon ms-3" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="bi bi-person-circle fs-6"></i>
          </button>
        <?php endif; ?>
      </form>
    </div>
  </div>
</nav>