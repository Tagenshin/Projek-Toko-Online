
<?php
session_start();

include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<!-- <link rel="stylesheet" href="admin/assets/css/bootstrap.css"> -->
	<style>
		.size{
				font-size: 14px;
			}
	</style>
</head>
<body>

<!-- navbar -->
<?php include 'navbar.php'; ?>
<br>

<section class="konten">
	<div class="container">

<h2>Detail Pembelian</h2>
<hr>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!-- pelanggan harus yang login -->
<?php
// mendapatkan id pelanggan
$idPelangganYangBeli = $detail["id_pelanggan"];

// mendapatkan id pelanggan yang login
$idPelangganYangLogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idPelangganYangBeli!==$idPelangganYangLogin)
{
	echo "<script>alert('dilarang');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

?>


<div class="row">
	<div class="col-md-4">
		<table class="table size">
			<h4>Pembelian</h4>
			<tr>
				<td>No. Pembelian</td>
				<td>:</td>
				<td><?php echo $detail['id_pembelian']; ?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])); ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
			</tr>
			<tr>
				<td>Status Pembelian</td>
				<td>:</td>
				<td><?php echo ($detail['status_pembelian']); ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-4">
		<h4>Pelanggan</h4>
		<table class="table size">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $detail ['nama_pelanggan']; ?></td>
			</tr>
			<tr>
				<td>No. Telp</td>
				<td>:</td>
				<td><?php echo $detail['telepon_pelanggan']; ?></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>:</td>
				<td><?php echo $detail['email_pelanggan']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-4">
		<h4>Pengiriman</h4>
		<table class="table size">
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<!-- Alamat : -->
				<?php echo $detail ['tipe']; ?>
				<?php echo $detail ['distrik']; ?>
				<?php echo $detail ['provinsi']; ?>
				</td>
			</tr>
			<tr>
				<td>Ongkos Kirim</td>
				<td>:</td>
				<td>Rp. <?php echo number_format($detail['ongkir']); ?></td>
			</tr>
			<tr>
				<td>Ekpedisi</td>
				<td>:</td>
				<td>
					<?php echo $detail["ekspedisi"] ?>
					<?php echo $detail["paket"] ?>
					<?php echo $detail["estimasi"] ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $detail['alamat_pengiriman']; ?></td>
			</tr>

		</table>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?> Gr.</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> Gr.</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<?php if ($detail["status_pembelian"] == "Pending"): ?>
	
<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong>BANK BRI 130-98933908273 an. Trio Anggoro</strong>
			</p>
		</div>
	</div>
</div>

<?php endif ?>

	</div>
</section>


</body>
</html>

<?php include 'footer.php'; ?>