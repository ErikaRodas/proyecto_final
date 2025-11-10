<?php

namespace App\Controllers;
use App\Models\EstudiantesModel;

class EstudiantesController extends BaseController
{
    // Función principal: Muestra todos los estudiantes
    public function index(): string
    {
        $estudiantes = new EstudiantesModel();
        $datos['datos'] = $estudiantes->findAll();
        // Asegúrate de que esta vista exista en app/Views/estudiantes.php
        return view('estudiantes', $datos);
    }

    // Función para agregar un nuevo estudiante
    public function agregarEstudiante()
    {
        $estudiantes = new EstudiantesModel();
        $datos = [
            'carne_alumno'      => $this->request->getPost('txt_carne_alumno'),
            'nombre'            => $this->request->getPost('txt_nombre'),
            'apellido'          => $this->request->getPost('txt_apellido'),
            'direccion'         => $this->request->getPost('txt_direccion'),
            'telefono'          => $this->request->getPost('txt_telefono'),
            'email'             => $this->request->getPost('txt_email'),
            'fechanacimiento'   => $this->request->getPost('txt_fechanacimiento'),
            'grado_id'      => $this->request->getPost('txt_codigo_grado')
        ];

        // Intenta insertar los datos
        $estudiantes->insert($datos);
        
        // Regresa a la lista principal de estudiantes
        return redirect()->to(base_url('estudiantes'));
    }

    // Función para eliminar un estudiante por su carné
    public function eliminarEstudiante($carne_alumno)
    {
        $estudiantes = new EstudiantesModel();
        $estudiantes->delete($carne_alumno);
        return redirect()->to(base_url('estudiantes'));
    }

    // Función para buscar un estudiante y mostrar el formulario de edición
    public function buscarEstudiante($carne_alumno)
    {
        $estudiantes = new EstudiantesModel();
        // Busca solo un registro
        $datos['datos'] = $estudiantes->where('carne_alumno', $carne_alumno)->first(); 
        
        // Asegúrate de que esta vista se llama 'form_editar_estudiante.php'
        return view('form_editar_estudiante', $datos); 
    }
    
    // Función para procesar la modificación de un estudiante
    public function modificarEstudiante()
    {
        $estudiantes = new EstudiantesModel();
        $codigo = $this->request->getPost('txt_carne_alumno'); // Clave primaria
        $datos = [
            'nombre'            => $this->request->getPost('txt_nombre'),
            'apellido'          => $this->request->getPost('txt_apellido'),
            'direccion'         => $this->request->getPost('txt_direccion'),
            'telefono'          => $this->request->getPost('txt_telefono'),
            'email'             => $this->request->getPost('txt_email'),
            'fechanacimiento'   => $this->request->getPost('txt_fechanacimiento'),
            'codigo_grado'      => $this->request->getPost('txt_codigo_grado'),
        ];
        
        $estudiantes->update($codigo, $datos);
        return redirect()->to(base_url('estudiantes'));
    }
    
} 