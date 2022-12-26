<?php
session_start();

include 'admin/koneksi.php';

// jk tidak ada session pelanggan
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
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

	<title>Shintoko</title>

</head>
<body>

	<?php include 'navbar.php'; ?>
	<br>


	<section class="riwayat">
		<div class="container">
			<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
			<hr>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor=1;
				// mendapatkan id pelanggan yg login dari session
					$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

					$ambil = $koneksi->query("SELECT * FROM pembelian where id_pelanggan='$id_pelanggan'");
					while($pecah = $ambil->fetch_assoc())
						{ ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah["tanggal_pembelian"] ?></td>
								<td>
									<?php echo $pecah["status_pembelian"] ?>
									<br>

									<?php if (!empty($pecah['resi_pengiriman'])): ?>
										Resi : <?php echo $pecah['resi_pengiriman']; ?>
									<?php endif ?>

								</td>
								<td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
								<td>

									<?php if ($pecah["status_pembelian"] !== "Batal" ): ?>
										
										<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>"
											class="btn btn-info btn-sm"><i class="bi bi-ticket-detailed"></i> Detail</a>
										<?php endif ?>

										<?php if ($pecah['status_pembelian']=="Pending"): ?>

											<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" 
												class="btn btn-success btn-sm"><i class="bi bi-currency-exchange"></i> Input Pembayaran
											</a>

									<!-- <a href="batalpesan.php?id=<?php echo $pecah["id_pembelian"]; ?>" 
										class="btn btn-danger btn-sm">Batal Pesan
									</a> -->
									<button type="button" onclick="konfirmasiBatal('Anda yakin ingin membatalkan pesanan?', <?php echo $pecah["id_pembelian"]; ?>)" 
										class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i> Batal Pesan</button>
										
									<?php endif ?>

									<?php if ($pecah['status_pembelian']!=="Batal" && $pecah['status_pembelian']!=="Pending"): ?>
										<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" 
											class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Lihat Pembayaran</a>
										<?php endif ?>

										<?php if ($pecah['status_pembelian']=="Barang Dikirim"): ?>
											<button type="button" onclick="konfirmasiPesanan('Anda yakin pesanan sudah diterima?', <?php echo $pecah["id_pembelian"]; ?>)" 
												class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i> selesai</button>
											<?php endif ?>

										</td>
									</tr>

									<?php $nomor++; ?>
								<?php } ?>

							</tbody>
						</table>
						
					</div>
				</section>

				<script>
					const konfirmasiBatal = (pesan, id) => {
						if (confirm(pesan)) {
							location = 'batalpesan.php?id=' + id;
						}else {
							location ='riwayat.php';
						}
					}
				</script>

				<script>
					const konfirmasiPesanan = (pesan, id) => {
						if (confirm(pesan)) {
							location = 'selesai_pesanan.php?id=' + id;
						}else {
							location ='riwayat.php';
						}
					}
				</script>

				<script>
					const konfirmasiHapus = (pesan, id) => {
						if (confirm(pesan)) {
							location = 'hapusriwayat.php?id=' + id;
						}else {
							location ='riwayat.php';
						}
					}
				</script>

				<?php include 'footer.php'; ?>

			</body>
			</html>

