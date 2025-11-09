<?php

namespace App\Controllers;

use App\Models\MateriasModel;
use App\Models\MaestrosModel; // Necesitamos el modelo de Maestros para obtener la lista de maestros

class MateriasController extends BaseController
{
    
    public function index()
    {
        
        $materias = new MateriasModel();
        $maestros = new MaestrosModel();

   
        
        $datos['materias'] = $materias
            ->select('materias.*, maestros.nombre as nombre_maestro, maestros.apellido as apellido_maestro')
            ->join('maestros', 'maestros.codigo_maestro = materias.codigo_maestro', 'left') // LEFT JOIN para incluir materias sin maestro (NULL)
            ->findAll();
            
       
        $datos['maestros'] = $maestros->findAll();

        return view('materias_view', $datos);
    }
    

    public function agregarMateria()
    {
       
        if ($this->request->getMethod() == 'post') {
         
            $materias = new MateriasModel();
          
            $datos_a_insertar = [
                'codigo_maestro' => $this->request->getPost('ddl_codigo_maestro'), 
                'nombre_materia' => $this->request->getPost('txt_nombre_materia')
            ];
            
           
            $materias->insert($datos_a_insertar);
       
            session()->setFlashdata('msg_exito', 'Materia agregada exitosamente.');
            
            return redirect()->to(base_url('materias'));
        }
    }

    public function eliminarMateria($codigo_materia)
    {
        $materiasModel = new MateriasModel();
        
        $materiasModel->delete($codigo_materia);
        
        session()->setFlashdata('msg_exito', 'Materia (Código: '.$codigo_materia.') eliminada exitosamente.');
        
        return redirect()->to(base_url('materias'));
    }

}