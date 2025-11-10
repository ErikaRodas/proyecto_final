<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table          = 'usuarios';
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'usuario_id',
        'nombre',
        'email',
        'password',
        'tipo_usuario_id'
    ];

    public function getUsuarioByEmailAndPassword($email, $password)
    {
        return $this->where('email', $email)
                    ->where('password', $password)
                    ->first();
    }
 
}