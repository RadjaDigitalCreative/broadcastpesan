-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 06:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `database`
--

CREATE TABLE `database` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, '2020_12_21_091402_create_wa_table', 1),
(5, '2020_12_21_091457_create_database_table', 1),
(6, '2021_01_09_171651_create_role_table', 2),
(7, '2021_01_10_083722_create_skill_table', 3),
(8, '2021_03_10_142111_create_role_pay_table', 4),
(9, '2021_03_10_153437_create_role_bayar_table', 5);

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_wa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `id_wa`, `id_data`, `created_at`, `updated_at`) VALUES
(143, '336', '77fac3354741d46c8c2926a86970c1593d8bf86d', NULL, NULL),
(144, 'NAMA', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(145, 'amikhan 1', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(146, 'amikhan 2', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(147, 'amikhan 3', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(148, 'amikhan 4', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(149, 'amikhan 5', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(150, 'NAMA', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(151, 'amikhan 1', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(152, 'amikhan 2', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(153, 'amikhan 3', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(154, 'amikhan 4', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(155, 'amikhan 5', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(156, 'NAMA', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(157, 'amikhan 1', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(158, 'amikhan 2', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(159, 'amikhan 3', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(160, 'amikhan 4', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(161, 'amikhan 5', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(162, 'NAMA', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(163, 'amikhan 1', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(164, 'amikhan 2', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(165, 'amikhan 3', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(166, 'amikhan 4', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(167, 'amikhan 5', 'fee1d07670e235819a734dc65661b190580a255a', NULL, NULL),
(168, 'NAMA', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(169, 'amikhan 1', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(170, 'amikhan 2', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(171, 'amikhan 3', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(172, 'amikhan 4', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(173, 'amikhan 5', '0af72da17870c74a37d303e1c2e950757b2ee7a51', NULL, NULL),
(174, 'NAMA', NULL, NULL, NULL),
(175, 'amikhan 1', NULL, NULL, NULL),
(176, 'amikhan 2', NULL, NULL, NULL),
(177, 'amikhan 3', NULL, NULL, NULL),
(178, 'amikhan 4', NULL, NULL, NULL),
(179, 'amikhan 5', NULL, NULL, NULL),
(180, 'NAMA', NULL, NULL, NULL),
(181, 'amikhan 1', NULL, NULL, NULL),
(182, 'amikhan 2', NULL, NULL, NULL),
(183, 'amikhan 3', NULL, NULL, NULL),
(184, 'amikhan 4', NULL, NULL, NULL),
(185, 'amikhan 5', NULL, NULL, NULL),
(186, 'NAMA', NULL, NULL, NULL),
(187, 'amikhan 1', NULL, NULL, NULL),
(188, 'amikhan 2', NULL, NULL, NULL),
(189, 'amikhan 3', NULL, NULL, NULL),
(190, 'amikhan 4', NULL, NULL, NULL),
(191, 'amikhan 5', NULL, NULL, NULL),
(192, 'NAMA', NULL, NULL, NULL),
(193, 'amikhan 1', NULL, NULL, NULL),
(194, 'amikhan 2', NULL, NULL, NULL),
(195, 'amikhan 3', NULL, NULL, NULL),
(196, 'amikhan 4', NULL, NULL, NULL),
(197, 'amikhan 5', NULL, NULL, NULL),
(198, 'NAMA', NULL, NULL, NULL),
(199, 'amikhan 1', NULL, NULL, NULL),
(200, 'amikhan 2', NULL, NULL, NULL),
(201, 'amikhan 3', NULL, NULL, NULL),
(202, 'amikhan 4', NULL, NULL, NULL),
(203, 'amikhan 5', NULL, NULL, NULL),
(204, 'NAMA', NULL, NULL, NULL),
(205, 'amikhan 1', NULL, NULL, NULL),
(206, 'amikhan 2', NULL, NULL, NULL),
(207, 'amikhan 3', NULL, NULL, NULL),
(208, 'amikhan 4', NULL, NULL, NULL),
(209, 'amikhan 5', NULL, NULL, NULL),
(210, 'NAMA', NULL, NULL, NULL),
(211, 'amikhan 1', NULL, NULL, NULL),
(212, 'amikhan 2', NULL, NULL, NULL),
(213, 'amikhan 3', NULL, NULL, NULL),
(214, 'amikhan 4', NULL, NULL, NULL),
(215, 'amikhan 5', NULL, NULL, NULL),
(216, 'NAMA', NULL, NULL, NULL),
(217, 'amikhan 1', NULL, NULL, NULL),
(218, 'amikhan 2', NULL, NULL, NULL),
(219, 'amikhan 3', NULL, NULL, NULL),
(220, 'amikhan 4', NULL, NULL, NULL),
(221, 'amikhan 5', NULL, NULL, NULL),
(222, 'NAMA', NULL, NULL, NULL),
(223, 'amikhan 1', NULL, NULL, NULL),
(224, 'amikhan 2', NULL, NULL, NULL),
(225, 'amikhan 3', NULL, NULL, NULL),
(226, 'amikhan 4', NULL, NULL, NULL),
(227, 'amikhan 5', NULL, NULL, NULL),
(228, 'NAMA', NULL, NULL, NULL),
(229, 'amikhan 1', NULL, NULL, NULL),
(230, 'amikhan 2', NULL, NULL, NULL),
(231, 'amikhan 3', NULL, NULL, NULL),
(232, 'amikhan 4', NULL, NULL, NULL),
(233, 'amikhan 5', NULL, NULL, NULL),
(234, 'NAMA', NULL, NULL, NULL),
(235, 'amikhan 1', NULL, NULL, NULL),
(236, 'amikhan 2', NULL, NULL, NULL),
(237, 'amikhan 3', NULL, NULL, NULL),
(238, 'amikhan 4', NULL, NULL, NULL),
(239, 'amikhan 5', NULL, NULL, NULL),
(240, 'NAMA', NULL, NULL, NULL),
(241, 'amikhan 1', NULL, NULL, NULL),
(242, 'amikhan 2', NULL, NULL, NULL),
(243, 'amikhan 3', NULL, NULL, NULL),
(244, 'amikhan 4', NULL, NULL, NULL),
(245, 'amikhan 5', NULL, NULL, NULL),
(246, 'NAMA', NULL, NULL, NULL),
(247, 'amikhan 1', NULL, NULL, NULL),
(248, 'amikhan 2', NULL, NULL, NULL),
(249, 'amikhan 3', NULL, NULL, NULL),
(250, 'amikhan 4', NULL, NULL, NULL),
(251, 'amikhan 5', NULL, NULL, NULL),
(252, 'NAMA', NULL, NULL, NULL),
(253, 'amikhan 1', NULL, NULL, NULL),
(254, 'amikhan 2', NULL, NULL, NULL),
(255, 'amikhan 3', NULL, NULL, NULL),
(256, 'amikhan 4', NULL, NULL, NULL),
(257, 'amikhan 5', NULL, NULL, NULL),
(258, 'NAMA', NULL, NULL, NULL),
(259, 'amikhan 1', NULL, NULL, NULL),
(260, 'amikhan 2', NULL, NULL, NULL),
(261, 'amikhan 3', NULL, NULL, NULL),
(262, 'amikhan 4', NULL, NULL, NULL),
(263, 'amikhan 5', NULL, NULL, NULL),
(264, '433', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(265, '434', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(266, '435', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(267, '442', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(268, '443', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(269, '450', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(270, '451', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', NULL, NULL),
(271, '452', 'f39b31c07c37747916caae967459656d0ebd0367', NULL, NULL),
(272, '453', '77fac3354741d46c8c2926a86970c1593d8bf86d', NULL, NULL),
(273, '454', '77fac3354741d46c8c2926a86970c1593d8bf86d', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_bayar`
--

CREATE TABLE `role_bayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_pay`
--

CREATE TABLE `role_pay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dibayar` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `pay` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_pay`
--

INSERT INTO `role_pay` (`id`, `user_id`, `dibayar`, `tgl_bayar`, `harga`, `bank`, `pay`, `image`, `is_read`, `created_at`, `updated_at`) VALUES
(1, '6', '2021-03-10', '2021-03-10', 900000, 321321, 1, NULL, NULL, '2021-03-10 14:32:40', '2021-03-10 14:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kemampuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `kemampuan`, `skill`, `id_user`, `created_at`, `updated_at`) VALUES
(13, 'makan', 100, 6, NULL, NULL),
(14, 'minum', 90, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notelp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `bio`, `notelp`, `id_data`, `created_at`, `updated_at`) VALUES
(6, 'teling indah', 'rizqidino08@gmail.com', NULL, '$2y$10$MJbCYOqFqAcSU9g6dvAjduoFVEfBUNT3R0ECcxRpbQXkZTQwaTT3u', NULL, '2048667170.jpg', 'indah sekali hari inisa', '0842387423', '77fac3354741d46c8c2926a86970c1593d8bf86d', '2021-03-02 02:59:34', '2021-03-01 08:42:23'),
(22, 'teling', 'teling@gmail.com', NULL, '$2y$10$hZv5o70iLPcbOFhOfecepOCBPh14VNKuJSNsjzDHnkhrlbNAlPGjq', NULL, '1822094135.', 'hahaa', '085747321421', 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', '2021-03-04 02:54:30', '2021-03-04 02:54:30'),
(23, 'tess', 'tess@gmail.com', NULL, '$2y$10$wotGS0FAYkwAbdFifzMYSuzwj0NPeP67a615UsZex3QSkT/.adTXC', NULL, NULL, NULL, '085747321421', 'f39b31c07c37747916caae967459656d0ebd0367', '2021-03-08 05:54:11', '2021-03-08 05:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `wa`
--

CREATE TABLE `wa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wa`
--

INSERT INTO `wa` (`id`, `name`, `number`, `text`, `status`, `id_data`, `created_at`, `updated_at`) VALUES
(415, 'NAMA', 'NO. TELP', 'ISI CHAT', NULL, '0af72da17870c74a37d303e1c2e950757b2ee7a51', '2021-03-03 21:27:53', '2021-03-03 21:27:53'),
(416, 'amikhan 1', '843276432', 'INDAHNYA HIDUP', NULL, '0af72da17870c74a37d303e1c2e950757b2ee7a51', '2021-03-03 21:27:53', '2021-03-03 21:27:53'),
(418, 'amikhan 3', NULL, NULL, NULL, '0af72da17870c74a37d303e1c2e950757b2ee7a51', '2021-03-03 21:27:53', '2021-03-03 21:27:53'),
(419, 'amikhan 4', NULL, NULL, NULL, '0af72da17870c74a37d303e1c2e950757b2ee7a51', '2021-03-03 21:27:53', '2021-03-03 21:27:53'),
(420, 'amikhan 5', NULL, NULL, NULL, '0af72da17870c74a37d303e1c2e950757b2ee7a51', '2021-03-03 21:27:53', '2021-03-03 21:27:53'),
(444, 'NAMA', 'NO. TELP', 'ISI CHAT', NULL, 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', '2021-03-08 05:37:48', '2021-03-08 05:37:48'),
(451, 'df', '58', 'vg', NULL, 'b3f45cb12dae09646eab8a92e58f4e4557789fb8', '2021-03-08 05:50:28', '2021-03-08 05:50:28'),
(452, 'jaja', '3464', 'haha', NULL, 'f39b31c07c37747916caae967459656d0ebd0367', '2021-03-09 02:55:03', '2021-03-09 02:55:03'),
(454, 'Tes', '081290508777', 'Tes', NULL, '77fac3354741d46c8c2926a86970c1593d8bf86d', '2021-03-09 08:59:22', '2021-03-09 08:59:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `database`
--
ALTER TABLE `database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_bayar`
--
ALTER TABLE `role_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_pay`
--
ALTER TABLE `role_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wa`
--
ALTER TABLE `wa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `database`
--
ALTER TABLE `database`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

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
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `role_bayar`
--
ALTER TABLE `role_bayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_pay`
--
ALTER TABLE `role_pay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wa`
--
ALTER TABLE `wa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
