-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 09:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tommy's store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(7, 'Children clothes', '1638011071799591295.jpg'),
(8, 'Men shoes', '1638011202922651379.jpg'),
(9, 'Gadjets', '16380141151621027074.jpg'),
(12, 'Women Clothes', '16381905781843914626.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_gender` varchar(10) NOT NULL,
  `cust_pass` varchar(50) NOT NULL,
  `profilephoto` varchar(300) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `role_id`, `cust_name`, `cust_email`, `cust_address`, `cust_phone`, `cust_gender`, `cust_pass`, `profilephoto`, `createdat`, `updatedat`) VALUES
(1, 2, 'Tomiwa', 'tomiwaadesuyi56@gmail.com', '20 chidison okeke street', '08083131095', 'male', 'fcea920f7412b5da7be0cf42b8c93759', '16387955011559458460.jpg', '2021-11-10 22:07:45', '2021-12-06 12:58:21'),
(4, 1, 'ruth adesona', 'tomiwaadesuyi@gmail.com', '10 moke oyeledun close', '08033033100', 'male', 'fcea920f7412b5da7be0cf42b8c93759', '', '2021-11-23 12:14:47', '2021-11-26 19:54:54'),
(5, 1, 'Tim cook', 'tim@gmail.com', '2 irewole street', '07012621235', 'female', 'fcea920f7412b5da7be0cf42b8c93759', '', '2021-11-26 08:09:33', '2021-11-26 19:54:54'),
(7, 1, 'Tim cook', 'tim2@gmail.com', '2 irewole street', '07012621235', 'male', 'fcea920f7412b5da7be0cf42b8c93759', '', '2021-11-26 08:12:38', '2021-11-26 19:54:54'),
(8, 3, 'Adesuyi Michael', 'mich@yahoo.com', '20 chidison okeke street', '08083131095', 'male', 'fcea920f7412b5da7be0cf42b8c93759', '163794653537236564.jpg', '2021-11-26 11:19:20', '2021-12-01 10:19:49'),
(9, 1, 'Abisade Adesuyi', 'abi@gmail.com', '20 chidison okeke street', '08083131095', 'female', 'd54d1702ad0f8326224b817c796763c9', '1637956063615052482.jpg', '2021-11-26 17:20:58', '2021-11-26 19:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_price` float NOT NULL,
  `status` enum('pending','cancelled','completed') NOT NULL,
  `transref` varchar(200) NOT NULL,
  `paymentmode` enum('paystack','rav') NOT NULL,
  `ordername` varchar(200) NOT NULL,
  `orderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_price`, `status`, `transref`, `paymentmode`, `ordername`, `orderdate`) VALUES
(1, 13, 5000, 'pending', 'ITP16383355051587592427', 'paystack', '', '0000-00-00'),
(2, 1, 5000, 'completed', 'ITP1638352942243834162', 'paystack', '', '0000-00-00'),
(3, 1, 5000, 'completed', 'ITP1638352965204874797', 'paystack', '', '0000-00-00'),
(4, 1, 12500, 'completed', 'ITP16388141161944559632', 'paystack', 'Addidas sneakers', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(150) NOT NULL,
  `pro_image` varchar(300) NOT NULL,
  `pro_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_image`, `pro_price`) VALUES
(1, 'Addidas sneakers', '1638018971360792780.jpg', 12500),
(2, 'Addidas sneakers', '16380200722001712708.jpg', 7000),
(3, 'konami sneakers', '16380200971262794586.jpg', 4500),
(4, 'konami sneakers', '1638020250884907077.jpg', 6000),
(5, 'konami sneakers', '1638020522846851984.jpg', 4000),
(6, 'Men Clothes', '16381727081449235787.jpeg', 10000),
(7, 'Men Clothes', '16381731661401531157.jpg', 6800),
(8, 'Addidas sneakers', '16381897201399022217.jpg', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'BUYER'),
(2, 'ADMISTRATOR'),
(3, 'SELLER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
