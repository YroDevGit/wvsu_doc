-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for wvsu
CREATE DATABASE IF NOT EXISTS `wvsu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `wvsu`;

-- Dumping structure for table wvsu.emp
CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `id_card` varchar(100) DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_requested` datetime DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `stat` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1014 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.emp: ~6 rows (approximately)
REPLACE INTO `emp` (`id`, `fullname`, `contact`, `id_card`, `profile`, `school`, `added_by`, `date_requested`, `date_added`, `stat`) VALUES
	(1005, 'Wvsu Admin', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0),
	(1008, 'Berus Lee', NULL, 'XILBVH2024-07-26-15-01-00QN5EHD.png', NULL, 1, 1005, NULL, '2024-07-26 00:00:00', 0),
	(1009, 'Web Suee', NULL, 'GAVRKM2024-07-26-15-02-23TFCBQN.png', NULL, 2, 1005, NULL, '2024-07-26 00:00:00', 0),
	(1010, 'Fuji Yhama', NULL, 'XVTRMZ2024-07-27-01-21-31DWBTUY.png', NULL, 1, 1008, NULL, '2024-07-27 00:00:00', 0),
	(1012, 'Ronz', NULL, 'TCILXF2024-07-27-01-47-00YDAUOT.png', NULL, 1, 0, NULL, '2024-07-27 00:00:00', 0),
	(1013, 'Izy', NULL, 'LFOVGT2024-07-27-04-57-27BYNURE.png', NULL, 2, 1009, NULL, '2024-07-27 00:00:00', 0);

-- Dumping structure for table wvsu.file
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT 0,
  `from` varchar(150) DEFAULT NULL,
  `sender_email` varchar(500) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `doctype` varchar(130) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `purpose` varchar(300) DEFAULT NULL,
  `receiving` varchar(100) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_received` datetime DEFAULT NULL,
  `received_by` int(11) DEFAULT 0,
  `copy_of` int(11) DEFAULT 0,
  `stat` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file: ~1 rows (approximately)
REPLACE INTO `file` (`id`, `emp_id`, `from`, `sender_email`, `school`, `caption`, `doctype`, `details`, `purpose`, `receiving`, `file`, `date_created`, `date_received`, `received_by`, `copy_of`, `stat`) VALUES
	(43, 0, 'Tyrone Lee Emz', 'xipebav349@leacore.com', 1, 'Thesis Docu', 'pdf', 'this is a thesis docu shared by me', 'just share', NULL, 'TRUE.pdf', '2024-07-27 00:00:00', '2024-07-27 00:00:00', 1008, 0, -1);

-- Dumping structure for table wvsu.file_downloads
CREATE TABLE IF NOT EXISTS `file_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `device` varchar(500) DEFAULT NULL,
  `download_times` int(11) DEFAULT NULL,
  `date_downloaded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file_downloads: ~1 rows (approximately)

-- Dumping structure for table wvsu.file_inventory
CREATE TABLE IF NOT EXISTS `file_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `date_send` datetime DEFAULT NULL,
  `date_received` datetime DEFAULT NULL,
  `file_status` int(11) DEFAULT NULL,
  `stat` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file_inventory: ~0 rows (approximately)

-- Dumping structure for table wvsu.file_viewer
CREATE TABLE IF NOT EXISTS `file_viewer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `device` varchar(500) DEFAULT NULL,
  `date_viewed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file_viewer: ~0 rows (approximately)

-- Dumping structure for table wvsu.school
CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(120) DEFAULT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `campus` varchar(120) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `school_code` varchar(100) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `details` varchar(300) DEFAULT NULL,
  `fb_link` varchar(300) DEFAULT NULL,
  `stat` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.school: ~2 rows (approximately)
REPLACE INTO `school` (`id`, `school`, `full_name`, `campus`, `address`, `school_code`, `added_by`, `date_added`, `details`, `fb_link`, `stat`) VALUES
	(1, 'WVSU', 'West Visayas State University', 'Himamaylan', NULL, '13725', 1, '2024-07-17 12:57:02', NULL, NULL, 0),
	(2, 'WVSU', 'West Visayas State University', 'Kabankalan', NULL, '1041', 1, '2024-07-18 17:54:48', NULL, NULL, 0);

-- Dumping structure for table wvsu.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT 0,
  `code` varchar(500) DEFAULT NULL,
  `stat` int(11) DEFAULT 0,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.users: ~6 rows (approximately)
REPLACE INTO `users` (`user_id`, `username`, `password`, `emp_id`, `type`, `active`, `code`, `stat`) VALUES
	(5, 'wvsu', 'wvsu', 1005, 'SUPERADMIN', 1, 'TYRONELEEEMZ', 0),
	(19, 'tyronemalocon@gmail.com', '62415', 1008, 'ADMIN', 1, 'TYRONELEEEMZ132343', 0),
	(20, 'tyrone@clearmindai.com', '04285', 1009, 'ADMIN', 1, '343TYRONELEEEMZ', 0),
	(21, 'yonak49184@fuzitea.com', '26098', 1010, 'ICT', 1, 'TYRONELEEEMZ2664', 0),
	(22, 'vasohap969@hostlace.com', '', 1012, 'ICT', 0, 'DTIZOR2024-07-27-01-47-00CFUATY1012', 0),
	(23, 'bexojer621@leacore.com', '35201', 1013, 'ICT', 1, 'CVMARF2024-07-27-04-57-27NUYFHCwvsu-codeyro1013', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
