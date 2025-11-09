<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('iniciar_sesion', 'UsuariosController::index');

$routes->get('cerrar_sesion', 'UsuariosController::cerrarSesion');

// Rutas del CRUD de Calificaciones (Helary)
 
$routes->get('calificaciones/nuevo', 'CalificacionesController::nuevo');
$routes->post('calificaciones/guardar', 'CalificacionesController::guardar');

// Rutas placeholder para las funcionalidades pendientes (Eliminar, Modificar, Buscar, Informe)
$routes->get('calificaciones/eliminar/(:num)', 'CalificacionesController::eliminar/$1');
$routes->get('calificaciones/editar/(:num)', 'CalificacionesController::editar/$1');
$routes->get('calificaciones/buscar', 'CalificacionesController::buscar');
$routes->get('calificaciones/informe', 'CalificacionesController::informe');

$routes->get('maestros', 'MaestrosController::index');
$routes->post('agregar_maestro', 'MaestrosController::agregarMaestro');
$routes->get('eliminar_maestro/(:num)', 'MaestrosController::eliminarMaestro/$1');
$routes->get('buscar_maestro/(:num)', 'MaestrosController::buscarMaestro/$1'); 
$routes->post('modificar_maestro', 'MaestrosController::modificarMaestro');
