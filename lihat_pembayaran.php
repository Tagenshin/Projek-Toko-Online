<?php
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// jk blm ada data pembayaran
if (empty($detbay))
{
	echo "<script>alert('Belum ada pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

// jk yg byar tdak sesuai dgn yg login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"])
{
	echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>lihat pembayaran</title>
	<link rel="stylesheet" href="assets2/css/bootstrap.css">
</head>
<body>
		<!-- navbar -->
<?php include 'navbar.php'; ?>
<br>

<div class="container">
	<h3>Lihat Pembayaran</h3>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><?php echo $detbay["nama"]; ?></td>
				</tr>
				<tr>
					<th>Bank</th>
					<td><?php echo $detbay["bank"]; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $detbay["tanggal"]; ?></td>
				</tr>
				<tr>
					<th>Jumlah</th>
					<td>Rp. <?php echo number_format($detbay["jumlah"]); ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<img src="bukti_pembayaran/<?php echo $detbay["bukti"]  ?>" class="img-fluid">
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>