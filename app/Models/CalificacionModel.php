<?php namespace App\Models;

use CodeIgniter\Model;

class CalificacionModel extends Model
{
    protected $table      = 'calificaciones';
    protected $primaryKey = 'id'; 
    protected $useTimestamps = false;

    // Campos permitidos para la inserción y actualización
    protected $allowedFields = [
        'estudiante_id',     
        'materia_id',   
        'periodo',          
        'puntuacion'        
    ];

    // Reglas de validación para asegurar la integridad de los datos
    protected $validationRules = [
        'estudiante_id'      => 'required|integer', 
        'materia_id'    => 'required|integer',
        'periodo'           => 'required|max_length[50]',
        'puntuacion'        => 'required|decimal|greater_than_equal_to[0.00]|less_than_equal_to[100.00]', 
    ];
    
    // Mensajes de error
    protected $validationMessages = [
        'estudiante_id' => [
            'exact_length' => 'El Carné del Alumno debe tener exactamente 7 dígitos.',
        ],
        'puntuacion' => [
            'decimal'               => 'La puntuación debe ser un número decimal válido (Ej: 85.50).',
            'greater_than_equal_to' => 'La puntuación debe ser 0.00 o mayor.',
            'less_than_equal_to'    => 'La puntuación debe ser 100.00 o menor.'
        ],
    ];
}