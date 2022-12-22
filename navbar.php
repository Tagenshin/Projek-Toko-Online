    <!-- <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
        <!-- CUSTOM STYLES-->
    <!-- <link href="admin/assets/css/custom.css" rel="stylesheet" /> -->
     <!-- GOOGLE FONTS-->
   <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->

  <link rel="stylesheet" href="assets2/css/bootstrap.css">
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand disabled"><i class="bi bi-shop"></i> ShinToko</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php"><i class="bi bi-house-door"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php"><i class="bi bi-bag-check"></i> Checkout</a>
      </li>
      <?php if (isset($_SESSION["pelanggan"])): ?>
      <li class="nav-item">
        <a class="nav-link" href="riwayat.php"><i class="bi bi-hourglass"></i> Riwayat Belanja</a>
      </li>
      <?php endif ?>
    </ul>

    <form action="pencarian.php" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk" aria-label="Cari" name="keyword">
      <button class="btn btn-primary my-2 my-sm-0 mr-sm-2" type="submit"><i class="bi bi-search"></i> Cari</button>
    </form>

<form class="form-inline my-2 my-lg-0">
<!-- keranjang -->
<a href="keranjang.php">
  <button class="btn btn-outline-warning mr-sm-2" type="button" title="Keranjang">
      <i class="fa fa-shopping-cart"></i>
      <span class="badge badge-light">  
      <?php if (isset($_SESSION['keranjang'])) : ?>
                <?= array_sum($_SESSION['keranjang']) ?>
              <?php else : ?>
               0
              <?php endif; ?>
      </span>
  </button>
</a>

  <!-- jk sudah login (ada session pelanggan) -->
      <?php if (isset($_SESSION["pelanggan"])): ?>
        <a href="logout.php"><button type="button" class="btn btn-outline-danger mr-sm-2">
          <i class="bi bi-box-arrow-left"></i> Logout</button></a>

      <!-- selainitu(blm login||blm ada pelanggan)  -->
      <?php else: ?>
        <a href="login.php">
          <button type="button" class="btn btn-outline-success mr-sm-2">
            <i class="bi bi-box-arrow-in-right"></i> Login</button>
        </a>

        <a href="daftar.php">
          <button type="button" class="btn btn-warning my-2 my-sm-0"><i class="bi bi-person-lines-fill"></i> Daftar</button>
        </a>
      <?php endif ?>
    </form>
  </div>
</nav>