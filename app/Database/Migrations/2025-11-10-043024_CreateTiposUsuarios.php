<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTiposUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type'=>'TINYINT','unsigned'=>true,'auto_increment'=>true],
            'nombre'      => ['type'=>'VARCHAR','constraint'=>60,'null'=>false],
            'descripcion' => ['type'=>'VARCHAR','constraint'=>500,'null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tipos_usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('tipos_usuarios');
    }
}
