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
}
