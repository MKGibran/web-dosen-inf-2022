<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatMengajar extends Migration
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
            'semester'       => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
            ],
            'kode_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama_matkul' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'kode_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'ptn' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'dosen_id' => [
                'type' => 'INT',
                'constraint' => 10
            ]
        ]); 
        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayatmengajar', true);
    }

    public function down()
    {
        $this->forge->dropTable('riwayatmengajar');
    }
}
