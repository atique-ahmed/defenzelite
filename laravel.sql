-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 02:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `salary`, `city`) VALUES
(1, 'Shital', 40000, 'Nagpur'),
(2, 'Mrunal', 50000, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `a_id`, `u_id`, `order_date`) VALUES
(1, 2, 2, '2023-02-13 17:54:19'),
(2, 2, 3, '2023-02-13 17:54:24'),
(3, 1, 4, '2023-02-13 17:54:29'),
(4, 1, 5, '2023-02-13 17:54:37'),
(5, 2, 2, '2023-02-13 18:18:17'),
(6, 1, 2, '2023-02-13 18:34:11'),
(7, 1, 3, '2023-02-13 18:36:34'),
(8, 2, 3, '2023-02-13 18:36:57'),
(9, 1, 4, '2023-02-13 18:43:39'),
(10, 1, 4, '2023-02-13 18:43:52'),
(11, 1, 2, '2023-02-13 18:44:19'),
(12, 1, 2, '2023-02-13 18:44:23'),
(13, 1, 2, '2023-02-13 18:44:27'),
(14, 1, 2, '2023-02-13 18:44:31'),
(15, 2, 2, '2023-02-13 18:44:36'),
(16, 2, 2, '2023-02-13 18:44:39'),
(17, 1, 2, '2023-02-13 18:44:47'),
(18, 1, 3, '2023-02-13 18:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quota` int(11) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `quota`, `added_at`) VALUES
(2, 'Anuj', 10, '2023-02-12 18:36:48'),
(3, 'Animesh', 10, '2023-02-12 18:37:39'),
(4, 'Shailesh', 12, '2023-02-12 18:37:39'),
(5, 'Anirudh', 11, '2023-02-12 18:37:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
