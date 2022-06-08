<?php

namespace App\Controllers;

use App\Models\M_DataDosen;
use App\Controllers\BaseController;
use App\Models\M_KaryaDosen;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_KaryaDosen extends BaseController
{
    public function __construct()
    {
        $this->KaryaDosen = new M_KaryaDosen();
        $this->DataDosen = new M_DataDosen();
    }

    public function index($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $dosen = $this->DataDosen->select('nama');
        $dosen = $this->DataDosen->getWhere(['id' => $id]);
        $karya = $this->KaryaDosen->getWhere(['dosen_id' => $id]);
        $countKarya = $this->KaryaDosen->select('dosen_id')->where('dosen_id', $id)->countAllResults();

        $data = [
            "title"           => 'Web Dosen | Karya Dosen',
            "karyas"          => $karya->getResult('array'),
            "countKarya"      => $countKarya,
            "dosen_id"        => $id,
            "dosen"           => $dosen->getResult('array')
        ];

        return view('Content/V_KaryaDosen', $data);
    }
  
    public function AddData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        
        $validationRule = [
            'bukti' => [
                'label' => 'Image File',
                'rules' => 'uploaded[bukti]'
                .'|mime_in[bukti,application/pdf]'
                .'|ext_in[bukti,pdf, ]'
                .'|max_size[bukti,50000]'
                ]
            ];

        if (! $this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error = $error['bukti'];
            $value = "<script>
            alert('$error');      
            window.location.href='".site_url('/')."';
            </script>";
            return $value;
        }
        
        $bukti = $this->request->getFile('bukti');
        
        if (! $bukti->hasMoved()) {
            $fileName = $bukti->getRandomName();
            $bukti->move('assets/buktis/', $fileName);

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
            'nama_karya' => $this->request->getPost('nama_karya'),
            'tahun' => $this->request->getPost('tahun'),
            'jenis' => $this->request->getPost('jenis'),
            'jenis_bukti' => $this->request->getPost('jenis_bukti'),
            'nomor' => $this->request->getPost('nomor'),
            'tautan' => $this->request->getPost('tautan'),
            'sitasi' => $this->request->getPost('sitasi'),
            'bukti' => $fileName,
            'dosen_id' => $this->request->getPost('dosen_id')
        ];

        $this->KaryaDosen->insert($data);
        return redirect()->back();
    }

    public function DeleteData($id)
    {
        $file = $this->KaryaDosen->find($id);
        $bukti = $file['bukti'];

        if (file_exists('assets/buktis/'.$bukti)) {
            unlink('assets/buktis/'.$bukti);
        }
        $this->KaryaDosen->delete($id);
        return redirect()->back();
    }

    public function Download($id)
    {
		$data = $this->KaryaDosen->find($id);
		return $this->response->download('assets/buktis/' . $data['bukti'], null);
    }

    public function Spreadsheet(){
        $rekapitulasi = $this->KaryaDosen->Rekapitulasi();
        $result = [
            "rekapitulasi" => $rekapitulasi->getResult('array')
        ];
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'NIDN')
                    ->setCellValue('C1', 'Nama Karya')
                    ->setCellValue('D1', 'Tahun')
                    ->setCellValue('E1', 'Jenis')
                    ->setCellValue('F1', 'Jenis Bukti')
                    ->setCellValue('G1', 'Nomor')
                    ->setCellValue('H1', 'Tautan')
                    ->setCellValue('I1', 'Sitasi');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($result['rekapitulasi'] as $data) {
            $tanggal = $data['tahun'];
            $tanggal = strtotime($tanggal);
            $tanggal = date('Y', $tanggal);
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['nama'])
                        ->setCellValue('B' . $column, $data['nidn'])
                        ->setCellValue('C' . $column, $data['nama_karya'])
                        ->setCellValue('D' . $column, $tanggal)
                        ->setCellValue('E' . $column, $data['jenis'])
                        ->setCellValue('F' . $column, $data['jenis_bukti'])
                        ->setCellValue('G' . $column, $data['nomor'])
                        ->setCellValue('H' . $column, $data['tautan'])
                        ->setCellValue('I' . $column, $data['sitasi']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Rekapitulasi Karya Dosen';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
