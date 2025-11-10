<?php

namespace App\Models;

use CodeIgniter\Model;

class MaestrosModel extends Model
{

    protected $table = 'maestros';

    protected $primaryKey = 'id';

   
    protected $allowedFields = [
        'nombre',
        'apellido',
        'direccion',
        'email'
    ];
}