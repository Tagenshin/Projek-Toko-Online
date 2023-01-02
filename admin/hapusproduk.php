<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$lokasiFileFoto = "../foto_produk/{$pecah['foto_produk']}";

$produk_foto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk ='$_GET[id]'");

if (file_exists($lokasiFileFoto))
{
	unlink($lokasiFileFoto);
	$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

	foreach($produk_foto as $foto) {
		$lokasi_sub_foto = "../foto_produk/{$foto['nama_produk_foto']}";
		if(file_exists($lokasi_sub_foto)){
		  unlink($lokasi_sub_foto);
		  $koneksi->query("DELETE FROM produk_foto WHERE id_produk ='$_GET[id]'");
		}
	  }

	echo "<script>alert('Produk berhasil dihapus');location='index.php?halaman=produk';</script>";
}