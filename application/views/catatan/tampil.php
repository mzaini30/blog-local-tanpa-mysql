<?php if ($modul == 'cari'): ?>
	<p><div class="alert alert-warning">Hasil pencarian dengan kata kunci <em><?= $query ?></em></div></p>
<?php endif ?>
<?php foreach($data as $d): ?>
	<a href="<?= base_url() ?>jurnal/<?= $d->id ?>" class="bukan-link">
		<div class="panel panel-default">
			<div class="panel-heading"><?= $d->judul ?></div>
			<div class="panel-body konten"><?= ubah(character_limiter($d->isi, 300)) ?></div>
			<div class="panel-footer">
				<div class="waktu waktu-<?= $d->id ?>"></div>
				<script type="text/javascript">
					$('.waktu-<?= $d->id ?>').html(moment('<?= $d->tanggal ?>').fromNow())
					setInterval(function(){
						$('.waktu-<?= $d->id ?>').html(moment('<?= $d->tanggal ?>').fromNow())
					}, 60000)
				</script>
			</div>
		</div>
	</a>
<?php endforeach ?>
<center>
	<?= $pagination ?>
</center>