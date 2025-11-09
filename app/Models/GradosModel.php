<?php

namespace App\Models;

use CodeIgniter\Model;

class GradosModel extends Model
{
    protected $table         = 'grados';
    protected $primaryKey    = 'codigo_grado';
    protected $allowedFields = [
        'codigo_grado', 'nombre_grado',
    ];

}

