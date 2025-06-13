<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('monoplaza', 'Home::monoplaza');
$routes->get('pilotos', 'Home::pilotos');
$routes->get('contacto', 'Home::contacto');

$routes->get('/enviar-form', 'Usuario_Controller::create');
$routes->post('/enviar-form', 'Usuario_Controller::formValidation');

$routes->get('/login', 'Login_Controller::create');
$routes->post('/enviarlogin', 'Login_Controller::auth');
$routes->get('/panel', 'Panel_Controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login_Controller::logout');

$routes->get('admin', 'Admin_Controller::index', ['filter' => 'authAdmin']);
$routes->get('admin/baja/(:num)', 'Admin_Controller::darDeBaja/$1', ['filter' => 'authAdmin']);
