<?php 
session_start();
include 'admin/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'asset.php'; ?>
	<title>Daftar</title>
</head>
<body>
	<?php include 'navbar.php' ?>
	<br>
	<br>

	<div class="container">
		<div class="row justify-content-md-center">
			<div class ="col-6">
				<div class="card border-primary mb-3">
					<div class="card-header">
						<h3 class="panel-title text-center">Daftar Pelanggan</h3>
					</div>
					<div class="card-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-3">Nama</label>
								<div class="col-12">
									<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">E-mail</label>
								<div class="col-12">
									<input type="email" class="form-control" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-12">
									<input type="text" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-12">
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Telp/HP</label>
								<div class="col-12">
									<input type="text" class="form-control" name="telepon" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
						<?php
						// jk ada tombol daftar(ditekan tombol daftar)
						if (isset($_POST["daftar"]))
						{
							// mengambil isian nama,email,password,alamat,telepon
							$nama = $_POST["nama"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$alamat = $_POST["alamat"];
							$telepon = $_POST["telepon"];

							// cek apakah email sudah ada
							$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
							$yangcocok = $ambil->num_rows;
							if ($yangcocok==1)
							{
								echo "<script>alert('Pendaftaran gagal, email sudah digunakan');
								location='daftar.php'; </script>";
							}
							else
							{
								// query insert ke tabel pelanggan
								$koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES('$email','$password','$nama','$telepon','$alamat')");

								echo "<script>alert('Pendaftaran sukses, silahkan login');
								location='login.php'; </script>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>

</body>
</html>

