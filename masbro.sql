-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 02:26 AM
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
  `nama_akun` varchar(191) NOT NULL,
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
(7, 'Beban Air', '402'),
(8, 'Biaya Lain Lain', '403'),
(9, 'Peralatan', '111'),
(10, 'Penyursutan peralatan', '112');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `biaya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id`, `kode`, `keterangan`, `biaya`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(1, '300', 'Gaji Pegawai', 500000, 2, 1000000, NULL, NULL),
(2, '401', 'Beban Listrik', 50000, 1, 50000, NULL, NULL),
(3, '402', 'Beban Air', 45000, 1, 45000, NULL, NULL),
(4, '403', 'BIaya Lain Lain', 40000, 1, 40000, NULL, NULL),
(5, '403', 'BIaya Lain Lain - Plastik', 15000, 1, 15000, NULL, NULL),
(6, '300', 'Gaji Pegawai', 800000, 1, 800000, NULL, NULL),
(7, '401', 'Beban Listrik', 50000, 1, 50000, NULL, NULL),
(8, '402', 'Beban Air', 35000, 1, 35000, NULL, NULL);

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
(4, 'Setrika', '1000 gram', '5000', '2', NULL, NULL),
(5, 'Karpet', '1000 gram', '15000', '8', '2024-11-04 05:51:40', '2024-11-04 05:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_akun` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_beban` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `nominal` int(11) UNSIGNED NOT NULL,
  `tipe` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_akun`, `id_pesanan`, `id_beban`, `keterangan`, `waktu_transaksi`, `nominal`, `tipe`) VALUES
(171, 3, 1, 0, '', '2024-09-09', 14000, 'k'),
(172, 1, 1, 0, '', '2024-09-09', 14000, 'd'),
(173, 3, 2, 0, '', '2024-09-10', 0, 'k'),
(174, 1, 2, 0, '', '2024-09-10', 0, 'd'),
(175, 3, 3, 0, '', '2024-09-12', 17500, 'k'),
(176, 1, 3, 0, '', '2024-09-12', 17500, 'd'),
(177, 3, 4, 0, '', '2024-09-12', 31500, 'k'),
(178, 1, 4, 0, '', '2024-09-12', 31500, 'd'),
(179, 3, 5, 0, '', '2024-09-12', 0, 'k'),
(180, 1, 5, 0, '', '2024-09-12', 0, 'd'),
(181, 3, 6, 0, '', '2024-09-12', 12000, 'k'),
(182, 1, 6, 0, '', '2024-09-12', 12000, 'd'),
(183, 3, 7, 0, '', '2024-09-12', 0, 'k'),
(184, 1, 7, 0, '', '2024-09-12', 0, 'd'),
(185, 3, 8, 0, '', '2024-09-12', 0, 'k'),
(186, 1, 8, 0, '', '2024-09-12', 0, 'd'),
(187, 3, 9, 0, '', '2024-09-12', 0, 'k'),
(188, 1, 9, 0, '', '2024-09-12', 0, 'd'),
(189, 3, 10, 0, '', '2024-09-12', 0, 'k'),
(190, 1, 10, 0, '', '2024-09-12', 0, 'd'),
(191, 3, 11, 0, '', '2024-09-12', 20000, 'k'),
(192, 1, 11, 0, '', '2024-09-12', 20000, 'd'),
(193, 3, 12, 0, '', '2024-10-01', 14000, 'k'),
(194, 1, 12, 0, '', '2024-10-01', 14000, 'd'),
(195, 3, 13, 0, '', '2024-10-01', 28000, 'k'),
(196, 1, 13, 0, '', '2024-10-01', 28000, 'd'),
(197, 3, 14, 0, '', '2024-10-18', 14000, 'k'),
(198, 1, 14, 0, '', '2024-10-18', 14000, 'd'),
(199, 3, 15, 0, '', '2024-10-18', 17500, 'k'),
(200, 1, 15, 0, '', '2024-10-18', 17500, 'd'),
(201, 4, 0, 1, '', '2024-10-18', 1000000, 'd'),
(202, 1, 0, 1, '', '2024-10-18', 1000000, 'k'),
(203, 6, 0, 2, '', '2024-10-18', 50000, 'd'),
(204, 1, 0, 2, '', '2024-10-18', 50000, 'k'),
(205, 7, 0, 3, '', '2024-10-18', 45000, 'd'),
(206, 1, 0, 3, '', '2024-10-18', 45000, 'k'),
(207, 8, 0, 4, '', '2024-10-18', 40000, 'd'),
(208, 1, 0, 4, '', '2024-10-18', 40000, 'k'),
(209, 8, 0, 5, '', '2024-10-21', 15000, 'd'),
(210, 1, 0, 5, '', '2024-10-21', 15000, 'k'),
(213, 3, 16, 0, '', '2024-11-04', 35000, 'k'),
(214, 1, 16, 0, '', '2024-11-04', 35000, 'd'),
(215, 3, 17, 0, '', '2024-11-04', 16000, 'k'),
(216, 1, 17, 0, '', '2024-11-04', 16000, 'd'),
(219, 3, 18, 0, '', '2024-12-05', 45000, 'k'),
(220, 1, 18, 0, '', '2024-12-05', 45000, 'd'),
(221, 3, 19, 0, '', '2024-12-05', 17500, 'k'),
(222, 1, 19, 0, '', '2024-12-05', 17500, 'd'),
(223, 3, 20, 0, '', '2024-12-05', 10500, 'k'),
(224, 1, 20, 0, '', '2024-12-05', 10500, 'd'),
(225, 3, 21, 0, '', '2024-12-05', 8000, 'k'),
(226, 1, 21, 0, '', '2024-12-05', 8000, 'd'),
(227, 4, 0, 6, 'Gaji Pegawai', '2024-12-05', 800000, 'd'),
(228, 1, 0, 6, 'Gaji Pegawai', '2024-12-05', 800000, 'k'),
(229, 6, 0, 7, 'Beban Listrik', '2024-12-05', 50000, 'd'),
(230, 1, 0, 7, 'Beban Listrik', '2024-12-05', 50000, 'k'),
(231, 7, 0, 8, 'Beban Air', '2024-12-05', 35000, 'd'),
(232, 1, 0, 8, 'Beban Air', '2024-12-05', 35000, 'k'),
(233, 3, 22, 0, '', '2024-12-05', 45000, 'k'),
(234, 1, 22, 0, '', '2024-12-05', 45000, 'd'),
(235, 3, 23, 0, '', '2024-12-05', 45000, 'k'),
(236, 1, 23, 0, '', '2024-12-05', 45000, 'd'),
(237, 3, 24, 0, '', '2024-12-05', 50000, 'k'),
(238, 1, 24, 0, '', '2024-12-05', 50000, 'd'),
(239, 3, 25, 0, '', '2024-12-05', 75000, 'k'),
(240, 1, 25, 0, '', '2024-12-05', 75000, 'd'),
(241, 3, 26, 0, '', '2024-12-18', 12000, 'k'),
(242, 1, 26, 0, '', '2024-12-18', 12000, 'd'),
(243, 3, 27, 0, '', '2024-12-19', 12000, 'k'),
(244, 1, 27, 0, '', '2024-12-19', 12000, 'd'),
(245, 3, 28, 0, '', '2024-12-23', 8000, 'k'),
(246, 1, 28, 0, '', '2024-12-23', 8000, 'd'),
(247, 3, 29, 0, '', '2024-12-26', 7000, 'k'),
(248, 1, 29, 0, '', '2024-12-26', 7000, 'd'),
(249, 3, 30, 0, '', '2024-12-26', 0, 'k'),
(250, 1, 30, 0, '', '2024-12-26', 0, 'd'),
(251, 3, 31, 0, '', '2025-01-01', 0, 'k'),
(252, 1, 31, 0, '', '2025-01-01', 0, 'd');

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
  `nohp` int(12) NOT NULL,
  `kelamin` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `nohp`, `kelamin`, `created_at`, `updated_at`) VALUES
(1, 'Taufik', 'Jl. Kramat Raya', 2147483647, 'Laki-laki', NULL, NULL),
(2, 'Salman', 'Jl. Kramat Jaya 1', 2147483647, 'Laki-laki', NULL, NULL),
(3, 'Salomon', 'Jl. Semaji', 867151718, 'Laki-laki', NULL, NULL),
(7, 'Karyo', 'Jl. Merah Delima', 82623572, 'Laki-laki', NULL, NULL),
(10, 'Ramlan', 'Jl. Sidomutki', 846749302, 'Laki-laki', NULL, NULL),
(11, 'Siti', 'Jl. Medan api', 843637228, 'Perempuan', NULL, NULL),
(12, 'Akbbar1', 'Surabaya', 2147483647, 'Laki-laki', NULL, NULL);

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
  `jampengiriman` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `id_pelanggan`, `id_pesanan`, `statuspengiriman`, `tglpengiriman`, `jampengiriman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '-', NULL, NULL, NULL, NULL),
(2, 2, 2, 'Sudah Dikirim', '2024-09-13', '2024-09-12 17:56:04', NULL, NULL),
(3, 3, 3, 'Sudah Diambil', '2024-09-13', '2024-09-12 18:19:54', NULL, NULL),
(4, 2, 4, 'Siap Diambil', NULL, NULL, NULL, NULL),
(5, 2, 5, 'Sudah Dikirim', '2024-10-21', '2024-10-21 09:21:23', NULL, NULL),
(6, 2, 6, 'Sudah Dikirim', '2024-12-05', '2024-12-05 04:19:43', NULL, NULL),
(7, 2, 7, 'Sudah Diambil', '2024-12-05', '2024-12-05 04:21:51', NULL, NULL),
(8, 1, 8, 'Sudah Dikirim', '2024-12-18', '2024-12-18 13:15:12', NULL, NULL),
(9, 1, 9, '-', NULL, NULL, NULL, NULL),
(10, 2, 10, '-', NULL, NULL, NULL, NULL),
(11, 2, 11, 'Sudah Dikirim', '2024-12-18', '2024-12-18 13:26:28', NULL, NULL),
(12, 3, 12, 'Sudah Diambil', '2024-12-18', '2024-12-18 13:17:21', NULL, NULL),
(13, 1, 13, 'Siap Dikirim', NULL, NULL, NULL, NULL),
(14, 2, 14, '-', NULL, NULL, NULL, NULL),
(15, 2, 15, 'Sudah Dikirim', '2024-12-18', '2024-12-18 13:26:32', NULL, NULL),
(16, 11, 16, '-', NULL, NULL, NULL, NULL),
(17, 7, 17, '-', NULL, NULL, NULL, NULL),
(18, 3, 18, '-', NULL, NULL, NULL, NULL),
(19, 11, 19, '-', NULL, NULL, NULL, NULL),
(20, 2, 20, '-', NULL, NULL, NULL, NULL),
(21, 7, 21, '-', NULL, NULL, NULL, NULL),
(22, 7, 22, '-', NULL, NULL, NULL, NULL),
(23, 1, 23, '-', NULL, NULL, NULL, NULL),
(24, 2, 24, '-', NULL, NULL, NULL, NULL),
(25, 2, 25, '-', NULL, NULL, NULL, NULL),
(26, 3, 26, '-', NULL, NULL, NULL, NULL),
(27, 3, 27, '-', NULL, NULL, NULL, NULL),
(28, 2, 28, '-', NULL, NULL, NULL, NULL),
(29, 10, 29, '-', NULL, NULL, NULL, NULL),
(30, 10, 30, '-', NULL, NULL, NULL, NULL),
(31, 7, 31, '-', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_metode` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(191) NOT NULL,
  `harga` int(11) NOT NULL,
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

INSERT INTO `pesanan` (`id`, `id_jenis`, `id_pelanggan`, `id_metode`, `id_users`, `kode_pesanan`, `harga`, `jumlah`, `total`, `tgltransaksi`, `tglselesai`, `jenisbayar`, `statuspembayaran`, `statuslaundry`, `pengiriman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 'MAS2409090001', 3500, 4, 14000, '2024-09-09', '2024-09-11', 'Transfer', 'Sudah Bayar', 'Selesai Laundry', 'Kirim', '2024-09-09 14:52:16', '2024-09-09 14:52:16'),
(2, 2, 2, 3, 1, 'MAS2409100002', 4000, 5, 20000, '2024-09-10', '2024-09-12', 'Transfer', 'Sudah Bayar', 'Sudah Dikirim', 'Kirim', '2024-09-09 17:58:38', '2024-09-09 17:58:38'),
(3, 1, 3, 0, 2, 'MAS2409120003', 3500, 5, 17500, '2024-09-12', '2024-09-14', 'Cash', 'Sudah Bayar', 'Sudah Diambil', 'Ambil', '2024-09-12 09:30:13', '2024-09-12 09:30:13'),
(4, 3, 2, 0, 2, 'MAS2409120004', 4500, 7, 31500, '2024-09-12', '2024-09-15', 'Cash', 'Sudah Bayar', 'Selesai Laundry', 'Ambil', '2024-09-12 09:30:32', '2024-09-12 09:30:32'),
(5, 2, 2, 2, 2, 'MAS2409120005', 4000, 4, 16000, '2024-09-12', '2024-09-14', 'Transfer', 'Sudah Bayar', 'Sudah Dikirim', 'Kirim', '2024-09-12 09:30:59', '2024-09-12 09:30:59'),
(6, 2, 2, 3, 1, 'MAS2409120006', 4000, 3, 12000, '2024-09-12', '2024-09-14', 'Transfer', 'Sudah Bayar', 'Sudah Dikirim', 'Kirim', '2024-09-12 09:31:22', '2024-09-12 09:31:22'),
(7, 2, 2, 0, 1, 'MAS2409120007', 4000, 2, 8000, '2024-09-12', '2024-09-14', 'Cash', 'Sudah Bayar', 'Sudah Diambil', 'Ambil', '2024-09-12 09:31:39', '2024-09-12 09:31:39'),
(8, 3, 1, 3, 3, 'MAS2409120008', 4500, 2, 9000, '2024-09-12', '2024-09-15', 'Transfer', 'Sudah Bayar', 'Sudah Dikirim', 'Kirim', '2024-09-12 09:31:56', '2024-09-12 09:31:56'),
(9, 1, 1, 3, 3, 'MAS2409120009', 3500, 2, 7000, '2024-09-12', '2024-09-14', 'Transfer', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2024-09-12 09:32:24', '2024-09-12 09:32:24'),
(10, 1, 2, 1, 1, 'MAS2409120010', 3500, 1, 3500, '2024-09-12', '2024-09-14', 'Transfer', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2024-09-12 09:32:44', '2024-09-12 09:32:44'),
(11, 2, 2, 0, 3, 'MAS2409120011', 4000, 5, 20000, '2024-09-12', '2024-09-14', 'Cash', 'Sudah Bayar', 'Sudah Dikirim', 'Kirim', '0000-00-00 00:00:00', '2024-09-12 09:32:57'),
(12, 1, 3, 3, 1, 'MAS2410010012', 3500, 4, 14000, '2024-10-01', '2024-10-03', 'Transfer', 'Sudah Bayar', 'Sudah Diambil', 'Ambil', '2024-10-01 02:25:33', '2024-10-01 02:25:33'),
(13, 2, 1, 2, 1, 'MAS2410010013', 4000, 7, 28000, '2024-10-01', '2024-10-03', 'Transfer', 'Sudah Bayar', 'Selesai Laundry', 'Kirim', '2024-10-01 02:25:56', '2024-10-01 02:25:56'),
(14, 1, 2, 3, 1, 'MAS2410180014', 3500, 4, 14000, '2024-10-18', '2024-10-20', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-10-18 08:18:25', '2024-10-18 08:18:25'),
(15, 1, 2, 3, 2, 'MAS2410180015', 3500, 5, 17500, '2024-10-18', '2024-10-20', 'Transfer', 'Sudah Bayar', 'Sudah Dikirim', 'Kirim', '2024-10-18 08:18:40', '2024-10-18 08:18:40'),
(16, 1, 11, 0, 2, 'MAS2411040016', 3500, 10, 35000, '2024-11-04', '2024-11-06', 'Cash', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-11-04 05:34:28', '2024-11-04 05:34:28'),
(17, 2, 7, 3, 3, 'MAS2411040017', 4000, 4, 16000, '2024-11-04', '2024-11-06', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-11-04 05:34:48', '2024-11-04 05:34:48'),
(18, 3, 3, 0, 3, 'MAS2412050018', 4500, 10, 45000, '2024-12-05', '2024-12-08', 'Cash', 'Sudah Bayar', 'Proses Laundry', 'Ambil', '2024-12-05 03:41:15', '2024-12-05 03:41:15'),
(19, 1, 11, 0, 1, 'MAS2412050019', 3500, 5, 17500, '2024-12-05', '2024-12-07', 'Cash', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-05 03:41:30', '2024-12-05 03:41:30'),
(20, 1, 2, 2, 1, 'MAS2412050020', 3500, 3, 10500, '2024-12-05', '2024-12-07', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Ambil', '2024-12-05 03:41:52', '2024-12-05 03:41:52'),
(21, 2, 7, 2, 2, 'MAS2412050021', 4000, 2, 8000, '2024-12-05', '2024-12-07', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-05 03:42:11', '2024-12-05 03:42:11'),
(22, 3, 7, 1, 2, 'MAS2412050022', 4500, 10, 45000, '2024-12-05', '2024-12-08', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-05 03:45:18', '2024-12-05 03:45:18'),
(23, 3, 1, 3, 3, 'MAS2412050023', 4500, 10, 45000, '2024-12-05', '2024-12-08', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-05 03:46:51', '2024-12-05 03:46:51'),
(24, 4, 2, 0, 2, 'MAS2412050024', 5000, 10, 50000, '2024-12-05', '2024-12-07', 'Cash', 'Sudah Bayar', 'Proses Laundry', 'Ambil', '2024-12-05 03:47:08', '2024-12-05 03:47:08'),
(25, 5, 2, 3, 2, 'MAS2412050025', 15000, 5, 75000, '2024-12-05', '2024-12-11', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-05 03:49:03', '2024-12-05 03:49:03'),
(26, 2, 3, 2, 1, 'MAS2412180026', 4000, 3, 12000, '2024-12-18', '2024-12-20', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-18 07:42:51', '2024-12-18 07:42:51'),
(27, 2, 3, 2, 1, 'MAS2412190027', 4000, 3, 12000, '2024-12-19', '2024-12-21', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Kirim', '2024-12-19 03:28:17', '2024-12-19 03:28:17'),
(28, 2, 2, 0, 1, 'MAS2412230028', 4000, 2, 8000, '2024-12-23', '2024-12-24', 'Cash', 'Sudah Bayar', 'Proses Laundry', 'Ambil', '2024-12-23 04:38:44', '2024-12-23 04:38:44'),
(29, 1, 10, 2, 1, 'MAS2412260029', 3500, 2, 7000, '2024-12-26', '2024-12-28', 'Transfer', 'Sudah Bayar', 'Proses Laundry', 'Ambil', '2024-12-25 18:06:20', '2024-12-25 18:06:20'),
(30, 2, 10, 0, 1, 'MAS2412260030', 4000, 10, 40000, '2024-12-26', '2024-12-28', 'Cash', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2024-12-25 18:06:34', '2024-12-25 18:06:34'),
(31, 1, 7, 3, 1, 'MAS2501010031', 3500, 10, 35000, '2025-01-01', '2025-01-03', 'Transfer', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2025-01-01 07:36:42', '2025-01-01 07:36:42');

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
(2, '1', 'Admin', 'admin@laundry.com', '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm', NULL, NULL, NULL),
(3, '1', 'Renaldy', 'rey@laundry.com', '$2y$10$.3oM6Pqnw7xqV3ptIt963uaGAzF6/RCubODhw7/HekfsfPeZ94kO.', NULL, '2024-12-18 07:24:25', '2024-12-18 07:24:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
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
  ADD KEY `jurnal_id_akun_foreign` (`id_akun`),
  ADD KEY `jurnal_id_pesanan_foreign` (`id_pesanan`) USING BTREE,
  ADD KEY `jurnal_id_beban_foreign` (`id_beban`) USING BTREE;

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
  ADD KEY `pesanan_id_metode_foreign` (`id_metode`),
  ADD KEY `pesanan_id_users_foreign` (`id_users`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
