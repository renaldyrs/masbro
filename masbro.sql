-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 03:22 AM
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
-- Database: `masbro`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `kode_akun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama_akun`, `kode_akun`) VALUES
(1, 'Kas', '100'),
(2, 'Modal Awal', '101'),
(3, 'Pendapatan', '200'),
(4, 'Gaji Pegawai', '300'),
(5, 'Beban', '400'),
(6, 'Beban Listrik', '401'),
(7, 'Beban Air', '402');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `idbeban` bigint(20) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `biaya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(191) NOT NULL,
  `kg` varchar(191) NOT NULL,
  `harga` varchar(191) NOT NULL,
  `hari` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `kg`, `harga`, `hari`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Basah', '1000 gram', '3500', '2', NULL, NULL),
(2, 'Cuci Kering', '1000 gram', '4000', '2', NULL, NULL),
(3, 'Cuci Setrika', '1000 gram', '4500', '3', NULL, NULL),
(4, 'Setrika', '1000 gram', '5000', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `nominal` int(10) UNSIGNED NOT NULL,
  `tipe` enum('d','k') NOT NULL,
  `id_akun` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `keterangan`, `waktu_transaksi`, `nominal`, `tipe`, `id_akun`) VALUES
(79, '', '2024-08-27', 21000, 'k', 3),
(80, '', '2024-08-27', 21000, 'd', 1),
(81, '', '2024-08-29', 0, 'k', 3),
(82, '', '2024-08-29', 0, 'd', 1),
(83, '', '2024-08-29', 10500, 'k', 3),
(84, '', '2024-08-29', 10500, 'd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran` varchar(191) NOT NULL,
  `namabank` varchar(191) NOT NULL,
  `kodebank` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`id`, `pembayaran`, `namabank`, `kodebank`, `created_at`, `updated_at`) VALUES
(0, 'Cash', 'Cash', '-', NULL, NULL),
(1, 'Transfer', 'BCA', '184171819', NULL, NULL),
(2, 'Transfer', 'Mandiri', '189271912', NULL, NULL),
(3, 'Transfer', 'BNI', '092827831', NULL, NULL),
(4, 'Transfer', 'BRI', '892172811', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_04_18_170140_create_pemasukan', 1),
(4, '2024_04_04_165221_create_pelanggan', 1),
(5, '2024_04_04_165902_create_metodepembayaran', 1),
(6, '2024_04_04_170026_create_beban', 1),
(7, '2024_04_04_192456_create_jenis', 1),
(8, '2024_04_04_205618_create_akun', 1),
(9, '2024_06_03_181907_pesanan', 1),
(10, '2024_07_04_211508_create_jurnal_table', 1),
(11, '2024_08_14_134758_create_pengiriman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `kelamin` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `nohp`, `kelamin`, `created_at`, `updated_at`) VALUES
(1, 'Taufik', 'Jl. Kramat Raya', 8221232321, 'Laki-laki', NULL, NULL),
(2, 'Salman', 'Jl. Kramat Jaya 1', 8192827271, 'Laki-laki', NULL, NULL),
(3, 'Salomon', 'Jl. Semaji', 867151718, 'Laki-laki', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `statuspengiriman` varchar(191) NOT NULL,
  `tglpengiriman` date DEFAULT NULL,
  `jampengiriman` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `id_pelanggan`, `id_pesanan`, `statuspengiriman`, `tglpengiriman`, `jampengiriman`, `created_at`, `updated_at`) VALUES
(22, 1, 45, 'Selesai Kirim', '2024-08-27', NULL, NULL, NULL),
(23, 2, 46, 'Selesai Kirim', '2024-08-29', NULL, NULL, NULL),
(24, 3, 47, 'Proses Kirim', '2024-08-29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_metode` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(191) NOT NULL,
  `harga` varchar(191) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `tglselesai` date NOT NULL,
  `jenisbayar` varchar(191) NOT NULL,
  `statuspembayaran` varchar(191) NOT NULL,
  `statuslaundry` varchar(191) NOT NULL,
  `pengiriman` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_jenis`, `id_pelanggan`, `id_metode`, `kode_pesanan`, `harga`, `jumlah`, `total`, `tgltransaksi`, `tglselesai`, `jenisbayar`, `statuspembayaran`, `statuslaundry`, `pengiriman`, `created_at`, `updated_at`) VALUES
(45, 1, 1, 2, 'MAS2408270001', '3500', 6, 21000, '2024-08-27', '2024-08-29', 'Transfer', 'Sudah Bayar', 'Sudah Kirim', 'Kirim', '2024-08-27 12:05:09', '2024-08-27 12:05:09'),
(46, 3, 2, 1, 'MAS2408290002', '4500', 6, 27000, '2024-08-29', '0000-00-00', 'Transfer', 'Sudah Bayar', 'Sudah Kirim', 'Kirim', '2024-08-29 12:22:15', '2024-08-29 12:22:15'),
(47, 1, 3, 0, 'MAS2408290003', '3500', 3, 10500, '2024-08-29', '2024-08-31', 'Cash', 'Sudah Bayar', 'Sudah Kirim', 'Kirim', '2024-08-29 12:48:24', '2024-08-29 12:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0', 'Pemilik', 'pemilik@laundry.com', '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm', NULL, NULL, NULL),
(2, '1', 'Admin', 'admin@laundry.com', '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pengiriman_id_pesanan_foreign` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id_jenis_foreign` (`id_jenis`),
  ADD KEY `pesanan_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pesanan_id_metode_foreign` (`id_metode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pengiriman_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_id_metode_foreign` FOREIGN KEY (`id_metode`) REFERENCES `metodepembayaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
