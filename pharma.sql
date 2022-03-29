-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` bigint(30) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `is_debt` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `name`, `supplier_id`, `count`, `price`, `expire_date`, `is_debt`, `type`, `created_at`, `updated_at`) VALUES
(3432312, 'Tap MD3', 2, 9, 10000, '2022-03-31', 0, 0, '2022-03-13 16:06:57', '2022-03-15 21:50:57'),
(7662348, 'Tap MD4', 1, 4, 20000, '2022-03-30', 0, 1, '2022-03-13 16:23:26', '2022-03-15 21:51:03');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_09_182724_sidebar', 2),
(4, '2022_03_10_005928_supplier', 3),
(5, '2022_03_10_171334_buy', 4),
(6, '2022_03_11_184038_sold', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE `sidebar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id`, `name`, `name_ku`, `dir`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Sale', 'فرۆشتن', 'sale', 'ion-bag', NULL, NULL),
(2, 'Sellers', 'فرۆشراوەکان', 'sellers', 'ion-clipboard', NULL, NULL),
(4, 'Buy', 'کڕین', 'buy', 'ion-ios-cart-outline', NULL, NULL),
(5, 'Expire', 'بەسەرچووەکان', 'expire', 'ion-ios-time-outline', NULL, NULL),
(6, 'Debt List', 'قەرزەکان', 'debt', 'ion-document-text', NULL, NULL),
(8, 'Not Left', 'کاڵا نەماوەکان', 'notleft', 'ion-battery-empty', NULL, NULL),
(9, 'Supplier', 'دابینکار', 'supplier', 'ion-android-bus', NULL, NULL),
(10, 'Cashier', 'زیادکردنی کاشێر', 'cashier', 'ion-ios-personadd-outline', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `clean` int(11) NOT NULL,
  `price_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piece` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`id`, `user_id`, `stock_id`, `clean`, `price_at`, `piece`, `created_at`, `updated_at`) VALUES
(8, 1, 7662348, 1, '20000', '1', '2022-03-15 21:49:35', '2022-03-15 21:51:12'),
(9, 1, 3432312, 1, '10000', '1', '2022-03-15 21:49:47', '2022-03-15 21:51:12'),
(10, 1, 3432312, 1, '10000', '1', '2022-03-15 21:50:57', '2022-03-15 21:51:12'),
(11, 1, 7662348, 1, '20000', '1', '2022-03-15 21:51:03', '2022-03-15 21:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `companyname`, `email`, `address`, `phonenumber`, `created_at`, `updated_at`) VALUES
(1, 'dlbrin azad', 'dlbrenakre@gmail.com', 'AKRE', '07514142252', NULL, '2022-03-10 11:33:28'),
(2, 'KurdBun official', 'kurdbunofficial@gmail.com', 'ain kawa', '07514142252', '2022-03-09 22:21:05', '2022-03-09 22:21:05'),
(5, 'Dla Azad', 'dlbrenakre17@gmail.com', 'ain kawa', '07514142252', '2022-03-10 11:18:48', '2022-03-10 11:18:48');

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
  `rule` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `rule`, `created_at`, `updated_at`) VALUES
(1, 'Dlbrin', 'dlbrenakre17@gmail.com', NULL, '$2y$10$eojLpbo6V/qNBTAu5eaHZOGi5TifT46qSBjThGDX.IPxdDH78E/Ze', NULL, 1, NULL, NULL),
(2, 'Ava azad', 'avaazad@gmail.com', NULL, '$2y$10$pZv99VtyMjUHAOntiqaxuunIE4Tx3EIwNj1tCMzLLsx/mpVomEE2y', NULL, 0, '2022-03-09 20:41:16', '2022-03-09 20:41:16'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$Sme3SkyiwL49UdQq05IaaukcuX7EOFG94Z1gFnpwf.ju9f2Ox8AOm', NULL, 0, '2022-03-09 20:42:43', '2022-03-09 20:42:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7662349;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
