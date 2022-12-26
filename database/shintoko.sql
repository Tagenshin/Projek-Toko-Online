-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shintoko
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'teamshin.com','teamshin.com','shinmura'),(2,'admin','admin','Trio Anggoro');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Handphone'),(2,'Laptop'),(4,'Aksesoris');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ongkir`
--

DROP TABLE IF EXISTS `ongkir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ongkir`
--

LOCK TABLES `ongkir` WRITE;
/*!40000 ALTER TABLE `ongkir` DISABLE KEYS */;
INSERT INTO `ongkir` VALUES (1,'Demak',20000),(2,'Cirebon',25000);
/*!40000 ALTER TABLE `ongkir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (1,'trioanggoro12345@gmail.com','trio','Trio Anggoro','082269441949','Dwijaya'),(2,'riska@gmail.com','riska','Riska Luviana','082269241988','Lubuk Linggau'),(3,'shin@gmail.com','shin','shin','082268559866','Dwijaya'),(4,'trio@gmail.com','trio','Trio','082298977995','Dwijaya'),(5,'triaanggara09@gmail.com','trio','Tria Anggara','082269441948','Dusun 2 Dwijaya');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (2,5,'shin','bri',8607000,'2022-11-27','20221127081848download.jpg'),(3,6,'Shin','BRI',8619998,'2022-11-30','20221130032858download.jpg'),(4,8,'Trio','BRI',5880000,'2022-12-15','20221215035952Bukti.jpg'),(5,15,'Trio','Bri',19901000,'2022-12-16','20221216135917Bukti.jpg');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` VALUES (1,2,'2022-11-18',5998000,'Dwijaya','Pending','',0,'','','','','','',0,''),(2,2,'2022-11-18',8802000,'cirebon','Pending','',0,'','','','','','',0,''),(3,2,'2022-11-18',2989000,'cirebon','Pending','',0,'','','','','','',0,''),(4,2,'2022-11-18',3009000,'Demak','Pending','',0,'','','','','','',0,''),(5,3,'2022-11-21',8607000,'demak','Barang Sudah Sampai','ABC123',0,'','','','','','',0,''),(6,3,'2022-11-27',8619998,'dwijaya','Barang Sudah Sampai','ABC124',0,'','','','','','',0,''),(7,2,'2022-12-09',6080000,'					Dwijaya','Pending','',2000,'Sumatera Selatan','Lubuk Linggau','Kota','31614','jne','REG',102000,'4-5'),(8,3,'2022-12-09',5880000,'Dwijaya','Barang Sudah Sampai','ABC125',2000,'Sumatera Selatan','Musi Rawas','Kabupaten','31661','jne','OKE',92000,'7-8'),(9,3,'2022-12-14',6080000,'dwijya','Batal','',2000,'Sumatera Selatan','Musi Rawas','Kabupaten','31661','jne','REG',102000,'4-5'),(10,3,'2022-12-14',15180000,'Dwijaya','Batal','',5000,'Kalimantan Barat','Kapuas Hulu','Kabupaten','78719','jne','REG',235000,'3-5'),(12,3,'2022-12-14',11400000,'Dwijaya','Batal','',4000,'Sumatera Selatan','Musi Rawas','Kabupaten','31661','jne','REG',204000,'4-5'),(13,3,'2022-12-15',4333999,'Dwijaya','Batal','',500,'Bali','Badung','Kabupaten','80351','jne','REG',34000,'3-4'),(14,3,'2022-12-15',4333999,'Dwijaya','Batal','',500,'Bali','Badung','Kabupaten','80351','jne','REG',34000,'3-4'),(15,3,'2022-12-15',19901000,'Dwijaya','Barang Dikirim','123ABD',900,'Sumatera Selatan','Musi Rawas','Kabupaten','31661','jne','REG',51000,'4-5'),(16,3,'2022-12-16',11850999,'Dwijaya','Batal','',1000,'Sumatera Selatan','Musi Rawas','Kabupaten','31661','jne','REG',51000,'4-5'),(17,3,'2022-12-16',2020510,'Dwijaya','Pending','',2000,'Sumatera Selatan','Musi Rawas','Kabupaten','31661','jne','REG',102000,'4-5');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian_produk`
--

DROP TABLE IF EXISTS `pembelian_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian_produk`
--

LOCK TABLES `pembelian_produk` WRITE;
/*!40000 ALTER TABLE `pembelian_produk` DISABLE KEYS */;
INSERT INTO `pembelian_produk` VALUES (1,1,1,2,'Realme 10 8+128GB (Chipset Helio G99 | Layar Super AMOLED - Putih',2989000,1000,2000,5978000),(2,2,1,2,'Realme 10 8+128GB (Chipset Helio G99 | Layar Super AMOLED - Putih',2989000,1000,2000,5978000),(3,2,2,1,'REALME 10 8/128GB 4/128GB GARANSI RESMI REALME INDONESIA - 4/128GB',2799000,1000,1000,2799000),(4,3,1,1,'Realme 10 8+128GB (Chipset Helio G99 | Layar Super AMOLED - Putih',2989000,1000,1000,2989000),(5,4,1,1,'Realme 10 8+128GB (Chipset Helio G99 | Layar Super AMOLED - Putih',2989000,1000,1000,2989000),(6,5,1,1,'Realme 10 8+128GB (Chipset Helio G99 | Layar Super AMOLED - Putih',2989000,1000,1000,2989000),(7,5,2,2,'REALME 10 8/128GB 4/128GB GARANSI RESMI REALME INDONESIA - 4/128GB',2799000,1000,2000,5598000),(8,6,3,2,'Iphone Xr 64 Gb 128 Gb 256 Gb Inter Second Like New - 64 Gb',4299999,500,1000,8599998),(9,7,1,2,'Realme 10 8+128GB (Chipset Helio G99)',2989000,1000,2000,5978000),(10,8,1,1,'Realme 10 8+128GB (Chipset Helio G99)',2989000,1000,1000,2989000),(11,8,2,1,'REALME 10 8/128GB 4/128GB',2799000,1000,1000,2799000),(12,9,1,2,'Realme 10 8+128GB (Chipset Helio G99)',2989000,1000,2000,5978000),(13,10,1,5,'Realme 10 8+128GB (Chipset Helio G99)',2989000,1000,5000,14945000),(14,12,2,4,'REALME 10 8/128GB 4/128GB',2799000,1000,4000,11196000),(15,13,3,1,'Iphone Xr 64 Gb 128 Gb',4299999,500,500,4299999),(16,14,3,1,'Iphone Xr 64 Gb 128 Gb',4299999,500,500,4299999),(17,15,4,1,'Apple iPhone 14 Pro 5G 1TB',19850000,900,900,19850000),(18,16,6,1,'iPhone 12 64 GB 128 GB',11799999,1000,1000,11799999),(19,17,9,1,'Laptop Murah Samsung Chromebook',1918510,2000,2000,1918510);
/*!40000 ALTER TABLE `pembelian_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (1,1,'Realme 10 8+128GB (Chipset Helio G99)',2989000,1000,'realme 10.jpg','Spesifikasi: <br>\r\nChipset Helio G99 Layar Super AMOLED 90Hz<br>\r\nRasio Layar-ke-Tubuh 90,8%.<br>\r\nCorning Gorilla Glass5<br>\r\n7.95mm Ultra-slim 5000mAh Baterai Besar<br>\r\n33W SUPERVOOC Mengisi Kamera Al Warna 50MP<br>\r\n200% Pembicara UltraBoom<br>\r\nKamera Swafoto 16MP<br>\r\nHingga 1TB Memori Eksternal Pemindai Sidik Jari yang dipasang di samping realme UI 3.0 (Berdasarkan Android 12) Kualitas Nyata',0),(2,1,'REALME 10 8/128GB 4/128GB',2799000,1000,'realme.png','REALME 10 GARANSI RESMI REALME<br>\r\nBeli Sekarang dan Dapatkan 24 Item EXCLUSIVE BONUS<br><br>\r\n\r\nREADY STOK !!!<br><br>\r\n\r\nVarian :<br>\r\n- RAM 4/128GB<br>\r\n- RAM 8/128GB<br>',1),(3,1,'Iphone Xr 64 Gb 128 Gb',4299999,500,'iphone xr.png','Kondisi: Bekas <br>\r\nBerat Satuan: 500 g<br>\r\nKategori: iOS<br>\r\nEtalase: Iphone murah<br>',3),(4,1,'Apple iPhone 14 Pro 5G 1TB',19850000,900,'iphone 12 pro.jpg','Kondisi: Baru <br>\r\nBerat Satuan: 900 g<br>\r\nKategori: iOS<br>\r\nEtalase: Apple iPhone 14 Series<br>\r\nKatalog: Apple iPhone 14 Pro<br>',4),(6,1,'iPhone 12 64 GB 128 GB',11799999,1000,'iphone 12.jpg','Product: iPhone 12 (IDN)<br>\r\nNetwork: 5G<br>\r\nColour: Purple, Blue, Green, Red, White, Black<br>\r\nStorage: 64 GB, 128 GB, 256 GB<br>',4),(7,1,'Case iPhone 12 Pro Max',180002,150,'case iphone 12 pro.jpg','Case iPhone 12 Series Spigen Ultra Hybrid merupakan Hybrid case yang terbuat dari bahan PC (Hardcase) yang bening transparan pada bagian belakang case, dan TPU (Softcase) pada bagian bumper samping yang berfungsi sebagai anti-shock. Lindungi Smartphone dengan Spigen Ultra Hybrid',5),(8,2,'LAPTOP DELL LATITUDE 4300',1300000,2300,'laptop del2l.jpg','SPESIFIKASI:<br><br>\r\n\r\nPROCESSOR INTEL CORE 2 DUO<br>\r\nRAM 2/4GB<br>\r\nHARDISK HDD 160GB// 500GB<br>\r\nVGA ONBOARD INTEL GRAPHIC HD<br>\r\nWIFI CONNECTION<br>\r\nDVD-RW<br>\r\nWEBCAM READY<br>\r\nUSB/LAN PORT<br>\r\nMS OFFICE INSTALLED<br>\r\nOS WINDOWS INSTALLED<br>',5),(9,2,'Laptop Murah Samsung Chromebook',1918510,2000,'laptop samsung.jpg','SPESIFIKASI<br><br>\r\n\r\nProcessor: Intel® Celeron® Processor N4020 (1.10 Ghz up to 2.70 Ghz 4 MB L2 Cache)<br>\r\nMemory: 4 GB LPDDR4 Memory (On BD 4 GB)<br>\r\nStorage: 32 GB e.MMC<br>\r\nGraphic: Intel® UHD Graphics 600<br>\r\nDisplay: 11.6\" HD LED Display (1366 x 768), Anti-Reflective<br>\r\nOperating System: Chrome OS<br>',4),(10,2,'MacBook Air 2022 M2 Chip 13',17525000,3000,'macbook air.jpg','Spesifikasi :<br>\r\nApple M2 chip<br>\r\n8-core GPU (256GB)<br>\r\n10-Core GPU (512GB)<br>\r\nLiquid Retina display<br>\r\nTwo Thunderbolt / USB 4 ports<br>\r\n8GB unified memory<br>',5),(11,2,'ASUS VIVOBOOK 15',5499000,4000,'asus vivobook.jpg','Spesifikasi :<br>\r\n• Processor : Intel® Core™ i3-1005G1 Processor 1.2 GHz (4M Cache, up to 3.4 GHz, 2 cores)<br>\r\n• Intergrated GPU : Intel® UHD Graphics<br>\r\n• Memory : 4GB DDR4 on board<br>\r\n• Storage : 256GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\n• Panel Size : 15.6-inch FHD (1920 x 1080) 16:9 aspect ratio 200nits 45% NTSC color gamut<br>',5),(12,2,'Laptop Lenovo Thinkpad T420',1650000,4000,'lenovo.jpg','💻 LAPTOP SECOND LENOVO T420<br><br>\r\n\r\n☆ Intel Core i5 Gen 2TH<br>\r\n☆ HDD 320 Gb<br>\r\n☆ Ram 4 Gb<br>\r\n☆ WIFI<br>\r\n☆ Layar 14\"<br>\r\n☆ Port USB<br>\r\n☆ Port Mic<br>\r\n☆ Port Headphone<br>\r\n☆ Camera<br>\r\n☆ VGA INTEL<br>',5),(13,1,'IPHONE XR',4299999,1000,'iphone xr.png','IPHONE XR ISTIMEWA',5),(14,1,'Redmi note 11 pro 5g',3900000,500,'Redmi n 11 pro.jpg','Kondisi: Baru <br>\r\nBerat Satuan: 500 g<br>\r\nKategori: Android OS<br>\r\nEtalase: Semua Etalase',5),(15,2,'Laptop Lenovo Ideapad',4199000,4000,'laptop lenovo.jpg','Kondisi: Baru<br>\r\nBerat Satuan: 4 kg',5),(16,1,'Samsung Galaxy A04s 4/64GB',1865000,425,'galaxy A04s.jpg','Kondisi: Baru<br>\r\nBerat Satuan: 425 g<br>\r\nKategori: Android OS<br>\r\nEtalase: SAMSUNG<br>',5),(17,1,'Samsung Galaxy A04s',1865000,450,'galaxy A04s.jpg','Kondisi: Baru',5),(18,1,'Samsung Galaxy A04s',1865000,450,'galaxy A04s.jpg','kondisi : Baru',5);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_foto`
--

DROP TABLE IF EXISTS `produk_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produk_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_foto`
--

LOCK TABLES `produk_foto` WRITE;
/*!40000 ALTER TABLE `produk_foto` DISABLE KEYS */;
INSERT INTO `produk_foto` VALUES (1,18,'galaxy A04s.jpg'),(2,18,'galaxy A04s2.jpg'),(4,18,'20221207141113galaxy A04s3.jpg');
/*!40000 ALTER TABLE `produk_foto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-22 14:13:53
