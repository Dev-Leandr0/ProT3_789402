document.addEventListener('DOMContentLoaded', function () {
  // === Confirmación para dar de alta o baja a un usuario ===
  function confirmarAccion(event, tipo) {
    event.preventDefault();

    // Sacamos la URL a la que hay que ir para confirmar la acción
    const url = event.currentTarget.getAttribute('data-url');
    // Definimos si es para dar de baja o de alta, según el tipo que recibimos
    const accion = tipo === 'baja' ? 'dar de baja' : 'dar de alta';

    // Mostramos el cartelito preguntando si está seguro
    Swal.fire({
      title: `¿Estás seguro que querés ${accion} este usuario?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0056b3',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, confirmar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      // Si confirma, lo mandamos a la URL correspondiente
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  }

  // Para cada botón que da de baja, le ponemos el evento que llama a la confirmación
  document.querySelectorAll('.btn-baja').forEach(btn => {
    btn.addEventListener('click', e => confirmarAccion(e, 'baja'));
  });

  // Igual para los botones que dan de alta
  document.querySelectorAll('.btn-alta').forEach(btn => {
    btn.addEventListener('click', e => confirmarAccion(e, 'alta'));
  });

  // === Mensajes flash que aparecen y desaparecen solos ===
  const mensajes = document.querySelectorAll('.mensaje-flash');
  mensajes.forEach(msg => {
    // Después de unos segundos, ocultamos el mensaje con animación y lo sacamos del DOM
    setTimeout(() => {
      msg.classList.remove('show');
      msg.classList.add('hide');
      setTimeout(() => msg.remove(), 600);
    }, 3500);
  });
});
