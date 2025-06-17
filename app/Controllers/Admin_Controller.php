<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class Admin_Controller extends Controller
{
  public function index()
  {
    $session = session();

    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    $usuarioModel = new usuario_Model();

    $estado = $this->request->getGet('estado');
    $buscar = $this->request->getGet('buscar');
    $perfil = $this->request->getGet('perfil');

    $perfilesPermitidos = ['todos', 'admin', 'cliente'];
    if (!in_array($perfil, $perfilesPermitidos)) {
      $perfil = 'todos';
    }

    // Campos permitidos para ordenar
    $camposPermitidos = ['id_usuario', 'nombre', 'apellido', 'usuario', 'email', 'baja'];
    // Direcciones permitidas para ordenar
    $direccionesPermitidas = ['asc', 'desc'];
    // Tomo los valores que vienen por URL o pongo el valor por defecto
    $ordenarPor = $this->request->getGet('ordenar_por') ?? 'apellido';
    $ordenDireccion = $this->request->getGet('orden_direccion') ?? 'asc';

    if (!in_array($ordenarPor, $camposPermitidos)) {
      $ordenarPor = 'apellido';
    }

    if (!in_array(strtolower($ordenDireccion), $direccionesPermitidas)) {
      $ordenDireccion = 'asc';
    }

    $builder = $usuarioModel;

    // Filtro por estado
    if ($estado === 'activos') {
      $builder = $builder->where('baja', 'NO');
    } elseif ($estado === 'inactivos') {
      $builder = $builder->where('baja', 'SI');
    }

    // Búsqueda
    if (!empty($buscar)) {
      $builder = $builder->groupStart()
        ->like('nombre', $buscar)
        ->orLike('apellido', $buscar)
        ->orLike('usuario', $buscar)
        ->orLike('email', $buscar)
        ->groupEnd();
    }

    // Filtro por perfil
    if ($perfil === 'admin') {
      $builder = $builder->where('perfil_id', 1);
    } elseif ($perfil === 'cliente') {
      $builder = $builder->where('perfil_id', 2);
    }

    // Ordenamos según los valores validados
    $usuarios = $builder
      ->orderBy($ordenarPor, $ordenDireccion)
      ->findAll();

    $data = [
      'titulo' => 'Panel de Administración',
      'usuarios' => $usuarios,
      'estado_actual' => $estado ?? 'todos',
      'busqueda_actual' => $buscar,
      'orden_actual' => $ordenarPor,
      'direccion_actual' => $ordenDireccion,
      'perfil_actual' => $perfil
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/admin/admin_panel', $data);
    echo view('front/footer_view');
  }

  // ======================================
  // 17/06 Se agrego orden por columna


  public function darDeBaja($id)
  {
    $session = session();

    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }
    $usuarioModel = new usuario_Model();

    $usuario = $usuarioModel->find($id);
    $usuarioEnSesion = $session->get('id_usuario');

    if (!$usuario) {
      // Usuario no encontrado
      session()->setFlashdata('msg_baja_error', 'El usuario que intentás dar de baja no existe.');
    } elseif ($id == $usuarioEnSesion) {
      session()->setFlashdata('msg_baja_error', 'No podés darte de baja a vos mismo.');
    } elseif ($usuario['baja'] !== 'SI') {
      $usuarioModel->update($id, ['baja' => 'SI']);
      session()->setFlashdata('msg_baja', 'El usuario ha sido dado de baja exitosamente.');
    }

    return redirect()->to('/admin');
  }

  public function darDeAlta($id)
  {
    $session = session();

    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }
    $usuarioModel = new usuario_Model();

    $usuario = $usuarioModel->find($id);

    if (!$usuario) {
      // Usuario no encontrado
      session()->setFlashdata('msg_alta_error', 'El usuario que intentás dar de alta no existe.');
    } elseif ($usuario['baja'] === 'SI') {
      $usuarioModel->update($id, ['baja' => 'NO']);
      session()->setFlashdata('msg_alta', 'El usuario ha sido dado de alta exitosamente.');
    }

    return redirect()->to('/admin');
  }
}
