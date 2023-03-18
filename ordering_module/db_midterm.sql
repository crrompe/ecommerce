-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 03:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_midterm`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` decimal(65,0) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_purchased_ts` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `address`, `email`, `total`, `status`, `date_purchased_ts`) VALUES
(6, 'Maria Dimagiba', 'Oas, Albay', 'maria@gmail.com', '3024', 'P', '2023-03-18 12:20:58.721685'),
(7, 'Leonora Dimagiba', 'Polangui, Albay', 'leonora@gmail.com', '4367', 'P', '2023-03-18 12:22:11.636009'),
(8, 'Teresa Dimagiba', 'Ligao City', 'teresa@gmail.com', '-1329', 'P', '2023-03-18 12:22:40.257833'),
(11, 'abcd', 'albay', 'abcd@gmail.com', '1650', 'P', '2023-03-18 05:30:00.000000'),
(12, 'xyz', 'sample', 'xyz@gmail.com', '8150', 'P', '2023-03-18 05:58:25.000000'),
(13, 'Cardo Dalisay', 'Quiapo', 'cardo@gmail.com', '0', 'P', '2023-03-18 06:37:13.000000'),
(14, 'Cardo Dalisay', 'Quiapo', 'cardo@gmail.com', '0', 'P', '2023-03-18 06:37:43.000000'),
(20, 'issa', 'oas, albay', 'issa@gmail.com', '1050', 'P', '2023-03-18 07:30:13.000000');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `prod_id`, `quantity`) VALUES
(17, 6, 4, 1),
(18, 6, 7, 1),
(19, 7, 3, 3),
(20, 7, 4, 1),
(21, 7, 5, 1),
(22, 8, 5, 1),
(31, 11, 3, 1),
(34, 12, 3, 1),
(35, 12, 5, 1),
(36, 12, 6, 14),
(37, 17, 3, 2),
(44, 20, 5, 1),
(45, 20, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`) VALUES
(3, 'Red Velvet Cake', '600'),
(4, 'Chocolate Cake', '400'),
(5, 'Blueberry Cake', '550'),
(6, 'Strawberry Cake', '500'),
(7, 'Cheese Cake', '300');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_num` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `email`, `contact_num`) VALUES
(4, 'Maria Dimagiba', 'Oas, Albay', 'maria@gmail.com', 2147483647),
(5, 'Leonora Dimagiba', 'Polangui, Albay', 'leonora@gmail.com', 2147483647),
(6, 'Teresa Dimagiba', 'Ligao City', 'teresa@gmail.com', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
