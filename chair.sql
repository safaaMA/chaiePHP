-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 سبتمبر 2022 الساعة 01:16
-- إصدار الخادم: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chair`
--

-- --------------------------------------------------------

--
-- بنية الجدول `bestsellers`
--

CREATE TABLE `bestsellers` (
  `Best_id` int(255) NOT NULL,
  `Best_Token` varchar(255) NOT NULL,
  `Best_name` varchar(255) NOT NULL,
  `Best_price` varchar(255) NOT NULL,
  `Best_Type` varchar(255) NOT NULL,
  `Best_colors` varchar(255) NOT NULL,
  `Best_newPrace` varchar(255) NOT NULL,
  `Best_num` varchar(255) NOT NULL,
  `Best_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(255) NOT NULL,
  `token_cart` varchar(255) NOT NULL,
  `name_cart` varchar(255) NOT NULL,
  `price_cart` varchar(255) NOT NULL,
  `num_cart` varchar(255) NOT NULL,
  `img_cart` varchar(255) NOT NULL,
  `shopUser_cart` varchar(255) NOT NULL,
  `shopTokenP_cart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`id_cart`, `token_cart`, `name_cart`, `price_cart`, `num_cart`, `img_cart`, `shopUser_cart`, `shopTokenP_cart`) VALUES
(4, '220914084914176', 'old chair', '200$', '1', 'producted-6320897a3e7906.21444338.png', '220914030217127', '220913034530111'),
(5, '220914084928189', 'sofa', '90$', '2', 'producted-631f9c7ec39db4.28484042.png', '220914030217127', '220912073720179'),
(6, '220914084942172', 'tables', '300$', '2', 'producted-632089077541c5.75675308.png', '220914030217127', '220913034335184'),
(7, '220914092026167', 'Chandelier', '190$', '4', 'producted-631fd7817bfea6.94995874.png', '220914030217127', '220913030609177');

-- --------------------------------------------------------

--
-- بنية الجدول `login`
--

CREATE TABLE `login` (
  `User_id` int(255) NOT NULL,
  `User_token` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `login`
--

INSERT INTO `login` (`User_id`, `User_token`, `user_name`, `last_name`, `user_email`, `password`, `user_img`) VALUES
(2, '220914023750198', 'SAFAA ma', 'mohammed', 'safaa@gmail.com', '1223456789', 'User-63234ab2695e69.53527173.png'),
(3, '220914030217127', 'Houseen', 'ma', 'Houseen@gmail.com', '123456789', 'User-632227e1c13f60.87740000.png'),
(4, '220915041131159', 'علي', 'محمد', 'ddeasfs2@gmail.com', 'ali$alipq', 'User-632332cf717017.86493638.jpeg'),
(5, '220915045846115', 'صفاء', 'م ح', 'sama@gmail.com', '12341234', '');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `pro_id` int(255) NOT NULL,
  `pro_token` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` varchar(255) NOT NULL,
  `pro_Type` varchar(255) NOT NULL,
  `pro_colors` varchar(255) NOT NULL,
  `pro_newPrace` varchar(255) NOT NULL,
  `pro_num` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`pro_id`, `pro_token`, `pro_name`, `pro_price`, `pro_Type`, `pro_colors`, `pro_newPrace`, `pro_num`, `pro_img`) VALUES
(2, '220912073612155', 'tqble', '20$', 'Tables', 'yallow', '', '11', 'producted-631f6e0cd920d4.41718526.png'),
(3, '220912073720179', 'sofa', '90$', 'Bed room', 'krmz', '70$', '22', 'producted-631f9c7ec39db4.28484042.png'),
(9, '220913013701129', 'chair New', '200$', 'Chair', 'red', '30$', '3', 'producted-631fc29dea1965.60386969.png'),
(11, '220913014004166', 'tqble', '90$', 'Chair', 'red', '', '5', 'producted-631fc354ef0818.97382499.png'),
(12, '220913014323130', 'main chaiar', '1000$', 'Chair', 'white', '', '3', 'producted-631fc41ba819d6.88268410.png'),
(13, '220913024505186', 'New', '200$', 'Tables', 'yallow', '111$', '5', 'producted-631fd29117a166.06788486.png'),
(14, '220913030048141', 'old Phone', '100$', 'Antiques', 'white', '99$', '2', 'producted-631fd64016f729.46150207.png'),
(15, '220913030609177', 'Chandelier', '190$', 'Chandelier', 'white', '100$', '4', 'producted-631fd7817bfea6.94995874.png'),
(16, '220913034335184', 'tables', '300$', 'food tables', 'black', '400$', '4', 'producted-632089077541c5.75675308.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestsellers`
--
ALTER TABLE `bestsellers`
  ADD PRIMARY KEY (`Best_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestsellers`
--
ALTER TABLE `bestsellers`
  MODIFY `Best_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `User_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
