<?php
session_start();

include 'admin/koneksi.php';

// mendapatkan id produk dari url
$id_produk = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail produk</title>
</head>
<body>

	<?php include 'navbar.php'; ?>
	<br>

	<section class="kontent">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="foto_produk/<?php echo $detail["foto_produk"];?>" class="img-fluid">
				</div>
				<div class="col-md-5">
					<h2><?php echo $detail["nama_produk"]; ?></h2>

					<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
					<p>Stok : <?php echo $detail["stok_produk"]; ?></p>
					

					<form method="post">
						<div class="form-group">
							<div class="input-group">
								<!-- jumlah beli -->
								<input type="number" min="1" 
								class="form-control" name="jumlah" value="1" max="<?php echo $detail["stok_produk"]; ?>" required >
								<div class="input-group-btn" style="width: 29%;">
									<button class="btn btn-primary" name="beli" style="width: 75%;">
										<i class="bi bi-coin"></i> Beli
									</button>
								</div>
							</div>
						</div>
					</form>
					<br>
					<p><?php echo $detail["deskripsi_produk"] ?></p>
					<?php
				// jk ada tombol beli
				// if (isset($_POST["beli"]))
				// {
				// 	// mendapatkan jumlah yg di inputkan
				// 	$jumlah=$_POST["jumlah"];
				// 	// masuk keranjang
				// 	$_SESSION["keranjang"][$id_produk]+=$jumlah;

				// 	echo "<script>location='keranjang.php';</script>";
				// }
					if (isset($_POST["beli"]))
					{
						if (isset($_SESSION['keranjang'][$id_produk]))
						{
							$stok_keranjang = $_SESSION['keranjang'][$id_produk];
							$stok_sekarang = $stok_keranjang+$_POST["jumlah"];

							if ($stok_sekarang>$detail["stok_produk"])
							{
								echo "<script>alert('Barang dikeranjang melebihi stok');</script>";
								echo "<script>location='detail.php?id=$id_produk';</script>";
								exit();
							}
						}
							// Stok
						if ($_POST["jumlah"]>$detail["stok_produk"])
						{
							echo "<script>alert('Stok produk tidak mencukupi');</script>";
							echo "<script>location='detail.php?id=$id_produk';</script>";
							exit();
						}

						if (isset($_SESSION['keranjang'][$id_produk]))
						{
							$_SESSION['keranjang'][$id_produk]+=$_POST["jumlah"];

						}
							// selain itu (blm ada di keranjang), mk produk itu dianggap dibeli 1
						else
						{
							$_SESSION['keranjang'][$id_produk] =$_POST["jumlah"];
						}
						echo "<script>location='keranjang.php';</script>";
					}
					?>

					
				</div>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

</body>
</html>

