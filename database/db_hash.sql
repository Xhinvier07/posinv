-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 03:26 PM
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
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `product_id`, `product_name`, `size`, `qty`, `price`, `status`, `created`) VALUES
(1, 4, 1, 'Dove', 12, 4, 50, 'success', '2024-06-30 21:16:38'),
(2, 4, 1, 'Dove', 12, 3, 50, 'success', '2024-06-30 21:21:05');

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
(1, 4, 1, 3, 0, '2024-06-30 21:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `size`, `qty`, `price`, `created`) VALUES
(1, 'Dove', 12, 9, 50, '2024-06-30 21:15:19'),
(2, 'Chippy Barbecue Flavored Potato Chips', 150, 80, 25, '2024-06-30 21:24:18'),
(3, 'Gardenia Pandesal Bread', 450, 120, 40, '2024-06-30 21:24:18'),
(4, 'Silver Swan Soy Sauce', 750, 90, 55, '2024-06-30 21:24:18'),
(5, 'Head & Shoulders Classic Clean Shampoo', 180, 60, 150, '2024-06-30 21:24:18'),
(6, 'Magic Sarap Seasoning Mix', 100, 110, 30, '2024-06-30 21:24:18'),
(7, 'Lucky Me! Instant Pancit Canton', 55, 150, 15, '2024-06-30 21:24:18'),
(8, 'Palmolive', 20, 70, 8, '2024-06-30 21:24:18'),
(9, 'Del Monte Sweet Mixed Pickles', 375, 85, 65, '2024-06-30 21:24:18'),
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
(1, 4, 0, 11, -4, '2024-06-30 21:16:34'),
(2, 4, 200, 180, 180, '2024-06-30 21:16:54'),
(3, 4, 150, 500, 130, '2024-06-30 21:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
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
(1, 'shin', 'Admin', '2024-06-30 18:48:52', '2024-06-30 18:50:34', '2024-06-30 18:48:52'),
(2, 'shin', 'Admin', '2024-06-30 18:49:06', '2024-06-30 18:50:34', '2024-06-30 18:49:06'),
(3, 'shin', 'Admin', '2024-06-30 18:49:29', '2024-06-30 18:50:34', '2024-06-30 18:49:29'),
(4, 'shin', 'Admin', '2024-06-30 18:55:56', '2024-06-30 18:56:03', '2024-06-30 18:55:56'),
(5, 'shin', 'Admin', '2024-06-30 19:00:59', '2024-06-30 20:19:49', '2024-06-30 19:00:59'),
(6, 'shin', 'Admin', '2024-06-30 20:11:05', '2024-06-30 20:19:49', '2024-06-30 20:11:05'),
(7, 'shin', 'Admin', '2024-06-30 20:19:55', '2024-06-30 20:20:04', '2024-06-30 20:19:55'),
(8, 'shin', 'Admin', '2024-06-30 20:20:09', '2024-06-30 21:25:29', '2024-06-30 20:20:09'),
(9, 'admin', 'Cashier', '2024-06-30 20:34:56', '2024-06-30 20:35:00', '2024-06-30 20:34:56'),
(10, 'user', 'Admin', '2024-06-30 20:35:21', '2024-06-30 20:37:11', '2024-06-30 20:35:21'),
(11, 'shin', 'Admin', '2024-06-30 20:37:15', '2024-06-30 21:25:29', '2024-06-30 20:37:15'),
(12, 'user', 'Admin', '2024-06-30 20:37:20', '0000-00-00 00:00:00', '2024-06-30 20:37:20'),
(13, 'cashier', 'Cashier', '2024-06-30 20:37:29', '2024-06-30 20:37:54', '2024-06-30 20:37:29'),
(14, 'dane', 'Admin', '2024-06-30 20:38:04', '2024-06-30 20:59:55', '2024-06-30 20:38:04'),
(15, 'dane', 'Admin', '2024-06-30 21:01:15', '2024-06-30 21:04:24', '2024-06-30 21:01:15'),
(16, 'shin', 'Admin', '2024-06-30 21:04:38', '2024-06-30 21:25:29', '2024-06-30 21:04:38'),
(17, 'shin', 'Admin', '2024-06-30 21:25:45', '0000-00-00 00:00:00', '2024-06-30 21:25:45');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`product_code`) REFERENCES `products` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
