<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_type'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'type_code'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true ],
            'type_name'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true ],
            'type_description'               => ['type' => 'varchar', 'constraint' => 255, 'null' => true ],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_type', true);
        $this->forge->createTable('penyakit', true);
    }

    public function down()
    {
        $this->forge->dropTable('penyakit', true);
    }
}
