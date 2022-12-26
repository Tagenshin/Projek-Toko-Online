<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc())
{
	$datakategori[] = $tiap;
}

?>

<h2>Tambah Produk</h2>
<hr>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori" required>
			<option value="">Pilih Kategori</option>

			<?php foreach ($datakategori as $key => $value): ?>
				<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
			<?php endforeach ?>
		
		</select>
	</div>
	<div class="form-group">
		<label for="">Nama Produk</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label for="">Harga Produk (Rp)</label>
		<input type="number" class="form-control" name="harga" required>
	</div>
	<div class="form-group">
		<label for="">Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" required>
	</div>
	<div class="form-group">
		<label for="">Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="">Foto</label>

		<div class="letak-input" style="margin-bottom: 10px; width: 40%;">
			<input type="file" class="form-control" name="foto[]" required>
			
		</div>
		<!-- <span class="btn btn-primary btn-tambah btn-sm">
			<i class="fa fa-plus"></i>
		</span> -->
	</div>

	<div id="foto">

    </div>
        <button type="button" class="btn btn-primary btn-sm" id="tambahfoto" style="margin-bottom: 10px; margin-top: 10px;"><i class="fa fa-plus"></i></button>

	<div class="form-group">
		<label for="">Stok</label>
		<input type="number" class="form-control" name="stok" required min="0">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save']))
{
	$namanamafoto = $_FILES['foto']['name'];
	$lokasilokasifoto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasilokasifoto[0], "../foto_produk/".$namanamafoto[0]);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,id_kategori)
		VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$namanamafoto[0]','$_POST[deskripsi]','$_POST[stok]','$_POST[id_kategori]')");

	// mendapatkan id_produk
	$id_produk_barusan = $koneksi->insert_id;

	foreach ($namanamafoto as $key => $tiap_nama)
	{
		$tiap_lokasi = $lokasilokasifoto[$key];

		move_uploaded_file($tiap_lokasi, "../foto_produk/".$tiap_nama);
	  // simpan ke mysql(prlu tau id produk)
		$koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$id_produk_barusan','$tiap_nama') ");
	}



	echo "<div class='alert alert-info' style='margin-top:10px;'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	
	// var_dump($_FILES["foto"]);
}
?>

<script>
	// $(document).ready(function(){
	// 	$(".btn-tambah").on("click",function(){
	// 		$(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
	// 		// $(".letak-input").append("<span class='btn btn-danger btn-sm' name='hapus'><i class='glyphicon glyphicon-trash'></i></span>");

	// 	})
	// })

	$('document').ready(function() {
    let i = 1;
    $('#tambahfoto').click(function() {

      if (i <= 3) {
        $('#foto').append(`
      <div class="form-inline">
      <div class="form-group">
      <label class='sr-only' for="">c</label>
      <input type="file" class="form-control mt-2" name="foto[]" required></div>
      <div class="form-group"> 
      <label class="sr-only" for=""></label>
      <button type="button" class="btn btn-danger mt-2"><i class="glyphicon glyphicon-trash"></i></button>
      </div>
      </div>`);
        i += 1;

      }


    })

    $('#foto').click(function(e) {
      const target = $(e.target);

      if (target.is('button') || target.is('.glyphicon-trash')) {
        i -= 1;
        target.parents('.form-inline').remove();
      }

    })
  })
</script>

