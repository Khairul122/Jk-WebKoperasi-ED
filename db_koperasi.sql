-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2024 at 04:51 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int NOT NULL,
  `unique_id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `gaji` double NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `unique_id`, `nama`, `jenis_kelamin`, `gaji`, `status`) VALUES
(1, 202307001, 'Indra Murti,ST,MM', 'L', 4800000, 1),
(2, 202307002, 'Murdiani, SH', 'P', 4300000, 1),
(3, 202307003, 'Oma R,SE,MM', 'P', 4800000, 1),
(4, 202307004, 'Abd.Mukhlis A,SH', 'L', 4400000, 1),
(5, 202307005, 'Asmendria,S,Sos', 'P', 4400000, 1),
(6, 202307006, 'Sri Yeni S,Sos', 'P', 4400000, 1),
(7, 202307007, 'Firmansyah, SH', 'L', 4400000, 1),
(8, 202307008, 'Herlina Zai, SH', 'L', 4400000, 1),
(9, 202307009, 'Amalia, SH', 'P', 4400000, 1),
(10, 202307010, 'Harkil, SH', 'L', 4400000, 1),
(11, 202307011, 'Hade Frianetty,SH', 'P', 4400000, 1),
(12, 202307012, 'Indra Jalinus', 'L', 3500000, 1),
(13, 202307013, 'Dian Rosdianah', 'P', 3500000, 1),
(14, 202307014, 'Kumala Sari', 'P', 3500000, 1),
(15, 202307015, 'Efrijon', 'L', 3500000, 1),
(16, 202307016, 'Herizal', 'L', 3500000, 1),
(17, 202307017, 'Jondanis', 'L', 3500000, 1),
(18, 202307018, 'D e d I Hok', 'L', 3500000, 1),
(19, 202307019, 'Isma', 'P', 3500000, 1),
(20, 202307020, 'Yusrizal.A', 'L', 3000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_pinjaman` int NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_transaksi`, `id_pinjaman`, `nominal`, `keterangan`) VALUES
(1, 63, 1, 733334, 'Pembayaran 1'),
(2, 64, 1, 733334, 'Pembayaran 2');

-- --------------------------------------------------------

--
-- Table structure for table `cf_setting`
--

CREATE TABLE `cf_setting` (
  `set_id` int NOT NULL,
  `set_app_name` varchar(255) NOT NULL,
  `set_app_author` varchar(255) NOT NULL,
  `set_app_desc` text NOT NULL,
  `set_app_year` char(4) NOT NULL,
  `set_app_icon` varchar(200) NOT NULL,
  `set_app_favicon` varchar(200) NOT NULL,
  `set_app_vers` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cf_setting`
--

INSERT INTO `cf_setting` (`set_id`, `set_app_name`, `set_app_author`, `set_app_desc`, `set_app_year`, `set_app_icon`, `set_app_favicon`, `set_app_vers`) VALUES
(1, 'Koperasi KPLP Teluk Bayur', 'KPLP Teluk Bayur', 'Perancangan Sistem Informasi Simpan Pinjam Pada Koperasi Pegawai Kantor Kplp Teluk Bayur Menggunakan Bahasa Pemprograman Php Dan Database Mysql', '2023', 'icon.png', 'favicon.png', 'Beta 1.0');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `id_jenis` int NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tipe` enum('S','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id_jenis`, `jenis`, `tipe`) VALUES
(1, 'Simpanan Wajib Anggota', 'S'),
(3, 'Simpan Pinjam', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `level_akses`
--

CREATE TABLE `level_akses` (
  `level_id` int NOT NULL,
  `level_akses` varchar(100) NOT NULL,
  `level_nick` char(3) NOT NULL,
  `status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_akses`
--

INSERT INTO `level_akses` (`level_id`, `level_akses`, `level_nick`, `status_id`) VALUES
(1, 'Superadmin', 'SAD', 1),
(2, 'Ketua', 'KTK', 1),
(3, 'Sekretaris', 'SKK', 1),
(4, 'Bendahara', 'BDK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_anggota` int NOT NULL,
  `id_jenis` int NOT NULL,
  `nominal` double NOT NULL,
  `jangka_waktu` int NOT NULL,
  `jumlah_pembayaran` double NOT NULL,
  `nominal_bayar` double NOT NULL,
  `status` enum('BL','L') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_transaksi`, `id_anggota`, `id_jenis`, `nominal`, `jangka_waktu`, `jumlah_pembayaran`, `nominal_bayar`, `status`) VALUES
(1, 61, 4, 3, 4000000, 6, 4400000, 733333.33333333, 'BL');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int NOT NULL,
  `total` double NOT NULL,
  `kas` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `total`, `kas`, `terpakai`) VALUES
(1, 10466668, 10466668, 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int NOT NULL,
  `id_anggota` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_jenis` int NOT NULL,
  `nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `id_transaksi`, `id_jenis`, `nominal`) VALUES
(1, 1, 1, 1, 150000),
(2, 2, 2, 1, 150000),
(3, 3, 3, 1, 150000),
(4, 4, 4, 1, 150000),
(5, 5, 5, 1, 150000),
(6, 6, 6, 1, 150000),
(7, 7, 7, 1, 150000),
(8, 8, 8, 1, 150000),
(9, 9, 9, 1, 150000),
(10, 10, 10, 1, 150000),
(11, 11, 11, 1, 150000),
(12, 12, 12, 1, 150000),
(13, 13, 13, 1, 150000),
(14, 14, 14, 1, 150000),
(15, 15, 15, 1, 150000),
(16, 16, 16, 1, 150000),
(17, 17, 17, 1, 150000),
(18, 18, 18, 1, 150000),
(19, 19, 19, 1, 150000),
(20, 20, 20, 1, 150000),
(21, 1, 1, 1, 150000),
(22, 2, 2, 1, 150000),
(23, 3, 3, 1, 150000),
(24, 4, 4, 1, 150000),
(25, 5, 5, 1, 150000),
(26, 6, 6, 1, 150000),
(27, 7, 7, 1, 150000),
(28, 8, 8, 1, 150000),
(29, 9, 9, 1, 150000),
(30, 10, 10, 1, 150000),
(31, 11, 11, 1, 150000),
(32, 12, 12, 1, 150000),
(33, 13, 13, 1, 150000),
(34, 14, 14, 1, 150000),
(35, 15, 15, 1, 150000),
(36, 16, 16, 1, 150000),
(37, 17, 17, 1, 150000),
(38, 18, 18, 1, 150000),
(39, 19, 19, 1, 150000),
(40, 20, 20, 1, 150000),
(41, 1, 1, 1, 150000),
(42, 2, 2, 1, 150000),
(43, 3, 3, 1, 150000),
(44, 4, 4, 1, 150000),
(45, 5, 5, 1, 150000),
(46, 6, 6, 1, 150000),
(47, 7, 7, 1, 150000),
(48, 8, 8, 1, 150000),
(49, 9, 9, 1, 150000),
(50, 10, 10, 1, 150000),
(51, 11, 11, 1, 150000),
(52, 12, 12, 1, 150000),
(53, 13, 13, 1, 150000),
(54, 14, 14, 1, 150000),
(55, 15, 15, 1, 150000),
(56, 16, 16, 1, 150000),
(57, 17, 17, 1, 150000),
(58, 18, 18, 1, 150000),
(59, 19, 19, 1, 150000),
(60, 20, 20, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int NOT NULL,
  `status_name` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tanggal` date NOT NULL,
  `debit` double NOT NULL,
  `kredit` double NOT NULL,
  `saldo` double NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `debit`, `kredit`, `saldo`, `keterangan`) VALUES
(1, '2023-03-01', 150000, 0, 150000, 'Simpanan Maret 2023'),
(2, '2023-03-02', 150000, 0, 300000, 'Simpanan Maret 2023'),
(3, '2023-03-03', 150000, 0, 450000, 'Simpanan Maret 2023'),
(4, '2023-03-04', 150000, 0, 600000, 'Simpanan Maret 2023'),
(5, '2023-03-05', 150000, 0, 750000, 'Simpanan Maret 2023'),
(6, '2023-03-06', 150000, 0, 900000, 'Simpanan Maret 2023'),
(7, '2023-03-07', 150000, 0, 1050000, 'Simpanan Maret 2023'),
(8, '2023-03-08', 150000, 0, 1200000, 'Simpanan Maret 2023'),
(9, '2023-03-09', 150000, 0, 1350000, 'Simpanan Maret 2023'),
(10, '2023-03-10', 150000, 0, 1500000, 'Simpanan Maret 2023'),
(11, '2023-03-11', 150000, 0, 1650000, 'Simpanan Maret 2023'),
(12, '2023-03-12', 150000, 0, 1800000, 'Simpanan Maret 2023'),
(13, '2023-03-13', 150000, 0, 1950000, 'Simpanan Maret 2023'),
(14, '2023-03-14', 150000, 0, 2100000, 'Simpanan Maret 2023'),
(15, '2023-03-15', 150000, 0, 2250000, 'Simpanan Maret 2023'),
(16, '2023-03-16', 150000, 0, 2400000, 'Simpanan Maret 2023'),
(17, '2023-03-17', 150000, 0, 2550000, 'Simpanan Maret 2023'),
(18, '2023-03-18', 150000, 0, 2700000, 'Simpanan Maret 2023'),
(19, '2023-03-19', 150000, 0, 2850000, 'Simpanan Maret 2023'),
(20, '2023-03-20', 150000, 0, 3000000, 'Simpanan Maret 2023'),
(21, '2023-04-01', 150000, 0, 3150000, 'Simpanan April 2023'),
(22, '2023-04-02', 150000, 0, 3300000, 'Simpanan April 2023'),
(23, '2023-04-03', 150000, 0, 3450000, 'Simpanan April 2023'),
(24, '2023-04-04', 150000, 0, 3600000, 'Simpanan April 2023'),
(25, '2023-04-05', 150000, 0, 3750000, 'Simpanan April 2023'),
(26, '2023-04-06', 150000, 0, 3900000, 'Simpanan April 2023'),
(27, '2023-04-07', 150000, 0, 4050000, 'Simpanan April 2023'),
(28, '2023-04-08', 150000, 0, 4200000, 'Simpanan April 2023'),
(29, '2023-04-09', 150000, 0, 4350000, 'Simpanan April 2023'),
(30, '2023-04-10', 150000, 0, 4500000, 'Simpanan April 2023'),
(31, '2023-04-11', 150000, 0, 4650000, 'Simpanan April 2023'),
(32, '2023-04-12', 150000, 0, 4800000, 'Simpanan April 2023'),
(33, '2023-04-13', 150000, 0, 4950000, 'Simpanan April 2023'),
(34, '2023-04-14', 150000, 0, 5100000, 'Simpanan April 2023'),
(35, '2023-04-15', 150000, 0, 5250000, 'Simpanan April 2023'),
(36, '2023-04-16', 150000, 0, 5400000, 'Simpanan April 2023'),
(37, '2023-04-17', 150000, 0, 5550000, 'Simpanan April 2023'),
(38, '2023-04-18', 150000, 0, 5700000, 'Simpanan April 2023'),
(39, '2023-04-19', 150000, 0, 5850000, 'Simpanan April 2023'),
(40, '2023-04-20', 150000, 0, 6000000, 'Simpanan April 2023'),
(41, '2023-05-01', 150000, 0, 6150000, 'Simpanan Mei 2023'),
(42, '2023-05-02', 150000, 0, 6300000, 'Simpanan Mei 2023'),
(43, '2023-05-03', 150000, 0, 6450000, 'Simpanan Mei 2023'),
(44, '2023-05-04', 150000, 0, 6600000, 'Simpanan Mei 2023'),
(45, '2023-05-05', 150000, 0, 6750000, 'Simpanan Mei 2023'),
(46, '2023-05-06', 150000, 0, 6900000, 'Simpanan Mei 2023'),
(47, '2023-05-07', 150000, 0, 7050000, 'Simpanan Mei 2023'),
(48, '2023-05-08', 150000, 0, 7200000, 'Simpanan Mei 2023'),
(49, '2023-05-09', 150000, 0, 7350000, 'Simpanan Mei 2023'),
(50, '2023-05-10', 150000, 0, 7500000, 'Simpanan Mei 2023'),
(51, '2023-05-11', 150000, 0, 7650000, 'Simpanan Mei 2023'),
(52, '2023-05-12', 150000, 0, 7800000, 'Simpanan Mei 2023'),
(53, '2023-05-13', 150000, 0, 7950000, 'Simpanan Mei 2023'),
(54, '2023-05-14', 150000, 0, 8100000, 'Simpanan Mei 2023'),
(55, '2023-05-15', 150000, 0, 8250000, 'Simpanan Mei 2023'),
(56, '2023-05-16', 150000, 0, 8400000, 'Simpanan Mei 2023'),
(57, '2023-05-17', 150000, 0, 8550000, 'Simpanan Mei 2023'),
(58, '2023-05-18', 150000, 0, 8700000, 'Simpanan Mei 2023'),
(59, '2023-05-19', 150000, 0, 8850000, 'Simpanan Mei 2023'),
(60, '2023-05-20', 150000, 0, 9000000, 'Simpanan Mei 2023'),
(61, '2023-05-03', 0, 4000000, 5000000, 'oke'),
(63, '2023-06-01', 733334, 0, 9733334, 'Pembayaran 1'),
(64, '2023-07-01', 733334, 0, 10466668, 'Pembayaran 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `level_id`, `status`) VALUES
(1, 'Admin Koperasi', 'admin@gmail.com', '082288254225', '$2a$04$xReywqGISwgZ7Jkd30j6IuvGF2oJeiXCX0oBAEaNjZrnjcBLCDgdK', 1, 1),
(2, 'Dudung Hartono', 'dudunghartono@gmail.com', '082284828941', '$2y$10$Uve3zOf8oepYXtJ.EO6PU.wMFRRcMnkeL.Z3yPoJcCphQSO89Bdf2', 2, 1),
(3, 'Achmad Safrudin', 'safrudinac@gmail.com', '082170350120', '$2y$10$8vKSLzhmv0y4VgGlpDAnW.o2Fna8fva01M3BMY5N0.vU9ccAb/4DS', 3, 1),
(4, 'Muldi Herman', 'muldiherman02@gmail.com', '082389900821', '$2y$10$XkGIbtEJV2ExVLebNRVUDe8uQ5uEsd6CTxNxLdkTqOc0OqAO0McSq', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `cf_setting`
--
ALTER TABLE `cf_setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level_akses`
--
ALTER TABLE `level_akses`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cf_setting`
--
ALTER TABLE `cf_setting`
  MODIFY `set_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level_akses`
--
ALTER TABLE `level_akses`
  MODIFY `level_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
