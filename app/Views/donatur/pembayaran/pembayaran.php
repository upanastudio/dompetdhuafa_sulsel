    <main class="mb-4">
        <div id="pembayaran-page" class="container">
            <div class="row mt-3">
                <div class="col-12 ">

                    <?php if ($pembayaran->metode_pembayaran == "Midtrans") { ?>
                        <h4 class="text-center">Terimakasih atas Donasi Anda Melalui <span id="namaBank" name="namaBank"><?= $pembayaran->metode_pembayaran ?></span></h4>
                        <hr>
                        <p>
                            Assalamu'alaikum Warrahmatullahi Wabarakaatuh <span id="namaLengkap" name="namaLenkgap"><?= $donatur->nama_donatur ?><span> yang berbahagia, Terima kasih telah melakukan donasi melalui portal donasi online Dompet Dhuafa.
                        </p>
                        <p>Berikut adalah resume donasi <span id="namaLengkap" name="namaLenkgap"><?= $donatur->nama_donatur ?><span>:</p>
                        <ul>
                            <li>No. Referensi : <?= $donasi->noRefensi ?></li>
                            <li>Tanggal Transaksi : <?= $donasi->tanggalTransaksi ?></li>
                            <li>Jenis Donasi : <?= $donasi->jenisDonasi ?></li>
                            <li>Status Bayar : <?php
                                                if ($status->transaction_status == "settlement") {
                                                    echo "Pembayaran Telah Selesai";
                                                } elseif ($status->transaction_status == "pending") {
                                                    echo "Pembayaran Belum Anda Lakukan";
                                                } elseif ($status->transaction_status == "capture") {
                                                    echo "Pembayaran Telah Selesai";
                                                } elseif ($status->transaction_status == "deny") {
                                                    echo "Pembayaran Telah Selesai";
                                                } else {
                                                    echo "Gagal Melakukan Pembayaran";
                                                }
                                                ?></li>
                            <li>Jumlah Donasi : <span id="jumlah-donasi" name="jumlah-donasi"><?= $hasil_rupiah = "Rp " . number_format($donasi->totalPembayaran, 2, ',', '.'); ?></span>
                        </ul>
                        <p>Berikut resume pembayaran dari midtrans</p>
                        <ul>

                            <li>ID Pembayaran : <?php if (isset($midtrans['order_id'])) {
                                                    echo $midtrans['order_id'];
                                                } elseif (isset($midtrans['midtrans_order_id'])) {
                                                    echo $midtrans['midtrans_order_id'];
                                                } else {
                                                    echo "-";
                                                } ?></li>
                            <li>Waktu Transaksi : <?php if (isset($midtrans['transaction_time'])) {
                                                        echo date_format(new DateTime($midtrans['transaction_time']), 'd-m-Y H:i:s');
                                                    } elseif (isset($midtrans['waktu_transaksi'])) {
                                                        echo date_format(new DateTime($midtrans['waktu_transaksi']), 'd-m-Y H:i:s');
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?></li>
                            <li>Kode Pembayaran : <?php if (isset($midtrans['payment_code'])) {
                                                        echo $midtrans['payment_code'];
                                                    } elseif (isset($midtrans['kode_pembayaran'])) {
                                                        echo $midtrans['kode_pembayaran'];
                                                    } else {
                                                        echo "-";
                                                    } ?></li>
                            <li>Tempat Bayar : <?php if (isset($status->store)) {
                                                    echo $status->store;
                                                } else {
                                                    echo "-";
                                                } ?> </li>
                            <li>Tipe Pembayaran : <?php if ($status->payment_type == "gopay") {
                                                        echo "Gopay";
                                                    } elseif ($status->payment_type == "credit_card") {
                                                        echo "Kartu Kredit";
                                                    } elseif ($status->payment_type == "cstore") {
                                                        echo "CS Store";
                                                    } else {
                                                        echo "-";
                                                    } ?> </li>
                            <li>Bill Key : <?php
                                            if (isset($midtrans['bill_key'])) {
                                                echo $midtrans['bill_key'];
                                            } else {
                                                echo "-";
                                            }
                                            ?></li>
                            <li>Bill Kode : <?php
                                            if (isset($midtrans['biller_code'])) {
                                                echo $midtrans['biller_code'];
                                            } elseif (isset($midtrans['bill_code'])) {
                                                echo $midtrans['bill_code'];
                                            } else {
                                                echo "-";
                                            }
                                            ?></li>
                            <li>Bank : <?php
                                        if (isset($midtrans['va_numbers'][0]['bank'])) {
                                            echo $midtrans['va_numbers'][0]['bank'];
                                        } elseif (isset($midtrans['bank'])) {
                                            echo $midtrans['bank'];
                                        } elseif (isset($status->bank)) {
                                            echo $status->bank;
                                        } else {
                                            echo "-";
                                        }
                                        ?></td>
                            </li>
                            <li>Nomor virtual akun : <?php
                                                        if (isset($midtrans['va_numbers'][0]['va_number'])) {
                                                            echo $midtrans['va_numbers'][0]['va_number'];
                                                        } elseif (isset($midtrans['nomor_va'])) {
                                                            echo $midtrans['nomor_va'];
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?></li>
                            <li>Virtual akun permata : <?php
                                                        if (isset($midtrans['permata_va_number'])) {
                                                            echo $midtrans['permata_va_number'];
                                                        } elseif (isset($midtrans['permata_va'])) {
                                                            echo $midtrans['permata_va'];
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?></li>

                        </ul>
                        <p><strong>Keterangan :</strong></p>
                        <ul>
                            <li>Di mohon untuk melakukan pembayaran maksimal 24 Jam setelah melakukan donasi</li>
                        </ul>
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
                        <div class="col-md mb-2">
                            <button class="btn btn-block btn-primary no-print align-content-center" onclick="window.print()">
                                Download Invoice (PDF)
                            </button>
                        </div>
                    <?php } else { ?>
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
                            <li>Jumlah Donasi : <span id="jumlah-donasi" name="jumlah-donasi"><?= $hasil_rupiah = "Rp " . number_format($donasi->totalPembayaran, 2, ',', '.'); ?></span><button onclick="copyToClipboard('#jumlah-donasi')" class="btn btn-sm btn-warning btn-copy no-print">Copy</button></li>
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
                            Dan silahkan melakukan konfirmasi pembayaran donasi disini <a href="<?= site_url('donatur/konfirmasi/') . $donasi->noRefensi ?>" target="_blank">Konfirmasi Donasi</a>&nbsp;Untuk informasi lebih lanjut, <span id="namaLengkap" name="namaLenkgap">Ahmad Rifaldi<span>&nbsp;dapat menghubungi :
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
                                <a href="<?= site_url('donatur/konfirmasi/') . $donasi->noRefensi ?>" class="btn btn-block btn-success no-print">
                                    Konfirmasi Pembayaran
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>