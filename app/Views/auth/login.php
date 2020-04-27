<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Dompet Dhuafa</title>
	<link rel="stylesheet" href="<?= base_url("template/assets") ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url("template/assets") ?>/css/login-style.css">
	<script src="<?= base_url("template/assets") ?>/js/jquery-3.2.1.slim.min.js"></script>
	<script src="<?= base_url("template/assets") ?>/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="">
		<img class="bg-image" src="<?= base_url("template/assets") ?>/media/bg-1.jpg" alt="">
		<div class="login-form">
			<form action="<?= route_to(base_url('admin')) ?>" method="post">
				<?= csrf_field() ?>
				<div class="logo-wrapper text-center">
					<img src="<?= base_url("template/assets") ?>/media/logo_dd.png" alt="AdminLTE Logo" class="brand-image">
				</div>
				<div class="form-group">
					<?= view('Myth\Auth\Views\_message_block') ?>
				</div>
			<?php if ($config->validFields === ['email']) : ?>
				<div class="form-group">
					<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="Email" name="login" required="required">
					<div class="invalid-feedback">
						<?= session('errors.login') ?>
					</div>
				</div>
			<?php else : ?>
				<div class="form-group">
					<input type="text" class="form-control  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="Username" name="login" required="required">
					<div class="invalid-feedback">
						<?= session('errors.login') ?>
					</div>
				</div>
			<?php endif; ?>
				<div class="form-group">
					<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Password" required="required">
					<div class="invalid-feedback">
						<?= session('errors.password') ?>
					</div>
				</div>
				<?php if ($config->allowRemembering) : ?>
				<div class="form-group">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
							<?= lang('Auth.rememberMe') ?>
						</label>
					</div>
				</div>
				<?php endif; ?>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-block">Log in</button>
				</div>
			</form>
			<!-- <p class="text-center"><a href="#">Create an Account</a></p> -->
		</div>
	</div>
</body>

</html>
