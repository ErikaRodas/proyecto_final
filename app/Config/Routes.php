<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('iniciar_sesion', 'UsuariosController::index');

$routes->get('cerrar_sesion', 'UsuariosController::cerrarSesion');

// Empleados
$routes->get('empleados', 'EmpleadosController::index');
$routes->get('eliminar_empleado/(:num)', 'EmpleadosController::eliminarEmpleado/$1');
$routes->get('buscar_empleado/(:num)', 'EmpleadosController::buscarEmpleado/$1');

$routes->post('agregar_empleado', 'EmpleadosController::agregarEmpleado');
$routes->post('modificar_empleado', 'EmpleadosController::modificarEmpleado');

// grados
$routes->get('grados', 'GradosController::index');
$routes->get('eliminar_grado/(:num)', 'GradosController::eliminarGrado/$1');
$routes->get('buscar_grado/(:num)', 'GradosController::buscarGrado/$1');

$routes->post('agregar_grado', 'GradosController::agregarGrado');
$routes->post('modificar_grado', 'GradosController::modificarGrado');
$routes->get('buscar_alumno/(:num)', 'EstudiantesController::buscarEstudiante/$1');
