<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DonaturModel;
use function App\Helpers\admin_url;
use function App\Helpers\assets;
use function App\Helpers\logout_url;

class Donatur extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $donaturModel = new DonaturModel();

        //get all data
        $data = $donaturModel->getData();

        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donatur Dompet Dhuafa',
            'assets_url'        => assets(),
            'logout_url'        => logout_url(),
            'admin_url'            => admin_url(),
            'isi'               => 'admin/donatur/view',
            'js'                => 'admin/donatur/js/view',
            'css'               => 'admin/donatur/css/view',
            'data'                => $data
        ];
        return View('admin/_layout/wrapper', $data);
    }
}
