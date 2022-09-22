<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'usuario' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
                'unique'     => true,
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'fecha_incorporacion' => [
                'type' => 'DATETIME',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '120',
                'unique'     => true,
            ],
            'nombre_foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '35',
                'null'       => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
                'null'       => true,
            ],
            'apellido' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
                'null'       => true,
            ],
            'nivel' => [
                'type'           => 'INT',
                'constraint'     => 1,
            ],
            'estatus' => [
                'type'           => 'VARCHAR',
                'constraint'     => '1',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
