<main>
    <div class="container">
        <form action="<?= site_url('donatur/pembayaran/simpan/') . $donasi->noRefensi ?>" id="payment-form" method="POST">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <div class="row mt-3">
                <div class="col-12 ">
                    <h4 class="text-center">Ringkasan Donasi</h4>
                    <hr>
                </div>
                <div class="col-lg-6">
                    <div class="row">

                        <div id="pilihanDonasi" class="col-lg-12 mt-3">
                            <div class="wrap-form">
                                <h5 class="sub-judul mb-4">Pilihan Donasi</h5>
                                <div class="form-group">
                                    <label>Jenis Donasi</label>
                                    <input type="text" class="form-control" value="<?= $donasi->jenisDonasi ?>" id="jenisDonasi" name="jenisDonasi" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Pengkhususan Donasi</label>
                                    <input type="text" class="form-control" value="<?= $donasi->subjenisDonasi ?>" id="pengkhususanDonasi" name="pengkhususanDonasi" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Donasi</label>
                                    <input type="text" class="form-control" value="<?= $donasi->targetDonasi ?>" id="keteranganDonasi" name="keteranganDonasi" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                        <input type="text" class="form-control" value="<?= $donasi->nominal ?>" id="jumlahDonasi" name="jumlahDonasi" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Unik</label>
                                    <input type="text" class="form-control" value="<?= $donasi->kodeUnik ?>" id="kodeUnik" name="kodeUnik" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                        <input type="text" class="form-control" value="<?= $donasi->totalPembayaran ?>" id="totalDonasi" name="totalDonasi" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profilDonatur" class="col-lg-12 mt-3">
                            <div class="wrap-form">
                                <h5 class="sub-judul mb-4">Profil Donatur</h5>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $donatur->nama_donatur ?>" id="namaLengkap" name="namaLengkap" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?= $donatur->email ?>" id="email" name="email" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Telpon / Hp</label>
                                    <input type="tel" class="form-control" value="<?= $donatur->telepon ?>" name="noTelp" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" disabled=""><?= $donatur->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Donatur</label>
                                    <input type="text" class="form-control" value="<?= $donatur->tipe_donatur ?>" id="tipeDonatur" name="tipeDonatur" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Nama Institusi</label>
                                    <input type="text" class="form-control" value="<?= $donatur->institusi ?>" id="namaInstitusi" name="namaInstitusi" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>NPWP</label>
                                    <input type="text" class="form-control" value="<?= $donatur->npwp ?>" id="npwp" name="npwp" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Negara</label>
                                    <input type="text" class="form-control" value="<?= $donatur->negara ?>" id="negara" name="negara" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" value="<?= $donatur->provinsi ?>" id="provinsi" name="provinsi" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Kota/Kabupaten</label>
                                    <input type="text" class="form-control" value="<?= $donatur->kota ?>" id="namaKota" name="namaKota" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Kodepos</label>
                                    <input type="text" class="form-control" value="<?= $donatur->kodepos ?>" id="kodePos" name="kodePos" disabled="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="metodePembayaran" class="col-lg-6 mt-3">
                    <div class="card">
                        <h6 class="card-header card-header-ringkasan">
                            Kode Konfirmasi Anda : <span id="kodeKonfirmasi" name="kodeKonfirmasi"><?= $donasi->noRefensi ?></span>
                        </h6>
                        <div class="card-body body-ringkasan">
                            <p>Metode pembayaran menggunakan</p>
                            <img id="metodePembayaran" name="metodePembayaran" class="metode-pembayaran-ringkasan" src="<?= $aset_url . '/media/' . $pembayaran->image ?>" alt="">
                            <p>Silahkan klik tombol bayar untuk melanjutkan ke portal pembayaran</p>
                            <?php if ($pembayaran->metode_pembayaran != "Midtrans") : ?>
                                <div class="bayar_normal">
                                    <a href="<?= site_url('donatur/pembayaran/pembayaran/') . $donasi->noRefensi ?>" class="btn btn-lg btn-success">
                                        Bayar Sekarang !
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="midtrans">
                                    <button id="pay-button" type="submit" class="btn btn-lg btn-success" name="pay-button">
                                        <span id="payment-button-amount">Bayar Sekarang !</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>