<!-- Sección 1 Banner "Carrusel bootstrap + style.css" -->
<!-- completado 100%  -->
<section id="monoplaza">
  <section id="banner-monoplaza" class="banner-carrusel">
    <div id="banner-carrusel-principal" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('assets/img/banner/monoplaza/monoplaza-1.jpg') ?>" class="d-block w-100" alt="Vista panorámica del monoplaza de Oracle Red Bull Racing">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/monoplaza/monoplaza-2.jpg') ?>" class="d-block w-100" alt="Vista frontal del monoplaza de Oracle Red Bull Racing">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/monoplaza/monoplaza-3.jpg') ?>" class="d-block w-100" alt="Detalle del alerón delantero del monoplaza de Red Bull">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/monoplaza/monoplaza-4.jpg') ?>" class="d-block w-100" alt="Vista lateral del monoplaza de Red Bull Racing">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/monoplaza/monoplaza-5.jpg') ?>" class="d-block w-100" alt="Vista trasera del monoplaza de Red Bull en la pista">
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

  <!-- Sección 2: Componentes principales (cards/grid) -->
  <section id="monoplaza-partes" class="seccion-monoplaza-partes">
    <h2 class="titulo-seccion mb-4 border-bottom border-danger pb-2">Componentes principales del monoplaza
    </h2>
    <div class="container grid-partes">
      <div class="parte">
        <img src="<?= base_url('assets/img/monoplaza/aleron-delantero-1.jpg') ?>" alt="Alerón delantero">
        <h3>Alerón delantero</h3>
        <p>Diseñado con múltiples elementos ajustables para canalizar el flujo de aire hacia el resto del coche y
          proporcionar carga aerodinámica</p>
      </div>

      <div class="parte">
        <img src="<?= base_url('assets/img/monoplaza/frenos.jpg') ?>" alt="Frenos">
        <h3>Frenos</h3>
        <p>Componentes esenciales para detener el coche de forma eficiente y segura, máxima potencia y resistencia
          térmica</p>
      </div>

      <div class="parte">
        <img src="<?= base_url('assets/img/monoplaza/aleron-trasero.jpg') ?>" alt="Alerón trasero">
        <h3>Alerón trasero</h3>
        <p>Genera carga aerodinámica en la parte trasera para mejorar la estabilidad a altas velocidades. Incorpora el
          sistema DRS para reducir la resistencia en rectas.</p>
      </div>

      <div class="parte">
        <img src="<?= base_url('assets/img/monoplaza/tunel-venturi.jpg') ?>" alt="Túnel de Venturi">
        <h3>Túnel de Venturi</h3>
        <p>Canaliza el aire bajo el monoplaza para aumentar la carga aerodinámica y mejorar el agarre sin comprometer la
          velocidad máxima</p>
      </div>

      <div class="parte">
        <img src="<?= base_url('assets/img/monoplaza/suspension.jpg') ?>" alt="Suspensión">
        <h3>Suspensión</h3>
        <p>Suspension hidráulica permite mantener el contacto del neumático con el suelo y mejora el manejo en curvas en
          todas las condición</p>
      </div>

      <div class="parte">
        <img src="<?= base_url('assets/img/monoplaza/motor.jpg') ?>" alt="Unidad de potencia">
        <h3>Unidad de potencia</h3>
        <p>Motor híbrido Honda RA621H que combina eficiencia con potencia, compuesto por motor térmico y sistemas
          eléctricos.</p>
      </div>

    </div>

    <!-- Sección 3: Tipos de neumáticos -->

    <section id="monoplaza-neumaticos" class="seccion-neumaticos">
      <section class="seccion-sobre-nosotros position-relative overflow-hidden text-white">
        <video autoplay muted loop playsinline class="video-fondo" aria-hidden="true">
          <source src="<?= base_url('assets/img/video/monoplaza.mp4') ?>" type="video/mp4">
          Tu navegador no soporta videos HTML5.
        </video>

        <div class="container">
          <h2>Tipos de Neumáticos en F1</h2>
          <hr>
          <p class="parrafo-neumatico">Pirelli designa cinco compuestos secos (C1 al C5), siendo C1 el más duro y C5 el más blando. En cada carrera, se eligen tres para usarse, y se identifican como duro, medio y blando.</p>
          <hr>

          <div class="grid-neumaticos">
            <div class="neumatico">
              <img src="<?= base_url('assets/img/neumaticos/rojo.png') ?>" alt="Neumático blando">
              <div class="contenido-neumatico">
                <h3>Blando (Soft - C5)</h3>
                <p>Mayor adherencia, ideal para clasificación o condiciones frías. Se desgasta rápidamente. Red Bull lo utiliza para ganar ventaja en clasificación y las primeras vueltas en carrera.</p>
                <hr>
              </div>
            </div>

            <div class="neumatico">
              <img src="<?= base_url('assets/img/neumaticos/amarillo.png') ?>" alt="Neumático medio">
              <div class="contenido-neumatico">
                <h3>Medio (Medium - C3)</h3>
                <p>Equilibrio entre rendimiento y durabilidad. Muy usado durante la carrera. El compuesto más versátil, clave en la estrategia de carrera de Red Bull.</p>
                <hr>
              </div>
            </div>

            <div class="neumatico">
              <img src="<?= base_url('assets/img/neumaticos/blanco.png') ?>" alt="Neumático duro">
              <div class="contenido-neumatico">
                <h3>Duro (Hard - C1)</h3>
                <p>Más duradero pero con menor agarre. Ideal para stints largos. Red Bull lo emplea cuando busca minimizar paradas y mantener ritmo constante.</p>
                <hr>
              </div>
            </div>

            <div class="neumatico">
              <img src="<?= base_url('assets/img/neumaticos/verde.png') ?>" alt="Neumático intermedio">
              <div class="contenido-neumatico">
                <h3>Intermedio (Intermediate)</h3>
                <p>Usado cuando la pista está mojada pero no completamente encharcada. Perfecto para condiciones cambiantes. Max Verstappen lo domina bien en lluvia ligera.</p>
                <hr>
              </div>
            </div>

            <div class="neumatico">
              <img src="<?= base_url('assets/img/neumaticos/azul.png') ?>" alt="Neumático de lluvia">
              <div class="contenido-neumatico">
                <h3>Lluvia (Full Wet)</h3>
                <p>Canales profundos para evacuar agua. Usado en lluvia intensa. Su uso es limitado, pero esencial para carreras con alta precipitación.</p>
                <hr>
              </div>
            </div>
          </div>
          <hr>
        </div>
      </section>
    </section>
  </section>
</section>