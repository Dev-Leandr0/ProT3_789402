<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rutas Principales
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('monoplaza', 'Home::monoplaza');
$routes->get('pilotos', 'Home::pilotos');
$routes->get('contacto', 'Home::contacto');

// Rutas relacionadas al formulario de registro
$routes->get('/enviar-form', 'Usuario_Controller::create'); // Muestra el formulario de registro de usuario
$routes->post('/enviar-form', 'Usuario_Controller::formValidation'); // Procesa y valida el formulario de registro

// Rutas de login y autenticación
$routes->get('/login', 'Login_Controller::create'); // Muestra el formulario de inicio de sesión
$routes->post('/enviarlogin', 'Login_Controller::auth'); // Procesa las credenciales del usuario
$routes->get('/panel', 'Panel_Controller::index', ['filter' => 'auth']); // Panel de back/usuario/usuario_logueado.php
$routes->get('/logout', 'Login_Controller::logout'); // Cierra la sesión del usuario

// Admin_Controller controlador para admin 
// Ruta para mostrar el panel admin back/admin/admin_panel.php
$routes->get('admin', 'Admin_Controller::index', ['filter' => 'authAdmin']);

// Admin_Controller controlador para admin 
// Rutas para dar de baja o alta a un usuario funcion darDe... en Controller/Admin_Controller
$routes->get('admin/baja/(:num)', 'Admin_Controller::darDeBaja/$1', ['filter' => 'authAdmin']);
$routes->get('admin/alta/(:num)', 'Admin_Controller::darDeAlta/$1', ['filter' => 'authAdmin']);

// Admin_Controller controlador para admin 
// Ruta para ver detalles de un usuario back/admin/ver_usuario.php
$routes->get('admin/ver/(:num)', 'Admin_Controller::verUsuario/$1');
// Rutas para editar y actualizar usuarios back/admin/editar_usuario.php
$routes->get('admin/editar/(:num)', 'Admin_Controller::editar/$1');
$routes->post('admin/actualizar/(:num)', 'Admin_Controller::actualizar/$1');

// Panel_Controller Controlador para cliente
// Rutas para editar y actualizar mi perfil back/usuario/ver_mi_perfil.php
$routes->get('panel/perfil', 'Panel_Controller::verPerfil');
// Rutas para editar y actualizar mi perfil back/usuario/editar_perfil.php
$routes->get('perfil/editar', 'Panel_Controller::editarPerfil');
$routes->post('perfil/actualizar', 'Panel_Controller::actualizarPerfil');
