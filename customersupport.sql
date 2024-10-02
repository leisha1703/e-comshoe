-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 08:33 AM
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
-- Table structure for table `customersupport`
--

DROP TABLE IF EXISTS `customersupport`;
CREATE TABLE IF NOT EXISTS `customersupport` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `message` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(255) NOT NULL,
  `reply` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customersupport`
--

INSERT INTO `customersupport` (`id`, `firstname`, `lastname`, `username`, `city`, `state`, `zip`, `questions`, `message`, `status`, `reply`) VALUES
(1, 'Leisha', 'Lakhanpal', 'leisha@gmail.com', 'Nawanshar', 'Punjab', '144515', 'Why do I see different prices for the same product?', 'Hi', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(11, 'Taniya', 'Sharma', 'taniya@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Is installation offered for all products?', 'Hi. I was ', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(2, 'Loveleen', 'Aggarwal', 'loveleen@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Is it necessary to have an account to shop on Flipkart?', 'I am unabl', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(12, 'Suman', 'Kumari', 'su@gmail.com', 'Banga', 'Punjab', '144514', 'Is it necessary to have an account to shop on GoShop?', 'Unable to ', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(13, 'Tanvi', 'Lakhanpal', 'tanvi@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Can I get the refund if I am not satisfied?', 'Hi..I am u', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(14, 'Poonam', 'Lakhanpal', 'poonam@gmail.com', 'Nawanshahr', 'Punjab', '144515', 'Is it necessary to have an account to shop on GoShop?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(15, 'Aisha', 'Singh', 'aisha@gmail.com', 'Nawanshahr', 'Punjab', '144515', 'Why do I see different prices for the same product?', 'Hi', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(16, 'Naveen', 'Sharma', 'naveen@gmail.com', 'Jalandhar', 'Punjab', '141001', 'Didn’t receive any mail or confirmation regarding the Order just made, can I get it again?', 'Hi', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(17, 'Abhishek', 'Sharma', 'abhi@gmail.com', 'Delhi', 'Haryana', '141001', 'Is installation offered for all products?', 'Hi', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(18, 'Vinayak ', 'Lakhanpal', 'vi', '', '', '', 'Can I get the refund if I am not satisfied?', '', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(19, 'Vinayak ', 'Lakhanpal', 'vinayaklakhanpal@gmail.com', '', '', '', 'Can I get the refund if I am not satisfied?', '', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(20, 'Vinayak ', 'Lakhanpal', 'vinayak@gmail.com', 'Nawanshahr', 'Punjab', '144515', 'Can I get the refund if I am not satisfied?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(27, 'Pawan', 'Kumar', 'pawan@gmail.com', 'Nawanshahr', 'Punjab', '141001', 'Is it necessary to have an account to shop on GoShop?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(21, 'Lovely', 'Lakhanpal', 'lovely@gmail.com', 'Nawanshahr', 'Punjab', '144515', 'Is it necessary to have an account to shop on GoShop?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(22, 'Sourav', 'Verma', 'sourav@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Why do I see different prices for the same product?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(23, 'Isha', 'Sharma', 'rashmi@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Can I get the refund if I am not satisfied?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(24, 'Nisha', 'Sharma', 'nisha@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Do sellers on GoShop ship internationally?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(25, 'Rashmi', 'Verma', 'rashmi@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Is it necessary to have an account to shop on GoShop?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(26, 'Prerna', 'Malhan', 'prerna@gmail.com', 'New Delhi', 'Punjab', '141001', 'Why do I see different prices for the same product?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(28, 'Prisha', 'Thakur', 'pri@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Can I get the refund if I am not satisfied?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(29, 'Jiya ', 'Sharma', 'jiya@gmail.com', 'Nawanshahr', 'Punjab', '144514', 'Why do I see different prices for the same product?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(30, 'Manisha', 'Verma', 'manisha@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Didn’t receive any mail or confirmation regarding the Order just made, can I get it again?', 'HI..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(31, 'Sai', 'Dass', 'taniya@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Can I get the refund if I am not satisfied?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(32, '', '', '', '', '', '', '', '', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(33, 'Sai', 'Dass', 'taniya@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Can I get the refund if I am not satisfied?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.'),
(34, 'Alka', 'Sharma', 'alka@gmail.com', 'Ludhiana', 'Punjab', '141001', 'Why do I see different prices for the same product?', 'Hi..', 'Completed', 'Thank you for your query. Your issue has been resolved.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
