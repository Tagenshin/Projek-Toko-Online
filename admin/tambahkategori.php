
<h2>Tambah Kategori</h2>
<hr>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="">Nama Kategori</label>
		<input type="text" class="form-control" name="kategori" required>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save']))
{
	
	$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES('$_POST[kategori]')");


	echo "<div class='alert alert-info' style='margin-top:10px;'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>