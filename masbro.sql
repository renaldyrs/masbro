-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2024 pada 23.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `kode_akun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akun`
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
-- Struktur dari tabel `beban`
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
-- Struktur dari tabel `jenis`
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
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `kg`, `harga`, `hari`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Basah', '1000 gram', '3500', '2', NULL, NULL),
(2, 'Cuci Kering', '1000 gram', '4000', '2', NULL, NULL),
(3, 'Cuci Setrika', '1000 gram', '4500', '3', NULL, NULL),
(4, 'Setrika', '1000 gram', '5000', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_akun` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `nominal` int(10) UNSIGNED NOT NULL,
  `tipe` enum('d','k') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_akun`, `id_pesanan`, `keterangan`, `waktu_transaksi`, `nominal`, `tipe`) VALUES
(171, 3, 1, '', '2024-09-09', 0, 'k'),
(172, 1, 1, '', '2024-09-09', 0, 'd'),
(173, 3, 2, '', '2024-09-10', 0, 'k'),
(174, 1, 2, '', '2024-09-10', 0, 'd'),
(175, 3, 3, '', '2024-09-12', 17500, 'k'),
(176, 1, 3, '', '2024-09-12', 17500, 'd'),
(177, 3, 4, '', '2024-09-12', 0, 'k'),
(178, 1, 4, '', '2024-09-12', 0, 'd'),
(179, 3, 5, '', '2024-09-12', 0, 'k'),
(180, 1, 5, '', '2024-09-12', 0, 'd'),
(181, 3, 6, '', '2024-09-12', 12000, 'k'),
(182, 1, 6, '', '2024-09-12', 12000, 'd'),
(183, 3, 7, '', '2024-09-12', 0, 'k'),
(184, 1, 7, '', '2024-09-12', 0, 'd'),
(185, 3, 8, '', '2024-09-12', 0, 'k'),
(186, 1, 8, '', '2024-09-12', 0, 'd'),
(187, 3, 9, '', '2024-09-12', 0, 'k'),
(188, 1, 9, '', '2024-09-12', 0, 'd'),
(189, 3, 10, '', '2024-09-12', 0, 'k'),
(190, 1, 10, '', '2024-09-12', 0, 'd'),
(191, 3, 11, '', '2024-09-12', 0, 'k'),
(192, 1, 11, '', '2024-09-12', 0, 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metodepembayaran`
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
-- Dumping data untuk tabel `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`id`, `pembayaran`, `namabank`, `kodebank`, `created_at`, `updated_at`) VALUES
(0, 'Cash', 'Cash', '-', NULL, NULL),
(1, 'Transfer', 'BCA', '184171819', NULL, NULL),
(2, 'Transfer', 'Mandiri', '189271912', NULL, NULL),
(3, 'Transfer', 'BNI', '092827831', NULL, NULL),
(4, 'Transfer', 'BRI', '892172811', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `nohp`, `kelamin`, `created_at`, `updated_at`) VALUES
(1, 'Taufik', 'Jl. Kramat Raya', 8221232321, 'Laki-laki', NULL, NULL),
(2, 'Salman', 'Jl. Kramat Jaya 1', 8192827271, 'Laki-laki', NULL, NULL),
(3, 'Salomon', 'Jl. Semaji', 867151718, 'Laki-laki', NULL, NULL),
(7, 'Karyo', 'Jl. Merah Delima', 82623572, 'Laki-laki', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
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
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `id_pelanggan`, `id_pesanan`, `statuspengiriman`, `tglpengiriman`, `jampengiriman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '-', NULL, NULL, NULL, NULL),
(2, 2, 2, 'Selesai Kirim', '2024-09-13', '2024-09-12 17:56:04', NULL, NULL),
(3, 3, 3, 'Sudah Diambil', '2024-09-13', '2024-09-12 18:19:54', NULL, NULL),
(4, 2, 4, '-', NULL, NULL, NULL, NULL),
(5, 2, 5, 'Siap Dikirim', NULL, NULL, NULL, NULL),
(6, 2, 6, 'Siap Dikirim', NULL, NULL, NULL, NULL),
(7, 2, 7, 'Siap Diambil', NULL, NULL, NULL, NULL),
(8, 1, 8, 'Siap Dikirim', NULL, NULL, NULL, NULL),
(9, 1, 9, '-', NULL, NULL, NULL, NULL),
(10, 2, 10, '-', NULL, NULL, NULL, NULL),
(11, 2, 11, '-', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
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
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_jenis`, `id_pelanggan`, `id_metode`, `kode_pesanan`, `harga`, `jumlah`, `total`, `tgltransaksi`, `tglselesai`, `jenisbayar`, `statuspembayaran`, `statuslaundry`, `pengiriman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'MAS2409090001', '3500', 4, 14000, '2024-09-09', '2024-09-11', 'Transfer', 'Belum Bayar', 'Selesai Laundry', 'Kirim', '2024-09-09 14:52:16', '2024-09-09 14:52:16'),
(2, 2, 2, 3, 'MAS2409100002', '4000', 5, 20000, '2024-09-10', '2024-09-12', 'Transfer', 'Belum Bayar', 'Sudah Dikirim', 'Kirim', '2024-09-09 17:58:38', '2024-09-09 17:58:38'),
(3, 1, 3, 0, 'MAS2409120003', '3500', 5, 17500, '2024-09-12', '2024-09-14', 'Cash', 'Sudah Bayar', 'Sudah Diambil', 'Ambil', '2024-09-12 09:30:13', '2024-09-12 09:30:13'),
(4, 3, 2, 0, 'MAS2409120004', '4500', 7, 31500, '2024-09-12', '2024-09-15', 'Cash', 'Belum Bayar', 'Proses Laundry', 'Ambil', '2024-09-12 09:30:32', '2024-09-12 09:30:32'),
(5, 2, 2, 2, 'MAS2409120005', '4000', 4, 16000, '2024-09-12', '2024-09-14', 'Transfer', 'Belum Bayar', 'Selesai Laundry', 'Kirim', '2024-09-12 09:30:59', '2024-09-12 09:30:59'),
(6, 2, 2, 3, 'MAS2409120006', '4000', 3, 12000, '2024-09-12', '2024-09-14', 'Transfer', 'Sudah Bayar', 'Selesai Laundry', 'Kirim', '2024-09-12 09:31:22', '2024-09-12 09:31:22'),
(7, 2, 2, 0, 'MAS2409120007', '4000', 2, 8000, '2024-09-12', '2024-09-14', 'Cash', 'Belum Bayar', 'Selesai Laundry', 'Ambil', '2024-09-12 09:31:39', '2024-09-12 09:31:39'),
(8, 3, 1, 3, 'MAS2409120008', '4500', 2, 9000, '2024-09-12', '2024-09-15', 'Transfer', 'Belum Bayar', 'Selesai Laundry', 'Kirim', '2024-09-12 09:31:56', '2024-09-12 09:31:56'),
(9, 1, 1, 3, 'MAS2409120009', '3500', 2, 7000, '2024-09-12', '2024-09-14', 'Transfer', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2024-09-12 09:32:24', '2024-09-12 09:32:24'),
(10, 1, 2, 1, 'MAS2409120010', '3500', 1, 3500, '2024-09-12', '2024-09-14', 'Transfer', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2024-09-12 09:32:44', '2024-09-12 09:32:44'),
(11, 2, 2, 0, 'MAS2409120011', '4000', 5, 20000, '2024-09-12', '2024-09-14', 'Cash', 'Belum Bayar', 'Proses Laundry', 'Kirim', '2024-09-12 09:32:57', '2024-09-12 09:32:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0', 'Pemilik', 'pemilik@laundry.com', '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm', NULL, NULL, NULL),
(2, '1', 'Admin', 'admin@laundry.com', '$2y$10$DVQLsWtTtmHEnCiyvsTbyemSgYk9aQhJ1PRcMBHAQPpu4j9ixwXpm', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_id_akun_foreign` (`id_akun`),
  ADD KEY `jurnal_id_pesanan_foreign` (`id_pesanan`) USING BTREE;

--
-- Indeks untuk tabel `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pengiriman_id_pesanan_foreign` (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id_jenis_foreign` (`id_jenis`),
  ADD KEY `pesanan_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pesanan_id_metode_foreign` (`id_metode`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT untuk tabel `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pengiriman_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_id_metode_foreign` FOREIGN KEY (`id_metode`) REFERENCES `metodepembayaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
