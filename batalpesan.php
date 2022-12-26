<?php
session_start();
include 'admin/koneksi.php';

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem' ");
$pecah = $ambil->fetch_assoc();

if ($pecah['status_pembelian']=="Pending")
{
	$koneksi->query("UPDATE pembelian SET status_pembelian='Batal' WHERE id_pembelian='$idpem' ");

	echo "<script>alert('Pesanan dibatalkan'); location='riwayat.php';</script>";
	exit();
}

?>