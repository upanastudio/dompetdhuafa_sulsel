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
							<table style="width: 100%" class="table table-bordered" id="tblDonasi">
								<thead>
									<tr>
										<th>No.</th>
										<th>Jenis Donasi</th>
										<th>Pengkhususan Donasi</th>
										<th>Keterangan Donasi</th>
										<th>Nama Donatur</th>
										<th>No. Refrensi</th>
										<th>Status</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php $counter = 0; ?>
									<?php foreach ($data as $item) { ?>
										<tr>
											<td><?= ++$counter ?></td>
											<td><?= $item->jenis_donasi ?></td>
											<td><?= $item->subjenis_donasi ?></td>
											<td><?= $item->target_donasi ?></td>
											<td><?= $item->sapaan . " " .  $item->nama_donatur ?></td>
											<td><?= $item->id_donasi ?></td>
											<td>
												<?php if ($item->status == 0) : ?>
													<span style="width:100%;pointer-events:none" disabled class="btn btn-bold btn-sm btn-font-sm btn-outline-warning">Menunggu Konfirmasi</span>
												<?php elseif ($item->status == 1) : ?>
													<span style="width:100%;pointer-events:none" disabled class="btn btn-bold btn-sm btn-font-sm btn-outline-success">Selesai</span>
												<?php elseif ($item->status == 2) : ?>
													<span style="width:100%;pointer-events:none" disabled class="btn btn-bold btn-sm btn-font-sm btn-outline-danger">Belum Selesai</span>
												<?php endif; ?>
											</td>
											<td>Rp. <?= $item->total_pembayaran ?></td>
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
