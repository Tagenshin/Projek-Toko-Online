<?php
session_start();
include 'admin/koneksi.php'
?>
<?php
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' ");
while ($pecah= $ambil->fetch_assoc())
{
  $semuadata[]=$pecah;
}

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <?php include 'asset.php'; ?>
  <title>Pencarian</title>

</head>
<body>

  <?php include 'navbar.php'; ?>
  <br>

  <div class="container">
    <h3>Hasil Pencarian : <?php echo $keyword ?></h3>
    <hr>

    <?php if (empty($semuadata)): ?>
      <div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
    <?php endif ?>

    <div class="row">

      <?php foreach ($semuadata as $key => $value): ?>

        <div class="col-md-3">
          <div class="card mb-4">
            <div class="card border-primary"> 
              <img src="foto_produk/<?php echo $value['foto_produk']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $value['nama_produk']; ?></h5>

                <span class="card-text">Rp. <?php echo number_format($value['harga_produk']); ?></span><br>
                <span class="card-text"> Stok : <?php echo $value['stok_produk']; ?></span>
                <br>
                <br>

                <a href="beli.php?id=<?php echo $value['id_produk']; ?>" 
                  class="btn btn-primary btn-sm" style="width: 45%;"><i class="bi bi-coin"></i> Beli</a>

                  <a href="detail.php?id=<?php echo $value['id_produk']; ?>" 
                    class="btn btn-warning btn-sm" style="width: 45%; "><i class="bi bi-ticket-detailed"></i> Detail</a>

                  </div>
                </div>
              </div>
            </div>

          <?php endforeach ?>

        </div>
      </div>

      <?php include 'footer.php'; ?>

    </body>
    </html>