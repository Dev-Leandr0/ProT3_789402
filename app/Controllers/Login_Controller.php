<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;


class Login_Controller extends Controller
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

  public function auth()
  {
    $session = session();
    $model = new usuario_Model();

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('pass');

    $data = $model->where('email', $email)->first();
    if ($data) {
      $pass = $data['pass'];
      $ba = $data['baja'];
      if ($ba == 'SI') {
        $session->setFlashdata('msg', 'usuario dado de baja');
        $session->setFlashdata('showLoginModal', true);
        return redirect()->to('/login')->withInput();
      }


      $verify_pass = password_verify($password, $pass);

      if ($verify_pass) {
        $ses_data = [
          'id_usuario' => $data['id_usuario'],
          'nombre' => $data['nombre'],
          'apellido' => $data['apellido'],
          'email' => $data['email'],
          'usuario' => $data['usuario'],
          'perfil_id' => $data['perfil_id'],
          'logged_in' => TRUE
        ];

        $session->set($ses_data);

        setcookie('msg_login', 'Sesión iniciada exitosamente.', time() + 5, '/');
        return redirect()->to('/panel');
      } else {
        $session->setFlashdata('msg', 'Contraseña Incorrecta');
        $session->setFlashdata('showLoginModal', true);
        return redirect()->to('/login')->withInput();
      }
    } else {
      $session->setFlashdata('msg', 'No Existe el Email o es Incorrecto');
      $session->setFlashdata('showLoginModal', true);
      return redirect()->to('/login')->withInput();
    }
  }
  public function logout()
  {
    session()->destroy();

    setcookie('msg_logout', 'Sesión cerrada exitosamente.', time() + 5, '/');

    return redirect()->to('/');
  }
}
