-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 07:23 PM
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
  `or_number` varchar(255) NOT NULL,
  `balance` decimal(7,2) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_for` date NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_loan_apps`
--


INSERT INTO `active_loan_apps` (`id`, `loanapp_id`, `or_number`, `balance`, `remarks`, `payment_status`, `payment_for`, `payment_date`) VALUES
(1, 9, 'UPL12345', '48604.17', 'New', 'paid', '2019-02-04', '2019-02-15'),
(2, 1, 'UPL12345', '4329.00', 'New', 'paid', '2019-02-04', '2019-02-15'),
(3, 3, 'UPL12345', '7076.25', 'New', 'paid', '2019-02-04', '2019-02-15'),
(4, 2, 'UPL12345', '29526.15', 'New', 'paid', '2019-02-04', '2019-02-15'),
(11, 3, '', '5652.50', 'New', 'unpaid', '2019-03-15', '0000-00-00'),
(12, 9, '', '47208.34', 'New', 'unpaid', '2019-03-15', '0000-00-00'),
(13, 2, '', '27052.30', 'New', 'unpaid', '2019-03-15', '0000-00-00'),
(14, 1, '', '2158.00', 'New', 'unpaid', '2019-03-15', '0000-00-00');

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
(4, 4, 324242, 0, '0.00', '0.00', '0.00', '0.00', '0.00', 'Approved', '2019-01-31 01:19:04', '0000-00-00'),
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
(1, 2, 73, 3, 6500, '13.00', '2171.00', 'payslip-example.png', '22829.00', 'ianwilab', '2019-01-13 15:36:23', 'Approved', 'New', 6, NULL, 1, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(2, 2, 71, 13, 32000, '160.00', '2473.85', 'payslip-example.png', '62526.15', 'ianwilab', '2019-01-13 15:38:05', 'Active', 'New', 5, NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(3, 3, 71, 6, 8500, '42.50', '1423.75', 'payslip-example.png', '33076.25', 'ianwilab', '2019-01-14 14:14:23', 'Approved', 'New', 6, NULL, 7, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(4, 3, 70, 9, 75000, '750.00', '8416.67', 'payslip-example.png', '15083.33', 'ianwilab', '2019-01-14 14:15:00', 'Approved', 'New', 6, NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(5, 2, 71, 22, 35000, '175.00', '1598.86', 'payslip-example.png', '0.00', NULL, '2019-01-15 07:14:57', 'Pending', 'New', 6, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 71, 6, 7000, '35.00', '1172.50', 'payslip-example.png', '25327.50', 'ianwilab', '2019-01-17 14:44:47', 'Pending', 'New', 6, NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', NULL),
(7, 8, 71, 36, 50000, '250.00', '1395.83', 'payslip-example.png', '63604.17', 'ianwilab', '2019-01-18 07:48:10', 'Approved', 'New', 4, NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(9, 9, 71, 36, 50000, '250.00', '1395.83', 'payslip-example.png', '28604.17', 'ianwilab', '2019-01-18 07:48:10', 'Approved', 'New', 4, NULL, NULL, NULL, NULL, NULL, 'ianwilab', 'leignlirasan', 'jamescaturas'),
(2721, 2, 72, 24, 25000, '0.00', '0.00', 'payslip-example.png', '0.00', NULL, '2019-02-04 08:42:42', 'Pending', 'New', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2741, 2, 74, 24, 25000, '0.00', '0.00', 'payslip-example.png', '0.00', NULL, '2019-02-12 17:42:14', 'Pending', 'New', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


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
(1, 'No Deductions', 'None', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Service Fee', 'percentage', '2.00', '2019-02-08 23:35:29', '0000-00-00 00:00:00'),
(25, 'Retention Fee', 'amount', '250.00', '2019-02-08 23:40:22', '0000-00-00 00:00:00');

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
(70, 'Multi-Purpose Loan', 120000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:33:47', '2019-01-30 22:35:21'),
(71, 'Regular Loan', 150000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:34:18', '2019-01-30 22:35:19'),
(72, 'Appliance Loan', 100000, 36, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:37:36', '2019-02-09 20:52:03'),
(73, 'Balik-Eskwela Loan', 50000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:38:17', '2019-01-30 22:35:15'),
(74, 'Birthday Loan', 50000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2018-11-07 09:38:30', '2019-01-30 22:35:12'),
(83, 'Holiday Loan', 20000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2019-01-15 15:06:17', '2019-01-30 22:35:06'),
(84, 'Poverty Alleviation Loan', 200000, 24, '0.09', 'active', 'A loan is a thing that is borrowed, especially a sum of money that is expected to be paid back with interest.', '2019-01-15 15:08:07', '2019-02-11 02:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `loan_type_deducs`
--

CREATE TABLE `loan_type_deducs` (
  `id` int(11) NOT NULL,
  `loan_name` int(11) UNSIGNED NOT NULL,
  `loan_deduc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_type_deducs`
--

INSERT INTO `loan_type_deducs` (`id`, `loan_name`, `loan_deduc`) VALUES
(13, 73, 1),
(14, 74, 1),
(15, 83, 1),
(16, 70, 1),
(18, 71, 1),
(41, 72, 24),
(49, 84, 24),
(50, 84, 25);

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
(1, 'Ysa Domingo', 'ysadomingo', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ysadomingo@gmail.com', '1998-06-10', 'Las Pinas City', '1630', 'College of Science', 2, '09175086666', 'ysa.jpg', '2019-02-14 22:41:55', '2018-10-08 00:11:06'),
(2, 'Juan Miguel C. Ladisla', 'migsladisla', '4e4d6c332b6fe62a63afe56171fd3725', 'nonoyladisla@yahoo.com.ph', '1999-02-08', 'Taguig City', '1630', 'College of Science', 6, '09175086666', 'fcd72677dcaa701e191c01c8e8ba83e0.jpg', '2019-02-15 00:09:03', '2018-10-08 00:11:32'),
(3, 'Ian Arellano', 'ianwilab', 'fcfd2ce63584cb06f919ed085bfea5a1', 'ianwilab@yahoo.com', '6667-06-07', 'Manila City', '1630', 'College of Liberal Arts', 3, '09175086666', 'ian.jpg', '2019-02-15 02:06:29', '2018-10-08 01:45:48'),
(4, 'James Caturas', 'jamescaturas', 'fcfd2ce63584cb06f919ed085bfea5a1', 'jamescaturas@yahoo.com', '7722-07-07', 'Manila City', '1630', 'College of Industrial Technology', 3, '09175086666', 'james.jpg', '2019-02-03 20:14:16', '2018-10-08 01:46:19'),
(5, 'Leign Lirasan', 'leignlirasan', 'fcfd2ce63584cb06f919ed085bfea5a1', 'leignlirasan@gmail.com', '7722-07-07', 'Paranaque City', '1630', 'College of Industrial Education', 3, '09175086666', 'leyn.jpg', '2019-02-03 20:14:16', '2018-10-08 01:46:55'),
(6, 'Eugene Lofranco', 'ugelofranco', 'fcfd2ce63584cb06f919ed085bfea5a1', 'eugenelofranco@gmail.com', '2006-12-30', 'Manila City', '1630', 'College of Science', 5, '09175086666', 'noimage.jpg', '2019-02-15 00:09:35', '2018-10-08 23:11:08'),
(7, 'May F. Garcia', 'maygarcia', 'fcfd2ce63584cb06f919ed085bfea5a1', 'jana', '1970-01-01', 'Pateros', '3312', 'College of Science', 4, '09175086666', 'may.jpg', '2019-02-14 22:58:38', '2018-10-18 00:25:28'),
(8, 'Butch Ross Bituonan', 'bbituonan', '827ccb0eea8a706c4c34a16891f84e7b', 'rbituonan@tup.edu.ph', '1970-01-01', 'Manila', '1012', 'College of Science', 2, '09175086666', 'noimage.jpg', '2019-02-03 20:14:16', '2019-01-18 15:35:08'),
(9, 'Jezikiel Dolores Guevarra', 'jezguevarraa', '4e4d6c332b6fe62a63afe56171fd3725', 'jez@gmail.com', '1970-01-01', 'Cavite', '1630', 'College of Science', 2, '09175449999', 'noimage.jpg', '2019-02-03 20:14:16', '2019-01-27 03:51:54'),
(39, 'Jezikiel Dolores Guevarra', 'jezguevarra', '4e4d6c332b6fe62a63afe56171fd3725', 'jez@gmail.com', '1970-01-01', 'Cavite', '1630', 'College of Science', 2, '09175449999', 'noimage.jpg', '2019-02-03 20:14:16', '2019-01-27 03:51:54'),
(41, 'Dhan Ritsard Francisco', 'dhanrichard', 'd50230a50070e59d7ad316962a55ac71', 'dhanrichard@gmail.com', '1970-01-01', 'Pasay', '1630', 'College of Science', 2, '09178566666', 'noimage.jpg', '2019-02-03 20:14:16', '2019-01-28 23:12:09'),
(42, 'Franz Duterte Esponilla', 'franz', '827ccb0eea8a706c4c34a16891f84e7b', 'franz@y.com', '1970-01-01', 'Las Pinas', '1000', 'College of Liberal Arts', 2, '12345', 'noimage.jpg', '2019-02-04 17:16:13', '2019-02-04 17:15:56'),
(43, 'Fjord Ramses Dela Cruz', 'fjord', '202cb962ac59075b964b07152d234b70', 'fjord@y.com', '1970-01-01', 'Paranaque', '1000', 'College of Science', 2, '19275666666', 'noimage.jpg', '2019-02-04 22:39:50', '2019-02-04 22:28:05'),
(52, 'Bentong Dela Cruz Dela Laptrip', 'fsafafsa', '202cb962ac59075b964b07152d234b70', 'dsadsadsa', '1970-01-01', 'Taguig', '1243', 'College of Science', 2, '23242', 'noimage.jpg', '0000-00-00 00:00:00', '2019-02-11 21:36:54'),
(53, 'George Oliveros Domingo', 'kainnakayo', '202cb962ac59075b964b07152d234b70', 'gsdgfsdgd', '1970-01-01', 'Las Pinas City', '1222', 'College of Engineering', 2, '23243342', 'noimage.jpg', '0000-00-00 00:00:00', '2019-02-11 22:14:18'),
(57, 'Eminem Marshall Matters', 'eminem123', '4e4d6c332b6fe62a63afe56171fd3725', 'hhhhha232', '1970-01-01', 'Cleveland', '1666', 'College of Science', 2, '09929129192', 'noimage.jpg', '0000-00-00 00:00:00', '2019-02-13 00:00:00');

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
(5, 'Manager'),
(6, 'Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `share_capital`
--

CREATE TABLE `share_capital` (
  `sc_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `share_capital` int(11) NOT NULL,
  `total_share_capital` int(11) NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_for` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share_capital`
--

INSERT INTO `share_capital` (`sc_id`, `user_id`, `share_capital`, `total_share_capital`, `or_number`, `status`, `updated_for`, `date_updated`) VALUES
(1, 1, 100, 5000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(2, 2, 100, 5000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(3, 3, 100, 10000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(4, 4, 100, 10000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(5, 5, 100, 10000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(6, 6, 100, 10000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(7, 7, 150, 15000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(8, 8, 150, 15000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(9, 9, 150, 15000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(10, 39, 150, 15000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(11, 41, 150, 15000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(12, 42, 150, 15000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(13, 43, 200, 20000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(17, 52, 300, 20000, 'TUP12345', 'paid', '2019-01-01', '2018-12-11'),
(18, 1, 100, 5100, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(19, 2, 100, 5100, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(20, 3, 100, 10100, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(21, 4, 100, 10100, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(22, 5, 100, 10100, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(23, 6, 100, 10100, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(24, 7, 150, 15150, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(25, 8, 150, 15150, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(26, 9, 150, 15150, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(27, 39, 150, 15150, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(28, 41, 150, 15150, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(29, 42, 150, 15150, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(30, 43, 200, 20200, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(34, 52, 300, 20300, 'LP678910', 'paid', '2019-02-01', '2019-02-11'),
(35, 53, 500, 30000, 'LP678910', 'paid', '2019-02-11', '2019-02-11'),
(36, 53, 500, 30500, '', 'unpaid', '2019-03-11', '0000-00-00'),
(37, 1, 100, 5200, '', 'unpaid', '2019-03-11', '0000-00-00'),
(38, 2, 100, 5200, '', 'unpaid', '2019-03-11', '0000-00-00'),
(39, 3, 100, 10200, '', 'unpaid', '2019-03-11', '0000-00-00'),
(40, 4, 100, 10200, '', 'unpaid', '2019-03-11', '0000-00-00'),
(41, 5, 100, 10200, '', 'unpaid', '2019-03-11', '0000-00-00'),
(42, 6, 100, 10200, '', 'unpaid', '2019-03-11', '0000-00-00'),
(43, 7, 150, 15300, '', 'unpaid', '2019-03-11', '0000-00-00'),
(44, 8, 150, 15300, '', 'unpaid', '2019-03-11', '0000-00-00'),
(45, 9, 150, 15300, '', 'unpaid', '2019-03-11', '0000-00-00'),
(46, 39, 150, 15300, '', 'unpaid', '2019-03-11', '0000-00-00'),
(48, 41, 150, 15300, '', 'unpaid', '2019-03-11', '0000-00-00'),
(49, 52, 300, 20600, '', 'unpaid', '2019-03-11', '0000-00-00'),
(50, 42, 150, 15300, '', 'unpaid', '2019-03-11', '0000-00-00'),
(51, 43, 200, 20400, '', 'unpaid', '2019-03-11', '0000-00-00');

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
(3, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'Ayala Blvd., Ermita, Manila, 1000 Metro Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com'),
(4, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'TUPMMPC Office, Care of Technological University of the Philippines, Ayala Blvd., Ermita, Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com'),
(5, 'Technological University of the Philippines Manila Multi-Purpose Cooperative', 'G/F TUP Cooperative Bldg., TUP Manila Compound, Ayala Blvd., cor. San Marcelino St., Brgy. 660 Zone 071, Ermita, Manila', '878-34-34', '09175086565', 'www.tup.edu.ph', 'https://www.facebook.com/', 'https://www.twitter.com/', 'joyvisco@tupmmpc.gmail.com');

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
  ADD KEY `comaker_fk1` (`comaker_1`),
  ADD KEY `comaker_fk2` (`comaker_2`),
  ADD KEY `comaker_fk3` (`comaker_3`);
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
  ADD KEY `loan_name_fk1` (`loan_name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `members_ibfk_1` (`position`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `loanapp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2742;

--
-- AUTO_INCREMENT for table `loan_deductions`
--
ALTER TABLE `loan_deductions`
  MODIFY `deduc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `loan_type_deducs`
--
ALTER TABLE `loan_type_deducs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `share_capital`
--
ALTER TABLE `share_capital`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  ADD CONSTRAINT `comaker_fk1` FOREIGN KEY (`comaker_1`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `comaker_fk2` FOREIGN KEY (`comaker_2`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `comaker_fk3` FOREIGN KEY (`comaker_3`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `loan_app_cc1fk_1` FOREIGN KEY (`cc_approval_1`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_app_cc2fk_2` FOREIGN KEY (`cc_approval_2`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_app_cc3fk_3` FOREIGN KEY (`cc_approval_3`) REFERENCES `members` (`username`),
  ADD CONSTRAINT `loan_type_fk` FOREIGN KEY (`loan_applied`) REFERENCES `loan_types` (`id`),
  ADD CONSTRAINT `member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `thm_verifiedby_fk` FOREIGN KEY (`thp_verified_by`) REFERENCES `members` (`username`);

--
-- Constraints for table `loan_type_deducs`
--
ALTER TABLE `loan_type_deducs`
  ADD CONSTRAINT `loan_deduc_fk2` FOREIGN KEY (`loan_deduc`) REFERENCES `loan_deductions` (`deduc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_name_fk1` FOREIGN KEY (`loan_name`) REFERENCES `loan_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`position`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `share_capital`
--
ALTER TABLE `share_capital`
  ADD CONSTRAINT `user_id_fk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
