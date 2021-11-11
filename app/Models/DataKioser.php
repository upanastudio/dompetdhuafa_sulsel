<?php

namespace App\Models;

use CodeIgniter\Model;


class DataKioser extends Model
{
    protected $table = 'data_kioser_detail';
    protected $primarykey = 'id_data_kioser_detail';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_donasi', 'kioser_ref_id', 'tipe', 'nominal', 'telepon', 'status'];
    protected $createdField  = 'iat';
    protected $updatedField  = 'uat';



    public function getData($primarykey = false)
    {
        if ($primarykey == false) {
            return null;
        } else {
            return $this->asArray()
                ->where([$this->primarykey => $primarykey])
                ->first();
        }
    }
}
