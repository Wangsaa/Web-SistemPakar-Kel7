<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NPM'               => ['type' => 'int', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'Nama'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'Semester'               => ['type' => 'int', 'constraint' => 20, 'null' => true],
            'IPK'               => ['type' => 'int', 'constraint' => 10, 'null' => true],
            'Tempat'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
         
        ]);

        $this->forge->addKey('NPM', true, true);
        $this->forge->createTable('Mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('Mahasiswa', true);
    }
}
