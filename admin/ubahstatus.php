<h3>Ubah Status Pembelian</h3>
<hr>


<?php
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]' ");
$pecah = $ambil->fetch_assoc();

?>

<div class="row">	
	<div class="col-md-6">
<form method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Status Pembelian</label>
		<select name="status" class="form-control" required>
			<option value=""><?php echo $pecah["status_pembelian"]; ?></option>
			<option value="Barang Sudah Sampai">Barang Sudah Sampai</option>
			<option value="Lunas">Lunas</option>
			<option value="Batal">Batal</option>
		</select>		
	</div>
	<button class="btn btn-success btn-sm" name="simpan">Simpan</button>
	
</form>
</div>
	</div>

<?php

if (isset($_POST['simpan']))
{
	$koneksi->query("UPDATE pembelian SET status_pembelian='$_POST[status]' WHERE id_pembelian='$_GET[id]'");


	echo "<div class='alert alert-info' style='margin-top:10px; width:20%;'>Data Telah Diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";
}
?>