<?php

namespace App\Controllers\Donatur;

use CodeIgniter\API\ResponseTrait;
use App\Models\DonasiModel;
use App\Models\DonaturModel;
use App\Models\JenisDonasiModel;
use App\Models\MetodePembayaranModel;
use App\Models\SubjenisDonasiModel;
use App\Models\TargetDonasiModel;

use function App\Helpers\assets;
use function App\Helpers\homepage_url;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new JenisDonasiModel();

        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Portal Donasi Dompet Dhuafa',
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi-donasi'),
            'jenis_donasi'      => $model->getData(),
            'isi'               => 'donatur/home/view',
            'js'                => 'donatur/home/js/view',
            'css'               => 'donatur/home/css/view'
        ];
        return view('donatur/_layout/wrapper', $data);
    }

    public function submit_donasi()
    {
        $input = $this->request->getPost(null, FILTER_SANITIZE_STRING);

        $this->db->transBegin();

        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();

        $exist = $donaturModel->where(['telepon' => $input['noTelp']])->first();
        if (!$exist) {
            $donaturId = $donaturModel->getNewPK();
            $data = [
                'id_donatur'            => $donaturId,
                'nama_donatur'          => $input['namaLengkap'],
                'sapaan'                => $input['sapaan'],
                'email'                 => $input['email'],
                'telepon'               => $input['noTelp'],
                'alamat'                => $input['alamat'],
                'tipe_donatur'          => $input['tipeDonatur'],
                'institusi'             => $input['namaInstitusi'],
                'npwp'                  => $input['npwp'],
                'negara'                => $input['state'],
                'provinsi'              => $input['namaProvinsi'],
                '`kota/kabupaten`'      => $input['namaKota'],
                'kodepos'               => $input['kodePos'],
            ];
            $donaturModel->insert($data);
        }

        $type = ($input['jd'] == 'Zakat') ? 'donasi' : 'sedekah';
        $id_metode_pembayaran = $mpModel->where(['metode_pembayaran' => $input['metodePembayaran'], 'type' => $type])->first()->id_metode_pembayaran;
        $nominal = str_replace('.', '', $input['jumlahDonasi']);
        $kodeunik = mt_rand(1, 9) . random_string('numeric', 2);
        $donasiId = $donasiModel->getNewPK();

        $data1 = [
            'id_donasi'             => $donasiId,
            'id_donatur'            => (isset($donaturId)) ? $donaturId : $exist->id_donatur,
            'id_jenis_donasi'       => $input['jenisDonasi'],
            'id_subjenis_donasi'    => (!empty($input['pengkhususanDonasi'])) ? $input['pengkhususanDonasi'] : null,
            'id_target_donasi'      => (isset($input['keteranganDonasi'])) ? $input['keteranganDonasi'] : null,
            'id_metode_pembayaran'  => $id_metode_pembayaran,
            'nominal'               => $nominal,
            'kode_unik'             => $kodeunik,
            'total_pembayaran'      => (int) $nominal + (int) $kodeunik,
        ];
        $donasiModel->insert($data1);

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return $this->fail(['message' => 'Donasi gagal ditambahkan'], 400);
        } else {
            $this->db->transCommit();
            return $this->respondCreated(['noRef' => $donasiId, 'message' => 'Donasi berhasil ditambahkan']);
        }
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
            'konfirmasi_donasi' => homepage_url('konfirmasi-donasi'),
            'donasi'            => $donasi,
            'donatur'           => $donaturModel->where(['id_donatur' => $donasiData->id_donatur])->first(),
            'pembayaran'        => $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first(),
            'isi'               => 'donatur/home/ringkasan',
            'js'                => '',
            'css'               => ''
        ];
        return view('donatur/_layout/wrapper', $data);
    }

    public function pembayaran($noRef = NULL)
    {
        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();
        $jdModel = new JenisDonasiModel();
        $sjdModel = new SubjenisDonasiModel();
        $tdModel = new TargetDonasiModel();

        $donasiData = $donasiModel->where(['id_donasi' => $noRef])->first();
        $donasi = (object) [
            'noRefensi'         => $donasiData->id_donasi,
            'jenisDonasi'       => $jdModel->where(['id_jenis_donasi' => $donasiData->id_jenis_donasi])->first()->jenis_donasi,
            'subjenisDonasi'    => ($donasiData->id_subjenis_donasi) ? $sjdModel->where(['id_subjenis_donasi' => $donasiData->id_subjenis_donasi])->first()->subjenis_donasi : '',
            'targetDonasi'      => ($donasiData->id_target_donasi) ? $tdModel->where(['id_target_donasi' => $donasiData->id_target_donasi])->first()->target_donasi : '',
            'nominal'           => $donasiData->nominal,
            'kodeUnik'          => $donasiData->kode_unik,
            'totalPembayaran'   => $donasiData->total_pembayaran,
            'tanggalTransaksi' => $donasiData->iat,
        ];

        $data = [
            'title'             => 'Donasi Online Dompet Dhuafa - Invoice ' . $donasiData->id_donasi,
            'aset_url'          => assets(),
            'konfirmasi_donasi' => homepage_url('konfirmasi-donasi'),
            'donasi'            => $donasi,
            'donatur'           => $donaturModel->where(['id_donatur' => $donasiData->id_donatur])->first(),
            'pembayaran'        => $mpModel->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first(),
            'isi'               => 'donatur/home/pembayaran',
            'js'                => 'donatur/home/js/pembayaran',
            'css'               => 'donatur/home/css/pembayaran'
        ];
        return view('donatur/_layout/wrapper', $data);
    }

    public function get_subdonasi()
    {
        $data = '';
        if ($this->request->isAJAX()) {
            $id = $this->request->getGet('id');

            $model = new SubjenisDonasiModel();
            $subjenis = $model->where('id_jenis_donasi', $id)->findAll();
            // return $this->respond($subjenis, 200);

            if ($subjenis) {
                $data = '<option value="">- silahkan pilih -</option>';
                foreach ($subjenis as $d) {
                    $data .= '<option value="' . $d->id_subjenis_donasi . '">' . $d->subjenis_donasi . '</option>';
                }
                return $this->respond(json_encode($data), 200);
            }
            return $this->respondNoContent();
        }
    }

    public function get_target_donasi()
    {
        $data = '';
        if ($this->request->isAJAX()) {
            $id = $this->request->getGet('id');

            $model = new TargetDonasiModel();
            $target = $model->where('id_subjenis_donasi', $id)->findAll();
            // return $this->respond($target, 200);

            if ($target) {
                $data = '<option value="">- silahkan pilih -</option>';
                foreach ($target as $d) {
                    $data .= '<option value="' . $d->id_target_donasi . '">' . $d->target_donasi . '</option>';
                }
                return $this->respond(json_encode($data), 200);
            }
            return $this->respondNoContent();
        }
    }
}
