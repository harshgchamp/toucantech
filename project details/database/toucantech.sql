-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 11:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toucantech`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emailID` int(11) NOT NULL,
  `UserRefID` int(11) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emailID`, `UserRefID`, `emailaddress`, `default`) VALUES
(1, 1, 'j.smith@zmail.com', 1),
(2, 2, 'g.smith@zmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `UserRefID` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Deceased` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`UserRefID`, `Firstname`, `Surname`, `Deceased`) VALUES
(1, 'John', 'Smith', 0),
(2, 'Garry', 'Smith', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_logs`
--

CREATE TABLE `tbl_activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tbl_name` varchar(50) NOT NULL,
  `record_id` int(10) NOT NULL,
  `action` varchar(25) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='activity logs of users';

--
-- Dumping data for table `tbl_activity_logs`
--

INSERT INTO `tbl_activity_logs` (`id`, `user_id`, `tbl_name`, `record_id`, `action`, `ip_address`, `user_agent`, `activity`, `status`, `created_at`) VALUES
(1, 1, '', 0, 'LOGGED_IN', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'Admin has been loggeg in', 1, '2023-10-18 10:21:36'),
(2, 1, 'tbl_members', 1, 'ADD', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'Members  has been created : Harry', 1, '2023-10-18 10:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `member_name`, `member_email`, `status`) VALUES
(1, 'Harry', 'harry@gmailc.om', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_school`
--

CREATE TABLE `tbl_member_school` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member_school`
--

INSERT INTO `tbl_member_school` (`id`, `member_id`, `school_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schools`
--

CREATE TABLE `tbl_schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `country_iso` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_schools`
--

INSERT INTO `tbl_schools` (`id`, `school_name`, `country_iso`, `status`) VALUES
(1, 'ToucanTech School', 'GBR', 1),
(2, 'Weaver School', 'IND', 1),
(3, 'Hudson School', 'AUS', 1),
(4, 'Netmet School', 'NZL', 1),
(5, 'Harison School', 'USA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `photo` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0 = InActive',
  `last_logged_in` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `full_name`, `email`, `mobile`, `photo`, `password`, `temp_password`, `status`, `last_logged_in`, `created_at`, `modified_at`, `created_by`, `modified_by`) VALUES
(1, 'Admin', 'admin@toucantech.com', 1231231231, 'jpg', 'cpWemp9xpaCmlJKfpZaUmQ==', 'MTIzNDU2', 1, '2023-10-18 10:21:36', '2023-10-18 08:10:44', '2023-10-18 08:10:44', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`UserRefID`);

--
-- Indexes for table `tbl_activity_logs`
--
ALTER TABLE `tbl_activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member_school`
--
ALTER TABLE `tbl_member_school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_school_unique` (`member_id`,`school_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `UserRefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_activity_logs`
--
ALTER TABLE `tbl_activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_member_school`
--
ALTER TABLE `tbl_member_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_member_school`
--
ALTER TABLE `tbl_member_school`
  ADD CONSTRAINT `tbl_member_school_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tbl_members` (`id`),
  ADD CONSTRAINT `tbl_member_school_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `tbl_schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
