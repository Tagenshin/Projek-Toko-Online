<h2>Detail Pembelian</h2>
<hr>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-3">
		<table class="table">
			<h3>Pembelian</h3>
			<tr>
				<td>Tanggal</td>
				<td> : </td>
				<td><?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])); ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td> : </td>
				<td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
			</tr>
			<tr>
				<td>Status</td>	
				<td> : </td>	
				<td><?php echo $detail["status_pembelian"]; ?></td>	
			</tr>
		</table>
	</div>

	<div class="col-md-4">
		<table class="table">
			<h3>Pelanggan</h3>
			<tr>
				<td>Nama</td>
				<td> : </td>
				<td><?php echo $detail ['nama_pelanggan']; ?></td>
			</tr>
			<tr>
				<td>Telepon Pelanggan</td>
				<td> : </td>
				<td><?php echo $detail['telepon_pelanggan']; ?></td>
			</tr>
			<tr>
				<td>Email Pelanggan</td>
				<td> : </td>
				<td><?php echo $detail['email_pelanggan']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-5">
		<table class="table">
			<h3>Pengiriman</h3>
			<tr>
				<td>Kota</td>	
				<td> : </td>	
				<td>
					<?php echo $detail ['tipe']; ?>
					<?php echo $detail ['distrik']; ?>
					<?php echo $detail ['provinsi']; ?>	
				</td>	
			</tr>
			<tr>
				<td>Tarif</td>	
				<td> : </td>	
				<td>Rp. <?php echo number_format($detail["ongkir"]); ?></td>
			</tr>
			<tr>
				<td>Ekpedisi</td>	
				<td> : </td>	
				<td>
					<?php echo $detail["ekspedisi"] ?>
					<?php echo $detail["paket"] ?>
					<?php echo $detail["estimasi"] ?>	
				</td>	
			</tr>
			<tr>
				<td>Alamat</td>	
				<td> : </td>	
				<td><?php echo $detail["alamat_pengiriman"]; ?></td>	
			</tr>
		</table>
	</div>
	

	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian ='$_GET[id]'"); ?>
				<?php while($pecah=$ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $pecah['jumlah']; ?></td>
						<td>
							Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>

	</div>
</div>
