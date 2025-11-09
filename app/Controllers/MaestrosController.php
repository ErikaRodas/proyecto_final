<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MaestrosModel;
class MaestrosController extends BaseController
{

    public function index()
    {
       
        $maestros = new MaestrosModel();

        $datos ['datos'] = $maestros->findAll();

  
        return view('maestros_view', $datos);
    }

    public function agregarMaestro()
    {
        
        $maestros = new MaestrosModel();
        
  
        $datos = [
            'nombre' => $this->request->getPost('txt_nombre'),
            'apellido' => $this->request->getPost('txt_apellido'),
            'direccion' => $this->request->getPost('txt_direccion'),
            'email' => $this->request->getPost('txt_email')
        ];
    
        $maestros->insert($datos);
        

        session()->setFlashdata('msg_exito', 'Maestro agregado exitosamente. (CRUD: Insertar completado)');
        
        return redirect()->to(base_url('maestros')); 
    }

    public function eliminarMaestro($codigo_maestro)
    {
    
        $maestros = new MaestrosModel();

  
        $maestros->delete($codigo_maestro);

      
        session()->setFlashdata('msg_exito', 'Maestro (Código: '.$codigo_maestro.') eliminado exitosamente.');

     
        return redirect()->to(base_url('maestros'));
    }
}