console.log("JS de contacto cargado");

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-contacto");
  if (!form) return;

  const resetBtn = form.querySelector("button[type='reset']");

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
        Swal.fire({
          title: '¡Mensaje enviado!',
          text: 'Gracias por contactarte con nosotros.',
          icon: 'success',
          confirmButtonColor: '#0056b3'
        });

        // form.submit();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Envío cancelado',
          icon: 'info',
          timer: 1500,
          showConfirmButton: false
        });
      }
    });
  });

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
          form.reset();
          Swal.fire({
            title: "Formulario limpiado",
            icon: "success",
            timer: 1500,
            showConfirmButton: false
          });
        }
      });
    });
  }

});