-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2016 at 08:35 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `hearing_where`
--

CREATE TABLE `hearing_where` (
  `id` int(11) NOT NULL,
  `hearing_where` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hearing_where`
--

INSERT INTO `hearing_where` (`id`, `hearing_where`) VALUES
(1, 'Google'),
(2, 'Friends'),
(3, 'Foram'),
(4, 'Others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hearing_where`
--
ALTER TABLE `hearing_where`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hearing_where`
--
ALTER TABLE `hearing_where`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
