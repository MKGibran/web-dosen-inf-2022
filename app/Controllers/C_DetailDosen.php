<?php

namespace App\Controllers;

use App\Models\M_DataDosen;
use App\Models\M_RiwayatMengajar;
use App\Controllers\BaseController;
use App\Models\M_RiwayatPendidikan;
use App\Models\M_SertifikatSeminar;
use App\Models\M_SertifikatWorkshop;
use App\Models\M_SertifikatPelatihan;
use App\Models\M_SertifikatKompetensi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_DetailDosen extends BaseController
{
    public function __construct()
    {
        $this->DataDosen = new M_DataDosen();
        $this->RiwayatPendidikan = new M_RiwayatPendidikan();
        $this->RiwayatMengajar = new M_RiwayatMengajar();
        $this->SertifikatKompetensi = new M_SertifikatKompetensi();
        $this->SertifikatPelatihan = new M_SertifikatPelatihan();
        $this->SertifikatSeminar = new M_SertifikatSeminar();
        $this->SertifikatWorkshop = new M_SertifikatWorkshop();
    }

    public function index($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $result = $this->DataDosen->getWhere(['id' => $id]);

        $pendidikan = $this->RiwayatPendidikan->getWhere(['dosen_id' => $id]);
        $countPendidikan = $this->RiwayatPendidikan->select('dosen_id')->where('dosen_id', $id)->countAllResults();
        $countMengajar = $this->RiwayatMengajar->select('dosen_id')->where('dosen_id', $id)->countAllResults();
        
        $mengajar = $this->RiwayatMengajar->getWhere(['dosen_id' => $id]);

        $data = [
            "title"             => 'Web Dosen | Detail',
            "result"            => $result->getResult('array'),
            "pendidikans"       => $pendidikan->getResult('array'),
            "countPendidikan"   => $countPendidikan,
            "mengajars"         => $mengajar->getResult('array'),
            "countMengajar"     => $countMengajar,
        ];

        return view('Content/V_DetailDosen', $data);
    }
  
    public function AddData()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $validationRule = [
            'foto' => [
                'label' => 'Image File',
                'rules' => 'uploaded[foto]'
                .'|is_image[foto]'
                .'|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                .'|max_size[foto, 10000]'
                .'|max_dims[foto, 1080, 1080]'
            ]
            ];

        if (! $this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error = $error['foto'];
            $value = "<script>
            alert('$error');      
            window.location.href='".site_url('/')."';
            </script>";
            return $value;
        }

        $img = $this->request->getFile('foto');

        if (! $img->hasMoved()) {
            $fileName = $img->getRandomName();
            $img->move('assets/uploads/', $fileName);

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
            'nama' => $this->request->getVar('nama'),
            'nidn' => $this->request->getVar('nidn'),
            'ptn' => "IPB University",
            'prodi' => $this->request->getVar('prodi'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'jabatan_fungsional' => $this->request->getVar('jabatan_fungsional'),
            'pendidikan_tertinggi' => $this->request->getVar('pendidikan_tertinggi'),
            'status_aktivitas' => $this->request->getVar('status_aktivitas'),
            'foto' => $fileName
        ];
        // dd($data);
        
        $this->DataDosen->insert($data);
        return redirect()->to('/');
    }

    public function DeleteData($id)
    {
        $file = $this->DataDosen->find($id);
        $foto = $file['foto'];

        if (file_exists('assets/uploads/'.$foto)) {
            unlink('assets/uploads/'.$foto);
        }
        $this->DataDosen->delete($id);
        $this->RiwayatPendidikan->where('dosen_id', $id)->delete();
        $this->RiwayatMengajar->where('dosen_id', $id)->delete();
        $this->SertifikatKompetensi->where('dosen_id', $id)->delete();
        $this->SertifikatPelatihan->where('dosen_id', $id)->delete();
        $this->SertifikatSeminar->where('dosen_id', $id)->delete();
        $this->SertifikatWorkshop->where('dosen_id', $id)->delete();
        return redirect()->back();
    }
    
    public function UpdateData()
    {
        $img = $this->request->getFile('foto');
        $id = $this->request->getPost('id');
        if ($img->getName() != NULL) {
            $validationRule = [
                'foto' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[foto]'
                    .'|is_image[foto]'
                    .'|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    .'|max_size[foto, 10000]'
                    .'|max_dims[foto, 1080, 1080]'
                ]
                ];

            if (! $this->validate($validationRule)) {
                $error = $this->validator->getErrors();
                $error = $error['foto'];
                $value = "<script>
                alert('$error');      
                window.location.href='".site_url('/detail-dosen')."';
                </script>";
                return $value;
            }

            if (! $img->hasMoved()) {
                $fileName = $img->getRandomName();
                $img->move('assets/uploads/', $fileName);

            }
            else {
                $error = 'The file has already been moved.';
                $value = "<script>
                    alert('$error');      
                    window.location.href='".site_url('/detail-dosen')."';
                    </script>";
                return $value;
            }

            $data = [
                'nama' => $this->request->getPost('nama'),
                'id' => $this->request->getPost('id'),
                'nidn' => $this->request->getPost('nidn'),
                'prodi' => $this->request->getPost('prodi'),
                'jk' => $this->request->getPost('jenis_kelamin'),
                'jabatan_fungsional' => $this->request->getPost('jabatan_fungsional'),
                'pendidikan_tertinggi' => $this->request->getPost('pendidikan_tertinggi'),
                'status_aktivitas' => $this->request->getPost('status_aktivitas'),
                'foto' => $fileName
            ];
            $this->DataDosen->UpdateData($data);
            return redirect()->back();
        }
        $data = [
            'nama' => $this->request->getPost('nama'),
            'id' => $this->request->getPost('id'),
            'nidn' => $this->request->getPost('nidn'),
            'prodi' => $this->request->getPost('prodi'),
            'jk' => $this->request->getPost('jenis_kelamin'),
            'jabatan_fungsional' => $this->request->getPost('jabatan_fungsional'),
            'pendidikan_tertinggi' => $this->request->getPost('pendidikan_tertinggi'),
            'status_aktivitas' => $this->request->getPost('status_aktivitas')
        ];
        $this->DataDosen->UpdateData($data);
        return redirect()->back();
    }

    public function Spreadsheet($id){
        $nama = $this->DataDosen->select('nama')->getWhere(['id' => $id]);
        $nama = [
            "nama" => $nama->getResult('array')
        ];
        $rekapitulasiKompetensi = $this->SertifikatKompetensi->RekapitulasiDosen($id);
        $resultKompetensi = [
            "rekapitulasi" => $rekapitulasiKompetensi->getResult('array')
        ];
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $sheetKompetensi = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Sertifikat Kompetensi');
        $spreadsheet->addSheet($sheetKompetensi, 0);
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'nidn')
                    ->setCellValue('C1', 'Nama Kompetensi')
                    ->setCellValue('D1', 'Tahun Perolehan');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($resultKompetensi['rekapitulasi'] as $kompetensi) {
            $tanggal = $kompetensi['tahun_perolehan'];
            $tanggal = strtotime($tanggal);
            $tanggal = date('Y', $tanggal);
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $kompetensi['nama'])
                        ->setCellValue('B' . $column, $kompetensi['nidn'])
                        ->setCellValue('C' . $column, $kompetensi['nama_kompetensi'])
                        ->setCellValue('D' . $column, $tanggal);
            $column++;
        }

        $rekapitulasiPelatihan = $this->SertifikatPelatihan->RekapitulasiDosen($id);
        $resultPelatihan = [
            "rekapitulasi" => $rekapitulasiPelatihan->getResult('array')
        ];
        // tulis header/nama kolom 
        $sheetPelatihan = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Sertifikat Pelatihan');
        $spreadsheet->addSheet($sheetPelatihan, 1);
        $spreadsheet->setActiveSheetIndex(1)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'nidn')
                    ->setCellValue('C1', 'Nama Kegiatan')
                    ->setCellValue('D1', 'Tanggal Perolehan');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($resultPelatihan['rekapitulasi'] as $pelatihan) {
            $spreadsheet->setActiveSheetIndex(1)
                        ->setCellValue('A' . $column, $pelatihan['nama'])
                        ->setCellValue('B' . $column, $pelatihan['nidn'])
                        ->setCellValue('C' . $column, $pelatihan['nama_kegiatan'])
                        ->setCellValue('D' . $column, $pelatihan['tanggal_perolehan']);
            $column++;
        }

        $rekapitulasiSeminar = $this->SertifikatSeminar->RekapitulasiDosen($id);
        $resultSeminar = [
            "rekapitulasi" => $rekapitulasiSeminar->getResult('array')
        ];
        // tulis header/nama kolom 
        $sheetSeminar = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Sertifikat Seminar');
        $spreadsheet->addSheet($sheetSeminar, 2);
        $spreadsheet->setActiveSheetIndex(2)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'nidn')
                    ->setCellValue('C1', 'Nama Kegiatan')
                    ->setCellValue('D1', 'Tanggal Perolehan');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($resultSeminar['rekapitulasi'] as $seminar) {
            $spreadsheet->setActiveSheetIndex(2)
                        ->setCellValue('A' . $column, $seminar['nama'])
                        ->setCellValue('B' . $column, $seminar['nidn'])
                        ->setCellValue('C' . $column, $seminar['nama_kegiatan'])
                        ->setCellValue('D' . $column, $seminar['tanggal_perolehan']);
            $column++;
        }

        $rekapitulasiWorkshop = $this->SertifikatWorkshop->RekapitulasiDosen($id);
        $resultWorkshop = [
            "rekapitulasi" => $rekapitulasiWorkshop->getResult('array')
        ];
        // tulis header/nama kolom 
        $sheetWorkshop = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Sertifikat Workshop');
        $spreadsheet->addSheet($sheetWorkshop, 3);
        $spreadsheet->setActiveSheetIndex(3)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'nidn')
                    ->setCellValue('C1', 'Nama Kegiatan')
                    ->setCellValue('D1', 'Tanggal Perolehan');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($resultWorkshop['rekapitulasi'] as $workshop) {
            $spreadsheet->setActiveSheetIndex(3)
                        ->setCellValue('A' . $column, $workshop['nama'])
                        ->setCellValue('B' . $column, $workshop['nidn'])
                        ->setCellValue('C' . $column, $workshop['nama_kegiatan'])
                        ->setCellValue('D' . $column, $workshop['tanggal_perolehan']);
            $column++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Rekapitulasi Sertifikat '. $nama['nama'][0]['nama'];

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
