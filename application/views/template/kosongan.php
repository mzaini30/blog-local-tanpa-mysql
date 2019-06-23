<!DOCTYPE html>
<html>
<head>
	<title><?= $judul ?> - Catatan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>aset/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>aset/app/style.css">
	<script type="text/javascript" src="<?= base_url() ?>aset/vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>aset/vendor/moment/moment-with-locales.js"></script>
	<script type="text/javascript">
		moment.locale('id')
	</script>
</head>
<body>
	<br>
	<div class="container">
		<center>
			<h1><a href='<?= base_url() ?>' class='bukan-link'>Catatan</a></h1>
			<br>
		</center>
		<form action="<?= base_url() ?>cari" method="get">
			<div class="form-group">
				<input type="text" class="form-control" name="cari" placeholder="Cari">
			</div>
		</form>
		<?php $this->load->view($isi, $data) ?>
	</div>
</body>
</html>