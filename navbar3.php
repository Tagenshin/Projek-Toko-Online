	<!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <!-- <link href="admin/assets/css/custom.css" rel="stylesheet" /> -->
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!-- navbar -->
<!-- <header class="p-4 text-bg-dark"> -->
<!-- <nav class="navbar navbar-collapse" role="navigation"> -->
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<ul class="nav nav-pills">
			<!-- <p class="nav navbar-text" style="color:darkgreen;">ShinToko</p> -->
			<li>
				<a href="index.php" class="btn btn-outline-light" style="color:orange;">ShinToko</a>
			</li>
			<li>
				<a href="checkout.php" class="btn btn-outline-light" style="color:orange;">Checkout</a>
			</li>

		<ul class="nav nav-pills navbar-right" role="tablist">
			<!-- keranjang -->
	<button class="btn btn-default " type="button">
		<a style="text-decoration:none" href="keranjang.php">
			<i class="fa fa-shopping-cart mr-sm-2" style="color:green; font-size: 18px;"></i>
			<span class="badge">	
			<?php if (isset($_SESSION['keranjang'])) : ?>
                <?= array_sum($_SESSION['keranjang']) ?>
              <?php else : ?>
               0
              <?php endif; ?>
			</span>
		</a>
	</button>
			<!-- jk sudah login (ada session pelanggan) -->
			<?php if (isset($_SESSION["pelanggan"])): ?>
				<a href="logout.php"><button type="button" class="btn btn-danger navbar-btn"><i class="glyphicon glyphicon-log-out"></i> Logout</button></a>
			<!-- selainitu(blm login||blm ada pelanggan)  -->
			<?php else: ?>
				<a href="login.php">
					<button type="button" class="btn btn-default navbar-btn">
						<i class="glyphicon glyphicon-log-in"></i> Masuk</button>
				</a>
				<a href="daftar.php">
					<button type="button" class="btn btn-success navbar-btn">Daftar</button>
				</a>
			<?php endif ?>
		
		</ul>
      	</ul>
	</div>	
</nav>
<!-- </header> -->
