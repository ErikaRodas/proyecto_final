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

$routes->get('calificaciones/eliminar/(:num)', 'CalificacionesController::eliminar/$1');
$routes->get('calificaciones/editar/(:num)', 'CalificacionesController::editar/$1');
$routes->get('calificaciones/buscar', 'CalificacionesController::buscar');
$routes->post('calificaciones/resultado', 'CalificacionesController::resultado');
$routes->post('calificaciones/actualizar', 'CalificacionesController::actualizar');

$routes->get('maestros', 'MaestrosController::index');
$routes->post('agregar_maestro', 'MaestrosController::agregarMaestro');
$routes->get('eliminar_maestro/(:num)', 'MaestrosController::eliminarMaestro/$1');
$routes->get('buscar_maestro/(:num)', 'MaestrosController::buscarMaestro/$1'); 
$routes->post('modificar_maestro', 'MaestrosController::modificarMaestro');

$routes->get('materias', 'MateriasController::index');
$routes->post('agregar_materia', 'MateriasController::agregarMateria');
$routes->get('eliminar_materia/(:segment)', 'MateriasController::eliminarMateria/$1');
$routes->get('editar_materia/(:segment)', 'MateriasController::editarMateria/$1');
$routes->post('modificar_materia', 'MateriasController::modificarMateria');

