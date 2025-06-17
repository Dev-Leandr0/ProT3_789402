document.getElementById("formulario-busqueda").addEventListener("submit", function (e) {
  e.preventDefault();

  const entrada = document.getElementById("entrada-busqueda").value.toLowerCase().trim();
  const entradaNormalizada = entrada.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
  const baseURL = window.location.origin + "/ProT3_789402";

  const rutas = {
    // === principal.php ===
    "inicio": "principal",
    "banner": "principal#banner-principal",

    // Sección: 1
    "historia": "principal#nuestra-historia",
    "quienes somos": "principal#nuestra-historia",
    "sobre nosotros": "principal#nuestra-historia",

    // Sección: 2
    "equipo": "principal#nuestro-equipo",
    "integrante": "principal#nuestro-equipo",
    "integrantes": "principal#nuestro-equipo",
    "equipos": "principal#nuestro-equipo",

    // Sección: 3
    "acerca de": "principal#logros-destacados",
    "acerca de nosotros": "principal#logros-destacados",
    "logro": "principal#logros-destacados",
    "logros": "principal#logros-destacados",

    // === monoplaza.php ===
    "monoplaza": "monoplaza#monoplaza",
    "auto": "monoplaza#monoplaza",
    "autos": "monoplaza#monoplaza",

    // Sección: 1
    "parte": "monoplaza#monoplaza-partes",
    "partes": "monoplaza#monoplaza-partes",
    "componente": "monoplaza#monoplaza-partes",
    "componentes": "monoplaza#monoplaza-partes",
    "aleron": "monoplaza#monoplaza-partes",
    "suspension": "monoplaza#monoplaza-partes",
    "drs": "monoplaza#monoplaza-partes",
    "motor": "monoplaza#monoplaza-partes",

    // Sección: 2
    "neumatico": "monoplaza#monoplaza-neumaticos",
    "neumaticos": "monoplaza#monoplaza-neumaticos",
    "rueda": "monoplaza#monoplaza-neumaticos",
    "ruedas": "monoplaza#monoplaza-neumaticos",
    "llanta": "monoplaza#monoplaza-neumaticos",
    "llantas": "monoplaza#monoplaza-neumaticos",

    // === contacto.php ===
    "contacto": "contacto",
    "contactos": "contacto",

    // Sección: 2
    "redes": "contacto#contacto-redes",
    "redes sociales": "contacto#contacto-redes",
    "formulario": "contacto#contacto-formulario",
    "mensaje": "contacto#contacto-formulario",
    "consultar": "contacto#contacto-formulario",

    // Sección: 4
    "ubi": "contacto#contacto-encontranos",
    "mapa": "contacto#contacto-encontranos",
    "map": "contacto#contacto-encontranos",
    "maps": "contacto#contacto-encontranos",
    "ubicacion": "contacto#contacto-encontranos",
    "donde estamos": "contacto#contacto-encontranos",
    "donde encontrarnos": "contacto#contacto-encontranos",
    "encontranos": "contacto#contacto-encontranos",

    // === Pilotos.php ===
    // seccion 2: Pilotos
    "piloto": "pilotos#nuestros-pilotos",
    "pilotos": "pilotos#nuestros-pilotos",
    "max": "pilotos#nuestros-pilotos",
    "maxs": "pilotos#nuestros-pilotos",
    "verstappen": "pilotos#nuestros-pilotos",
    "yuki": "pilotos#nuestros-pilotos",
    "tsunoda": "pilotos#nuestros-pilotos",

    // Seccion 3: Estadisticas
    "carrera": "pilotos#estadisticas",
    "carreras": "pilotos#estadisticas",
    "podios": "pilotos#estadisticas",
    "MVP": "pilotos#estadisticas",

    // === form_view.php === (MODAL)
    "login": "form_view#loginModal",
    "iniciar sesion": "form_view#loginModal",
    "iniciar": "form_view#loginModal",
    "acceder": "form_view#loginModal",

    "registro": "form_view#registerModal",
    "registrarse": "form_view#registerModal",
    "registrar": "form_view#registerModal",
    "crear cuenta": "form_view#registerModal"
  };

  for (const [clave, url] of Object.entries(rutas)) {
    if (entradaNormalizada.includes(clave)) {
      if (url.includes("Modal")) {
        const modalId = url.split("#")[1];
        const modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();
      } else {
        window.location.href = `${baseURL}/${url}`;
      }
      return;
    }
  }

  alert("No se encontraron resultados para: " + entrada);
});