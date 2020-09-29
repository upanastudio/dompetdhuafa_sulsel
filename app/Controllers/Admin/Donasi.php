<?php

namespace App\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\Admin\BaseController;
use App\Models\DonasiModel;
use function App\Helpers\admin_url;
use function App\Helpers\assets;
use function App\Helpers\logout_url;

class Donasi extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $donasiModel = new DonasiModel();

        //get all data
        $data = $donasiModel->getDataWithRelations();

        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'assets_url'        => assets(),
            'logout_url'        => logout_url(),
            'admin_url'         => admin_url(),
            'isi'               => 'admin/donasi/view',
            'js'                => 'admin/donasi/js/view',
            'css'               => 'admin/donasi/css/view',
            'data'              => $data
        ];
        return View('admin/_layout/wrapper', $data);
    }
}
