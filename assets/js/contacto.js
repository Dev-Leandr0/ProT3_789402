console.log("JS de contacto cargado");

document.addEventListener("DOMContentLoaded", function () {
  // Buscamos el formulario de contacto, si no está, cortamos acá
  const form = document.getElementById("form-contacto");
  if (!form) return;

  // Buscamos el botón reset dentro del formulario
  const resetBtn = form.querySelector("button[type='reset']");

  // Cuando se envía el formulario, interceptamos para confirmar con el usuario
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    Swal.fire({
      title: '¿Estás seguro de enviar el mensaje?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sí, enviar',
      cancelButtonText: 'No, cancelar',
      confirmButtonColor: '#0056b3',
      cancelButtonColor: '#da291c'
    }).then((result) => {
      if (result.isConfirmed) {
        // Si confirma, mostramos mensaje de éxito
        Swal.fire({
          title: '¡Mensaje enviado!',
          text: 'Gracias por contactarte con nosotros.',
          icon: 'success',
          confirmButtonColor: '#0056b3'
        });

        // Acá se podría enviar el formulario con form.submit();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        // Si cancela, avisamos que el envío fue cancelado
        Swal.fire({
          title: 'Envío cancelado',
          icon: 'info',
          timer: 1500,
          showConfirmButton: false,
          timerProgressBar: true,
          toast: true,
          position: 'top-end'
        });
      }
    });
  });

  //botón para resetear el formulario, le ponemos confirmación también
  if (resetBtn) {
    resetBtn.addEventListener("click", function (e) {
      e.preventDefault();

      Swal.fire({
        title: "¿Borrar formulario?",
        text: "Esta acción limpiará todos los campos.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#0056b3",
        cancelButtonColor: "#da291c"
      }).then((result) => {
        if (result.isConfirmed) {
          // Si confirma, limpiamos el formulario y avisamos
          form.reset();
          Swal.fire({
            title: "Formulario limpiado",
            icon: "success",
            timer: 1500,
            showConfirmButton: false,
            timerProgressBar: true,
            toast: true,
            position: 'top-end'
          });
        }
      });
    });
  }
});