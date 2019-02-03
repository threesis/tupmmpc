-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 09:44 PM
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
-- Table structure for table `active_loan_apps`
--

CREATE TABLE `active_loan_apps` (
  `id` int(11) NOT NULL,
  `loanapp_id` int(11) NOT NULL,
  `balance` decimal(7,2) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_loan_apps`
--

INSERT INTO `active_loan_apps` (`id`, `loanapp_id`, `balance`, `remarks`, `payment_date`) VALUES
(1, 9, '48604.17', 'New', '2019-01-29 00:00:00'),
(2, 1, '4329.00', 'New', '2019-01-29 00:42:38'),
(3, 3, '7076.25', 'New', '2019-01-29 00:59:58'),
(4, 2, '29526.15', 'New', '2019-01-29 01:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `approved_loan_apps`
--

CREATE TABLE `approved_loan_apps` (
  `id` int(11) NOT NULL,
  `loanapp_id` int(11) NOT NULL,
  `cheque_no` int(11) DEFAULT NULL,
  `disbursement_no` int(11) NOT NULL,
  `retention_fee` decimal(7,2) NOT NULL,
  `service_fee` decimal(7,2) NOT NULL,
  `debit` decimal(7,2) NOT NULL,
  `credit` decimal(7,2) NOT NULL,
  `net_amount` decimal(7,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_approved` datetime NOT NULL,
  `date_accepted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_loan_apps`
--

INSERT INTO `approved_loan_apps` (`id`, `loanapp_id`, `cheque_no`, `disbursement_no`, `retention_fee`, `service_fee`, `debit`, `credit`, `net_amount`, `status`, `date_approved`, `date_accepted`) VALUES
(1, 9, 678910, 1, '1500.00', '500.00', '52500.00', '52500.00', '49500.00', 'Active', '2019-01-28 23:02:11', '2019-01-29'),
(2, 1, 54321, 2, '195.00', '65.00', '6630.00', '6630.00', '6435.00', 'Active', '2019-01-29 00:25:09', '2019-01-29'),
(3, 7, 12345, 3, '1500.00', '500.00', '52500.00', '52500.00', '49500.00', 'Active', '2019-01-28 22:41:52', '2019-01-28'),
(4, 4, NULL, 0, '0.00', '0.00', '0.00', '0.00', '0.00', 'Approved', '2019-01-29 00:49:41', '0000-00-00'),
(5, 2, 434344, 5, '960.00', '320.00', '33600.00', '33600.00', '31680.00', 'Active', '2019-01-29 00:54:05', '2019-01-29'),
(6, 3, 34567, 6, '255.00', '85.00', '8925.00', '8925.00', '8415.00', 'Active', '2019-01-29 00:53:49', '2019-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `disbursement_voucher`
--

CREATE TABLE `disbursement_voucher` (
  `id` int(11) NOT NULL,
  `loanapp_id` int(11) NOT NULL,
  `disbursement_no` int(11) NOT NULL,
  `retention_fee` decimal(7,2) NOT NULL,
  `service_fee` decimal(7,2) NOT NULL,
  `debit` decimal(7,2) NOT NULL,
  `credit` decimal(7,2) NOT NULL,
  `net_amount` decimal(7,2) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `loanapp_id` int(11) NOT NULL,
  `member_id` int(11) UNSIGNED NOT NULL,
  `loan_applied` int(11) UNSIGNED NOT NULL,
  `loan_term` int(255) NOT NULL,
  `loan_amount` int(255) NOT NULL,
  `loan_int` decimal(7,2) NOT NULL,
  `monthly_deduc` decimal(7,2) NOT NULL,
  `user_payslip` varchar(255) NOT NULL,
  `take_home_pay` decimal(7,2) NOT NULL,
  `thp_verified_by` varchar(255) DEFAULT NULL,
  `date_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `comaker_1` varchar(255) DEFAULT NULL,
  `cm_payslip_1` varchar(255) DEFAULT NULL,
  `comaker_2` varchar(255) DEFAULT NULL,
  `cm_payslip_2` varchar(255) DEFAULT NULL,
  `comaker_3` varchar(255) DEFAULT NULL,
  `cm_payslip_3` varchar(255) DEFAULT NULL,
  `cc_approval_1` varchar(255) DEFAULT NULL,
  `cc_approval_2` varchar(255) DEFAULT NULL,
  `cc_approval_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_applications`
--


INSERT INTO `loan_applications` (`loanapp_id`, `member_id`, `loan_applied`, `loan_term`, `loan_amount`, `loan_int`, `monthly_deduc`, `user_payslip`, `take_home_pay`, `thp_verified_by`, `date_applied`, `status`, `remarks`, `comaker_1`, `cm_payslip_1`, `comaker_2`, `cm_payslip_2`, `comaker_3`, `cm_payslip_3`, `cc_approval_1`, `cc_approval_2`, `cc_approval_3`) VALUES
(1, 2, 73, 3, 6500, '13.00', '2171.00', '', '22829.00', 'ianwilab', '2019-01-13 15:36:23', 'Approved', 'New', 'ugelofranco', NULL, 'ysadomingo', NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(2, 2, 71, 13, 32000, '160.00', '2473.85', '', '62526.15', 'ianwilab', '2019-01-13 15:38:05', 'Active', 'New', 'leignlirasan', NULL, 'angelaladisla', NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(3, 3, 71, 6, 8500, '42.50', '1423.75', '', '33076.25', 'ianwilab', '2019-01-14 14:14:23', 'Approved', 'New', 'ugelofranco', NULL, 'maygarcia', NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(4, 3, 70, 9, 75000, '750.00', '8416.67', '', '15083.33', 'ianwilab', '2019-01-14 14:15:00', 'Approved', 'New', 'ugelofranco', NULL, 'angelaladisla', NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(5, 2, 71, 22, 35000, '175.00', '1598.86', '', '0.00', NULL, '2019-01-15 07:14:57', 'Pending', 'New', 'ugelofranco', NULL, 'ianwilab', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 71, 6, 7000, '35.00', '1172.50', '', '25327.50', 'ianwilab', '2019-01-17 14:44:47', 'Pending', 'New', 'ugelofranco', NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', NULL),
(7, 8, 71, 36, 50000, '250.00', '1395.83', '', '63604.17', 'ianwilab', '2019-01-18 07:48:10', 'Approved', 'New', 'jamescaturas', NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(9, 9, 71, 36, 50000, '250.00', '1395.83', '', '28604.17', 'ianwilab', '2019-01-18 07:48:10', 'Approved', 'New', 'jamescaturas', NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas');


-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `loan_name` varchar(255) NOT NULL,
  `loan_max_amt` int(10) NOT NULL,
  `loan_max_term` int(10) NOT NULL,
  `loan_interest` decimal(3,2) UNSIGNED NOT NULL,
  `loan_status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_types`
--
INSERT INTO `loan_types` (`id`, `loan_name`, `loan_max_amt`, `loan_max_term`, `loan_interest`, `loan_status`, `date_created`, `date_updated`) VALUES
(70, 'Multi-Purpose Loan', 90000, 36, '0.10', 'active', '2018-11-07 09:33:47', '2019-01-18 23:03:39'),
(71, 'Regular Loan', 50000, 36, '0.05', 'active', '2018-11-07 09:34:18', '2019-01-18 23:03:36'),
(72, 'Appliance Loan', 80000, 36, '0.04', 'active', '2018-11-07 09:37:36', '2019-01-18 23:03:34'),
(73, 'Balik-Eskwela Loan', 20000, 24, '0.02', 'active', '2018-11-07 09:38:17', '2019-01-18 23:42:01'),
(74, 'Birthday Loan', 50000, 24, '0.03', 'active', '2018-11-07 09:38:30', '2019-01-18 23:03:30'),
(83, 'Holiday Loan', 20000, 24, '0.75', 'active', '2019-01-15 15:06:17', '2019-01-18 23:39:01'),
(84, 'Poverty Alleviation Loan', 20000, 24, '0.75', 'archived', '2019-01-15 15:08:07', '2019-01-18 23:07:47'),
(85, 'Test Loan 1', 6500000, 24, '0.75', 'archived', '2019-01-18 23:29:57', '2019-01-27 03:44:46');

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
  `position` int(11) UNSIGNED NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--


INSERT INTO `members` (`id`, `name`, `username`, `password`, `email`, `birthday`, `address`, `zipcode`, `college`, `position`, `contact_no`, `user_img`, `register_date`) VALUES
(1, 'Ysa Domingo', 'ysadomingo', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ysadomingo@gmail.com', '1998-06-10', 'Las Pinas City', '1630', 'College of Science', 2, '09175086666', 'ysa.jpg', '2018-10-07 16:11:06'),
(2, 'Juan Miguel C. Ladisla', 'migsladisla', '4e4d6c332b6fe62a63afe56171fd3725', 'nonoyladisla@yahoo.com.ph', '1999-02-08', 'Taguig City', '1630', 'College of Science', 1, '09175086666', '14354946_1663603397002678_7996517683472105548_n.jpg', '2018-10-07 16:11:32'),
(3, 'Ian Arellano', 'ianwilab', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ianwilab@yahoo.com', '6667-06-07', 'Manila City', '1630', 'College of Liberal Arts', 3, '09175086666', 'ian.jpg', '2018-10-07 17:45:48'),
(4, 'James Caturas', 'jamescaturas', 'fcfd2ce63584cb06f919ed085bfea5a1', 'jamescaturas@yahoo.com', '7722-07-07', 'Manila City', '1630', 'College of Industrial Technology', 3, '09175086666', 'james.jpg', '2018-10-07 17:46:19'),
(5, 'Leign Lirasan', 'leignlirasan', 'fcfd2ce63584cb06f919ed085bfea5a1', 'leignlirasan@gmail.com', '7722-07-07', 'Paranaque City', '1630', 'College of Industrial Education', 3, '09175086666', 'leyn.jpg', '2018-10-07 17:46:55'),
(6, 'Eugene Lofranco', 'ugelofranco', 'fcfd2ce63584cb06f919ed085bfea5a1', 'eugenelofranco@gmail.com', '2006-12-30', 'Manila City', '1630', 'College of Science', 4, '09175086666', 'noimage.jpg', '2018-10-08 15:11:08'),
(7, 'May F. Garcia', 'maygarcia', 'fcfd2ce63584cb06f919ed085bfea5a1', 'jana', '1970-01-01', 'Pateros', '3312', 'College of Science', 4, '09175086666', 'may.jpg', '2018-10-17 16:25:28'),
(8, 'Butch Ross Bituonan', 'bbituonan', '827ccb0eea8a706c4c34a16891f84e7b', 'rbituonan@tup.edu.ph', '1970-01-01', 'Manila', '1012', 'College of Science', 2, '09175086666', 'noimage.jpg', '2019-01-18 07:35:08'),
(9, 'Jezikiel Dolores Guevarra', 'jezguevarraa', '4e4d6c332b6fe62a63afe56171fd3725', 'jez@gmail.com', '1970-01-01', 'Cavite', '1630', 'College of Science', 2, '09175449999', 'noimage.jpg', '2019-01-26 19:51:54'),
(39, 'Jezikiel Dolores Guevarra', 'jezguevarra', '4e4d6c332b6fe62a63afe56171fd3725', 'jez@gmail.com', '1970-01-01', 'Cavite', '1630', 'College of Science', 2, '09175449999', 'noimage.jpg', '2019-01-26 19:51:54'),
(41, 'Dhan Ritsard Francisco', 'dhanrichard', 'd50230a50070e59d7ad316962a55ac71', 'dhanrichard@gmail.com', '1970-01-01', 'Pasay', '1630', 'College of Science', 2, '09178566666', 'noimage.jpg', '2019-01-28 15:12:09');

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
(10, 'websettings-tab', 'Settings'),
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
(8, 2, 'archiveloan-perm3'),
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
(21, 5, 'approve-cancel-PL'),
(22, 5, 'issue-cheque-AL'),
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
(42, 10, 'settings-perm1'),
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
(21, 1, 5, 21, 0),
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
(42, 1, 10, 42, 1),
(43, 1, 50, 50, 1),
(46, 2, 1, 1, 1),
(47, 2, 1, 2, 1),
(48, 2, 1, 3, 1),
(49, 2, 1, 4, 1),
(50, 2, 1, 5, 1),
(51, 2, 2, 6, 0),
(52, 2, 2, 7, 0),
(53, 2, 2, 8, 0),
(54, 2, 2, 9, 1),
(55, 2, 2, 10, 1),
(56, 2, 3, 11, 0),
(57, 2, 3, 12, 0),
(58, 2, 3, 13, 0),
(59, 2, 3, 14, 0),
(60, 2, 3, 15, 0),
(61, 2, 4, 16, 1),
(62, 2, 4, 17, 1),
(63, 2, 4, 18, 1),
(64, 2, 4, 19, 1),
(65, 2, 4, 20, 1),
(66, 2, 5, 21, 0),
(67, 2, 5, 22, 0),
(68, 2, 5, 23, 0),
(69, 2, 5, 24, 0),
(70, 2, 5, 25, 0),
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
(87, 2, 10, 42, 0),
(88, 2, 50, 50, 0),
(91, 3, 1, 1, 1),
(92, 3, 1, 2, 1),
(93, 3, 1, 3, 1),
(94, 3, 1, 4, 1),
(95, 3, 1, 5, 1),
(96, 3, 2, 6, 1),
(97, 3, 2, 7, 1),
(98, 3, 2, 8, 1),
(99, 3, 2, 9, 0),
(100, 3, 2, 10, 0),
(101, 3, 3, 11, 1),
(102, 3, 3, 12, 0),
(103, 3, 3, 13, 0),
(104, 3, 3, 14, 1),
(105, 3, 3, 15, 0),
(106, 3, 4, 16, 1),
(107, 3, 4, 17, 1),
(108, 3, 4, 18, 1),
(109, 3, 4, 19, 1),
(110, 3, 4, 20, 1),
(111, 3, 5, 21, 1),
(112, 3, 5, 22, 0),
(113, 3, 5, 23, 1),
(114, 3, 5, 24, 1),
(115, 3, 5, 25, 1),
(116, 3, 6, 26, 1),
(117, 3, 6, 27, 1),
(118, 3, 6, 28, 1),
(119, 3, 6, 29, 1),
(120, 3, 6, 30, 1),
(121, 3, 7, 31, 1),
(122, 3, 7, 32, 1),
(123, 3, 7, 33, 1),
(124, 3, 7, 34, 1),
(125, 3, 7, 35, 1),
(126, 3, 8, 36, 1),
(127, 3, 8, 37, 1),
(128, 3, 8, 38, 1),
(129, 3, 8, 39, 1),
(130, 3, 8, 40, 1),
(131, 3, 9, 41, 1),
(132, 4, 1, 1, 0),
(133, 4, 1, 2, 0),
(134, 4, 1, 3, 0),
(135, 4, 1, 4, 0),
(136, 4, 1, 5, 0),
(137, 4, 2, 6, 0),
(138, 4, 2, 7, 0),
(139, 4, 2, 8, 0),
(140, 4, 2, 9, 0),
(141, 4, 2, 10, 0),
(142, 4, 3, 11, 1),
(143, 4, 3, 12, 0),
(144, 4, 3, 13, 0),
(145, 4, 3, 14, 1),
(146, 4, 3, 15, 0),
(147, 4, 4, 16, 1),
(148, 4, 4, 17, 1),
(149, 4, 4, 18, 1),
(150, 4, 4, 19, 1),
(151, 4, 4, 20, 1),
(152, 4, 5, 21, 0),
(153, 4, 5, 22, 1),
(154, 4, 5, 23, 1),
(155, 4, 5, 24, 1),
(156, 4, 5, 25, 1),
(157, 4, 6, 26, 1),
(158, 4, 6, 27, 1),
(159, 4, 6, 28, 1),
(160, 4, 6, 29, 1),
(161, 4, 6, 30, 1),
(162, 4, 7, 31, 1),
(163, 4, 7, 32, 1),
(164, 4, 7, 33, 1),
(165, 4, 7, 34, 1),
(166, 4, 7, 35, 1),
(167, 4, 8, 36, 1),
(168, 4, 8, 37, 1),
(169, 4, 8, 38, 1),
(170, 4, 8, 39, 1),
(171, 4, 8, 40, 1),
(172, 4, 9, 41, 1),
(173, 4, 10, 42, 0),
(174, 4, 50, 50, 0),
(175, 3, 10, 42, 0),
(176, 3, 50, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `share_capital`
--

CREATE TABLE `share_capital` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `share_capital` int(11) NOT NULL,
  `total_share_capital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share_capital`
--

INSERT INTO `share_capital` (`id`, `user_id`, `share_capital`, `total_share_capital`) VALUES
(1, 1, 100, 100),
(2, 2, 100, 100),
(3, 3, 100, 100),
(4, 4, 100, 100),
(5, 5, 100, 100),
(6, 6, 100, 100),
(7, 7, 100, 100),
(8, 8, 100, 100),
(11, 39, 200, 200),
(13, 41, 2500, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `id` int(11) NOT NULL,
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

INSERT INTO `website_info` (`id`, `title`, `address`, `telephone_no`, `cellphone_no`, `web_link`, `fb_account`, `twitter_account`, `email`) VALUES
(1, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09897382990', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.gmail.com/'),
(2, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09897382990', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.gmail.com/'),
(3, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_loan_apps`
--
ALTER TABLE `active_loan_apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_loans_loanapp_id_fk` (`loanapp_id`);

--
-- Indexes for table `approved_loan_apps`
--
ALTER TABLE `approved_loan_apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pending_loan_app_id_fk` (`loanapp_id`);

--
-- Indexes for table `disbursement_voucher`
--
ALTER TABLE `disbursement_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dv_loanapp_id_fk` (`loanapp_id`);

--
-- Indexes for table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`loanapp_id`),
  ADD KEY `loan_app_cc1fk_1` (`cc_approval_1`),
  ADD KEY `loan_app_cc2fk_2` (`cc_approval_2`),
  ADD KEY `loan_app_cc3fk_3` (`cc_approval_3`),
  ADD KEY `member_id_fk` (`member_id`),
  ADD KEY `loan_type_fk` (`loan_applied`),
  ADD KEY `thm_verifiedby_fk` (`thp_verified_by`),
  ADD KEY `comaker_1_fk` (`comaker_1`),
  ADD KEY `comaker_2_fk` (`comaker_2`),
  ADD KEY `comaker_3_fk` (`comaker_3`);

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
-- Indexes for table `share_capital`
--
ALTER TABLE `share_capital`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk_1` (`user_id`);

--
-- Indexes for table `website_info`
--
ALTER TABLE `website_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_loan_apps`
--
ALTER TABLE `active_loan_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `approved_loan_apps`
--
ALTER TABLE `approved_loan_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `disbursement_voucher`
--
ALTER TABLE `disbursement_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `loanapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  MODIFY `pr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_perm`
--
ALTER TABLE `role_perm`
  MODIFY `rp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `share_capital`
--
ALTER TABLE `share_capital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `website_info`
--
ALTER TABLE `website_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_loan_apps`
--
ALTER TABLE `active_loan_apps`
  ADD CONSTRAINT `active_loans_loanapp_id_fk` FOREIGN KEY (`loanapp_id`) REFERENCES `loan_applications` (`loanapp_id`);

--
-- Constraints for table `approved_loan_apps`
--
ALTER TABLE `approved_loan_apps`
  ADD CONSTRAINT `pending_loan_app_id_fk` FOREIGN KEY (`loanapp_id`) REFERENCES `loan_applications` (`loanapp_id`);

--
-- Constraints for table `disbursement_voucher`
--
ALTER TABLE `disbursement_voucher`
  ADD CONSTRAINT `dv_loanapp_id_fk` FOREIGN KEY (`loanapp_id`) REFERENCES `loan_applications` (`loanapp_id`);

--
-- Constraints for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `loan_app_cc1fk_1` FOREIGN KEY (`cc_approval_1`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_app_cc2fk_2` FOREIGN KEY (`cc_approval_2`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_app_cc3fk_3` FOREIGN KEY (`cc_approval_3`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_type_fk` FOREIGN KEY (`loan_applied`) REFERENCES `loan_types` (`id`),
  ADD CONSTRAINT `member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `thm_verifiedby_fk` FOREIGN KEY (`thp_verified_by`) REFERENCES `members` (`username`);

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
--
-- Constraints for table `share_capital`
--
ALTER TABLE `share_capital`
  ADD CONSTRAINT `user_id_fk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
