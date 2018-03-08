-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 21, 2018 at 04:44 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KaziDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `company_name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thando', 'test@test.com', 'Kazi Technologies inc', '$2y$10$SY9s/ip7x5WJ2NKhdiYi5O9s1f4l/KxQc8FVz1oRSTgXjc7JPR2XS', NULL, '2018-01-15 03:21:29', '2018-01-15 03:21:29'),
(2, 'Akhil Boddu', 'akhil1234mara@gmail.com', 'Kazi Technologies inc', '$2y$10$c8AWEWXvnapEJbuEMVli4.p3T5HL0j6nAIQZjCcmiMgG.qwv4Xqce', NULL, '2018-01-15 10:30:59', '2018-01-15 10:30:59'),
(3, 'Aditi', 'something@gmail.com', 'Donuts incorporation', '$2y$10$0XPeP1q52JZia9QA5eBbEeXetRs1XCOCEP42XPZEQ02rUmOLDAMwG', NULL, '2018-01-15 11:00:21', '2018-01-15 11:00:21'),
(4, 'Suresh Pitta', 'somethingelse@gmail.com', 'Optics Centre LTD', '$2y$10$9UK2YJfPWlorcBBINtsNJuDuQasD17d7QPnJ217wivyjQVztCReZq', NULL, '2018-01-18 04:22:51', '2018-01-18 04:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `clusters`
--

CREATE TABLE `clusters` (
  `id` int(10) UNSIGNED NOT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XP` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `job_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clusters`
--

INSERT INTO `clusters` (`id`, `slogan`, `XP`, `created_at`, `updated_at`, `student_id`, `job_id`) VALUES
(19, 'Whether we die or not, work will be done!', 0, '2018-01-18 11:58:39', '2018-01-18 11:58:39', 0, 0),
(20, 'WE rule', 0, '2018-01-18 11:59:22', '2018-01-18 11:59:22', 0, 0),
(21, 'We cool', 0, '2018-01-18 12:28:06', '2018-01-18 12:28:06', 0, 0),
(22, 'We cooler', 0, '2018-01-18 12:41:47', '2018-01-18 12:41:47', 0, 0),
(23, 'we bestester', 0, '2018-01-18 12:49:12', '2018-01-19 04:25:18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `budget`, `delivery_time`, `created_at`, `updated_at`, `cover_image`, `client_id`) VALUES
(1, 'Build a lending platform', 'Using laravel and php.', 'R250', 'This friday', '2018-01-15 03:48:12', '2018-01-15 08:51:18', 'noimage.jpg', 1),
(2, 'Testing Kazi Platform', 'Penetration and unit tests on the platform. Each case has to be considered and correctly done.', 'R500', 'Within the next 2 weeks', '2018-01-15 08:53:32', '2018-01-15 08:53:32', 'noimage.jpg', 1),
(5, 'Uber like product', 'I want the group to create a product like uber', 'R2000', 'Within the next 2 months', '2018-01-15 09:42:24', '2018-01-15 09:44:38', '1_1516020278.jpg', 1),
(6, 'Make a donut', 'I want a donut made for myself with chocolate and colored sprinkes. I like white chocolate as well. Surprise me.', 'R100', 'Within the next 24 hours', '2018-01-15 11:03:05', '2018-01-15 11:03:21', 'donut_1516024985.jpg', 3),
(8, 'Build a bot', 'Inline chat bot for blogging website', 'R50000', 'Within the next 2 months', '2018-01-15 17:28:11', '2018-01-15 17:28:11', 'dungeon tileset calciumtrice simple (1)_1516048091.png', 2),
(9, 'Create a smartphone', 'Need a new smartphone with a newly designed operating system', 'R50000', 'Within the next year', '2018-01-16 06:01:20', '2018-01-16 06:01:20', 'noimage.jpg', 2),
(10, 'Fix issues for Kazi Platform', 'There are quite a few small issues that need to be fixed with the website.', 'R550', 'By next friday', '2018-01-18 03:34:51', '2018-01-18 03:35:48', 'kazi_logo_1516257348.svg', 1),
(11, 'Build a Landing website', 'I want a website built about my company.', 'R500', 'Within the next 24 hours', '2018-01-18 04:24:11', '2018-01-18 04:24:11', 'noimage.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_01_11_115533_create_clients_table', 1),
(10, '2018_01_12_070649_create_jobs_table', 1),
(11, '2018_01_12_115701_drop_requirements_column_from_jobs', 1),
(12, '2018_01_12_124149_add_new_columns_to_jobs', 1),
(13, '2018_01_15_061011_add_client_id_to_jobs', 1),
(14, '2018_01_15_144404_add_coverimage', 2),
(15, '2018_01_16_135413_add_headline_to_users', 3),
(16, '2018_01_18_073748_create_clusters_table', 4),
(17, '2018_01_18_082519_add_cluster_id_to_users', 4),
(18, '2018_01_20_161501_create_requests_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL DEFAULT '0',
  `receiver_id` int(11) NOT NULL DEFAULT '0',
  `status` enum('sent','declined','accepted','default') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `sender_id`, `receiver_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 4, 'sent', '2018-01-21 08:37:15', '2018-01-21 08:37:15'),
(2, 9, 3, 'sent', '2018-01-21 09:30:08', '2018-01-21 09:30:08'),
(3, 9, 5, 'sent', '2018-01-21 09:39:17', '2018-01-21 09:39:17'),
(4, 9, 6, 'sent', '2018-01-21 09:39:17', '2018-01-21 09:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `XP` int(11) NOT NULL DEFAULT '0',
  `headline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kazi Developer | Student',
  `cluster_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `cover_image`, `XP`, `headline`, `cluster_id`) VALUES
(3, 'Virat Kohli', 'test@test.com', '$2y$10$l4oAJwlsyIf3osmxO8IzQOXb61H8eY57pwSTC9IZ714RO1mGYUTyW', 'kvxmnyZcQE1IaQKFETxwv5Lsz2Ju8gNZJ8gZnrm6saOKsuhH7rpZadKEKXQ4', '2018-01-16 12:28:45', '2018-01-18 04:07:19', 'vk_1516259239.jpg', 0, 'Kazi Developer | Student', 0),
(4, 'Akhil', 'akhil1234mara@gmail.com', '$2y$10$LTIjQf1qb.KwwQc06xNzpeJXt3bURdwLtu5w9hYdi.rLy8yy778Vi', 'ItDANNxCBQS6dKRdUrHnFcYgM3mPAlZBKyFCLJvMlU3fQoR89nR82TrTZRUW', '2018-01-18 02:28:17', '2018-01-18 04:03:12', 'Headshot_1516258992.JPG', 0, 'Kazi Developer | Student', 0),
(5, 'Aditi', 'aditi@test.com', '$2y$10$uUDTOisO.LXK4plHDL6z/Omg1Bht85ASXI4ACyrtOdxYdxfG2.ADS', 'dyyi8oeH793cEiCn2zy19IQbJiLEG7wj3YyFUfP6fAAe0oA4N8dBNLTdQV8T', '2018-01-18 09:16:29', '2018-01-18 09:16:29', 'default.jpg', 0, 'Kazi Developer | Student', 0),
(6, 'asif', 'asif@test.com', '$2y$10$YwNB3oktR7bUqaIqfO/xtuEswTBNjrjciTVFMVmXlrzjjJ/K.r/.u', 'g3x6hzUDa9zj3mNY6D9LaQyJJYzZNmzDZyBEJmjKxBrBs6gc8vJMhMp3P5Ru', '2018-01-18 09:17:08', '2018-01-18 11:56:10', 'default.jpg', 0, 'Kazi Developer | Student', 8),
(7, 'Renuka', 'renuka@test.com', '$2y$10$BmJgTWWF.OOI18H9i7B54OdeL6yDI7K5yxBpE0MALPO9tQMI96OCG', 'Nzdez1Pfyb1mflblttmrcU1jucD3epXYS2e0tMv7iIV5hjRL8b4E5B8wZkeE', '2018-01-18 11:38:14', '2018-01-18 11:59:22', 'default.jpg', 0, 'Kazi Developer | Student', 20),
(8, 'Muralidhar', 'muralidhar@test.com', '$2y$10$uIUVR3yd7C9a5ymKa5nPKeE5WpJn0cToiyXewIYRFVgQc5m1.sd2G', 'rYhpPxkbaTF0gaClazHGLM8glJ3rsiyPyQyjeCiXW3PkMNkL8KfUVLsnEYZL', '2018-01-18 12:27:54', '2018-01-18 12:41:47', 'default.jpg', 0, 'Kazi Developer | Student', 22),
(9, 'Mvelo', 'mvelo@test.com', '$2y$10$YP7nXs.etJ/8bPgb7jGXoOknkvw8DAC4SHQpyPNVfLr.9mzlnG/t.', 'ksrhi93IbyuNyYeoZYuKQ8WSX7XMJLO65yD6DKThAh6qMMhtyDNgWVsgMVSJ', '2018-01-18 12:48:45', '2018-01-18 12:49:12', 'default.jpg', 0, 'Kazi Developer | Student', 23),
(10, 'Jethro', 'jethro@test.com', '$2y$10$8WSjZtWRO4AQE.qC2rnoFeM2ejWJr9x8A8uaSVuxuieSlE1G.rKzK', 'YCfqa257o924DIuIvAddElPRn5mGfcBKAjm9TewmPZv4bafNIVt6ZZiHjUSn', '2018-01-19 10:55:02', '2018-01-19 10:55:02', 'default.jpg', 0, 'Kazi Developer | Student', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `clusters`
--
ALTER TABLE `clusters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
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
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clusters`
--
ALTER TABLE `clusters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
