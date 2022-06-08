<?php

namespace App\Controllers;

use App\Models\M_DataDosen;
use App\Controllers\BaseController;
use App\Models\M_SertifikatKompetensi;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_SertifikatKompetensi extends BaseController
{
    public function __construct()
    {
        $this->SertifikatKompetensi = new M_SertifikatKompetensi();
        $this->DataDosen = new M_DataDosen();
    }

    public function index($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $dosen = $this->DataDosen->select('nama');
        $dosen = $this->DataDosen->getWhere(['id' => $id]);
        $Kompetensi = $this->SertifikatKompetensi->getWhere(['dosen_id' => $id]);
        $countKompetensi = $this->SertifikatKompetensi->select('dosen_id')->where('dosen_id', $id)->countAllResults();

        $data = [
            "title"           => 'Web Dosen | Kompetensi',
            "kompetensis"     => $Kompetensi->getResult('array'),
            "countKompetensi" => $countKompetensi,
            "dosen_id"        => $id,
            "dosen"           => $dosen->getResult('array')
        ];

        return view('Content/V_SertifikatKompetensi', $data);
    }
  
    public function AddData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        
        $validationRule = [
            'sertifikat' => [
                'label' => 'Image File',
                'rules' => 'uploaded[sertifikat]'
                .'|mime_in[sertifikat,application/pdf]'
                .'|ext_in[sertifikat,pdf]'
                .'|max_size[sertifikat,10000]'
                ]
            ];

        if (! $this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error = $error['sertifikat'];
            $value = "<script>
            alert('$error');      
            window.location.href='".site_url('/')."';
            </script>";
            return $value;
        }
        
        $sertifikat = $this->request->getFile('sertifikat');
        
        if (! $sertifikat->hasMoved()) {
            $fileName = $sertifikat->getRandomName();
            $sertifikat->move('assets/kompetensis/', $fileName);

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
            'nama_kompetensi' => $this->request->getPost('nama_kompetensi'),
            'tahun_perolehan' => $this->request->getPost('tahun_perolehan'),
            'sertifikat' => $fileName,
            'dosen_id' => $this->request->getPost('dosen_id')
        ];

        $this->SertifikatKompetensi->insert($data);
        return redirect()->back();
    }

    public function DeleteData($id)
    {
        $file = $this->SertifikatKompetensi->find($id);
        $sertifikat = $file['sertifikat'];

        if (file_exists('assets/kompetensis/'.$sertifikat)) {
            unlink('assets/kompetensis/'.$sertifikat);
        }
        $this->SertifikatKompetensi->delete($id);
        return redirect()->back();
    }

    public function Download($id)
    {
		$data = $this->SertifikatKompetensi->find($id);
		return $this->response->download('assets/kompetensis/' . $data['sertifikat'], null);
    }

    public function Spreadsheet()
    {
        $rekapitulasi = $this->SertifikatKompetensi->Rekapitulasi();
        $result = [
            "rekapitulasi" => $rekapitulasi->getResult('array')
        ];
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'NIDN')
                    ->setCellValue('C1', 'Nama Kompetensi')
                    ->setCellValue('D1', 'Tahun Perolehan');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($result['rekapitulasi'] as $data) {
            $tanggal = $data['tahun_perolehan'];
            $tanggal = strtotime($tanggal);
            $tanggal = date('Y', $tanggal);
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['nama'])
                        ->setCellValue('B' . $column, $data['nidn'])
                        ->setCellValue('C' . $column, $data['nama_kompetensi'])
                        ->setCellValue('D' . $column, $tanggal);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Rekapitulasi Sertifikat Kompetensi';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
