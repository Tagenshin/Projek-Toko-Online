<!DOCTYPE html>
<html>
<head>
  <title>nav</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
<header class="p-2 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-start justify-content-center justify-content-lg-start">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white px-4 fs-4 text-decoration-none">
          <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg> -->
          Meta Komputer
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <div class="text-end">
          <a href="keranjang.php" class="btn btn-primary position-relative me-4">
            <i class="fa-solid fa-bag-shopping fa"></i> Keranjang
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php if (isset($_SESSION['keranjang'])) : ?>
                <?= array_sum($_SESSION['keranjang']) ?>
              <?php else : ?>
                0
              <?php endif; ?>
            </span>
          </a>
          <?php if (!isset($_SESSION['pelanggan'])) : ?>
            <a href="login.php" class="btn btn-outline-light me-2">Login</a>
            <a href="daftar.php" class="btn btn-warning">Daftar</a>
          <?php else : ?>
            <a href="logout.php" class="btn btn-outline-light me-2">Logout</a>
          <?php endif ?>

        </div>
      </div>
    </div>
  </header>

</body>
</html>