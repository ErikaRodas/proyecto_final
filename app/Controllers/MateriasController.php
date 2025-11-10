<?php

namespace App\Controllers;

use App\Models\MateriasModel;
use App\Models\MaestrosModel; 

class MateriasController extends BaseController
{
    
    public function index()
    {
        
        $materias = new MateriasModel();
        $maestros = new MaestrosModel();

   
        
        $datos['materias'] = $materias
            ->select('materias.*, maestros.nombre as nombre_maestro, maestros.apellido as apellido_maestro')
            ->join('maestros', 'maestros.codigo_maestro = materias.maestro_id', 'left') // LEFT JOIN para incluir materias sin maestro (NULL)
            ->findAll();
            
       
        $datos['maestros'] = $maestros->findAll();

        return view('materias_view', $datos);
    }
    

  public function agregarMateria()
    {
        $materias = new MateriasModel();
    
        $codigo_maestro = $this->request->getPost('ddl_codigo_maestro');

        $maestro_id_para_db = ($codigo_maestro) ? $codigo_maestro : null;
        
        $datos_a_insertar = [
            'maestro_id' => $maestro_id_para_db, 
            'nombre_materia' => $this->request->getPost('txt_nombre_materia')
        ];
        
        
        $materias->insert($datos_a_insertar);
    
        session()->setFlashdata('msg_exito', 'Materia agregada exitosamente.');
        
        return redirect()->to(base_url('materias'));
    }

    public function eliminarMateria($codigo_materia)
    {
        $materiasModel = new MateriasModel();
        
        $materiasModel->delete($codigo_materia);
        
        session()->setFlashdata('msg_exito', 'Materia (Código: '.$codigo_materia.') eliminada exitosamente.');
        
        return redirect()->to(base_url('materias'));
    }

    public function editarMateria($codigo_materia)
    {
        $materiasModel = new MateriasModel();
        $maestrosModel = new MaestrosModel();

    
        $materia = $materiasModel->find($codigo_materia);

        if (!$materia) {
            session()->setFlashdata('msg_error', 'Materia no encontrada.');
            return redirect()->to(base_url('materias'));
        }
        
      
        $data['materia'] = $materia;
        $data['maestros'] = $maestrosModel->findAll();

     
        return view('form_editar_materia', $data);
    }

    public function modificarMateria()
	{
	
		$materias = new MateriasModel();
		
		
		$codigo_materia = $this->request->getPost('txt_codigo_materia');
		$nombre_materia = $this->request->getPost('txt_nombre_materia');
		$codigo_maestro = $this->request->getPost('ddl_codigo_maestro');
		
	
		$datos_a_actualizar = [
			'nombre_materia' => $nombre_materia,
			
			'maestro_id' => $codigo_maestro ?: null 
		];

		$materias->update($codigo_materia, $datos_a_actualizar);
		
		session()->setFlashdata('msg_exito', 'Materia modificada exitosamente: ' . $nombre_materia);
		
		return redirect()->to(base_url('materias'));
	}

}