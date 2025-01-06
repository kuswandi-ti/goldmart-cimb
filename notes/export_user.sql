-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table db_goldmart.users: ~4 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `register_token`, `image`, `join_date`, `approved`, `approved_at`, `approved_by`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`) VALUES
	(1, 'Super Admin', 'super-admin', 'kuswandi.ti@gmail.com', '2025-01-06 01:07:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2025-01-06', 1, '2025-01-06 01:07:01', 'System', 1, 'mFcqDQS1aG', '2025-01-05 18:07:01', '2025-01-05 18:07:01', NULL, NULL, 'System', NULL, NULL, NULL),
	(2, 'Admin', 'rudi', 'rudi@goldmart.co.id', '2025-01-06 01:07:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2025-01-06', 1, '2025-01-06 01:07:01', 'System', 1, 'e9ZR2dlpOU', '2025-01-05 18:07:01', '2025-01-05 18:07:01', NULL, NULL, 'System', NULL, NULL, NULL),
	(3, 'User', 'awi', 'awi@goldmart.co.id', '2025-01-06 01:07:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2025-01-06', 1, '2025-01-06 01:07:01', 'System', 1, '5UMmephQM5', '2025-01-05 18:07:01', '2025-01-05 18:07:01', NULL, NULL, 'System', NULL, NULL, NULL),
	(4, 'User', 'user', 'user@mail.com', '2025-01-06 01:07:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2025-01-06', 1, '2025-01-06 01:07:01', 'System', 1, 'B6zp4TC3Zv', '2025-01-05 18:07:01', '2025-01-05 18:07:01', NULL, NULL, 'System', NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
