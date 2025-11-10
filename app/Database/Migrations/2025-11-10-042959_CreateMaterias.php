<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMaterias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'codigo_materia'  => ['type'=>'INT','constraint'=>4,'null'=>true], // legado
            'maestro_id'      => ['type'=>'INT','unsigned'=>true,'null'=>true], // FK a maestros.id
            'nombre_materia'  => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('codigo_materia');
        $this->forge->addForeignKey('maestro_id','maestros','id','SET NULL','CASCADE');
        $this->forge->createTable('materias');
    }

    public function down()
    {
        $this->forge->dropTable('materias');
    }
}
