-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2017 at 03:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobile_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE IF NOT EXISTS `distributors` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `phone_no` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `father_name`, `cnic`, `phone_no`, `address`) VALUES
(6, 'madiha', 'Afzal', '12345-6789788-8', '(+92)345-6745678', 'abbasia'),
(7, 'madi', 'afzal', '23456-7890456-7', '(+92)456-7893456', 'abbasia town'),
(8, 'madiha', 'afzal', '12345-6785566-6', '(+92)456-7877786', 'rahim yar khan'),
(9, 'madi', 'afzal', '12345-6782345-6', '(+92)123-4567823', 'sdfghjiugfscf'),
(10, 'madiha', 'afzal', '12345-5665234-5', '(+12)345-6734566', 'sdfghjcghj'),
(12, 'madi', 'afzal', '31303-9565878-2', '(+92)300-8675222', 'asdffggh'),
(13, 'madi', 'afzal', '12345-6782345-6', '(+92)123-4567823', 'sdfghjiugfscf'),
(14, 'madi', 'afzal', '12345-6782345-2', '(+92)123-4567823', 'sdfghjiugfscf'),
(15, 'madi', 'afzal', '31303-9565878-2', '(+92)300-8675222', 'sdfghuj'),
(16, 'ahmed', 'anwar', '12345-6789345-6', '(+23)456-7834567', 'awsedftgyhjkjbvcvgbh'),
(17, 'aqsa', 'rasheed', '12345-6789034-5', '(+23)456-7834567', 'qweerttyyuugfdxcvbnjhv');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(512) NOT NULL,
  `manufacturer` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `manufacturer`) VALUES
(1, 'Samsung galaxy', 'samsung'),
(2, 'Samsungj7', 'samsung'),
(3, 'Samsungj5', 'samsung'),
(4, 'Samsung galaxy', 'samsung'),
(11, 'Samsung galaxy', 'china'),
(12, 'Samsungj5', 'china'),
(13, 'Samsungj7', 'china'),
(14, 'Samsung galaxy', 'china'),
(15, 'Samsungj5', 'china'),
(16, 'Samsungj5', 'china'),
(17, 'Samsung', 'china'),
(18, 'Samsung', 'china'),
(19, 'Samsung', 'samsung'),
(20, 'Samsung', 'samsung'),
(21, 'Samsung', ''),
(22, 'Samsung galaxy', 'samsung'),
(23, 'Samsung', 'china'),
(24, 'Samsung', 'samsung'),
(27, 'Samsung', 'china'),
(28, 'Samsung', 'china'),
(29, 'Samsung', 'china'),
(30, 'Samsung', 'china'),
(31, 'Samsung', 'china'),
(32, 'Samsung', 'china'),
(33, 'Samsung', 'china'),
(34, 'Samsung', 'samsung'),
(35, 'Samsung galaxy', 'samsung'),
(36, 'Samsung', 'samsung'),
(37, 'Samsung', 'samsung'),
(38, 'Samsung', 'samsung'),
(39, 'Samsung galaxy', 'samsung'),
(40, 'Samsung galaxy', 'china');

-- --------------------------------------------------------

--
-- Table structure for table `products_per_purchase_invoice`
--

CREATE TABLE IF NOT EXISTS `products_per_purchase_invoice` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `purchase_invoice_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `expiry_starting_date` date NOT NULL,
  `expiry_ending_date` date NOT NULL,
  `original_price` int(255) NOT NULL,
  `discount_per_item` int(255) NOT NULL,
  `net_discount` int(255) NOT NULL,
  `net_total` int(255) NOT NULL,
  `purchase_price` int(255) NOT NULL,
  `sale_price` int(255) NOT NULL,
  `imei` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `distributer_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `purchase_invoice`
--

INSERT INTO `purchase_invoice` (`id`, `distributer_id`, `date`, `comment`) VALUES
(2, 17, '2017-12-13', ''),
(3, 9, '2017-12-07', ''),
(4, 8, '2017-12-29', ''),
(5, 8, '2017-12-06', ' \r\n				wertyiuoisdfghj	');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
