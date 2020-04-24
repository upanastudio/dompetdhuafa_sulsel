<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePembayaranModel extends Model
{
    protected $table = 'master_metode_pembayaran';
    protected $primaryKey = 'id_metode_pembayaran';

    protected $returnType = 'object';

    protected $useTimestamps = true;
    protected $createdField  = 'iat';
    protected $updatedField  = 'uat';
    protected $deletedField  = '';

    public function getData($primaryKey = false)
    {
        if ($primaryKey === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id_metode_pembayaran' => $primaryKey])
            ->first();
    }
}
