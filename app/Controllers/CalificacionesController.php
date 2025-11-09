<?php namespace App\Controllers;

use App\Models\CalificacionModel;
use CodeIgniter\Controller;

class CalificacionesController extends Controller
{
    public function mostrar()
    {
        $model = new CalificacionModel();
        $datosCalificaciones = $model->findAll(); 

        return view('calificaciones/calificaciones', [
            'calificaciones' => $datosCalificaciones 
        ]);
    }

    public function nuevo()
    {
        return view('calificaciones/form_agregar_calificaciones');
    }

    public function guardar()
    {
        $model = new CalificacionModel();
        $datos_post = $this->request->getPost();

        if (! $this->validate($model->validationRules, $model->validationMessages)) {
            return view('calificaciones/form_agregar_calificaciones', [
                'validation' => $this->validator,
                'datos_anteriores' => $datos_post
            ]);
        }

        try {
            $model->save($datos_post);
            return redirect()->to('/calificaciones/mostrar')->with('mensaje', 'Calificación agregada con éxito. 👍');

        } catch (\Exception $e) {
            return view('calificaciones/form_agregar_calificaciones', [
                'error_db' => 'Error al guardar. Revise que el Carné del Alumno y el Código de Materia existan en la base de datos.',
                'datos_anteriores' => $datos_post 
            ]);
        }
    }
}