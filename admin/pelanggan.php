<h2>Data Pelanggan</h2>
<hr>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Telepon</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $nomor=1; ?>
							<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
							<?php while($pecah=$ambil->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $pecah['nama_pelanggan']; ?></td>
									<td><?php echo $pecah['email_pelanggan']; ?></td>
									<td><?php echo $pecah['telepon_pelanggan']; ?></td>
									<td>
										<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan'];?>" 
											class="btn btn-warning btn-sm"><i class="fa fa-edit "></i> Ubah</a>
											
										<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'];?>" 
										class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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