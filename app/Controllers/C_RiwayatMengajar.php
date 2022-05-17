<?php

namespace App\Controllers;

use App\Models\M_RiwayatMengajar;
use App\Controllers\BaseController;

class C_RiwayatMengajar extends BaseController
{
    public function __construct()
    {
        $this->RiwayatMengajar = new M_RiwayatMengajar();
    }
    public function AddData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            'semester' => $this->request->getPost('semester'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'nama_matkul' => $this->request->getPost('nama_matkul'),
            'kode_kelas' => $this->request->getPost('kode_kelas'),
            'ptn' => $this->request->getPost('ptn'),
            'dosen_id' => $this->request->getPost('dosen_id')
        ];

        $this->RiwayatMengajar->insert($data);
        return redirect()->back();
    }

    public function DeleteData($id)
    {
        $this->RiwayatMengajar->delete($id);
        return redirect()->back();
    }
}
