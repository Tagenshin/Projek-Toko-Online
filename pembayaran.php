<?php
session_start();

include 'koneksi.php';

// jk tidak ada session pelanggan
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

// mendapatkan id pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yg Login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli)
{
	echo "<script>alert('Dilarang');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<!doctype html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<title>Pembayaran</title>
</head>
<body>

	<?php include 'navbar.php'; ?>
	<br>
	<div class="row">
		
		<div class="container">
			<h2>Konfirmasi Pembayaran</h2>
			<p>Kirim bukti pembayaran anda disini</p>
			<div class="alert alert-info">total tagihan Anda : <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Penyetor</label>
					<input type="text" class="form-control" name="nama" required>
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" class="form-control" name="bank" required>
				</div>
				<div class="form-group">
					<label>Jumlah Tagihan</label>
					<input type="number" class="form-control" name="jumlah" min="1" required value="<?php echo $detpem["total_pembelian"] ?>">
				</div>
				<div class="form-group">
					<label>Foto Bukti</label>
					<input type="file" class="form-control" name="bukti" required style="margin-bottom: 10px;">
					<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
				</div>
				<button class="btn btn-primary btn-sm" name="kirim">Kirim</button>
			</form>
			<br>
		</div>
	</div>

	<?php
// jk ada tombol kirim
	if (isset($_POST["kirim"]))
	{
	// uploud dulu foto bukti
		$namabukti = $_FILES["bukti"]["name"];
		$lokasibukti = $_FILES["bukti"]["tmp_name"];
		$namafiks = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");

	// simpan pembayaran
		$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah ','$tanggal','$namafiks') ");

	// update data pembelian dari pendding menjadi sudah kirim pembayaran
		$koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Kirim Pembayaran' WHERE id_pembelian='$idpem'");

		echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran');</script>";
		echo "<script>location='riwayat.php';</script>";
	}

	?>

</body>
</html>

<?php include 'footer.php'; ?>