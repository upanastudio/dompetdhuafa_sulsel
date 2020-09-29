<?php

namespace App\Models;

use CodeIgniter\Model;

class DonaturModel extends Model
{
    protected $table = 'data_donatur';
    protected $primaryKey = 'id_donatur';

    protected $returnType = 'object';

    protected $allowedFields = ['id_donatur', 'nama_donatur', 'sapaan', 'email', 'telepon', 'alamat', 'tipe_donatur', 'institusi', 'npwp', 'negara', 'provinsi', 'kota', 'kodepos'];

    protected $useTimestamps = true;
    protected $createdField  = 'iat';
    protected $updatedField  = 'uat';
    protected $deletedField  = '';

    protected $validationRules = [
        'id_donatur'    => 'required',
        'nama_donatur'  => 'required',
        'sapaan'        => 'required',
        'email'         => 'required',
        'telepon'       => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getData($primaryKey = false)
    {
        if ($primaryKey === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id_donatur' => $primaryKey])
            ->first();
    }

    public function getDataWithRelations($primaryKey = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        if ($primaryKey === false) {
            // return $this->findAll();
            $builder->select("*");
            $builder->join('data_donasi', 'data_donatur.id_donatur = data_donasi.id_donatur', 'left');
            $builder->join('master_jenis_donasi', 'master_jenis_donasi.id_jenis_donasi = data_donasi.id_jenis_donasi', 'left');
            $builder->join('master_subjenis_donasi', 'master_subjenis_donasi.id_subjenis_donasi = data_donasi.id_subjenis_donasi', 'left');
            $builder->join('master_target_donasi', 'master_target_donasi.id_target_donasi = data_donasi.id_target_donasi', 'left');
            $builder->join('master_metode_pembayaran', 'master_metode_pembayaran.id_metode_pembayaran = data_donasi.id_metode_pembayaran', 'left');
            $query = $builder->get();
            return $query->getResult();
        }

        $builder->select("*");
        $builder->join('data_donasi', 'data_donatur.id_donatur = data_donasi.id_donatur', 'left');
        $builder->join('master_jenis_donasi', 'master_jenis_donasi.id_jenis_donasi = data_donasi.id_jenis_donasi', 'left');
        $builder->join('master_subjenis_donasi', 'master_subjenis_donasi.id_subjenis_donasi = data_donasi.id_subjenis_donasi', 'left');
        $builder->join('master_target_donasi', 'master_target_donasi.id_target_donasi = data_donasi.id_target_donasi', 'left');
        $builder->join('master_metode_pembayaran', 'master_metode_pembayaran.id_metode_pembayaran = data_donasi.id_metode_pembayaran', 'left');
        $builder->where("data_donatur.id_donatur", $primaryKey);
        $query = $builder->get();
        return $query->getRow();
    }

    public function getNewPK()
    {
        do {
            $id = mt_rand(1, 9) . random_string('numeric', 7);
        } while ($this->where(['id_donatur' => $id])->countAllResults() > 0);
        return $id;
    }
}
