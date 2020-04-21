    <main class="mb-4">
        <div id="pembayaran-page" class="container">
            <div class="row mt-3">
                <div class="col-12 ">
                    <h4 class="text-center">Terimakasih atas Donasi Anda Melalui Bank <span id="namaBank" name="namaBank"><?= $pembayaran->metode_pembayaran ?></span></h4>
                    <hr>
                    <p>
                        Assalamu'alaikum Warrahmatullahi Wabarakaatuh <span id="namaLengkap" name="namaLenkgap"><?= $donatur->nama_donatur ?><span> yang berbahagia, Terima kasih telah melakukan donasi melalui portal donasi online Dompet Dhuafa.
                    </p>
                    <p>Berikut adalah resume donasi <span id="namaLengkap" name="namaLenkgap"><?= $donatur->nama_donatur ?><span>:</p>
                    <ul>
                        <li>No. Referensi : <?= $donasi->noRefensi ?></li>
                        <li>Tanggal Transaksi : <?= $donasi->tanggalTransaksi ?></li>
                        <li>Jenis Donasi : <?= $donasi->jenisDonasi ?></li>
                        <li>Jumlah Donasi : <span id="jumlah-donasi" name="jumlah-donasi"><?= $donasi->totalPembayaran ?></span><button onclick="copyToClipboard('#jumlah-donasi')" class="btn btn-sm btn-warning btn-copy no-print">Copy</button></li>
                    </ul>
                    <p>Silahkan melanjutkan pembayaran donasi ke salah satu rekening berikut :</p>
                    <section id="pengirimanBank" class="mb-3">
                        <h5 id="transferBank" name="transferBank">Bank <?= $pembayaran->metode_pembayaran ?></h5>
                        <p>
                            <small><strong>No. Rekening</strong></small><br>
                            <span id="no-rekening" name="no-rekening"><?= $pembayaran->norek ?></span>
                            <button onclick="copyToClipboard('#no-rekening')" class="btn btn-sm btn-warning btn-copy no-print">Copy</button>
                        </p>
                        <p>
                            <small><strong>Atas Nama</strong></small><br>
                            <?= $pembayaran->atas_nama ?>
                        </p>
                    </section>
                    <p><strong>Keterangan :</strong></p>
                    <ul>
                        <li>No rekening di atas berlaku sebagai rekening penampungan untuk semua transaksi zakat, infak,
                            sedekah, wakaf dan kurban
                        </li>
                        <li>Di mohon untuk melakukan konfirmasi donasi maksimal 1 x 24 Jam setelah melakukan donasi</li>
                    </ul>
                    <p>
                        Dan silahkan melakukan konfirmasi pembayaran donasi disini <a href="<?= $konfirmasi_donasi ?>" target="_blank">Konfirmasi Donasi</a>&nbsp;Untuk informasi lebih lanjut, <span id="namaLengkap" name="namaLenkgap">Ahmad Rifaldi<span>&nbsp;dapat menghubungi :
                    </p>
                    <p>
                        Call Center 0411-4093458<br>
                        SMS 0853 7321 1111 <br>
                        Email <a href="mailto:layandonatur@dompetdhuafa.org">layandonatur@dompetdhuafa.org</a><br>
                        <a href="www.DompetDhuafa.org">www.DompetDhuafa.org</a>
                    </p>
                    <p>
                        Semoga Allah memberikan pahala atas donasi yang diberikan, memberikan keberkahan atas harta yang
                        tersisa, dan menjadikannya suci dan mensucikan.
                    </p>
                    <div class="row">
                        <div class="col-md mb-2">
                            <button class="btn btn-block btn-primary no-print" onclick="window.print()">
                                Download Invoice (PDF)
                            </button>
                        </div>
                        <div class="col-md">
                            <a href="<?= $konfirmasi_donasi ?>" class="btn btn-block btn-success no-print">
                                Konfirmasi Pembayaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>