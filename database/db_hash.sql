-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hash`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `product_id`, `product_name`, `size`, `qty`, `price`, `status`, `created`) VALUES
(1, 4, 1, 'Dove', 12, 4, 50, 'success', '2024-01-15 10:16:38'),
(2, 4, 1, 'Dove', 12, 3, 50, 'success', '2024-01-15 14:21:05'),
(3, 4, 2, 'Chippy Barbecue Flavored Potato Chips', 150, 2, 25, 'success', '2024-02-03 11:46:05'),
(4, 9, 2, 'Chippy Barbecue Flavored Potato Chips', 150, 3, 25, 'success', '2024-02-03 15:47:11'),
(5, 4, 9, 'Del Monte Sweet Mixed Pickles', 375, 1, 65, 'success', '2024-02-17 09:47:58'),
(6, 9, 5, 'Head & Shoulders Classic Clean Shampoo', 180, 2, 150, 'success', '2024-03-01 13:48:00'),
(7, 10, 3, 'Gardenia Pandesal Bread', 450, 5, 40, 'success', '2024-03-10 08:30:15'),
(8, 8, 7, 'Lucky Me! Instant Pancit Canton', 55, 10, 15, 'success', '2024-03-22 17:15:30'),
(9, 9, 11, 'Safeguard Antibacterial Bar Soap', 130, 3, 45, 'success', '2024-04-05 11:20:45'),
(10, 4, 6, 'Magic Sarap Seasoning Mix', 100, 4, 30, 'success', '2024-04-18 14:55:22'),
(11, 10, 10, 'Kopiko Brown Coffee Candy', 150, 2, 20, 'success', '2024-05-02 10:10:10'),
(12, 8, 4, 'Silver Swan Soy Sauce', 750, 1, 55, 'success', '2024-05-20 16:40:30'),
(13, 9, 8, 'Palmolive', 20, 5, 8, 'success', '2024-06-07 09:05:15'),
(14, 4, 1, 'Dove', 12, 2, 50, 'success', '2024-06-23 12:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_code` int(11) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `user_id`, `product_code`, `stock_in`, `stock_out`, `created`) VALUES
(1, 4, 1, 50, 9, '2024-01-15 09:15:36'),
(2, 9, 2, 100, 5, '2024-02-03 10:30:00'),
(3, 4, 9, 30, 1, '2024-02-17 08:45:20'),
(4, 9, 5, 40, 2, '2024-03-01 12:00:15'),
(5, 10, 3, 80, 5, '2024-03-10 07:30:00'),
(6, 8, 7, 200, 10, '2024-03-22 16:20:10'),
(7, 9, 11, 50, 3, '2024-04-05 10:10:30'),
(8, 4, 6, 60, 4, '2024-04-18 13:50:00'),
(9, 10, 10, 100, 2, '2024-05-02 09:00:45'),
(10, 8, 4, 40, 1, '2024-05-20 15:30:20'),
(11, 9, 8, 100, 5, '2024-06-07 08:00:00'),
(12, 4, 1, 30, 2, '2024-06-23 11:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `size`, `qty`, `price`, `created`) VALUES
(1, 'Dove', 12, 9, 50, '2024-06-30 21:15:19'),
(2, 'Chippy Barbecue Flavored Potato Chips', 150, 78, 25, '2024-06-30 21:24:18'),
(3, 'Gardenia Pandesal Bread', 450, 120, 40, '2024-06-30 21:24:18'),
(4, 'Silver Swan Soy Sauce', 750, 90, 55, '2024-06-30 21:24:18'),
(5, 'Head & Shoulders Classic Clean Shampoo', 180, 59, 150, '2024-06-30 21:24:18'),
(6, 'Magic Sarap Seasoning Mix', 100, 110, 30, '2024-06-30 21:24:18'),
(7, 'Lucky Me! Instant Pancit Canton', 55, 150, 15, '2024-06-30 21:24:18'),
(8, 'Palmolive', 20, 70, 8, '2024-06-30 21:24:18'),
(9, 'Del Monte Sweet Mixed Pickles', 375, 84, 65, '2024-06-30 21:24:18'),
(10, 'Kopiko Brown Coffee Candy', 150, 90, 20, '2024-06-30 21:24:18'),
(11, 'Safeguard Antibacterial Bar Soap', 130, 100, 45, '2024-06-30 21:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discounted_sales` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `sales`, `amount`, `discounted_sales`, `created`) VALUES
(1, 4, 200, 200, 200, '2024-01-15 10:16:54'),
(2, 4, 150, 150, 150, '2024-01-15 14:21:13'),
(3, 4, 50, 50, 50, '2024-02-03 11:46:44'),
(4, 9, 75, 75, 75, '2024-02-03 15:47:16'),
(5, 4, 65, 70, 65, '2024-02-17 09:48:33'),
(6, 9, 300, 300, 300, '2024-03-01 13:48:45'),
(7, 10, 200, 220, 200, '2024-03-10 08:31:00'),
(8, 8, 150, 150, 150, '2024-03-22 17:16:15'),
(9, 9, 135, 140, 135, '2024-04-05 11:21:30'),
(10, 4, 120, 120, 120, '2024-04-18 14:56:00'),
(11, 10, 40, 40, 40, '2024-05-02 10:11:00'),
(12, 8, 55, 60, 55, '2024-05-20 16:41:15'),
(13, 9, 40, 40, 40, '2024-06-07 09:06:00'),
(14, 4, 100, 100, 100, '2024-06-23 12:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `created`) VALUES
(4, 'shin', '$2y$10$JehFSfdea/Jwehxj7uP0B.Cblgb0TbTqYJsfa9SLt19b.E7LRvD/G', 0, '2024-06-30 18:45:06'),
(8, 'user', '$2y$10$POBOCyUpn70mwbNRPkO5L..Go5nOOcz.dgC5v.IaZa.Oyon4h/2fm', 0, '2024-06-30 20:35:16'),
(9, 'cashier', '$2y$10$jtfZUEXvlur982bTBCJxx.FegYcS/ieNZtoEhlt.lvuGlETgFsGIu', 1, '2024-06-30 20:35:45'),
(10, 'dane', '$2y$10$0UEsTXLV/HN5b1bpC/5Vk.sHp.q5dOWauLz75uldcREHyNtJyyUzy', 0, '2024-06-30 20:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sign_in` datetime NOT NULL,
  `sign_out` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `username`, `type`, `sign_in`, `sign_out`, `created`) VALUES
(1, 'shin', 'Admin', '2024-01-15 08:48:52', '2024-01-15 17:50:34', '2024-01-15 08:48:52'),
(2, 'cashier', 'Cashier', '2024-01-15 09:00:06', '2024-01-15 18:00:34', '2024-01-15 09:00:06'),
(3, 'user', 'Admin', '2024-02-03 08:49:29', '2024-02-03 16:50:34', '2024-02-03 08:49:29'),
(4, 'dane', 'Admin', '2024-02-17 08:55:56', '2024-02-17 17:56:03', '2024-02-17 08:55:56'),
(5, 'shin', 'Admin', '2024-03-01 09:00:59', '2024-03-01 18:19:49', '2024-03-01 09:00:59'),
(6, 'cashier', 'Cashier', '2024-03-10 08:11:05', '2024-03-10 17:19:49', '2024-03-10 08:11:05'),
(7, 'user', 'Admin', '2024-03-22 09:19:55', '2024-03-22 18:20:04', '2024-03-22 09:19:55'),
(8, 'dane', 'Admin', '2024-04-05 08:20:09', '2024-04-05 17:25:29', '2024-04-05 08:20:09'),
(9, 'shin', 'Admin', '2024-04-18 09:34:56', '2024-04-18 18:35:00', '2024-04-18 09:34:56'),
(10, 'cashier', 'Cashier', '2024-05-02 08:35:21', '2024-05-02 17:37:11', '2024-05-02 08:35:21'),
(11, 'user', 'Admin', '2024-05-20 09:37:15', '2024-05-20 18:25:29', '2024-05-20 09:37:15'),
(12, 'dane', 'Admin', '2024-06-07 08:37:20', '2024-06-07 17:37:54', '2024-06-07 08:37:20'),
(13, 'shin', 'Admin', '2024-06-23 09:38:04', '2024-06-23 18:59:55', '2024-06-23 09:38:04');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`product_code`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
