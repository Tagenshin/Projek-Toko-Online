<h2>Ubah Kategori</h2>
<hr>

<?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="">Nama Kategori</label>
		<input type="text" class="form-control" name="kategori" value="<?php echo $pecah['nama_kategori']; ?>">
	</div>

	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
	$koneksi->query("UPDATE kategori SET nama_kategori='$_POST[kategori]' WHERE id_kategori='$_GET[id]'");


	echo "<div class='alert alert-info' style='margin-top:10px; width:20%;'>Data Telah Diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>