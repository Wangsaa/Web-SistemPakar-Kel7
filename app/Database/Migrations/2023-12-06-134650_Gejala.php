<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gejala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_symptoms'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'symptoms_code'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'symptoms_name'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_symptoms', true);
        $this->forge->createTable('gejala', true);
    }

    public function down()
    {
        $this->forge->dropTable('gejala', true);
    }
}
