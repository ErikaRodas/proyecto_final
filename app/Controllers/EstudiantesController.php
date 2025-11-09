<?php

namespace App\Controllers;
use App\Models\EstudiantesModel;

class EstudiantesController extends BaseController
{

public function index(): string
{
    $estudiantes = new EstudiantesModel();
    $datos['datos'] = $estudiantes->findAll();
    return view('estudiantes', $datos);
}


public function agregarEstudiante()
{
    $estudiantes = new EstudiantesModel();
    $datos = [
        'carne_alumno' => $this->request->getPost('txt_carne_alumno'),
        'nombre' => $this->request->getPost('txt_nombre'),
        'apellido' => $this->request->getPost('txt_apellido'),
        'direccion' => $this->request->getPost('txt_direccion'),
        'telefono' => $this->request->getPost('txt_telefono'),
        'email' => $this->request->getPost('txt_email'),
        'fechanacimiento' => $this->request->getPost('txt_fechanacimiento'),
        'codigo_grado' => $this->request->getPost('txt_codigo_grado')
    ];
    $estudiantes->insert($datos);
    return $this->index();
}
public function eliminarEstudiante($carne_alumno)
{
    $estudiantes = new EstudiantesModel();
    $estudiantes->delete($carne_alumno);
    return $this->index();
}
public function buscarEstudiante($carne_alumno)
{
    $estudiantes = new EstudiantesModel();
    $datos['datos'] = $estudiantes->where('carne_alumno', $carne_alumno)->first();
    return view('form_editar_estudiante', $datos);
}

public function modificarEstudiante()
{
    $estudiantes = new EstudiantesModel();
    $datos = [
        'nombre' => $this->request->getPost('txt_nombre'),
        'apellido' => $this->request->getPost('txt_apellido'),
        'direccion' => $this->request->getPost('txt_direccion'),
        'telefono' => $this->request->getPost('txt_telefono'),
        'email' => $this->request->getPost('txt_email'),
        'fechanacimiento' => $this->request->getPost('txt_fechanacimiento'),
        'codigo_grado' => $this->request->getPost('txt_codigo_grado'),
    ];
    $codigo = $this->request->getPost('txt_carne_alumno');
    $estudiantes->update($codigo, $datos);
    return $this->index();
}
}

