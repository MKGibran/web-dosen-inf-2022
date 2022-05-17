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

class C_Rekapitulasi extends BaseController
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
    public function index()
    {
        $rekapitulasiKompetensi = $this->SertifikatKompetensi->Rekapitulasi();
        $rekapitulasiPelatihan = $this->SertifikatPelatihan->Rekapitulasi();
        $rekapitulasiSeminar = $this->SertifikatSeminar->Rekapitulasi();
        $rekapitulasiWorkshop = $this->SertifikatWorkshop->Rekapitulasi();

        $data = [
            "title" => "Web Dosen | Rekapitulasi",
            "rekapitulasiKompetensis" => $rekapitulasiKompetensi->getResult('array'),
            "rekapitulasiPelatihans" => $rekapitulasiPelatihan->getResult('array'),
            "rekapitulasiSeminars" => $rekapitulasiSeminar->getResult('array'),
            "rekapitulasiWorkshops" => $rekapitulasiWorkshop->getResult('array'),
            "countKompetensi" => $this->SertifikatKompetensi->countAllResults(),
            "countPelatihan" => $this->SertifikatPelatihan->countAllResults(),
            "countSeminar" => $this->SertifikatSeminar->countAllResults(),
            "countWorkshop" => $this->SertifikatWorkshop->countAllResults(),
        ];


        return view('Content/V_Rekapitulasi', $data);
    }
}
