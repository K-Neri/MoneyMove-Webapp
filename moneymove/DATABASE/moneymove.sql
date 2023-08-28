-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 01:18 PM
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
-- Database: `moneymove`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `confirmpwd` varchar(25) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `username`, `email`, `password`, `confirmpwd`, `contact`, `address`) VALUES
(4, 'KWIZERA', 'Neri', 'nelliam', 'neri@gmail.com', 'nelliam', 'nelliam', '256783263053', 'Kampala'),
(5, 'KWIZERA', 'Neri', 'admin', 'admin@gmail.com', 'admin', 'admin', '256783263053', 'Kampala'),
(12, 'uwayisaba', 'alexandre', 'alexandre', 'alexandre@gmail.com', 'uwayisaba', 'uwayisaba', '256', 'kabalagal');

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_contact` varchar(50) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `r_address` varchar(50) NOT NULL,
  `r_idtype` varchar(25) NOT NULL,
  `r_idnum` varchar(25) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_contact` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(15) NOT NULL,
  `receiving_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`id`, `code`, `r_name`, `r_contact`, `origin`, `r_address`, `r_idtype`, `r_idnum`, `s_name`, `s_contact`, `destination`, `amount`, `currency`, `receiving_time`) VALUES
(7, '5274489646', 'NERI KWIZERA', '01267857895', 'BELGIUM', 'BUJUMBURA', 'NATIONAL ID', '9876543', 'eddy khan ndacasaba', '12345678', 'BURUNDI', 1000, 'EUR', '2023-08-26 11:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_contact` varchar(15) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `s_address` varchar(50) NOT NULL,
  `s_idtype` varchar(25) NOT NULL,
  `s_idnum` varchar(25) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_contact` varchar(15) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(25) NOT NULL,
  `code` varchar(15) NOT NULL,
  `sending_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`id`, `s_name`, `s_contact`, `origin`, `s_address`, `s_idtype`, `s_idnum`, `r_name`, `r_contact`, `destination`, `amount`, `currency`, `code`, `sending_time`) VALUES
(18, 'Test name', '02145879', 'KPLA', 'ngozi', 'National Id', '1306/2077/2011', 'Another Receiver', '79120281', 'buja', 5000, 'EUR', '6100703408', '2023-08-26 11:12:05'),
(19, 'eddy khan ndacasaba', '12345678', 'BELGIUM', 'BERCHEM', 'NATIONAL ID', '9876543', 'NERI KWIZERA', '01267857895', 'BURUNDI', 100, 'USD', '5274489646', '2023-08-26 11:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `role`, `contact`, `address`) VALUES
(1, 'KWIZERA', 'NERI', 'neri', 'kwizeraneri@gmail.com', 'neri', 'Admin', '123456789', 'Kampala'),
(2, 'NDUWAYO', 'Yves', 'yves', 'nduwayoyves@gmail.com', 'nduwayo', 'teller', '017354232', 'Kampala'),
(3, 'ndacasaba', 'EDDY', 'eddy', 'eddy@gmail.com', 'eddy', 'admin', '123456', 'BELGIUM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `send`
--
ALTER TABLE `send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
