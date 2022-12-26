<?php
session_start();

include 'admin/koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong, silahkan belanja dulu'); location='index.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>keranjang belanja</title>
	
</head>
<body>
	<!-- navbar -->
	<?php include 'navbar.php'; ?>

	<section class="kontent">
		<div class="container">
			<br>
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
						<!-- menampilkan produk yg sedang di perlukan berdasarkan id_produk -->
						<?php
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["harga_produk"]*$jumlah;

						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_produk"]; ?></td>
							<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
							<td><?php echo $jumlah; ?></td>
							<td>Rp. <?php echo number_format($subharga); ?></td>
							<td>
								<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" 
									class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Hapus</a>
								</td>
							</tr>
							<?php $nomor++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php" class="btn btn-outline-info"><i class="bi bi-box-arrow-left"></i> Lanjutkan Belanja</a>
				<a href="checkout.php" class="btn btn-primary"><i class="bi bi-box-arrow-right"></i> Checkout</a>
			</div>
		</section>

		<?php include 'footer.php'; ?>

	</body>
	</html>

