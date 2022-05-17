<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KaryaDosen extends Migration
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
            'nama_karya'       => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'tahun' => [
                'type' => 'DATE',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jenis_bukti' => [
                'type' => 'VARCHAR',
                'null' => 'TRUE',
                'constraint' => 50,
            ],
            'bukti' => [
                'type' => 'VARCHAR',
                'null' => 'TRUE',
                'constraint' => 100,
            ],
            'nomor' => [
                'type' => 'VARCHAR',
                'null' => 'TRUE',
                'constraint' => 100,
            ],
            'tautan' => [
                'type' => 'VARCHAR',
                'null' => 'TRUE',
                'constraint' => 255,
            ],
            'sitasi' => [
                'type' => 'INT',
                'null' => 'TRUE',
                'constraint' => 25,
            ],
            'dosen_id' => [
                'type' => 'INT',
                'constraint' => 10
            ]
        ]); 
        $this->forge->addKey('id', true);
        $this->forge->createTable('karyadosen', true);
    }

    public function down()
    {
        $this->forge->dropTable('karyadosen');
    }
}
