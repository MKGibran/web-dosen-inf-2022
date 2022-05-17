<?php

namespace App\Models;

use CodeIgniter\Model;

class M_DataDosen extends Model
{
    protected $table            = 'datadosen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'nidn',
        'ptn', 
        'prodi', 
        'jk', 
        'jabatan_fungsional',
        'pendidikan_tertinggi',
        'status_aktivitas',
        'foto'
        ];

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

    public function UpdateData($data)
    {
        if (!$data['foto']) {
            return $this->db->table('datadosen')
            ->set('nama', $data['nama'])
            ->set('nidn', $data['nidn'])
            ->set('prodi', $data['prodi'])
            ->set('jk', $data['jk'])
            ->set('jabatan_fungsional', $data['jabatan_fungsional'])
            ->set('pendidikan_tertinggi', $data['pendidikan_tertinggi'])
            ->set('status_aktivitas', $data['status_aktivitas'])
            ->update();
        }
        return $this->db->table('datadosen')
        ->set('nama', $data['nama'])
        ->set('nidn', $data['nidn'])
        ->set('prodi', $data['prodi'])
        ->set('jk', $data['jk'])
        ->set('jabatan_fungsional', $data['jabatan_fungsional'])
        ->set('pendidikan_tertinggi', $data['pendidikan_tertinggi'])
        ->set('status_aktivitas', $data['status_aktivitas'])
        ->set('foto', $data['foto'])
        ->update();
    }
}
