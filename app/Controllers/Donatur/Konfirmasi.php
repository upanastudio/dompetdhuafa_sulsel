<?php

namespace App\Controllers\Donatur;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use App\Models\DonasiModel;
use App\Models\DonaturModel;
use App\Models\JenisDonasiModel;
use App\Models\KonfirmasiDonasiModel;
use App\Models\MetodePembayaranModel;
use App\Models\SubjenisDonasiModel;
use App\Models\TargetDonasiModel;
use function App\Helpers\assets;
use function App\Helpers\homepage_url;

class Konfirmasi extends BaseController
{
    use ResponseTrait;

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
        $konfimasiModel = new KonfirmasiDonasiModel();
        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();
        $jdModel = new JenisDonasiModel();
        $sjdModel = new SubjenisDonasiModel();
        $tdModel = new TargetDonasiModel();

        if (!$this->validate([
            'noRefrensi' => 'required',
            'date' => 'required',
            'fileBuktiPembayaran' => [
                'uploaded[fileBuktiPembayaran]',
                'mime_in[fileBuktiPembayaran,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[fileBuktiPembayaran,4096]',
            ],
        ])) {
            $donasiData = $donasiModel->where(['id_donasi' => $noRef])->first();
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
                'isi'               => 'donatur/konfirmasi/konfirmasi',
                'js'                => 'donatur/konfirmasi/js/konfirmasi',
                'css'               => 'donatur/konfirmasi/css/konfirmasi'
            ];
            echo view('donatur/_layout/wrapper', $data);
        } else {
            $input = $this->request->getPost(null, FILTER_SANITIZE_STRING);

            $this->db->transBegin();

            $file = $this->request->getFile('fileBuktiPembayaran');
            // Generate a new secure name
            $name = $file->getRandomName();
            // Move the file to it's new home
            // $upload = $file->move(WRITEPATH . 'uploads/receipt/', $name);
            $upload = $file->move('./uploads/', $name);

            if ($upload) {
                $time = Time::parse($input['date']);
                $konfirmasiId = $konfimasiModel->getNewPK();
                $data = [
                    'id_konfirmasi_donasi' => $konfirmasiId,
                    'id_donasi' => $input['noRefrensi'],
                    'bank_nama' => $input['bank'],
                    'bank_cabang' => $input['cabangBank'],
                    'bank_norek' => $input['noRekening'],
                    'bank_atas_nama' => $input['namaPemilik'],
                    'tanggal_bayar' => $time->toDateTimeString(),
                    'bukti_pembayaran' => $name,
                    'catatan' => $input['catatan']
                ];
                $konfimasiModel->insert($data);

                $donasiModel->update($input['noRefrensi'], ['status' => '1']);
                // $donasiModel->set('status', '1')->where('id_donasi', $input['noRefrensi'])->update();
            } else {
                $this->session->setFlashdata('error', 'Upload gambar gagal!');
                // return $this->fail(['message' => 'Upload gambar gagal'], 400);
                return redirect()->back();
            }


            if ($this->db->transStatus() === FALSE) {
                $this->db->transRollback();
                $this->session->setFlashdata('error', 'Konfirmasi donasi gagal disimpan!');
                // return $this->fail(['message' => 'Donasi gagal ditambahkan'], 400);
                return redirect()->back();
            } else {
                $this->db->transCommit();
                // return $this->respondCreated(['message' => 'Donasi berhasil ditambahkan']);
                $this->session->setFlashdata('success', 'Konfirmasi donasi berhasil.');
            }
            return redirect()->to('sukses');
        }
    }

    public function sukses()
    {
        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi'),
            'isi'               => 'donatur/konfirmasi/sukses',
            'js'                => 'donatur/konfirmasi/js/view',
            'css'               => 'donatur/konfirmasi/css/view'
        ];
        return view('donatur/_layout/wrapper', $data);
    }
}
