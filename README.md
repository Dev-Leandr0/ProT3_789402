
# Red Bull Racing Web

Sitio web temático dedicado a **Red Bull Racing**, desarrollado con **CodeIgniter 4**, que presenta información detallada sobre el equipo, su monoplaza y permite contacto con los visitantes.

---

# 📝 Descripción

Este proyecto es una página web **dinámica**, **responsiva** y con funcionalidades completas de gestión de usuarios, inspirada en el equipo de Fórmula 1 Red Bull Racing.

Incluye:

- Página principal con información institucional sobre el equipo, logros y perfiles destacados.

- Sección dedicada al monoplaza Oracle Red Bull Racing con detalles técnicos y contenido multimedia.

- Página de contacto con formulario funcional, redes sociales y ubicación geográfica.

- Sistema de login y registro con validaciones, sesiones y acceso diferenciado según el tipo de usuario.

- Panel de usuario con opciones para visualizar y editar el perfil personal.

- Panel de administración con tabla CRUD completa para gestionar usuarios (ver, editar, dar de alta/baja).

- Dos roles definidos:

    🧑‍💼 Administrador: acceso a funcionalidades completas y gestión de usuarios.

    👤 Cliente: acceso a su perfil personal y contenido general.

La aplicación está desarrollada en PHP usando el framework CodeIgniter 4 y se ejecuta localmente con XAMPP. La interfaz se diseñó con Bootstrap 5 y animaciones de Animate.css, complementadas con estilos personalizados y alertas dinámicas mediante SweetAlert2.


---

## 🖥️ Entorno de desarrollo

- Sistema operativo: **Ubuntu 24.04.2 LTS**  
- Servidor local: **XAMPP 8.2.4-0** (Apache + MySQL)  
- Lenguaje backend: **PHP 8.2.4**  
- Framework: **CodeIgniter 4.6.1**  
- Editor de código: **Visual Studio Code 1.100.2**  
- Control de versiones: **Git 2.49.0**

---

## 🚀 Tecnologías usadas

- CodeIgniter 4  
- PHP 8+  
- XAMPP (Apache + MySQL)
- Bootstrap 5  
- JavaScript
- Animate.css  
- Google Fonts (Rajdhani)  
- Visual Studio Code  
- Git  

---

## 📁 Estructura del proyecto

/app/Controllers\
  ├── Home.php # Controlador que carga vistas para principal, monoplaza y contacto\
  ├── Admin\_Controller.php # Controlador de funciones administrativas (admin\_panel, crud "ver, editar ,alta, baja")\
  ├── Login\_Controller.php # Maneja el inicio y cierre de sesión\
  ├── Panel\_Controller.php # Controla las acciones del panel de usuario logueado (bienvenida, ver, editar)\
  └── Usuario\_Controller.php # Maneja el registro de nuevos usuarios

/app/Config\
  └── Routes.php # Define las rutas para cada sección principal

/app/Database/Migrations\
  └── alegre\_leandro.sql # Script SQL con la estructura de la base de datos y datos iniciales\
\
/app\
└── /Views\
  ├── /front\
  │  ├── head\_view\.php         # Head HTML con metadatos, estilos y scripts globales\
  │  ├── navbar\_view\.php       # Barra de navegación responsiva y dinámica\
  │  ├── footer\_view\.php       # Pie de página con información y enlaces\
  │  ├── form\_view\.php         # Formularios modales de login y registro\
  │  ├── principal.php         # Página principal con banner, equipo y logros\
  │  ├── monoplaza.php         # Sección con descripción y multimedia del monoplaza\
  │  ├── pilotos.php           # Cards de pilotos y sección con estadísticas detalladas\
  │  └── contacto.php          # Página de contacto con formulario, redes y mapa\
  └── /back\
     ├── /admin                # Solo accesible por usuarios con rol administrador\
     │  ├── admin\_panel.php       # Vista principal del panel de administración con tabla CRUD\
     │  ├── editar\_usuario.php     # Formulario para editar datos de un usuario\
     │  └── ver\_usuario.php        # Visualización detallada de un usuario\
     └── /usuario              # Vistas para usuarios registrados\
       ├── editar\_perfil.php     # Formulario para que el usuario edite su perfil\
       ├── login.php             # Modal de login con validación\
       ├── registro.php          # Modal de registro con validación\
       ├── usuario\_logueado.php  # Panel principal con datos y bienvenida (admin/cliente)\
       └── ver\_mi\_perfil.php     # Vista de perfil propio del usuario

/assets\
├── css/\
│  ├── bootstrap.min.css\
│  └── style.css              # Estilos personalizados para todas las vistas\
├── js/\
│  ├── bootstrap.min.js\
│  ├── contacto.js            # Validación y alertas del formulario de contacto\
│  ├── buscador-navbar.js     # Funcionalidad de buscador en la navbar\
│  ├── admin\_panel.js         # SweetAlert2 para panel admin (alta/baja usuarios)\
│  └── editar\_usuario.js      # SweetAlert2 para edición de usuario

└── img/\
  ├── banner/\
  │  ├── principal/\
  │  ├── monoplaza/\
  │  ├── contacto/\
  │  └── pilotos/\
  ├── icons/\
  │  ├── logo/\
  │  ├── redes-small/\
  │  └── redes-medium/\
  ├── monoplaza/\
  ├── perfil/\
  │  └── usuarios/            # Imágenes de perfiles (cliente.png, admin.png)\
  └── videos/

---

## 📌 Detalles importantes

- `head_view.php`: Meta tags, favicon, Bootstrap, Animate.css y fuente Rajdhani de Google Fonts.

- `navbar_view.php`: Barra responsive con enlaces dinámicos, menú usuario, buscador y animaciones.

- `form_view.php`: Modales de login y registro (Bootstrap) con validaciones y navegación sin recarga.

- `principal.php`: Carrusel, sección "Quiénes Somos", perfiles del equipo y logros destacados.

- `monoplaza.php`: Imágenes y descripciones técnicas del monoplaza, video y detalles de neumáticos F1.

- `pilotos.php`: Cards de pilotos y sección con estadísticas detalladas.

- `contacto.php`: Formulario con validación, enlaces a redes sociales y mapa interactivo del Red Bull.

- `Usuario_Controller.php`: Validación y registro de nuevos usuarios.

- `Routes.php`: Rutas configuradas para acceder a cada sección mediante el controlador.

- `Login_Controller.php`: Validación y mantenimiento de sesión de usuario.

- `Admin_Controller.php`: Funciones de gestión de usuarios con control de acceso para administradores.

- `Panel_Controller.php`: Panel y acciones disponibles para el usuario una vez logueado.

- `usuario_logueado.php`: Panel con información del usuario y mensaje de bienvenida.

- `editar_perfil.php`: Formulario para que el usuario actualice su perfil.

- `ver_mi_perfil.php`: Visualización de perfil del usuario logueado.

- `admin_panel.php`: Vista con tabla CRUD de usuarios, con filtros, búsqueda y alertas.

- `ver_usuario.php`: Vista detallada de un usuario para administradores.

- `editar_usuario.php`: Formulario de edición para datos de un usuario (solo admin).

- `alegre_leandro.sql`: Script SQL con estructura de tablas y datos iniciales de prueba.

---

## ▶️ Cómo ejecutar el proyecto

1. Clona el repositorio:

```bash
git clone https://github.com/Dev-Leandr0/ProT3_789402.git
```

2. Coloca la carpeta del proyecto dentro de tu servidor local (por ejemplo, `htdocs` en XAMPP).
3. **🔐 En Linux**, otorga permisos a la carpeta para permitir su ejecución por parte de XAMPP:
   
```bash
 sudo chmod -R 777 /opt/lampp/htdocs/ProT3_789402
```
   
4. Asegúrate de que Apache y MySQL estén corriendo en XAMPP.  
5. Configura el archivo `.env` que está en la raíz del proyecto para establecer la baseURL:

```
app.baseURL = 'http://localhost/ProT3_789402'
```

5. Accede desde tu navegador a:

```
http://localhost/ProT3_789402
```

6. Navega entre las páginas usando la barra de navegación.


---


## 🗃️ Configuración de la Base de Datos

✅ La base de datos viene incluida en el repositorio como archivo `alegre_leandro.sql`. No es necesario crearla manualmente.

### 1. Importar la base de datos

Desde phpMyAdmin o la terminal MySQL, simplemente importá el archivo SQL.

💻 En phpMyAdmin:

- Andá a la pestaña **Importar**.
- Seleccioná el archivo `alegre_leandro.sql` desde la carpeta:

```
/app/Database/Migrations/
```

- Ejecutá la importación.

📌 Esto creará automáticamente la base de datos junto con todas las tablas necesarias y usuarios de prueba.

🛠️ ¡Listo! Ya tenés la base de datos configurada y lista para usar. 🚀


---


## 👥 Usuarios de Prueba

Para propósitos de prueba, el sistema incluye dos usuarios predefinidos:

### • Administrador
- 📧 Email: `admin@gmail.com`
- 🔐 Contraseña: `1234`
- ✅ Tiene acceso completo al panel de administración.

### • Cliente
- 📧 Email: `cliente@gmail.com`
- 🔐 Contraseña: `1234`
- 🔒 Tiene acceso únicamente a su perfil personal, con permisos limitados de edición.

📌 Además, **todos los demás usuarios cargados en la base de datos comparten la misma contraseña: `1234`**.
Esta medida facilita la validación funcional del sistema sin necesidad de gestionar múltiples credenciales durante la etapa de desarrollo y prueba.


---


## 🤝 Cómo contribuir

1. Haz un fork del repositorio.  
2. Crea una nueva rama:  

```bash
git checkout -b feature/nombre-de-tu-funcion
```

3. Realiza tus cambios y haz commits con mensajes claros.  
4. Envía un pull request describiendo tus modificaciones.

---

## 🐞 Reportar errores o sugerencias

- Abre un **issue** en GitHub con una descripción clara.  
- Expón el problema o la mejora que propones.  
- También puedes enviar un pull request con la solución propuesta.

---

## 📄 Licencia

Este proyecto está bajo la licencia **MIT**. Consulta el archivo `LICENSE` para más información.

---

## 📬 Contacto

Para cualquier duda o comentario, puedes:  
- Abrir un issue en el repositorio.

---

**¡Disfruta explorando Red Bull Racing en la web! 🏁**
