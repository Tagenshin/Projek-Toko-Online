<h2>Selamat Datang <?php echo $_SESSION['admin']["nama_lengkap"]; ?></h2>
<hr>
<?php include 'koneksi.php' ?>


<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">           
     <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-red set-icon">
            <i class="fa fa-th"></i>
        </span>
        <div class="text-box" >
            <p class="main-text">
                <?php
                $ambil=$koneksi->query("SELECT count(id_produk) as 'jumlah' from produk");
                $pecah=$ambil->fetch_assoc();
                echo $pecah['jumlah'];
            ?> Produk
        </p>
        <p class="text-muted"></p>
    </div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">           
 <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
        <i class="fa fa-list-alt "></i>
    </span>
    <div class="text-box" >
        <p class="main-text">
         <?php
         $ambil=$koneksi->query("SELECT count(id_pembelian) as 'jumlah' from pembelian");
         $pecah=$ambil->fetch_assoc();
         echo $pecah['jumlah'];
        ?> Pembelian
        </p>
 <p class="text-muted"></p>
</div>
</div>
</div>

<div class="col-md-4 col-sm-6 col-xs-6">           
 <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="fa fa-user"></i>
    </span>
    <div class="text-box" >
        <p class="main-text">
           <?php
           $ambil=$koneksi->query("SELECT count(id_pelanggan) as 'jumlah' from pelanggan");
           $pecah=$ambil->fetch_assoc();
           echo $pecah['jumlah'];
           ?> Pelanggan
        </p>
   <p class="text-muted"></p>
</div>
</div>
</div>