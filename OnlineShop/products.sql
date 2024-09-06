-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 10:05 PM
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
-- Database: `shoppingz`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `creation_date`) VALUES
(1, 'Laptop Dell G3', 499.00, 'images/dell-g3.jpg', '2024-09-04 21:39:50'),
(2, 'iPhone 11 128GB', 349.99, 'images/iphone-11.jpg', '2024-09-05 13:54:17'),
(3, 'Samsung Galaxy Tab S9 Ultra', 1049.99, 'images/galaxy-tab-s9-ultra-beige.webp', '2024-09-05 14:14:40'),
(4, 'iPad Pro 13-inch', 1299.00, 'images/ipad-pro.png', '2024-09-05 14:18:04'),
(5, 'Samsung AI TV: Neo QLED 4K', 5499.99, 'images/samsung-neo-qled-tv.png', '2024-09-05 14:21:39'),
(8, 'GTPLAYER Gaming Chair', 139.99, 'images/GTPLAYER-Gaming-Chair.jpg', '2024-09-05 19:29:46'),
(9, 'Bean Bag', 59.99, 'images/bean-bag.jpg', '2024-09-05 19:31:47'),
(10, 'iPhone 15 Pro Max', 1199.00, 'images/iphone15-promax.jpg', '2024-09-05 19:35:22'),
(11, 'Samsung Galaxy S24+', 999.99, 'images/samsung-galaxy-s24.webp', '2024-09-05 19:36:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
