-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2022 at 12:35 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modifyinggallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(30) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_username`, `admin_password`) VALUES
(1001, 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `item_id`) VALUES
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_contact_no` varchar(12) NOT NULL,
  `customer_username` varchar(30) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_email`, `customer_contact_no`, `customer_username`, `customer_password`) VALUES
(1, 'Mokshith Gowda', 'Bangalore', 'projectmicrotech@gmail.com', '9876543210', 'admin', 'admin'),
(2, 'Mokshith Gowda', 'Bangalore', 'projectmicrotech@gmail.com', '9876543210', 'admin', 'admin'),
(3, 'Mokshith Gowda', 'Bangalore', 'projectmicrotech@gmail.com', '9876543210', 'admin', 'sdmi'),
(4, 'Mokshith Gowda', 'Bangalore', 'projectmicrotech@gmail.com', '98765642310', 'admin', 'gkyg');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

DROP TABLE IF EXISTS `dealer`;
CREATE TABLE IF NOT EXISTS `dealer` (
  `dealer_id` int NOT NULL AUTO_INCREMENT,
  `dealer_name` varchar(30) NOT NULL,
  `dealer_address` text NOT NULL,
  `dealer_email` varchar(30) NOT NULL,
  `dealer_contact_no` varchar(12) NOT NULL,
  `dealer_username` varchar(30) NOT NULL,
  `dealer_password` varchar(30) NOT NULL,
  PRIMARY KEY (`dealer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealer_id`, `dealer_name`, `dealer_address`, `dealer_email`, `dealer_contact_no`, `dealer_username`, `dealer_password`) VALUES
(1, 'Mokshith Gowda', 'Bangalore', 'projectmicrotech@gmail.com', '9876543210', 'admin', 'admin'),
(2, 'Mokshith Gowda', 'Bangalore', 'projectmicrotech@gmail.com', '9876543210', 'admin', 'uyguy');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE IF NOT EXISTS `favourites` (
  `favourite_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`favourite_id`),
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`favourite_id`, `customer_id`, `item_id`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `feedback_from` varchar(30) NOT NULL,
  `feedback_subject` varchar(30) NOT NULL,
  `feedback_message` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_from`, `feedback_subject`, `feedback_message`) VALUES
(1, 'Test', 'Test', 'Test\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) NOT NULL,
  `item_cost` int NOT NULL,
  `image_loc` text NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_cost`, `image_loc`) VALUES
(2, 'Sample', 123, '../itemimages/nLJcm7X6umservice-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `item_id` int NOT NULL,
  `invoice_number` varchar(30) NOT NULL,
  `amount` int NOT NULL,
  `status` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `item_id`, `invoice_number`, `amount`, `status`, `datetime`) VALUES
(1, 1, 2, 'PF9EZX3NCU', 0, 'ORDER DELIVERED', '0000-00-00 00:00:00'),
(2, 1, 2, 'PF9EZX3NCU', 0, 'ORDER DELIVERED', '0000-00-00 00:00:00'),
(3, 1, 2, 'FQSZSFKR3X', 0, 'ORDER CANCELLED', '0000-00-00 00:00:00'),
(4, 1, 2, 'FQSZSFKR3X', 0, 'ORDER CANCELLED', '0000-00-00 00:00:00'),
(5, 1, 2, 'FQSZSFKR3X', 0, 'ORDER CONFIRMED', '0000-00-00 00:00:00'),
(6, 1, 2, 'ZLH1XTONUP', 0, 'ORDER CONFIRMED', '0000-00-00 00:00:00'),
(7, 1, 2, 'NNPR5I7VD9', 123, 'ORDER CONFIRMED', '0000-00-00 00:00:00'),
(8, 1, 2, '3ERBIQVI88', 123, 'ORDER CONFIRMED', '0000-00-00 00:00:00'),
(9, 1, 2, 'QRIAR1SOMX', 123, 'ORDER CONFIRMED', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `invoice_number` varchar(30) NOT NULL,
  `amount` int NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `invoice_number`, `amount`, `status`) VALUES
(1, 1, 'PF9EZX3NCU', 0, 'ORDER CONFIRMED'),
(2, 1, 'FQSZSFKR3X', 0, 'ORDER CONFIRMED'),
(3, 1, 'FQSZSFKR3X', 0, 'ORDER CONFIRMED'),
(4, 1, 'FQSZSFKR3X', 0, 'ORDER CONFIRMED'),
(5, 1, 'ZLH1XTONUP', 0, 'ORDER CONFIRMED'),
(6, 1, 'NNPR5I7VD9', 123, 'ORDER CONFIRMED'),
(7, 1, '3ERBIQVI88', 123, 'ORDER CONFIRMED'),
(8, 1, 'QRIAR1SOMX', 123, 'TXN_SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

DROP TABLE IF EXISTS `service_booking`;
CREATE TABLE IF NOT EXISTS `service_booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `service_type` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `request` text NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`booking_id`, `customer_id`, `service_type`, `date`, `status`, `request`) VALUES
(1, 1, 'Car wash', '2022-06-27', 'SERVICE COMPLETED', 'Test'),
(2, 1, 'Car wash', '2022-06-28', 'BOOKING CANCELLED', 'asefq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
