-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 09:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfasters`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `log_status` tinyint(4) NOT NULL DEFAULT '1',
  `log_active` tinyint(4) NOT NULL DEFAULT '1',
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `selling_price` double NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `log_status` tinyint(4) NOT NULL DEFAULT '1',
  `log_active` tinyint(4) NOT NULL DEFAULT '1',
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `price`, `selling_price`, `product_image`, `category_id`, `rating`, `reviews`, `log_status`, `log_active`, `log_datetime`) VALUES
(1, 'prod1', 'abc def chg lorem ipsum', 20, 23, 'f7f5589d4bd723d5ef9c863e963c1598.jpg', 1, 0, 0, 1, 1, '2018-10-13 18:10:05'),
(2, 'testProd', 'tasty yummy dish', 200, 200, '08da70a1f02b489c759eb18f8ba1b3cb.jpg', 2, 0, 0, 3, 1, '2018-10-14 05:53:37'),
(3, 'testProd', 'tasty yummy dish', 200, 200, '1c08d7329907f56691b6edd8ca6d1282.gif', 3, 0, 0, 3, 1, '2018-10-14 06:47:30'),
(4, 'cake', 'soft dark choclate cake', 350, 300, 'fbac3de23122de3252f82fe56db3bbdd.jpg', 2, 0, 0, 3, 1, '2018-10-14 05:51:12'),
(5, 'cake', 'soft dark choclate cake', 350, 300, '641cdaf10b9c49656d6dc714146b1cff.jpg', 2, 0, 0, 1, 1, '2018-10-14 05:50:20'),
(6, 'prod1', 'abc def chg lorem ipsum', 200, 150, 'd611fd637f749805beb3910a730735f0.jpg', 1, 0, 0, 1, 1, '2018-10-14 06:39:06'),
(7, 'jdgjk', 'kjfgnkjsfg kjnsfkjgnkf', 21, 231, 'e4d74aa1016450b339c6795270847627.jpg', 2, 0, 0, 1, 1, '2018-10-14 06:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_add`
--

CREATE TABLE `restaurant_add` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `restaurant_address` varchar(255) NOT NULL,
  `restaurant_city` varchar(255) NOT NULL,
  `restaurant_state` varchar(255) NOT NULL,
  `Latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `open_days` longtext NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `close_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_add`
--

INSERT INTO `restaurant_add` (`id`, `name`, `mobile`, `restaurant_name`, `restaurant_email`, `password`, `token`, `image`, `restaurant_address`, `restaurant_city`, `restaurant_state`, `Latitude`, `longitude`, `open_days`, `open_time`, `close_time`, `status`, `datetime`) VALUES
(5, 'uday', '8712965092', 'spicy', 'spicy@gmail.com', 'b93416f8827ee9fbd4692c38c34bf673', 'a46164ec93011a643c126459aec93734', 'c92a2486c7c578810af1b774218a7db3.jpg', 'uiuiu iuaxan ', 'hyderabad', 'telangana', '45.13213', '46.09565', 'a:6:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";}', '12:13', '23:02', 'active', '02-Oct-2018 08:50:42 AM'),
(3, 'uday', '8745965092', 'eat here', 'udaykumarks84@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '931047e99b093b6c9e505ec9549c8dac', '511295acb030483c4f61819cfe6cf8a9.png', 'eat street', 'hyderabad', 'telangan', '45.13213', '46.09565', 'a:7:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";i:6;s:3:\"sun\";}', '12:13', '23:02', 'inactive', '02-Oct-2018 06:50:52 AM'),
(4, 'ram babu', '8745965092', 'sri venkateswara', 'svh@gmail.com', '6e31323c8314a8e2ad896f0e78d71b72', '319db90596ec3ac0fed682a7448c2e11', '2d43cc597f783b05475992a59cd898f6.png', 'temple road', 'bhadrachalam', 'telangana', '45.13213', '46.09565', 'a:7:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";i:6;s:3:\"sun\";}', '12:13', '23:02', 'active', '02-Oct-2018 06:55:45 AM');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `text`, `status`) VALUES
(3, 'a757c83b55725100ded633df20f7ec23.jpg', 'Some Offer Text Here', 'active'),
(4, '936a8c593f09d26f40ab65732fd7321b.jpg', 'Offer text will appear here', 'active'),
(5, 'bac93bb111dcd33229966e985f1af988.jpg', 'Delicious Pizza - 15% OFF', 'active'),
(6, '23e532574c3214851f7d5e9a527d5c3a.png', 'app7tech', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `name`, `email`, `mobile`, `password`, `token`, `created_date`, `modified_date`, `status`) VALUES
(1, 'super_admin', 'super_admin@gmail.com', '9676053355', '8a18b4e1c3310fe2aa3c1919c19b4f04', 'd3fe5592d3fa97b1639f93b697cffbf1', '2018-09-23 00:00:00', '2018-09-23 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `referal_code` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `username`, `email`, `phone`, `password`, `referal_code`, `token`, `status`, `datetime`) VALUES
(1, 'ramesh', 'ramesh.kreddi@gmail.com', '9848845035', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'active', '23-Sep-2018 09:51:45 AM'),
(7, 'uday kumarq', 'uday@gmail.com', '8712965092', '0228669bc778ab885a898364efef9f7e', 'X6UIA8', '6583924a206e409d80024e5dd518b511', 'inactive', '27-Sep-2018 02:06:12 AM'),
(4, 'syam', 'planetcloudtechnologies@gmail.com', '1234567890', '81dc9bdb52d04dc20036dbd8313ed055', 'TWELFH', 'f995c321edc02548dd2b260ba6b9f3d7', 'inactive', '26-Sep-2018 03:15:34 PM'),
(5, 'syam12', 'syam_tamatapu@yahoo.com', '9848845035', '81dc9bdb52d04dc20036dbd8313ed055', '4G9VL4', '7fc1a90013c4036ad46a73222bfb0f9a', 'active', '26-Sep-2018 03:17:15 PM'),
(8, 'krishna reddy', 'krishnacnsl@gmail.com', '9676053355', 'fa831e94cce5ba6328db08e7275ddcb5', '00P0LG', '531c862eadd516e69e18b6ffb8d7c0ee', 'active', '27-Sep-2018 04:09:40 AM'),
(9, 'prashanth', 'prashanth@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'active', '12-Oct-2018 09:51:45 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `restaurant_add`
--
ALTER TABLE `restaurant_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurant_add`
--
ALTER TABLE `restaurant_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
