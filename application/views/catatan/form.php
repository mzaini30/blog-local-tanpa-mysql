<form method="post">
	<div class="form-group">
		<label for="">Judul</label>
		<input type="text" class="form-control" name="judul" required="" value="<?= $data['judul'] ?>">
	</div>
	<div class="form-group">
		<label for="">Isi</label>
		<textarea name="isi" id="" cols="30" rows="10" class="form-control" required=""><?= $data['isi'] ?></textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-success" value="Oke">
	</div>
</form>