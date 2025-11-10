<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'nombre'          => ['type'=>'VARCHAR','constraint'=>60,'null'=>false],
            'email'           => ['type'=>'VARCHAR','constraint'=>70,'null'=>false],
            'password'        => ['type'=>'VARCHAR','constraint'=>100,'null'=>false],
            'tipo_usuario_id' => ['type'=>'TINYINT','unsigned'=>true,'null'=>true],  // FK a tipos_usuarios.id
            'estudiante_id'   => ['type'=>'INT','unsigned'=>true,'null'=>true],      // FK a estudiantes.id
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('estudiante_id'); // reflejo de UNIQUE(carne_alumno) en usuarios
        $this->forge->addForeignKey('tipo_usuario_id','tipos_usuarios','id','NO ACTION','CASCADE');
        $this->forge->addForeignKey('estudiante_id','estudiantes','id','NO ACTION','CASCADE');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
