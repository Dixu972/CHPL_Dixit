-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 05:13 AM
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
-- Database: `hrms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_master`
--

CREATE TABLE `attendance_master` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `a_check_in_time` time NOT NULL DEFAULT current_timestamp(),
  `a_check_out_time` time NOT NULL,
  `a_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for absent, 2 for present, 3 for on leave\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_status`
--

CREATE TABLE `attendance_status` (
  `a_status_id` int(11) NOT NULL,
  `a_status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_status`
--

INSERT INTO `attendance_status` (`a_status_id`, `a_status_name`) VALUES
(1, 'absent'),
(2, 'present'),
(3, 'on-leave');

-- --------------------------------------------------------

--
-- Table structure for table `dept_master`
--

CREATE TABLE `dept_master` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dept_master`
--

INSERT INTO `dept_master` (`dept_id`, `dept_name`) VALUES
(1, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE `leave_master` (
  `l_id` int(11) NOT NULL,
  `u_id` varchar(100) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `l_start_date` date NOT NULL,
  `l_end_date` date NOT NULL,
  `l_status_id` int(11) NOT NULL,
  `l_applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `l_approved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_statuses`
--

CREATE TABLE `leave_statuses` (
  `id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_statuses`
--

INSERT INTO `leave_statuses` (`id`, `status_name`) VALUES
(2, 'Approved'),
(1, 'Pending'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `type_name`) VALUES
(3, 'Annual Leave'),
(2, 'Casual Leave'),
(1, 'Sick Leave'),
(4, 'Unpaid Leave');

-- --------------------------------------------------------

--
-- Table structure for table `position_master`
--

CREATE TABLE `position_master` (
  `position_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_master`
--

INSERT INTO `position_master` (`position_id`, `dept_id`, `position_name`) VALUES
(2, 1, 'Junior');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `u_phone` bigint(20) NOT NULL,
  `u_gender` int(11) NOT NULL COMMENT '1 for male,2 for female',
  `dept_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `u_salary` bigint(20) NOT NULL,
  `u_joining_Date` datetime NOT NULL,
  `u_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_modified_by` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '0 for user, 1 for admin',
  `u_is_delete` int(11) NOT NULL DEFAULT 0 COMMENT '0 for active, 1 for deleted ',
  `u_dob` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_phone`, `u_gender`, `dept_id`, `position_id`, `u_salary`, `u_joining_Date`, `u_created_date`, `u_modified_by`, `u_is_delete`, `u_dob`) VALUES
(3, 'hello', 'hello@gmail.com', '$2y$10$OVKnBSowChYsOh/ul4BBS.mKHuVDcR14cj6gI1c2e8Kyf2perJvTe', 123456, 1, 1, 2, 1234567, '2025-03-13 14:54:53', '2025-03-04 12:30:17', '2025-03-04 09:25:34', 0, '10/04/35'),
(5, 'nil', 'nil@gmail.com', '$2y$10$G87pseCDC/9Yr3dpyJ4qIOpMF2SNhBYyjapnCTCWvSjPZJodFtcrq', 987654321, 1, 1, 2, 12345, '0000-00-00 00:00:00', '2025-03-04 12:30:17', '2025-03-04 09:51:37', 0, '01/02/03'),
(6, 'nil', 'nil123@gmail.com', '$2y$10$LX4ZqPyPITmPSYl7zFRkEuk/fktwLuzGMK2KoWm/SlZlsw3Q/Ze5W', 987654321, 1, 1, 2, 12345, '0000-00-00 00:00:00', '2025-03-04 12:30:17', '2025-03-04 11:55:43', 0, '01/02/03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `attendance_master`
--
ALTER TABLE `attendance_master`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `a_status` (`a_status`);

--
-- Indexes for table `attendance_status`
--
ALTER TABLE `attendance_status`
  ADD PRIMARY KEY (`a_status_id`);

--
-- Indexes for table `dept_master`
--
ALTER TABLE `dept_master`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `leave_master`
--
ALTER TABLE `leave_master`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `leave_master_ibfk_4` (`l_approved_by`),
  ADD KEY `leave_master_ibfk_5` (`l_status_id`),
  ADD KEY `leave_type_id` (`leave_type_id`);

--
-- Indexes for table `leave_statuses`
--
ALTER TABLE `leave_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_name` (`status_name`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `position_master`
--
ALTER TABLE `position_master`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_master`
--
ALTER TABLE `attendance_master`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_status`
--
ALTER TABLE `attendance_status`
  MODIFY `a_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dept_master`
--
ALTER TABLE `dept_master`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_master`
--
ALTER TABLE `leave_master`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_statuses`
--
ALTER TABLE `leave_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position_master`
--
ALTER TABLE `position_master`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_master`
--
ALTER TABLE `attendance_master`
  ADD CONSTRAINT `attendance_master_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_master` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_master_ibfk_2` FOREIGN KEY (`a_status`) REFERENCES `attendance_status` (`a_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_master`
--
ALTER TABLE `leave_master`
  ADD CONSTRAINT `leave_master_ibfk_4` FOREIGN KEY (`l_approved_by`) REFERENCES `admin_master` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leave_master_ibfk_5` FOREIGN KEY (`l_status_id`) REFERENCES `leave_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leave_master_ibfk_6` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position_master`
--
ALTER TABLE `position_master`
  ADD CONSTRAINT `dept_id` FOREIGN KEY (`dept_id`) REFERENCES `dept_master` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept_master` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_master_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position_master` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
