<?php namespace App\Models;

use CodeIgniter\Model;

class CalificacionModel extends Model
{
    protected $table      = 'calificaciones';
    protected $primaryKey = 'id_calificacion'; 
    protected $useTimestamps = false;

    // Campos permitidos para la inserción y actualización
    protected $allowedFields = [
        'carne_alumno',     
        'codigo_materia',   
        'periodo',          
        'puntuacion'        
    ];

    // Reglas de validación para asegurar la integridad de los datos
    protected $validationRules = [
        'carne_alumno'      => 'required|integer|exact_length[7]', 
        'codigo_materia'    => 'required|integer',
        'periodo'           => 'required|max_length[50]',
        'puntuacion'        => 'required|decimal|greater_than_equal_to[0.00]|less_than_equal_to[100.00]', 
    ];
    
    // Mensajes de error
    protected $validationMessages = [
        'carne_alumno' => [
            'exact_length' => 'El Carné del Alumno debe tener exactamente 7 dígitos.',
        ],
        'puntuacion' => [
            'decimal'               => 'La puntuación debe ser un número decimal válido (Ej: 85.50).',
            'greater_than_equal_to' => 'La puntuación debe ser 0.00 o mayor.',
            'less_than_equal_to'    => 'La puntuación debe ser 100.00 o menor.'
        ],
    ];
}