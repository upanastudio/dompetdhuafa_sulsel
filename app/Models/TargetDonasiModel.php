<?php

namespace App\Models;

use CodeIgniter\Model;

class TargetDonasiModel extends Model
{
    protected $table = 'master_target_donasi';
    protected $primaryKey = 'id_target_donasi';

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
            ->where(['id_target_donasi' => $primaryKey])
            ->first();
    }
}
