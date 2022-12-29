<?php 
session_start();
include 'admin/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'asset.php'; ?>
  <title>Shintoko</title>

</head>
<body>

  <?php include 'navbar.php'; ?>

  <div class="panel-body"></div>
  <div class="container">
    <br>
    <h1>Produk Terbaru</h1>
    <hr>
    <div class="row">
      <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
      <?php while($perproduk=$ambil->fetch_assoc()){ ?>

        <div class="col-md-3">
          <div class="card mb-4">
            <div class="card border-primary"> 
              <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
                <span class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']); ?></span><br>
                <span class="card-text"> Stok : <?php echo $perproduk['stok_produk']; ?></span>
                <br>
                <br>

                <!-- tombol -->
                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" 
                  class="btn btn-primary btn-sm" style="width: 45%;"><i class="bi bi-coin"></i> Beli</a>

                  <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" 
                    class="btn btn-warning btn-sm" style="width: 45%; "><i class="bi bi-ticket-detailed"></i> Detail</a>

                  </div>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  -->
  <?php include 'footer.php'; ?>
  
</body>
</html>

