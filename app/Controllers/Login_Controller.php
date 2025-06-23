<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

// ==============================================================================================================
// Controlador Login_Controller: Se encarga de manejar el inicio y cierre de sesión back/usuario/login.php.
// ==============================================================================================================
class Login_Controller extends Controller
{
  public function __construct()
  {
    // Cargamos helpers para trabajar con formularios y URLs
    helper(['form', 'url']);
  }

  // Muestra la pantalla de login junto con las vistas básicas
  public function create()
  {
    $data['titulo'] = 'Red Bull Racing';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('front/form_view');
    echo view('front/principal');
    echo view('front/footer_view');
  }

  // Valida las credenciales ingresadas y crea la sesión si todo está bien
  public function auth()
  {
    // Abrimos la sesión para poder guardar datos
    $session = session();
    $model = new usuario_Model();

    // Tomamos lo que ingresó el usuario
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('pass');

    // Buscamos en la base un usuario con ese email
    $data = $model->where('email', $email)->first();

    if ($data) {
      // Si existe, agarramos la contraseña encriptada y el estado de baja
      $pass = $data['pass'];
      $ba = $data['baja'];

      // Si el usuario está dado de baja, mostramos mensaje y volvemos al login
      if ($ba == 'SI') {
        $session->setFlashdata('msg', 'usuario dado de baja');
        $session->setFlashdata('showLoginModal', true);
        return redirect()->to('/login')->withInput();
      }

      // Verificamos que la contraseña ingresada coincida con la guardada
      $verify_pass = password_verify($password, $pass);

      if ($verify_pass) {
        // Si coincide, armamos los datos para la sesión
        $ses_data = [
          'id_usuario' => $data['id_usuario'],
          'nombre' => $data['nombre'],
          'apellido' => $data['apellido'],
          'email' => $data['email'],
          'usuario' => $data['usuario'],
          'perfil_id' => $data['perfil_id'],
          'logged_in' => TRUE
        ];

        // Guardamos los datos en la sesión
        $session->set($ses_data);

        // Ponemos una cookie para mostrar mensaje de login exitoso
        setcookie('msg_login', 'Sesión iniciada exitosamente.', time() + 5, '/');

        // Redirigimos al panel principal
        return redirect()->to('/panel');
      } else {
        // Si la contraseña no coincide, mostramos mensaje de error y volvemos al login
        $session->setFlashdata('msg', 'Contraseña Incorrecta');
        $session->setFlashdata('showLoginModal', true);
        return redirect()->to('/login')->withInput();
      }
    } else {
      // Si no existe el email, mostramos mensaje y volvemos al login
      $session->setFlashdata('msg', 'No Existe el Email o es Incorrecto');
      $session->setFlashdata('showLoginModal', true);
      return redirect()->to('/login')->withInput();
    }
  }

  // Cierra la sesión y redirige a la página principal con mensaje
  public function logout()
  {
    // Destruyo toda la sesión
    session()->destroy();

    // Pongo una cookie para avisar que se cerró la sesión
    setcookie('msg_logout', 'Sesión cerrada exitosamente.', time() + 5, '/');

    // Redirijo a la página principal
    return redirect()->to('/');
  }
}
