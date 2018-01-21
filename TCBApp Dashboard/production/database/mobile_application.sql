-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2018 at 03:01 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobile_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `father_name`, `cnic`, `phone_no`, `address`) VALUES
(1, 'aqsa', 'rasheed', '567__-_______-_', '(+45)678-9_____', 'fgdgfd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `father_name`, `cnic`, `phone_no`, `address`) VALUES
(4, 'Ahmad', 'Hanif', '34568-98989__-_', '(+23)445-6456767', 'cbnb cbncbnc'),
(6, 'aqsa', 'rasheed', '34567-2345678-9', '(+34)456-7845678', 'dfgdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(512) NOT NULL,
  `manufacturer` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `manufacturer`) VALUES
(1, 'nokia3310', 'nokia'),
(2, 'samsung-j7', 'samsung'),
(3, 'oppo-f1', 'opp');

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
  `purchase_price` int(255) NOT NULL,
  `sale_price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `imei` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products_per_purchase_invoice`
--

INSERT INTO `products_per_purchase_invoice` (`id`, `purchase_invoice_id`, `product_id`, `expiry_starting_date`, `expiry_ending_date`, `original_price`, `discount_per_item`, `purchase_price`, `sale_price`, `status`, `imei`) VALUES
(1, 1, 1, '2018-01-12', '2018-01-17', 500, 100, 400, 800, '', 2147483647),
(2, 1, 1, '2018-01-12', '2018-01-17', 500, 100, 400, 800, '', 2147483647),
(3, 1, 1, '2018-01-12', '2018-01-17', 500, 100, 400, 800, '', 657465765),
(4, 1, 1, '2018-01-12', '2018-01-17', 500, 100, 400, 800, '', 65765764),
(5, 1, 1, '2018-01-12', '2018-01-17', 500, 100, 400, 800, '', 476576474),
(6, 1, 1, '2018-01-22', '2018-01-16', 800, 50, 750, 900, '', 8568586),
(7, 1, 1, '2018-01-11', '2018-01-10', 9000, 50, 8950, 10000, '', 767676767),
(8, 1, 1, '2018-01-10', '2018-01-22', 8000, 50, 7950, 9000, 'Available', 0),
(9, 1, 1, '2018-01-04', '2018-01-16', 900, 0, 900, 1000, 'Available', 121212),
(10, 1, 1, '2018-01-10', '2018-01-17', 90000, 0, 90000, 100000, 'Sold', 20202020),
(11, 2, 2, '2018-01-18', '2018-01-11', 6000, 50, 5950, 8000, 'Available', 121212),
(12, 2, 3, '2018-01-18', '2018-01-11', 6000, 50, 5950, 8000, 'Available', 212121),
(13, 2, 1, '2018-01-18', '2018-01-11', 6000, 50, 5950, 8000, 'Available', 123123),
(14, 3, 1, '2018-01-18', '2018-01-17', 9000, 0, 9000, 10000, 'Sold', 909090),
(15, 3, 2, '2018-01-18', '2018-01-17', 9000, 0, 9000, 10000, 'Sold', 898989),
(16, 3, 3, '2018-01-18', '2018-01-17', 9000, 0, 9000, 10000, 'Sold', 787878787);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `distributer_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(500) NOT NULL,
  `net_total_of_products` int(255) NOT NULL,
  `products_discount` int(255) NOT NULL,
  `discount_of_invoice` int(255) NOT NULL,
  `net_discount` int(255) NOT NULL,
  `net_total` int(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `amount_payable` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_invoice`
--

INSERT INTO `purchase_invoice` (`id`, `distributer_id`, `date`, `comment`, `net_total_of_products`, `products_discount`, `discount_of_invoice`, `net_discount`, `net_total`, `amount_paid`, `amount_payable`) VALUES
(3, 6, '2018-01-15', ' \r\n		third invoice			', 27000, 0, 100, 100, 26900, 26000, 900);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
