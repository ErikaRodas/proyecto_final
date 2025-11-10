<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriasModel extends Model
{
   
    protected $table = 'materias';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'maestro_id',
        'nombre_materia' 
    ];
}