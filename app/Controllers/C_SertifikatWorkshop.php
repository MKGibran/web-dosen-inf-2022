<?php

namespace App\Controllers;

use App\Models\M_DataDosen;
use App\Controllers\BaseController;
use App\Models\M_SertifikatWorkshop;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_SertifikatWorkshop extends BaseController
{
    public function __construct()
    {
        $this->SertifikatWorkshop = new M_SertifikatWorkshop();
        $this->DataDosen = new M_DataDosen();
    }

    public function index($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $dosen = $this->DataDosen->select('nama');
        $dosen = $this->DataDosen->getWhere(['id' => $id]);
        $Workshop = $this->SertifikatWorkshop->getWhere(['dosen_id' => $id]);
        $countWorkshop = $this->SertifikatWorkshop->select('dosen_id')->where('dosen_id', $id)->countAllResults();

        $data = [
            "title"           => 'Web Dosen | Workshop',
            "workshops"     => $Workshop->getResult('array'),
            "countWorkshop" => $countWorkshop,
            "dosen_id"        => $id,
            "dosen"           => $dosen->getResult('array')
        ];

        return view('Content/V_SertifikatWorkshop', $data);
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
            $sertifikat->move('assets/workshops/', $fileName);

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

        $this->SertifikatWorkshop->insert($data);
        return redirect()->back();
    }

    public function DeleteData($id)
    {
        $file = $this->SertifikatWorkshop->find($id);
        $sertifikat = $file['sertifikat'];

        if (file_exists('assets/Workshops/'.$sertifikat)) {
            unlink('assets/workshops/'.$sertifikat);
        }
        $this->SertifikatWorkshop->delete($id);
        return redirect()->back();
    }

    public function Download($id)
    {
		$data = $this->SertifikatWorkshop->find($id);
		return $this->response->download('assets/workshops/' . $data['sertifikat'], null);
    }

    public function Spreadsheet(){
        $rekapitulasi = $this->SertifikatWorkshop->Rekapitulasi();
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
        $fileName = 'Rekapitulasi Sertifikat Workshop';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
