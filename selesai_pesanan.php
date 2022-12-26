<?php
session_start();
include 'admin/koneksi.php';

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem' ");
$pecah = $ambil->fetch_assoc();

if ($pecah['status_pembelian']=="Barang Dikirim")
{

	$koneksi->query("UPDATE pembelian SET status_pembelian='Barang Sudah Sampai' WHERE id_pembelian='$idpem' ");

	header("Location: riwayat.php");
	exit();
}

?>