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

    public function buscarMaestro($codigo_maestro)
    {
        $maestros = new MaestrosModel();
        
        $datos['maestro'] = $maestros->find($codigo_maestro);
        
        
        return view('form_editar_maestro', $datos);
    }
    public function modificarMaestro()
    {
        $maestros = new MaestrosModel();
        
        $codigo_maestro = $this->request->getPost('txt_codigo_maestro');
       
        $datos = [
            'nombre' => $this->request->getPost('txt_nombre'),
            'apellido' => $this->request->getPost('txt_apellido'),
            'direccion' => $this->request->getPost('txt_direccion'),
            'email' => $this->request->getPost('txt_email')
        ];
        $maestros->update($codigo_maestro, $datos);
        
        session()->setFlashdata('msg_exito', 'Maestro (Código: '.$codigo_maestro.') modificado exitosamente.');
        
        return redirect()->to(base_url('maestros'));
    }

    public function buscar()
    {
        return view('form_buscar_maestro');
    }

    /**
     * Procesa el término de búsqueda, consulta el modelo y muestra los resultados.
     */
    public function resultado()
    {
        $model = new \App\Models\MaestrosModel(); 
        
        $datos_post = $this->request->getPost();
        $termino = trim($datos_post['termino_busqueda'] ?? '');

        $maestros = [];
        $mensaje = '';

        if (!empty($termino)) {
            $maestros = $model->like('nombre', $termino)
                                    ->orLike('apellido', $termino)
                                    ->orLike('codigo_maestro', $termino) 
                                    ->findAll();
                                    
            if (empty($maestros)) {
                $mensaje = '❌ No se encontraron maestros con el término: "' . esc($termino) . '".';
            } else {
                $mensaje = '✅ Mostrando ' . count($maestros) . ' resultados para: "' . esc($termino) . '".';
            }

        } else {
            $maestros = $model->findAll(); 
            $mensaje = 'Debe ingresar un término de búsqueda para ver resultados.';
        }
        
        return view('maestros_view', [ 
            'maestros' => $maestros,
            'mensaje' => $mensaje,
            'termino_busqueda_anterior' => $termino 
        ]);
    }
}