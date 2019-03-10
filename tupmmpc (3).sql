-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 12:26 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
  `active_loanapp_id` int(11) NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `balance` decimal(12,2) NOT NULL,
  `balance_paid` decimal(12,2) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_for` date NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_loan_apps`
--

INSERT INTO `active_loan_apps` (`id`, `active_loanapp_id`, `or_number`, `balance`, `balance_paid`, `payment_status`, `payment_for`, `payment_date`) VALUES
(81, 1731, 'MAR12345', '15000.00', '995.00', 'paid', '2019-03-02', '2019-03-04'),
(82, 66711, 'MAR12345', '50000.00', '2458.00', 'paid', '2019-03-02', '2019-03-04'),
(83, 68711, 'MAR12345', '100000.00', '3528.00', 'paid', '2019-03-02', '2019-03-05'),
(84, 68711, '', '96472.00', '3528.00', 'unpaid', '2019-04-02', '0000-00-00'),
(85, 1731, 'MAY12345', '14005.00', '1000.00', 'paid', '2019-04-02', '2019-03-05'),
(86, 66711, '', '47542.00', '2458.00', 'unpaid', '2019-04-02', '0000-00-00'),
(110, 70711, 'MAY12345', '20000.00', '1000.00', 'paid', '2019-04-05', '2019-03-05'),
(111, 70711, '', '19000.00', '0.00', 'unpaid', '2019-05-05', '0000-00-00'),
(112, 1731, '', '13005.00', '0.00', 'unpaid', '2019-05-02', '0000-00-00'),
(113, 72711, 'MAY12345', '10200.00', '1000.00', 'paid', '2019-04-05', '2019-03-05'),
(114, 72711, '', '9200.00', '0.00', 'unpaid', '2019-05-05', '0000-00-00'),
(115, 73711, '', '20000.00', '0.00', 'unpaid', '2019-04-05', '0000-00-00'),
(116, 74711, 'APR12345', '20000.00', '1817.00', 'paid', '2019-04-05', '2019-03-05'),
(117, 74711, '', '18183.00', '0.00', 'unpaid', '2019-05-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `approved_loan_apps`
--

CREATE TABLE `approved_loan_apps` (
  `id` int(11) NOT NULL,
  `loanapp_id` int(11) NOT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `disbursement_no` int(11) NOT NULL,
  `debit` decimal(12,2) NOT NULL,
  `credit` decimal(12,2) NOT NULL,
  `deferred_int` decimal(12,2) NOT NULL,
  `net_amount` decimal(12,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_approved` date NOT NULL,
  `date_accepted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_loan_apps`
--

INSERT INTO `approved_loan_apps` (`id`, `loanapp_id`, `cheque_no`, `disbursement_no`, `debit`, `credit`, `deferred_int`, `net_amount`, `status`, `date_approved`, `date_accepted`) VALUES
(1, 8711, NULL, 12019, '63500.00', '63500.00', '13500.00', '49300.00', 'Approved', '2019-02-19', '0000-00-00'),
(5, 9711, 'JEZ12345', 52019, '63500.00', '63500.00', '13500.00', '49300.00', 'Active', '2019-02-22', '2019-03-04'),
(9, 66711, 'TEYUPS123', 92019, '59000.00', '59000.00', '9000.00', '49500.00', 'Active', '2019-02-26', '2019-03-02'),
(11, 1731, 'YSA12345', 112019, '16913.00', '16913.00', '1912.50', '14850.00', 'Active', '2019-03-02', '2019-03-04'),
(12, 68711, 'NICEONE1234', 122019, '127000.00', '127000.00', '27000.00', '99000.00', 'Active', '2019-03-02', '2019-03-02'),
(13, 70711, 'NICESU123', 132019, '23600.00', '23600.00', '3600.00', '19600.00', 'Active', '2019-03-05', '2019-03-05'),
(14, 72711, 'MICO12345', 142019, '11501.00', '11501.00', '1300.50', '9898.00', 'Active', '2019-03-05', '2019-03-05'),
(15, 73711, 'ONAY12345', 152019, '23600.00', '23600.00', '3600.00', '19600.00', 'Active', '2019-03-05', '2019-03-05'),
(16, 74711, 'TUP12345', 162019, '21800.00', '21800.00', '1800.00', '19600.00', 'Active', '2019-03-05', '2019-03-05');

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
  `loan_int` decimal(12,2) NOT NULL,
  `monthly_deduc` decimal(12,2) NOT NULL,
  `user_payslip` varchar(255) NOT NULL,
  `take_home_pay` decimal(12,2) DEFAULT NULL,
  `thp_verified_by` varchar(255) DEFAULT NULL,
  `date_applied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `comaker_1` int(11) UNSIGNED DEFAULT NULL,
  `cm_payslip_1` varchar(255) DEFAULT NULL,
  `comaker_2` int(11) UNSIGNED DEFAULT NULL,
  `cm_payslip_2` varchar(255) DEFAULT NULL,
  `comaker_3` int(11) UNSIGNED DEFAULT NULL,
  `cm_payslip_3` varchar(255) DEFAULT NULL,
  `cc_approval_1` varchar(255) DEFAULT NULL,
  `cc_approval_2` varchar(255) DEFAULT NULL,
  `cc_approval_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`loanapp_id`, `member_id`, `loan_applied`, `loan_term`, `loan_amount`, `loan_int`, `monthly_deduc`, `user_payslip`, `take_home_pay`, `thp_verified_by`, `date_applied`, `status`, `remarks`, `comaker_1`, `cm_payslip_1`, `comaker_2`, `cm_payslip_2`, `comaker_3`, `cm_payslip_3`, `cc_approval_1`, `cc_approval_2`, `cc_approval_3`) VALUES
(1731, 1, 73, 17, 15000, '1913.00', '995.00', '9d773430c9ad8a5b156c21ea2fd1b13d991ebbdd.png', '35005.00', 'ianwilab', '2019-02-26 09:33:10', 'Active', 'Renew', 43, NULL, 66, NULL, NULL, NULL, 'ianwilab', 'jamescaturas', 'leignlirasan'),
(1841, 1, 84, 7, 50100, '2630.00', '7533.00', 'tup logo.png', NULL, NULL, '2019-03-05 06:01:51', 'Pending', 'New', 42, NULL, 66, NULL, NULL, NULL, NULL, NULL, NULL),
(8711, 8, 71, 36, 50000, '250.00', '1395.83', 'payslip-example.png', '238604.17', 'ianwilab', '2019-01-18 07:48:10', 'Approved', 'New', 4, NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(9711, 9, 71, 36, 50000, '250.00', '1395.83', 'payslip-example.png', '13604.17', 'jamescaturas', '2019-01-18 07:48:10', 'Active', 'New', 4, NULL, NULL, NULL, NULL, NULL, 'jamescaturas', 'leignlirasan', 'ianwilab'),
(66711, 66, 71, 24, 50000, '9000.00', '2458.00', 'noimage.jpg', '42542.00', 'jamescaturas', '2019-02-26 07:14:45', 'Active', 'New', 8, NULL, 9, NULL, NULL, NULL, 'jamescaturas', 'ianwilab', 'leignlirasan'),
(68711, 68, 71, 36, 100000, '27000.00', '3528.00', '9d773430c9ad8a5b156c21ea2fd1b13d991ebbdd.png', '21472.00', 'leignlirasan', '2019-02-26 10:07:04', 'Active', 'New', 1, 'Approve', 8, 'Approve', 41, 'Approve', 'leignlirasan', 'jamescaturas', 'ianwilab'),
(70711, 70, 71, 24, 20000, '3600.00', '983.00', 'rizal_invitation.jpg', '7017.00', 'leignlirasan', '2019-03-04 16:52:52', 'Active', 'New', 8, 'Approve', 1, 'Approve', NULL, NULL, 'leignlirasan', 'jamescaturas', 'ianwilab'),
(72701, 72, 70, 16, 10600, '1272.00', '742.00', 'noimage.jpg', NULL, NULL, '2019-03-05 05:19:12', 'Pending', 'New', 8, NULL, 67, NULL, NULL, NULL, NULL, NULL, NULL),
(72711, 72, 71, 17, 10200, '1301.00', '677.00', '1.jpg', '7323.00', 'jamescaturas', '2019-03-05 03:04:26', 'Active', 'New', 1, 'Approve', 8, 'Approve', NULL, NULL, 'jamescaturas', 'leignlirasan', 'ianwilab'),
(73711, 73, 71, 24, 20000, '3600.00', '983.00', '1.jpg', '9017.00', 'ianwilab', '2019-03-05 05:29:24', 'Active', 'New', 1, 'Approve', 72, 'Approve', NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(74711, 74, 71, 12, 20000, '1800.00', '1817.00', '1.jpg', '8183.00', 'leignlirasan', '2019-03-05 06:25:43', 'Active', 'New', 1, 'Approve', 72, 'Approve', NULL, NULL, 'leignlirasan', 'jamescaturas', 'ianwilab');

-- --------------------------------------------------------

--
-- Table structure for table `loan_app_deducs`
--

CREATE TABLE `loan_app_deducs` (
  `lad_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `loan_deduc` int(11) NOT NULL,
  `loan_deduc_amt` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_app_deducs`
--

INSERT INTO `loan_app_deducs` (`lad_id`, `voucher_id`, `loan_deduc`, `loan_deduc_amt`) VALUES
(27, 1, 26, '500.00'),
(28, 1, 32, '200.00'),
(38, 9, 26, '500.00'),
(42, 11, 26, '150.00'),
(44, 12, 26, '1000.00'),
(53, 5, 26, '500.00'),
(54, 5, 32, '200.00'),
(55, 11, 26, '150.00'),
(56, 13, 26, '200.00'),
(57, 13, 32, '200.00'),
(58, 14, 26, '102.00'),
(59, 14, 32, '200.00'),
(60, 15, 26, '200.00'),
(61, 15, 32, '200.00'),
(62, 1, 26, '500.00'),
(63, 1, 32, '200.00'),
(64, 16, 26, '200.00'),
(65, 16, 32, '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `loan_deductions`
--

CREATE TABLE `loan_deductions` (
  `deduc_id` int(11) NOT NULL,
  `deduc_name` varchar(255) NOT NULL,
  `deduc_type` varchar(255) NOT NULL,
  `deduc_val` decimal(7,2) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_deductions`
--

INSERT INTO `loan_deductions` (`deduc_id`, `deduc_name`, `deduc_type`, `deduc_val`, `date_added`, `date_updated`) VALUES
(1, 'No Deductions', 'none', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Service Fee', 'percentage', '1.00', '2019-02-19 13:49:24', '0000-00-00 00:00:00'),
(32, 'Retention Fee', 'amount', '200.00', '2019-02-24 13:30:56', '0000-00-00 00:00:00');

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
  `loan_description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `loan_name`, `loan_max_amt`, `loan_max_term`, `loan_interest`, `loan_status`, `loan_description`, `date_created`, `date_updated`) VALUES
(70, 'Multi-Purpose Loan', 120000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:33:47', '2019-02-21 22:50:08'),
(71, 'Regular Loan', 150000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:34:18', '2019-03-04 17:11:14'),
(72, 'Appliance Loan', 100000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:37:36', '2019-02-21 22:51:28'),
(73, 'Balik-Eskwela Loan', 50000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:38:17', '2019-01-30 22:35:15'),
(74, 'Birthday Loan', 50000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:38:30', '2019-01-30 22:35:12'),
(83, 'Holiday Loan', 20000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2019-01-15 15:06:17', '2019-01-30 22:35:06'),
(84, 'Poverty Alleviation Loan', 200000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2019-01-15 15:08:07', '2019-03-04 17:08:09'),
(86, 'Test Loan', 65, 36, '0.09', 'archived', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2019-02-26 15:10:31', '2019-02-26 15:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `loan_type_deducs`
--

CREATE TABLE `loan_type_deducs` (
  `id` int(11) NOT NULL,
  `loan_type_name` int(11) UNSIGNED NOT NULL,
  `loan_deduc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_type_deducs`
--

INSERT INTO `loan_type_deducs` (`id`, `loan_type_name`, `loan_deduc`) VALUES
(2, 73, 26),
(3, 74, 26),
(4, 83, 26),
(19, 70, 26),
(22, 72, 26),
(54, 86, 26),
(55, 86, 32),
(56, 84, 26),
(57, 71, 26),
(58, 71, 32);

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
  `last_login` datetime NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `username`, `password`, `email`, `birthday`, `address`, `zipcode`, `college`, `position`, `contact_no`, `user_img`, `last_login`, `register_date`) VALUES
(1, 'Ysa Domingo', 'ysadomingo', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ysadomingo@gmail.com', '1998-06-10', 'Las Pinas City', '1630', 'College of Science', 2, '09175086666', 'ysa.jpg', '2019-03-10 19:20:36', '2018-10-08 00:11:06'),
(2, 'Marilyn Ignacio', 'marilynignacio', '4e4d6c332b6fe62a63afe56171fd3725', 'marilynignacio@yahoo.com.ph', '1999-02-08', 'Taguig City', '1630', 'College of Science', 6, '09175086666', 'maamignacio.jpg', '2019-03-05 13:24:29', '2018-10-08 00:11:32'),
(3, 'Ian Arellano', 'ianwilab', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ianwilab@yahoo.com', '6667-06-07', 'Manila City', '1630', 'College of Liberal Arts', 3, '09175086666', 'ian.jpg', '2019-03-05 14:31:51', '2018-10-08 01:45:48'),
(4, 'James Caturas', 'jamescaturas', 'fcfd2ce63584cb06f919ed085bfea5a1', 'jamescaturas@yahoo.com', '7722-07-07', 'Manila City', '1630', 'College of Industrial Technology', 3, '09175086666', 'james.jpg', '2019-03-05 14:30:44', '2018-10-08 01:46:19'),
(5, 'Leign Lirasan', 'leignlirasan', 'fcfd2ce63584cb06f919ed085bfea5a1', 'leignlirasan@gmail.com', '7722-07-07', 'Paranaque City', '1630', 'College of Industrial Education', 3, '09175086666', 'leyn.jpg', '2019-03-05 14:28:59', '2018-10-08 01:46:55'),
(6, 'Joy Vizco', 'joyvizco', 'fcfd2ce63584cb06f919ed085bfea5a1', 'joyvizco@gmail.com', '2006-12-30', 'Manila City', '1630', 'College of Science', 5, '09175086666', 'noimage.jpg', '2019-03-05 15:06:15', '2018-10-08 23:11:08'),
(7, 'May F. Garcia', 'maygarcia', 'fcfd2ce63584cb06f919ed085bfea5a1', 'maygarcia@gmail.com', '1970-01-01', 'Pateros', '3312', 'College of Science', 4, '09175086666', 'may.jpg', '2019-03-05 14:34:04', '2018-10-18 00:25:28'),
(8, 'Butch Ross Bituonan', 'bbituonan', '827ccb0eea8a706c4c34a16891f84e7b', 'rbituonan@tup.edu.ph', '1970-01-01', 'Manila', '1012', 'College of Science', 2, '09175086666', 'noimage.jpg', '2019-03-05 11:10:30', '2019-01-18 15:35:08'),
(9, 'Jezikiel Dolores Guevarra', 'jezguevarraa', '4e4d6c332b6fe62a63afe56171fd3725', 'jez@gmail.com', '1970-01-01', 'Cavite', '1630', 'College of Science', 2, '09175449999', 'noimage.jpg', '2019-02-03 20:14:16', '2019-01-27 03:51:54'),
(41, 'Dhan Ritsard Francisco', 'dhanrichard', 'fcfd2ce63584cb06f919ed085bfea5a1', 'dhanrichard@gmail.com', '1970-01-01', 'Pasay', '1630', 'College of Science', 2, '09178566666', 'noimage.jpg', '2019-03-02 16:03:45', '2019-01-28 23:12:09'),
(42, 'Franz Duterte Esponilla', 'franz', '827ccb0eea8a706c4c34a16891f84e7b', 'franz@y.com', '1970-01-01', 'Las Pinas', '1000', 'College of Liberal Arts', 2, '12345', 'noimage.jpg', '2019-02-04 17:16:13', '2019-02-04 17:15:56'),
(43, 'Fjord Ramses Dela Cruz', 'fjord', '202cb962ac59075b964b07152d234b70', 'fjord@y.com', '1970-01-01', 'Paranaque', '1000', 'College of Science', 2, '19275666666', 'noimage.jpg', '2019-02-26 18:08:40', '2019-02-04 22:28:05'),
(64, 'System Admin', 'systemadmin', '202cb962ac59075b964b07152d234b70', 'systemadmin@gmail.com', '1970-01-01', 'Las Pinas City', '1742', 'College of Science', 1, '092324343', '14354946_1663603397002678_7996517683472105548_n4.jpg', '2019-02-26 17:25:04', '2019-02-26 07:12:20'),
(66, 'Federico III Lomibao Ladisla', 'junii', '202cb962ac59075b964b07152d234b70', 'ladislajunny@gmail.com', '1970-01-01', 'Wentworth Point', '2127', 'College of Liberal Arts', 2, '430975551', 'noimage.jpg', '2019-02-26 16:37:20', '2019-02-26 00:00:00'),
(67, 'Darwin C Vargas', 'dcvargas', 'fcfd2ce63584cb06f919ed085bfea5a1', 'dcvargas@gmail.com', '1970-01-01', 'Manila', '1234', 'College of Science', 2, '09121213232', 'act2.jpg', '2019-02-26 18:09:06', '2018-07-11 00:00:00'),
(68, 'Fernando Lakbayo Renegado', 'frenegado', '202cb962ac59075b964b07152d234b70', 'frenegado@gmail.com', '1970-01-01', 'Bulacan', '2030', 'College of Science', 2, '09999999999', 'noimage.jpg', '2019-03-02 16:50:13', '2019-02-26 00:00:00'),
(69, 'Juan Miguel C. Ladisla', 'migsladisla', 'fcfd2ce63584cb06f919ed085bfea5a1', 'nonoyladisla@yahoo.com.ph', '1999-02-08', 'Taguig City', '1630', 'College of Science', 7, '09175086565', 'noimage.jpg', '2019-03-05 14:19:24', '2019-03-02 17:31:36'),
(70, 'Test ASDs sasa', 'jonas', 'fcfd2ce63584cb06f919ed085bfea5a1', 'dasf243', '1970-01-01', 'dsadsadsa', '3342', 'College of Science', 2, '342', 'noimage.jpg', '2019-03-05 00:51:59', '2019-03-05 00:00:00'),
(72, 'John Mico Ramos Medina', 'johnmico', 'fcfd2ce63584cb06f919ed085bfea5a1', 'johnmico@y.com', '1970-01-01', 'Manila', '1666', 'College of Science', 2, '09999999999', 'noimage.jpg', '2019-03-05 14:28:25', '2019-03-05 00:00:00'),
(73, 'Mags Onay Quezada', 'magsonay', 'fcfd2ce63584cb06f919ed085bfea5a1', 'mags@y.com', '1970-01-01', 'Cavite', '1555', 'College of Science', 2, '09999999999', 'noimage.jpg', '2019-03-05 13:27:54', '2019-03-05 00:00:00'),
(74, 'Clarissa Anqui Librando', 'clalibrando', 'fcfd2ce63584cb06f919ed085bfea5a1', 'clarissa@yahoo.com', '1970-01-01', 'Caloocan', '1689', 'College of Science', 2, '09999999999', 'noimage.jpg', '2019-03-05 14:49:44', '2019-02-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `noti_id` int(11) UNSIGNED NOT NULL,
  `noti_voucher` int(11) DEFAULT NULL,
  `noti_for` varchar(255) NOT NULL,
  `noti_desc` varchar(255) NOT NULL,
  `noti_status` tinyint(1) NOT NULL,
  `noti_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`noti_id`, `noti_voucher`, `noti_for`, `noti_desc`, `noti_status`, `noti_date`) VALUES
(25, 1, 'bbituonan', 'Your Loan Application 8711 has been approved!', 0, '2019-02-25'),
(28, 9, 'junii', 'Your Loan Application 66711 has been approved!', 0, '2019-02-26'),
(30, 11, 'ysadomingo', 'Your Loan Application  has been approved!', 0, '2019-03-02'),
(31, 9, 'junii', 'Your Loan Application  has been approved!', 1, '2019-03-02'),
(32, 12, 'frenegado', 'Your Loan Application  has been approved!', 0, '2019-03-02'),
(33, 5, 'jezguevarraa', 'Your Loan Application  has been approved!', 1, '2019-03-04'),
(34, 11, 'ysadomingo', 'Your Loan Application  has been approved!', 1, '2019-03-04'),
(35, 13, 'jonas', 'Your Loan Application  has been approved!', 1, '2019-03-05'),
(36, 14, 'johnmico', 'Your Loan Application  has been approved!', 0, '2019-03-05'),
(37, 15, 'magsonay', 'Your Loan Application  has been approved!', 1, '2019-03-05'),
(38, 16, 'clalibrando', 'Your Loan Application  has been approved!', 0, '2019-03-05');

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
(4, 'Treasurer'),
(5, 'Credit Operations Manager'),
(6, 'Chairman of Board of Directors'),
(7, 'General Manager');

-- --------------------------------------------------------

--
-- Table structure for table `share_capital`
--

CREATE TABLE `share_capital` (
  `sc_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `share_capital` decimal(12,2) NOT NULL,
  `sharecap_paid` decimal(12,2) NOT NULL,
  `total_share_capital` decimal(12,2) NOT NULL,
  `subscribe_share` decimal(12,2) NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_for` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share_capital`
--

INSERT INTO `share_capital` (`sc_id`, `user_id`, `share_capital`, `sharecap_paid`, `total_share_capital`, `subscribe_share`, `or_number`, `status`, `updated_for`, `date_updated`) VALUES
(1, 1, '100.00', '100.00', '5000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(8, 8, '150.00', '150.00', '15000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(9, 9, '150.00', '150.00', '15000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(11, 41, '150.00', '150.00', '15000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(12, 42, '150.00', '150.00', '15000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(13, 43, '200.00', '200.00', '20000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(86, 66, '150.00', '150.00', '100000.00', '250000.00', 'MAR12345', 'paid', '2019-03-01', '2019-03-04'),
(88, 67, '150.00', '150.00', '10000.00', '100000.00', 'MAR12345', 'paid', '2019-03-01', '2019-02-26'),
(89, 67, '150.00', '0.00', '10150.00', '100000.00', '', 'unpaid', '2019-04-26', '0000-00-00'),
(90, 68, '100.00', '100.00', '10000.00', '100000.00', 'MAR12345', 'paid', '2019-03-26', '2019-02-26'),
(91, 68, '100.00', '0.00', '10100.00', '100000.00', '', 'unpaid', '2019-04-26', '0000-00-00'),
(104, 1, '100.00', '0.00', '50100.00', '100000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(105, 8, '150.00', '0.00', '15550.00', '100000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(106, 9, '150.00', '0.00', '15200.00', '100000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(107, 41, '150.00', '0.00', '15150.00', '100000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(108, 42, '150.00', '0.00', '15150.00', '100000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(109, 43, '200.00', '0.00', '20200.00', '100000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(110, 66, '150.00', '0.00', '100150.00', '250000.00', '', 'unpaid', '2019-04-01', '0000-00-00'),
(112, 70, '250.00', '250.00', '10000.00', '200000.00', 'TESTING1235', 'paid', '2019-03-04', '2019-03-04'),
(113, 70, '250.00', '0.00', '10450.00', '200000.00', 'MAY12345', 'paid', '2019-04-04', '2019-03-05'),
(116, 70, '250.00', '250.00', '10700.00', '200000.00', '', 'unpaid', '2019-05-04', '0000-00-00'),
(117, 72, '200.00', '200.00', '10000.00', '200000.00', 'APR12345', 'paid', '2019-03-05', '2019-03-05'),
(118, 72, '200.00', '0.00', '10400.00', '200000.00', 'MAY12345', 'paid', '2019-04-05', '2019-03-05'),
(119, 72, '200.00', '200.00', '10600.00', '200000.00', '', 'unpaid', '2019-05-05', '0000-00-00'),
(120, 73, '100.00', '100.00', '10000.00', '100000.00', 'MAR12345', 'paid', '2019-03-05', '2019-03-05'),
(121, 73, '100.00', '0.00', '10300.00', '100000.00', 'APR12345', 'paid', '2019-04-05', '2019-03-05'),
(122, 73, '100.00', '300.00', '10600.00', '100000.00', '', 'unpaid', '2019-05-05', '0000-00-00'),
(123, 74, '100.00', '100.00', '10000.00', '100000.00', 'MAR12345', 'paid', '2019-03-05', '2019-03-05'),
(124, 74, '100.00', '0.00', '10300.00', '100000.00', '', 'unpaid', '2019-04-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `vision` varchar(1500) NOT NULL,
  `mission` varchar(1500) NOT NULL,
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

INSERT INTO `website_info` (`id`, `title`, `vision`, `mission`, `address`, `telephone_no`, `cellphone_no`, `web_link`, `fb_account`, `twitter_account`, `email`) VALUES
(1, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'The TUPMMPC shall be an empowered organization providing quality services to the TUP community.', 'To improve the life of its members by providing innovative business practices and diversified services.', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09897382990', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.gmail.com/'),
(2, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', '', '', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09897382990', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.gmail.com/'),
(3, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', '', '', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com'),
(4, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', '', '', 'TUPMMPC Office, Care of Technological University of the Philippines, Ayala Blvd., Ermita, Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com'),
(5, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'The TUPMMPC shall be an empowered organization providing quality services to the TUP community. ', 'To improve the life of its members by providing innovative business practices and diversified services.', 'G/F TUP Cooperative Bldg., TUP Manila Compound, Ayala Blvd., cor. San Marcelino St., Brgy. 660 Zone 071, Ermita, Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_loan_apps`
--
ALTER TABLE `active_loan_apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_loans_loanapp_id_fk` (`active_loanapp_id`);

--
-- Indexes for table `approved_loan_apps`
--
ALTER TABLE `approved_loan_apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pending_loan_app_id_fk` (`loanapp_id`);

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
  ADD KEY `comaker_fk1` (`comaker_1`),
  ADD KEY `comaker_fk2` (`comaker_2`),
  ADD KEY `comaker_fk3` (`comaker_3`);

--
-- Indexes for table `loan_app_deducs`
--
ALTER TABLE `loan_app_deducs`
  ADD PRIMARY KEY (`lad_id`),
  ADD KEY `voucher_loan_deduc_fk2` (`loan_deduc`),
  ADD KEY `voucher_id_fk1` (`voucher_id`);

--
-- Indexes for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  ADD PRIMARY KEY (`deduc_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_type_deducs`
--
ALTER TABLE `loan_type_deducs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_deduc_fk2` (`loan_deduc`),
  ADD KEY `loan_name_fk1` (`loan_type_name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `members_ibfk_1` (`position`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noti_id`),
  ADD KEY `noti_name_fk1` (`noti_for`),
  ADD KEY `noti_voucher_fk2` (`noti_voucher`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `share_capital`
--
ALTER TABLE `share_capital`
  ADD PRIMARY KEY (`sc_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `approved_loan_apps`
--
ALTER TABLE `approved_loan_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `home_descriptions`
--
ALTER TABLE `home_descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `loanapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74712;
--
-- AUTO_INCREMENT for table `loan_app_deducs`
--
ALTER TABLE `loan_app_deducs`
  MODIFY `lad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  MODIFY `deduc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `loan_type_deducs`
--
ALTER TABLE `loan_type_deducs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noti_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `share_capital`
--
ALTER TABLE `share_capital`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `website_info`
--
ALTER TABLE `website_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_loan_apps`
--
ALTER TABLE `active_loan_apps`
  ADD CONSTRAINT `active_loans_loanapp_id_fk` FOREIGN KEY (`active_loanapp_id`) REFERENCES `loan_applications` (`loanapp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approved_loan_apps`
--
ALTER TABLE `approved_loan_apps`
  ADD CONSTRAINT `pending_loan_app_id_fk` FOREIGN KEY (`loanapp_id`) REFERENCES `loan_applications` (`loanapp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `comaker_fk1` FOREIGN KEY (`comaker_1`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comaker_fk2` FOREIGN KEY (`comaker_2`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comaker_fk3` FOREIGN KEY (`comaker_3`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_app_cc1fk_1` FOREIGN KEY (`cc_approval_1`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_app_cc2fk_2` FOREIGN KEY (`cc_approval_2`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_app_cc3fk_3` FOREIGN KEY (`cc_approval_3`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_type_fk` FOREIGN KEY (`loan_applied`) REFERENCES `loan_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `thm_verifiedby_fk` FOREIGN KEY (`thp_verified_by`) REFERENCES `members` (`username`);

--
-- Constraints for table `loan_app_deducs`
--
ALTER TABLE `loan_app_deducs`
  ADD CONSTRAINT `voucher_id_fk1` FOREIGN KEY (`voucher_id`) REFERENCES `approved_loan_apps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voucher_loan_deduc_fk2` FOREIGN KEY (`loan_deduc`) REFERENCES `loan_deductions` (`deduc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_type_deducs`
--
ALTER TABLE `loan_type_deducs`
  ADD CONSTRAINT `loan_deduc_fk2` FOREIGN KEY (`loan_deduc`) REFERENCES `loan_deductions` (`deduc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_name_fk1` FOREIGN KEY (`loan_type_name`) REFERENCES `loan_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`position`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `noti_name_fk1` FOREIGN KEY (`noti_for`) REFERENCES `members` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noti_voucher_fk2` FOREIGN KEY (`noti_voucher`) REFERENCES `approved_loan_apps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `share_capital`
--
ALTER TABLE `share_capital`
  ADD CONSTRAINT `user_id_fk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
