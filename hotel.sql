-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 03:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `rType` varchar(100) NOT NULL,
  `aDate` date NOT NULL,
  `dDate` date NOT NULL,
  `rCount` int(11) NOT NULL,
  `request` text NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `NIC` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `telNo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `rType`, `aDate`, `dDate`, `rCount`, `request`, `fName`, `lName`, `NIC`, `country`, `telNo`, `email`) VALUES
(1, 'double', '2020-02-25', '2020-02-28', 3, '', 'supun', 'nirmal', '', '', '', ''),
(2, 'single', '0000-00-00', '0000-00-00', 0, '', '', '', '', '', '', ''),
(3, 'single', '2020-02-24', '2020-02-25', 1, '', 'nuwan', 'perera', '', '', '', ''),
(4, 'single', '2020-02-24', '2020-02-25', 1, '', 'nuwan', 'perera', '', '', '', ''),
(5, 'single', '2020-02-24', '2020-02-25', 1, '', 'nuwan', 'perera', '', '', '', ''),
(6, 'single', '2020-02-24', '2020-02-25', 1, '', 'nuwan', 'perera', '', '', '', ''),
(7, 'double', '2020-02-24', '2020-02-25', 1, '', 'nuwan', 'perera', '', '', '', ''),
(8, 'double', '2020-02-24', '2020-02-25', 1, '', 'nuwan', 'perera', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `type` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`type`, `count`) VALUES
('double', 5),
('single', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `fktyperoom` (`rType`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fktyperoom` FOREIGN KEY (`rType`) REFERENCES `room` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
