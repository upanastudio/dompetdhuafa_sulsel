<?php

namespace App\Models;

use CodeIgniter\Model;


class DataMidtrans extends Model
{
    protected $table = 'data_midtrans_detail';
    protected $primarykey = 'midtrans_order_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['midtrans_order_id', 'waktu_transaksi', 'kode_pembayaran', 'bill_key', 'bill_code', 'bank', 'nomor_va', 'permata_va', 'status', 'store', 'payment_type'];
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
    public function getDataRelasi($primarykey = false)
    {
        $db      = \Config\Database::connect();
        return $this->db->table('data_midtrans_detail')
            ->select('data_donasi.id_donasi,data_midtrans_detail.midtrans_order_id,data_midtrans_detail.waktu_transaksi,data_midtrans_detail.bank,data_midtrans_detail.store,data_donasi.total_pembayaran,data_midtrans_detail.status,data_midtrans_detail.payment_type')
            ->join('data_donasi', 'data_donasi.midtrans_order_id=data_midtrans_detail.midtrans_order_id')
            ->get()->getResultArray();
    }
}
