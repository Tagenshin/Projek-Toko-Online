<?php

include '../koneksi.php';
// Require composer autoload
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();


$tgl_mulai = $_GET["tglm"];
$tgl_selesai = $_GET["tgls"];
$status = $_GET["status"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan 
	WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
while ($pecah = $ambil->fetch_assoc())
{
	$semuadata[]=$pecah; 
}

$isi = "<h3 align='center'>Laporan Pembelian ".$status."</h3>";
$isi.= "<h5 align='center'>Mulai Tanggal ".date("d F Y",strtotime($tgl_mulai))." Hingga ".date("d F Y", strtotime($tgl_selesai))."</h5>";
$isi.= "<table align='center' width='700px' border='1' cellpadding='6' cellspacing='0'>";
$isi.= "<t head>";
$isi.= "<tr>
<th>No</th>
<th>Pelanggan</th>
<th>Tanggal</th>
<th>Jumlah</th>
<th>Status</th>
</tr>";
$isi.= "</thead>";
$isi.= "<tbody>";
$total=0; 
foreach ($semuadata as $key => $value): 
	$total+=$value['total_pembelian'];
	$nomor = $key+1; 	
	$isi.= "<tr>";
	$isi.= "<td>".$nomor."</td>";
	$isi.= "<td>".$value["nama_pelanggan"]."</td>";
	$isi.= "<td>".date("d F Y",strtotime($value["tanggal_pembelian"]))."</td>";
	$isi.= "<td>Rp. ".number_format($value["total_pembelian"]).",00</td>";
	$isi.= "<td>".$value["status_pembelian"]."</td>";
	$isi.= "</tr>";

endforeach;
$isi.= "</tbody>";
$isi.= "<tfoot>";
$isi.= "<tr>";
$isi.= "<th colspan='3'>Total</th>";
$isi.= "<th>Rp. ".number_format($total).",00</th>";
$isi.= "<th></th>";
$isi.= "</tr>";
$isi.= "</tfoot>";
$isi.= "</table>";

// // Write some HTML code:
$mpdf->WriteHTML($isi);

// // Output a PDF file directly to the browser
$mpdf->Output("laporan.pdf","I");