-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: perpus
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES (1,'caca','bandung','o85798270577'),(2,'kanii','pamarisen','o85798270578'),(3,'oranggg','sumedang','o85798270579'),(4,'noer','tanjungsari','o85790270579'),(5,'aprilll','garuttt','o85798270575'),(13,'khikaaaa','pamarisen','o85798270577');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL,
  `descripsi` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (13,'Laut Bercer',200,5,14,3,2004,21,5,'reertre','1777117955_7f623c89ac6be4f72f93.jpg',6,'ererre'),(33,'bintang',1233,3,1,2,2004,9,7,'fffff','1777116060_423c71f957da3f1b5236.jpg',11,'eeeee'),(35,'agrava',122,1,13,6,2007,8,9,'ngga tau','1777116050_e33ad39421aa139a5564.jpg',10,'setr4'),(37,'agrava',123,3,3,3,2002,1,1,'','1777116018_f253557d93d8ae189c70.jpg',11,'111frtre'),(38,'agrava',66,3,1,3,2003,3,3,'','1777116039_4d533e1d5ed3bc755cf0.jpg',11,'rrtrt'),(41,'Laut Bercer',200,13,3,3,2004,21,0,'','1777118120_79e1cd7c036c47c4fae6.jpg',NULL,'reertre'),(42,'bintang',NULL,3,1,3,0000,0,0,'','1777135406_09bd2fd2d1a9fda080d2.jpg',NULL,NULL),(43,'first sight',NULL,3,1,3,0000,0,0,'','1777136174_c4e332171c29e42eb8c5.jpg',NULL,NULL),(44,'Laut Bercer',NULL,3,5,6,0000,0,0,'','1777136328_fc998c5bbfcf23011f34.jpg',NULL,NULL),(45,'first sight',NULL,1,1,2,0000,0,0,'','1777137421_8303251ffc5785b89d00.jpg',NULL,NULL);
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_rak`
--

DROP TABLE IF EXISTS `buku_rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_rak` (
  `id_` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  PRIMARY KEY (`id_`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_rak`
--

LOCK TABLES `buku_rak` WRITE;
/*!40000 ALTER TABLE `buku_rak` DISABLE KEYS */;
INSERT INTO `buku_rak` VALUES (9,7,5),(11,2,5),(12,39,2),(13,40,2),(14,42,2),(15,43,2),(16,44,2),(17,45,2);
/*!40000 ALTER TABLE `buku_rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denda`
--

DROP TABLE IF EXISTS `denda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengembalian` int(11) NOT NULL,
  `jumlah_denda` decimal(10,0) NOT NULL,
  `status` enum('belum bayar','sudah bayar') NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denda`
--

LOCK TABLES `denda` WRITE;
/*!40000 ALTER TABLE `denda` DISABLE KEYS */;
/*!40000 ALTER TABLE `denda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_peminjaman`
--

DROP TABLE IF EXISTS `detail_peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_peminjaman`
--

LOCK TABLES `detail_peminjaman` WRITE;
/*!40000 ALTER TABLE `detail_peminjaman` DISABLE KEYS */;
INSERT INTO `detail_peminjaman` VALUES (5,34,13,100),(35,54,20,5),(37,56,21,4),(41,60,20,2),(43,62,35,1),(45,64,33,33),(46,65,33,8),(47,66,33,4),(49,68,32,3),(53,79,13,1),(54,79,36,1),(56,81,13,1),(57,82,33,1),(58,83,41,1),(59,84,35,1),(62,87,33,1),(63,88,45,1);
/*!40000 ALTER TABLE `detail_peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'caca'),(3,'Novel'),(5,'kaliddd'),(13,'rikaaaa'),(55,'nunu');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `denda` int(11) DEFAULT 0,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (2,2,'2026-04-01','2026-04-02','dipinjam',9,4,'rika.pg',12300),(78,NULL,'2026-04-21','2026-04-28','kembali',10,0,'rika.pg ',2500),(79,NULL,'2026-04-30','2026-05-07','dipinjam',9,0,'rika.pg',255),(80,NULL,'2026-04-23','2026-04-30','dipinjam',9,0,'rika.pg',100),(81,NULL,'2026-04-25','2026-05-02','dipinjam',10,0,NULL,100),(82,NULL,'2026-04-23','2026-04-30','dipinjam',10,0,NULL,100),(83,NULL,'2026-04-25','2026-05-02','dipinjam',10,0,NULL,100),(84,NULL,'2026-04-25','2026-05-02','dipinjam',9,0,NULL,100),(87,NULL,'2026-04-25','2026-05-02','dipinjam',13,0,NULL,100),(88,NULL,'2026-04-25','2026-05-02','dipinjam',13,0,NULL,0);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penarikan`
--

DROP TABLE IF EXISTS `penarikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penarikan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penarikan`
--

LOCK TABLES `penarikan` WRITE;
/*!40000 ALTER TABLE `penarikan` DISABLE KEYS */;
INSERT INTO `penarikan` VALUES (1,1,'bandung',13000,'anomali','2026-04-13',1);
/*!40000 ALTER TABLE `penarikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerbit`
--

DROP TABLE IF EXISTS `penerbit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerbit`
--

LOCK TABLES `penerbit` WRITE;
/*!40000 ALTER TABLE `penerbit` DISABLE KEYS */;
INSERT INTO `penerbit` VALUES (2,'kafri','dusun cilembu'),(3,'Gramedia','kampung durian runtuh'),(6,'lailatul','kampung cinta');
/*!40000 ALTER TABLE `penerbit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `denda_per_hari` int(11) DEFAULT NULL,
  `maksimal_pinjam` int(11) DEFAULT NULL,
  `lama_pinjam` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaturan`
--

LOCK TABLES `pengaturan` WRITE;
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` VALUES (1,'perpustakaan',1,1,3),(2,'buku',8,10,3),(6,'perpus',4,5,6);
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_di kembali` date NOT NULL,
  `denda` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengembalian`
--

LOCK TABLES `pengembalian` WRITE;
/*!40000 ALTER TABLE `pengembalian` DISABLE KEYS */;
INSERT INTO `pengembalian` VALUES (2,4,'2026-04-01',6.00),(3,0,'0000-00-00',2000.00),(4,0,'0000-00-00',1000.00),(5,0,'0000-00-00',3000.00),(6,0,'0000-00-00',3000.00);
/*!40000 ALTER TABLE `pengembalian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengiriman`
--

DROP TABLE IF EXISTS `pengiriman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengiriman`
--

LOCK TABLES `pengiriman` WRITE;
/*!40000 ALTER TABLE `pengiriman` DISABLE KEYS */;
INSERT INTO `pengiriman` VALUES (3,3,'erfwererf',400,'sehat','2026-04-01',6,'2026-04-02',9),(7,7,'bandung',23000,'anomali','2026-04-08',7,'2026-04-07',9),(13,NULL,'sumedang',200,'dikirim','2026-04-21',NULL,NULL,NULL),(16,NULL,'bandung',3,'belum menikah',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pengiriman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penulis`
--

DROP TABLE IF EXISTS `penulis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penulis` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penulis`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penulis`
--

LOCK TABLES `penulis` WRITE;
/*!40000 ALTER TABLE `penulis` DISABLE KEYS */;
INSERT INTO `penulis` VALUES (1,'aprill'),(5,'riqa'),(13,'lidkaaaa'),(14,'rika');
/*!40000 ALTER TABLE `penulis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (2,'kanii','khika','$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S'),(5,'orang','orang','1234');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rak`
--

DROP TABLE IF EXISTS `rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rak`
--

LOCK TABLES `rak` WRITE;
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` VALUES (2,'kaaa','bndung'),(4,'Floating Shelves','Di Bawah Tangga');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rak_buku`
--

DROP TABLE IF EXISTS `rak_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rak_buku` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rak_buku`
--

LOCK TABLES `rak_buku` WRITE;
/*!40000 ALTER TABLE `rak_buku` DISABLE KEYS */;
INSERT INTO `rak_buku` VALUES (6,'ri','der'),(10,'olid','bandung'),(11,'loker 01','pamarisen');
/*!40000 ALTER TABLE `rak_buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservasi`
--

DROP TABLE IF EXISTS `reservasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_reservasi` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_reservasi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservasi`
--

LOCK TABLES `reservasi` WRITE;
/*!40000 ALTER TABLE `reservasi` DISABLE KEYS */;
INSERT INTO `reservasi` VALUES (1,1,1,'2026-04-13','anomali'),(2,2,7,'2026-04-13','anomali'),(3,1,19,'2026-04-01','janda'),(4,1,33,'2026-04-01','belum menikah');
/*!40000 ALTER TABLE `reservasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,35,'perempuan',2,'wrwq','2026-04-13'),(2,50,'perempuan',2,'belum menikah','2026-04-13');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ulasan`
--

DROP TABLE IF EXISTS `ulasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_ulasan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulasan`
--

LOCK TABLES `ulasan` WRITE;
/*!40000 ALTER TABLE `ulasan` DISABLE KEYS */;
INSERT INTO `ulasan` VALUES (1,1,1,1,'ngga ada','2026-04-13'),(2,7,2,1,'nggatau','2026-04-13');
/*!40000 ALTER TABLE `ulasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','anggota','user') DEFAULT 'anggota',
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rikaapriliani','rika.apriliani85@smk.belajar.id','khika','$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S','admin','1776536439_4e10bb2ba9c933608c22.jpg','aktif','2026-04-11 04:29:11'),(8,'RikaCantip','rika@gmail.com','khikaaaaa','$2y$10$r7JLxvyM8JTbvUc2AB1mFuSGjmDlQxgzuYGBCF9ilxZucA.BhL2Ia','petugas','1775890384_3cd5b2d3a538a223f06f.jpg','aktif','2026-04-11 06:53:04'),(9,'muti','rika@gmail.com','mutinurul','$2y$10$yboEs6jw8G94jdqKyoiX1.ygQSVLWpng1reNvZPT/uiwwUHCuk6b6','anggota','1775890572_88c1d1aa2121dad27afe.png','aktif','2026-04-11 06:56:12'),(10,'gheisya','rika@gmail.com','gheisya','$2y$10$vegg1AIQDIjC3MLsJKdtcuLLzLBAOIDqV1.E6BexZmNApfopIdK1y','anggota','1775890742_f46f17987dbcd46ad591.jpg','aktif','2026-04-11 06:59:03'),(12,'RikaCantip','rika@gmail.com','rikaa','$2y$10$WjJ4giQAOHe31GtDVlWxU.N.33Q6Z0ioy3yElsdww26pJ9bMBXoNy','admin','1776481283_b28f53c8a371d1e4285c.jpg','aktif','2026-04-18 03:01:23'),(13,'khika','rika@gmail.com','rika admin','$2y$10$SOhrlPpfYXZnwkn2UG7bcu.OGl0A5RBgqc0ke.jPTLRyejbd8yDCG','anggota','1777135699_7254f5f0e43513a19f3c.jpg','aktif','2026-04-25 16:48:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-25 12:39:53
