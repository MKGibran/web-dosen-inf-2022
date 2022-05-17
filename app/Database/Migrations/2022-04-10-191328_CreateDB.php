<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDB extends Migration
{
    public function up()
    {
        $this->forge->createDatabase('web_dosen', true);
    }

    public function down()
    {
        //
    }
}
