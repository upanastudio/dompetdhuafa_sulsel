<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?= $assets_url ?>media/favicon.ico">
	<base href="../">
	<title><?= $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= $assets_url ?>plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= $assets_url ?>css/adminlte.min.css">
	<link rel="stylesheet" href="<?= $assets_url ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="<?= $assets_url ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?= $assets_url ?>css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="<?= $assets_url ?>css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="<?= $assets_url ?>css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style>
		table th,
		table td {
			/* font-size: 0.9em; */
			white-space: nowrap;
		}
	</style>

	<?php if ($css) echo view($css); ?>
</head>
