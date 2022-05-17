<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataDosen extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'Muhammad Kahlil Gibran',
            'nidn' => '1030303119084',
            'ptn' => 'IPB University',
            'prodi' => 'Manajemen Informatika',
            'jk' => '1',
            'jabatan_fungsional' => '-',
            'pendidikan_tertinggi' => 'SMA',
            'status_aktivitas' => 'Aktif',
        ];

        $this->db->table('datadosen')->insert($data);
    }
}
