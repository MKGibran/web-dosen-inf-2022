<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auth extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
