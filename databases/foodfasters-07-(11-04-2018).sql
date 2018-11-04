-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 05:52 AM
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
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `text`, `status`) VALUES
(1, 'e9bf7568ee3f336473915ab1553d60d1.png', 'app7tech', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `log_status` tinyint(4) NOT NULL DEFAULT '1',
  `log_active` tinyint(4) NOT NULL DEFAULT '1',
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `restaurant_id`, `category_name`, `description`, `log_status`, `log_active`, `log_datetime`) VALUES
(1, 0, 'biryani', 'alnc', 1, 1, '2018-10-26 04:29:20'),
(2, 0, 'starters', 'skfm', 1, 1, '2018-10-25 17:14:45'),
(3, 3, 'snacks', 'snacks with full of options', 1, 1, '2018-10-25 17:51:38'),
(4, 0, 'dishes', 'akdm', 1, 1, '2018-10-25 17:50:52'),
(5, 0, 'k', '', 3, 1, '2018-10-26 04:29:38'),
(6, 3, 'sat', 's', 1, 1, '2018-11-03 06:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `dboy_id` int(11) NOT NULL,
  `dboy_name` varchar(200) NOT NULL,
  `dboy_email` varchar(255) NOT NULL,
  `dboy_address` varchar(255) NOT NULL,
  `dboy_id_proof` varchar(255) NOT NULL,
  `dboy_photo` varchar(255) NOT NULL,
  `dboy_mobile` varchar(255) NOT NULL,
  `dboy_token` varchar(255) NOT NULL,
  `log_active` tinyint(4) NOT NULL DEFAULT '1',
  `log_status` tinyint(4) NOT NULL DEFAULT '1',
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`dboy_id`, `dboy_name`, `dboy_email`, `dboy_address`, `dboy_id_proof`, `dboy_photo`, `dboy_mobile`, `dboy_token`, `log_active`, `log_status`, `log_datetime`) VALUES
(1, 'shiva', 'prashanth@gmail.com', '                                                                                                        house no 1, abcd, hyderabad, 500052                                                                                                                    ', 'f2bf45ffe1cea98d8a203ed494ccfe4f.jpg', 'f6e225d2bd8c3bdcabeaf90bcea57d0e.png', '9177797624', '0e7ba6b4047d7fc61b87fb77b0866fba', 0, 3, '2018-10-29 02:08:34'),
(2, 'fhfbhj', 'dfbh@mail.com', 'dkfgnjkdsfgjk', 'cb78932e3dad9f9a8ea033e4de0329d7.png', '9aa92d766491d547dc1f053f97e37a5e.png', '9177797623', '8ff3420a26ee06dcbf7bb2ad95cfccbb', 0, 3, '2018-10-28 12:10:24'),
(3, 'uday', 'udaykumarks84@gmail.com', 'hiodhac ancascknok', '', '', '8712965092', 'd8f9858dee0e2061a6f5ab3a056f26f1', 1, 1, '2018-10-29 01:55:43'),
(4, 'ew', 'sd@gmail.com', 'dvdv', '', '', '7878787878', '29b1968a981dec1abfa82eb934ae0295', 1, 1, '2018-10-29 02:04:42'),
(5, 'u', 'u@u.com', 'fgdgd', '', '', '8712965091', '01ff39ebf8104545ebb606e54343dc85', 1, 1, '2018-10-30 02:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Heir Apparel', 'Crowea Pl, Frenchs Forest NSW 2086', 17.385044, 78.486671),
(2, 'BeeYourself Clothing', 'Thalia St, Hassall Grove NSW 2761', 17.385542, 78.486671),
(3, 'RK INFO SYSTEMS', 'suchitra', 17.496283, 78.471565),
(4, 'Madhapur', 'madhapur', 17.448437, 78.374138),
(5, 'Fashiontasia', 'Braidwood Dr, Prestons NSW 2170', -33.944489, 150.854706),
(6, 'Trish & Tash', 'Lincoln St, Lane Cove West NSW 2066', -33.812222, 151.143707),
(7, 'Perfect Fit', 'Darley Rd, Randwick NSW 2031', -33.903557, 151.237732),
(8, 'Buena Ropa!', 'Brodie St, Rydalmere NSW 2116', -33.815521, 151.026642),
(9, 'Coxcomb and Lily Boutique', 'Ferrers Rd, Horsley Park NSW 2175', -33.829525, 150.873764),
(10, 'Moda Couture', 'Northcote Rd, Glebe NSW 2037', -33.873882, 151.177460);

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
  `restaurant_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `log_status` tinyint(4) NOT NULL DEFAULT '1',
  `log_active` tinyint(4) NOT NULL DEFAULT '1',
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `price`, `selling_price`, `product_image`, `category_id`, `restaurant_id`, `rating`, `reviews`, `log_status`, `log_active`, `log_datetime`) VALUES
(1, 'prod1', 'abc def chg lorem ipsum', 20, 23, 'f7f5589d4bd723d5ef9c863e963c1598.jpg', 1, 0, 0, 0, 1, 1, '2018-10-13 18:10:05'),
(2, 'testProd', 'tasty yummy dish', 200, 200, '08da70a1f02b489c759eb18f8ba1b3cb.jpg', 2, 0, 0, 0, 3, 1, '2018-10-14 05:53:37'),
(3, 'testProd', 'tasty yummy dish', 200, 200, '1c08d7329907f56691b6edd8ca6d1282.gif', 3, 0, 0, 0, 3, 1, '2018-10-14 06:47:30'),
(4, 'cake', 'soft dark choclate cake', 350, 300, 'fbac3de23122de3252f82fe56db3bbdd.jpg', 2, 0, 0, 0, 3, 1, '2018-10-14 05:51:12'),
(5, 'cake', 'soft dark choclate cake', 350, 300, '641cdaf10b9c49656d6dc714146b1cff.jpg', 2, 0, 0, 0, 1, 1, '2018-10-14 05:50:20'),
(6, 'prod1', 'abc def chg lorem ipsum', 200, 150, 'd611fd637f749805beb3910a730735f0.jpg', 1, 0, 0, 0, 1, 1, '2018-10-14 06:39:06'),
(7, 'jdgjk', 'kjfgnkjsfg kjnsfkjgnkf', 21, 231, 'e4d74aa1016450b339c6795270847627.jpg', 2, 0, 0, 0, 1, 1, '2018-10-14 06:45:09'),
(8, 'chicken curry', 'extra spicy chicken', 160, 149, 'f338d508007da130ed690c404b7a8d85.jpg', 6, 3, 0, 0, 1, 1, '2018-11-03 07:04:50'),
(9, 'Egg Omlette', 'Egg omlette with more spicy', 120, 99, '5aa487b3f610315ef019d1018e7c07cb.jpg', 3, 3, 0, 0, 1, 1, '2018-11-03 08:17:16'),
(10, 'as', 'as', 123, 12, '', 3, 3, 0, 0, 1, 1, '2018-11-03 08:20:58');

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
(3, 'uday', '8745965092', 'Eat Here', 'udaykumarks84@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '931047e99b093b6c9e505ec9549c8dac', '511295acb030483c4f61819cfe6cf8a9.png', 'Suchitra', 'hyderabad', 'telangan', '17.5020354', '78.4731573', 'a:7:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";i:6;s:3:\"sun\";}', '12:13', '23:02', 'active', '02-Oct-2018 06:50:52 AM'),
(4, 'ram babu', '8745965092', 'sri venkateswara', 'svh@gmail.com', '6e31323c8314a8e2ad896f0e78d71b72', '319db90596ec3ac0fed682a7448c2e11', '2d43cc597f783b05475992a59cd898f6.png', 'temple road', 'bhadrachalam', 'telangana', '45.13213', '46.09565', 'a:7:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";i:6;s:3:\"sun\";}', '12:13', '23:02', 'active', '02-Oct-2018 06:55:45 AM'),
(6, 'uday', '8745965232', 'eat there', 'udaykumar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '931047e99b093b6c9e505ec9549c8dac', '511295acb030483c4f61819cfe6cf8a9.png', 'eat street', 'hyderabad', 'telangan', '45.13213', '46.09565', 'a:7:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";i:6;s:3:\"sun\";}', '12:13', '23:02', 'active', '02-Oct-2018 06:50:52 AM'),
(7, 'Uday ', '8712950892', 'Sahara Restaurant', 'sahara@sahara.com', '33e35264a1d21afe068075ade67e6a4e', '6efb87d52039fb44e8aa37e12df4153d', 'df6e62e1b435d888509982e726a07aed.jpg', 'Chintal', 'Hyderabad', 'Telangana', '17.49641', '78.4529564', 'a:7:{i:0;s:3:\"mon\";i:1;s:3:\"tue\";i:2;s:3:\"wed\";i:3;s:4:\"thru\";i:4;s:3:\"fri\";i:5;s:3:\"sat\";i:6;s:3:\"sun\";}', '10:00', '22:59', 'active', '02-Nov-2018 02:49:21 PM');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_request`
--

CREATE TABLE `restaurant_request` (
  `res_req_id` int(11) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_mobile` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `log_active` tinyint(4) NOT NULL DEFAULT '1',
  `log_status` tinyint(4) NOT NULL DEFAULT '1',
  `log_datetime` datetime NOT NULL,
  `restaurant_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_request`
--

INSERT INTO `restaurant_request` (`res_req_id`, `contact_name`, `contact_email`, `contact_mobile`, `contact_address`, `message`, `log_active`, `log_status`, `log_datetime`, `restaurant_name`) VALUES
(1, 'alfa yadav', 'alfa@gmail.com', '9177797612', '337b099a4dec5b7b43ccfed3cee2ea61', '45a63c4078ae5bfb44613a3a44a401aa', 1, 1, '2018-11-04 05:41:20', 'alfa'),
(2, 'sukumar', 'sukumar@gmail.com', '9177797613', 'plot no 645, sr nagar, hydreadab', 'bb048290c4e6b21f72714fe113d3cb79', 1, 1, '2018-11-04 05:46:36', 'sukumar\'s');

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
  `device_token` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `username`, `email`, `phone`, `password`, `referal_code`, `token`, `device_token`, `status`, `datetime`) VALUES
(1, 'ramesh', 'ramesh.kreddi@gmail.com', '9848845035', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', 'active', '23-Sep-2018 09:51:45 AM'),
(7, 'uday kumarq', 'uday@gmail.com', '8712965092', '0228669bc778ab885a898364efef9f7e', 'X6UIA8', '6583924a206e409d80024e5dd518b511', '', 'inactive', '27-Sep-2018 02:06:12 AM'),
(4, 'syam', 'planetcloudtechnologies@gmail.com', '1234567890', '81dc9bdb52d04dc20036dbd8313ed055', 'TWELFH', 'f995c321edc02548dd2b260ba6b9f3d7', '', 'inactive', '26-Sep-2018 03:15:34 PM'),
(5, 'syam12', 'syam_tamatapu@yahoo.com', '9848845035', '81dc9bdb52d04dc20036dbd8313ed055', '4G9VL4', '7fc1a90013c4036ad46a73222bfb0f9a', '', 'active', '26-Sep-2018 03:17:15 PM'),
(8, 'krishna reddy', 'krishnacnsl@gmail.com', '9676053355', 'fa831e94cce5ba6328db08e7275ddcb5', '00P0LG', '531c862eadd516e69e18b6ffb8d7c0ee', '', 'active', '27-Sep-2018 04:09:40 AM'),
(9, 'prashanth', 'prashanth@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', 'active', '12-Oct-2018 09:51:45 AM'),
(10, 'uday', 'uday1@gmail.com', '7878799656', '0228669bc778ab885a898364efef9f7e', '1Z1OI9', 'b35da17c20301a7fd4d8ae098ef8695b', '', 'active', '31-Oct-2018 04:41:30 PM'),
(11, 'uday', 'uday2@gmail.com', '7878799651', '0228669bc778ab885a898364efef9f7e', 'UGN86J', 'af137866a206c92466b200c85c89ef21', '', 'active', '31-Oct-2018 04:45:55 PM'),
(12, 'uday', 'uday3@gmail.com', '7878799653', '0228669bc778ab885a898364efef9f7e', 'L65SQX', 'c4039f4b61826939ddfd4a850dca6a96', '', 'active', '31-Oct-2018 04:46:34 PM'),
(13, 'uday', 'uday43@gmail.com', '7878799654', '0228669bc778ab885a898364efef9f7e', 'JHLU32', '9f4a60c7f78eb03d72d0e0370898f649', '', 'active', '31-Oct-2018 04:47:51 PM'),
(14, 'uday', 'uday12@gmail.com', '7878799612', '0228669bc778ab885a898364efef9f7e', '8EQH2J', 'aa4d565747d40c6df16fbdadc7c3f3a4', '', 'active', '31-Oct-2018 04:49:27 PM'),
(15, 'uday', 'uday13@gmail.com', '7878799613', '0228669bc778ab885a898364efef9f7e', '0MA46F', 'df3f80e18d8d75ace614e3581552b5ec', '', 'active', '31-Oct-2018 04:50:04 PM'),
(16, 'uday', 'uday131@gmail.com', '7878799611', '0228669bc778ab885a898364efef9f7e', 'GMA5L1', '831a4ca03005dd9edde5a444c5a031af', '', 'active', '31-Oct-2018 05:00:03 PM'),
(17, 'uday', 'uday1131@gmail.com', '7878799111', '0228669bc778ab885a898364efef9f7e', 'HEVJ2J', '70112b7e91566fa29e8a6589bd24c18e', 'asfsdgsgs', 'active', '31-Oct-2018 05:01:13 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`dboy_id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `restaurant_request`
--
ALTER TABLE `restaurant_request`
  ADD PRIMARY KEY (`res_req_id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `dboy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurant_add`
--
ALTER TABLE `restaurant_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurant_request`
--
ALTER TABLE `restaurant_request`
  MODIFY `res_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
