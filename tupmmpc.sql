-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 07:52 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tupmmpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_descriptions`
--

CREATE TABLE `home_descriptions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `vision` varchar(255) NOT NULL,
  `mission` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `loanapp_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `loan_term` int(255) NOT NULL,
  `loan_amount` int(255) NOT NULL,
  `user_attachment` blob NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `comaker_1` varchar(255) DEFAULT NULL,
  `cm_attachment_1` blob,
  `comaker_2` varchar(255) DEFAULT NULL,
  `cm_attachment_2` blob,
  `comaker_3` varchar(255) DEFAULT NULL,
  `cm_attachment_3` blob,
  `comaker_4` varchar(255) DEFAULT NULL,
  `cm_attachment_4` blob,
  `cc_approval_1` varchar(255) DEFAULT NULL,
  `cc_approval_2` varchar(255) DEFAULT NULL,
  `cc_approval_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`loanapp_id`, `username`, `name`, `loan_type`, `loan_term`, `loan_amount`, `user_attachment`, `date_created`, `status`, `comaker_1`, `cm_attachment_1`, `comaker_2`, `cm_attachment_2`, `comaker_3`, `cm_attachment_3`, `comaker_4`, `cm_attachment_4`, `cc_approval_1`, `cc_approval_2`, `cc_approval_3`) VALUES
(8, 'migsladisla', 'Juan Miguel C. Ladisla', 'Regular Loan', 6, 40000, '', '2018-12-09 13:55:13', 'Pending', 'James Caturas', NULL, 'Adrian Arellano', NULL, 'Ysa Domingo', NULL, 'Leign Lirasan', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(11) NOT NULL,
  `loan_version` int(11) NOT NULL,
  `loan_name` varchar(255) NOT NULL,
  `loan_max_amt` int(10) NOT NULL,
  `loan_max_term` int(10) NOT NULL,
  `loan_interest` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `loan_version`, `loan_name`, `loan_max_amt`, `loan_max_term`, `loan_interest`, `date_created`, `date_updated`) VALUES
(70, 0, 'Multi-Purpose Loan', 90000, 36, '0.75%', '2018-11-07 01:33:47', '2018-12-09 13:00:57'),
(71, 0, 'Regular Loan', 50000, 36, '0.75%', '2018-11-07 01:34:18', '2018-12-09 12:59:42'),
(72, 0, 'Appliance Loan', 80000, 36, '0.75%', '2018-11-07 01:37:36', '2018-12-09 13:00:13'),
(73, 0, 'Balik Eskwela Loan', 20000, 24, '0.75%', '2018-11-07 01:38:17', '2018-12-09 13:00:19'),
(74, 0, 'Birthday Loan', 50000, 24, '0.75%', '2018-11-07 01:38:30', '2018-12-09 13:00:17'),
(82, 0, 'Balik Kanto Loan', 20000, 36, '2%', '2018-12-01 15:31:35', '2018-12-09 13:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `username`, `password`, `email`, `birthday`, `address`, `zipcode`, `college`, `position`, `register_date`) VALUES
(1, 'Ysa Domingo', 'ysadomingo', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ysadomingo@gmail.com', '1998-06-10', 'Las Pinas City', '1630', 'College of Science', 2, '2018-10-07 16:11:06'),
(2, 'Juan Miguel C. Ladisla', 'migsladisla', 'fcfd2ce63584cb06f919ed085bfea5a1', 'nonoyladisla@yahoo.com.ph', '1999-02-08', 'Taguig City', '1630', 'College of Science', 1, '2018-10-07 16:11:32'),
(3, 'Ian Arellano', 'ianwilab', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ianwilab@yahoo.com', '6667-06-07', 'Manila City', '1630', 'College of Liberal Arts', 3, '2018-10-07 17:45:48'),
(4, 'James Caturas', 'jamescaturas', 'fcfd2ce63584cb06f919ed085bfea5a1', 'jamescaturas@yahoo.com', '7722-07-07', 'Manila City', '1630', 'College of Industrial Technology', 3, '2018-10-07 17:46:19'),
(5, 'Leign Lirasan', 'leignlirasan', 'fcfd2ce63584cb06f919ed085bfea5a1', 'leignlirasan@gmail.com', '7722-07-07', 'Paranaque City', '1630', 'College of Industrial Education', 3, '2018-10-07 17:46:55'),
(6, 'Eugene Lofranco', 'ugelofranco', 'fcfd2ce63584cb06f919ed085bfea5a1', 'eugenelofranco@gmail.com', '2006-12-30', 'Manila City', '1630', 'College of Science', 4, '2018-10-08 15:11:08'),
(7, 'May F. Garcia', 'maygarcia', '93dd4de5cddba2c733c65f233097f05a', 'jana', '1970-01-01', 'Pateros', '3312', 'College of Science', 4, '2018-10-17 16:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(10) UNSIGNED NOT NULL,
  `perm_desc` varchar(50) NOT NULL,
  `perm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`perm_id`, `perm_desc`, `perm_name`) VALUES
(1, 'dashboard-tab', 'Dashboard'),
(2, 'loans-tab', 'Loans'),
(3, 'members-tab', 'Members'),
(4, 'records-tab', 'Records'),
(5, 'loanapps-tab', 'Loan-Applications'),
(6, 'loanrecords-tab', 'My-Loan-Records'),
(7, 'comakers-tab', 'Co-Makers'),
(8, 'sharecap-tab', 'Share-Capital'),
(9, 'applyloan-tab', 'Apply-Loan'),
(50, 'permission-mngmt', 'Manage-Modules');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_roles`
--

CREATE TABLE `permissions_roles` (
  `pr_id` int(11) UNSIGNED NOT NULL,
  `pr_perm_id` int(10) UNSIGNED DEFAULT NULL,
  `perm_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions_roles`
--

INSERT INTO `permissions_roles` (`pr_id`, `pr_perm_id`, `perm_role`) VALUES
(1, 1, 'dashboard-perm1'),
(2, 1, 'dashboard-perm2'),
(3, 1, 'dashboard-perm3'),
(4, 1, 'dashboard-perm4'),
(5, 1, 'dashboard-perm5'),
(6, 2, 'addloan-perm1'),
(7, 2, 'editloan-perm2'),
(8, 2, 'deleteloan-perm3'),
(9, 2, 'loan-perm4'),
(10, 2, 'loan-perm5'),
(11, 3, 'searchuser-perm1'),
(12, 3, 'adduser-perm2'),
(13, 3, 'deleteuser-perm3'),
(14, 3, 'viewuser-perm4'),
(15, 3, 'members-perm5'),
(16, 4, 'loanrecord-perm1'),
(17, 4, 'loanrecord-perm2'),
(18, 4, 'loanrecord-perm3'),
(19, 4, 'loanrecord-perm4'),
(20, 4, 'loanrecord-perm5'),
(21, 5, 'loanapp-perm1'),
(22, 5, 'loanapp-perm2'),
(23, 5, 'loanapp-perm3'),
(24, 5, 'loanapp-perm4'),
(25, 5, 'loanapp-perm5'),
(26, 6, 'myloanrecord-perm1'),
(27, 6, 'myloanrecord-perm2'),
(28, 6, 'myloanrecord-perm3'),
(29, 6, 'myloanrecord-perm4'),
(30, 6, 'myloanrecord-perm5'),
(31, 7, 'comaker-perm1'),
(32, 7, 'comaker-perm2'),
(33, 7, 'comaker-perm3'),
(34, 7, 'comaker-perm4'),
(35, 7, 'comaker-perm5'),
(36, 8, 'sharecap-perm1'),
(37, 8, 'sharecap-perm2'),
(38, 8, 'sharecap-perm3'),
(39, 8, 'sharecap-perm4'),
(40, 8, 'sharecap-perm5'),
(41, 9, 'applyloan-perm1'),
(50, 50, 'permission-mgmt-perm');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Credit Officer'),
(4, 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `role_perm`
--

CREATE TABLE `role_perm` (
  `rp_id` int(10) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `perm_id` int(10) UNSIGNED DEFAULT NULL,
  `perm_role_id` int(10) UNSIGNED DEFAULT NULL,
  `access` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_perm`
--

INSERT INTO `role_perm` (`rp_id`, `role_id`, `perm_id`, `perm_role_id`, `access`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 1, 3, 1),
(4, 1, 1, 4, 1),
(5, 1, 1, 5, 1),
(6, 1, 2, 6, 1),
(7, 1, 2, 7, 1),
(8, 1, 2, 8, 1),
(9, 1, 2, 9, 1),
(10, 1, 2, 10, 1),
(11, 1, 3, 11, 1),
(12, 1, 3, 12, 1),
(13, 1, 3, 13, 1),
(14, 1, 3, 14, 1),
(15, 1, 3, 15, 1),
(16, 1, 4, 16, 1),
(17, 1, 4, 17, 1),
(18, 1, 4, 18, 1),
(19, 1, 4, 19, 1),
(20, 1, 4, 20, 1),
(21, 1, 5, 21, 1),
(22, 1, 5, 22, 1),
(23, 1, 5, 23, 1),
(24, 1, 5, 24, 1),
(25, 1, 5, 25, 1),
(26, 1, 6, 26, 1),
(27, 1, 6, 27, 1),
(28, 1, 6, 28, 1),
(29, 1, 6, 29, 1),
(30, 1, 6, 30, 1),
(31, 1, 7, 31, 1),
(32, 1, 7, 32, 1),
(33, 1, 7, 33, 1),
(34, 1, 7, 34, 1),
(35, 1, 7, 35, 1),
(36, 1, 8, 36, 1),
(37, 1, 8, 37, 1),
(38, 1, 8, 38, 1),
(39, 1, 8, 39, 1),
(40, 1, 8, 40, 1),
(41, 1, 9, 41, 1),
(42, 1, 50, 50, 1),
(43, 1, 9, NULL, 0),
(44, 1, 9, NULL, 0),
(45, 1, 9, NULL, 0),
(46, 2, 1, 1, 1),
(47, 2, 1, 2, 1),
(48, 2, 1, 3, 1),
(49, 2, 1, 4, 1),
(50, 2, 1, 5, 1),
(51, 2, 2, 6, 1),
(52, 2, 2, 7, 1),
(53, 2, 2, 8, 1),
(54, 2, 2, 9, 1),
(55, 2, 2, 10, 1),
(56, 2, 3, 11, 1),
(57, 2, 3, 12, 1),
(58, 2, 3, 13, 1),
(59, 2, 3, 14, 1),
(60, 2, 3, 15, 1),
(61, 2, 4, 16, 1),
(62, 2, 4, 17, 1),
(63, 2, 4, 18, 1),
(64, 2, 4, 19, 1),
(65, 2, 4, 20, 1),
(66, 2, 5, 21, 1),
(67, 2, 5, 22, 1),
(68, 2, 5, 23, 1),
(69, 2, 5, 24, 1),
(70, 2, 5, 25, 1),
(71, 2, 6, 26, 1),
(72, 2, 6, 27, 1),
(73, 2, 6, 28, 1),
(74, 2, 6, 29, 1),
(75, 2, 6, 30, 1),
(76, 2, 7, 31, 1),
(77, 2, 7, 32, 1),
(78, 2, 7, 33, 1),
(79, 2, 7, 34, 1),
(80, 2, 7, 35, 1),
(81, 2, 8, 36, 1),
(82, 2, 8, 37, 1),
(83, 2, 8, 38, 1),
(84, 2, 8, 39, 1),
(85, 2, 8, 40, 1),
(86, 2, 9, 41, 1),
(87, 2, 50, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `title` varchar(300) NOT NULL,
  `address` varchar(600) NOT NULL,
  `telephone_no` varchar(11) NOT NULL,
  `cellphone_no` varchar(12) NOT NULL,
  `web_link` varchar(200) NOT NULL,
  `fb_account` varchar(200) NOT NULL,
  `twitter_account` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_info`
--

INSERT INTO `website_info` (`title`, `address`, `telephone_no`, `cellphone_no`, `web_link`, `fb_account`, `twitter_account`, `email`) VALUES
('Technological University of the Philippines Manila Multi-Purpose Cooperative', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09897382990', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.gmail.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`loanapp_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `members_ibfk_1` (`position`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `permission_role_ibfk_1` (`pr_perm_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_perm`
--
ALTER TABLE `role_perm`
  ADD PRIMARY KEY (`rp_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_perm_ibfk_2` (`perm_id`),
  ADD KEY `role_perm_ibfk_3` (`perm_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `loanapp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  MODIFY `pr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_perm`
--
ALTER TABLE `role_perm`
  MODIFY `rp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`position`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`pr_perm_id`) REFERENCES `permissions` (`perm_id`);

--
-- Constraints for table `role_perm`
--
ALTER TABLE `role_perm`
  ADD CONSTRAINT `role_perm_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_perm_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`perm_id`),
  ADD CONSTRAINT `role_perm_ibfk_3` FOREIGN KEY (`perm_role_id`) REFERENCES `permissions_roles` (`pr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
