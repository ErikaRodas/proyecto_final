<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('iniciar_sesion', 'UsuariosController::index');

$routes->get('cerrar_sesion', 'UsuariosController::cerrarSesion');

$routes->get('maestros', 'MaestrosController::index');
$routes->post('agregar_maestro', 'MaestrosController::agregarMaestro');
$routes->get('eliminar_maestro/(:num)', 'MaestrosController::eliminarMaestro/$1');