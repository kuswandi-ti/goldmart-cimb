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

-- Dumping data for table db_goldmart_cimb.setting_systems: ~39 rows (approximately)
DELETE FROM `setting_systems`;
INSERT INTO `setting_systems` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`) VALUES
	(1, 'company_name', 'PT. Gold Martindo', '2024-12-17 00:16:38', '2025-01-01 21:49:11', NULL, NULL, 'Super Admin', 'Super Admin', NULL, NULL),
	(2, 'site_title', 'Goldmart System', '2024-12-17 00:16:38', '2024-12-17 18:17:17', NULL, NULL, 'Super Admin', 'Super Admin', NULL, NULL),
	(3, 'company_email', 'admin@goldmartindo.com', '2024-12-17 00:16:38', '2024-12-17 18:17:17', NULL, NULL, 'Super Admin', 'Super Admin', NULL, NULL),
	(4, 'company_phone', '+62 21 6508688', '2024-12-17 00:16:38', '2024-12-17 18:17:17', NULL, NULL, 'Super Admin', 'Super Admin', NULL, NULL),
	(5, 'company_address', 'Rukan Mitra Sunter, Jl. Mitra Sunter Bulevar No. B32, Sunter Jaya, Kec. Tj. Priok, Jkt Utara, Daerah Khusus Ibukota Jakarta 14350, Indonesia', '2024-12-17 00:16:38', '2024-12-17 18:17:17', NULL, NULL, 'Super Admin', 'Super Admin', NULL, NULL),
	(6, 'fee_loan_regular', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(7, 'fee_loan_funding', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(8, 'fee_loan_social', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(9, 'default_date_format', 'd-m-Y', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(10, 'default_time_format', 'H:i:s', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(11, 'default_language', 'id', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(12, 'decimal_digit_amount', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(13, 'decimal_digit_percent', '2', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(14, 'site_microsoft_api_host', NULL, '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(15, 'site_microsoft_api_key', NULL, '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(16, 'mail_type', 'smtp', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(17, 'mail_host', 'sandbox.smtp.mailtrap.io', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(18, 'mail_username', 'e795e7a21b5af5', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(19, 'mail_password', 'cebc03e3d821e3', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(20, 'mail_encryption', 'tls', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(21, 'mail_port', '2525', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(22, 'mail_from_address', 'hello@example.com', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(23, 'mail_from_name', 'Goldmart', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(24, 'midtrans_environment', NULL, '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(25, 'midtrans_merchant_id', NULL, '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(26, 'midtrans_client_key', NULL, '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(27, 'midtrans_server_key', NULL, '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(28, 'sale_prefix', 'INV', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(29, 'sale_last_number', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(30, 'loan_regular_prefix', 'LRE', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(31, 'loan_regular_last_number', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(32, 'loan_funding_prefix', 'LFU', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(33, 'loan_funding_last_number', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(34, 'loan_social_prefix', 'LSO', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(35, 'loan_social_last_number', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(36, 'saving_deposit_prefix', 'DSA', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(37, 'saving_deposit_last_number', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(38, 'saving_withdraw_prefix', 'WSA', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(39, 'saving_withdraw_last_number', '0', '2024-12-17 00:16:38', '2024-12-17 00:16:38', NULL, NULL, 'Super Admin', NULL, NULL, NULL),
	(40, 'company_logo', '/images/company_logo/company_logo_20241218033941.png', '2024-12-17 20:34:24', '2024-12-17 20:39:41', NULL, NULL, NULL, 'Super Admin', NULL, NULL),
	(41, 'company_logo_desktop', '/images/company_logo_desktop/company_logo_desktop_20241218034023.png', '2024-12-17 20:34:24', '2024-12-17 20:40:23', NULL, NULL, NULL, 'Super Admin', NULL, NULL),
	(42, 'company_logo_toggle', '/images/company_logo_toggle/company_logo_toggle_20241218034202.jpg', '2024-12-17 20:34:24', '2024-12-17 20:42:02', NULL, NULL, NULL, 'Super Admin', NULL, NULL),
	(43, 'tahun_periode_aktif', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
