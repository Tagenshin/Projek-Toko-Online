<?php 
session_start();
include 'admin/koneksi.php';

// jk tidak ada session pelanggan(blm login), mk dilarikan ke login
if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan login'); location='login.php';</script>";
}elseif (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Tidak ada barang checkout, silahkan belanja dulu'); location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'asset.php'; ?>
	<title>checkout</title>
</head>
<body>

	<?php include 'navbar.php'; ?>
	<br>

	<section class="kontent">
		<div class="container">
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
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $totalberat=0; ?>
					<?php $totalbelanja = 0; ?>

					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
						<!-- menampilkan produk yg sedang di perlukan berdasarkan id_produk -->
						<?php
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["harga_produk"]*$jumlah;
						// subberat diperoleh dari berat produk x jumlah
						$subberat = $pecah["berat_produk"] * $jumlah;
						// total berat
						$totalberat+=$subberat;


						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_produk"]; ?></td>
							<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
							<td><?php echo $jumlah; ?></td>
							<td>Rp. <?php echo number_format($subharga); ?></td>
						</tr>
						<?php $nomor++; ?>
						<?php $totalbelanja+=$subharga ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total harga</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					</tr>
				</tfoot>
			</table>

			<form method="post">

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Nomor Telpn</label>
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
						</div>
					</div>
					
				</div>
				<div class="form-group">
					<label>Alamat Lengkap Pengiriman</label>
					<textarea class="form-control" name="alamat_pengiriman" cols="30" rows="3" required><?php echo $_SESSION["pelanggan"]['alamat_pelanggan'] ?></textarea>
				</div>
				<!-- ongkir -->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Provinsi</label>
							<select class="form-control" name="nama_provinsi" required>
								
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Distrik</label>
							<select class="form-control" name="nama_distrik" required>
								
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Ekspedisi</label>
							<select class="form-control" name="nama_ekspedisi" required>

							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Paket</label>
							<select class="form-control" name="nama_paket" required>
								
							</select>
						</div>
					</div>
				</div>
				<br>
				<input type="text" name="total_berat" value="<?php echo $totalberat ?>" readonly>
				<input type="text" name="provinsi" placeholder="Provinsi"readonly>
				<input type="text" name="distrik" placeholder="Distrik"readonly>
				<input type="text" name="tipe" placeholder="Tipe Distrik"readonly>
				<input type="text" name="kodepos" placeholder="KodePos"readonly>
				<input type="text" name="ekspedisi" placeholder="Ekspedisi"readonly>
				<input type="text" name="paket" placeholder="Paket"readonly>
				<input type="text" name="ongkir" placeholder="Ongkir"readonly>
				<input type="text" name="estimasi" placeholder="Estimasi"readonly>
				<br>
				<br>

				<!-- TOMBOL -->
				<button class="btn btn-primary" name="checkout">
					<i class="bi bi-cart-check"></i> Checkout
				</button>

			</form>
			<br>
			<br>

			<?php
			if (isset($_POST["checkout"]))
			{
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$tanggal_pembelian = date("y-m-d");
				$alamat_pengiriman = $_POST['alamat_pengiriman'];

				$totalberat = $_POST["total_berat"];
				$provinsi = $_POST["provinsi"];
				$distrik = $_POST["distrik"];
				$tipe = $_POST["tipe"];
				$kodepos = $_POST["kodepos"];
				$ekspedisi = $_POST["ekspedisi"];
				$paket = $_POST["paket"];
				$ongkir = $_POST["ongkir"];
				$estimasi = $_POST["estimasi"];

				$total_pembelian = $totalbelanja + $ongkir;

				

			// menyimpan data ke tabel pembelian
				$koneksi->query("INSERT INTO pembelian 
					(id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pengiriman,totalberat,provinsi,distrik,tipe,kodepos,ekspedisi,paket,ongkir,estimasi) 
					VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman','$totalberat','$provinsi','$distrik','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi') ");

			// mendapatkan id pembelian barusan terjadi
				$id_pembelian_barusan = $koneksi->insert_id;

				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
				{
				// mendapatkan data produk berdasarkan id produk
					$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					
					$perproduk = $ambil->fetch_assoc();

					$nama = $perproduk['nama_produk'];
					$harga = $perproduk['harga_produk'];
					$berat = $perproduk['berat_produk'];

					// stok produk
					$stoksekarang = $perproduk["stok_produk"]-$jumlah;

					if ($jumlah > $perproduk["stok_produk"])
					{
						echo "<script>alert('Stok produk tidak mencukupi');</script>";
						echo "<script>location='keranjang.php';</script>";
						exit();
					}

					$koneksi->query("UPDATE produk SET stok_produk='$stoksekarang' WHERE id_produk='$id_produk' ");

					$subberat = $perproduk['berat_produk']*$jumlah;
					$subharga = $perproduk['harga_produk']*$jumlah;
					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah') ");
				}

			// kosongkan keranjang
				unset($_SESSION["keranjang"]);

				echo "<script>alert('Pembelian sukses');</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
				
			}
			?>

		</div>
	</section>

	<?php include 'footer.php'; ?>

</body>
</html>

<script src="admin/assets/js/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$.ajax({
			type:'post',
			url:'dataprovinsi.php',
			success:function(hasil_provinsi)
			{
				$("select[name=nama_provinsi]").html(hasil_provinsi);
			}
		});

		$("select[name=nama_provinsi]").on("change",function(){
				// ambil id provinsi yg dipilih
			var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
			$.ajax({
				type:'post',
				url:'datadistrik.php',
				data:'id_provinsi='+id_provinsi_terpilih,
				success:function(hasil_distrik)
				{
					$("select[name=nama_distrik]").html(hasil_distrik);
				}
			});
		});

		$.ajax({
			type:'post',
			url:'dataekspedisi.php',
			success:function(hasil_ekspedisi)
			{
				$("select[name=nama_ekspedisi").html(hasil_ekspedisi);
			}
		});

		$("select[name=nama_ekspedisi]").on("change",function(){
				// mendapatkan data ongkir

				// mendapatkan ekspedisi yg dipilh
			var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
				// mendapatkan id_distrik yang dipilih
			var distrik_terpilih = $("option:selected","select[name=nama_distrik]").attr("id_distrik");
				// mendapatkan total berat dari inputan
			var total_berat = $("input[name=total_berat]").val();
			$.ajax({
				type:'post',
				url:'datapaket.php',
				data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
				success:function(hasil_paket)
				{
						// console.log(hasil_paket);
					$("select[name=nama_paket]").html(hasil_paket);

						// letakan nama ekspedisi terpilih di input ekspedisi
					$("input[name=ekspedisi]").val(ekspedisi_terpilih);

				}
			})
		});

		$("select[name=nama_distrik]").on("change",function(){
			var prov = $("option:selected",this).attr("nama_provinsi");
			var dist = $("option:selected",this).attr("nama_distrik");
			var tipe = $("option:selected",this).attr("tipe_distrik");
			var kodepos = $("option:selected",this).attr("kodepos");

			$("input[name=provinsi]").val(prov);
			$("input[name=distrik]").val(dist);
			$("input[name=tipe]").val(tipe);
			$("input[name=kodepos]").val(kodepos);
		});

		$("select[name=nama_paket]").on("change",function(){
			var paket = $("option:selected",this).attr("paket");
			var ongkir = $("option:selected",this).attr("ongkir");
			var etd = $("option:selected",this).attr("etd");

			$("input[name=paket]").val(paket);
			$("input[name=ongkir]").val(ongkir);
			$("input[name=estimasi]").val(etd);
		})
	});
</script>

