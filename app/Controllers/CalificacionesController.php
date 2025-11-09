<?php namespace App\Controllers;

use App\Models\CalificacionModel;
use CodeIgniter\Controller;

class CalificacionesController extends Controller
{
    public function mostrar()
    {
        $model = new CalificacionModel();
        $datosCalificaciones = $model->findAll(); 

        return view('calificaciones', [
            'calificaciones' => $datosCalificaciones 
        ]);
    }

    public function nuevo()
    {
        return view('form_agregar_calificaciones');
    }

    public function guardar()
    {
        $model = new CalificacionModel();
        $datos_post = $this->request->getPost();

        if (! $this->validate($model->validationRules, $model->validationMessages)) {
            return view('form_agregar_calificaciones', [
                'validation' => $this->validator,
                'datos_anteriores' => $datos_post
            ]);
        }

        try {
            $model->save($datos_post);
            return redirect()->to('/calificaciones/mostrar')->with('mensaje', 'Calificación agregada con éxito. 👍');

        } catch (\Exception $e) {
            return view('form_agregar_calificaciones', [
                'error_db' => 'Error al guardar. Revise que el Carné del Alumno y el Código de Materia existan en la base de datos.',
                'datos_anteriores' => $datos_post 
            ]);
        }
    }

    public function eliminar($id_calificacion = null)
    {
        if ($id_calificacion === null || !is_numeric($id_calificacion)) {
            return redirect()->to('/calificaciones/mostrar')->with('error', 'ID de calificación no válido.');
        }

        $model = new CalificacionModel();
        try {
            if ($model->delete($id_calificacion)) {
                return redirect()->to('/calificaciones/mostrar')->with('mensaje', '✅ Calificación ID ' . $id_calificacion . ' eliminada con éxito.');
            } else {
                if ($model->find($id_calificacion)) {
                    return redirect()->to('/calificaciones/mostrar')->with('error', 'Ocurrió un error al intentar eliminar la calificación.');
                } else {
                    return redirect()->to('/calificaciones/mostrar')->with('error', '❌ La calificación ID ' . $id_calificacion . ' no fue encontrada.');
                }
            }
        } catch (\Exception $e) {
            return redirect()->to('/calificaciones/mostrar')->with('error', '⚠️ Error de base de datos al eliminar: ' . $e->getMessage());
        }
    }

    public function editar($id_calificacion = null)
    {
        $model = new CalificacionModel();

        $calificacion = $model->find($id_calificacion);

        if (empty($calificacion)) {
            return redirect()->to('/calificaciones/mostrar')->with('error', '❌ Calificación no encontrada para edición.');
        }
        return view('form_editar_calificaciones', [
            'calificacion' => $calificacion
        ]);
    }

    public function actualizar()
    {
        $model = new CalificacionModel();
        $datos_post = $this->request->getPost();
        $id_calificacion = $datos_post['id_calificacion'] ?? null;

        if (! $this->validate($model->validationRules, $model->validationMessages)) {
            return view('form_editar_calificaciones', [
                'validation' => $this->validator,
                'calificacion' => $datos_post 
            ]);
        }

        try {
            $model->save($datos_post);

            return redirect()->to('/calificaciones/mostrar')->with('mensaje', '✅ Calificación ID ' . $id_calificacion . ' actualizada con éxito.');

        } catch (\Exception $e) {
            $mensajeError = 'Error al actualizar. Revise que el Carné y el Código de Materia sigan siendo válidos.';
            
            return view('form_editar_calificaciones', [
                'error_db' => $mensajeError,
                'calificacion' => $datos_post 
            ]);
        }
    }

    public function buscar()
    {
        return view('form_buscar_calificaciones');
    }

    public function resultado()
    {
        $model = new CalificacionModel();
        $datos_post = $this->request->getPost();
        $termino = trim($datos_post['termino_busqueda'] ?? '');

        $calificaciones = [];
        $mensaje = '';

        if (!empty($termino)) {
            $calificaciones = $model->like('carne_alumno', $termino)
                                    ->orLike('codigo_materia', $termino)
                                    ->orLike('periodo', $termino)
                                    ->findAll();
                                    
            if (empty($calificaciones)) {
                $mensaje = 'No se encontraron resultados para: "' . esc($termino) . '".';
            } else {
                $mensaje = 'Resultados de la búsqueda para: "' . esc($termino) . '".';
            }

        } else {
            $calificaciones = $model->findAll();
            $mensaje = 'Debe ingresar un término de búsqueda.';
        }
        return view('calificaciones', [
            'calificaciones' => $calificaciones,
            'mensaje' => $mensaje,
            'termino_busqueda_anterior' => $termino
        ]);
    }
}