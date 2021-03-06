-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2021 at 09:36 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `confirmpwd` varchar(25) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `receive`;
CREATE TABLE IF NOT EXISTS `receive` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `amount` int NOT NULL,
  `currency` varchar(15) NOT NULL,
  `receiving_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`id`, `code`, `r_name`, `r_contact`, `origin`, `r_address`, `r_idtype`, `r_idnum`, `s_name`, `s_contact`, `destination`, `amount`, `currency`) VALUES
(6, '6100703408', 'Another Receiver', '79120281', 'KPLA', 'buja', 'National Id', '1306/2077/2011', 'Test name', '79120281', 'buja', 100, 'GBP');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

DROP TABLE IF EXISTS `send`;
CREATE TABLE IF NOT EXISTS `send` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) NOT NULL,
  `s_contact` varchar(15) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `s_address` varchar(50) NOT NULL,
  `s_idtype` varchar(25) NOT NULL,
  `s_idnum` varchar(25) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_contact` varchar(15) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `amount` int NOT NULL,
  `currency` varchar(25) NOT NULL,
  `code` varchar(15) NOT NULL,
  `sending_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`id`, `s_name`, `s_contact`, `origin`, `s_address`, `s_idtype`, `s_idnum`, `r_name`, `r_contact`, `destination`, `amount`, `currency`, `code`) VALUES
(18, 'Test name', '02145879', 'KPLA', 'ngozi', 'National Id', '1306/2077/2011', 'Another Receiver', '79120281', 'buja', 100, 'GBP', '6100703408');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `role`, `contact`, `address`) VALUES
(2, 'admin', 'user', 'admin', 'admin@email.com', '12345678', 'Admin', '79931913', 'head quarter'),
(10, 'kwizera', 'neri', 'neri', 'neri@gmail.com', '123456789', 'Teller', '0783263053', 'kampala');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
