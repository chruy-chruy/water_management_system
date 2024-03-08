-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 07:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `reading_date` date NOT NULL,
  `previous_reading_date` date NOT NULL,
  `previous_reading` varchar(255) NOT NULL,
  `current_reading` varchar(255) NOT NULL,
  `rate` varchar(55) NOT NULL,
  `total_reading` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `customer_id`, `customer_name`, `category`, `user`, `reading_date`, `previous_reading_date`, `previous_reading`, `current_reading`, `rate`, `total_reading`, `total`, `due_date`, `status`, `date_created`) VALUES
(00002, 00003, 'Name Middle Last ', '', 'admin administrator', '2024-03-23', '2024-02-23', '0', '24', '34.50', '24', '828.00', '2024-03-30', 'Paid', '2024-02-23 14:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `rate`) VALUES
(00004, 'Residential', '34'),
(00005, 'Government', '34.50'),
(00006, 'Commercial', '69');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `category` varchar(255) NOT NULL,
  `water_reading` varchar(255) NOT NULL,
  `latest_reading_date` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `suffix` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `date_of_birth` varchar(55) NOT NULL,
  `civil_status` varchar(55) NOT NULL,
  `purok` varchar(55) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `category`, `water_reading`, `latest_reading_date`, `first_name`, `middle_name`, `last_name`, `suffix`, `gender`, `date_of_birth`, `civil_status`, `purok`, `place_of_birth`, `phone_number`, `date_created`, `del_status`) VALUES
(00002, 'Residential', '28', '2024-02-27', 'Juan', 'Luna', 'Dela Cruz', '', 'Male', '1990-11-22', 'Single', 'Test', 'Gensan', '09531023180', '2024-02-23 13:10:17', ''),
(00003, 'Government', '24', '2024-03-23', 'Name', 'Middle', 'Last', '', 'Female', '2001-11-22', 'Single', 'Female', 'Place', '09531023180', '2024-02-23 13:25:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `billing_id` int(55) NOT NULL,
  `customer_id` int(55) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `billing_id`, `customer_id`, `customer_name`, `user`, `amount`, `date_created`) VALUES
(00002, 2, 3, 'Name Middle Last ', 'admin administrator', '828.00', '2024-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(00001, 'admin', 'admin123', 'administrator'),
(00002, 'test', '123', 'Staff'),
(00003, 'test23', '123', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
