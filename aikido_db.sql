-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 01:00 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(15, 8, 3, '2018-09-17 01:27:05', '2018-09-17 01:27:05'),
(16, 12, 2, '2018-09-19 02:30:28', '2018-09-19 02:30:28'),
(17, 13, 2, '2018-09-19 02:30:28', '2018-09-19 02:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`id`, `image_title`, `image_path`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Latihan 14 Oktober 2017', 'O6mHAiE6tLXGffwXrEKdGj4N28UzS00oeFKnbV3r.jpeg', '1', '2018-09-25 19:32:33', '2018-09-25 19:32:33'),
(2, 'Latihan 2 14 Oktober 2017', 'Q50rtRHnvuqKZ1WsPliW55feJWZ3iULsc5cFWCxi.jpeg', '1', '2018-09-25 19:33:04', '2018-09-25 19:33:04'),
(3, 'Latihan 3 14 Oktober 2017', 'BIhkS7vyXCcgavuV2XJzfceQouRr6q3vjMBCK4ft.jpeg', '1', '2018-09-25 19:33:29', '2018-09-25 19:33:29'),
(4, 'Latihan 4 14 Oktober 2017', 'FQkFdSNkvUVK7Mtru5lY76bbLf1uaUAz5gBZnHeR.jpeg', '1', '2018-09-25 19:34:17', '2018-09-25 19:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kelas Reguler', NULL, '2018-09-19 03:27:50', '2018-10-18 08:46:53'),
(2, 'Kelas Malam', NULL, '2018-09-19 03:28:02', '2018-10-18 08:48:07'),
(4, 'Kelas Khusus', 'akan dibuka jika memenuhi kouta', '2018-10-18 08:48:27', '2018-10-18 08:48:51');

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
(8, 'Struktur Organisasi', NULL, 'admin/organization', 6, NULL, '2018-09-19 01:59:04', '2018-09-19 01:59:04', NULL),
(9, 'Berita', NULL, 'admin/news', 6, NULL, '2018-09-17 01:23:41', '2018-09-17 01:24:33', NULL),
(10, 'Galeri Foto', NULL, 'admin/image_gallery', 6, NULL, '2018-09-17 01:24:22', '2018-09-18 04:03:18', NULL),
(11, 'Galeri Video', NULL, 'admin/video_gallery', 6, NULL, '2018-09-17 01:24:55', '2018-09-17 01:24:55', NULL),
(12, 'Jadwal', NULL, 'admin/schedule', 6, NULL, '2018-09-17 01:25:30', '2018-09-17 01:25:30', NULL),
(13, 'Kurikulum', NULL, 'admin/kurikulum', 6, NULL, '2018-09-19 02:01:00', '2018-09-19 02:01:00', NULL);

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
(8, '2018_09_17_160411_create_schedules_table', 6),
(9, '2018_09_19_090610_create_organizations_table', 7),
(10, '2018_09_19_100508_create_kurikulums_table', 8);

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
(1, 'Sejarah AIKIDO', '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '1', 'sejarah-aikido', 2, 2, '2018-09-17 08:38:41', '2018-10-18 08:40:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `name`, `position`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Sayid Andri Al-Fikry', 'Ketua dan Pelatih', NULL, '2018-09-19 04:05:46', '2018-10-18 09:17:36'),
(2, 'Nur Izzah', 'Sekertaris', NULL, '2018-09-19 04:09:36', '2018-10-18 08:51:06'),
(3, 'Sulis', 'Bendahara', NULL, '2018-10-18 08:51:25', '2018-10-18 08:51:25');

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
(1, 'Tentang Kami', '', '<p style="text-align: justify;">Perguruan Aikido SAF Dojo dibawah organisasi Aikido Indonesia (AIKIKAI)</p><p style="text-align: justify;"><strong>Visi dan Misi</strong></p><p style="text-align: justify;"><strong>Visi</strong> : mengajarkan nilai-nilai luhur aikido dan beladiri aikido yang berjiwa ksatria dan peduli sesama.</p><p style="text-align: justify;"><strong>Misi</strong> : mencetak pribadi tangguh dan berkarakter yang sesuai dengan nilai-nilai luhur aikido, dapat menggunakan aikido dalam keseharian sebagai seni bela diri dan pengembangan karakter dan membentuk fifik dan mental secara utuh</p>', '2018-09-17 04:17:12', '2018-10-18 09:13:59', NULL);

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
  `from_day` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `from_day`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(1, 'Rabu', '19:00', '21:00', '2018-09-17 23:32:21', '2018-10-16 16:10:05'),
(2, 'Sabtu', '16:00', '18:00', '2018-09-17 23:41:50', '2018-10-18 09:08:45'),
(3, 'Minggu', '10:00', '12:00', '2018-10-16 15:58:31', '2018-10-18 09:09:16');

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
(1, 'Admin', 'admin@aikido.co.id', '$2y$10$4WcSNaS1gGxat3yTnLXpM.rrvkGRnIwiMzaiSIga6SYwy1ca9zePm', 1, '1', 'zvgwkG6Re35zDhIWNqTcOcwcuGBbkydcywrruPCTCuiqJJh0nXvG1KXxCici', '2018-09-13 03:09:25', '2018-09-13 03:09:25', NULL),
(2, 'Admin Web', 'adminweb@aikido.co.id', '$2y$10$owdNlyAVsNF2O29heLTvL.z7mpA8AotzByNsxtF5hKCirOLXXAt/K', 2, '1', 'BIQh9hdlUWh6OjRm145RxvLQ7Q9AXFkb3kbkzvzKYDYU4n0bDmtnXSv3vD19', '2018-09-17 02:20:15', '2018-09-17 02:32:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE `video_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`id`, `video_title`, `video_path`, `video_url`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Latihan Bulan April 2018', 'aikidoapril.mp4', NULL, '1', '2018-09-25 20:16:26', '2018-09-25 20:16:26'),
(2, 'Latihan Bulan 5 Mei 2018', 'aikido5mei.mp4', NULL, '1', '2018-09-25 20:16:53', '2018-09-25 20:16:53'),
(3, 'Latihan Bulan 5 Agustus 2018', 'aikido5agustus.mp4', NULL, '1', '2018-09-25 20:17:21', '2018-09-25 20:17:21'),
(4, 'Latihan Bulan 18 Agustus 2018', 'aikido18agustus.mp4', NULL, '1', '2018-09-25 20:17:40', '2018-09-25 20:17:40');

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
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
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
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
