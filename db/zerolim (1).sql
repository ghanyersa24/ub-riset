-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 04:20 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zerolim`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `zero_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `pictures` text DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `status` enum('draft','publish') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `zero_id`, `title`, `content`, `pictures`, `author`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello World', 'Hello World Caption', 'https://www.google.co.id/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png', 'myghan', 'publish', '2019-12-27 02:50:33', '2019-12-27 02:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(15) NOT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longitude` varchar(15) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mitra','mitra bisnis') NOT NULL DEFAULT 'mitra',
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `point` smallint(5) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `telp`, `latitude`, `longitude`, `username`, `password`, `role`, `status`, `point`, `created_at`, `updated_at`) VALUES
(1, 'Ghany Uoas', 'PMT CA 19A', 'ghanyersa24@gmail.com', '082164028264', '', '', 'ghanyersa', '$2y$10$CWTRgt7lGB9e2PjQKsVUBezATAKher1w8asQj0llWtbGQuatMrmtq', 'mitra', 'activated', 0, '2019-12-27 02:42:31', '2019-12-27 02:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `point_history`
--

CREATE TABLE `point_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `information` text NOT NULL,
  `point_before` smallint(5) UNSIGNED DEFAULT NULL,
  `point_after` smallint(5) UNSIGNED DEFAULT NULL,
  `point` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `zero_id` int(10) UNSIGNED NOT NULL,
  `information` text DEFAULT NULL,
  `rate` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `id_transaction` varchar(10) NOT NULL,
  `date_request` datetime NOT NULL,
  `date_deal` datetime DEFAULT NULL,
  `mitra_name` varchar(20) DEFAULT NULL,
  `telp` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `estimated_weight` float NOT NULL,
  `real_weight` float DEFAULT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `progress` enum('waiting','processing','finish','reschedule') NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_report`
--

CREATE TABLE `transaction_report` (
  `iteration` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `zero_id` int(10) UNSIGNED NOT NULL,
  `information` text DEFAULT NULL,
  `pictures` text DEFAULT NULL,
  `status` enum('processed','rejected','accepted') DEFAULT 'processed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tracking`
--

CREATE TABLE `transaction_tracking` (
  `progress` enum('waiting','on going','arriving','finish','reschedule','rated') NOT NULL DEFAULT 'waiting',
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `zero_id` int(10) UNSIGNED NOT NULL,
  `information` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `zero`
--

CREATE TABLE `zero` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','agent') NOT NULL DEFAULT 'agent',
  `status` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zero`
--

INSERT INTO `zero` (`id`, `name`, `address`, `email`, `telp`, `latitude`, `longitude`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Myghan Ersa', 'PMT CA 19A', 'ghanyersa24@gmail.com', '082164028264', '', '', 'ghanyersa24', '$2y$10$zV.7rCkglWz9qI/ylulXC.pqScfQuuvXIclsveEb05EY58/O4btpO', 'agent', 'activated', '2019-12-27 02:49:00', '2019-12-27 02:49:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_FKIndex1` (`zero_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cutomers_Unique` (`username`);

--
-- Indexes for table `point_history`
--
ALTER TABLE `point_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_history_FKIndex1` (`customer_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_FKIndex1` (`zero_id`),
  ADD KEY `rating_FKIndex2` (`customer_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_unique` (`id_transaction`),
  ADD KEY `transaction_FKIndex1` (`customer_id`);

--
-- Indexes for table `transaction_report`
--
ALTER TABLE `transaction_report`
  ADD PRIMARY KEY (`iteration`,`transaction_id`,`zero_id`),
  ADD KEY `transaction_report_FKIndex1` (`zero_id`),
  ADD KEY `transaction_report_FKIndex2` (`transaction_id`);

--
-- Indexes for table `transaction_tracking`
--
ALTER TABLE `transaction_tracking`
  ADD PRIMARY KEY (`progress`,`transaction_id`,`zero_id`),
  ADD KEY `transaction_tracking_FKIndex1` (`zero_id`),
  ADD KEY `transaction_tracking_FKIndex2` (`transaction_id`);

--
-- Indexes for table `zero`
--
ALTER TABLE `zero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeros_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zero`
--
ALTER TABLE `zero`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`zero_id`) REFERENCES `zero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `point_history`
--
ALTER TABLE `point_history`
  ADD CONSTRAINT `point_history_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`zero_id`) REFERENCES `zero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_report`
--
ALTER TABLE `transaction_report`
  ADD CONSTRAINT `transaction_report_ibfk_1` FOREIGN KEY (`zero_id`) REFERENCES `zero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_report_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_tracking`
--
ALTER TABLE `transaction_tracking`
  ADD CONSTRAINT `transaction_tracking_ibfk_1` FOREIGN KEY (`zero_id`) REFERENCES `zero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_tracking_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
