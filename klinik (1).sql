-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 03:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `telepon`, `nip`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'mau ni', 'deks', '0878060958904', '2015323011', 'deks@gmail.com', '$2y$10$/IpIxxn1BKnR/sQi3/U9eeSFnWPUe6V6UGuaMDmKXImB9yQMr3m6i', 'Admin', '2023-06-20 20:47:52', '2023-07-25 21:01:06'),
(5, 'Gusti Ayu Dwinata', 'gekmirah', '0878060958904', '2015323011', 'geksmirah@gmail.com', '$2y$10$1zA7fwb12ccWXiPMLzbb0.SxbZ/EqTxRGDqvc6YkqkNt9/P3fZLGe', 'Admin', '2023-06-23 17:47:30', '2023-06-23 17:47:30'),
(6, 'Gusti Ayu Dwinata 11', 'gekmirah12', '08573120909', '2015323011', 'gustinibos@gmail.com', '$2y$10$CjNz8IUeP0FZsOVnwpz6ge2hWSY9SKd6mOuq9Mq0wQNWBjjM0883G', 'Admin', '2023-06-23 17:57:54', '2023-06-23 17:57:54'),
(7, 'Gusti Ayu Dwinata 11m', 'gekmirah12m', '0878060958904', '2015323011', 'madeaguskresna22@gmail.com', '$2y$10$aSN4isfPI.OB.QhTzE4B6O5UPeQ/Zsi/dDdI5N/QCn0pAVYpHA2M.', 'Admin', '2023-06-23 17:59:49', '2023-06-23 17:59:49'),
(8, 'Gusti Ayu Dwinata 11mm', 'gekmirah122', '0878060958904', '2015323011', 'jabamang@gmail.com', '$2y$10$5m0Cac8..KHAFkFlPLIRE.tnntYguHa3rPLcza.BjriEF4VGocbNK', 'Admin', '2023-06-23 18:01:31', '2023-06-23 18:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_antrian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `no_antrian`, `nik`, `status`, `nama`, `alamat`, `tujuan_keluhan`, `tanggal`, `cara_bayar`, `telepon`, `email`, `user_id`, `created_at`, `updated_at`, `usia`, `jenis_kelamin`, `tanggal_lahir`) VALUES
(39, 'Umum-1', '5107012801020001', 'Sukses', 'I Made Agus Kresna Nanda', 'Jln Pratama No 67 A', 'Umum', '2023-07-07', 'Cash', '6287860958904', 'made1aguskresna22@gmail.com', 3, '2023-07-07 02:08:56', '2023-07-18 03:32:28', 21, 'Laki-laki', '2002-01-28'),
(40, 'Umum-2', '278910', 'Pending', 'Gusti Ayu Dwinata', 'jln tanjakan cinta', 'Umum', '2023-07-07', 'Cash', '6287751766411', 'usegexr@gmail.com', 4, '2023-07-07 03:17:53', '2023-07-24 05:53:23', 20, 'Laki-laki', '2002-12-15'),
(42, 'Umum-1', '22222223', 'Pending', 'Gusti Ayu Dwinata', 'jln tanjakan cinta', 'Umum', '2023-07-25', 'Cash', '6287860958904', 'halo@gmail.com', 4, '2023-07-24 20:00:55', '2023-07-24 20:00:55', 21, 'Perempuan', '2001-12-19'),
(43, 'Umum-1', '22222223', 'Pending', 'Caglot Nax Listrik', 'Jln Pratama No 67 A', 'Umum', '2023-07-26', 'Cash', '6287860958904', 'dwigek@gmail.com', 3, '2023-07-25 21:04:09', '2023-07-25 21:04:50', 21, 'Laki-laki', '2023-07-22');

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
(5, '2023_04_12_113325_create_admins_table', 1),
(6, '2023_04_12_115512_create_admin', 2),
(7, '2023_04_15_073014_create_admin', 3),
(8, '2023_04_15_073223_create_users', 3),
(9, '2023_04_24_112554_create_antrian', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Dwinata1912@gmail.com', '$2y$10$BsopQxLqJlvqIuUmgVVKJex/jv0Pgx1RiV37cU1L5OdWOw5ZB6HSu', '2023-07-31 04:21:03'),
('madeaguskresna22@gmail.com', '$2y$10$tNTCSYhifljFf6MPk4guYeRUaOxMouV6/ONw6QWd1C0cebG7tz.FS', '2023-08-03 19:41:04');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `nik`, `telepon`, `alamat`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Gusti Ayu Dwinata', 'gekdwi', '111111', '62877-5176-6411', 'jln uhuy', 'gexs@gmail.com', 'User', '$2y$10$nQXSe4zJEfX2SVXRvab2yeNgoOmcsNOq1XwImiAhLmkO/riOl/wgC', NULL, '2023-06-24 21:33:17', '2023-08-01 04:42:33'),
(5, 'Yuninata', 'yuninata', '12345678', '09871625346172', 'jln uhuy', 'yuninata@gmail.com', 'User', '$2y$10$cLAKL5mxOgKgFHLhsm0K9eCpcBXSPPHPxL/g9K1R05v1fT0TJ4TjO', NULL, '2023-07-05 18:26:46', '2023-07-05 18:26:46'),
(6, 'Gusti Ayu Dwinata', 'ayu12', '12121212', '12121212', 'jln uhuy', 'Dwinata1912@gmail.com', 'User', '$2y$10$YOeU.CAW0bkioq0aQ4IkQePnGfm5vl8kbC2E46TTnjMHnSoyfFALW', NULL, '2023-07-05 18:43:08', '2023-07-05 18:43:08'),
(7, 'deks', 'deks', '111111', '0878060958904', 'Jln Pratama No 67 A', 'madeaguskresna22@gmail.com', 'User', '$2y$10$yrkmOnCfG35BcY91qb3PduFkiDYl/K1ZkhN74FX3PGOrWnypNFOPS', NULL, '2023-07-21 05:30:11', '2023-07-21 05:30:11'),
(8, 'naruto', 'naruto', '1789121231', '6287860958904', 'jln aaaaaacinta', 'usenarutor@gmail.com', 'User', '$2y$10$cF9cPcLcRC9uXpNbtPqBguadTkXyTLDJaNoa1sIDAhGHFkB3aU5Sy', NULL, '2023-07-24 06:25:48', '2023-07-24 06:25:48'),
(9, 'Gusti Ayu Dwinata', 'deks', '222222', '08573120909', 'Jln Anugrah', 'admin14521@gmail.com', 'User', '$2y$10$xGbsRieSXaoC3deb78tCDOP0vtwTfDoLdq64hm0WELXcfw2SWEgza', NULL, '2024-09-09 22:30:31', '2024-09-09 22:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
