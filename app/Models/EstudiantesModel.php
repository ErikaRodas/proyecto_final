<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantesModel extends Model
{

    protected $table = 'estudiantes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'carne_alumno', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'fechanacimiento', 'grado_id',
    ];
}

