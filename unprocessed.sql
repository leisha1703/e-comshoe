-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 08:43 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `unprocessed`
--

DROP TABLE IF EXISTS `unprocessed`;
CREATE TABLE IF NOT EXISTS `unprocessed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customerid` varchar(255) NOT NULL,
  `vendorid` varchar(255) NOT NULL,
  `itemimage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `orderid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `unprocessed`
--

INSERT INTO `unprocessed` (`id`, `customerid`, `vendorid`, `itemimage`, `itemname`, `qty`, `price`, `status`, `orderid`) VALUES
(59, 'roger@gmail.com', 'babita@gmail.com', 'uploads/64b7978d2bfe21.79098886.jpg', 'Nobelite ', '1', '650', 'Processed', 'ke4TCjkKRqqQcFj'),
(58, 'roger@gmail.com', 'rogerakhilesh@gmail.com', 'uploads/64b2ff1973d951.00307338.jpg', 'Branded Shoes', '1', '600', 'Delivered', 'ke4TCjkKRqqQcFj'),
(61, 'roger@gmail.com', 'avni@gmail.com', 'uploads/64b3042b0e4683.77219328.jpg', 'Branded Shoes', '1', '350', 'Delivered', 'ke4TCjkKRqqQcFj'),
(71, 'roger@gmail.com', 'rogerakhilesh@gmail.com', 'uploads/64b304691ae705.97515671.jpg', 'CLYMB', '1', '600', 'Unprocessed', 'MZQyMXVxz3450jd'),
(64, 'nischay@gmail.com', 'avni@gmail.com', 'uploads/64b30329acd692.27850261.jpg', 'Bata Shoes', '1', '220', 'Dispatched', 'mHqn1lwMYJM12MH'),
(65, 'nischay@gmail.com', 'rogerakhilesh@gmail.com', 'uploads/64b304691ae705.97515671.jpg', 'Branded Shoes', '1', '600', 'Delivered', 'mHqn1lwMYJM12MH'),
(67, 'nischay@gmail.com', 'avni@gmail.com', 'uploads/64b30329acd692.27850261.jpg', 'Bata Shoes', '1', '220', 'Dispatched', 'Z9tFAFEldQ6QAVK'),
(73, 'roger@gmail.com', 'rogerakhilesh@gmail.com', 'uploads/64c396da1e9ce1.56859793.jpg', 'Bata Shoes', '1', '400', 'Delivered', 'bd3YGWG6xFo6pud'),
(72, 'roger@gmail.com', 'avni@gmail.com', 'uploads/64b30329acd692.27850261.jpg', 'Bata Shoes', '1', '220', 'Delivered', 'TQYIRg93wUQsUKh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
