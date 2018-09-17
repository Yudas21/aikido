-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 11:09 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aikido_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `menu_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-08-27 16:18:18', '2018-08-27 16:18:18'),
(2, 2, 1, '2018-08-27 16:18:18', '2018-08-27 16:18:18'),
(3, 3, 1, '2018-08-27 16:18:18', '2018-08-27 16:18:18'),
(4, 4, 1, '2018-08-27 16:18:18', '2018-08-27 16:18:18'),
(5, 5, 1, '2018-08-27 16:18:18', '2018-08-27 16:18:18'),
(6, 1, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(7, 6, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(8, 7, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(9, 8, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(10, 9, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(11, 10, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(12, 11, 2, '2018-09-17 01:26:31', '2018-09-17 01:26:31'),
(13, 1, 3, '2018-09-17 01:27:05', '2018-09-17 01:27:05'),
(14, 6, 3, '2018-09-17 01:27:05', '2018-09-17 01:27:05'),
(15, 8, 3, '2018-09-17 01:27:05', '2018-09-17 01:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(10) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, NULL, NULL),
(2, 'Admin', NULL, '2018-07-10 08:03:27', NULL),
(3, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `no_urut` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `icon`, `url`, `parent`, `no_urut`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard', 'fa fa-home', 'admin/dashboard', 0, NULL, NULL, '2018-08-13 07:16:12', NULL),
(2, 'User Management', 'fa fa-users', '', 0, NULL, NULL, NULL, NULL),
(3, 'Menu', '', 'admin/menu', 2, 1, NULL, NULL, NULL),
(4, 'Level', '', 'admin/level', 2, 3, NULL, NULL, NULL),
(5, 'Users', '', 'admin/users', 2, 4, NULL, NULL, NULL),
(6, 'Website Management', 'fa fa-globe', NULL, 0, NULL, '2018-09-17 01:22:12', '2018-09-17 01:22:12', NULL),
(7, 'Pages', NULL, 'admin/pages', 6, NULL, '2018-09-17 01:23:21', '2018-09-17 01:23:21', NULL),
(8, 'Berita', NULL, 'admin/news', 6, NULL, '2018-09-17 01:23:41', '2018-09-17 01:24:33', NULL),
(9, 'Galeri Foto', NULL, 'admin/foto_gallery', 6, NULL, '2018-09-17 01:24:22', '2018-09-17 01:25:05', NULL),
(10, 'Galeri Video', NULL, 'admin/video_gallery', 6, NULL, '2018-09-17 01:24:55', '2018-09-17 01:24:55', NULL),
(11, 'Jadwal', NULL, 'admin/schedule', 6, NULL, '2018-09-17 01:25:30', '2018-09-17 01:25:30', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_13_101530_create_schedules_table', 2),
(4, '2018_09_13_104613_create_image_galleries_table', 3),
(5, '2018_09_13_104632_create_video_galleries_table', 3),
(6, '2018_09_17_095807_create_pages_table', 4),
(7, '2018_09_17_135527_create_news_table', 5),
(8, '2018_09_17_160411_create_schedules_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_content` text COLLATE utf8mb4_unicode_ci,
  `news_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_publish` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_content`, `news_image`, `news_publish`, `news_slug`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum', '<p>\r\n<strong></strong>Lorem Ipsum<strong></strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.\r\n\r\n<br></p>', NULL, '1', 'lorem-ipsum', 2, 2, '2018-09-17 08:38:41', '2018-09-17 08:46:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `page_image`, `page_content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tentang Kami', 'xpo5jbltrM85BsYBsNERs0OBiW6Br7PxSzwm67M3.png', '<p>\r\n\r\n<strong>Lorem Ipsum </strong>\r\nis simply dummy text of the printing and typesetting industry. Lorem \r\nIpsum has been the industry\'s standard dummy text ever since the 1500s, \r\nwhen an unknown printer took a galley of type and scrambled it to make a\r\n type specimen book. It has survived not only five centuries, but also \r\nthe leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets \r\ncontaining Lorem Ipsum passages, and more recently with desktop \r\npublishing software like Aldus PageMaker including versions of Lorem \r\nIpsum.\r\n\r\n\r\n\r\n<strong></strong><br></p>', '2018-09-17 04:17:12', '2018-09-17 06:51:41', NULL);

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
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `from_day` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_day` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@aikido.co.id', '$2y$10$4WcSNaS1gGxat3yTnLXpM.rrvkGRnIwiMzaiSIga6SYwy1ca9zePm', 1, '1', 'hFYKMbfIoJVfFL3vysmpJZAVTxUeT0snbPhYiaEB89iADIfUwZrxtX3yI47k', '2018-09-13 03:09:25', '2018-09-13 03:09:25', NULL),
(2, 'Admin Web', 'adminweb@aikido.co.id', '$2y$10$owdNlyAVsNF2O29heLTvL.z7mpA8AotzByNsxtF5hKCirOLXXAt/K', 2, '1', 'O1hqlU7HXQJMZh8VMAZfHyGw2m0VnwPwVPnvNoeA01I7EGdA0uORdFWrlfay', '2018-09-17 02:20:15', '2018-09-17 02:32:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE `video_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level_name_unique` (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_gallery`
--
ALTER TABLE `video_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
