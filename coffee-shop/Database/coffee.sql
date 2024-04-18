-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 01:27 PM
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
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Aniket Viradiya', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Hot Coffee', 'coffee_Category_861.jpg', 'Yes', 'Yes'),
(5, 'Cold Coffee', 'coffee_Category_833.jpg', 'Yes', 'Yes'),
(6, 'Shake', 'coffee_Category_349.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coffee`
--

CREATE TABLE `tbl_coffee` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_coffee`
--

INSERT INTO `tbl_coffee` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(3, 'Espresso', 'Espresso is a coffee-brewing method of Italian origin, in which a small amount of nearly boiling water is forced under 9–10 bars of pressure through finely-ground coffee beans', '80.00', 'coffee-Name-463.jpg', 4, 'Yes', 'Yes'),
(4, 'Latte', 'Caffè latte, often shortened to just latte in English, is a coffee beverage of Italian origin made with espresso and steamed milk. ', '150.00', 'coffee-Name-347.jpg', 4, 'Yes', 'Yes'),
(5, 'Cappuccino', 'A cappuccino is the perfect balance of espresso, steamed milk and foam.', '350.00', 'coffee-Name-5553.jpg', 4, 'Yes', 'Yes'),
(6, 'Americano', 'A Café Americano, or what we just call an Americano, combines freshly pulled shots of espresso with hot water to achieve the size of a standard cup of brewed coffee', '200.00', 'coffee-Name-4440.jpg', 4, 'Yes', 'Yes'),
(7, 'Macchiato', 'A macchiato is a shot of espresso with just a touch of steamed milk or foam.', '300.00', 'coffee-Name-8512.jpg', 4, 'Yes', 'Yes'),
(8, 'Iced Coffee', '', '150.00', 'coffee-Name-3702.webp', 5, 'Yes', 'Yes'),
(9, 'Iced Latte', '', '250.00', 'coffee-Name-2248.jpg', 5, 'Yes', 'Yes'),
(10, 'Cold Brew', '', '120.00', 'coffee-Name-8919.jpg', 5, 'Yes', 'Yes'),
(12, 'Cappuccino Cold', '', '380.00', 'coffee-Name-9279.jpg', 5, 'Yes', 'Yes'),
(14, 'Mocha Smoothie', '', '280.00', 'coffee-Name-8507.webp', 5, 'Yes', 'Yes'),
(15, 'Chocolate', '', '120.00', 'coffee-Name-8520.jpg', 6, 'Yes', 'Yes'),
(16, 'Mango', '', '100.00', 'coffee-Name-9781.jpg', 6, 'Yes', 'Yes'),
(17, 'Oreo', '', '150.00', 'coffee-Name-8211.jpg', 6, 'Yes', 'Yes'),
(18, 'strawberry', '', '200.00', 'coffee-Name-3170.webp', 6, 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `coffee` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `coffee`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(12, 'Americano', '200.00', 1, '200.00', '2022-09-20 12:36:35', 'Ordered', 'aniket', '8989525225', 'aniket@gamil.com', ''),
(13, 'Americano', '200.00', 1, '200.00', '2022-09-20 12:39:08', 'Delivered', 'aniket', '9874554599', 'aniket@gamil.com', ''),
(14, 'Cappuccino Cold', '380.00', 1, '380.00', '2022-09-23 12:24:21', 'Ordered', 'aniket', '66625265', 'aniket@gamil.com', ''),
(15, 'Macchiato', '300.00', 1, '300.00', '2022-09-23 12:33:35', 'Ordered', 'Aniket Viradiya', '6355694782', 'aniket@gmail.com', ''),
(16, 'Latte', '150.00', 1, '150.00', '2022-09-23 12:38:21', 'Ordered', 'Aniket Viradiya', '6355694782', 'aniket@gmail.com', ''),
(17, 'Macchiato', '300.00', 1, '300.00', '2022-09-23 12:39:46', 'Ordered', 'Aniket Viradiya', '6355694782', 'aniket@gmail.com', ''),
(18, 'Macchiato', '300.00', 1, '300.00', '2022-09-23 12:40:31', 'Ordered', 'Aniket Viradiya', '6355694782', 'aniket@gmail.com', ''),
(19, 'Americano', '200.00', 1, '200.00', '2022-09-23 12:40:57', 'Ordered', 'aniket', '6355694782', 'aniketviradiya@gmail.com', ''),
(20, 'Cappuccino', '350.00', 1, '350.00', '2022-09-23 12:41:56', 'Ordered', 'Aniket Viradiya', '6666666', 'aniket@gmail.com', ''),
(21, 'Cappuccino', '350.00', 1, '350.00', '2022-09-23 12:44:00', 'Ordered', 'aniket', '9874554599', 'aniketviradiya@gmail.com', ''),
(22, 'Latte', '150.00', 1, '150.00', '2022-09-23 12:44:30', 'Ordered', 'aniket', '6355694782', 'aniket@gamil.com', ''),
(23, 'Latte', '150.00', 1, '150.00', '2022-09-23 12:44:54', 'Ordered', 'aniket', '6355694782', 'aniketviradiya@gmail.com', ''),
(24, 'Macchiato', '300.00', 1, '300.00', '2022-09-23 12:45:25', 'Delivered', 'aniket', '6366125', 'aniketviradiya@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(8) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'aniket', 'aniket@gamil.com', 'aniket'),
(3, 'aniket', 'aniketviradiya@gmail.com', 'aniket@@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coffee`
--
ALTER TABLE `tbl_coffee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_coffee`
--
ALTER TABLE `tbl_coffee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
