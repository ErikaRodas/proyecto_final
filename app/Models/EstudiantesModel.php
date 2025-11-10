<?php

namespace App\Models;
<<<<<<< HEAD

=======
>>>>>>> feature/mostrar-todos-estudiantes
use CodeIgniter\Model;

class EstudiantesModel extends Model
{
<<<<<<< HEAD
    protected $table         = 'estudiantes';
    protected $primaryKey    = 'carne_alumno';
    protected $allowedFields = [
        'carne_alumno', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'fechanacimiento', 'codigo_grado',
    ];

=======
    protected $table = 'estudiantes';
    protected $primaryKey = 'carne_alumno';
    protected $allowedFields = [
        'carne_alumno', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'fechanacimiento', 'codigo_grado',
    ];
>>>>>>> feature/mostrar-todos-estudiantes
}

