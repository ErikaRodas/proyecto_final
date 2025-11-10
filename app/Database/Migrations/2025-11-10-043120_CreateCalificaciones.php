<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCalificaciones extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'estudiante_id' => ['type'=>'INT','unsigned'=>true,'null'=>false], // FK a estudiantes.id
            'materia_id'    => ['type'=>'INT','unsigned'=>true,'null'=>false], // FK a materias.id
            'periodo'       => ['type'=>'VARCHAR','constraint'=>50,'null'=>false],
            'puntuacion'    => ['type'=>'DECIMAL','constraint'=>'5,2','null'=>false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['estudiante_id','materia_id','periodo']); // equivalente a uk_calificacion
        $this->forge->addForeignKey('estudiante_id','estudiantes','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('materia_id','materias','id','CASCADE','CASCADE');
        $this->forge->createTable('calificaciones');
    }

    public function down()
    {
        $this->forge->dropTable('calificaciones');
    }
}
