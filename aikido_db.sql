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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.akses: ~5 rows (approximately)
/*!40000 ALTER TABLE `akses` DISABLE KEYS */;
INSERT INTO `akses` (`id`, `menu_id`, `level_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(2, 2, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(3, 3, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(4, 4, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18'),
	(5, 5, 1, '2018-08-27 23:18:18', '2018-08-27 23:18:18');
/*!40000 ALTER TABLE `akses` ENABLE KEYS */;

-- Dumping structure for table aikido_db.image_gallery
CREATE TABLE IF NOT EXISTS `image_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.image_gallery: ~0 rows (approximately)
/*!40000 ALTER TABLE `image_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_gallery` ENABLE KEYS */;

-- Dumping structure for table aikido_db.level
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `icon`, `url`, `parent`, `no_urut`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dashboard', 'fa fa-home', 'admin/dashboard', 0, NULL, NULL, '2018-08-13 14:16:12', NULL),
	(2, 'User Management', 'fa fa-users', '', 0, NULL, NULL, NULL, NULL),
	(3, 'Menu', '', 'admin/menu', 2, 1, NULL, NULL, NULL),
	(4, 'Level', '', 'admin/level', 2, 3, NULL, NULL, NULL),
	(5, 'Users', '', 'admin/users', 2, 4, NULL, NULL, NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table aikido_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_09_13_101530_create_schedules_table', 2),
	(4, '2018_09_13_104613_create_image_galleries_table', 3),
	(5, '2018_09_13_104632_create_video_galleries_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time_from` time NOT NULL,
  `schedule_time_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.schedule: ~0 rows (approximately)
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aikido_db.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'admin@aikido.co.id', '$2y$10$4WcSNaS1gGxat3yTnLXpM.rrvkGRnIwiMzaiSIga6SYwy1ca9zePm', 1, '1', 'M8a7M6AAYy7FB1HDL5jxuRzK17GozXO0qJf2PioRurB0AWAQiosRKFl7WZnM', '2018-09-13 10:09:25', '2018-09-13 10:09:25', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table aikido_db.video_gallery
CREATE TABLE IF NOT EXISTS `video_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
