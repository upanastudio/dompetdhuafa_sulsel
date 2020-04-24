	<main class="">
	    <div class="container">
	        <form id="form-konfirmasi" method="post" enctype="multipart/form-data">
	            <div class="row mt-3">
	                <div class="col-12 ">
	                    <h4 class="text-center">Konfirmasi Donasi</h4>
	                    <hr>
	                </div>
	                <div id="pilihanDonasi" class="col-lg-12 mt-3">
	                    <div class="wrap-form">
	                        <div class="row justify-content-center">
	                            <div class="col-sm-10">
	                                <div class="form-group">
	                                    <label>No Refrensi</label>
	                                    <input type="text" class="form-control" value="<?= $donasi->noRefensi ?>" id="noRefrensi" name="noRefrensi" disabled="">
	                                    <input type="hidden" class="form-control" value="<?= $donasi->noRefensi ?>" name="noRefrensi">
	                                </div>
	                                <div class="form-group">
	                                    <label>Nama Lengkap</label>
	                                    <input type="text" class="form-control" value="<?= $donatur->nama_donatur ?>" id="namaLengkap" name="namaLengkap" disabled="">
	                                </div>
	                                <div class="form-group">
	                                    <label>Email</label>
	                                    <input type="text" class="form-control" value="<?= $donatur->email ?>" id="email" name="email" disabled="">
	                                </div>
	                                <div class="form-group">
	                                    <label>No Telpon</label>
	                                    <input type="text" class="form-control" value="<?= $donatur->telepon ?>" id="noTelpon" name="noTelpon" disabled="">
	                                </div>
	                                <div class="form-group">
	                                    <label>Bank Anda</label>
	                                    <select style="width: 100%" class="select2" name="bank">
	                                        <option value="BNI">Bank BNI</option>
	                                        <option value="BRI">Bank BRI</option>
	                                        <option value="BTN">Bank BTN</option>
	                                        <option value="Danamon">Bank Danamon</option>
	                                        <option value="Mandiri">Bank Mandiri</option>
	                                        <option value="Muamalat">Bank Muamalat</option>
	                                        <option value="Permata">Bank Permata</option>
	                                        <option value="Syariah Mandiri">Bank Syariah Mandiri</option>
	                                        <option value="BCA">BCA</option>
	                                        <option value="Maybank">BII Maybank</option>
	                                        <option value="BNI Syariah">BNI Syariah</option>
	                                        <option value="BRI Syariah">BRI Syariah</option>
	                                        <option value="CIMB Niaga">CIMB Niaga</option>
	                                        <option value="CIMB Niaga Syariah">CIMB Niaga Syariah</option>
	                                        <option value="OCBC NISP">OCBC NISP</option>
	                                        <option value="PANIN">PANIN BANK</option>
	                                    </select>
	                                </div>
	                                <div class="form-group">
	                                    <input type="text" class="form-control" placeholder="input cabang" id="cabangBank" name="cabangBank">
	                                </div>
	                                <div class="form-group">
	                                    <input type="number" class="form-control" placeholder="input no rekening" id="noRekening" name="noRekening">
	                                </div>
	                                <div class="form-group">
	                                    <input type="text" class="form-control" placeholder="input nama pemilik" id="namaPemilik" name="namaPemilik">
	                                </div>
	                                <div class="form-group">
	                                    <label>Bank Tujuan</label>
	                                    <input type="text" class="form-control" value="<?= 'Bank ' . $pembayaran->metode_pembayaran . ' | ' . $pembayaran->atas_nama . ' | ' . $pembayaran->norek ?>" id="bankTujuan" name="bankTujuan" disabled="">
	                                </div>
	                                <div class="form-group">
	                                    <label>Jumlah</label>
	                                    <div class="input-group">
	                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
	                                        <input type="text" class="form-control" value="<?= $donasi->totalPembayaran ?>" id="totalDonasi" name="totalDonasi" disabled="">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <!-- Date input -->
	                                    <label class="control-label" for="date">Tanggal Bayar <span class="required-icon">*</span></label>
	                                    <input class="form-control" id="date" name="date" placeholder="pilih tanggal" type="text" required="" />
	                                </div>
	                                <div class="form-group">
	                                    <label>Bukti/Slip Pembayaran <span class="required-icon">*</span></label>
	                                    <div class="custom-file">
	                                        <input type="file" class="custom-file-input" id="fileBuktiPembayaran" name="fileBuktiPembayaran">
	                                        <label class="custom-file-label" for="fileBuktiPembayaran">Choose file</label>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label>Catatan</label>
	                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="input catatan"></textarea>
	                                </div>
	                                <div class="row justify-content-center">
	                                    <div class="col-sm-4">
	                                        <button class="btn btn-success btn-block">
	                                            Submit
	                                        </button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </form>
	    </div>
	</main>