<footer class="footer">
  <div class="footer-container">
    <div class="footer-logo">
      <a href="<?php echo site_url('principal'); ?>" class="footer-marca">
        <img src="<?php echo base_url('assets/img/icons/logo/logo-4.jpg'); ?>" alt="Red Bull Racing" height="50">
        <h5>Red <span class="texto-amarillo">Bull</span> Racing</h5>
      </a>
      <p class="footer-description">
        Velocidad, innovación y pasión por la Fórmula 1. Vive la emoción con nosotros.
      </p>
    </div>

    <div class="footer-links">
      <h5>Enlaces</h5>
      <ul>
        <li><a href="<?= site_url('principal') ?>">Inicio</a></li>
        <li><a href="<?= site_url('monoplaza') ?>">Monoplaza</a></li>
        <li><a href="<?= site_url('pilotos') ?>">Pilotos</a></li>
        <li><a href="<?= site_url('contacto') ?>">Contacto</a></li>
      </ul>
    </div>

    <div class="footer-social">
      <h5>Síguenos</h5>
      <div class="social-icons">
        <a href="https://www.facebook.com/redbullracing">
          <img src="<?= base_url('assets/img/icons/redes-small/facebook.png'); ?>" alt="Facebook" />
        </a>
        <a href="https://twitter.com/redbullracing">
          <img src="<?= base_url('assets/img/icons/redes-small/x.png'); ?>" alt="Twitter" />
        </a>
        <a href="https://www.instagram.com/redbullracing">
          <img src="<?= base_url('assets/img/icons/redes-small/instagram.png'); ?>" alt="Instagram" />
        </a>
        <a href="https://www.youtube.com/redbullracing">
          <img src="<?= base_url('assets/img/icons/redes-small/youtube.png'); ?>" alt="YouTube" />
        </a>

      </div>
    </div>

  </div>

  <hr class="footer-separator">
  <p class="footer-copy">© 2025 Oracle Red Bull Racing. Todos los derechos reservados.</p>
</footer>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Dependencia de bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Dependencia para los sms de alerta -->

<script src="<?= base_url('assets/js/buscador-navbar.js') ?>"></script>
<!-- script para navbar_view.php -->

</body>

</html>