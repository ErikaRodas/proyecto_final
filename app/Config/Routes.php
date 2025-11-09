<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('iniciar_sesion', 'UsuariosController::index');

$routes->get('cerrar_sesion', 'UsuariosController::cerrarSesion');

// Rutas del CRUD de Calificaciones (Helary)
$routes->get('calificaciones', 'CalificacionesController::mostrar'); 
$routes->get('calificaciones/mostrar', 'CalificacionesController::mostrar'); 
$routes->get('calificaciones/nuevo', 'CalificacionesController::nuevo');
$routes->post('calificaciones/guardar', 'CalificacionesController::guardar');

// Rutas placeholder para las funcionalidades pendientes (Eliminar, Modificar, Buscar, Informe)
$routes->get('calificaciones/eliminar/(:num)', 'CalificacionesController::eliminar/$1');
$routes->get('calificaciones/editar/(:num)', 'CalificacionesController::editar/$1');
$routes->get('calificaciones/buscar', 'CalificacionesController::buscar');
$routes->get('calificaciones/informe', 'CalificacionesController::informe');