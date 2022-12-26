<?php
session_start();
// koneksi ke database
include 'koneksi.php';

if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

function menuActive($halaman)
{
    foreach ($halaman as $key => $value)
    {

        if (isset($_GET['halaman']) && $_GET['halaman']==$value )
        {
          return 'class="active-menu"';
      }
  }
  return null;
}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!-- TABLE STYLES-->
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- jam -->
  <script src="jam.php"></script>


  <style>
    .table-responsive
    {
      min-height: .01% !important;
      overflow-x: auto !important;
  }

</style>



</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="font-size: 25px;">Admin Shintoko</a> 
            </div>

            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"> 
            <?php include 'jam.php'; ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">
                <i class="fa fa-sign-out"></i> Logout</a> 
            </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav menu" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" width="80" />
                    </li>

                    <li>
                        <a href="index.php?halaman=home" 
                        <?php
                        echo menuActive(['home']);
                        ?>
                        ><i class="fa fa-home "></i>Home</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=kategori"
                        <?php
                        echo menuActive(['kategori','tambahkategori','ubahkategori'])
                        ?>
                        ><i class="glyphicon glyphicon-tasks"></i> Kategori</a>
                    </li>

                    <li>
                        <a href="index.php?halaman=produk"
                        <?php
                        echo menuActive(['produk','tambahproduk','ubahproduk','detailproduk']);
                        ?>
                        ><i class="fa fa-th "></i>Produk</a>
                    </li>

                    <li>
                        <a href="index.php?halaman=pembelian" 
                        <?php
                        echo menuActive(['pembelian','detail','ubahstatus','pembayaran'])
                        ?>
                        ><i class="fa fa-list-alt "></i>Pembelian</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=laporan_pembelian"
                        <?php
                        echo menuActive(['laporan_pembelian'])
                        ?>
                        ><i class="fa fa-file "></i>Laporan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pelanggan"
                        <?php
                        echo menuActive(['pelanggan','tambahpelanggan','ubahpelanggan'])
                        ?>
                        ><i class="fa fa-user "></i>Pelanggan</a>
                    </li>
                </ul>
            </div>

        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id ="page-inner">
                <div class="panel-body">
                    <?php
                    if(isset($_GET['halaman']))
                    {
                        if ($_GET['halaman']=="produk")
                        {
                            include 'produk.php';
                        }
                        elseif ($_GET['halaman']=="pembelian")
                        {
                            include 'pembelian.php';
                        }
                        elseif ($_GET['halaman']=="pelanggan")
                        {
                            include 'pelanggan.php';
                        }
                        elseif ($_GET['halaman']=="tambahpelanggan")
                        {
                            include 'tambahpelanggan.php';
                        }
                        elseif ($_GET['halaman']=="ubahpelanggan")
                        {
                            include 'ubahpelanggan.php';
                        }
                        elseif ($_GET['halaman']=="hapuspelanggan")
                        {
                            include 'hapuspelanggan.php';
                        }
                        elseif ($_GET['halaman']=="detail")
                        {
                            include 'detail.php';
                        }
                        elseif ($_GET['halaman']=="tambahproduk")
                        {
                            include 'tambahproduk.php';
                        }
                        elseif ($_GET['halaman']=="ubahproduk")
                        {
                            include 'ubahproduk.php';
                        }
                        elseif ($_GET['halaman']=="hapusproduk")
                        {
                            include 'hapusproduk.php';
                        }
                        elseif ($_GET['halaman']=="logout")
                        {
                            include 'logout.php';
                        }
                        elseif ($_GET['halaman']=="pembayaran")
                        {
                            include 'pembayaran.php';
                        }
                        elseif ($_GET['halaman']=="laporan_pembelian")
                        {
                            include 'laporan_pembelian.php';
                        }
                        elseif ($_GET['halaman']=="kategori")
                        {
                            include 'kategori.php';
                        }
                        elseif ($_GET['halaman']=="detailproduk")
                        {
                            include 'detailproduk.php';
                        }
                        elseif ($_GET['halaman']=="hapusfotoproduk")
                        {
                            include 'hapusfotoproduk.php';
                        }
                        elseif ($_GET['halaman']=="tambahkategori")
                        {
                            include 'tambahkategori.php';
                        }
                        elseif ($_GET['halaman']=="ubahkategori")
                        {
                            include 'ubahkategori.php';
                        }
                        elseif ($_GET['halaman']=="hapuskategori")
                        {
                            include 'hapuskategori.php';
                        }
                        elseif ($_GET['halaman']=="ubahstatus")
                        {
                            include 'ubahstatus.php';
                        }
                        elseif ($_GET['halaman']=="home")
                        {
                            include 'home.php';
                        }
                        elseif ($_GET['halaman']=="hapuspembelian")
                        {
                            include 'hapuspembelian.php';
                        }
                    }
                    else
                    {
                        include 'home.php';
                    }
                    ?>

                </div>
            </div>
            <!-- page inner -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->


    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
