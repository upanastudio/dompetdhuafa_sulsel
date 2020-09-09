<?php

namespace App\Controllers;

use function App\Helpers\upload_image;

class Workshop extends BaseController
{
    public function index()
    {
        $data = ['error' => ''];
        echo view('workshop', $data);
    }

    public function save_file()
    {
        $input = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $ini = upload_image('foto', 'nota');
        var_dump($ini);
        die();
    }
    public function ulang()
    {
        return redirect()->to(base_url('donatur/pembayaran/3182745920136689'));
    }
}
