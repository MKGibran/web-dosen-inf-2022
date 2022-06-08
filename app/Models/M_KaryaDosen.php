<?php

namespace App\Models;

use CodeIgniter\Model;

class M_KaryaDosen extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'karyadosen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_karya', 'tahun', 'jenis', 'jenis_bukti', 'nomor', 'tautan', 'sitasi', 'bukti', 'dosen_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function Rekapitulasi()
    {
        $query = $this->table('karyadosen')
        ->select('karyadosen.id, nama, nidn, nama_karya, tahun, jenis, jenis_bukti, nomor, tautan, sitasi')
        ->join('datadosen', 'datadosen.id = karyadosen.dosen_id');
        return $query->get();
    }

    public function RekapitulasiDosen($id)
    {
        $query = $this->table('karyadosen')
        ->select('karyadosen.id, nama, nidn, nama_karya, tahun, jenis, jenis_bukti, nomor, tautan, sitasi')
        ->join('datadosen', 'datadosen.id = karyadosen.dosen_id');
        return $query->getWhere(['dosen_id' => $id]);
    }
}
