<?php

namespace App\Controllers;

use CodeIgniter\Controller;
// ==============================================================================================================
// ÍNDICE DE FUNCIONES - Panel_Controller:  Muestra y gestiona las acciones del panel del usuario logueado
// Vistas: back/usuario/usuario_logueado, ver_mi_perfil, editar_perfil
// ==============================================================================================================

// ==============================================================================================================
// 1 - Función index(): Muestra el panel principal del usuario logueado (usuario_logueado.php)

// 2 - Función verPerfil(): Muestra los datos personales del usuario actual (ver_mi_perfil.php)

// 3 - Función editarPerfil(): Carga el formulario para editar los datos del usuario (editar_perfil.php)

// 4 - Función actualizarPerfil(): Valida y guarda los cambios realizados en el perfil del usuario
// ==============================================================================================================

class Panel_Controller extends Controller
{
  public function index()
  {
    // Abrimos la sesión para obtener datos del usuario que está navegando
    $session = session();

    // Guardamos el nombre de usuario y el perfil en variables para usar en la vista
    $nombre = $session->get('usuario');
    $perfil = $session->get('perfil_id');

    // Pasamos el perfil al arreglo de datos para la vista
    $data['perfil_id'] = $perfil;

    // Definimos el título de la página
    $data['titulo'] = "Panel Usuario";

    // Cargamos las vistas para mostrar la página completa
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/usuario_logueado', $data);
    echo view('front/footer_view');
  }

  // ======================================================================================
  // 2 - VerPerfil: Muestra el perfil del usuario logueado
  // ======================================================================================
  public function verPerfil()
  {
    $session = session();

    // Si no hay nadie logueado, redirigimos al login
    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }

    // Buscamos los datos del usuario actual
    $model = new \App\Models\usuario_Model();
    $usuario = $model->find($session->get('id_usuario'));

    // Si no se encuentra el usuario, volvemos al panel con un error
    if (!$usuario) {
      return redirect()->to('/panel')->with('error', 'Usuario no encontrado.');
    }

    // Enviamos los datos a la vista que muestra el perfil
    $data = [
      'titulo' => 'Mi Perfil',
      'usuario' => $usuario
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/ver_mi_perfil', $data);
    echo view('front/footer_view');
  }

  // =====================================================================================================
  // 3 - EditarPerfil: Carga el formulario para que el usuario en este caso cliente edite su propio perfil
  // =====================================================================================================
  public function editarPerfil()
  {
    $session = session();

    // Verificamos que haya alguien logueado
    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }

    // Obtenemos los datos del usuario desde la sesión
    $model = new \App\Models\usuario_Model();
    $id = $session->get('id_usuario');

    $usuario = $model->find($id);

    // Si no encuentra al usuario, redirige con mensaje de error
    if (!$usuario) {
      return redirect()->to('/panel')->with('error', 'Usuario no encontrado.');
    }

    // Preparamos la vista con los datos del usuario
    $data = [
      'titulo' => 'Editar mi perfil',
      'usuario' => $usuario
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/editar_perfil', $data);
    echo view('front/footer_view');
  }

  // ======================================================================================
  // 4 - Actualizar: Procesa la actualización de los datos del perfil del cliente
  // ======================================================================================
  public function actualizarPerfil()
  {
    $session = session();

    // Verificamos que el usuario esté logueado
    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }

    $id = $session->get('id_usuario');
    $validation = \Config\Services::validation();

    // Definimos las reglas para validar los campos
    $rules = [
      'nombre'   => 'required|min_length[2]|max_length[50]',
      'apellido' => 'required|min_length[2]|max_length[50]',
      'usuario'  => "required|min_length[4]|max_length[20]|is_unique[usuarios.usuario,id_usuario,{$id}]",
      'email'    => "required|valid_email|is_unique[usuarios.email,id_usuario,{$id}]",
    ];

    // Si no pasa la validación, volvemos con los errores
    if (!$this->validate($rules)) {
      return redirect()->to('perfil/editar')
        ->with('errors', $validation->getErrors())
        ->withInput();
    }

    // Guardamos los nuevos datos
    $model = new \App\Models\usuario_Model();

    $datos = [
      'nombre'   => $this->request->getPost('nombre'),
      'apellido' => $this->request->getPost('apellido'),
      'usuario'  => $this->request->getPost('usuario'),
      'email'    => $this->request->getPost('email')
    ];

    $model->update($id, $datos);

    // Volvemos al formulario "editar" y se muestra el sms 
    return redirect()->to('/perfil/editar')->with('mensaje', 'Perfil actualizado correctamente.');
  }
}
