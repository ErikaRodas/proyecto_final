<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriasModel extends Model
{
   
    protected $table = 'materias';

    protected $primaryKey = 'codigo_materia';

    protected $allowedFields = [
        'codigo_maestro',
        'nombre_materia' 
    ];
}