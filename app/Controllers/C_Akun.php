<?php

namespace App\Controllers;

use App\Models\M_Auth;
use App\Controllers\BaseController;

class C_Akun extends BaseController
{
    public function __construct()
    {
        $this->Auth = new M_Auth();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $id = session()->get('id');
        $akun = $this->Auth->find($id);
        $data = [
            "title" => "Web Dosen | Profile",
            "akun" => $akun
        ];

        return view('Content/V_Akun', $data);
    }

    public function UpdateData()
    {
        $data = [
            "id" => $this->request->getPost('id'),
            "username" => $this->request->getPost('username'),
            "nama" => $this->request->getPost('nama'),
            "password" => $this->request->getPost('password'),
        ];

        $this->Auth->UpdateData($data);
        return redirect()->back();
    }
}
