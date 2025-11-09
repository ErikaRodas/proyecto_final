<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class UsuariosController extends Controller
{
    /**
     * Procesa la solicitud de inicio de sesión (POST del formulario).
     */
    public function index()
    {
        $email = $this->request->getPost('txt_usuario');
        $contra = $this->request->getPost('txt_contra');
        
        // 1. Instanciar el modelo para interactuar con la DB
        $usuarios = new UsuariosModel();
        
        // 2. Buscar al usuario en la base de datos, incluyendo el carné
        $datos = $usuarios->select('nombre, tipo_usuario_id, carne_alumno') 
            ->where('email', $email)
            ->where('password', $contra)
            ->first();
            
        if($datos){
            $tipo_usuario = $datos['tipo_usuario_id'];
            
            // 3. Credenciales válidas: Crear la sesión
            $sesion = [
                'nombre' => $datos['nombre'],
                'tipo' => $tipo_usuario, 
                'activa' => true,
                'carne' => $datos['carne_alumno'] // Guardar el carné (será NULL para Admin)
            ]; 
            session()->set($sesion);

            // 4. Redirigir según el rol (1=Admin, 2=Estudiante)
            if($tipo_usuario == 1 || $tipo_usuario == 2){
                return view('menu_principal'); 
            }else{
                // Tipo de usuario no autorizado
                session()->destroy();
                return redirect()->to(base_url('')); 
            }
       }else{
    // 5. Credenciales inválidas
           session()->setFlashdata('error', 'Correo o contraseña incorrectos. Intente de nuevo.'); 
            return redirect()->to(base_url(''));
        }
    }
    
    /**
     * Destruye la sesión y redirige al login.
     */
    public function cerrarSesion(){
        session()->destroy();
        return redirect()->to(base_url(''));
    }
}