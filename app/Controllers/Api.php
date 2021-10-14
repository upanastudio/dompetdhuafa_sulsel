<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\JenisDonasiModel;
use App\Models\SubjenisDonasiModel;
use App\Models\TargetDonasiModel;
use App\Models\MetodePembayaranModel;
use App\Models\DonasiModel;
use App\Models\DonaturModel;


class Api extends Controller
{
    use ResponseTrait;

    public function index()
    {
    }

    protected function successResponse($data, $statusCode = 200, $message = 'Data Found!')
    {
        $template = [
            'success' => true,
            'message' => $message,
            'data'    => is_array($data) ? $data : (count($data->get()) > 1 ? $data->get() :  $data->get()[0])
        ];

        return $this->respond(
            $template,
            $statusCode
        );
    }

    public function documentation()
    {
        $data = ['error' => ''];
        echo view('workshop', $data);
    }

    public function getJenisDonasi()
    {
        $model = new JenisDonasiModel();
        $jenis = $model->select(['id_jenis_donasi', 'jenis_donasi'])->findAll();
        if ($jenis) {
            return $this->successResponse($jenis);
        }
        return $this->failNotFound('No data found!');
    }

    public function getSubJenisDonasi($id)
    {
        $model = new SubjenisDonasiModel();
        $subjenis = $model->select(['id_subjenis_donasi', 'subjenis_donasi'])->where('id_jenis_donasi', $id)->findAll();
        if ($subjenis) {
            return $this->successResponse($subjenis);
        }
        return $this->failNotFound('No data found!');
    }

    public function getTargetDonasi($id)
    {
        $model = new TargetDonasiModel();
        $target = $model->select(['id_target_donasi', 'target_donasi'])->where('id_subjenis_donasi', $id)->findAll();
        if ($target) {
            return $this->successResponse($target);
        }
        return $this->failNotFound('No data found!');
    }

    public function getMetodePembayaran($jenisDonasi)
    {
        $tipe = ($jenisDonasi == 'Zakat' || $jenisDonasi == 'zakat' || $jenisDonasi == 'ZAKAT') ? 'donasi' : 'sedekah';
        $model = new MetodePembayaranModel();
        $metode = $model->select(['id_metode_pembayaran', 'metode_pembayaran', 'norek', 'atas_nama'])->where(['type' => $tipe])->findAll();
        if ($metode) {
            return $this->successResponse($metode);
        }
        return $this->failNotFound('No data found!');
    }

    public function getSapaan()
    {
        $sapaan = ['Bapak', 'Ibu', 'Saudara', 'Saudari'];
        if ($sapaan) {
            return $this->successResponse($sapaan);
        }
        return $this->failNotFound('No data found!');
    }

    public function getTipeDonatur()
    {
        $tipe = ['personal', 'institusi'];
        if ($tipe) {
            return $this->successResponse($tipe);
        }
        return $this->failNotFound('No data found!');
    }
}
