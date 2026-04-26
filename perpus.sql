-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2026 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT 0,
  `tersedia` int(11) DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `isbn`, `judul`, `id_kategori`, `id_penulis`, `id_penerbit`, `tahun_terbit`, `jumlah`, `tersedia`, `deskripsi`, `cover`) VALUES
(1, '978-602-291-662-8', '99 Azab Kubur Indosiar', 3, 3, 6, '2013', 50, 25, 'aasasasasasasa', '1777051324_6d8429f30d1204399cca.png'),
(2, '978-602-291-662-8', 'Atomic habit', 3, 3, 3, '2011', 50, 50, 'bvcxbcxbcx', '1777052441_60d4cfc41552d22e1636.png');

-- --------------------------------------------------------

--
-- Table structure for table `buku_rak`
--

CREATE TABLE `buku_rak` (
  `id_buku_rak` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_rak`
--

INSERT INTO `buku_rak` (`id_buku_rak`, `id_buku`, `id_rak`) VALUES
(12, 1, 3),
(13, 2, 3),
(14, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `jumlah_denda` decimal(10,0) NOT NULL,
  `status` enum('belum bayar','sudah bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail`, `id_peminjaman`, `id_buku`, `jumlah`) VALUES
(5, 34, 13, 100),
(30, 30, 30, 30),
(35, 54, 20, 5),
(37, 56, 21, 4),
(41, 60, 20, 2),
(42, 61, 32, 2),
(43, 62, 35, 1),
(44, 63, 33, 2),
(45, 64, 33, 33),
(46, 65, 33, 8),
(47, 66, 32, 4),
(48, 67, 32, 2),
(49, 68, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'caca'),
(3, 'Novel'),
(5, 'kaliddd'),
(13, 'rikaaaa'),
(55, 'nunu');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_anggota`, `id_petugas`, `foto`) VALUES
(73, 1, '2026-04-08', '2026-04-07', 'dipinjam', 9, 8, '1777054836_2ed49362a2b2c3a699b6.png');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_peminjaman`, `alamat`, `biaya`, `status`, `tanggal_ambil`, `petugas_id`) VALUES
(1, 1, 'bandung', 13000, 'anomali', '2026-04-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat`) VALUES
(2, 'kafri', 'dusun cilembu'),
(3, 'Gramedia', 'kampung durian runtuh'),
(6, 'lailatul', 'kampung cinta');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `denda_per_hari` int(11) DEFAULT NULL,
  `maksimal_pinjam` int(11) DEFAULT NULL,
  `lama_pinjam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_aplikasi`, `denda_per_hari`, `maksimal_pinjam`, `lama_pinjam`) VALUES
(1, 'perpustakaan', 1, 1, 3),
(2, 'buku', 8, 10, 3),
(6, 'perpus', 4, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_di kembali` date NOT NULL,
  `denda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tgl_di kembali`, `denda`) VALUES
(2, 4, '2026-04-01', 6.00),
(3, 0, '0000-00-00', 2000.00),
(4, 0, '0000-00-00', 1000.00),
(5, 0, '0000-00-00', 3000.00),
(6, 0, '0000-00-00', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_peminjaman`, `alamat`, `biaya`, `status`, `tanggal_kirim`, `id_anggota`, `tanggal_ambil`, `id_petugas`) VALUES
(3, 3, 'erfwererf', 400, 'sehat', '2026-04-01', 6, '2026-04-02', 9),
(7, 7, 'bandung', 23000, 'anomali', '2026-04-08', 7, '2026-04-07', 9),
(13, NULL, 'sumedang', 200, 'dikirim', '2026-04-21', NULL, NULL, NULL),
(16, NULL, 'bandung', 3, 'belum menikah', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(1, 'aprill'),
(3, 'Tere Liye'),
(5, 'riqa'),
(13, 'lidkaaaa'),
(14, 'rika');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`) VALUES
(2, 'kanii', 'khika', '$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S'),
(5, 'orang', 'orang', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi`) VALUES
(3, 'Rak A', 'Lantai 2 Ruang 2');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_reservasi` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_anggota`, `id_buku`, `tanggal_reservasi`, `status`) VALUES
(1, 1, 1, '2026-04-13', 'anomali'),
(2, 2, 7, '2026-04-13', 'anomali'),
(3, 1, 19, '2026-04-01', 'janda'),
(4, 1, 32, '2026-04-25', 'oo');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_peminjaman`, `jenis`, `jumlah`, `status`, `tanggal`) VALUES
(1, 35, 'perempuan', 2, 'wrwq', '2026-04-13'),
(2, 50, 'perempuan', 2, 'belum menikah', '2026-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_buku`, `id_anggota`, `rating`, `komentar`, `tanggal`) VALUES
(1, 1, 1, 1, 'ngga ada', '2026-04-13'),
(2, 7, 2, 1, 'nggatau', '2026-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','anggota','user') DEFAULT 'anggota',
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `role`, `foto`, `status`, `created_at`) VALUES
(1, 'rikaapriliani', 'rika.apriliani85@smk.belajar.id', 'khika', '$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S', 'admin', '1776536439_4e10bb2ba9c933608c22.jpg', 'aktif', '2026-04-11 04:29:11'),
(8, 'RikaCantip', 'rika@gmail.com', 'khikaaaaa', '$2y$10$r7JLxvyM8JTbvUc2AB1mFuSGjmDlQxgzuYGBCF9ilxZucA.BhL2Ia', 'petugas', '1775890384_3cd5b2d3a538a223f06f.jpg', 'aktif', '2026-04-11 06:53:04'),
(9, 'muti', 'rika@gmail.com', 'mutinurul', '$2y$10$yboEs6jw8G94jdqKyoiX1.ygQSVLWpng1reNvZPT/uiwwUHCuk6b6', 'anggota', '1775890572_88c1d1aa2121dad27afe.png', 'aktif', '2026-04-11 06:56:12'),
(10, 'gheisya', 'rika@gmail.com', 'gheisya', '$2y$10$vegg1AIQDIjC3MLsJKdtcuLLzLBAOIDqV1.E6BexZmNApfopIdK1y', 'anggota', '1775890742_f46f17987dbcd46ad591.jpg', 'aktif', '2026-04-11 06:59:03'),
(12, 'RikaCantip', 'rika@gmail.com', 'rikaa', '$2y$10$WjJ4giQAOHe31GtDVlWxU.N.33Q6Z0ioy3yElsdww26pJ9bMBXoNy', 'admin', '1776481283_b28f53c8a371d1e4285c.jpg', 'aktif', '2026-04-18 03:01:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `buku_rak`
--
ALTER TABLE `buku_rak`
  ADD PRIMARY KEY (`id_buku_rak`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku_rak`
--
ALTER TABLE `buku_rak`
  MODIFY `id_buku_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
