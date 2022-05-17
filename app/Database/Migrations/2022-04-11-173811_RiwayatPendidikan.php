<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatPendidikan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'perguruan_tinggi'       => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'gelar_akademik' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'tanggal_ijazah' => [
                'type' => 'DATE',
            ],
            'jenjang' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'ijazah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'dosen_id' => [
                'type' => 'INT',
                'constraint' => 10
            ]
        ]); 
        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayatpendidikan', true);
    }

    public function down()
    {
        $this->forge->dropTable('riwayatpendidikan');
    }
}
