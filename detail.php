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
	<?php include 'asset.php'; ?>
	<title>Detail produk</title>
</head>
<body>

	<?php include 'navbar.php'; ?>
	<br>

	<section class="kontent">
		<div class="container" style="margin-top: 1rem; margin-bottom: 8rem;">
			<div class="row">
				<div class="col-md-5 mt-2">
					<div class="card">
						<img id="root-foto" src="foto_produk/<?php echo $detail["foto_produk"];?>" class="thumbnail rounded">
					</div>
					<div>
						<?php
						$ambil=$koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
						?>

						<div class="row mt-3">
							<div class="col-md-4">
								<img class="rounded sub-foto" src="foto_produk/<?php echo $detail["foto_produk"];?>" alt="Foto lainnya">
							</div>
							<?php while ($ambilfoto = $ambil->fetch_assoc()): ?>
								<div class="col-md-4">
										<img class="rounded sub-foto" src="foto_produk/<?php echo $ambilfoto["nama_produk_foto"] ?>" alt="Foto lainnya">
								</div>
							<?php endwhile ?>
						</div>
					</div>
				</div>

				<div class="col-md-5 mt-2">
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

					<div>
						<p 
						style="
						width: 400px;
						height: 230px;
						overflow: auto;"
						><?php echo $detail["deskripsi_produk"] ?></p>
					</div>
					

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

	<script>
		const subFoto = document.querySelectorAll('.sub-foto');
		const rootFotoEl = document.querySelector('#root-foto');
		subFoto.forEach((el) => {
			el.addEventListener('click', (e) => {
				const clickEl = document.querySelectorAll('.clicked');
				clickEl.forEach((el) => {
					el.classList.remove('clicked');
				})
				e.target.classList.add('clicked');
				const lokasiFoto = e.target.getAttribute('src');
				rootFotoEl.setAttribute('src', lokasiFoto);
			})
		})
	</script>

	<?php include 'footer.php'; ?>

</body>
</html>

