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
                    <h1 class="m-0 text-dark">Data Midtrans</h1>
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
                            List Data Midtrans
                        </div>
                        <div class="card-body">
                            <table style="width: 100%" class="table table-bordered" id="tblMidtrans">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Refrensi</th>
                                        <th>Tanggal Bayar</th>
                                        <th>ID Pembayaran</th>
                                        <th>Via Pembayaran</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    <?php foreach ($data as $item) {
                                        $time = Time::parse($item['waktu_transaksi'], 'Asia/Makassar');
                                    ?>
                                        <tr>
                                            <td><?= ++$counter ?></td>
                                            <td><?= $item['id_donasi'] ?></td>
                                            <td><?= $time->toLocalizedString('dd MMMM yyyy') ?></td>
                                            <td><?= $item['midtrans_order_id'] ?></td>
                                            <td><?php if (!empty($item['bank'])) {
                                                    echo $item['bank'];
                                                } elseif (!empty($item['store'])) {
                                                    echo $item['store'];
                                                } elseif (!empty($item['payment_type'])) {
                                                    echo $item['payment_type'];
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?= str_replace('IDR', 'Rp', number_to_currency($item['total_pembayaran'], 'IDR')) ?></td>
                                            <td><?php if ($item['status'] == "settlement") {
                                                    echo "<span class='btn btn-success'>Sudah Dibayar</span>";
                                                } elseif ($item['status'] == "pending") {
                                                    echo "<span class='btn btn-info'>Belum Dibayar</span>";
                                                } elseif ($item['status'] == "capture") {
                                                    echo "<span class='btn btn-success'>Sudah Dibayar</span>";
                                                } elseif ($item['status'] == "deny") {
                                                    echo "<span class='btn btn-warning'>Gagal</span>";
                                                } elseif ($item['status'] == "cancel") {
                                                    echo "<span class='btn btn-warning'>Pembayaran Dibatalkan</span>";
                                                } elseif ($item['status'] == "expire") {
                                                    echo "<span class='btn btn-warning'>Expired</span>";
                                                } else {
                                                    echo "<span class='btn btn-warning'>Gagal</span>";
                                                }
                                                ?></td>
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