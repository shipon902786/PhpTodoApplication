-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 05:31 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_iawd_2102`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `uname`, `email`, `password`, `photo`, `status`) VALUES
(11, 'Shipon Talukdar', 'rohim', 'shipon@gmail.com', 'b58c50e209762c24adb9f29daffe249c', 'Shipon Talukdar-1642276503.jpg', 0),
(14, 'md. shipon hossain', 'Shipon', 'tmshipon902786@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'md. shipon hossain-1642275351.JPG', 0),
(15, 'monirul islam', 'monirul', 'monirul@gmail.com', '202cb962ac59075b964b07152d234b70', 'monirul islam-1642276062.jpg', 0),
(16, 'Shipon Talukdar', 'Shipon', 'shopon902786@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Shipon Talukdar-1642276456.jpg', 0),
(17, 'Shipon', 'rahim', 'shipontalukdar902786@gmail.com', '30cd2f99101cdd52cc5fda1e996ee137', 'Shipon-1642278811.jpg', 0),
(19, 'Shipon Talukdar', 'Shipon', 'tmshipon902786@gmail.com', '202cb962ac59075b964b07152d234b70', 'Shipon Talukdar-1642278847.JPG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
