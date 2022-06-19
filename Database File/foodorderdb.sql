-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 08:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`food_id`, `food_name`, `food_price`) VALUES
(1133, 'momo', 200),
(1137, 'food1', 20),
(1138, 'Grilled_Sandwich', 50),
(1139, 'Burger', 120),
(1140, 'food2', 600),
(1141, 'fried_rice', 180),
(1142, 'sushi', 500);

-- ------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_date` date NOT NULL DEFAULT current_timestamp(),
  `invoice_due_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_date`, `invoice_due_date`, `user_id`, `order_id`, `status`) VALUES
(9, '2022-06-09', '2022-06-14', 10, 34, 'Paid'),
(10, '2022-06-09', '2022-06-14', 10, 35, 'Pending...'),
(11, '2022-06-09', '2022-06-14', 11, 36, 'Pending...'),
(12, '2022-06-09', '2022-06-14', 11, 37, 'Pending...');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(16) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` tinytext NOT NULL DEFAULT 'Yet to be delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `date_time`, `payment_type`, `total_price`, `status`) VALUES
(34, 10, 'kalanki', '2022-06-09 12:02:36', 'Cash On Delivery', 2720, 'delivered'),
(35, 10, 'kalanki', '2022-06-09 12:03:23', 'Cash On Delivery', 170, 'Yet to be delivered'),
(36, 11, 'kirtipur', '2022-06-09 12:04:20', 'Cash On Delivery', 170, 'Yet to be delivered'),
(37, 11, 'kirtipur', '2022-06-09 12:04:40', 'Cash On Delivery', 870, 'Yet to be delivered');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `food_id`, `food_name`, `qty`, `price`) VALUES
(52, 34, 1133, 'momo', 9, 200),
(53, 34, 1138, 'Grilled_Sandwich', 4, 50),
(54, 34, 1139, 'Burger', 1, 120),
(55, 34, 1140, 'food2', 1, 600),
(56, 35, 1138, 'Grilled_Sandwich', 1, 50),
(57, 35, 1139, 'Burger', 1, 120),
(58, 36, 1138, 'Grilled_Sandwich', 1, 50),
(59, 36, 1139, 'Burger', 1, 120),
(60, 37, 1133, 'momo', 1, 200),
(61, 37, 1137, 'food1', 1, 20),
(62, 37, 1138, 'Grilled_Sandwich', 1, 50),
(63, 37, 1139, 'Burger', 5, 120);

-- --------------------------------------------------------

--
-- Table structure for table `sysadmins`
--

CREATE TABLE `sysadmins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sysadmins`
--

INSERT INTO `sysadmins` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `user_name`, `name`, `password`, `contact`) VALUES
(10, 'Bowie', 'David Bowie', '6c730744ec001a48c92a2c68b1b368c0', 89675478),
(11, 'Lennon', 'John Lennon', '462c9c47474aa6a14996c19ed37ead12', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `sysadmins`
--
ALTER TABLE `sysadmins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1143;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sysadmins`
--
ALTER TABLE `sysadmins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
