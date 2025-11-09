<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('iniciar_sesion', 'UsuariosController::index');

$routes->get('cerrar_sesion', 'UsuariosController::cerrarSesion');

<<<<<<< HEAD
=======
$routes->get('maestros', 'MaestrosController::index');
$routes->post('agregar_maestro', 'MaestrosController::agregarMaestro');
$routes->get('eliminar_maestro/(:num)', 'MaestrosController::eliminarMaestro/$1');
$routes->get('buscar_maestro/(:num)', 'MaestrosController::buscarMaestro/$1'); 
$routes->post('modificar_maestro', 'MaestrosController::modificarMaestro');
>>>>>>> 696e38b0ad223af9ebb436608ac7950d3d2de0d3

$routes->get('estudiantes', 'EstudiantesController::index');
$routes->post('agregar_estudiante', 'EstudiantesController::agregarEstudiante');