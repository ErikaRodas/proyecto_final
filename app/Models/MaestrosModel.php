<?php

namespace App\Models;

use CodeIgniter\Model;

class MaestrosModel extends Model
{

    protected $table = 'maestros';

    protected $primaryKey = 'codigo_maestro';

   
    protected $allowedFields = [
        'nombre',
        'apellido',
        'direccion',
        'email'
    ];
}