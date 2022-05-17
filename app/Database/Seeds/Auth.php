<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Auth extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'J3C119084',
            'password' => password_hash('J3C119084', PASSWORD_BCRYPT),
            'nama'    => 'Gibran'
        ];

        $this->db->table('user')->insert($data);
    }
}
