-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 12:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wvsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `category`, `message`, `status`) VALUES
(1, 'USER DISABLED', 'user id 21 is disabled', 0),
(2, 'USER LOGIN', '19 has been logged out', 0),
(3, 'USER LOGIN', 'USER ID: 19 has been logged in', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `id_card` varchar(100) DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_requested` datetime DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `stat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `fullname`, `contact`, `id_card`, `profile`, `school`, `added_by`, `date_requested`, `date_added`, `stat`) VALUES
(1005, 'Wvsu Admin', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0),
(1008, 'Berus Lee', NULL, 'XILBVH2024-07-26-15-01-00QN5EHD.png', NULL, 1, 1005, NULL, '2024-07-26 00:00:00', 0),
(1009, 'Web Suee', NULL, 'GAVRKM2024-07-26-15-02-23TFCBQN.png', NULL, 2, 1005, NULL, '2024-07-26 00:00:00', 0),
(1010, 'Fuji Yhama', NULL, 'XVTRMZ2024-07-27-01-21-31DWBTUY.png', NULL, 1, 1008, NULL, '2024-07-27 00:00:00', 0),
(1012, 'Ronz', NULL, 'TCILXF2024-07-27-01-47-00YDAUOT.png', NULL, 1, 1008, NULL, '2024-07-27 00:00:00', 0),
(1013, 'Izy', NULL, 'LFOVGT2024-07-27-04-57-27BYNURE.png', NULL, 2, 1009, NULL, '2024-07-27 00:00:00', 0),
(1017, 'Tyrone L Malocon', NULL, 'XCYDGT2024-11-10-10-49-30DTHO5R.png', NULL, 1, 1008, NULL, '2024-11-10 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(15) NOT NULL,
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
  `stat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `emp_id`, `from`, `from_school`, `sender_email`, `school`, `caption`, `doctype`, `details`, `purpose`, `receiving`, `file`, `date_created`, `date_received`, `received_by`, `copy_of`, `stat`) VALUES
(43, 0, 'Tyrone Lee Emzy', 2, 'xipebav349@leacore.com', 1, 'Thesis Docu', 'pdf', 'this is a thesis docu shared by me', 'just share', NULL, 'TRUE.pdf', '2024-07-27 00:00:00', '2024-07-27 00:00:00', 1008, 0, -1),
(44, 1008, 'Berus Lee', 1, 'tyronemalocon@gmail.com', 2, 'FIles on hand', 'doctype', 'details', 'thesis docu', NULL, 'YJGFBO2024-07-27-16-17-15ORUQFP.xlsx', '2024-07-27 04:17:15', '2024-08-01 00:00:00', 1009, 0, 0),
(45, 0, 'Tyrone L', 2, 'xipebav349@leacore.com', 1, 'Thesis Docu', 'pdf', 'this is a thesis docu shared by me', 'just share', NULL, 'TRUE.docx', '2024-07-28 00:00:00', '2024-07-28 00:00:00', 1008, 0, 0),
(46, 1008, 'Berus Lee', 1, 'tyronemalocon@gmail.com', 2, 'FIles on hand', 'doctype', 'this is a thesis docu shared by me', 'Emergency/Medical Aid', NULL, 'CHVRDB2024-08-22-07-19-57BDUHY5.pdf', '2024-08-22 07:19:57', '2024-08-22 00:00:00', 1009, 0, 0),
(47, 1009, 'Web Suee', 2, 'tyrone@clearmindai.com', 1, 'VPN access', '123456', '123456', '123456', NULL, 'RAYFXO2024-08-22-07-33-47WDCAFN.pdf', '2024-08-22 07:33:47', '2024-08-22 07:33:47', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `file_downloads`
--

CREATE TABLE `file_downloads` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `device` varchar(500) DEFAULT NULL,
  `download_times` int(11) DEFAULT NULL,
  `date_downloaded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_downloads`
--

INSERT INTO `file_downloads` (`id`, `emp_id`, `school`, `file_id`, `device`, `download_times`, `date_downloaded`) VALUES
(14, 1008, 1, 43, 'Windows NT LENOVO-JKCN42WW 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', 1, '2024-08-22 07:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `file_inventory`
--

CREATE TABLE `file_inventory` (
  `id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `date_send` datetime DEFAULT NULL,
  `date_received` datetime DEFAULT NULL,
  `file_status` int(11) DEFAULT NULL,
  `stat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_viewer`
--

CREATE TABLE `file_viewer` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `device` varchar(500) DEFAULT NULL,
  `date_viewed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_viewer`
--

INSERT INTO `file_viewer` (`id`, `emp_id`, `file_id`, `school`, `device`, `date_viewed`) VALUES
(19, 1009, 44, 2, 'Windows NT YRO 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-08-01 02:00:35'),
(20, 1008, 44, 1, 'Windows NT YRO 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-08-01 01:59:08'),
(21, 1008, 45, 1, 'Windows NT LENOVO-JKCN42WW 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-09-22 14:44:47'),
(22, 1008, 43, 1, 'Windows NT LENOVO-JKCN42WW 10.0 build 22631 (Windows 11) AMD64   \rLENOVO        \r\r Model  \r82TT   \r\r', '2024-08-22 07:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `myfile`
--

CREATE TABLE `myfile` (
  `file_id` int(11) NOT NULL,
  `file_title` char(200) DEFAULT NULL,
  `file_details` varchar(500) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `privacy` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myfile`
--

INSERT INTO `myfile` (`file_id`, `file_title`, `file_details`, `filename`, `emp_id`, `school_id`, `privacy`, `date_added`, `stat`, `hash`) VALUES
(1, 'sdfds', 'dsafd', 'ZKIVMJ2024-07-27-16-54-22RPFYAH.xlsx', 1008, 1, 0, '2024-07-27 15:00:29', -1, 'dsf'),
(2, 'sadasd', 'dsafd', 'YCMKBA2024-07-28-03-12-15DWBYNP.docx', 1010, 1, 0, NULL, 0, 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `otp_code`
--

CREATE TABLE `otp_code` (
  `id` int(11) NOT NULL,
  `email_address` varchar(250) DEFAULT NULL,
  `otp_code` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `otp_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_code`
--

INSERT INTO `otp_code` (`id`, `email_address`, `otp_code`, `stat`, `otp_date`) VALUES
(16, 'tyrone@clearmindai.com', '18409', 0, '2024-08-24 03:49:53'),
(18, 'tyronemalocon@gmail.com', '86249', 0, '2024-08-25 07:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
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
  `stat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school`, `full_name`, `campus`, `department`, `address`, `school_code`, `added_by`, `date_added`, `details`, `fb_link`, `stat`) VALUES
(1, 'WVSU', 'West Visayas State University', 'Himamaylan', 'ICT', NULL, '13725', 1, '2024-07-17 12:57:02', NULL, NULL, 0),
(2, 'WVSU', 'West Visayas State University', 'Kabankalan', 'ICT', NULL, '1041', 1, '2024-07-18 17:54:48', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT 0,
  `code` varchar(500) DEFAULT NULL,
  `stat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `emp_id`, `type`, `active`, `code`, `stat`) VALUES
(5, 'wvsu', 'wvsu', 1005, 'SUPERADMIN', 1, 'TYRONELEEEMZ', 0),
(19, 'tyronemalocon@gmail.com', '1', 1008, 'ADMIN', 1, 'TYRONELEEEMZ132343', 0),
(20, 'tyrone@clearmindai.com', '1', 1009, 'ADMIN', 1, '343TYRONELEEEMZ', 0),
(21, 'yonak49184@fuzitea.com', '26098', 1010, 'ICT', 0, 'TYRONELEEEMZ2664', 0),
(22, 'vasohap969@hostlace.com', '05283', 1012, 'ICT', 1, 'DTIZOR2024-07-27-01-47-00CFUATY1012', 0),
(23, 'bexojer621@leacore.com', '35201', 1013, 'ICT', 1, 'CVMARF2024-07-27-04-57-27NUYFHCwvsu-codeyro1013', 0),
(27, 'tyronemalocon+124@gmail.com', '64317', 1017, 'ICT', 1, 'RMKVXY2024-11-10-10-49-30POQCFWwvsu-codeyro1017', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_downloads`
--
ALTER TABLE `file_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_inventory`
--
ALTER TABLE `file_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_viewer`
--
ALTER TABLE `file_viewer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myfile`
--
ALTER TABLE `myfile`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `otp_code`
--
ALTER TABLE `otp_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `file_downloads`
--
ALTER TABLE `file_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `file_inventory`
--
ALTER TABLE `file_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_viewer`
--
ALTER TABLE `file_viewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `myfile`
--
ALTER TABLE `myfile`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otp_code`
--
ALTER TABLE `otp_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
