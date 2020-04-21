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

    public function getNewPK()
    {
        do {
            $id = mt_rand(1, 9) . random_string('numeric', 7);
        } while ($this->where(['id_donatur' => $id])->countAllResults() > 0);
        return $id;
    }
}
