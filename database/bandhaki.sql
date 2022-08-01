-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 12:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandhaki`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `db_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `username`, `password`, `org_name`, `db_name`) VALUES
(1, 'demo', 'testing123', 'Demo', 'test_db');

-- --------------------------------------------------------

--
-- Table structure for table `full_details`
--

CREATE TABLE `full_details` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `set_date` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `productwt` decimal(65,0) NOT NULL,
  `rate` decimal(65,0) NOT NULL,
  `deduct` decimal(65,0) NOT NULL,
  `valuated_amt` decimal(65,0) NOT NULL,
  `loan_amt` decimal(65,0) NOT NULL,
  `interest_rate` decimal(65,0) NOT NULL,
  `metal` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `product_qt` int(255) NOT NULL,
  `descript` text NOT NULL,
  `addr` varchar(255) NOT NULL,
  `months` varchar(255) NOT NULL,
  `monthly_int` varchar(255) NOT NULL,
  `monthly_emi` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `full_details`
--

INSERT INTO `full_details` (`id`, `date`, `set_date`, `customer_name`, `productwt`, `rate`, `deduct`, `valuated_amt`, `loan_amt`, `interest_rate`, `metal`, `contact`, `product_qt`, `descript`, `addr`, `months`, `monthly_int`, `monthly_emi`, `state`) VALUES
(2, '2021-07-18', '2021-08-18', 'Mr. Suman Gahtraj', '15', '92000', '15', '100566', '75425', '9', 'Gold', '98521254455', 3, '                          sdfghjkwertyuiozxcvbnm,sdfghjkl.', 'Itahari-8', '3', '566', '25707.666666667', 'Active'),
(3, '2021-07-18', '2021-11-18', 'Mr. Suman Gahtraj', '15', '92000', '12', '104115', '78086', '9', 'Gold', '98521254455', 2, '                          sdfghjklertsrtyughin;lm', 'Itahari-8', '6', '586', '13600.333333333', 'Active'),
(4, '2021-07-18', '2021-11-29', 'Mr. Harish', '12', '92000', '15', '80452', '60339', '9', 'Gold', '98521254455', 10, '                          asdfghjkldfghjkl;\'', 'sdfghjk', '6', '453', '10509.5', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `trans_id` int(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `trans_id`, `exp_date`, `customer_name`) VALUES
(1, 3, '2021-05-30', 'Mr. Suman Gahtraj'),
(2, 4, '2021-05-31', 'Mr. Harish');

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `id` int(11) NOT NULL,
  `paid_date` date NOT NULL DEFAULT current_timestamp(),
  `trans_id` varchar(255) NOT NULL,
  `paid_amt` decimal(65,0) NOT NULL,
  `paid_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `paid_date`, `trans_id`, `paid_amt`, `paid_type`) VALUES
(1, '2021-07-18', '3', '586', 'Interest'),
(2, '2021-07-18', '4', '2000', 'Interest'),
(3, '2021-07-18', '4', '3000', 'EMI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_details`
--
ALTER TABLE `full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `full_details`
--
ALTER TABLE `full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
