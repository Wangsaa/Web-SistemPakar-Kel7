<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rule'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'rule_code'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_symptoms'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_type'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
         
        ]);

        $this->forge->addKey('id_rule', true, true);
        $this->forge->addForeignKey('id_symptoms','gejala');
        $this->forge->addForeignKey('id_type','penyakit');
        $this->forge->createTable('rule');
    }

    public function down()
    {
        $this->forge->dropTable('rule', true);
    }
}
