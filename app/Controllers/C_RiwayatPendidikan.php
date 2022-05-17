<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_RiwayatPendidikan;

class C_RiwayatPendidikan extends BaseController
{
    public function __construct()
    {
        $this->RiwayatPendidikan = new M_RiwayatPendidikan();
    }
    public function AddData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        
        $validationRule = [
            'ijazah' => [
                'label' => 'Image File',
                'rules' => 'uploaded[ijazah]'
                .'|mime_in[ijazah,application/pdf]'
                .'|ext_in[ijazah,pdf]'
                .'|max_size[ijazah,10000]'
                ]
            ];

        if (! $this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error = $error['ijazah'];
            $value = "<script>
            alert('$error');      
            window.location.href='".site_url('/')."';
            </script>";
            return $value;
        }
        
        $ijazah = $this->request->getFile('ijazah');

        if (! $ijazah->hasMoved()) {
            $fileName = $ijazah->getRandomName();
            $ijazah->move('assets/ijazahs/', $fileName);

        }
        else {
            $error = 'The file has already been moved.';
            $value = "<script>
                alert('$error');      
                window.location.href='".site_url('/')."';
                </script>";
            return $value;
        }

        $data = [
            'perguruan_tinggi' => $this->request->getPost('perguruan_tinggi'),
            'gelar_akademik' => $this->request->getPost('gelar_akademik'),
            'tanggal_ijazah' => $this->request->getPost('tanggal_ijazah'),
            'jenjang' => $this->request->getPost('jenjang'),
            'perguruan_tinggi' => $this->request->getPost('perguruan_tinggi'),
            'ijazah' => $fileName,
            'dosen_id' => $this->request->getPost('dosen_id')
        ];

        $this->RiwayatPendidikan->insert($data);
        return redirect()->back();
    }

    public function DeleteData($id)
    {
        $file = $this->RiwayatPendidikan->find($id);
        $ijazah = $file['ijazah'];

        if (file_exists('assets/ijazahs/'.$ijazah)) {
            unlink('assets/ijazahs/'.$ijazah);
        }
        $this->RiwayatPendidikan->delete($id);
        return redirect()->back();
    }

    public function Download($id)
    {
		$data = $this->RiwayatPendidikan->find($id);
		return $this->response->download('assets/ijazahs/' . $data['ijazah'], null);
    }
}
