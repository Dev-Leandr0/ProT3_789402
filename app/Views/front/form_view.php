<?= view('back/usuario/login') ?>
<?= view('back/usuario/registro') ?>

<script>
  // Boton y lista abrir modal de registro y cerrar login
  document.getElementById('abrirRegistro').addEventListener('click', function(e) {
    e.preventDefault();
    var loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
    loginModal.hide();

    var registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
    registerModal.show();
  });

  <?php if (session()->getFlashdata('success') || (isset($showRegisterModal) && $showRegisterModal)): ?>
    document.addEventListener('DOMContentLoaded', function() {
      var registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
      registerModal.show();
    });
  <?php endif; ?>
</script>