<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class UsuariosController extends Controller
{
    /**
     * Procesa la solicitud de inicio de sesión (POST del formulario).
     */
    public function login()
    {
        $email = $this->request->getPost('txt_usuario');
        $contra = $this->request->getPost('txt_contra');
        
        // 1. Instanciar el modelo para interactuar con la DB
        $usuarios = new UsuariosModel();
        
        // 2. Buscar al usuario en la base de datos, incluyendo el carné
        $datos = $usuarios->getUsuarioByEmailAndPassword($email, $contra);

        if(!$datos){
            session()->setFlashdata('error', 'Correo o contraseña incorrectos. Intente de nuevo.'); 
            return redirect()->to(base_url(''));
        }
            
    
            $tipo_usuario = $datos['tipo_usuario_id'];
            
            // 3. Credenciales válidas: Crear la sesión
            $sesion = [
                'nombre' => $datos['nombre'],
                'tipo' => $tipo_usuario, 
                'activa' => true
            ];

            session()->set($sesion);
   
            return redirect()->to(base_url('menu_principal'));

    }
    
    /**
     * Destruye la sesión y redirige al login.
     */
    public function cerrarSesion(){
        session()->destroy();
        return redirect()->to(base_url(''));
    }


    /**
     * Muestra el menú principal después del inicio de sesión.
     */
    public function menuPrincipal(){
        $data['rol'] = session()->get('tipo');
        return view('menu_principal', $data); 
    }

}