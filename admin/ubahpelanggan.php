<h2>Ubah Pelanggan</h2>
<hr>

<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Email Pelanggan</label>
		<input type="email" class="form-control" name="email_pelanggan" value="<?php echo $pecah['email_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Password Pelanggan</label>
		<input type="password" class="form-control" name="password" value="<?php echo $pecah['password_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon Pelanggan</label>
		<input type="number" class="form-control" name="telepon_pelanggan" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Alamat Pelanggan</label>
		<textarea name="alamat_pelanggan" class="form-control"><?php echo $pecah['alamat_pelanggan']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php

if (isset($_POST["ubah"]))
{
	$koneksi->query("UPDATE pelanggan SET email_pelanggan='$_POST[email_pelanggan]',password_pelanggan='$_POST[password]',nama_pelanggan='$_POST[nama_pelanggan]',telepon_pelanggan='$_POST[telepon_pelanggan]',alamat_pelanggan='$_POST[alamat_pelanggan]'
		WHERE id_pelanggan='$_GET[id]' ");

	echo "<div class='alert alert-info' style='margin-top:10px; width:20%;'>Data Telah Diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}

?>