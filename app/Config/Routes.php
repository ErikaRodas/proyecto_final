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



// grados
$routes->get('grados', 'GradosController::index');
$routes->get('eliminar_grado/(:num)', 'GradosController::eliminarGrado/$1');
$routes->get('buscar_grado/(:num)', 'GradosController::buscarGrado/$1');

$routes->post('agregar_grado', 'GradosController::agregarGrado');
$routes->post('modificar_grado', 'GradosController::modificarGrado');


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

>>>>>>> main
$routes->get('maestros', 'MaestrosController::index');
$routes->post('agregar_maestro', 'MaestrosController::agregarMaestro');
$routes->get('eliminar_maestro/(:num)', 'MaestrosController::eliminarMaestro/$1');
$routes->get('editar_maestro/(:num)', 'MaestrosController::buscarMaestro/$1'); 
$routes->post('modificar_maestro', 'MaestrosController::modificarMaestro');
<<<<<<< HEAD
$routes->post('modificar_maestro', 'MaestrosController::modificarMaestro');
$routes->post('agregar_estudiante', 'EstudiantesController::agregarEstudiante');
=======

$routes->get('materias', 'MateriasController::index');
$routes->post('agregar_materia', 'MateriasController::agregarMateria');
$routes->get('eliminar_materia/(:segment)', 'MateriasController::eliminarMateria/$1');
$routes->get('editar_materia/(:segment)', 'MateriasController::editarMateria/$1');
$routes->post('modificar_materia', 'MateriasController::modificarMateria');

// Estudiantes
$routes->get('estudiantes', 'EstudiantesController::index');
$routes->get('eliminar_estudiante/(:num)', 'EstudiantesController::eliminarEstudiante/$1');
$routes->get('buscar_estudiante/(:num)', 'EstudiantesController::buscarEstudiante/$1');

$routes->post('agregar_estudiante', 'EstudiantesController::agregarEstudiante');
$routes->post('modificar_estudiante', 'EstudiantesController::modificarEstudiante');
/ grados
$routes->get('grados', 'GradosController::index');
$routes->get('eliminar_grado/(:num)', 'GradosController::eliminarGrado/$1');
$routes->get('buscar_grado/(:num)', 'GradosController::buscarGrado/$1');

$routes->post('agregar_grado', 'GradosController::agregarGrado');
$routes->post('modificar_grado', 'GradosController::modificarGrado');
>>>>>>> main
