<?php

namespace App\Controllers\Donatur;

use function App\Helpers\assets;
use function App\Helpers\homepage_url;

class Konfirmasi_donasi extends BaseController
{
    public function index()
    {
        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi-donasi'),
            'isi'               => 'donatur/konfirmasi/view.php',
            'js'                => 'donatur/home/js/view',
            'css'               => 'donatur/home/css/view'
        ];
        return view('donatur/_layout/wrapper', $data);
    }
}
