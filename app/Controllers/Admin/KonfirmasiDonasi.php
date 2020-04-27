<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\KonfirmasiDonasiModel;
use function App\Helpers\admin_url;
use function App\Helpers\assets;
use function App\Helpers\logout_url;

class KonfirmasiDonasi extends BaseController
{
	use ResponseTrait;
	public function index()
	{
		$konfirmasiDonasiModel = new KonfirmasiDonasiModel();

		//get all data
		$data = $konfirmasiDonasiModel->getDataWithRelations();

		$data = [
			'title'             => 'Donasi Online Dompet Dhuafa - Portal Konfirmasi Donasi Dompet Dhuafa',
			'assets_url'        => assets(),
			'logout_url'		=> logout_url(),
			'admin_url'			=> admin_url(),
			'isi'               => 'admin/konfirmasiDonasi/view',
			'js'                => 'admin/konfirmasiDonasi/js/view',
			'css'               => 'admin/konfirmasiDonasi/css/view',
			'data'				=> $data
		];
		return View('admin/_layout/wrapper', $data);
	}
}
