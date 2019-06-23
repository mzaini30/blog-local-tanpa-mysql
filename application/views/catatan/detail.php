<div class="panel panel-default">
	<div class="panel-heading"><?= $data->judul ?></div>
	<div class="panel-body konten"><div class="teks-wrap"><?= ubah($data->isi) ?></div></div>
	<div class="panel-footer">
		<div class="waktu waktu-<?= $data->id ?>"></div>
		<script type="text/javascript">
			$('.waktu-<?= $data->id ?>').html(moment('<?= $data->tanggal ?>').fromNow())
			setInterval(function(){
				$('.waktu-<?= $data->id ?>').html(moment('<?= $data->tanggal ?>').fromNow())
			}, 60000)
		</script>
	</div>
</div>