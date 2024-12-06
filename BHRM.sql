-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 03:17 PM
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
-- Database: `bhrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bhapplication`
--

CREATE TABLE `bhapplication` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `hname` varchar(25) NOT NULL,
  `haddress` varchar(25) NOT NULL,
  `contact_no` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `landlord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhapplication`
--

INSERT INTO `bhapplication` (`id`, `owner`, `hname`, `haddress`, `contact_no`, `status`, `landlord`) VALUES
(1, 'dodge@gmail.com', 'Dodge Boarding House', 'Zamboanggaa', 946464646, 'Approved', 'Dodge');

-- --------------------------------------------------------

--
-- Table structure for table `boardinghouses`
--

CREATE TABLE `boardinghouses` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `hname` varchar(25) NOT NULL,
  `haddress` varchar(25) NOT NULL,
  `contact_no` int(255) NOT NULL,
  `landlord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boardinghouses`
--

INSERT INTO `boardinghouses` (`id`, `owner`, `hname`, `haddress`, `contact_no`, `landlord`) VALUES
(1, 'dodge@gmail.com', 'Dodge Boarding House', 'Zamboanggaa', 946464646, 'Dodge');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id` int(255) NOT NULL,
  `bh_description` varchar(255) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `bh_description`, `hname`, `owner`) VALUES
(1, 'pinaka nindot sa tanan', 'Dodge Boarding House', 'dodge@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(255) NOT NULL,
  `bar_clear` varchar(255) NOT NULL,
  `bus_per` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `bar_clear`, `bus_per`, `image`, `hname`, `owner`) VALUES
(1, 'images/cd0e1a4f0a8567a6a8f04f30d113983b.png', 'images/1-493fe17210.jpg', 'images/azianna.jpg', 'Dodge Boarding House', 'dodge@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `res_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_no` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `payment` int(255) NOT NULL,
  `pay_stat` varchar(255) NOT NULL,
  `pay_date` date DEFAULT NULL,
  `hname` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment` int(255) NOT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_stat` varchar(255) NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `room_no` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `fname`, `lname`, `gender`, `email`, `payment`, `pay_date`, `pay_stat`, `date_in`, `date_out`, `room_no`, `price`, `hname`, `owner`) VALUES
(1, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', NULL, 1, 0, 'Dodge Boarding House', ''),
(2, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', NULL, 1, 0, 'Dodge Boarding House', ''),
(3, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', NULL, 1, 0, 'Dodge Boarding House', ''),
(4, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', NULL, 1, 0, 'Dodge Boarding House', ''),
(5, 'user', 'user', 'male', 'user@gmail.com', 5000, '2024-12-04', '', '2024-12-04', '2024-12-04', 1, 0, 'Dodge Boarding House', ''),
(6, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', '2024-12-04', 1, 0, 'Dodge Boarding House', ''),
(7, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', NULL, 1, 0, 'Dodge Boarding House', ''),
(8, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', NULL, 1, 0, 'Dodge Boarding House', ''),
(9, 'user', 'user', 'male', 'user@gmail.com', 500, '2024-12-04', '', '2024-12-04', '2024-12-04', 1, 0, 'Dodge Boarding House', ''),
(10, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-04', '2024-12-04', 1, 0, 'Dodge Boarding House', ''),
(11, 'user', 'user', 'male', 'user@gmail.com', 3663, '2024-12-04', '', '2024-12-04', '2024-12-04', 1, 0, 'Dodge Boarding House', ''),
(12, 'user', 'user', 'male', 'user@gmail.com', 1000, '2024-12-04', 'Fully Paid', '2024-12-04', '2024-12-04', 1, 0, 'Dodge Boarding House', ''),
(13, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(14, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(15, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(16, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(17, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(18, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', '', '2024-12-05', NULL, 1, 0, 'Dodge Boarding House', ''),
(19, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(20, 'user', 'user', 'male', 'user@gmail.com', 5000, '2024-12-05', 'Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(21, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(22, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(23, 'user', 'user', 'male', 'user2@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(24, 'user', 'user', 'male', 'user2@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 1, 0, 'Dodge Boarding House', ''),
(25, 'user', 'user', 'male', 'user2@gmail.com', 5000, '2024-12-05', 'Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(26, 'user', 'user', 'male', 'user2@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(27, 'user', 'user', 'male', 'user2@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(28, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(29, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(30, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-05', '2024-12-05', 2, 0, 'Dodge Boarding House', ''),
(31, 'user', 'user', 'male', 'user@gmail.com', 700, '2024-12-05', 'Partially Paid', '2024-12-05', '2024-12-06', 1, 0, 'Dodge Boarding House', ''),
(32, 'user', 'user', 'male', 'user@gmail.com', 1000, '2024-12-06', 'Fully Paid', '2024-12-06', '2024-12-06', 2, 0, 'Dodge Boarding House', ''),
(33, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-06', '2024-12-06', 1, 0, 'Dodge Boarding House', ''),
(34, 'user', 'user', 'male', 'user@gmail.com', 0, '0000-00-00', 'Not Fully Paid', '2024-12-06', '2024-12-06', 2, 1000, 'Dodge Boarding House', ''),
(35, 'user', 'user', 'male', 'user@gmail.com', 999, '2024-12-06', 'Partially Paid', '2024-12-06', '2024-12-06', 1, 1000, 'Dodge Boarding House', ''),
(36, 'user', 'user', 'male', 'user2@gmail.com', 500, '2024-12-06', 'Partially Paid', '2024-12-06', '2024-12-06', 1, 1000, 'Dodge Boarding House', ''),
(37, 'user', 'user', 'male', 'user2@gmail.com', 1000, '2024-12-06', 'Fully Paid', '2024-12-06', '2024-12-06', 1, 1000, 'Dodge Boarding House', ''),
(38, 'user', 'user', 'male', 'user2@gmail.com', 1000, '2024-12-06', 'Fully Paid', '2024-12-06', '2024-12-06', 1, 1000, 'Dodge Boarding House', ''),
(39, 'user', 'user', 'male', 'user2@gmail.com', 800, '1970-01-15', 'Partially Paid', '2024-12-06', '2024-12-06', 1, 1000, 'Dodge Boarding House', ''),
(40, 'user', 'user', 'male', 'user2@gmail.com', 500, '1970-01-14', 'Partially Paid', '2024-12-06', '2024-12-06', 1, 1000, 'Dodge Boarding House', ''),
(41, 'user', 'user', 'male', 'user@gmail.com', 700, '1970-01-14', 'Partially Paid', '2024-12-06', '2024-12-06', 2, 1000, 'Dodge Boarding House', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `tenant_status` varchar(255) NOT NULL,
  `addons` varchar(255) NOT NULL,
  `room_no` int(255) NOT NULL,
  `capacity` int(255) NOT NULL,
  `room_slot` varchar(255) NOT NULL,
  `current_tenant` int(255) NOT NULL,
  `amenities` varchar(255) NOT NULL,
  `tenant_type` varchar(255) NOT NULL,
  `room_floor` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment` int(255) NOT NULL,
  `pay_stat` varchar(255) NOT NULL,
  `pay_date` date DEFAULT NULL,
  `res_stat` varchar(255) NOT NULL,
  `res_duration` varchar(255) NOT NULL,
  `res_reason` varchar(255) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `image`, `fname`, `lname`, `email`, `gender`, `date_in`, `date_out`, `tenant_status`, `addons`, `room_no`, `capacity`, `room_slot`, `current_tenant`, `amenities`, `tenant_type`, `room_floor`, `price`, `status`, `payment`, `pay_stat`, `pay_date`, `res_stat`, `res_duration`, `res_reason`, `hname`, `owner`) VALUES
(2, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-20', '2025-01-19', 'Working Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd Floor', 1000, 'available', 5000, 'Fully Paid', '2024-12-04', 'Ended', '1 day', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(3, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-06', '2025-01-05', 'Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '1 day', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(4, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 0, '', NULL, 'Rejected', '1 day', 'No valid information / No Tenant Came', 'Dodge Boarding House', 'dodge@gmail.com'),
(5, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-13', '2025-01-12', 'Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 0, '', NULL, 'Cancelled', '1 day', 'Reservation Cancelled', 'Dodge Boarding House', 'dodge@gmail.com'),
(6, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 500, 'Partially Paid', '2024-12-04', 'Ended', '1 day', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(7, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-07', '2025-01-06', 'Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '1 day', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(8, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-13', '2025-01-12', 'Student', 'palihug kog hinlo', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 3663, 'Fully Paid', '2024-12-04', 'Ended', '1 day', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(9, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-13', '2025-01-12', 'Student', 'lakad matatag', 1, 3, '', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 1000, 'Fully Paid', '2024-12-04', 'Ended', '1 day', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(10, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '0000-00-00', '0000-00-00', '', '', 1, 3, 'Slot 1, Slot 2', 0, 'wifi, bedsheets', '', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(11, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-13', '2025-01-12', 'Student', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(12, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', 'asdada', 1, 3, 'Whole Room', 1, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(13, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-13', '2025-01-12', 'Student', 'asdada', 1, 3, 'Whole Room', 3, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(14, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'asdada', 1, 3, 'Whole Room', 3, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(19, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(21, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', 'asdada', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 5000, 'Fully Paid', '2024-12-05', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(22, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 1, 3, 'Slot 1, Slot 2', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(23, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2, Slot 3', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(24, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-18', '2025-01-17', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2', 3, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(25, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-13', '2025-01-12', '', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(26, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-20', '2025-01-19', 'Student', 'asdada', 2, 5, 'Slot 1, Slot 2, Slot 3', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 5000, 'Fully Paid', '2024-12-05', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(27, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 2, 5, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(28, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-18', '2025-01-17', 'Student', 'lakad matatag', 2, 5, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, '', NULL, 'Cancelled', '1 day', 'Reservation Cancelled', 'Dodge Boarding House', 'dodge@gmail.com'),
(29, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2, Slot 3, Slot 4', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, '', NULL, 'Rejected', '', 'No valid information / No Tenant Came', 'Dodge Boarding House', 'dodge@gmail.com'),
(30, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-14', '2025-01-13', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2, Slot 3', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(31, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', '', 2, 5, 'Slot 1, Slot 2', 3, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(32, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2', 3, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(33, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, '', NULL, 'Rejected', '', 'No valid information / No Tenant Came', 'Dodge Boarding House', 'dodge@gmail.com'),
(34, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-14', '2025-01-13', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2', 3, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(35, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-12', '2025-01-11', 'Student', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 700, 'Partially Paid', '2024-12-05', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(36, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-18', '2025-01-17', 'Student', 'awdasdas', 2, 5, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'available', 1000, 'Fully Paid', '2024-12-06', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(37, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-20', '2025-01-19', '', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(38, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-19', '2025-01-18', '', 'lakad matatag', 2, 5, 'Slot 3', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 0, 'Not Fully Paid', '0000-00-00', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(39, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-20', '2025-01-19', 'Student', 'lakad matatag', 1, 3, 'Slot 1, Slot 2', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 999, 'Partially Paid', '2024-12-06', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(40, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-20', '2025-01-19', 'Student', 'lakad matatag', 1, 3, 'Slot 3', 2, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 500, 'Partially Paid', '2024-12-06', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(41, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 1000, 'Fully Paid', '2024-12-06', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(42, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 1000, 'Fully Paid', '2024-12-06', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(43, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'awdasdas', 1, 3, 'Slot 1, Slot 2', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 800, 'Partially Paid', '1970-01-15', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(44, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user2@gmail.com', 'male', '2024-12-19', '2025-01-18', 'Student', 'lakad matatag', 1, 3, 'Whole Room', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 500, 'Partially Paid', '1970-01-14', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com'),
(45, 'images/674fc4adb0e222.28894530.jpg', 'user', 'user', 'user@gmail.com', 'male', '2024-12-18', '2025-01-17', 'Student', 'lakad matatag', 2, 5, 'Slot 1, Slot 2, Slot 3', 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'Available', 700, 'Partially Paid', '1970-01-14', 'Ended', '', 'Reservation Ended', 'Dodge Boarding House', 'dodge@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` int(255) NOT NULL,
  `capacity` int(255) NOT NULL,
  `current_tenant` int(255) NOT NULL,
  `amenities` varchar(255) NOT NULL,
  `tenant_type` varchar(255) NOT NULL,
  `room_floor` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `capacity`, `current_tenant`, `amenities`, `tenant_type`, `room_floor`, `price`, `image`, `status`, `hname`, `owner`) VALUES
(1, 1, 3, 0, 'wifi, bedsheets', 'All', '3rd floor', 1000, 'images/674fc4adb0e222.28894530.jpg', 'Available', 'Dodge Boarding House', 'dodge@gmail.com'),
(3, 2, 5, 0, 'wifi, bedsheets', 'male', 'ground floor', 1000, 'images/67523ad19ee8f7.94229565.jpg', 'Available', 'Dodge Boarding House', 'dodge@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `hname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `fname`, `lname`, `gender`, `uname`, `pass`, `role`, `hname`) VALUES
(1, './profiles/profile_674fbd7e3d1e00.56959370.png', 'admin', 'admin', 'male', 'admin@gmail.com', 'yes', 'admin', ''),
(2, './profiles/profile_674fdaf0f1e706.33611863.png', 'dodge', 'suico', 'male', 'dodge@gmail.com', 'yes', 'landlord', 'Dodge Boarding House'),
(3, 'profiles/674fbe06b1aa58.49001610.png', 'user', 'user', 'male', 'user@gmail.com', 'yes', 'user', ''),
(4, 'profiles/6751a77e1f9204.76638950.jpg', 'user', 'user', 'male', 'user2@gmail.com', 'yes', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bhapplication`
--
ALTER TABLE `bhapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boardinghouses`
--
ALTER TABLE `boardinghouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `bhapplication`
--
ALTER TABLE `bhapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boardinghouses`
--
ALTER TABLE `boardinghouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
