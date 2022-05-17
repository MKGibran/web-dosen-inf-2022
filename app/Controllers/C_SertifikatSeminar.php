<?php

namespace App\Controllers;

use App\Models\M_DataDosen;
use App\Controllers\BaseController;
use App\Models\M_SertifikatSeminar;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_SertifikatSeminar extends BaseController
{
    public function __construct()
    {
        $this->SertifikatSeminar = new M_SertifikatSeminar();
        $this->DataDosen = new M_DataDosen();
    }

    public function index($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $dosen = $this->DataDosen->select('nama');
        $dosen = $this->DataDosen->getWhere(['id' => $id]);
        $Seminar = $this->SertifikatSeminar->getWhere(['dosen_id' => $id]);
        $countSeminar = $this->SertifikatSeminar->select('dosen_id')->where('dosen_id', $id)->countAllResults();

        $data = [
            "title"           => 'Web Dosen | Seminar',
            "seminars"     => $Seminar->getResult('array'),
            "countSeminar" => $countSeminar,
            "dosen_id"        => $id,
            "dosen"           => $dosen->getResult('array')
        ];

        return view('Content/V_SertifikatSeminar', $data);
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
            $sertifikat->move('assets/seminars/', $fileName);

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
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal_perolehan' => $this->request->getPost('tanggal_perolehan'),
            'sertifikat' => $fileName,
            'dosen_id' => $this->request->getPost('dosen_id')
        ];

        $this->SertifikatSeminar->insert($data);
        return redirect()->back();
    }

    public function DeleteData($id)
    {
        $file = $this->SertifikatSeminar->find($id);
        $sertifikat = $file['sertifikat'];

        if (file_exists('assets/seminars/'.$sertifikat)) {
            unlink('assets/seminars/'.$sertifikat);
        }
        $this->SertifikatSeminar->delete($id);
        return redirect()->back();
    }

    public function Download($id)
    {
		$data = $this->SertifikatSeminar->find($id);
		return $this->response->download('assets/seminars/' . $data['sertifikat'], null);
    }

    public function Spreadsheet(){
        $rekapitulasi = $this->SertifikatSeminar->Rekapitulasi();
        $result = [
            "rekapitulasi" => $rekapitulasi->getResult('array')
        ];
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'nidn')
                    ->setCellValue('C1', 'Nama Kegiatan')
                    ->setCellValue('D1', 'Tanggal Perolehan');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($result['rekapitulasi'] as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['nama'])
                        ->setCellValue('B' . $column, $data['nidn'])
                        ->setCellValue('C' . $column, $data['nama_kegiatan'])
                        ->setCellValue('D' . $column, $data['tanggal_perolehan']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Rekapitulasi Sertifikat Seminar';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
