<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

// ====================================================================================================================
// Índice de funciones principales del Admin_Controller:
// Vistas: back/admin/admin_panel.php, editar_usuario.php, ver_usuario.php
// ====================================================================================================================

// ====================================================================================================================
// 1 - Función index: Muestra el panel de administración con la lista de usuarios, incluyendo filtros, búsqueda y ordenamiento.
// 2 - Función verUsuario: Muestra el detalle completo de un usuario, asegurándose que sólo lo vea un administrador.
// 3 - Función darDeBaja: Permite desactivar un usuario (darlo de baja), evitando que el admin se dé de baja a sí mismo.
// 4 - Función darDeAlta: Activa un usuario que estaba dado de baja, solo accesible para administradores.
// 5 - Función editar: Busca un usuario por su ID y carga el formulario para editar sus datos.
// 6 - Función actualizar: Toma los datos modificados del formulario y los guarda en la base de datos para actualizar al usuario.
// ====================================================================================================================

class Admin_Controller extends Controller
{
  // ==============================================================================================================
  // 1 - Función index: Muestra el panel de administración con filtros, búsqueda y ordenamiento de usuarios.
  // ==============================================================================================================
  public function index()
  {
    // Abro la sesión para saber quién está navegando
    $session = session();

    // Si no estás logueado o no sos admin, te mando al login
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    // Conecto con el modelo de usuarios
    $usuarioModel = new usuario_Model();

    // Tomo los filtros y búsqueda que vienen por la URL
    $estado = $this->request->getGet('estado');
    $buscar = $this->request->getGet('buscar');
    $perfil = $this->request->getGet('perfil');

    // Solo permito estos perfiles para filtrar, si viene otro, pongo 'todos'
    $perfilesPermitidos = ['todos', 'admin', 'cliente'];
    if (!in_array($perfil, $perfilesPermitidos)) {
      $perfil = 'todos';
    }

    // Defino los campos y direcciones válidas para ordenar la lista
    $camposPermitidos = ['id_usuario', 'nombre', 'apellido', 'usuario', 'email', 'baja'];
    $direccionesPermitidas = ['asc', 'desc'];

    // Tomo los valores para ordenar o pongo los valores por defecto
    $ordenarPor = $this->request->getGet('ordenar_por') ?? 'apellido';
    $ordenDireccion = $this->request->getGet('orden_direccion') ?? 'asc';

    // Verifico que los valores para ordenar sean válidos, sino los pongo por defecto
    if (!in_array($ordenarPor, $camposPermitidos)) {
      $ordenarPor = 'apellido';
    }
    if (!in_array(strtolower($ordenDireccion), $direccionesPermitidas)) {
      $ordenDireccion = 'asc';
    }

    $builder = $usuarioModel;

    // Filtro según el estado: activos o inactivos
    if ($estado === 'activos') {
      $builder = $builder->where('baja', 'NO');
    } elseif ($estado === 'inactivos') {
      $builder = $builder->where('baja', 'SI');
    }

    // Si escribieron algo en el buscador, filtro por esos campos
    if (!empty($buscar)) {
      $builder = $builder->groupStart()
        ->like('nombre', $buscar)
        ->orLike('apellido', $buscar)
        ->orLike('usuario', $buscar)
        ->orLike('email', $buscar)
        ->groupEnd();
    }

    // Filtro por tipo de perfil si corresponde
    if ($perfil === 'admin') {
      $builder = $builder->where('perfil_id', 1);
    } elseif ($perfil === 'cliente') {
      $builder = $builder->where('perfil_id', 2);
    }

    // Finalmente, ordeno los resultados según lo elegido y traigo la lista
    $cantidad_por_pagina = 10; // o el número que quieras mostrar por página

    $usuarios = $builder
      ->orderBy($ordenarPor, $ordenDireccion)
      ->paginate($cantidad_por_pagina, 'usuarios');

    $pager = $usuarioModel->pager;

    // Preparo los datos para mandar a la vista
    $data = [
      'titulo' => 'Panel de Administración',
      'usuarios' => $usuarios,
      'estado_actual' => $estado ?? 'todos',
      'busqueda_actual' => $buscar,
      'orden_actual' => $ordenarPor,
      'direccion_actual' => $ordenDireccion,
      'perfil_actual' => $perfil,
      'pager' => $pager
    ];

    // Cargo las vistas para mostrar la página completa
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/admin/admin_panel', $data);
    echo view('front/footer_view');

    // 17/06 Se agregó orden por columna
  }

  // ==============================================================================================================
  // 2 - Función verUsuario: Se encarga de mostrar la información del usuario, asegurándose que solo lo vea un admin.
  // ==============================================================================================================
  public function verUsuario($id)
  {
    // Abro la sesión para saber quién está navegando
    $session = session();

    // Si nadie está logueado o no es admin, lo mando directo al login
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    // Conecto con la base para trabajar con los usuarios
    $usuarioModel = new usuario_Model();

    // Busco al usuario que quiero ver usando su ID
    $usuario = $usuarioModel->find($id);

    // Si no lo encuentro, vuelvo al panel con un cartel de error
    if (!$usuario) {
      session()->setFlashdata('msg_baja_error', 'El usuario que estás intentando ver no existe.');
      return redirect()->to('/admin');
    }

    // Si todo está bien, preparo los datos para mostrar en la vista
    $data = [
      'titulo' => 'Detalle del Usuario',
      'usuario' => $usuario
    ];

    // Cargo las partes de la página: cabecera, barra, contenido y pie de página
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/admin/ver_usuario', $data);
    echo view('front/footer_view');

    // 17/06 se agrega read o ver usuario
  }

  // ===================================================================================================================
  // 3 - Función darDeBaja: Se encarga de desactivar un usuario, pero evita que se de, de baja a uno mismo. Solo para admin.
  // ===================================================================================================================
  public function darDeBaja($id)
  {
    // Abro la sesión para saber quién está navegando
    $session = session();

    // Si no estás logueado o no sos admin, te mando al login
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    // Conecto con el modelo de usuarios
    $usuarioModel = new usuario_Model();

    // Busco al usuario que quiero dar de baja
    $usuario = $usuarioModel->find($id);

    // Guardo el ID del usuario que está logueado
    $usuarioEnSesion = $session->get('id_usuario');

    if (!$usuario) {
      // Si no existe ese usuario, aviso con un mensajito de error
      session()->setFlashdata('msg_baja_error', 'El usuario que intentás dar de baja no existe.');
    } elseif ($id == $usuarioEnSesion) {
      // Si intentás darte de baja a vos mismo, aviso que no podés
      session()->setFlashdata('msg_baja_error', 'No podés darte de baja a vos mismo.');
    } elseif ($usuario['perfil_id'] == 1 && $id != $usuarioEnSesion) {
      // No permitir dar de baja a otro admin
      session()->setFlashdata('msg_baja_error', 'No podés dar de baja a otro administrador.');
    } elseif ($usuario['baja'] !== 'SI') {
      // Si el usuario está activo, lo doy de baja y aviso que salió bien
      $usuarioModel->update($id, ['baja' => 'SI']);
      session()->setFlashdata('msg_baja', 'El usuario ha sido dado de baja exitosamente.');
    }

    // Vuelvo al panel de administración admin_panel.php
    return redirect()->to('/admin');
  }

  // ==============================================================================================================
  // 4 - Función darDeAlta: Se encarga de activar un usuario que estaba dado de baja, solo si sos Admin.
  // ==============================================================================================================
  public function darDeAlta($id)
  {
    // Abro la sesión para ver quién está navegando
    $session = session();

    // Si no estás logueado o no sos admin, te mando al login
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    // Conecto con el modelo de usuarios
    $usuarioModel = new usuario_Model();

    // Busco al usuario por su ID
    $usuario = $usuarioModel->find($id);

    if (!$usuario) {
      // Si no existe, aviso con un mensajito que no lo encontró
      session()->setFlashdata('msg_alta_error', 'El usuario que intentás dar de alta no existe.');
    } elseif ($usuario['perfil_id'] == 1) {
      // No puede dar de alta a otro admin
      session()->setFlashdata('msg_alta_error', 'No podés dar de alta a otro administrador.');
    } elseif ($usuario['baja'] === 'SI') {
      // Si estaba dado de baja, lo activo cambiando ese estado
      $usuarioModel->update($id, ['baja' => 'NO']);
      session()->setFlashdata('msg_alta', 'El usuario ha sido dado de alta exitosamente.');
    }

    // Vuelvo al panel de administración admin_panel.php
    return redirect()->to('/admin');
  }

  // ==============================================================================================================
  // 5 - Función editar: Se encarga de buscar un usuario por su ID y cargar el formulario para editar sus datos.
  // ==============================================================================================================
  public function editar($id_usuario)
  {
    // Abro la sesión para saber quién está navegando
    $session = session();

    // Si no estás logueado o no sos admin, te mando al login
    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    $model = new usuario_Model();

    // Se busca al usuario en la base de datos usando su ID
    $usuario = $model->find($id_usuario);

    if (!$usuario) {
      // Si no se encuentra el usuario, se vuelve al admin_panel.php con un mensajito de error
      return redirect()->to('/admin')->with('error', 'Usuario no encontrado');
    }

    // Armo los datos que quiero pasarle a las vistas
    $data = [
      'titulo' => 'Editar Usuario',
      'usuario' => $usuario
    ];

    // Muestro la vista completa con cabecera, navbar, contenido y pie de página
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/admin/editar_usuario', $data);
    echo view('front/footer_view');
  }

  // ==================================================================================================================
  // 6 - Función actualizar: Se encarga de tomar los datos actualizados de un usuario y guardarlos en la base de datos.
  // ==================================================================================================================
  public function actualizar($id_usuario)
  {
    $session = session();

    if (!$session->get('logged_in') || $session->get('perfil_id') != 1) {
      return redirect()->to('/login');
    }

    $model = new usuario_Model();
    // Verificamos que el usuario exista
    $usuario = $model->find($id_usuario);
    if (!$usuario) {
      return redirect()->to('/admin')->with('error', 'El usuario no existe.');
    }

    // Evitamos que un admin edite a otro admin (excepto a sí mismo)
    if ($usuario['perfil_id'] == 1 && $session->get('id_usuario') != $id_usuario) {
      return redirect()->to("/admin/editar/$id_usuario")->with('error', 'No podés editar a otro administrador.');
    }

    // Reglas de validación
    $rules = [
      'nombre'   => 'required|min_length[2]|max_length[50]|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/]',
      'apellido' => 'required|min_length[2]|max_length[50]|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/]',
      'usuario'   => 'required|min_length[3]|max_length[30]',
      'email'     => 'required|valid_email',
      'perfil_id' => 'required|in_list[1,2]',
      'baja'      => 'required|in_list[SI,NO]',
    ];

    $validationMessages = [
      'nombre' => [
        'required'     => 'El nombre es obligatorio.',
        'min_length'   => 'El nombre debe tener al menos 2 caracteres.',
        'max_length'   => 'El nombre no puede superar los 50 caracteres.',
        'regex_match'  => 'El nombre solo puede contener letras, espacios y guiones.',
      ],
      'apellido' => [
        'required'     => 'El apellido es obligatorio.',
        'min_length'   => 'El apellido debe tener al menos 2 caracteres.',
        'max_length'   => 'El apellido no puede superar los 50 caracteres.',
        'regex_match'  => 'El apellido solo puede contener letras, espacios y guiones.',
      ],
      // Podés seguir con los demás campos si querés
    ];

    if (!$this->validate($rules, $validationMessages)) {
      return redirect()->back()
        ->withInput()
        ->with('errors', $this->validator->getErrors());
    }

    // No darse de baja asi mismo
    if ($id_usuario == $session->get('id_usuario') && $this->request->getPost('baja') === 'SI') {
      return redirect()->back()
        ->withInput()
        ->with('msg_baja_error', 'No podés darte de baja a vos mismo.');
    }

    $data = [
      'nombre'    => $this->request->getPost('nombre'),
      'apellido'  => $this->request->getPost('apellido'),
      'usuario'   => $this->request->getPost('usuario'),
      'email'     => $this->request->getPost('email'),
      'perfil_id' => $this->request->getPost('perfil_id'),
      'baja'      => $this->request->getPost('baja'),
    ];

    $updated = $model->update($id_usuario, $data);

    if (!$updated) {
      return redirect()->back()
        ->withInput()
        ->with('error', 'Error al actualizar el usuario. Intente nuevamente.');
    }

    return redirect()->to("/admin/editar/$id_usuario")->with('mensaje', 'Usuario actualizado con éxito');
  }
}
