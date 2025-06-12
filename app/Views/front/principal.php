<!-- Notificación -->
<?php if (isset($_COOKIE['msg_logout'])): ?>
  <div class="notificaciones">
    <?= esc($_COOKIE['msg_logout']) ?>
  </div>
  <?php setcookie('msg_logout', '', time() - 3600, '/'); ?>
<?php endif; ?>
<!-- Sección 1 Banner "Carrusel bootstrap + style.css" -->
<!-- completado 100%  -->
<section id="principal">

  <section id="banner-principal" class="seccion-banner-carrusel">
    <div id="banner-carrusel-principal" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('assets/img/banner/principal/banner-1.jpg') ?>" class="d-block w-100" alt="Bienvenidos Oracle Red Bull Racing">
          <div class="carousel-caption banner-contenido">
            <h2>Bienvenidos</h2>
            <p>Oracle Red Bull Racing - Potencia y pasión en cada vuelta</p>
            <a href="#nuestro-equipo" class="btn btn-danger btn-lg">Explorar temporada</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/principal/banner-2.jpg') ?>" class="d-block w-100" alt="Curiosidades Red Bull Racing">
          <div class="carousel-caption banner-contenido">
            <h2>Acerca de Nosotros</h2>
            <p>Red Bull Racing es pionero en innovación tecnológica en la Fórmula 1</p>
            <a href="#logros-destacados" class="btn btn-danger btn-lg">Más información</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#banner-carrusel-principal" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#banner-carrusel-principal" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </section>

  <!-- Sección 2 Quienes Somos "Display flex" -->
  <!-- completado 90% 
 - Ajustar imagen -->
  <section id="nuestra-historia" class="seccion-nuestra-historia">
    <div class="historia-contenido">
      <h2 class="border-bottom border-danger pb-2">Quienes Somos</h2>
      <p>
        Desde sus humildes comienzos hasta convertirse en una potencia de la Fórmula 1,
        Red Bull Racing ha demostrado que la pasión, la innovación y el trabajo en equipo
        pueden llevar a lo más alto del podio.
      </p>
      <p>
        Con múltiples campeonatos, pilotos legendarios y tecnología de punta, nuestra historia
        continúa escribiéndose vuelta tras vuelta.
      </p>
    </div>
    <div class="historia-imagen">
      <img src="<?= base_url('assets/img/icons/logo/logo-4.jpg') ?>" alt="Logo Red Bull Racing">
    </div>
  </section>

  <!-- Seccion 3 Equipo "cards bootstrap + style.css" -->
  <!-- completado 100%  -->
  <section id="nuestro-equipo" class="seccion-equipo container mt-2">
    <h2 class="titulo-equipo mb-4 border-bottom border-danger pb-2">
      Nuestro Equipo
    </h2>
    <div class="row">
      <!-- Christian Horner -->
      <div class="col-md-4 mb-4">
        <div class="card bg-dark text-white border-0">
          <img src="<?= base_url('assets/img/perfil/Christian-Horner-3.jpg') ?>" class="card-img-top" alt="Christian Horner">
          <div class="card-body">
            <h5 class="card-title text-primary">Christian Horner</h5>
            <p class="card-text">Director de equipo. Estratega dentro y fuera de la pista.</p>
          </div>
        </div>
      </div>
      <!-- Pierre Waché -->
      <div class="col-md-4 mb-4">
        <div class="card bg-dark text-white border-0">
          <img src="<?= base_url('assets/img/perfil/Pierre-Waché-2.jpg') ?>" class="card-img-top" alt="Pierre Waché">
          <div class="card-body">
            <h5 class="card-title text-warning">Pierre Waché</h5>
            <p class="card-text">Diseñador jefe y mente maestra detrás del monoplaza de Red Bull.</p>
          </div>
        </div>
      </div>
      <!--Hannah Schmitz -->
      <div class="col-md-4 mb-4">
        <div class="card bg-dark text-white border-0">
          <img src="<?= base_url('assets/img/perfil/Hannah-Schmitz-1.jpg') ?>" class="card-img-top" alt="Pierre Waché">
          <div class="card-body">
            <h5 class="card-title text-danger">Hannah Schmitz</h5>
            <p class="card-text">Ingeniera jefe de estrategia, clave en cada decisión de carrera.</p>
          </div>
        </div>
      </div>

  </section>

  <!-- Seccion 4 - Logros "Bootstrap puro" -->
  <!-- completado 100% - Posible eliminacion -->
  <section id="logros-destacados" class="container my-5 seccion-logros-destacados">
    <h2 class="mb-4 text-uppercase fw-bold text-danger border-bottom border-danger pb-2">Acerca de Nosotros</h2>
    <div class="row">

      <div class="col-md-4 mb-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <i class="bi bi-award-fill text-warning fs-1"></i>
            <h5 class="card-title mt-3">6 Campeonatos de Constructores</h5>
            <p class="card-text text-secondary small mt-4">Dominando la Fórmula 1 con ingeniería de vanguardia.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <i class="bi bi-trophy-fill text-warning fs-1"></i>
            <h5 class="card-title mt-3">7 Campeonatos de Pilotos</h5>
            <p class="card-text text-secondary small mt-4">Conducidos por leyendas como Vettel y Verstappen.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <i class="bi bi-gear-fill text-success fs-1"></i>
            <h5 class="card-title mt-3">Innovaciones Técnicas</h5>
            <p class="card-text text-secondary small mt-4">Tecnología puntera que marcó un antes y un después.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <i class="bi bi-flag-fill text-danger fs-1"></i>
            <h5 class="card-title mt-3">Estrategias de Carrera</h5>
            <p class="card-text text-secondary small mt-4">Estrategias impecables que llevaron a la victoria.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <i class="bi bi-stopwatch-fill text-info fs-1"></i>
            <h5 class="card-title mt-3">Pit Stops Más Rápidos</h5>
            <p class="card-text text-secondary small mt-4">Récords mundiales con detenciones por debajo de los 2 segundos.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow text-center h-100">
          <div class="card-body">
            <i class="bi bi-speedometer2 text-primary fs-1"></i>
            <h5 class="card-title mt-3">Récords de Velocidad</h5>
            <p class="card-text text-secondary small mt-4">Velocidades récord alcanzadas en pistas icónicas.</p>
          </div>
        </div>
      </div>

    </div>
  </section>
</section>

<!-- Lista de cambios 19/05
 - Cambiar tamaño img nuestra historia  
 - Reestructuración de la sección logros
 -->
<!-- done 26/05 -->