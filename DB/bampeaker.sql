-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 01:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bampeaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`, `reg_date`) VALUES
(1, 'admin', 'admin123', '2021-03-10 07:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_img` varchar(50) NOT NULL,
  `p_mn` varchar(50) NOT NULL,
  `p_length` varchar(50) NOT NULL,
  `p_diameter` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `quatity` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`id`, `user_id`, `p_id`, `p_name`, `p_img`, `p_mn`, `p_length`, `p_diameter`, `p_price`, `p_type`, `quatity`, `total_price`) VALUES
(23, 1, 1, 'GALAXY(STRIPES)', '47-7.png', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', 1000, 'lamps', 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `id` int(11) NOT NULL,
  `csrf` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile_photo` varchar(50) NOT NULL DEFAULT 'user.png',
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `csrf`, `name`, `profile_photo`, `mobile_no`, `email`, `password`, `reg_date`) VALUES
(1, '09e122b873dff2fa40e5178f0fcf00f8', 'Kadir Rizwan Sheikh ', '240administrator-male.png', '7972112804', 'sheikhkadir02@gmail.com', '$2y$10$kGhIYBDHcZIe/ShxP8lf6uTCI7E63OD.cmgz6tQWf0Vy7Jw3qhYu.', '2021-03-10 07:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `shipName` varchar(30) NOT NULL,
  `shipEmail` varchar(30) NOT NULL,
  `shipPhone` varchar(15) NOT NULL,
  `shipAddress` varchar(200) NOT NULL,
  `shipCity` varchar(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `cancel_request` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `order_id`, `user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name`, `product_quantity`, `total_price`, `payment_mode`, `purchase_date`, `status`, `cancel_request`) VALUES
(13, 'BMPK1203202110697154', '1', 'Kadir Rizwan Sheikh', 'sheikhkadir02@gmail.com', '7972112804', 'Ward No. 1 , Old Town , Butibori , Nagpur', 'Napur', 2, 'GALAXY', 1, 2500, 'cod', '2021-03-12 16:54:16', 'out for delivery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `modal_no` varchar(50) NOT NULL,
  `length` varchar(50) NOT NULL,
  `diameter` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`id`, `name`, `image`, `price`, `type`, `modal_no`, `length`, `diameter`, `description`) VALUES
(1, 'GALAXY(STRIPES)', '47-7.png', 1000, 'lamps', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', 'Bacon ipsum dolor amet sirloin jowl turducken pork loin pig pork belly, chuck cupim tongue beef doner tri-tip pancetta spare ribs porchetta. Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef brisket ball tip short ribs.'),
(2, 'GALAXY', 'Rectangle 47-11.png', 2500, 'lamps', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', 'kadir'),
(3, 'GALAXY(STRIPES)', '47-7.png', 1000, 'lamps', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', ''),
(4, 'GALAXY(STRIPES)', '38.png', 1000, 'accessories', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', ''),
(5, 'GALAXY(STRIPES)', '47-7.png', 2900, 'lamps', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', ''),
(6, 'GALAXY(STRIPES)', '38.png', 1000, 'accessories', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', ''),
(7, 'GALAXY(STRIPES)', '47-7.png', 1000, 'lamps', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', ''),
(9, 'GALAXY(STRIPES)', '38.png', 1000, 'accessories', 'ACB180101', '12\" - 3\"', ' 2\" - 3\"', ''),
(11, 'abcd', 'Rectangle 47-1.png', 2000, 'lamps', 'fjshfkasjf', '11\"-11\"', '11\"-11\"', 'fsfsf');

-- --------------------------------------------------------

--
-- Table structure for table `txn_tbl`
--

CREATE TABLE `txn_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `txn_tbl`
--
ALTER TABLE `txn_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `txn_tbl`
--
ALTER TABLE `txn_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
