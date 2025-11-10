<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMaestros extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'codigo_maestro' => ['type'=>'INT','constraint'=>4,'null'=>true], // legado
            'nombre'         => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'apellido'       => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'direccion'      => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'email'          => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('codigo_maestro');
        $this->forge->createTable('maestros');
    }

    public function down()
    {
        $this->forge->dropTable('maestros');
    }
}
