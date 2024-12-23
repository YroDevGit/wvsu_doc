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

-- Dumping structure for table wvsu.activity
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.activity: ~56 rows (approximately)
REPLACE INTO `activity` (`id`, `category`, `message`, `status`) VALUES
	(1, 'USER DISABLED', 'user id 21 is disabled', 0),
	(2, 'USER LOGIN', '19 has been logged out', 0),
	(3, 'USER LOGIN', 'USER ID: 19 has been logged in', 0),
	(4, 'USER LOGIN', 'USERID: 19 has been logged out', 0),
	(5, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(6, 'USER LOGIN', 'USER ID: 19 has been logged in', 0),
	(7, 'USER LOGIN', 'USER ID: 19 has been logged in', 0),
	(8, 'USER LOGIN', 'USER ID: 19 has been logged in', 0),
	(9, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(10, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(11, 'USER LOGIN', 'USER ID: 19 has been logged in', 0),
	(12, 'USER LOGIN', 'USERID: 19 has been logged out', 0),
	(13, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(14, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(15, 'USER LOGIN', 'USER ID: 19 has been logged in', 0),
	(16, 'USER LOGIN', 'USERID: 19 has been logged out', 0),
	(17, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(18, 'USER LOGIN', 'USER ID: 20 has been logged in', 0),
	(19, 'USER LOGIN', 'USERID: 20 has been logged out', 0),
	(20, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(21, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(22, 'USER LOGIN', 'USER ID: 20 has been logged in', 0),
	(23, 'USER LOGIN', 'USERID: 20 has been logged out', 0),
	(24, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(25, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(26, 'USER LOGIN', 'USER ID: 20 has been logged in', 0),
	(27, 'USER LOGIN', 'USERID: 20 has been logged out', 0),
	(28, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(29, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(30, 'USER LOGIN', 'USER ID: 20 has been logged in', 0),
	(31, 'USER LOGIN', 'USERID: 20 has been logged out', 0),
	(32, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(33, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(34, 'USER LOGIN', 'USER ID: 20 has been logged in', 0),
	(35, 'USER LOGIN', 'USERID: 20 has been logged out', 0),
	(36, 'USER LOGIN', 'USER ID: 20 has been logged in', 0),
	(37, 'USER LOGIN', 'USERID: 20 has been logged out', 0),
	(38, 'USER LOGIN', 'USER ID: 27 has been logged in', 0),
	(39, 'USER LOGIN', 'USERID: 27 has been logged out', 0),
	(40, 'USER LOGIN', 'USER ID: 23 has been logged in', 0),
	(41, 'USER LOGIN', 'USERID: 23 has been logged out', 0),
	(42, 'USER LOGIN', 'USER ID: 27 has been logged in', 0),
	(43, 'USER LOGIN', 'USERID: 27 has been logged out', 0),
	(44, 'USER LOGIN', 'USER ID: 23 has been logged in', 0),
	(45, 'USER LOGIN', 'USERID: 23 has been logged out', 0),
	(46, 'USER LOGIN', 'USER ID: 27 has been logged in', 0),
	(47, 'USER LOGIN', 'USERID: 27 has been logged out', 0),
	(48, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(49, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(50, 'USER LOGIN', 'USER ID: 23 has been logged in', 0),
	(51, 'USER LOGIN', 'USERID: 23 has been logged out', 0),
	(52, 'USER LOGIN', 'USER ID: 5 has been logged in', 0),
	(53, 'USER LOGIN', 'USERID: 5 has been logged out', 0),
	(54, 'USER LOGIN', 'USER ID: 27 has been logged in', 0),
	(55, 'USER LOGIN', 'USERID: 27 has been logged out', 0),
	(56, 'USER LOGIN', 'USER ID: 27 has been logged in', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=1018 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.emp: ~7 rows (approximately)
REPLACE INTO `emp` (`id`, `fullname`, `contact`, `id_card`, `profile`, `school`, `added_by`, `date_requested`, `date_added`, `stat`) VALUES
	(1005, 'Wvsu Admin', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0),
	(1008, 'Berus Lee', NULL, 'XILBVH2024-07-26-15-01-00QN5EHD.png', NULL, 1, 1005, NULL, '2024-07-26 00:00:00', 0),
	(1009, 'Web Suee', NULL, 'GAVRKM2024-07-26-15-02-23TFCBQN.png', NULL, 2, 1005, NULL, '2024-07-26 00:00:00', 0),
	(1010, 'Fuji Yhama', NULL, 'XVTRMZ2024-07-27-01-21-31DWBTUY.png', NULL, 1, 1008, NULL, '2024-07-27 00:00:00', 0),
	(1012, 'Ronz', NULL, 'TCILXF2024-07-27-01-47-00YDAUOT.png', NULL, 1, 1008, NULL, '2024-07-27 00:00:00', 0),
	(1013, 'Izy', NULL, 'LFOVGT2024-07-27-04-57-27BYNURE.png', NULL, 2, 1009, NULL, '2024-07-27 00:00:00', 0),
	(1017, 'Tyrone L Malocon', NULL, 'XCYDGT2024-11-10-10-49-30DTHO5R.png', NULL, 1, 1008, NULL, '2024-11-10 00:00:00', 0);

-- Dumping structure for table wvsu.file
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT 0,
  `from` varchar(150) DEFAULT NULL,
  `from_school` int(12) DEFAULT 0,
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file: ~5 rows (approximately)
REPLACE INTO `file` (`id`, `emp_id`, `from`, `from_school`, `sender_email`, `school`, `caption`, `doctype`, `details`, `purpose`, `receiving`, `file`, `date_created`, `date_received`, `received_by`, `copy_of`, `stat`) VALUES
	(43, 0, 'Tyrone Lee Emzy', 2, 'xipebav349@leacore.com', 1, 'Thesis Docu', 'pdf', 'this is a thesis docu shared by me', 'just share', NULL, 'TRUE.pdf', '2024-07-27 00:00:00', '2024-07-27 00:00:00', 1008, 0, -1),
	(44, 1008, 'Berus Lee', 1, 'tyronemalocon@gmail.com', 2, 'FIles on hand', 'doctype', 'details', 'thesis docu', NULL, 'YJGFBO2024-07-27-16-17-15ORUQFP.xlsx', '2024-07-27 04:17:15', '2024-08-01 00:00:00', 1009, 0, 0),
	(45, 0, 'Tyrone L', 2, 'xipebav349@leacore.com', 1, 'Thesis Docu', 'pdf', 'this is a thesis docu shared by me', 'just share', NULL, 'TRUE.docx', '2024-07-28 00:00:00', '2024-07-28 00:00:00', 1008, 0, 0),
	(46, 1008, 'Berus Lee', 1, 'tyronemalocon@gmail.com', 2, 'FIles on hand', 'doctype', 'this is a thesis docu shared by me', 'Emergency/Medical Aid', NULL, 'CHVRDB2024-08-22-07-19-57BDUHY5.pdf', '2024-08-22 07:19:57', '2024-08-22 00:00:00', 1009, 0, 0),
	(47, 1009, 'Web Suee', 2, 'tyrone@clearmindai.com', 1, 'VPN access', '123456', '123456', '123456', NULL, 'RAYFXO2024-08-22-07-33-47WDCAFN.pdf', '2024-08-22 07:33:47', '2024-08-22 07:33:47', 0, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file_downloads: ~1 rows (approximately)
REPLACE INTO `file_downloads` (`id`, `emp_id`, `school`, `file_id`, `device`, `download_times`, `date_downloaded`) VALUES
	(14, 1008, 1, 43, 'Windows NT LENOVO-JKCN42WW 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', 1, '2024-08-22 07:09:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.file_viewer: ~4 rows (approximately)
REPLACE INTO `file_viewer` (`id`, `emp_id`, `file_id`, `school`, `device`, `date_viewed`) VALUES
	(19, 1009, 44, 2, 'Windows NT YRO 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-08-01 02:00:35'),
	(20, 1008, 44, 1, 'Windows NT YRO 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-08-01 01:59:08'),
	(21, 1008, 45, 1, 'Windows NT LENOVO-JKCN42WW 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-11-11 08:04:07'),
	(22, 1008, 43, 1, 'Windows NT LENOVO-JKCN42WW 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-08-22 07:09:36');

-- Dumping structure for table wvsu.myfile
CREATE TABLE IF NOT EXISTS `myfile` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` char(200) DEFAULT NULL,
  `file_details` varchar(500) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `privacy` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.myfile: ~2 rows (approximately)
REPLACE INTO `myfile` (`file_id`, `file_title`, `file_details`, `filename`, `emp_id`, `school_id`, `privacy`, `date_added`, `stat`, `hash`) VALUES
	(1, 'sdfds', 'dsafd', 'ZKIVMJ2024-07-27-16-54-22RPFYAH.xlsx', 1008, 1, 0, '2024-07-27 15:00:29', -1, 'dsf'),
	(2, 'sadasd', 'dsafd', 'YCMKBA2024-07-28-03-12-15DWBYNP.docx', 1010, 1, 0, NULL, 0, 'dsf');

-- Dumping structure for table wvsu.otp_code
CREATE TABLE IF NOT EXISTS `otp_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(250) DEFAULT NULL,
  `otp_code` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `otp_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.otp_code: ~2 rows (approximately)
REPLACE INTO `otp_code` (`id`, `email_address`, `otp_code`, `stat`, `otp_date`) VALUES
	(16, 'tyrone@clearmindai.com', '18409', 0, '2024-08-24 03:49:53'),
	(18, 'tyronemalocon@gmail.com', '86249', 0, '2024-08-25 07:52:50');

-- Dumping structure for table wvsu.registry
CREATE TABLE IF NOT EXISTS `registry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `control_number` varchar(200) NOT NULL,
  `date_received` date NOT NULL,
  `source` varchar(200) NOT NULL,
  `date_comminication` date DEFAULT NULL,
  `subject_matter` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `office_code` varchar(200) NOT NULL,
  `date_released` date NOT NULL,
  `received_by` varchar(200) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `school` int(11) DEFAULT NULL,
  `file_id` int(11) NOT NULL DEFAULT 1,
  `to_school` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.registry: ~1 rows (approximately)
REPLACE INTO `registry` (`id`, `user`, `control_number`, `date_received`, `source`, `date_comminication`, `subject_matter`, `address`, `office_code`, `date_released`, `received_by`, `remarks`, `school`, `file_id`, `to_school`) VALUES
	(6, 20, '32746326453', '2024-12-10', 'PASIG', '2024-12-08', 'matter', 'person', 'office', '2024-12-04', 'tyrone', 'sample remarks', 2, 1, 0);

-- Dumping structure for table wvsu.school
CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(120) DEFAULT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `campus` varchar(120) DEFAULT NULL,
  `department` varchar(300) DEFAULT 'ICT',
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
REPLACE INTO `school` (`id`, `school`, `full_name`, `campus`, `department`, `address`, `school_code`, `added_by`, `date_added`, `details`, `fb_link`, `stat`) VALUES
	(1, 'WVSU', 'West Visayas State University', 'Himamaylan', 'ICT', NULL, '13725', 1, '2024-07-17 12:57:02', NULL, NULL, 0),
	(2, 'WVSU', 'West Visayas State University', 'Himamaylan', 'IT', NULL, '1041', 1, '2024-07-18 17:54:48', NULL, NULL, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wvsu.users: ~7 rows (approximately)
REPLACE INTO `users` (`user_id`, `username`, `password`, `emp_id`, `type`, `active`, `code`, `stat`) VALUES
	(5, 'wvsu', 'wvsu', 1005, 'SUPERADMIN', 1, 'TYRONELEEEMZ', 0),
	(19, 'tyronemalocon@gmail.com', '1', 1008, 'ADMIN', 1, 'TYRONELEEEMZ132343', 0),
	(20, 'tyrone@clearmindai.com', '1', 1009, 'ADMIN', 1, '343TYRONELEEEMZ', 0),
	(21, 'yonak49184@fuzitea.com', '26098', 1010, 'ICT', 0, 'TYRONELEEEMZ2664', 0),
	(22, 'vasohap969@hostlace.com', '05283', 1012, 'ICT', 1, 'DTIZOR2024-07-27-01-47-00CFUATY1012', 0),
	(23, 'bexojer621@leacore.com', '35201', 1013, 'ICT', 1, 'CVMARF2024-07-27-04-57-27NUYFHCwvsu-codeyro1013', 0),
	(27, 'tyronemalocon+124@gmail.com', '64317', 1017, 'ICT', 1, 'RMKVXY2024-11-10-10-49-30POQCFWwvsu-codeyro1017', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
