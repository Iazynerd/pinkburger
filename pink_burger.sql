-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 12:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pink_burger`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categ_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categ_name`) VALUES
(1, 'Sandwiches'),
(2, 'Grill'),
(3, 'Salads'),
(4, 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `food_name` varchar(60) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `food_name`, `descrip`, `category`, `price`) VALUES
(1, 'signature pink burger', '(grilled beef patty, cheddar cheese, pomegrante, onion rings, signature souce)', 1, 2),
(2, 'flaming steak', '(grilled beef steak, mushroom, cheddar & mozzarella)', 1, 2.2),
(3, 'brisket sliders', 'pulled brisket beef bbq souce, cheddar cheese', 1, 2.3),
(4, 'flamin cheetos buger', '(grilled beef patty, cheddar cheese, flamin cheetos, signature souce)', 1, 2),
(5, 'pink gram slider', '(grilled beef patty, cheddar cheese, mini money buns, special souce)', 1, 2.2),
(6, 'mushroom buger', '(grilled beef patty, white cheese, mushroom ranch souce)', 1, 1.9),
(7, 'chicken tikka sandwich', '(sliced chicken meat, tomiya souce, pickles)', 1, 1.3),
(8, 'boneless chicken', '(boneless chicken grilled, bbq souce)', 2, 3.5),
(9, 'meat special kabab', '(kabab meat bbq, bbq souce, rice)', 2, 3.5),
(10, 'chicken special kabab', '(kabab chicken bbq, bbq souce, rice)', 2, 3.3),
(11, 'meat tikka', '(grilled meat, fries)', 2, 2.5),
(12, 'meat kabab', '(meat kabab, fries, tomiya souce)', 2, 2.5),
(13, 'olive salad', '', 3, 0.75),
(14, 'fresh garden', '', 3, 0.75),
(15, 'fattoush', '', 3, 0.85),
(16, 'greek salad', '', 3, 1),
(17, 'fanta citrus', '', 4, 0.3),
(18, 'sprite', '', 4, 0.3),
(19, 'coca cola', '', 4, 0.3),
(20, 'avocado qawe', '(avocado juice with dates cream)', 4, 3.3),
(21, 'mango classic', '(mango fresh juice)', 4, 2.4),
(22, 'abo qalbeen fresh juice', '(2 fresh juices in one cup)', 4, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `total_price` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` varchar(120) NOT NULL DEFAULT 'acknowledge'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `products`, `total_price`, `time`, `state`) VALUES
(1, 3, '{\"item_1\":{\"product_id\":1,\"quantity\":2},\"item_2\":{\"product_id\":5,\"quantity\":3}}', 12, '2021-12-12 00:29:12', 'acknowledge'),
(2, 3, '[\"\\\'item_1\\\' => array(\\\'product_id\\\' => 1, \\\'quantity\\\' => 1)\"]', 4.5, '2021-12-12 22:33:14', 'acknowledge'),
(3, 3, '[\"\\\'item_1\\\' => array(\\\'product_id\\\' => 2, \\\'quantity\\\' => 1),\\\'item_2\\\' => array(\\\'product_id\\\' => 1, \\\'quantity\\\' => 1)\"]', 4.7, '2021-12-12 22:36:07', 'acknowledge'),
(4, 3, '\"{\\\"item_1\\\":{\\\"product_id\\\":1,\\\"quantity\\\":2}\"', 2.5, '2021-12-12 23:14:08', 'acknowledge');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `state` varchar(25) NOT NULL DEFAULT 'user',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(1000) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `user_name`, `email`, `password`, `state`, `timestamp`, `address`, `phone_number`) VALUES
(1, 'admin', 'admin', 'admin', 'test@test.com', '$2y$10$Jv6HfujjH5zmqsuPfBaAJ.B1hwG1YPQOY30WP8GgK/CNTisn4CWGC', 'admin', '2021-12-11 00:35:54', NULL, NULL),
(3, 'userUpdated', 'userUpdated', 'userUpdated', 'user@test.com', '$2y$10$nYChPPw0QcvkBTwjX/ZtkuTnszg8OQtmo5GzCBtJIJMTDIezNcdPe', 'user', '2021-12-11 04:41:23', 'inserted address', '0123456789'),
(4, 'staff', 'staff', 'staff', 'staff@test.com', '$2y$10$gdyddQfMS8pudPn6kL7BSOVu0DgKT//xcJIaBnqbOWgN.0ps2hRXC', 'staff', '2021-12-11 16:11:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
