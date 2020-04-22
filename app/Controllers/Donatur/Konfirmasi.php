<?php

namespace App\Controllers\Donatur;

use function App\Helpers\assets;
use function App\Helpers\homepage_url;

class Konfirmasi extends BaseController
{
    public function index()
    {
        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi'),
            'isi'               => 'donatur/konfirmasi/view',
            'js'                => 'donatur/konfirmasi/js/view',
            'css'               => 'donatur/konfirmasi/css/view'
        ];
        return view('donatur/_layout/wrapper', $data);
    }

    public function konfirmasi_donasi($noRef = NULL)
    {
        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi'),
            'isi'               => 'donatur/konfirmasi/konfirmasi.php',
            'js'                => '',
            'css'               => ''
        ];
        return view('donatur/_layout/wrapper', $data);
    }
}
