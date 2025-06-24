<?php

namespace App\Controllers;

use CodeIgniter\Controller;

// =================================================================================================================
// Controlador Panel_Controller: Muestra el panel principal para el usuario logueado, back/usuario/usuario_logueado
// =================================================================================================================
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

  public function verPerfil()
  {
    $session = session();

    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }

    $model = new \App\Models\usuario_Model();
    $usuario = $model->find($session->get('id_usuario'));

    if (!$usuario) {
      return redirect()->to('/panel')->with('error', 'Usuario no encontrado.');
    }

    $data = [
      'titulo' => 'Mi Perfil',
      'usuario' => $usuario
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/ver_mi_perfil', $data);
    echo view('front/footer_view');
  }

  public function editarPerfil()
  {
    $session = session();

    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }

    $model = new \App\Models\usuario_Model();
    $id = $session->get('id_usuario');

    $usuario = $model->find($id);

    if (!$usuario) {
      return redirect()->to('/panel')->with('error', 'Usuario no encontrado.');
    }

    $data = [
      'titulo' => 'Editar mi perfil',
      'usuario' => $usuario
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/editar_perfil', $data);
    echo view('front/footer_view');
  }

  public function actualizarPerfil()
  {
    $session = session();

    if (!$session->get('logged_in')) {
      return redirect()->to('/login');
    }

    $id = $session->get('id_usuario');

    $validation = \Config\Services::validation();

    $rules = [
      'nombre'   => 'required|min_length[2]|max_length[50]',
      'apellido' => 'required|min_length[2]|max_length[50]',
      'usuario'  => "required|min_length[4]|max_length[20]|is_unique[usuarios.usuario,id_usuario,{$id}]",
      'email'    => "required|valid_email|is_unique[usuarios.email,id_usuario,{$id}]",
    ];

    if (!$this->validate($rules)) {
      return redirect()->to('perfil/editar')
        ->with('errors', $validation->getErrors())
        ->withInput();
    }

    $model = new \App\Models\usuario_Model();

    $datos = [
      'nombre'   => $this->request->getPost('nombre'),
      'apellido' => $this->request->getPost('apellido'),
      'usuario'  => $this->request->getPost('usuario'),
      'email'    => $this->request->getPost('email')
    ];

    $model->update($id, $datos);

    return redirect()->to('/perfil/editar')->with('mensaje', 'Perfil actualizado correctamente.');
  }
}
