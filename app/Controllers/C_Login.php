<?php

namespace App\Controllers;

use App\Models\M_Auth;
use App\Controllers\BaseController;

class C_Login extends BaseController
{
    public function __construct()
    {
        $this->User = new M_Auth();
        
    }
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'title' => 'Web Dosen | Login',
        ];
        return view('Auth/V_login', $data);
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $dataUser = $this->User->where(['username' => $username])->first();
        // dd($dataUser['password']);

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'name' => $dataUser['nama'],
                    'id' => $dataUser['id'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
