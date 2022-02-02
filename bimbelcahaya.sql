-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 01:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbelcahaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_05_051914_buat_tabel_jenjang', 1),
(4, '2020_02_17_080852_buat_tabel_kelas', 1),
(5, '2020_02_18_092548_buat_tabel_mapel', 1),
(6, '2020_02_18_100554_buat_tabel_soal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenjang`
--

CREATE TABLE `tabel_jenjang` (
  `id` int(10) UNSIGNED NOT NULL,
  `gambar_jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenjang_id` int(10) UNSIGNED NOT NULL,
  `gambar_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kelas` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mapel`
--

CREATE TABLE `tabel_mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `gambar_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_mapel` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_soal`
--

CREATE TABLE `tabel_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `gambar_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_soal` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `roles`, `address`, `phone`, `avatar`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'BimbelCahaya', 'Admin Bimbel', 'bimbelcahaya@gmail.com', '[\"ADMIN\"]', 'Tahunan, Umbulharjo, Yogyakarta', '0875859909', 'tidak-ada-image.png', 'ACTIVE', NULL, '$2y$10$NERg6PX2YgUIvNNOBT76eOleHP5FU9I9OW1b3eW5.4FxH5lGADYim', NULL, '2020-03-03 05:29:15', '2020-03-03 05:29:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_kelas_jenjang_id_foreign` (`jenjang_id`);

--
-- Indexes for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_mapel_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_soal_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_jenjang`
--
ALTER TABLE `tabel_jenjang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD CONSTRAINT `tabel_kelas_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `tabel_jenjang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_mapel`
--
ALTER TABLE `tabel_mapel`
  ADD CONSTRAINT `tabel_mapel_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tabel_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  ADD CONSTRAINT `tabel_soal_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `tabel_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
