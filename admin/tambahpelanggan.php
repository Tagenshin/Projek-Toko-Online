<h2>Tambah Pelanggan</h2>
<hr>

<?php
$ambil=$koneksi->query("SELECT * FROM pelanggan");
$pecah = $ambil->fetch_assoc();
// var_dump($pecah);
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email_pelanggan" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" name="nama_pelanggan" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Nomor Telepon</label>
		<input type="number" class="form-control" name="telepon" required>
	</div>
	<div class="form-group">
		<label>Alamat Lengkap</label>
		<textarea name="alamat_pelanggan" placeholder="Masukan Alamat Lengkap" class="form-control" required></textarea>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan']))
{
	$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) 
	VALUES('$_POST[email_pelanggan]','$_POST[password]','$_POST[nama_pelanggan]','$_POST[telepon]','$_POST[alamat_pelanggan]') ");

	echo "<div class='alert alert-info' style='margin-top:10px; width:20%;'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>