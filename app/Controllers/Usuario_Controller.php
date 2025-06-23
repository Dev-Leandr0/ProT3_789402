<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

// =========================================================================================================
// Controlador Usuario_Controller: Maneja el registro.php para la creación del usuario
// =========================================================================================================
class Usuario_Controller extends Controller
{
  public function __construct()
  {
    // Cargamos helpers para manejar formularios y URLs
    helper(['form', 'url']);
  }

  // Mostrar el formulario de registro junto con las vistas estándar
  public function create()
  {
    $data['titulo'] = 'Red Bull Racing';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/form_view');
    echo view('front/principal');
    echo view('front/footer_view');
  }

  // Validar los datos enviados desde el formulario y guardar el usuario si todo está bien
  public function formValidation()
  {
    // Saber desde qué página vino el formulario para mostrar la vista correcta luego
    $pageOrigin = $this->request->getVar('page_origin') ?? 'index';

    // Definimos las reglas para validar cada campo del formulario
    $input = $this->validate([
      'nombre'   => 'required|min_length[3]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario'  => 'required|min_length[3]',
      'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
      'pass'     => 'required|min_length[3]|max_length[25]',
    ]);

    // Instanciamos el modelo para guardar los datos en la base
    $formModel = new usuario_Model();

    if (!$input) {
      // Si hay errores, preparamos los datos para mostrarlos en el formulario
      $data = [
        'titulo' => 'Registro',
        'validation' => $this->validator,
        'showRegisterModal' => true,
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');

      // Según de dónde vino el formulario, mostramos la página correcta antes del formulario
      switch ($pageOrigin) {
        case 'monoplaza':
          echo view('front/monoplaza');
          break;
        case 'pilotos':
          echo view('front/pilotos');
          break;
        case 'contacto':
          echo view('front/contacto');
          break;
        case 'index':
        default:
          echo view('front/principal');
          break;
      }

      // Finalmente mostramos el formulario con los errores
      echo view('front/form_view', $data);
      echo view('front/footer_view');
    } else {
      // Si todo está bien, guardamos el usuario con la contraseña encriptada
      $formModel->save([
        'nombre'     => $this->request->getVar('nombre'),
        'apellido'   => $this->request->getVar('apellido'),
        'usuario'    => $this->request->getVar('usuario'),
        'email'      => $this->request->getVar('email'),
        'pass'       => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
      ]);

      // Mandamos un mensajito para avisar que salió bien
      session()->setFlashdata('success', '¡Usuario registrado correctamente!');

      // Preparamos los datos para mostrar la página después del registro
      $data = [
        'titulo' => 'Red Bull Racing',
        'showRegisterModal' => true,
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');

      // Mostramos la misma página según el origen, para que el usuario quede en contexto
      switch ($pageOrigin) {
        case 'monoplaza':
          echo view('front/monoplaza');
          break;
        case 'pilotos':
          echo view('front/pilotos');
          break;
        case 'contacto':
          echo view('front/contacto');
          break;
        case 'index':
        default:
          echo view('front/principal');
          break;
      }

      // Mostramos el formulario otra vez, esta vez con el mensaje de éxito
      echo view('front/form_view', $data);
      echo view('front/footer_view');
    }
  }
}
