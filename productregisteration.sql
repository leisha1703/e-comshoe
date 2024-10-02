-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 08:42 AM
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
-- Table structure for table `productregisteration`
--

DROP TABLE IF EXISTS `productregisteration`;
CREATE TABLE IF NOT EXISTS `productregisteration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendoruserid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `itembrand` varchar(255) NOT NULL,
  `itemprice` varchar(255) NOT NULL,
  `itemimage` varchar(255) NOT NULL,
  `vendorbillingaddress` varchar(3000) NOT NULL,
  `itemtype` varchar(255) NOT NULL,
  `itemdescription` varchar(3000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `otherinfo` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productregisteration`
--

INSERT INTO `productregisteration` (`id`, `vendoruserid`, `itemname`, `itembrand`, `itemprice`, `itemimage`, `vendorbillingaddress`, `itemtype`, `itemdescription`, `status`, `otherinfo`) VALUES
(1, 'rogerakhilesh@gmail.com', 'Branded Shoes', '', '600', 'uploads/64b2ff1973d951.00307338.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', '	\nPower by Bata Men\'s Black Running Shoes', 'Active', 'This pair of black running shoes from Power by Bata is definitely a boon for people who love to run. The upper is made of premium quality mesh that ensures maximum comfort to ...'),
(2, 'avni@gmail.com', 'Bata Shoes', 'Bata', '220', 'uploads/64b30329acd692.27850261.jpg', 'Street No.10', 'Men', 'Bata Boys Lace Derby Shoes', 'Active', 'Character Is None. Sole Material Is Rubber. Size Is 13. Ideal For Is Boys. Heel Height Is Less Than 1 Inch. Brand Color Is Black. Primary Color Is Black. Outer Material Is ...'),
(3, 'avni@gmail.com', 'Branded Shoes', 'Nike', '350', 'uploads/64b3042b0e4683.77219328.jpg', 'Street No.10', 'Women', 'NANike Air Huarache Run Ultra \'Black White\' (SNKR/Wallace) 819685-016 US 10', 'Active', 'Outer Material : leather Inner Material : leather Sole Material : TPR Shoe Type : Sports Shoes Age Range Description: Adult; Water Resistance Level: Not Water Resistant; Style ...'),
(4, 'rogerakhilesh@gmail.com', 'Branded Shoes', 'Nike', '600', 'uploads/64b304691ae705.97515671.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Nike Slip on Softy Blue Sneaker', 'Inactive', 'Look effortlessly stylish by wearing this pair of Casual Shoes featuring an eye-catching design and a refined appeal. A perfect choice to flaunt a classy style wherever you go.'),
(7, 'rogerakhilesh@gmail.com', 'CLYMB', 'Nike', '600', 'uploads/64b304691ae705.97515671.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Mesh Running/Walking Shoes/Outdoor Ultra Lightweight Eva Sneakers Running Shoes For Men  (Brown)', 'Active', 'Mesh Running/Walking Shoes/Outdoor Ultra Lightweight Eva Sneakers Running Shoes For Men  (Brown)'),
(8, 'rogerakhilesh@gmail.com', 'HOTSTYLE', 'Adidas', '340', 'uploads/64b2ff1973d951.00307338.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Trendy & Stylish Running Shoes For Men  (Black)', 'Active', 'Special PriceGet extra 38% off (price inclusive of cashback/coupon'),
(9, 'rogerakhilesh@gmail.com', 'Nobelite ', 'Nike', '300', 'uploads/64b30329acd692.27850261.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Running Sports Latest Stylish Casual Lace up lightweight black walking gym Casuals For Men  (Black)\r\n', 'Active', 'Running Sports Latest Stylish Casual Lace up lightweight black walking gym Casuals For Men  (Black)\r\n'),
(10, 'rogerakhilesh@gmail.com', 'BIRDE ', 'Adidas', '550', 'uploads/64b3042b0e4683.77219328.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'New Design Lightweight Stylish and Trendy walking shoes Walking Shoes For Men  (Green)\n', 'Active', 'New Design Lightweight Stylish and Trendy walking shoes Walking Shoes For Men  (Green)\r\n'),
(11, 'rogerakhilesh@gmail.com', 'BIRDE', 'Bata', '670', 'uploads/64b3042b0e4683.77219328.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Premium Sports Shoes for Men Walking Shoes For Men  (Grey)\r\n', 'Active', 'Premium Sports Shoes for Men Walking Shoes For Men  (Grey)\r\n'),
(12, 'rogerakhilesh@gmail.com', 'RapidBox', 'Bata', '330', 'uploads/64b2ff1973d951.00307338.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Sneakers For Men  (White)', 'Active', 'Sneakers For Men  (White)'),
(13, 'rogerakhilesh@gmail.com', 'Nobelite ', 'Adidas', '900', 'uploads/64b304691ae705.97515671.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Casuals For Men', 'Inactive', 'Casuals For Men'),
(14, 'rogerakhilesh@gmail.com', 'Airson ', 'Bata', '600', 'uploads/64b30329acd692.27850261.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Sports shoes for men|Stylish Casual sport shoes for men |running shoes for boys Outdoors For Men  ', 'Active', 'Sports shoes for men|Stylish Casual sport shoes for men |running shoes for boys Outdoors For Men  '),
(17, 'rogerakhilesh@gmail.com', 'aadi ', 'Nike', '500', 'uploads/64b650c0ac0598.12099479.jpg', 'City Red Tape Shoes, Banga Road.', 'Women', 'Synthetic| Lightweight| Premiun| Comfort| Summer Tendy| Outdoor| Loafer Loafers For Men  (Black)\n', 'Active', 'Synthetic| Lightweight| Premiun| Comfort| Summer Tendy| Outdoor| Loafer Loafers For Men  (Black)\r\n'),
(18, 'rogerakhilesh@gmail.com', 'Adidas shoes', 'Adidas', '700', 'uploads/64b763795fb3b8.83460027.jpg', 'City Red Tape Shoes, Banga Road.', 'Women', 'ADIDAS Cririse V2 Cricket Shoes For Women', 'Inactive', 'ADIDAS Cririse V2 Cricket Shoes For Women'),
(19, 'babita@gmail.com', 'Nobelite ', 'Nike', '650', 'uploads/64b7978d2bfe21.79098886.jpg', 'Street No.10', 'Men', 'Lightweight,Comfort,Summer,Trendy,Walking,Outdoor,Stylish,Training,Daily Use Sneakers', 'Active', 'Lightweight,Comfort,Summer,Trendy,Walking,Outdoor,Stylish,Training,Daily Use Sneakers'),
(20, 'rogerakhilesh@gmail.com', 'Adidas Men\'s Leather Formal Shoes', 'Adidas', '3000', 'uploads/64bf55a04bde05.20881520.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'Package Dimensions ‏ : ‎ 34.54 x 20.83 x 12.7 cm; 950 Grams\r\nDate First Available ‏ : ‎ 14 October 2015\r\nManufacturer ‏ : ‎ Genesis International Limited\r\nASIN ‏ : ‎ B016MSBAFW\r\nItem part number ‏ : ‎ RTR0091A\r\nDepartment ‏ : ‎ mens\r\nManufacturer ‏ : ‎ Genesis International Limited\r\nItem Weight ‏ : ‎ 950 g\r\nNet Quantity ‏ : ‎ 1.00 Set\r\nGeneric Name ‏ : ‎ uniform dress shoe', 'Active', 'NA'),
(21, '', 'Adidas shoes', 'Adidas', '800', 'uploads/64c00ee5b3ac85.99606771.jpg', '', 'Men', 'na', 'Inactive', 'na'),
(22, '', 'Nike shoes', 'Nike', '900', 'uploads/64c00f406d02f3.87832546.jpg', '', 'Men', 'NA', 'Inactive', 'NA'),
(23, '', 'Nobelite ', 'Nike', '400', 'uploads/64c01003101114.08124713.jpg', '', 'Men', 'NA', 'Inactive', 'NA'),
(24, 'rogerakhilesh@gmail.com', 'Bata Shoes', 'Bata', '800', 'uploads/64c0106603ebf0.83339478.jpg', 'City Red Tape Shoes, Banga Road.', 'Men', 'na', 'Active', 'na'),
(25, 'rogerakhilesh@gmail.com', 'Bata Shoes', 'Bata', '400', 'uploads/64c396da1e9ce1.56859793.jpg', ' City Red Tape Shoes, Banga Road', 'Men', 'na', 'Active', 'na');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
