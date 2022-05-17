<?php

namespace App\Models;

use CodeIgniter\Model;

class M_SertifikatKompetensi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sertifikatkompetensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_kompetensi', 'tahun_perolehan', 'sertifikat', 'dosen_id'];

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
        $query = $this->table('sertifikatkompetensi')
        ->select('sertifikatkompetensi.id, nama_kompetensi, tahun_perolehan, sertifikat, nama, nidn')
        ->join('datadosen', 'datadosen.id = sertifikatkompetensi.dosen_id');
        return $query->get();
    }

    public function RekapitulasiDosen($id)
    {
        $query = $this->table('sertifikatkompetensi')
        ->select('sertifikatkompetensi.id, nama_kompetensi, tahun_perolehan, sertifikat, nama, nidn')
        ->join('datadosen', 'datadosen.id = sertifikatkompetensi.dosen_id');
        return $query->getWhere(['dosen_id' => $id]);
    }
}
