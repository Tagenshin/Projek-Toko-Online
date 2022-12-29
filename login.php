<?php
session_start();
include 'admin/koneksi.php';

if (isset($_SESSION["pelanggan"]))
{
	header("Location:index.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'asset.php'; ?>
	<title>Login Pelanggan</title>
</head>
<body>
	<!-- navbar -->
	<?php include 'navbar.php'; ?>
	<br>
	<br>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class ="col-md-5">
				<div class="card border-primary mb-3">
					<div class="card-header">
						<h3 class="panel-title text-center">Login Pelanggan</h3>
					</div>
					<div class="card-body">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<button class="btn btn-primary" name="login"><i class="bi bi-box-arrow-in-right"></i> Login</button>
							

							<?php
// jika ada tombol login(ditekan)
							if (isset($_POST["login"]))
							{
								
								$email = $_POST["email"];
								$password = $_POST["password"];
	// lakukan query ngecek akun di tabel pelanggan di db
								$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	// ngitung akun yang terambil
								$akunyangcocok = $ambil->num_rows;

	// ngitung akun yang cocok, maka diloginkan
								if ($akunyangcocok==1)
								{
									$akun = $ambil->fetch_assoc();
									$_SESSION["pelanggan"] = $akun;
		// echo "<script>alert('Anda sukses login')</script>";
									echo "<div class='alert alert-info' style='margin-top:10px;'>Login Sukses</div>";

		// jk sudah belanja
									if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
									{
		// echo "<script>location='checkout.php';</script>";
										echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
									}
									else
									{	
			// echo "<script>location='riwayat.php';</script>";	
										echo "<meta http-equiv='refresh' content='1;url=riwayat.php'>";
									}
								}
								else
								{
		// echo "<script>alert('Anda gagal login, periksa akun anda'); location='login.php';</script>";
									echo "<div class='alert alert-danger' style='margin-top:10px;'>Login Gagal</div>";
									echo "<meta http-equiv='refresh' content='1;url=login.php'>";
								}
							}

							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>

</body>
</html>

