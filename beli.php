<?php
session_start();
// mendapatkan id produk dari url
$id_produk = $_GET['id'];

include 'admin/koneksi.php';

// ambil stok
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

if ($detail["stok_produk"]==0)
{
	echo "<script>alert('Stok Habis');</script>";
	echo "<script>location='index.php';</script>";
	exit();
}


// jk sudah ada produk itu di keranjang, maka produk itu jumlahnya +1

if (isset($_SESSION['keranjang'][$id_produk]))
{
	$stok_keranjang = $_SESSION['keranjang'][$id_produk];
	$stok_sekarang = $stok_keranjang+1;
	if ($stok_sekarang>$detail["stok_produk"])
	{
		echo "<script>alert('Barang dikeranjang melebihi stok');</script>";
		echo "<script>location='index.php';</script>";
		exit();
	}
	$_SESSION['keranjang'][$id_produk]+=1;
	
}

// selain itu (blm ada di keranjang), mk produk itu dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}

// larilah ke halaman keranjang
echo "<script>alert('Produk telah masuk ke keranjang belanja')</script>";
echo "<script>location='keranjang.php'</script>";

?>