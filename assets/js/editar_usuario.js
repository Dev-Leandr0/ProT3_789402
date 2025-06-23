(() => {
  'use strict';

  const form = document.querySelector('.needs-validation');
  const btnGuardar = document.getElementById('btnGuardar');
  const btnBorrar = document.getElementById('btnBorrar');
  const selectBaja = document.querySelector('select[name="baja"]');

  if (!form || !btnGuardar || !btnBorrar) return;

  // --- Botón GUARDAR ---
  btnGuardar.addEventListener('click', () => {
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      return;
    }

    Swal.fire({
      title: '¿Guardar cambios?',
      text: 'Se actualizará la información del usuario.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0056b3',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, guardar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });

  // --- Botón BORRAR (restablecer formulario) ---
  btnBorrar.addEventListener('click', (e) => {
    e.preventDefault();

    Swal.fire({
      title: '¿Borrar los cambios?',
      text: 'Se restablecerán los valores originales del formulario.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sí, borrar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        form.reset();
        form.classList.remove('was-validated');
        Swal.fire({
          title: "Formulario limpiado",
          icon: "success",
          timer: 2000,
          showConfirmButton: false,
          timerProgressBar: true,
          toast: true,
          position: 'top-end'
        });
      }
    });
  });

  // --- Alerta cuando el admin selecciona "Inactivo" ---
  if (selectBaja) {
    selectBaja.addEventListener('change', function () {
      if (this.value === 'SI') {
        Swal.fire({
          title: '¿Estás seguro?',
          text: 'Estás marcando al usuario como inactivo. Esta acción lo dará de baja.',
          icon: 'warning',
          confirmButtonColor: '#d33',
          confirmButtonText: 'Entendido'
        });
      } else if (this.value === 'NO') {
        Swal.fire({
          title: '¿Estas seguro?',
          text: 'Estás marcando al usuario como activo. Esta acción lo dará de alta.',
          icon: 'warning',
          confirmButtonColor: '#d33',
          confirmButtonText: 'Entendido'
        });
      }
    });
  }

})();