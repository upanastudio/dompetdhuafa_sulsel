<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use App\Models\JenisDonasiModel;
use App\Models\SubjenisDonasiModel;
use App\Models\TargetDonasiModel;
use App\Models\MetodePembayaranModel;
use App\Models\DonasiModel;
use App\Models\DonaturModel;
use App\Models\KonfirmasiDonasiModel;
use App\Models\DataKioser;

class Api extends BaseController
{
    use ResponseTrait;
    public function index()
    {
    }

    public function documentation()
    {
        echo view('api');
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

    public function submitDonasi()
    {
        $input = $this->request->getPost(null, FILTER_SANITIZE_STRING);

        $this->db->transBegin();

        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();
        $jdModel = new JenisDonasiModel();

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
        $jd = $jdModel->where(['id_jenis_donasi' => $input['jenisDonasi']])->first();
        $type = ($jd->jenis_donasi == 'Zakat') ? 'donasi' : 'sedekah';
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
            return $this->fail(['message' => 'Donasi gagal!'], 400);
        } else {
            $this->db->transCommit();
            return $this->successResponse(['noRefDonasi' => $donasiId], 201, 'Donasi berhasil!');
        }
    }

    public function konfirmasiDonasi($noRef)
    {
        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $mpModel = new MetodePembayaranModel();
        $jdModel = new JenisDonasiModel();
        $sjdModel = new SubjenisDonasiModel();
        $tdModel = new TargetDonasiModel();

        $donasiData = $donasiModel->where(['id_donasi' => $noRef])->first();

        if ($donasiData) {
            if ($donasiData->status == '1') {
                return $this->successResponse(['Donasi sudah dikonfirmasi. Terima kasih.']);
            } else if ($donasiData->status == '2') {
                return $this->successResponse(['Donasi sudah expired. Silahkan submit ulang donasi.']);
            } else {
                $donasi = (object) [
                    'noRefDonasi'         => $donasiData->id_donasi,
                    'jenisDonasi'       => $jdModel->where(['id_jenis_donasi' => $donasiData->id_jenis_donasi])->first()->jenis_donasi,
                    'subjenisDonasi'    => ($donasiData->id_subjenis_donasi) ? $sjdModel->where(['id_subjenis_donasi' => $donasiData->id_subjenis_donasi])->first()->subjenis_donasi : '',
                    'targetDonasi'      => ($donasiData->id_target_donasi) ? $tdModel->where(['id_target_donasi' => $donasiData->id_target_donasi])->first()->target_donasi : '',
                    'nominal'           => $donasiData->nominal,
                    'kodeUnik'          => $donasiData->kode_unik,
                    'totalPembayaran'   => $donasiData->total_pembayaran,
                    'tanggalDonasi'     => $donasiData->iat,
                ];

                $donatur = $donaturModel->select(['nama_donatur', 'sapaan', 'email', 'telepon', 'alamat', 'tipe_donatur', 'institusi', 'npwp', 'negara', 'provinsi', 'kota', 'kodepos'])->where(['id_donatur' => $donasiData->id_donatur])->first();

                $pembayaran = $mpModel->select(['metode_pembayaran', 'norek', 'atas_nama', 'type'])->where(['id_metode_pembayaran' => $donasiData->id_metode_pembayaran])->first();

                $data = [
                    'donasi'            => $donasi,
                    'donatur'           => $donatur,
                    'pembayaran'        => $pembayaran
                ];
                return $this->successResponse($data);
            }
        }
        return $this->failNotFound('No data found!');
    }

    public function submitKonfirmasiDonasi()
    {
        $input = $this->request->getPost(null, FILTER_SANITIZE_STRING);

        $this->db->transBegin();

        $konfimasiModel = new KonfirmasiDonasiModel();
        $donasiModel = new DonasiModel();

        $file = $this->request->getFile('fileBuktiPembayaran');
        // Generate a new secure name
        $name = $file->getRandomName();
        // Move the file to it's new home
        $upload = $file->move(WRITEPATH . 'uploads/receipt/', $name);

        if ($upload) {
            $message = 'Upload gambar berhasil';
            $time = Time::parse($input['date']);
            $konfirmasiId = $konfimasiModel->getNewPK();
            $data = [
                'id_konfirmasi_donasi' => $konfirmasiId,
                'id_donasi' => $input['noRefDonasi'],
                'bank_nama' => $input['bank'],
                'bank_cabang' => $input['cabangBank'],
                'bank_norek' => $input['noRekening'],
                'bank_atas_nama' => $input['namaPemilik'],
                'tanggal_bayar' => $time->toDateTimeString(),
                'bukti_pembayaran' => $name,
                'catatan' => $input['catatan']
            ];
            $konfimasiModel->insert($data);
            $donasiModel->update($input['noRefDonasi'], ['status' => '1']);
        } else {
            return $this->fail(['message' => 'Upload gambar gagal'], 400);
        }

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return $this->fail(['message' => 'Konfirmasi donasi gagal!'], 400);
        } else {
            $this->db->transCommit();
            return $this->successResponse([$message], 201, 'Konfirmasi donasi berhasil!');
        }
    }

    public function donasi()
    {
        $input = $this->request->getVar(null, FILTER_SANITIZE_STRING);
        // var_dump($input);

        $this->db->transBegin();

        $donasiModel = new DonasiModel();
        $donaturModel = new DonaturModel();
        $jdModel = new JenisDonasiModel();
        $mpModel = new MetodePembayaranModel();
        $kioserModel = new DataKioser();

        $exist = $donaturModel->where(['telepon' => $input['dtur']])->first();
        if (!$exist) {
            // data_donatur table
            $donaturId = $donaturModel->getNewPK();
            $data = [
                'id_donatur'            => $donaturId,
                'telepon'               => $input['dtur'],
                'nama_donatur'          => (isset($input['namaLengkap'])) ? $input['namaLengkap'] : 'KIOSER_USER',
                'sapaan'                => (isset($input['sapaan'])) ? $input['sapaan'] : 'Saudara',
                'email'                 => (isset($input['email'])) ? $input['email'] : 'user@kioser.com',
                'tipe_donatur'          => (isset($input['tipeDonatur'])) ? $input['tipeDonatur'] : 'personal',
            ];

            $donaturModel->insert($data);
        }

        $nominal = str_replace('.', '', $input['amt']);
        $kodeunik = mt_rand(1, 9) . random_string('numeric', 2);
        $donasiId = $donasiModel->getNewPK();
        // $id_metode_pembayaran = $mpModel->like(['metode_pembayaran' => $input['pid']])->first()->id_metode_pembayaran;
        $id_metode_pembayaran = $mpModel->like(['metode_pembayaran' => 'KIOSER'])->first()->id_metode_pembayaran;

        if (strtolower($input['type']) == 'zakat') {
            // zakat
            $getJenisDonasi = $jdModel->like(['jenis_donasi' => $input['type']])->first();
        } else {
            //sedekah
            $getJenisDonasi = $jdModel->like(['jenis_donasi' => 'sedekah'])->first();
        }
        $jd = $getJenisDonasi->id_jenis_donasi;

        // data_donasi table
        $data1 = [
            'id_donasi'             => $donasiId,
            'id_donatur'            => (isset($donaturId)) ? $donaturId : $exist->id_donatur,
            'id_jenis_donasi'       => $jd,
            'id_subjenis_donasi'    => (isset($input['pengkhususanDonasi'])) ? $input['pengkhususanDonasi'] : null,
            'id_target_donasi'      => (isset($input['keteranganDonasi'])) ? $input['keteranganDonasi'] : null,
            'id_metode_pembayaran'  => $id_metode_pembayaran,
            'nominal'               => $input['amt'],
            'kode_unik'             => $kodeunik,
            'total_pembayaran'      => (int) $nominal,
            'status'                => '1'
        ];
        $donasiModel->insert($data1);

        // data_kioser_detail
        $data2 = [
            'id_donasi'             => $donasiId,
            'kioser_ref_id'         => (isset($input['refID'])) ? $input['refID'] : '',
            'tipe'                  => $input['type'],
            'nominal'               => $input['amt'],
            'telepon'               => $input['dtur'],
        ];
        $kioserModel->insert($data2);

        helper('number');

        $responseMessageSuccess = 'Dompet Dhuafa Sulsel. Pembayaran donasi Sukses dengan NoRefDonasi: ' . $donasiId . ' sebesar ' . str_replace('.00', '', str_replace('IDR', 'Rp', number_to_currency($input['amt'], 'IDR'))) . ' dari ' . $input['dtur'] . '. Semoga Allah memberikan pahala atas donasi yang diberikan, memberikan keberkahan atas harta yang tersisa, dan menjadikannya suci dan mensucikan.';

        $responseMessageFail = 'Dompet Dhuafa Sulsel. Pembayaran donasi gagal, silahkan coba lagi.';

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return $this->fail($responseMessageFail, 400);
        } else {
            $this->db->transCommit();
            return $this->respond($responseMessageSuccess, 201);
        }
    }
}
