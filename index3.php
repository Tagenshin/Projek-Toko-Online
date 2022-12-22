<?php
session_start();
// koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>toko shin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- konten -->
<section class="kontent">
	<div class="container">
		<h1>Produk Terbaru</h1>
		<hr>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk=$ambil->fetch_assoc()){ ?>
				<div class="col-md-3">

			<div class="col-md-12">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" width="150">
					<div class="caption">
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary btn-sm">Beli</a>
						<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default btn-sm"> Detail</a>
					</div>
				</div>
			</div>
					</div>
		<?php } ?>

		
		</div>
	</div>
	<br>
</section>

</body>
</html>