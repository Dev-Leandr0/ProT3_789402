document.addEventListener('DOMContentLoaded', function () {
  // Función para manejar confirmación
  function confirmarAccion(event, tipo) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute('data-url');
    const accion = tipo === 'baja' ? 'dar de baja' : 'dar de alta';

    Swal.fire({
      title: `¿Estás seguro que querés ${accion} este usuario?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: tipo === 'baja' ? '#0056b3' : '#0056b3',
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
});

// Mensaje de confirmacion
document.addEventListener('DOMContentLoaded', () => {
  const mensajes = document.querySelectorAll('.mensaje-flash');
  mensajes.forEach(msg => {
    setTimeout(() => {

      //boton de ceerrar
      msg.classList.remove('show');
      msg.classList.add('hide');

      // Para que desaparezca el mensaje
      setTimeout(() => {
        msg.remove();
      }, 600);
    }, 3500); // tiempo
  });
});
