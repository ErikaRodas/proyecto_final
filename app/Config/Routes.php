<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('iniciar_sesion', 'UsuariosController::index');

$routes->get('cerrar_sesion', 'UsuariosController::cerrarSesion');


// grados
$routes->get('grados', 'GradosController::index');
$routes->get('eliminar_grado/(:num)', 'GradosController::eliminarGrado/$1');
$routes->get('buscar_grado/(:num)', 'GradosController::buscarGrado/$1');

$routes->post('agregar_grado', 'GradosController::agregarGrado');
$routes->post('modificar_grado', 'GradosController::modificarGrado');

// Estudiantes
$routes->get('estudiantes', 'EstudiantesController::index');
$routes->get('eliminar_estudiante/(:num)', 'EstudiantesController::eliminarEstudiante/$1');
$routes->get('buscar_estudiante/(:num)', 'EstudiantesController::buscarEstudiante/$1');

$routes->post('agregar_estudiante', 'EstudiantesController::agregarEstudiante');
$routes->post('modificar_estudiante', 'EstudiantesController::modificarEstudiante');
