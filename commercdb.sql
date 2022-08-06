-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 01:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commercdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `id` int(11) NOT NULL,
  `accept_name` varchar(100) NOT NULL,
  `accept_email` varchar(100) NOT NULL,
  `accept_phone` varchar(8) NOT NULL,
  `accept_district` varchar(100) NOT NULL,
  `accept_street` varchar(255) NOT NULL,
  `accept_building` varchar(255) NOT NULL,
  `accept_no` varchar(100) NOT NULL,
  `accept_product` varchar(1000) NOT NULL,
  `accept_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`id`, `accept_name`, `accept_email`, `accept_phone`, `accept_district`, `accept_street`, `accept_building`, `accept_no`, `accept_product`, `accept_price`) VALUES
(15, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Bcharreh', 'kfershlan', 'mmm', '505', 'first product (1)', '30'),
(18, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Aaley', 'gbhnjkm', ' gvbnm,', '505, 16463', 'first product (3), third Product (5)', '176');

-- --------------------------------------------------------

--
-- Table structure for table `addaproduct`
--

CREATE TABLE `addaproduct` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `no` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addaproduct`
--

INSERT INTO `addaproduct` (`id`, `image`, `no`, `title`, `price`, `description`, `categories`) VALUES
(1, 'ggg.jpg', '505', 'first product', '37', 'this is a very important product for our life and it is very very very nice.this is a very important product for our life and it is very very very nice.', 'shoes'),
(2, 'Screenshot 2022-03-25 121611.png', '50588', 'seconde product', '59', 'you can shoose you image you want and we prepare it for you in a few days, it is beautifulyou can shoose you image you want and we prepare it for you in a few days, it is beautifulyou can shoose you image you want and we prepare it for you in a few days, ', 'coat'),
(3, 'ggg.jpg', '16463', 'third Product', '13', 'hello', 'T-shirt'),
(8, 'Screenshot 2022-03-25 121611.png', '20', 'fourth', '56', 'hujiohyjghv gftygyujilki ygiujiojjhj y8jikjhy uiokim', 'T-shirt'),
(10, '', '1879', 'Nike', '18', 'bhguyhiukjm', 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `pNo` varchar(100) NOT NULL,
  `pTitle` varchar(100) NOT NULL,
  `pDescription` varchar(255) NOT NULL,
  `pPrice` int(100) NOT NULL,
  `pQty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cName`, `pNo`, `pTitle`, `pDescription`, `pPrice`, `pQty`) VALUES
(88, 'ali@ali.com', '505', 'first product', 'this is a very important product for our life and it is very very very nice.', 30, 1),
(89, 'ali@ali.com', '50588', 'seconde product', 'you can shoose you image you want and we prepare it for you in a few days, it is beautiful', 50, 1),
(90, 'ali@ali.com', '16463', 'third product', 'hello bcdankiabyu byueqhfiunafaeb bfyuheiujfoqekfqe nfiuiqeejfokqeif hiuqej', 5, 1),
(91, 'ali@ali.com', '55555', 'gtyuhijmkl', 'srdtfrgyuhijokpl,lkmnjhbgtvyhuijok', 2463, 1),
(93, 'mahmoud@hotmail.com', '505', 'first product', 'this is a very important product for our life and it is very very very nice.', 30, 5),
(94, 'mahmoud@hotmail.com', '50588', 'seconde product', 'you can shoose you image you want and we prepare it for you in a few days, it is beautiful', 50, 10),
(95, 'mahmoud@hotmail.com', '16463', 'third product', 'hello bcdankiabyu byueqhfiunafaeb bfyuheiujfoqekfqe nfiuiqeejfokqeif hiuqej', 5, 7),
(96, 'Aly@outlook.com', '16463', 'third product', 'hello bcdankiabyu byueqhfiunafaeb bfyuheiujfoqekfqe nfiuiqeejfokqeif hiuqej', 5, 1),
(97, 'abed@gmail.com', '50588', 'seconde product', 'you can shoose you image you want and we prepare it for you in a few days, it is beautiful', 50, 2),
(98, 'abed@gmail.com', '16463', 'gyhiujol', 'hello', 13, 3),
(99, 'abed@gmail.com', '20', 'bgyhijuoikpol', 'hujiohyjghv gftygyujilki ygiujiojjhj y8jikjhy uiokim', 67, 1),
(100, 'abed@gmail.com', '505', 'first product', 'this is a very important product for our life and it is very very very nice.', 30, 1),
(111, 'Aly@outlook.com', '50588', 'seconde product', 'you can shoose you image you want and we prepare it for you in a few days, it is beautiful', 41, 4),
(113, 'warwarlouay@gmail.com', '505', 'first product', 'this is a very important product for our life and it is very very very nice.this is a very important product for our life and it is very very very nice.', 37, 3),
(114, 'warwarlouay@gmail.com', '16463', 'third Product', 'hello', 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `chekout`
--

CREATE TABLE `chekout` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(8) NOT NULL,
  `customer_district` varchar(100) NOT NULL,
  `customer_street` varchar(255) NOT NULL,
  `customer_building` varchar(255) NOT NULL,
  `all_products_no` varchar(100) NOT NULL,
  `all_products` varchar(1000) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chekout`
--

INSERT INTO `chekout` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_district`, `customer_street`, `customer_building`, `all_products_no`, `all_products`, `total_price`) VALUES
(46, 'Abed el salam', 'abed@gmail.com', '71759351', 'Zgharta', 'meryata', 'maktabat al fajer', '50588, 16463', 'seconde product (2), gyhiujol (3)', '139'),
(47, 'Aly', 'Aly@outlook.com', '79684258', 'Zgharta', 'meryata', 'al bashir', '16463, 50588', 'third product (1), seconde product (4)', '169');

-- --------------------------------------------------------

--
-- Table structure for table `createaccount`
--

CREATE TABLE `createaccount` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `createaccount`
--

INSERT INTO `createaccount` (`id`, `username`, `email`, `phone`, `password`) VALUES
(1, 'louay warwar', 'warwarlouay@gmail.com', '76516918', '123456'),
(3, 'mahmoud', 'mahmoud@hotmail.com', '71458962', '123456'),
(4, 'Aly', 'Aly@outlook.com', '79684258', '123456'),
(5, 'Abed el salam', 'abed@gmail.com', '71759351', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `password`) VALUES
(2, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `id` int(11) NOT NULL,
  `deliver_name` varchar(100) NOT NULL,
  `deliver_email` varchar(100) NOT NULL,
  `deliver_phone` varchar(8) NOT NULL,
  `deliver_district` varchar(100) NOT NULL,
  `deliver_street` varchar(255) NOT NULL,
  `deliver_building` varchar(255) NOT NULL,
  `deliver_no` varchar(100) NOT NULL,
  `deliver_product` varchar(1000) NOT NULL,
  `deliver_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivered`
--

INSERT INTO `delivered` (`id`, `deliver_name`, `deliver_email`, `deliver_phone`, `deliver_district`, `deliver_street`, `deliver_building`, `deliver_no`, `deliver_product`, `deliver_price`) VALUES
(5, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Minieh-Danniyeh', 'kfershlan', 'Ziko Cell', '505, 16463', 'first product (3), third product (1)', '145'),
(6, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Aaley', 'kfershlan', 'Ziko Cell', '505, 16463, 55555', 'first product (3), third product (1), gtyuhijmkl (1)', '147'),
(7, 'mahmoud', 'mahmoud@hotmail.com', '71458962', 'Koura', 'dahr el aayn', 'LIU', '505, 50588, 16463', 'first product (5), seconde product (10), third product (7)', '685'),
(8, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Minieh-Danniyeh', 'kfershlan', 'Ziko Cell', '505', 'first product (5)', '200'),
(9, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Minieh-Danniyeh', 'kfershlan', 'Ziko Cell', '505, 16463', 'first product (1), third product (5)', '55'),
(10, 'louay warwar', 'warwarlouay@gmail.com', '76516918', 'Jezzin', 'dahr el aayn', 'Ziko Cell', '505, 16463', 'first product (3), third Product (5)', '176'),
(11, 'Aly', 'Aly@outlook.com', '79684258', 'Minieh-Danniyeh', 'Bakhoun', 'Central', '16463', 'third product (1)', '5');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `r_no` varchar(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `review` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `r_no`, `r_name`, `review`) VALUES
(1, '', 'Aly', 'hii'),
(2, '505', 'Aly', 'marhaba'),
(3, '505', 'Aly', 'marhaba'),
(4, '505', 'Aly', 'cgyefbunhjck'),
(5, '505', 'louay warwar', 'hello'),
(6, '50588', 'louay warwar', 'it is good, thank you.'),
(7, '16463', 'louay warwar', 'ghyuieoiv'),
(8, '505', 'Abed el salam', 'beautiful'),
(9, '20', 'Abed el salam', 'this is not good product'),
(10, '16463', 'Abed el salam', 'not bad'),
(11, '505', 'louay warwar', ''),
(12, '50588', 'Aly', 'cgyefbunhjck');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addaproduct`
--
ALTER TABLE `addaproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chekout`
--
ALTER TABLE `chekout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createaccount`
--
ALTER TABLE `createaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `addaproduct`
--
ALTER TABLE `addaproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `chekout`
--
ALTER TABLE `chekout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `createaccount`
--
ALTER TABLE `createaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
