<h2>Data Pembelian</h2>
<hr>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Pelanggan</th>
								<th>Tanggal</th>
								<th>Status Pembelian</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $nomor=1; ?>
							<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
							<?php while($pecah=$ambil->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $pecah['nama_pelanggan']; ?></td>
									<td><?php echo date("d F Y",strtotime($pecah['tanggal_pembelian'])); ?></td>
									<td><?php echo $pecah['status_pembelian'] ; ?></td>
									<td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
									<td>
										<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'] ?>" 
											class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>

										<?php if ($pecah['status_pembelian']=="Sudah Kirim Pembayaran" ): ?>
											<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" 
												class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-usd"></i> Pembayaran</a>
										<?php else: ?>
											<a href="index.php?halaman=ubahstatus&id=<?php echo $pecah['id_pembelian'] ?>"
											class="btn btn-warning btn-sm">Ubah Status</a>
										<?php endif ?>

										

									</td>
								</tr>
								<?php $nomor++; ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>