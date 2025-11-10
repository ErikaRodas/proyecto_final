<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExtracurriculares extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'estudiante_id'    => ['type'=>'INT','unsigned'=>true,'null'=>false], // FK a estudiantes.id
            'nombre_actividad' => ['type'=>'VARCHAR','constraint'=>100,'null'=>false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['estudiante_id','nombre_actividad']);
        $this->forge->addForeignKey('estudiante_id','estudiantes','id','CASCADE','CASCADE');
        $this->forge->createTable('extracurriculares');
    }

    public function down()
    {
        $this->forge->dropTable('extracurriculares');
    }
}
