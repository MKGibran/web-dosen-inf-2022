<?php

namespace App\Controllers;

use App\Models\M_DataDosen;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class C_MainPage extends BaseController
{
    protected $helper = ['form'];

    public function __construct()
    {
        $this->DataDosen = new M_DataDosen();
    }
    
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $dosens = $this->DataDosen->get();
        $data = [
            "title"     => 'Web Dosen | Home',
            "dosens"    => $dosens->getResult('array'),
            "count"     => $this->DataDosen->countAllResults(),
            "errors"    => []
        ];

        return view('Content/V_MainPage', $data);
    }
}
