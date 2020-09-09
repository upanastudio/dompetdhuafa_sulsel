<?php

namespace App\Controllers\Donatur;

use App\Models\DonasiModel;
use App\Models\DonaturModel;
use App\Models\JenisDonasiModel;
use App\Models\MetodePembayaranModel;
use App\Models\SubjenisDonasiModel;
use App\Models\TargetDonasiModel;
use App\Controllers\BaseController;


use function App\Helpers\assets;
use function App\Helpers\homepage_url;

class Ringkasan extends BaseController
{

    public function index()
    {
        echo "";
    }

    public function ringkasan_donasi($noRef = NULL)
    {
        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();
        $jdModel = new JenisDonasiModel();
        $sjdModel = new SubjenisDonasiModel();
        $tdModel = new TargetDonasiModel();

        $donasiData = $donasiModel->where(['id_donasi' => $noRef])->first();
        $mp = $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first();
        if ($mp->metode_pembayaran == "Midtrans" && $donasiData->midtrans_order_id != NULL) {
            return redirect()->to('/donatur/pembayaran/pembayaran/' . $donasiData->id_donasi);
        }

        $donasi = (object) [
            'noRefensi'         => $donasiData->id_donasi,
            'jenisDonasi'       => $jdModel->where(['id_jenis_donasi' => $donasiData->id_jenis_donasi])->first()->jenis_donasi,
            'subjenisDonasi'    => ($donasiData->id_subjenis_donasi) ? $sjdModel->where(['id_subjenis_donasi' => $donasiData->id_subjenis_donasi])->first()->subjenis_donasi : '',
            'targetDonasi'      => ($donasiData->id_target_donasi) ? $tdModel->where(['id_target_donasi' => $donasiData->id_target_donasi])->first()->target_donasi : '',
            'nominal'           => $donasiData->nominal,
            'kodeUnik'          => $donasiData->kode_unik,
            'totalPembayaran'   => $donasiData->total_pembayaran,
        ];

        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi'),
            'donasi'            => $donasi,
            'donatur'           => $donaturModel->where(['id_donatur' => $donasiData->id_donatur])->first(),
            'pembayaran'        => $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first(),
            'isi'               => 'donatur/ringkasan/ringkasan',
            'js'                => 'donatur/ringkasan/js/ringkasan',
            'css'               => ''
        ];
        echo view('donatur/_layout/wrapper', $data);
    }
}
