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

    public function getNewPK()
    {
        do {
            $id = mt_rand(1, 9) . random_string('numeric', 7);
        } while ($this->where(['id_konfirmasi_donasi' => $id])->countAllResults() > 0);
        return $id;
    }
}
