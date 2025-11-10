<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantesModel extends Model
{
    protected $table         = 'estudiantes';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'carne_alumno', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'fechanacimiento', 'codigo_grado',
    ];

}

GradosController.php 
<?php

namespace App\Controllers;
use App\Models\GradosModel;

class GradosController extends BaseController
{
    public function index(): string
    {
        $grados = new GradosModel();
        $datos['datos'] = $grados->findAll();
        return view('grados', $datos);
    }
    public function agregarGrado()
    {
        $grados = new GradosModel();
        $datos = [
            'codigo_grado' => $this->request->getPost('txt_codigo_grado'),
            'nombre' => $this->request->getPost('txt_nombre')
        ];
        $grados->insert($datos);
        return $this->index();
    }

    public function eliminarGrado($codigo_grado)
    {
        $grados = new GradosModel();
        $grados->delete($codigo_grado);
        return $this->index();
    }

    public function buscarGrado($codigo_grado)
    {
        $grados = new GradosModel();
        $datos['datos'] = $grados->where('codigo_grado', $codigo_grado)->first();
        return view('form_editar_grado', $datos);
    }
    
    public function modificarGrado()
    {
        $grados = new GradosModel();
        $datos = [
            'nombre' => $this->request->getPost('txt_nombre'),
        ];
        $codigo = $this->request->getPost('txt_codigo_grado');
        $grados->update($codigo, $datos);
        return $this->index();
    }
}
