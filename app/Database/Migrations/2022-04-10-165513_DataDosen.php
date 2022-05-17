<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataDosen extends Migration
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
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nidn'       => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'ptn' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'prodi' => [
                'type' => 'VARCHAR',
                'constraint' => '70'
            ],
            'jk' => [
                'type' => 'INT',
                'constraint' => '1'
            ],
            'jabatan_fungsional' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'pendidikan_tertinggi' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
            ],
            'status_aktivitas' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dataDosen');
    }

    public function down()
    {
        $this->forge->dropTable('dataDosen');
    }
}
