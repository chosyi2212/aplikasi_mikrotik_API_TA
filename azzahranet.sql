-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 05:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azzahranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakets_id` bigint(20) UNSIGNED NOT NULL,
  `tempo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `harga` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `pelanggan_id`, `pakets_id`, `tempo_id`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'AZHR-20237201901', 2, 1, '100000.00', '2023-07-22 08:24:51', '2023-07-23 12:18:04'),
(2, 'AZHR-20237201903', 2, NULL, '100000.00', '2023-07-26 07:42:49', '2023-07-26 07:50:16'),
(3, 'AZHR-20237201902', 2, 1, '100000.00', '2023-07-26 07:54:23', '2023-07-26 07:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ippool`
--

CREATE TABLE `ippool` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logpaket`
--

CREATE TABLE `logpaket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakets_id` bigint(20) UNSIGNED NOT NULL,
  `paket_sebelumnya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `harga` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logpaket`
--

INSERT INTO `logpaket` (`id`, `pelanggan_id`, `pakets_id`, `paket_sebelumnya`, `tempo_id`, `harga`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'AZHR-20237201901', 2, 'paket 1', NULL, '125000.00', 1, 'Saya ingin Menambah Paket', '2023-07-23 09:05:25', '2023-07-23 12:18:04'),
(2, 'AZHR-20237201903', 2, 'paket 1', NULL, '125000.00', 1, 'Saya ingin Menambah Paket', '2023-07-26 07:40:40', '2023-07-26 07:50:16'),
(3, 'AZHR-20237201902', 2, 'paket 1', NULL, '125000.00', 1, 'Saya ingin Menambah Paket', '2023-07-26 07:55:03', '2023-07-26 07:56:02'),
(4, 'AZHR-20237201904', 2, 'paket 1', NULL, '125000.00', 1, '---pilih---', '2023-07-26 08:05:17', '2023-07-26 08:05:45');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_14_045516_create_pakets_table', 1),
(6, '2023_06_14_214710_create_userpelanggans_table', 1),
(7, '2023_06_17_065824_create_router_connects_table', 1),
(8, '2023_06_23_151824_create_tanggaltempos_table', 1),
(9, '2023_07_06_030903_create_ippools_table', 1),
(10, '2023_07_14_110624_create_logpakets_table', 1),
(11, '2023_07_20_155937_create_pelanggans_table', 1),
(12, '2023_07_21_161824_create_billings_table', 1),
(13, '2023_07_22_005507_add_pelangan_id_on_logpakets_table', 1),
(14, '2023_07_22_132216_create_transaksis_table', 1),
(15, '2023_07_22_144102_add_billing_id_on_pelangans_table', 1),
(16, '2023_07_23_222538_add_poto_on_transksis_table', 1),
(17, '2023_07_24_091918_add_logpaket_id_on_transksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pakets`
--

CREATE TABLE `pakets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namapaket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecepatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakets`
--

INSERT INTO `pakets` (`id`, `namapaket`, `kecepatan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'paket 1', '2M/3M', '70000.00', '2023-07-22 08:15:30', '2023-07-22 08:15:30'),
(2, 'paket 2', '4M/3M', '100000.00', '2023-07-22 08:15:40', '2023-07-22 08:15:40'),
(3, 'paket 3', '5M/7M', '170000.00', '2023-07-22 08:15:54', '2023-07-22 08:15:54');

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
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpelanggans_id` bigint(20) UNSIGNED NOT NULL,
  `logpaket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `passpppoe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakets_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telfon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `billing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `pelanggan_id`, `userpelanggans_id`, `logpaket_id`, `passpppoe`, `pakets_id`, `alamat`, `no_telfon`, `status`, `billing_id`, `created_at`, `updated_at`) VALUES
(1, 'AZHR-20237201901', 1, NULL, '12345', 2, '12345', '085156330147', 1, 1, '2023-07-22 07:55:22', '2023-07-23 12:18:04'),
(2, 'AZHR-20237201902', 2, NULL, '12345', 2, 'ds.panjerejo Kec.rejotangan', '085156330147', 1, 3, '2023-07-24 18:33:01', '2023-07-26 07:56:02'),
(3, 'AZHR-20237201903', 3, NULL, '12345', 2, 'kediri', '085156330147', 1, 2, '2023-07-26 07:38:49', '2023-07-26 07:50:16'),
(4, 'AZHR-20237201904', 4, NULL, '12345', 1, 'kediri', '085156330147', 0, NULL, '2023-07-26 08:03:26', '2023-07-26 08:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `router_connect`
--

CREATE TABLE `router_connect` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `router_connect`
--

INSERT INTO `router_connect` (`id`, `name`, `ip`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'id-5.hostddns.us:9574', 'wifi', '12345', 1, '2023-07-22 07:52:38', '2023-08-08 06:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `tanggaltempo`
--

CREATE TABLE `tanggaltempo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanggaltempo`
--

INSERT INTO `tanggaltempo` (`id`, `bulan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'agustus', '2023', '2023-07-23 09:02:47', '2023-07-23 09:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `infoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggaltempo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pelanggan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakets_id` bigint(20) UNSIGNED NOT NULL,
  `harga` decimal(8,2) NOT NULL,
  `logpaket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `infoice_id`, `tanggaltempo_id`, `pelanggan_id`, `pakets_id`, `harga`, `logpaket_id`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'INV-202372019011', NULL, 'AZHR-20237201901', 1, '70000.00', NULL, '2', 'avinda rahma-1690013778.png', '2023-07-22 08:16:03', '2023-07-22 08:16:28'),
(2, 'INV-202377201902', 1, 'AZHR-20237201901', 1, '70000.00', NULL, '2', 'avinda rahma-1690103093.png', '2023-07-23 09:04:20', '2023-07-23 09:05:01'),
(3, 'INV-202377201902', NULL, 'AZHR-20237201901', 2, '125000.00', 1, '2', 'avinda rahma-1690114762.png', '2023-07-23 09:05:25', '2023-07-23 12:19:43'),
(4, 'INV-202377201902', 1, 'AZHR-20237201901', 2, '100000.00', NULL, '0', NULL, '2023-07-24 17:42:49', '2023-07-24 17:42:49'),
(5, 'INV-202377201902', NULL, 'AZHR-20237201903', 1, '70000.00', NULL, '2', 'tazkia aulia-1690357166.png', '2023-07-26 07:39:09', '2023-07-26 07:40:10'),
(6, 'INV-202377201904', NULL, 'AZHR-20237201903', 2, '125000.00', 2, '2', 'tazkia aulia-1690357275.png', '2023-07-26 07:40:40', '2023-07-26 07:41:24'),
(7, 'INV-202377201904', NULL, 'AZHR-20237201902', 1, '70000.00', NULL, '2', 'mas dikan-1690357991.png', '2023-07-26 07:53:01', '2023-07-26 07:53:29'),
(8, 'INV-202377201903', NULL, 'AZHR-20237201902', 2, '125000.00', 3, '2', 'mas dikan-1690358116.png', '2023-07-26 07:55:03', '2023-07-26 07:55:31'),
(9, 'INV-202377201903', 1, 'AZHR-20237201902', 2, '100000.00', NULL, '0', NULL, '2023-07-26 07:57:17', '2023-07-26 07:57:17'),
(10, 'INV-202377201903', NULL, 'AZHR-20237201904', 1, '70000.00', NULL, '2', 'akbar-1690358644.png', '2023-07-26 08:03:41', '2023-07-26 08:04:17'),
(11, 'INV-202377201905', NULL, 'AZHR-20237201904', 2, '125000.00', 4, '0', NULL, '2023-07-26 08:05:17', '2023-07-26 08:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chosyi fairuz hafiz', 'pelanggan', 'chosyifairuz@gmail.com', NULL, '$2y$10$TqtWsFQssqxmkAOH5E666OvNBVOUl47pWvkZLaLj9ctLCZs82njZi', NULL, '2023-07-22 07:51:34', '2023-07-22 07:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_pelanggans`
--

CREATE TABLE `user_pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_pelanggans`
--

INSERT INTO `user_pelanggans` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'avinda rahma', 'avinda@gmail.com', NULL, '$2y$10$USNlFXRAI4EqI8YNH8.zBeuPi6Un/D0FzONi0j6KtlBVQuWAPt5M2', NULL, '2023-07-22 07:55:22', '2023-07-22 07:55:22'),
(2, 'mas dikan', 'dikan@gmail.com', NULL, '$2y$10$3JZReTdesYkOjRTf6PoroeVMWgZZW2SqXd84w5LRUsGFCV32w5joO', NULL, '2023-07-24 18:33:01', '2023-07-24 18:33:01'),
(3, 'tazkia aulia', 'tazkia@gmail.com', NULL, '$2y$10$O69G6XCpAZKEKI2Ze/yKiOJJhqMDnhHoaurCCSHCUlcG6hA3jcWH2', NULL, '2023-07-26 07:38:49', '2023-07-26 07:38:49'),
(4, 'akbar', 'akbar@gmail.com', NULL, '$2y$10$ed9gZ.MOB23YLvGKUkujgOhB7vT3vgFyuEaBeN7EtWQv1IimFeWqG', NULL, '2023-07-26 08:03:26', '2023-07-26 08:03:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `billing_tempo_id_foreign` (`tempo_id`),
  ADD KEY `billing_pakets_id_foreign` (`pakets_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ippool`
--
ALTER TABLE `ippool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logpaket`
--
ALTER TABLE `logpaket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logpaket_tempo_id_foreign` (`tempo_id`),
  ADD KEY `logpaket_pakets_id_foreign` (`pakets_id`),
  ADD KEY `logpaket_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakets`
--
ALTER TABLE `pakets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelanggans_pelanggan_id_unique` (`pelanggan_id`),
  ADD KEY `pelanggans_logpaket_id_foreign` (`logpaket_id`),
  ADD KEY `pelanggans_userpelanggans_id_foreign` (`userpelanggans_id`),
  ADD KEY `pelanggans_pakets_id_foreign` (`pakets_id`),
  ADD KEY `pelanggans_billing_id_foreign` (`billing_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `router_connect`
--
ALTER TABLE `router_connect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggaltempo`
--
ALTER TABLE `tanggaltempo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_tanggaltempo_id_foreign` (`tanggaltempo_id`),
  ADD KEY `transaksi_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `transaksi_pakets_id_foreign` (`pakets_id`),
  ADD KEY `transaksi_logpaket_id_foreign` (`logpaket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_pelanggans`
--
ALTER TABLE `user_pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_pelanggans_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ippool`
--
ALTER TABLE `ippool`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logpaket`
--
ALTER TABLE `logpaket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pakets`
--
ALTER TABLE `pakets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `router_connect`
--
ALTER TABLE `router_connect`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tanggaltempo`
--
ALTER TABLE `tanggaltempo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_pelanggans`
--
ALTER TABLE `user_pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_pakets_id_foreign` FOREIGN KEY (`pakets_id`) REFERENCES `pakets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `billing_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`pelanggan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `billing_tempo_id_foreign` FOREIGN KEY (`tempo_id`) REFERENCES `tanggaltempo` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logpaket`
--
ALTER TABLE `logpaket`
  ADD CONSTRAINT `logpaket_pakets_id_foreign` FOREIGN KEY (`pakets_id`) REFERENCES `pakets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logpaket_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`pelanggan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logpaket_tempo_id_foreign` FOREIGN KEY (`tempo_id`) REFERENCES `tanggaltempo` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_billing_id_foreign` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelanggans_logpaket_id_foreign` FOREIGN KEY (`logpaket_id`) REFERENCES `logpaket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelanggans_pakets_id_foreign` FOREIGN KEY (`pakets_id`) REFERENCES `pakets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelanggans_userpelanggans_id_foreign` FOREIGN KEY (`userpelanggans_id`) REFERENCES `user_pelanggans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_logpaket_id_foreign` FOREIGN KEY (`logpaket_id`) REFERENCES `logpaket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_pakets_id_foreign` FOREIGN KEY (`pakets_id`) REFERENCES `pakets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`pelanggan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_tanggaltempo_id_foreign` FOREIGN KEY (`tanggaltempo_id`) REFERENCES `tanggaltempo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
