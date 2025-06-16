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
    $estado = $this->request->getGet('estado');
    $buscar = $this->request->getGet('buscar');

    $query = $usuarioModel;

    // Filtro por estado
    if ($estado === 'activos') {
      $query = $query->where('baja', 'NO');
    } elseif ($estado === 'inactivos') {
      $query = $query->where('baja', 'SI');
    }

    // Filtro de búsqueda
    if (!empty($buscar)) {
      $query = $query->groupStart()
        ->like('nombre', $buscar)
        ->orLike('apellido', $buscar)
        ->orLike('usuario', $buscar)
        ->orLike('email', $buscar)
        ->groupEnd();
    }

    $usuarios = $query->findAll();

    $data = [
      'titulo' => 'Panel de Administración',
      'usuarios' => $usuarios,
      'estado_actual' => $estado ?? 'todos',
      'busqueda_actual' => $buscar
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/admin/admin_panel', $data);
    echo view('front/footer_view');
  }

  public function darDeBaja($id)
  {
    $session = session();

    // Verificar acceso admin
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }
    $usuarioModel = new usuario_Model();

    // Buscamos el usuario por su ID
    $usuario = $usuarioModel->find($id);

    $session = session();
    $usuarioEnSesion = $session->get('id_usuario');

    if ($id == $usuarioEnSesion) {
      session()->setFlashdata('msg_baja_error', 'No podés darte de baja a vos mismo.');
    } elseif ($usuario && $usuario['baja'] !== 'SI') {
      $usuarioModel->update($id, ['baja' => 'SI']);
      session()->setFlashdata('msg_baja', 'El usuario ha sido dado de baja exitosamente.');
    }

    return redirect()->to('/admin');
  }

  public function darDeAlta($id)
  {
    $session = session();

    // Verificar acceso admin
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }
    $usuarioModel = new usuario_Model();

    // Buscamos el usuario por su ID
    $usuario = $usuarioModel->find($id);

    if ($usuario && $usuario['baja'] === 'SI') {

      $usuarioModel->update($id, ['baja' => 'NO']);

      session()->setFlashdata('msg_alta', 'El usuario ha sido dado de alta exitosamente.');
    }

    return redirect()->to('/admin');
  }
}
