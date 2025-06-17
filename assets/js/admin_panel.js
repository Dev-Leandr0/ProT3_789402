document.addEventListener('DOMContentLoaded', function () {
  // === Confirmación de Alta/Baja ===
  function confirmarAccion(event, tipo) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute('data-url');
    const accion = tipo === 'baja' ? 'dar de baja' : 'dar de alta';

    Swal.fire({
      title: `¿Estás seguro que querés ${accion} este usuario?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0056b3',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, confirmar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  }

  document.querySelectorAll('.btn-baja').forEach(btn => {
    btn.addEventListener('click', e => confirmarAccion(e, 'baja'));
  });

  document.querySelectorAll('.btn-alta').forEach(btn => {
    btn.addEventListener('click', e => confirmarAccion(e, 'alta'));
  });

  // === Ocultar mensajes flash ===
  const mensajes = document.querySelectorAll('.mensaje-flash');
  mensajes.forEach(msg => {
    setTimeout(() => {
      msg.classList.remove('show');
      msg.classList.add('hide');
      setTimeout(() => msg.remove(), 600);
    }, 3500);
  });
});