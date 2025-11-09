<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudiantesModel extends Model
{
    protected $table         = 'estudiantes';
    protected $primaryKey    = 'carne_alumno';
    protected $allowedFields = [
        'carne_alumno', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'fechanacimiento', 'codigo_grado',
    ];

}
