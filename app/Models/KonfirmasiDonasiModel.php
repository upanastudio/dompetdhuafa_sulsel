<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfirmasiDonasiModel extends Model
{
    protected $table = 'data_konfirmasi_donasi';
    protected $primaryKey = 'id_konfirmasi_donasi';

    protected $returnType = 'object';
    protected $allowedFields = ['id_konfirmasi_donasi', 'id_donasi', 'bank_nama', 'bank_cabang', 'bank_norek', 'bank_atas_nama', 'tanggal_bayar', 'bukti_pembayaran', 'catatan'];


    protected $useTimestamps = true;
    protected $createdField  = 'iat';
    protected $updatedField  = 'uat';
    protected $deletedField  = '';

    protected $validationRules = [
        'id_konfirmasi_donasi'  => 'required',
        'id_donasi'             => 'required',
        'tanggal_bayar'         => 'required',
        'bukti_pembayaran'      => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getData($primaryKey = false)
    {
        if ($primaryKey === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id_donasi' => $primaryKey])
            ->first();
    }

    public function getDataWithRelations($primaryKey = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        if ($primaryKey === false) {
            // return $this->findAll();
            $builder->select("*");
            $builder->join('data_donasi', 'data_konfirmasi_donasi.id_donasi = data_donasi.id_donasi', 'left');
            $builder->join('data_donatur', 'data_donatur.id_donatur = data_donasi.id_donatur', 'left');
            $builder->join('master_jenis_donasi', 'master_jenis_donasi.id_jenis_donasi = data_donasi.id_jenis_donasi', 'left');
            $builder->join('master_subjenis_donasi', 'master_subjenis_donasi.id_subjenis_donasi = data_donasi.id_subjenis_donasi', 'left');
            $builder->join('master_target_donasi', 'master_target_donasi.id_target_donasi = data_donasi.id_target_donasi', 'left');
            $builder->join('master_metode_pembayaran', 'master_metode_pembayaran.id_metode_pembayaran = data_donasi.id_metode_pembayaran', 'left');
            $builder->orderBy('data_konfirmasi_donasi.iat', 'DESC');
            $query = $builder->get();
            return $query->getResult();
        }

        $builder->select("*");
        $builder->join('data_donasi', 'data_konfirmasi_donasi.id_donasi = data_donasi.id_donasi', 'left');
        $builder->join('data_donatur', 'data_donatur.id_donasi = data_donasi.id_donasi', 'left');
        $builder->join('master_jenis_donasi', 'master_jenis_donasi.id_jenis_donasi = data_donasi.id_jenis_donasi', 'left');
        $builder->join('master_subjenis_donasi', 'master_subjenis_donasi.id_subjenis_donasi = data_donasi.id_subjenis_donasi', 'left');
        $builder->join('master_target_donasi', 'master_target_donasi.id_target_donasi = data_donasi.id_target_donasi', 'left');
        $builder->join('master_metode_pembayaran', 'master_metode_pembayaran.id_metode_pembayaran = data_donasi.id_metode_pembayaran', 'left');
        $builder->where("data_konfimasi_donasi.id_konfirmasi_donasi", $primaryKey);
        $builder->orderBy('data_konfirmasi_donasi.iat', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }

    public function getNewPK()
    {
        do {
            $id = mt_rand(1, 9) . random_string('numeric', 7);
        } while ($this->where(['id_konfirmasi_donasi' => $id])->countAllResults() > 0);
        return $id;
    }
}
