-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 01:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '89c83fe2130ac25957d5928390c616f629492344');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `user_id`, `product_id`, `quantity`, `created`, `updated`) VALUES
(7, 53, 143, 2, '2016-06-21 00:36:38', '2016-06-21 00:36:38'),
(41, 62, 144, 2, '2016-06-23 00:11:17', '2016-06-23 00:11:17'),
(42, 62, 143, 1, '2016-06-23 00:11:23', '2016-06-23 00:11:23'),
(43, 62, 145, 2, '2016-06-23 00:11:29', '2016-06-23 00:11:29'),
(44, 29, 145, 1, '2016-07-04 13:56:01', '2016-07-04 13:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`, `description`) VALUES
(1, 'Electronics & Office', 0, 'mobile and official  use accessories    '),
(2, 'Movies,Music & Books', 0, 'for entertainment '),
(3, 'Home,Furniture & Patio', 0, 'many appliances...'),
(4, 'Apparel,Shop & Jewelry', 0, 'market .. cloth shop'),
(5, 'Baby & Kidss', 0, 'that,s for children.. '),
(7, 'Sports, Fitness & Outdoors ', 0, 'for ........'),
(8, 'Auto & Home Improvement', 0, 'for colors and home implementation '),
(9, 'Photos', 0, 'for designing purpose ..... '),
(10, 'Gifts, Craft & Party Supplies', 0, 'for events purpose......'),
(11, 'Grocery & Pets', 0, ' i don''t  know about this..'),
(12, 'Pharmacy, Health & Beauty', 0, 'for medical purpose..... and health is also'),
(36, 'Mobile', 1, 'ALL CELLPHONE SELECT HEAR ... '),
(37, 'Mobile Accessories', 1, 'all parts of related to mobile are available in this section.... '),
(38, 'Computer Accessories', 1, 'all parts related to computer laptop available in this section......'),
(39, 'Urban Outfitters Jewelry', 4, '2ergtdjn'),
(40, 'VEHICLE CARE', 8, 'grthyjhg'),
(41, 'Kitchen Essentials', 8, ''),
(42, 'Stationery ', 8, ''),
(43, 'Health & Beauty', 8, ''),
(44, 'All English  movie ', 2, 'All English movies'),
(45, 'All Hindi  movies ', 2, 'All Bollywood  movies'),
(46, 'Blu-ray ', 2, 'All blu-ray print'),
(47, 'PC Game', 5, ''),
(48, 'Die-Cast & Toy Vehicles', 5, ''),
(49, 'Men''s Grooming', 12, ''),
(50, 'Coffee, Tea & Beverages', 12, ''),
(51, 'All Health', 12, ''),
(52, 'Refurbished Mobiles', 1, ''),
(53, 'Small Animals Supplies', 11, ''),
(54, 'Fish & Aquatics', 11, ''),
(55, 'Invitations & Stationery', 10, ''),
(56, 'Bed and Bath', 3, ''),
(57, 'Lighting', 3, ''),
(58, 'Dining and Bar', 3, ''),
(59, 'Formal Shoes', 7, 'black ladder shoes are available,.... '),
(60, 'Frames Collage', 9, ''),
(61, 'Frame for wall', 9, ''),
(62, 'Digital photo frame', 9, ''),
(63, 'Networking & Internet Devices', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `images` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `images`) VALUES
(26, 143, 'image1_143_1465000754.jpg'),
(27, 143, 'image2_143_1465000755.png'),
(28, 143, 'image3_143_1465000755.jpg'),
(29, 144, 'image1_144_1465001067.jpg'),
(30, 144, 'image2_144_1465001067.jpg'),
(31, 144, 'image3_144_1465001068.jpg'),
(32, 145, 'image1_145_1465001264.png'),
(33, 145, 'image2_145_1465001264.jpg'),
(34, 145, 'image3_145_1465001264.jpg'),
(35, 146, 'image1_146_1465001392.jpg'),
(36, 146, 'image2_146_1465001393.png'),
(37, 146, 'image3_146_1465001393.jpg'),
(38, 147, 'image1_147_1465251912.jpg'),
(39, 147, 'image2_147_1465251912.jpg'),
(40, 147, 'image3_147_1465251912.jpg'),
(41, 148, 'image1_148_1465252108.jpg'),
(42, 148, 'image2_148_1465252108.jpg'),
(43, 148, 'image3_148_1465252108.jpg'),
(44, 149, 'image1_149_1465252262.jpeg'),
(45, 150, 'image1_150_1465252540.jpg'),
(46, 150, 'image2_150_1465252540.jpg'),
(47, 151, 'image1_151_1465255803.jpg'),
(48, 151, 'image2_151_1465255803.jpg'),
(49, 151, 'image3_151_1465255803.jpg'),
(50, 152, 'image1_152_1465256011.jpg'),
(51, 152, 'image2_152_1465256011.jpg'),
(52, 153, 'image1_153_1465515819.jpg'),
(53, 153, 'image2_153_1465515819.jpg'),
(54, 153, 'image3_153_1465515819.jpg'),
(55, 154, 'image1_154_1466120195.jpg'),
(56, 154, 'image2_154_1466120196.jpg'),
(57, 155, 'image1_155_1466549502.jpg'),
(58, 155, 'image2_155_1466549503.jpg'),
(59, 155, 'image3_155_1466549503.jpg'),
(60, 156, 'image1_156_1466550069.jpg'),
(61, 156, 'image2_156_1466550069.jpg'),
(62, 156, 'image3_156_1466550069.jpg'),
(63, 157, 'image1_157_1466624538.jpg'),
(64, 158, 'image1_158_1466642172.jpg'),
(65, 159, 'image1_159_1466642221.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `phone_number` varchar(50) DEFAULT NULL,
  `verification_code` int(11) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unitprice` int(8) NOT NULL,
  `quantity` int(100) NOT NULL,
  `discount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `unitprice`, `quantity`, `discount`) VALUES
(1, 1, 143, 0, 1, 0),
(2, 2, 143, 0, 1, 0),
(3, 3, 144, 0, 1, 0),
(4, 4, 144, 0, 1, 0),
(5, 5, 145, 0, 1, 0),
(6, 6, 143, 0, 1, 0),
(7, 7, 143, 0, 1, 0),
(8, 8, 144, 0, 1, 0),
(9, 9, 145, 0, 1, 0),
(10, 10, 143, 0, 1, 0),
(11, 11, 143, 0, 1, 0),
(12, 12, 143, 0, 1, 0),
(13, 13, 143, 0, 1, 0),
(14, 14, 144, 0, 1, 0),
(15, 15, 143, 0, 1, 0),
(16, 16, 143, 0, 1, 0),
(17, 17, 143, 0, 1, 0),
(18, 18, 143, 0, 1, 0),
(19, 19, 143, 0, 1, 0),
(20, 20, 143, 0, 1, 0),
(21, 21, 143, 0, 1, 0),
(22, 22, 143, 0, 1, 0),
(23, 23, 143, 0, 1, 0),
(24, 25, 143, 0, 1, 0),
(25, 26, 143, 0, 1, 0),
(26, 27, 143, 0, 1, 0),
(27, 28, 143, 0, 1, 0),
(28, 29, 143, 0, 1, 0),
(29, 30, 144, 0, 1, 0),
(30, 31, 145, 0, 1, 0),
(31, 32, 146, 0, 1, 0),
(32, 33, 144, 0, 1, 0),
(33, 34, 146, 0, 1, 0),
(34, 35, 145, 0, 1, 0),
(35, 36, 144, 0, 1, 0),
(36, 37, 144, 0, 1, 0),
(37, 38, 145, 0, 1, 0),
(38, 39, 146, 0, 1, 0),
(39, 40, 144, 0, 1, 0),
(40, 41, 145, 0, 1, 0),
(41, 42, 145, 0, 1, 0),
(42, 43, 145, 0, 1, 0),
(43, 44, 145, 0, 1, 0),
(44, 45, 144, 0, 1, 0),
(45, 46, 144, 0, 1, 0),
(46, 47, 144, 0, 1, 0),
(47, 48, 150, 0, 1, 0),
(48, 49, 149, 0, 1, 0),
(49, 50, 143, 0, 1, 0),
(50, 51, 144, 0, 1, 0),
(51, 52, 146, 0, 1, 0),
(52, 53, 146, 0, 1, 0),
(53, 54, 146, 0, 1, 0),
(54, 55, 146, 0, 1, 0),
(55, 56, 143, 0, 1, 0),
(56, 57, 144, 0, 1, 0),
(57, 58, 144, 0, 1, 0),
(58, 59, 143, 0, 1, 0),
(59, 60, 146, 0, 1, 0),
(60, 61, 158, 0, 1, 0),
(61, 62, 143, 0, 1, 0),
(62, 63, 143, 0, 1, 0),
(63, 64, 147, 0, 1, 0),
(64, 66, 150, 0, 1, 0),
(65, 67, 144, 0, 1, 0),
(66, 69, 144, 0, 1, 0),
(67, 70, 144, 0, 2, 0),
(68, 71, 143, 0, 2, 0),
(69, 71, 144, 0, 1, 0),
(70, 71, 145, 0, 1, 0),
(71, 71, 146, 0, 1, 0),
(72, 71, 147, 0, 1, 0),
(73, 71, 151, 0, 1, 0),
(74, 71, 158, 0, 1, 0),
(75, 72, 143, 0, 1, 0),
(76, 72, 144, 0, 1, 0),
(77, 72, 159, 0, 1, 0),
(78, 73, 159, 0, 1, 0),
(79, 74, 147, 0, 1, 0),
(80, 75, 145, 0, 1, 0),
(81, 76, 143, 0, 1, 0),
(82, 76, 144, 0, 1, 0),
(83, 76, 145, 0, 1, 0),
(84, 76, 146, 0, 1, 0),
(85, 76, 147, 0, 1, 0),
(86, 77, 143, 0, 1, 0),
(87, 78, 150, 600, 1, 0),
(88, 79, 156, 280, 3, 0),
(89, 80, 157, 699, 3, 0),
(90, 81, 150, 600, 2, 0),
(91, 82, 146, 20000, 1, 0),
(92, 83, 146, 20000, 1, 0),
(93, 84, 145, 5200, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ordernumber` varchar(200) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `orderdate`, `ordernumber`, `status`) VALUES
(1, 7, '2016-06-22 15:37:14', '5ef42c949bbc889a913539286a83f777', 'Pending'),
(2, 7, '2016-06-22 15:40:47', '9eeebf1136ace118ec74363aa5a1843f', 'Pending'),
(3, 1, '2016-06-22 16:11:40', '24608a63924f41dcbe8a356a2f602b00', 'Pending'),
(4, 30, '2016-06-22 16:13:52', '997edb37c4eb765f49625348c99cbb0d', 'Pending'),
(5, 30, '2016-06-22 16:55:50', 'b5f9048ee1b9604446ac7b81eb7f163f', 'Pending'),
(6, 29, '2016-06-22 17:10:49', '79d18061106343b4f0e307cd699c302b', 'Pending'),
(7, 29, '2016-06-22 17:17:49', '561bc19ae5126f89854e08693ed3d006', 'Pending'),
(8, 29, '2016-06-22 17:17:57', 'cce7c76ae47e97a14e56c7b33452f3ae', 'Pending'),
(9, 29, '2016-06-22 17:18:07', '6e8a80687b0bfe21dc8c05b4dd65a374', 'Pending'),
(10, 29, '2016-06-22 17:18:15', '49fbb442953615d538180644808e44fb', 'Pending'),
(11, 29, '2016-06-22 17:18:29', 'ea8d467e805b2db03a0e34883ad17c15', 'Pending'),
(12, 29, '2016-06-22 17:18:57', '79a881c98f36254de3e0075da0d32903', 'Pending'),
(13, 29, '2016-06-22 17:20:44', '714df5cb038a57b9592a943e4b4786d7', 'Pending'),
(14, 29, '2016-06-22 17:21:20', '41ee109cea2385f8f3af8cc8e95773ec', 'Pending'),
(15, 29, '2016-06-22 17:21:27', '375726ca6f4542addd2e0efdb7927b63', 'Pending'),
(16, 29, '2016-06-22 17:21:54', 'ef234bc07130d9df1658c71ec51b936c', 'Pending'),
(17, 29, '2016-06-22 17:28:58', '42b9ad55db9c908619b8b3373257c518', 'Pending'),
(18, 29, '2016-06-22 17:29:07', '9da65511cf049d0c93cbbe3314ced878', 'Pending'),
(19, 29, '2016-06-22 17:33:25', '932f3425ad6ad83d2fbb7585fe923a71', 'Pending'),
(20, 29, '2016-06-22 17:33:42', '76542afcfabd11358ef42f78a49af103', 'Pending'),
(21, 29, '2016-06-22 17:35:38', '6c39a0a15f8b453fda3e480c0a8f716f', 'Pending'),
(22, 29, '2016-06-22 17:35:39', 'df5ae46af967fc715009e06aa72c4d96', 'Pending'),
(23, 29, '2016-06-22 17:35:40', 'a70240b90e2775cf298f81525a529f4f', 'Pending'),
(25, 29, '2016-06-22 17:35:41', 'ebb8fa2c49f141cc90bc576c1e0338df', 'Pending'),
(26, 29, '2016-06-22 17:35:43', '58c485dcf722f852c83e39bd94e8c0ac', 'Pending'),
(27, 29, '2016-06-22 17:35:44', 'b3f7e9b8fa79cabbdccfd7e255121f02', 'Pending'),
(28, 29, '2016-06-22 17:35:52', 'e555dde9cc4841f32e5f42fee469ed0b', 'Pending'),
(29, 29, '2016-06-22 17:38:58', 'f70d6aa3cc2072ec3a7b93c53479b8b7', 'Pending'),
(30, 29, '2016-06-22 17:58:46', '3334e055c103a413d8242fa6d3c465a1', 'Pending'),
(31, 29, '2016-06-22 17:59:26', '79734d1fabb262a684b82ab35089ac9f', 'Pending'),
(32, 29, '2016-06-22 17:59:31', '29ac8192d3fad3dce2661e0de43df72c', 'Pending'),
(33, 29, '2016-06-22 17:59:38', 'f6831b9642f564ee7dfb035bdd704255', 'Pending'),
(34, 29, '2016-06-22 18:00:56', '81056b3f5d9a9c9902e2ad75ba584289', 'Pending'),
(35, 29, '2016-06-22 18:01:11', '8c67d0677ebb3f088dc56b766b688785', 'Pending'),
(36, 29, '2016-06-22 18:01:15', 'b93e4be630b9333d2ab8881078abe58d', 'Pending'),
(37, 29, '2016-06-22 18:03:54', 'b145d4a846543be310e13fa939b8edf4', 'Pending'),
(38, 29, '2016-06-22 18:03:58', '7716386f30c7f6e10b4ed717c19d711e', 'Pending'),
(39, 29, '2016-06-22 18:04:01', '54dfb41fd6a3b10b1662b765d85dd952', 'Pending'),
(40, 33, '2016-06-22 18:07:24', '6bc94817166314ee420a638beccbb045', 'Pending'),
(41, 30, '2016-06-22 18:14:18', 'd276ee0a089dceb440a374a6956569e7', 'Pending'),
(42, 33, '2016-06-22 18:16:21', 'd6840f8831b8dbf75c54967ca96e237a', 'Pending'),
(43, 7, '2016-06-23 10:20:17', '16181264', 'Pending'),
(44, 7, '2016-06-23 10:46:42', '91683258', 'Pending'),
(45, 7, '2016-06-23 10:48:40', '71305025', 'Pending'),
(46, 31, '2016-06-23 10:52:18', '18388662', 'Pending'),
(47, 29, '2016-06-23 10:59:24', '81339899', 'Pending'),
(48, 29, '2016-06-23 13:20:29', '62494982', 'Pending'),
(49, 29, '2016-06-23 13:20:32', '52813897', 'Pending'),
(50, 29, '2016-06-23 13:51:42', '42177539', 'Pending'),
(51, 29, '2016-06-23 13:51:50', '70252913', 'Pending'),
(52, 29, '2016-06-23 13:51:56', '72501749', 'Pending'),
(53, 29, '2016-06-23 13:52:11', '20875858', 'Pending'),
(54, 29, '2016-06-23 13:52:25', '49487407', 'Pending'),
(55, 29, '2016-06-23 13:52:30', '63798128', 'Pending'),
(56, 29, '2016-06-23 14:14:07', '51782975', 'Pending'),
(57, 29, '2016-06-23 17:57:38', '16752850', 'Pending'),
(58, 29, '2016-06-23 17:57:43', '80503698', 'Pending'),
(59, 29, '2016-06-23 17:59:57', '94784461', 'Pending'),
(60, 29, '2016-06-24 16:40:31', '53766537', 'Pending'),
(61, 29, '2016-06-24 16:42:06', '73465760', 'Pending'),
(62, 29, '2016-06-28 11:27:58', '93394582', 'Pending'),
(63, 29, '2016-06-28 11:28:07', '36574603', 'Pending'),
(64, 31, '2016-06-29 12:47:02', '44666133', 'Pending'),
(65, 31, '2016-06-29 12:59:44', '23257668', 'Pending'),
(66, 31, '2016-06-29 13:05:39', '62503337', 'Pending'),
(67, 31, '2016-06-29 13:06:49', '32855458', 'Pending'),
(68, 31, '2016-06-29 13:07:09', '72677385', 'Pending'),
(69, 31, '2016-06-29 13:13:07', '28831074', 'Pending'),
(70, 31, '2016-06-29 13:13:53', '99340421', 'Pending'),
(71, 29, '2016-06-29 14:39:16', '56518786', 'Pending'),
(72, 29, '2016-06-29 14:43:12', '43874187', 'Pending'),
(73, 29, '2016-06-29 14:45:33', '89741002', 'Pending'),
(74, 32, '2016-06-29 14:55:16', '23701632', 'Pending'),
(75, 31, '2016-06-29 14:56:50', '74952217', 'Pending'),
(76, 32, '2016-06-29 14:58:04', '13951929', 'Pending'),
(77, 29, '2016-06-29 18:28:22', '27148342', 'Pending'),
(78, 44, '2016-06-30 16:55:38', '16407883', 'Pending'),
(79, 38, '2016-06-30 17:01:17', '13093892', 'Pending'),
(80, 31, '2016-06-30 17:03:20', '20978237', 'Pending'),
(81, 38, '2016-06-30 17:06:02', '38562471', 'Pending'),
(82, 29, '2016-07-01 10:20:46', '82270192', 'Pending'),
(83, 29, '2016-07-01 10:21:15', '79269224', 'Pending'),
(84, 29, '2016-07-04 17:26:07', '90095435', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('Active','Unactive','Deleted') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`, `created`, `updated`) VALUES
(1, 'About us', 'eShopKart ; is a mobile application.\r\n Just use it and fulfill your all requirements.', 'Active', '2016-06-02 16:52:04', '0000-00-00 00:00:00'),
(2, 'Terms & Condition', 'This application is run only on IOS operating system. ', 'Active', '2016-06-02 16:58:36', '0000-00-00 00:00:00'),
(3, 'Privacy', '', 'Active', '2016-06-02 17:16:38', '0000-00-00 00:00:00'),
(4, 'customer support', 'kloudrac software pvt. ltd. E-155, Basement Sector-63, Noida U.P. 201301,India\r\n\r\n101 California Street Suite 2710 San Francisco CA 94111 ', 'Active', '2016-07-04 17:02:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ammount` decimal(12,2) NOT NULL,
  `discount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_number` varchar(200) DEFAULT NULL,
  `product_description` varchar(700) DEFAULT NULL,
  `unitsinstock` int(100) DEFAULT NULL,
  `unitsonorder` int(11) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `unitprice` int(8) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_number`, `product_description`, `unitsinstock`, `unitsonorder`, `colour`, `unitprice`, `status`) VALUES
(143, 36, 'Nokia, e63', 'noke6366kia', 'Qwerty keypad,Full Multimedia set', 2, 9, '', 3500, 'available'),
(144, 36, 'Nokia, lumia 730', 'noklum730iaia', 'Full touch screen, RAm:1gb,Processor:1.5ghz', 985, 3, '', 7000, 'available'),
(145, 36, 'Samsung galaxy s7', 'samgals79851sungaxy', 'Samsung galaxy full touch screen mobile phone discount on 30%', 6779, 7, '', 5200, 'pending'),
(146, 36, 'iphone 7', 'iph7987234one3', 'new i phone with new updated mac os', 89, 2, '', 20000, 'available'),
(147, 45, 'Housfull-3', 'hous3xtuyiop2345full2', 'new 2016 comedy and romance movie director: frha khan  ', 123, 0, '', 300, 'available'),
(148, 44, 'The Hobbite', 'thehobb12345yu45bite', 'new 2016 Hollywood movie, ', 154, 0, '', 500, 'available'),
(149, 38, 'Quantum Qhm222', 'quantum45678qhm222', NULL, 16756, 1, '', 350, 'available'),
(150, 38, 'Logitech K230 Wireless Keyboard', 'logitechK230tyu4678899', NULL, 7900, 0, '', 600, 'available'),
(151, 63, 'TP-LINK TL-WR841N 300Mbps Wireless N Router', 'TPLINKWR841N0300M', NULL, 3455, 2, '', 800, 'available'),
(152, 46, 'Bajrangi Bhaijaan', 'bajrangi677889bhaijaan', NULL, 1564, 0, '', 350, 'available'),
(153, 47, 'GTA10.6', 'gta106sundr98', NULL, 6, 4, '', 1270, 'available'),
(155, 47, 'conrta', 'cont123468ra', 'contra is a fighting game...', 178, 0, '', 1460, 'available'),
(156, 50, 'brush', 'brus123456hh', 'brush is a  test ............coffee', 78, 0, '', 280, 'available'),
(157, 58, 'rishi jaykar', '54265w4yh', '345gfvbsdvb25 b2y4vy1', 2147483647, 0, '', 34544456, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `token_id` varchar(200) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `address`, `mobile`, `token_id`, `created`, `updated`, `status`, `code`) VALUES
(1, 'Admin', 'Ad', 'min', 'Admin@gmail.com', '89c83fe2130ac25957d5928390c616f629492344', '', '86659197655', '', '2016-05-13 06:53:20', '2016-07-05 01:46:51', 1, ''),
(2, 'julious ceaser', 'julious', 'ceaser', 'julious@gmail.com', '123456', '', '8665919345', 'a76fdeea6bb835a6e78935434d971a41', '2016-05-13 07:02:25', '2016-05-13 07:02:25', 1, ''),
(6, 'bob ramze', 'bob', 'ramze', 'bob@gmail.com', '123456', '', '876591964', 'af134720dd7358b1a0a4c01459b2427a', '2016-05-16 02:34:11', '2016-05-16 02:34:11', 1, ''),
(7, 'Tom Ramze', 'Tom', 'Ramze', 'tom@gmail.com', '123456', '', '876591698', '55cd99466abf56981df75709255e4f31', '2016-05-16 02:42:07', '2016-05-16 02:42:08', 1, ''),
(11, ' fghj', NULL, 'fghj', 'arrishi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '234567898', '54c66a62f0ee90a06dacaf1b2a647b94', '2016-06-04 03:27:15', '2016-06-04 03:27:19', 1, ''),
(13, 'kamlesh kumar', 'kamlesh', 'kumar', 'kkumar@kloudrac.com', 'e10adc3949ba59abbe56e057f20f883e', '', '9582491764', '515890e4d45eb7541244fa8b5950083e', '2016-06-04 03:49:31', '2016-06-04 03:49:35', 1, ''),
(16, 'humtum', NULL, NULL, 'a@gmail.com', '89c83fe2130ac25957d5928390c616f629492344', '', '', '1b34b5993d6fad305caf3cfaa28f338d', '0000-00-00 00:00:00', '2016-06-10 09:16:31', 1, ''),
(28, NULL, 'rewygwhtgdf', 'ertyuirysrthiio', 'rishikush2@gmail.com', '89c83fe2130ac25957d5928390c616f629492344', '', '9899806162', NULL, '2016-06-10 02:42:10', '2016-06-23 04:54:39', 1, ''),
(29, 'Hemendra Singh', 'Hemendra', 'Singh', 'hsingh@kloudrac.com', '89c83fe2130ac25957d5928390c616f629492344', '', '9871627592', '75f0a0351efc34193870f2427c7ab430', '2016-06-21 02:34:19', '2016-07-04 08:14:03', 1, '477932'),
(30, 'sanjay singh', 'sanjay', 'singh', 'jaykarrishi@gmail.com', 'd76b3834815cce724f0a735801b8e67655a8b073', '', '9087654321', '30fd7c7d3ef93bde41f93da82708ca95', '2016-06-22 03:13:31', '2016-06-22 09:47:47', 1, '637989'),
(31, 'rewygwhtgdf erty', 'rewygwhtgdf', 'erty', 'rk.skushawha@gmail.com', '89c83fe2130ac25957d5928390c616f629492344', '', '9899806162', 'd4b0df0e24d92ca7cd714b9782703a5e', '2016-06-30 15:16:15', '2016-06-30 15:16:16', 1, ''),
(32, 'Hemendra Singh', 'Hemendra', 'Singh', 'hsingh@gmail.com', '89c83fe2130ac25957d5928390c616f629492344', '', '9871627592', '', '2016-07-04 16:26:30', '2016-07-04 17:29:39', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ordernumber` (`ordernumber`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_number` (`product_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
