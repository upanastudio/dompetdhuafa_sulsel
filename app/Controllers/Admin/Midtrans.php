<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DataMidtrans;
use function App\Helpers\admin_url;
use function App\Helpers\assets;
use function App\Helpers\logout_url;

class Midtrans extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $dataMidtrans = new DataMidtrans();

        //get all data
        $data = $dataMidtrans->getDataRelasi();


        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Konfirmasi Donasi Dompet Dhuafa',
            'assets_url'        => assets(),
            'logout_url'        => logout_url(),
            'admin_url'            => admin_url(),
            'isi'               => 'admin/midtrans/view',
            'js'                => 'admin/midtrans/js/view',
            'css'               => 'admin/midtrans/css/view',
            'data'                => $data
        ];
        return View('admin/_layout/wrapper', $data);
    }
}
