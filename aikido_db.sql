-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table aikido_db.akses
CREATE TABLE IF NOT EXISTS `akses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.akses: ~15 rows (approximately)
/*!40000 ALTER TABLE `akses` DISABLE KEYS */;
INSERT INTO `akses` (`id`, `menu_id`, `level_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(2, 2, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(3, 3, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(4, 4, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(5, 5, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(6, 1, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(7, 6, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(8, 7, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(9, 8, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(10, 9, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(11, 10, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(12, 11, 2, '2018-09-17 08:26:31', '2018-09-17 08:26:31'),
	(13, 1, 3, '2018-09-17 08:27:05', '2018-09-17 08:27:05'),
	(14, 6, 3, '2018-09-17 08:27:05', '2018-09-17 08:27:05'),
	(15, 8, 3, '2018-09-17 08:27:05', '2018-09-17 08:27:05'),
	(16, 12, 2, '2018-09-19 09:30:28', '2018-09-19 09:30:28'),
	(17, 13, 2, '2018-09-19 09:30:28', '2018-09-19 09:30:28');
/*!40000 ALTER TABLE `akses` ENABLE KEYS */;

-- Dumping structure for table aikido_db.image_gallery
CREATE TABLE IF NOT EXISTS `image_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.image_gallery: ~0 rows (approximately)
/*!40000 ALTER TABLE `image_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_gallery` ENABLE KEYS */;

-- Dumping structure for table aikido_db.kurikulum
CREATE TABLE IF NOT EXISTS `kurikulum` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.kurikulum: ~2 rows (approximately)
/*!40000 ALTER TABLE `kurikulum` DISABLE KEYS */;
INSERT INTO `kurikulum` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Kelas Anak-Anak', NULL, '2018-09-19 10:27:50', '2018-09-19 10:27:50'),
	(2, 'Kelas Dewasa', NULL, '2018-09-19 10:28:02', '2018-09-19 10:28:02'),
	(3, 'Kelas Instruktur', NULL, '2018-09-19 10:28:15', '2018-09-19 10:28:15');
/*!40000 ALTER TABLE `kurikulum` ENABLE KEYS */;

-- Dumping structure for table aikido_db.level
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.level: ~3 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Super Admin', NULL, NULL, NULL),
	(2, 'Admin', NULL, '2018-07-10 15:03:27', NULL),
	(3, 'User', NULL, NULL, NULL);
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table aikido_db.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `no_urut` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.menu: ~12 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `icon`, `url`, `parent`, `no_urut`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dashboard', 'fa fa-home', 'admin/dashboard', 0, NULL, NULL, '2018-08-13 14:16:12', NULL),
	(2, 'User Management', 'fa fa-users', '', 0, NULL, NULL, NULL, NULL),
	(3, 'Menu', '', 'admin/menu', 2, 1, NULL, NULL, NULL),
	(4, 'Level', '', 'admin/level', 2, 3, NULL, NULL, NULL),
	(5, 'Users', '', 'admin/users', 2, 4, NULL, NULL, NULL),
	(6, 'Website Management', 'fa fa-globe', NULL, 0, NULL, '2018-09-17 08:22:12', '2018-09-17 08:22:12', NULL),
	(7, 'Pages', NULL, 'admin/pages', 6, NULL, '2018-09-17 08:23:21', '2018-09-17 08:23:21', NULL),
	(8, 'Struktur Organisasi', NULL, 'admin/organization', 6, NULL, '2018-09-19 08:59:04', '2018-09-19 08:59:04', NULL),
	(9, 'Berita', NULL, 'admin/news', 6, NULL, '2018-09-17 08:23:41', '2018-09-17 08:24:33', NULL),
	(10, 'Galeri Foto', NULL, 'admin/image_gallery', 6, NULL, '2018-09-17 08:24:22', '2018-09-18 11:03:18', NULL),
	(11, 'Galeri Video', NULL, 'admin/video_gallery', 6, NULL, '2018-09-17 08:24:55', '2018-09-17 08:24:55', NULL),
	(12, 'Jadwal', NULL, 'admin/schedule', 6, NULL, '2018-09-17 08:25:30', '2018-09-17 08:25:30', NULL),
	(13, 'Kurikulum', NULL, 'admin/kurikulum', 6, NULL, '2018-09-19 09:01:00', '2018-09-19 09:01:00', NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table aikido_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table aikido_db.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_content` text COLLATE utf8mb4_unicode_ci,
  `news_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_publish` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.news: ~0 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `news_title`, `news_content`, `news_image`, `news_publish`, `news_slug`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Lorem Ipsum', '<p style="text-align: justify;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'WrEmpGybHJZpz935nMiXTAqUBLPoJGAPmV9Hlsc9.jpeg', '1', 'lorem-ipsum', 2, 2, '2018-09-17 15:38:41', '2018-09-25 16:02:22', NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table aikido_db.organisasi
CREATE TABLE IF NOT EXISTS `organisasi` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.organisasi: ~2 rows (approximately)
/*!40000 ALTER TABLE `organisasi` DISABLE KEYS */;
INSERT INTO `organisasi` (`id`, `name`, `position`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'Lorem Ipsum', 'Dewan Pembina', '3gwaTNzi1G2LCvyOQq0L1j637qX8AxSlw5ylBp1i.jpeg', '2018-09-19 11:05:46', '2018-09-19 11:05:46'),
	(2, 'Lorem Ipsum', 'Dewan Pendiri', 'E5LalThVR1vLARLrBcGlMI39Cc5snhqH7VrNb2ae.jpeg', '2018-09-19 11:09:36', '2018-09-19 11:09:36');
/*!40000 ALTER TABLE `organisasi` ENABLE KEYS */;

-- Dumping structure for table aikido_db.page
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.page: ~0 rows (approximately)
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `name`, `page_image`, `page_content`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Tentang Kami', '', '<p style="text-align: justify;"><strong>Lorem Ipsum&nbsp;</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2018-09-17 11:17:12', '2018-09-18 10:01:35', NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;

-- Dumping structure for table aikido_db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table aikido_db.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `from_day` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.schedule: ~2 rows (approximately)
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`id`, `from_day`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
	(1, 'Sabtu', '10:00', '12:00', '2018-09-18 06:32:21', '2018-09-18 06:42:51'),
	(2, 'Minggu', '16:30', '18:00', '2018-09-18 06:41:50', '2018-09-18 06:41:50');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;

-- Dumping structure for table aikido_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'admin@aikido.co.id', '$2y$10$4WcSNaS1gGxat3yTnLXpM.rrvkGRnIwiMzaiSIga6SYwy1ca9zePm', 1, '1', 'zvgwkG6Re35zDhIWNqTcOcwcuGBbkydcywrruPCTCuiqJJh0nXvG1KXxCici', '2018-09-13 10:09:25', '2018-09-13 10:09:25', NULL),
	(2, 'Admin Web', 'adminweb@aikido.co.id', '$2y$10$owdNlyAVsNF2O29heLTvL.z7mpA8AotzByNsxtF5hKCirOLXXAt/K', 2, '1', 'm80L2VfLsyoOyiAbrfFQhBncqQI7pas20Lz7L2423WIDkqbIebRYq7MabTkR', '2018-09-17 09:20:15', '2018-09-17 09:32:10', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table aikido_db.video_gallery
CREATE TABLE IF NOT EXISTS `video_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.video_gallery: ~0 rows (approximately)
/*!40000 ALTER TABLE `video_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_gallery` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
