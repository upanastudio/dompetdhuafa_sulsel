<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMidtrans extends Model
{
    protected $table = 'data_midtrans_detail';
    protected $primarykey = 'midtrans_order_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['midtrans_order_id', 'waktu_transaksi', 'kode_pembayaran', 'bill_key', 'bill_code', 'bank', 'nomor_va', 'permata_va', 'status'];
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';

    public function getData($primarykey = false)
    {
        if ($primarykey == false) {
            return null;
        } else {
            $mdm = $this->getwhere(['midtrans_order_id' => $primarykey]);
            return $mdm->getRowArray();
        }
    }
}
