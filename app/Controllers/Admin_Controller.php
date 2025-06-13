<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class Admin_Controller extends Controller
{
  public function index()
  {
    $session = session();

    // Verifica si está logueado y si es administrador
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    $usuarioModel = new usuario_Model();
    $usuarios = $usuarioModel->findAll();

    $data = [
      'titulo' => 'Panel de Administración',
      'usuarios' => $usuarios
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/admin/admin_panel', $data);
    echo view('front/footer_view');
  }

  public function darDeBaja($id)
  {
    $usuarioModel = new usuario_Model();

    // Buscamos el usuario por su ID
    $usuario = $usuarioModel->find($id);

    if ($usuario && $usuario['baja'] !== 'SI') {

      $usuarioModel->update($id, ['baja' => 'SI']);

      session()->setFlashdata('msg_baja', 'El usuario ha sido dado de baja exitosamente.');
    }

    return redirect()->to('/admin');
  }
}
