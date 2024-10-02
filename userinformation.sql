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
-- Table structure for table `userinformation`
--

DROP TABLE IF EXISTS `userinformation`;
CREATE TABLE IF NOT EXISTS `userinformation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `pic` varchar(225) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `que` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ans` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`id`, `username`, `userpass`, `name`, `city`, `pic`, `contact`, `type`, `dob`, `billingaddress`, `que`, `ans`, `status`) VALUES
(1, 'roger@gmail.com', '123', 'Akhilesh', 'Nawanshahr', 'uploads/64afb5dc01c0b2.12874034.jpg', '9876556789', 'Customer', ' 2023-07-08', '  Street No.19', 'What is your favourite colour?', 'black', 'Active'),
(3, 'nischay@gmail.com', '134', 'Nischay', 'Ludhiana', 'uploads/64afb6a8b06380.42936928.jpg', '9876667890', 'Customer', ' 2023-07-22', 'Street No.10', 'What is your favourite colour?', 'purple', 'Active'),
(4, 'taniya@gmail.com', '111', 'Taniya', 'Ludhiana', 'uploads/64afb70d4e7207.96373230.jpg', '9876556789', 'Customer', ' 2023-07-14', 'Street No.10', 'What is your favourite colour?', 'black', 'Active'),
(5, 'sunitarani007@gmail.com', '678', 'Sunita ', 'Nawanshahr', 'uploads/64afb7430a8be9.16321839.jpg', '9876556789', 'Customer', ' 2023-07-14', 'Street No.10', 'What is your favourite colour?', 'red', 'Active'),
(6, 'rogerakhilesh@gmail.com', '123', 'Akhil', 'Sharma', 'uploads/64b21ffceb3af5.59146440.png', '9463008090', 'Vendor', ' 1984-02-08', ' City Red Tape Shoes, Banga Road', 'What is your favourite colour?', 'Black', 'Active'),
(7, 'avni@gmail.com', '123', 'Avni', 'Ludhiana', 'uploads/64b220f166c800.15042027.jpg', '9876556789', 'Vendor', ' 2023-07-04', 'Street No.10', 'q1', 'boxy', 'Active'),
(8, 'reet@gmail.com', '123', 'Reet', 'Ludhiana', 'uploads/64b2228eb3f142.60259690.jpg', '9876556789', 'Customer', ' 2023-06-27', 'Street No.10', 'q1', 'boxy', 'Active'),
(9, 'shaina@gmail.com', '899', 'Shaina', 'Ludhiana', 'uploads/64b22385d34328.16960237.jpg', '9876556789', 'Customer', ' 2023-06-26', 'Street No.10', 'q2', 'SPS Jadla', 'Inactive'),
(10, 'pooja@gmail.com', '123', 'Pooja', 'Ludhiana', 'uploads/64b22a2f806af4.32332029.jpg', '9876556789', 'Customer', ' 2023-06-25', 'Street No.10', 'q1', 'boxy', 'Inactive'),
(11, 'sam@gmail.com', '333', 'Sam', 'Ludhiana', 'uploads/64b22b446c7dd7.83447721.jpg', '9876556789', 'Customer', ' 2023-06-28', 'Street No.10', 'q1', 'boxy', 'Active'),
(12, 'avinash@gmail.com', '123', 'Avinash', 'Ludhiana', 'uploads/64b22d561ecfc3.37783416.jpg', '9876556789', 'Customer', ' 2023-06-27', 'Street No.10', '1', 'black', 'Active'),
(13, 'manish@gmail.com', '888', 'Manish', 'Ludhiana', '', '9876556789', 'Customer', '2023-07-05', 'Street No.10', 'What is pet\'s name?', 'boxy', 'Inactive'),
(14, 'preet@gmail.com', '123', 'Preet', 'Ludhiana', '', '9876556789', 'Customer', '2023-06-26', 'Street No.10', 'What is pet\'s name?', 'boxy', 'Active'),
(15, 'babita@gmail.com', '998', 'Babita', 'Ludhiana', 'uploads/64b23115cca713.63633714.jpg', '9876556789', 'Vendor', '2023-07-01', 'Street No.10', 'What is your favourite colour?', 'pink', 'Active'),
(16, 'nancy@gmail.com', '098', 'Nancy', 'Ludhiana', 'uploads/64b2318948fdc8.66082067.jpg', '9876556789', 'Vendor', '2023-06-06', 'Street No.10', 'What is your first school\'s name?', 'sps jadla', 'Active'),
(17, 'vinay@gmail.com', '123', 'Vinay', 'Ludhiana', 'uploads/64b2326ddb9ef9.58890935.jpg', '9876556789', 'Customer', '2023-06-25', 'Street No.10', 'What is your pet\'s name?', 'boxy', 'Active'),
(21, 'navleen@gmail.com', '111', 'Navleen', 'Ludhiana', 'uploads/64be24f86878d4.33909823.jpg', '9876556789', 'Vendor', '2023-06-28', 'Street No.10', 'What is your favourite colour?', 'blue', 'Active'),
(20, 'navjot@gmail.com', '123', 'Navjot', 'Ludhiana', 'uploads/64be23fdbcb101.64177178.jpg', '9876556789', 'Customer', '2023-06-28', 'Street No.10', 'What is your favourite colour?', 'black', 'Active'),
(24, 'ra@gmail.com', '111', 'rr', 'Ludhiana', 'uploads/64bf81d942f166.90578073.jpg', '9876556789', 'Customer', '2023-06-29', 'Street No.10', 'What is your pet\'s name?', 'bocy', 'active'),
(25, 'diya@gmail.com', '789', 'Diya', 'Ludhiana', 'uploads/64c02190a95135.20604402.jpg', '9876556789', 'Customer', '2023-06-25', 'Street No.10', 'What is your favourite colour?', 'black', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
