  <!-- Sección 1 Banner "Carrusel bootstrap + style.css" -->
  <!-- completado 100%  -->
  <section id="contacto">
    <section class="banner-carrusel">
      <div id="banner-carrusel-principal" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?= base_url('assets/img/banner/contacto/contacto-1.jpg'); ?>" class="d-block w-100" alt="El equipo completo de Oracle Red Bull Racing en la Fórmula 1">
          </div>
          <div class="carousel-item">
            <img src="<?= base_url('assets/img/banner/contacto/contacto-2.jpg'); ?>" class="d-block w-100" alt="Fanáticos de Red Bull con máscaras de toro en un evento de F1">
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

    <!-- Sección 2 "Redes Sociales" " -->
    <!-- completado 100%  -->
    <section id="contacto-redes" class="seccion-contacto-redes">
      <h2>Síguenos en redes</h2>
      <div class="redes-iconos">
        <a href="https://facebook.com/redbullracing" target="_blank" rel="noopener">
          <img src="<?= base_url('assets/img/icons/redes-medium/facebook.png'); ?>" alt="Facebook">
        </a>
        <a href="https://twitter.com/redbullracing" target="_blank" rel="noopener">
          <img src="<?= base_url('assets/img/icons/redes-medium/x.png'); ?>" alt="Twitter">
        </a>
        <a href="https://instagram.com/redbullracing" target="_blank" rel="noopener">
          <img src="<?= base_url('assets/img/icons/redes-medium/instagram.png'); ?>" alt="Instagram">

        </a>
        <a href="https://youtube.com/redbullracing" target="_blank" rel="noopener">
          <img src="<?= base_url('assets/img/icons/redes-medium/youtube.png'); ?>" alt="YouTube">
        </a>
      </div>

    </section>

    <!-- Sección 3: Formulario - Únete -->
    <section id="contacto-formulario" class="container py-5 mb-4">
      <div class="formulario-contacto">
        <h2 class="titulo-formulario">Contáctanos</h2>

        <form id="form-contacto" method="post" action="/contacto/enviar" class="row g-4">

          <div class="col-md-6">
            <label class="form-label text-uppercase">Nombre</label>
            <input type="text" class="form-control campo-formulario" name="nombre" placeholder="Tu nombre completo" required>
          </div>

          <div class="col-md-6">
            <label class="form-label text-uppercase">Email</label>
            <input type="email" class="form-control campo-formulario" name="email" placeholder="nombre@ejemplo.com" required>
          </div>

          <div class="col-12">
            <label class="form-label text-uppercase">Mensaje</label>
            <textarea name="mensaje" class="form-control campo-formulario" rows="5" placeholder="¿En qué podemos ayudarte?" required></textarea>
          </div>

          <div class="col-12 d-flex flex-column flex-md-row gap-3">
            <button type="submit" class="btn btn-enviar btn-lg px-5 fw-bold">
              Enviar mensaje <i class="bi bi-send ms-2"></i>
            </button>
            <button type="reset" class="btn btn-borrar btn-lg px-5 fw-bold">
              Borrar <i class="bi bi-x-circle ms-2"></i>
            </button>
          </div>
        </form>
      </div>
    </section>

    <!-- Seccion 4 "Encontranos Mapa" -->
    <section id="contacto-encontranos" class="seccion-sobre-nosotros position-relative overflow-hidden text-white">

      <video autoplay muted loop playsinline class="video-fondo" aria-hidden="true">
        <source src="<?= base_url('assets/img/video/sobre-nosotros.mp4'); ?>" type="video/mp4">
        Tu navegador no soporta videos HTML5.
      </video>

      <!-- Aqui ira una capa gris 19/05 -->
      <div class="capa-oscura"></div>

      <div class="container py-5 position-relative z-1" data-aos="fade-up" data-aos-duration="1000">
        <div class="row align-items-center">
          <!-- Información posible cambio aquí 20/05-->
          <div class="col-md-7">
            <h1 class="display-4 fw-bold text-danger text-uppercase">Encontranos</h1>
            <p class="lead">
              Bienvenido al mundo de <strong>Oracle Red Bull Racing</strong>. Aquí vivimos a toda velocidad, compartiendo todo sobre nuestros autos, pilotos y victorias. 🚀
            </p>
            <ul class="list-unstyled fs-5">
              <li><i class="bi bi-geo-alt-fill text-warning"></i> Red Bull Technology Campus, Milton Keynes</li>
              <li><i class="bi bi-envelope-fill text-warning"></i> info@redbullracing.com</li>
              <li><i class="bi bi-lightning-charge-fill text-warning"></i> Pura innovación en la pista</li>
            </ul>
          </div>
          <!-- Mapa -->
          <div class="col-md-5">
            <div class="contenedor-mapa">
              <iframe src="https://maps.google.com/maps?q=Red%20Bull%20Technology%20Campus%2C%20Milton%20Keynes&t=&z=13&ie=UTF8&iwloc=&output=embed"
                width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>

    </section>
  </section>
  <script src="<?= base_url('assets/js/contacto.js'); ?>"></script>
  <!-- script para el formulario de contacto.php -->