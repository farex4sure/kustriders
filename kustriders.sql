-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 04:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kustriders`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `date`) VALUES
(1, 'Faruq Hassan', '08080779683', 'farex@gmail.com', '123456', '2022-12-31 15:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guarantor`
--

INSERT INTO `guarantor` (`id`, `name`, `phone`, `gender`, `address`, `userid`, `date`) VALUES
(1, 'umar umar', '08023866816', 'Male', 'sqxdwsfdfgthujkl', '08114528984', '1672412714');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_pay`
--

CREATE TABLE `monthly_pay` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastpay` varchar(255) NOT NULL,
  `nextpay` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_pay`
--

INSERT INTO `monthly_pay` (`id`, `userid`, `lastpay`, `nextpay`, `date`) VALUES
(1, '08114528984', '1672578600', '1675208343', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `refs`
--

CREATE TABLE `refs` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `refcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paidby` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `used` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refs`
--

INSERT INTO `refs` (`id`, `refcode`, `paidby`, `used`, `dt`) VALUES
(0000000000, '9553866', NULL, 'true', NULL),
(0000000000, '2212314', NULL, 'true', NULL),
(0000000000, '11060603', NULL, 'true', NULL),
(0000000000, '6191893', NULL, 'true', NULL),
(0000000000, '9277651', NULL, 'true', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reg_payment`
--

CREATE TABLE `reg_payment` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_payment`
--

INSERT INTO `reg_payment` (`id`, `userid`, `amt`, `date`) VALUES
(5, '08114528984', '5500', '1672578600');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bike_brand` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `st` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `fullname`, `username`, `phone`, `gender`, `occupation`, `password`, `bike_brand`, `plate_no`, `address`, `st`, `date`) VALUES
(2, 'Faruq Abiodun', 'farex', '08114528984', 'Male', '', '123456', 'bajaj', '', 'No 60 Ahmadu Bello Way, Kano State', '1', '1672411008');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `amt` varchar(255) NOT NULL,
  `refid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `sender`, `receiver`, `amt`, `refid`, `date`) VALUES
(4, '08114528984', 'KUST', '5500', 'T2023_Jan_Sun_141000_4655', '1672578600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantor`
--
ALTER TABLE `guarantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_pay`
--
ALTER TABLE `monthly_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_payment`
--
ALTER TABLE `reg_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_pay`
--
ALTER TABLE `monthly_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reg_payment`
--
ALTER TABLE `reg_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
