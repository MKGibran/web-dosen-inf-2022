<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'name'];

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
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($data['password']) {
            return $this->db->table('user')
            ->set('nama', $data['nama'])
            ->set('username', $data['username'])
            ->set('password', $password)
            ->update();
        }
        return $this->db->table('user')
            ->set('nama', $data['nama'])
            ->set('username', $data['username'])
            ->update();
    }
}
