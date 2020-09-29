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
                    <h1 class="m-0 text-dark">DONASI</h1>
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
                            List Donasi
                        </div>
                        <div class="card-body">
                            <table style="width: 100%" class="table table-bordered dt-responsive nowrap" id="tblDonasi">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Donasi</th>
                                        <th>No. Refrensi</th>
                                        <th>Donasi</th>
                                        <th>Nama Donatur</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    foreach ($data as $item) {
                                        $time = Time::parse($item->iat, 'Asia/Makassar');
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$counter ?>
                                            </td>
                                            <td><?= $time->toLocalizedString('dd MMMM yyyy, HH:mm') ?></td>
                                            <td><?= $item->id_donasi ?></td>
                                            <td>
                                                <?php echo '<b>Jenis:</b> ' . $item->jenis_donasi . '<br>
                                                        <b>Pengkhususan:</b> ' . $item->subjenis_donasi . '<br>
                                                        <b>Keterangan:</b> ' . $item->target_donasi . '<br>' ?>
                                            </td>
                                            <td><?= $item->sapaan . " " .  $item->nama_donatur ?></td>
                                            <td><?= str_replace('IDR', 'Rp', number_to_currency($item->total_pembayaran, 'IDR')) ?></td>
                                            <td><small>
                                                    <?php if ($item->status == 0) : ?>
                                                        <span style="width:100%;pointer-events:none" disabled class="btn btn-bold btn-sm btn-font-sm btn-outline-warning">Menunggu <br>Konfirmasi</span>
                                                    <?php elseif ($item->status == 1) : ?>
                                                        <span style="width:100%;pointer-events:none" disabled class="btn btn-bold btn-sm btn-font-sm btn-outline-success">Selesai</span>
                                                    <?php elseif ($item->status == 2) : ?>
                                                        <span style="width:100%;pointer-events:none" disabled class="btn btn-bold btn-sm btn-font-sm btn-outline-danger">Expired?</span>
                                                    <?php endif; ?>
                                                </small>
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