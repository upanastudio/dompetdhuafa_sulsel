<?php

namespace App\Controllers\Donatur;

use App\Models\DonasiModel;
use App\Models\DonaturModel;
use App\Models\JenisDonasiModel;
use App\Models\MetodePembayaranModel;
use App\Models\SubjenisDonasiModel;
use App\Models\TargetDonasiModel;
use App\Models\DataMidtrans;
use App\Controllers\BaseController;

use App\Libraries\Veritrans;
use phpDocumentor\Reflection\Types\Null_;

use function App\Helpers\assets;
use function App\Helpers\homepage_url;


class Pembayaran extends BaseController
{

    public function __construct()
    {
        $this->veritrans = new Veritrans();
        $params = array('server_key' => 'Mid-server-cC02PaQTSi5AJewxI90aF8HT', 'production' => true);
        $this->veritrans->config($params);
        $this->loadHelpers('url');
    }

    public function index()
    {
        echo "";
    }

    public function pembayaran($noRef = NULL)
    {
        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();
        $jdModel = new JenisDonasiModel();
        $sjdModel = new SubjenisDonasiModel();
        $tdModel = new TargetDonasiModel();
        $datamidtrans = new DataMidtrans();

        $donasiData = $donasiModel->Where(['id_donasi' => $noRef])->first();
        $mp = $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first();
        $ambildata = $datamidtrans->getData($donasiData->midtrans_order_id);
        if ($mp->metode_pembayaran == "Midtrans") {
            $stat = $this->getStatus($donasiData->midtrans_order_id);
            $mid = [
                'status' => $stat->transaction_status,
                'store' => (!empty($stat->store)) ? $stat->store : NULL,
                'payment_type' => (!empty($stat->payment_type)) ? $stat->payment_type : NULL
            ];
            $datamidtrans->set($mid)->where(['midtrans_order_id' => $ambildata['midtrans_order_id']])->update();

            if ($stat->transaction_status == "settlement") {
                $donasiModel->set('status', '1')->where('id_donasi', $noRef)->update();
            }
        }
        $donasi = (object) [
            'noRefensi'         => $donasiData->id_donasi,
            'jenisDonasi'       => $jdModel->where(['id_jenis_donasi' => $donasiData->id_jenis_donasi])->first()->jenis_donasi,
            'subjenisDonasi'    => ($donasiData->id_subjenis_donasi) ? $sjdModel->where(['id_subjenis_donasi' => $donasiData->id_subjenis_donasi])->first()->subjenis_donasi : '',
            'targetDonasi'      => ($donasiData->id_target_donasi) ? $tdModel->where(['id_target_donasi' => $donasiData->id_target_donasi])->first()->target_donasi : '',
            'nominal'           => $donasiData->nominal,
            'kodeUnik'          => $donasiData->kode_unik,
            'totalPembayaran'   => $donasiData->total_pembayaran,
            'tanggalTransaksi'  => $donasiData->iat,
        ];

        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Invoice ' . $donasiData->id_donasi,
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi'),
            'donasi'            => $donasi,
            'donatur'           => $donaturModel->where(['id_donatur' => $donasiData->id_donatur])->first(),
            'pembayaran'        => $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first(),
            'midtrans'          => ($mp->metode_pembayaran == "Midtrans") ? $ambildata : NULL,
            'status'            => ($mp->metode_pembayaran == "Midtrans") ? $this->getStatus($donasiData->midtrans_order_id) : NULL,
            'isi'               => 'donatur/pembayaran/pembayaran',
            'js'                => 'donatur/pembayaran/js/pembayaran',
            'css'               => 'donatur/pembayaran/css/pembayaran'
        ];

        echo view('donatur/_layout/wrapper', $data);
    }

    public function getStatus($order_id)
    {
        $data = $this->veritrans->status($order_id);
        return $data;
    }


    public function simpan($noRef = NULL)
    {
        $datamidtrans = new DataMidtrans();
        $donasiModel = new DonasiModel();
        $mpModel = new MetodePembayaranModel();
        $donasiData = $donasiModel->Where(['id_donasi' => $noRef])->first();
        $mp = $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first();

        if ($mp->metode_pembayaran == "Midtrans") {
            $getMidtrans = json_decode($this->request->getVar('result_data'), true);
            $midtrans = $datamidtrans->getData($getMidtrans['order_id']);
            if (isset($getMidtrans['order_id']) && !$midtrans) {
                $datamid = [
                    'midtrans_order_id' => (!empty($getMidtrans['order_id'])) ? $getMidtrans['order_id'] : NULL,
                    'waktu_transaksi'   => (!empty($getMidtrans['transaction_time'])) ? $getMidtrans['transaction_time'] : NULL,
                    'kode_pembayaran'   => (!empty($getMidtrans['payment_code'])) ? $getMidtrans['payment_code'] : NULL,
                    'bill_key'          => (!empty($getMidtrans['bill_key'])) ? $getMidtrans['bill_key'] : NULL,
                    'bill_code'         => (!empty($getMidtrans['biller_code'])) ? $getMidtrans['biller_code'] : NULL,
                    'bank'              => (!empty($getMidtrans['va_numbers'][0]['bank'])) ? $getMidtrans['va_numbers'][0]['bank'] : NULL,
                    'nomor_va'          => (!empty($getMidtrans['va_numbers'][0]['va_number'])) ? $getMidtrans['va_numbers'][0]['va_number'] : NULL,
                    'permata_va'        => (!empty($getMidtrans['permata_va_number'])) ? $getMidtrans['permata_va_number'] : NULL,
                    'status'            => (!empty($getMidtrans['transaction_status'])) ? $getMidtrans['transaction_status'] : NULL
                ];
                $datamidtrans->insert($datamid);
                $donasiModel->set('midtrans_order_id', $getMidtrans['order_id'])->where(['id_donasi' => $donasiData->id_donasi])->update();
                return redirect()->to('/donatur/pembayaran/pembayaran/' . $donasiData->id_donasi);
            }
        } else {
            return redirect()->to('/donatur/pembayaran/pembayaran/' . $donasiData->id_donasi);
        }
    }
}
