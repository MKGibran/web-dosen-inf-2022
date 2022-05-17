<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SertifikatKompetensi extends Migration
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
            'nama_kompetensi'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_perolehan'       => [
                'type'       => 'date',
            ],
            'sertifikat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'dosen_id' => [
                'type' => 'INT',
                'constraint' => 10
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sertifikatkompetensi');
    }

    public function down()
    {
        $this->forge->dropTable('sertifikatkompetensi');
    }
}
