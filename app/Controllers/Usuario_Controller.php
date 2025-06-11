<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class Usuario_Controller extends Controller
{
  public function __construct()
  {
    helper(['form', 'url']);
  }

  public function create()
  {
    $data['titulo'] = 'Red Bull Racing';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/form_view');
    echo view('front/principal');
    echo view('front/footer_view');
  }

  public function formValidation()
  {
    // Capturamos el valor de la página de origen (viene del input hidden del formulario)
    $pageOrigin = $this->request->getVar('page_origin') ?? 'index';

    $input = $this->validate([
      'nombre'   => 'required|min_length[3]',
      'apellido' => 'required|min_length[3]|max_length[25]',
      'usuario'  => 'required|min_length[3]',
      'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
      'pass'     => 'required|min_length[3]|max_length[25]',
    ]);

    $formModel = new usuario_Model();

    if (!$input) {
      $data = [
        'titulo' => 'Registro',
        'validation' => $this->validator,
        'showRegisterModal' => true,
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');

      // Cargar vista base según la página de origen
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

      echo view('front/form_view', $data);
      echo view('front/footer_view');
    } else {
      $formModel->save([
        'nombre'     => $this->request->getVar('nombre'),
        'apellido'   => $this->request->getVar('apellido'),
        'usuario'    => $this->request->getVar('usuario'),
        'email'      => $this->request->getVar('email'),
        'pass'       => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
      ]);

      session()->setFlashdata('success', '¡Usuario registrado correctamente!');

      $data = [
        'titulo' => 'Red Bull Racing',
        'showRegisterModal' => true,
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');

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

      echo view('front/form_view', $data);
      echo view('front/footer_view');
    }
  }
}
