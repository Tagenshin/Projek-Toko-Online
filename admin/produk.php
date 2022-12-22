<h2>Data Produk</h2> 
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTables-example" >
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Berat</th>
								<th>Foto</th>
								<th>Stok</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php $nomor=1; ?>
							<?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori 
							ON produk.id_kategori=kategori.id_kategori");?>

							<?php while ($pecah = $ambil->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $pecah["nama_kategori"]; ?></td>
									<td><?php echo $pecah['nama_produk']; ?></td>
									<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
									<td><?php echo $pecah['berat_produk']; ?></td>
									<td>
										<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
									</td>
									<td><?php echo $pecah['stok_produk']; ?></td>

									<td>
										<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" 
											class="btn-warning btn btn-sm" title="Edit"><i class="fa fa-edit "></i> </a>

										<a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk'];?>" 
											class="btn btn-primary btn-sm" title="Detail"><i class="glyphicon glyphicon-eye-open"></i> </a>

										<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" 
											class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i> </a>

									</td>
								</tr>
								<?php $nomor++; ?>
							<?php } ?>

						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>



