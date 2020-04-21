<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisDonasiModel extends Model
{
    protected $table = 'master_jenis_donasi';
    protected $primaryKey = 'id_jenis_donasi';

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
            ->where(['id_jenis_donasi' => $primaryKey]);
    }
}
