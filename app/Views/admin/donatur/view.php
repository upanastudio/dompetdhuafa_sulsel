<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DONATUR</h1>
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
                            List Donatur
                        </div>
                        <div class="card-body">
                            <table style="width: 100%" class="table table-bordered" id="tblDonatur">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon / HP</th>
                                        <th>Alamat Donatur</th>
                                        <th>Tipe Donatur</th>
                                        <th>NPWP</th>
                                        <th>Nama Institusi</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th>Negara</th>
                                        <th>Kodepos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    <?php foreach ($data as $item) { ?>
                                        <tr>
                                            <td><?= ++$counter ?></td>
                                            <td><?= $item->sapaan . " " .  $item->nama_donatur ?></td>
                                            <td><?= $item->email ?></td>
                                            <td><?= $item->telepon ?></td>
                                            <td><?= ($item->alamat == "") ? "-" :  $item->alamat ?></td>
                                            <td><?= ucfirst($item->tipe_donatur) ?></td>
                                            <td><?= ($item->npwp == "") ? "-" :  $item->npwp ?></td>
                                            <td><?= ($item->institusi == "") ? "-" :  $item->institusi ?></td>
                                            <td><?= $item->negara ?></td>
                                            <td><?= ($item->provinsi == "") ? "-" :  $item->provinsi ?></td>
                                            <td><?= ($item->kota == "") ? "-" :  $item->kota ?></td>
                                            <td><?= ($item->kodepos == "") ? "-" :  $item->kodepos ?></td>
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