<?php

use CodeIgniter\I18n\Time;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">KONFIMASI DONASI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right d-none">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            List Konfirmasi Donasi
                        </div>
                        <div class="card-body">
                            <table style="width: 100%" class="table table-bordered" id="tblKonfimasiDonasi">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Bayar</th>
                                        <th>No. Refrensi Donasi</th>
                                        <th>Jumlah Donasi</th>
                                        <th>Nama Donatur</th>
                                        <th>Bank</th>
                                        <th>Cabang Bank</th>
                                        <th>No. Rek</th>
                                        <th>Nama Pemilik</th>
                                        <th>Catatan</th>
                                        <th>Bukti Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    <?php
                                    foreach ($data as $item) {
                                        $time = Time::parse($item->tanggal_bayar, 'Asia/Makassar');
                                    ?>
                                        <tr>
                                            <td><?= ++$counter ?></td>
                                            <td><?= $time->toLocalizedString('dd MMMM yyyy') ?></td>
                                            <td><?= $item->id_donasi ?></td>
                                            <td><?= str_replace('IDR', 'Rp', number_to_currency($item->total_pembayaran, 'IDR')) ?></td>
                                            <td><?= $item->sapaan . " " .  $item->nama_donatur ?></td>
                                            <td><?= $item->bank_nama ?></td>
                                            <td><?= ($item->bank_cabang == "") ? "-" :  $item->bank_cabang ?></td>
                                            <td><?= ($item->bank_norek) ? $item->bank_norek : '-' ?></td>
                                            <td><?= ($item->bank_atas_nama) ? $item->bank_atas_nama : '-' ?></td>
                                            <td><?= ($item->catatan == "") ? "-" :  $item->catatan ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>/uploads/<?= $item->bukti_pembayaran ?>" target="_blank" class="btn btn-success btn-sm"> <i class="fa fa-eye fa-right"></i> Bukti Transfer </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>