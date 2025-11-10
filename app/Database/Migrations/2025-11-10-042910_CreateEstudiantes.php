<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEstudiantes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'carne_alumno'    => ['type'=>'INT','constraint'=>7,'null'=>true], // legado
            'nombre'          => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'apellido'        => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'direccion'       => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'telefono'        => ['type'=>'INT','constraint'=>8,'null'=>true],
            'email'           => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'fechanacimiento' => ['type'=>'DATE','null'=>true],
            'grado_id'        => ['type'=>'INT','unsigned'=>true,'null'=>true], // FK a grados.id
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('carne_alumno');
        $this->forge->addForeignKey('grado_id','grados','id','SET NULL','CASCADE');
        $this->forge->createTable('estudiantes');
    }

    public function down()
    {
        $this->forge->dropTable('estudiantes');
    }
}
