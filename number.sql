-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 07:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `number`
--

-- --------------------------------------------------------

--
-- Table structure for table `fault_info`
--

CREATE TABLE `fault_info` (
  `falut_id` int(11) NOT NULL,
  `number_plate` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fault_info`
--

INSERT INTO `fault_info` (`falut_id`, `number_plate`, `time`, `status`) VALUES
(1, '123456', '2020-11-10 18:00:00', 0),
(2, '123695', '2020-11-06 18:00:00', 0),
(3, '556265', '2020-11-05 18:00:00', 0),
(4, '653241', '2020-11-03 18:00:00', 1),
(5, '122418', '2020-11-02 18:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `number_plate` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nId` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `number_plate`, `name`, `nId`, `address`, `phone`, `email`, `password`, `user_role`) VALUES
(1, '', 'admin', '', '', 0, 'admin@gmail', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(2, '123456', 'fuad', '123465932', 'shewrapra', 173126923, 'fuad@gmail.', '1346', 0),
(3, '653241', 'yeasin', '2365651323', 'shewrapara', 173126923, 'admin@gmail', '123', 0),
(4, '122418', 'Rafiq', '18180590', 'Katherpul,Sutrapur,Dhaka', 1773357272, 'rafiq@gmail', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fault_info`
--
ALTER TABLE `fault_info`
  ADD PRIMARY KEY (`falut_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fault_info`
--
ALTER TABLE `fault_info`
  MODIFY `falut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
