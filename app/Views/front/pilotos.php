<section id="pilotos">
  <section id="banner-principal" class="seccion-banner-carrusel">
    <div id="banner-carrusel-principal" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/pilotos/max-tsunoda-2.jpg') ?>" class="d-block w-100" alt="Max y Yuki">
        </div>
        <div class="carousel-item active">
          <img src="<?= base_url('assets/img/banner/pilotos/max-tsunoda-1.jpg') ?>" class="d-block w-100" alt="Max y Yuki">
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
  <section id="nuestros-pilotos" class="seccion-pilotos container mt-5">
    <h2 class="titulo-pilotos mb-5 border-bottom border-danger pb-2">
      Nuestros Pilotos
    </h2>
    <div class="row justify-content-center">
      <!-- Yuki Tsunoda -->
      <div class="col-md-5 mb-5 mx-md-2">
        <div class="card bg-dark text-white border-0">
          <img src="<?= base_url('assets/img/perfil/pilotos/tsunoda.png') ?>" class="card-img-vertical" alt="Yuki Tsunoda">
          <div class="card-body">
            <h5 class="card-title text-primary">Yuki Tsunoda</h5>
            <p class="card-text">Rápido, aguerrido y con una gran evolución desde su debut en F1.</p><br>
            <ul class="list-unstyled">
              <li><strong>Número:</strong> 22</li>
              <li><strong>País:</strong> Japón</li>
              <li><strong>Edad:</strong> 24 años</li>
              <li><strong>Temporadas en F1:</strong> 4</li>
              <li><strong>Debut:</strong> 2021 en AlphaTauri</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Max Verstappen -->
      <div class="col-md-5 mb-5 mx-md-2">
        <div class="card bg-dark text-white border-0">
          <img src="<?= base_url('assets/img/perfil/pilotos/max-verstappen.png') ?>" class="card-img-vertical" alt="Max Verstappen">
          <div class="card-body">
            <h5 class="card-title text-warning">Max Verstappen</h5>
            <p class="card-text">Campeón del mundo, agresivo, preciso y dominante en la pista.</p><br>
            <ul class="list-unstyled">
              <li><strong>Número:</strong> 1</li>
              <li><strong>País:</strong> Países Bajos</li>
              <li><strong>Edad:</strong> 26 años</li>
              <li><strong>Temporadas en F1:</strong> 9</li>
              <li><strong>Debut:</strong> 2015 con Toro Rosso</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Sección 3: Estadísticas generales -->
  <section id="estadisticas" class="py-5">
    <div class="container">
      <h2 class="text-center mb-5 text-uppercase text-danger">Estadísticas Red Bull Racing 2025</h2>

      <div class="tabla-responsive-wrapper">
        <table class="table table-bordered table-hover text-center align-middle mb-0 tabla-contenido">
          <thead class="table-dark">
            <tr>
              <th>Piloto</th>
              <th>Carreras con Red Bull</th>
              <th>Victorias</th>
              <th>Podios</th>
              <th>Puntos</th>
              <th>Vueltas rápidas</th>
              <th>Carreras destacadas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold">Max Verstappen</td>
              <td>5</td>
              <td>2</td>
              <td>4</td>
              <td>85</td>
              <td>2</td>
              <td>
                🇧🇭 Baréin (P1)<br>
                🇸🇦 Arabia Saudita (P3)<br>
                🇦🇺 Australia (P1)<br>
                🇯🇵 Japón (VR + P2)
              </td>
            </tr>
            <tr>
              <td class="fw-bold">Yuki Tsunoda</td>
              <td>2</td>
              <td>0</td>
              <td>0</td>
              <td>10</td>
              <td>0</td>
              <td>
                🇨🇳 China (P7)<br>
                🇲🇾 Malasia (P9)
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</section>