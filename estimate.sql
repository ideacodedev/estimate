-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 11:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estimate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_firstname` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_firstname`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ผู้ดูแลระบบ นามสกุล', 'admin', '$2y$12$nst6YBYOf1aqJW8d66oQa.x8uDFH9.dqqYeUCjYNV5ldl.JlsG8Ia', '2024-02-20 19:35:47', '2024-02-20 19:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_at`
--

CREATE TABLE `tbl_at` (
  `at_id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `room_id` varchar(4) NOT NULL,
  `at_role` int(1) NOT NULL COMMENT 'student=1,teacher=2',
  `at_year` varchar(10) NOT NULL,
  `at_tarm` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_at`
--

INSERT INTO `tbl_at` (`at_id`, `user_id`, `room_id`, `at_role`, `at_year`, `at_tarm`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 1, '2566', '2', '2024-05-08 15:06:46', '2024-05-08 15:06:46'),
(2, '1', '3', 2, '2567', '3', '2024-05-08 15:29:11', '2024-05-08 15:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_at_list`
--

CREATE TABLE `tbl_at_list` (
  `at_list_id` int(10) NOT NULL,
  `at_id` varchar(10) NOT NULL,
  `at_list_score` varchar(10) NOT NULL,
  `at_list_note` text NOT NULL,
  `room_ed_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_at_list`
--

INSERT INTO `tbl_at_list` (`at_list_id`, `at_id`, `at_list_score`, `at_list_note`, `room_ed_id`, `created_at`, `updated_at`) VALUES
(1, '1', '5', '', '46', '2024-05-08 15:06:46', '2024-05-08 15:06:46'),
(2, '1', '4', '', '48', '2024-05-08 15:06:46', '2024-05-08 15:06:46'),
(3, '1', '3', '', '50', '2024-05-08 15:06:46', '2024-05-08 15:06:46'),
(4, '2', '5', '', '17', '2024-05-08 15:29:11', '2024-05-08 15:29:11'),
(5, '2', '5', '', '18', '2024-05-08 15:29:11', '2024-05-08 15:29:11'),
(6, '2', '5', '', '19', '2024-05-08 15:29:11', '2024-05-08 15:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_at_title`
--

CREATE TABLE `tbl_at_title` (
  `at_title_id` int(5) NOT NULL,
  `at_title_text` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_at_title`
--

INSERT INTO `tbl_at_title` (`at_title_id`, `at_title_text`, `created_at`, `updated_at`) VALUES
(1, '<h2 style=\"text-align: center; line-height: 1;\">&nbsp;แบบประเมินการใช้งานอุปกรณ์อิเล็กทรอนิกส์ ภายในห้องเรียน</h2>\r\n<p style=\"line-height: 1;\"><span lang=\"TH\" style=\"font-size: 18.0pt; font-family: \'TH SarabunPSK\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: TH;\"><span lang=\"TH\" style=\"font-size: 16.0pt; font-family: \'TH SarabunPSK\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: TH;\">&nbsp; &nbsp; &nbsp;แบบประเมินฉบับนี้มีทั้งหมด 3 ตอน ขอให้ผู้ตอบแบบประเมินตอบให้ครบทั้ง 3 ตอน <span style=\"mso-spacerun: yes;\">&nbsp;&nbsp;</span>เพื่อให้การดำเนินโครงการเป็นไปตามวัตถุประสงค์และเพื่อเป็นประโยชน์ในการนำไปใช้ต่อไป</span></span></p>\r\n<p style=\"line-height: 1;\"><span lang=\"TH\" style=\"font-size: 16.0pt; font-family: \'TH SarabunPSK\',sans-serif;\">ระดับความพึงพอใจ / ความรู้ความเข้าใจ / การนำไปใช้ ต่อการเข้าร่วมโครงการ</span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 12pt 0cm 6pt; line-height: 1;\"><u><span lang=\"TH\" style=\"font-size: 16.0pt; font-family: \'TH SarabunPSK\',sans-serif;\">คำชี้แจง</span></u><span lang=\"TH\" style=\"font-size: 16.0pt; font-family: \'TH SarabunPSK\',sans-serif;\"> โปรดทำเครื่องหมาย/ลงในช่องที่ตรงกับความพึงพอใจ/ความรู้ความเข้าใจ/การนำไปใช้ของท่านเพียงระดับเดียว</span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 12pt 0cm 6pt; line-height: 1;\">&nbsp;</p>', NULL, '2024-03-10 15:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building`
--

CREATE TABLE `tbl_building` (
  `building_id` int(4) NOT NULL,
  `building_name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_building`
--

INSERT INTO `tbl_building` (`building_id`, `building_name`, `created_at`, `updated_at`) VALUES
(2, 'อาคาร 6', '2024-02-21 01:16:54', '2024-03-02 07:48:10'),
(3, 'อาคาร 7', '2024-03-02 22:40:26', '2024-03-02 22:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ed`
--

CREATE TABLE `tbl_ed` (
  `ed_id` int(4) NOT NULL,
  `ed_device` varchar(150) NOT NULL,
  `ed_type_id` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_ed`
--

INSERT INTO `tbl_ed` (`ed_id`, `ed_device`, `ed_type_id`, `created_at`, `updated_at`) VALUES
(1, 'คอมพิวเตอร์', '1', '2024-02-21 02:09:13', '2024-02-21 02:12:11'),
(2, 'โต๊ะ', '2', '2024-02-21 02:10:03', '2024-02-21 02:12:18'),
(3, 'ไมค์', '1', '2024-03-02 23:14:49', '2024-03-02 23:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ed_type`
--

CREATE TABLE `tbl_ed_type` (
  `ed_type_id` int(4) NOT NULL,
  `ed_type_name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_ed_type`
--

INSERT INTO `tbl_ed_type` (`ed_type_id`, `ed_type_name`, `created_at`, `updated_at`) VALUES
(1, 'อุปกรณ์ไฟฟ้า', '2024-02-21 01:31:42', '2024-02-21 02:08:51'),
(2, 'สิ่งของ', '2024-02-21 01:31:49', '2024-02-21 02:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecturer`
--

CREATE TABLE `tbl_lecturer` (
  `lecturer_id` int(10) NOT NULL,
  `lecturer_firstname` varchar(150) NOT NULL,
  `lecturer_email` varchar(150) NOT NULL,
  `lecturer_address` text NOT NULL,
  `lecturer_numeber` varchar(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_lecturer`
--

INSERT INTO `tbl_lecturer` (`lecturer_id`, `lecturer_firstname`, `lecturer_email`, `lecturer_address`, `lecturer_numeber`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'อาจารย์ นามสกุล', 'teacher@gmail.com', 'ทดสอบ', '(012) 345-5444', 'teacher', '$2y$12$onLdzN.jIKKpknXY5s3CW.wBhthWAsi1.w8FtnwjYu8rU/6sj7jnK', '2024-02-20 20:23:26', '2024-02-20 21:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officer`
--

CREATE TABLE `tbl_officer` (
  `officer_id` int(10) NOT NULL,
  `officer_firstname` varchar(150) NOT NULL,
  `officer_address` text NOT NULL,
  `officer_email` varchar(150) NOT NULL,
  `officer_number` varchar(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_officer`
--

INSERT INTO `tbl_officer` (`officer_id`, `officer_firstname`, `officer_address`, `officer_email`, `officer_number`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'เจ้าหน้าที่ นามสกุล', '11 ต.ทดสอบ อ.ทดสอบ จ.ทดสอบ', 'officer@gmail.com', '(012) 345-6789', 'officer', '$2y$12$Dnks6bFw0FeQbMLvS1aB6uNppz1k2qAUbqPXIAOjQQ0dGlvR5B1b.', '2024-03-02 23:37:57', '2024-03-10 14:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officer_room`
--

CREATE TABLE `tbl_officer_room` (
  `officer_room_id` int(10) NOT NULL,
  `room_id` varchar(4) NOT NULL,
  `officer_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_officer_room`
--

INSERT INTO `tbl_officer_room` (`officer_room_id`, `room_id`, `officer_id`, `created_at`, `updated_at`) VALUES
(3, '1', '2', '2024-03-10 14:36:07', '2024-03-10 14:36:07'),
(4, '3', '2', '2024-03-10 14:36:07', '2024-03-10 14:36:07'),
(5, '4', '2', '2024-03-10 14:36:07', '2024-03-10 14:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(4) NOT NULL,
  `room_name` varchar(150) NOT NULL,
  `building_id` varchar(4) NOT NULL,
  `room_floor` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `building_id`, `room_floor`, `created_at`, `updated_at`) VALUES
(1, '201', '2', '2', '2024-03-02 22:55:53', '2024-05-08 15:55:24'),
(3, '202', '2', '2', '2024-03-02 23:41:19', '2024-05-08 15:55:20'),
(4, '203', '2', '2', '2024-03-02 23:41:27', '2024-05-08 15:55:15'),
(5, '204', '2', '2', '2024-03-03 09:33:10', '2024-05-08 15:54:33'),
(6, '301', '2', '3', '2024-03-03 09:33:18', '2024-05-08 15:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_ed`
--

CREATE TABLE `tbl_room_ed` (
  `room_ed_id` int(10) NOT NULL,
  `ed_id` varchar(4) NOT NULL,
  `room_id` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_room_ed`
--

INSERT INTO `tbl_room_ed` (`room_ed_id`, `ed_id`, `room_id`, `created_at`, `updated_at`) VALUES
(17, '1', '3', '2024-03-02 23:41:19', '2024-03-02 23:41:19'),
(18, '2', '3', '2024-03-02 23:41:19', '2024-03-02 23:41:19'),
(19, '3', '3', '2024-03-02 23:41:19', '2024-03-02 23:41:19'),
(20, '1', '4', '2024-03-02 23:41:27', '2024-03-02 23:41:27'),
(21, '2', '4', '2024-03-02 23:41:27', '2024-03-02 23:41:27'),
(22, '1', '5', '2024-03-03 09:33:10', '2024-03-03 09:33:10'),
(23, '2', '5', '2024-03-03 09:33:10', '2024-03-03 09:33:10'),
(24, '3', '5', '2024-03-03 09:33:10', '2024-03-03 09:33:10'),
(25, '1', '6', '2024-03-03 09:33:18', '2024-03-03 09:33:18'),
(26, '2', '6', '2024-03-03 09:33:18', '2024-03-03 09:33:18'),
(30, '3', '6', '2024-03-09 05:19:33', '2024-03-09 05:19:33'),
(46, '1', '1', '2024-03-09 05:35:42', '2024-03-09 05:35:42'),
(48, '3', '1', '2024-03-09 05:39:29', '2024-03-09 05:39:29'),
(50, '2', '1', '2024-03-09 05:39:50', '2024-03-09 05:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(10) NOT NULL,
  `student_code` varchar(10) NOT NULL,
  `student_firstname` varchar(150) NOT NULL,
  `student_email` varchar(150) NOT NULL,
  `student_address` text NOT NULL,
  `student_numeber` varchar(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_code`, `student_firstname`, `student_email`, `student_address`, `student_numeber`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'นักศึกษา นามสกุล', 'student@yru.com', 'ทดสอบ', '(012) 345-6789', 'student', '$2y$12$y7pMzreV4cLf6gLkjt9CbOMFF/XBl2IfC32lkhj.T.TyY4iwT5hCa', '2024-02-20 21:54:54', '2024-02-20 21:55:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_at`
--
ALTER TABLE `tbl_at`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `tbl_at_list`
--
ALTER TABLE `tbl_at_list`
  ADD PRIMARY KEY (`at_list_id`);

--
-- Indexes for table `tbl_at_title`
--
ALTER TABLE `tbl_at_title`
  ADD PRIMARY KEY (`at_title_id`);

--
-- Indexes for table `tbl_building`
--
ALTER TABLE `tbl_building`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `tbl_ed`
--
ALTER TABLE `tbl_ed`
  ADD PRIMARY KEY (`ed_id`);

--
-- Indexes for table `tbl_ed_type`
--
ALTER TABLE `tbl_ed_type`
  ADD PRIMARY KEY (`ed_type_id`);

--
-- Indexes for table `tbl_lecturer`
--
ALTER TABLE `tbl_lecturer`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indexes for table `tbl_officer`
--
ALTER TABLE `tbl_officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `tbl_officer_room`
--
ALTER TABLE `tbl_officer_room`
  ADD PRIMARY KEY (`officer_room_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_room_ed`
--
ALTER TABLE `tbl_room_ed`
  ADD PRIMARY KEY (`room_ed_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_at`
--
ALTER TABLE `tbl_at`
  MODIFY `at_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_at_list`
--
ALTER TABLE `tbl_at_list`
  MODIFY `at_list_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_at_title`
--
ALTER TABLE `tbl_at_title`
  MODIFY `at_title_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_building`
--
ALTER TABLE `tbl_building`
  MODIFY `building_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ed`
--
ALTER TABLE `tbl_ed`
  MODIFY `ed_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ed_type`
--
ALTER TABLE `tbl_ed_type`
  MODIFY `ed_type_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_lecturer`
--
ALTER TABLE `tbl_lecturer`
  MODIFY `lecturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_officer`
--
ALTER TABLE `tbl_officer`
  MODIFY `officer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_officer_room`
--
ALTER TABLE `tbl_officer_room`
  MODIFY `officer_room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_room_ed`
--
ALTER TABLE `tbl_room_ed`
  MODIFY `room_ed_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
