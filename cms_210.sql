-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2021 at 12:23 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_210`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_unique` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_unique`) VALUES
(1, 'تيوبات رياضيه', 'sport-tubes'),
(2, 'تيوبات تعليميه', 'learn-tubes'),
(3, 'تيوبات ترفيهيه', 'fun-tubes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_Admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_Admin`) VALUES
(1, 'mohamed', 'ibrahiem', 'medo@yahoo.com', 'a2f621f4b3dac46f8ef3dd901179b9cf', 1),
(2, 'ali', 'hamed', 'ali@yahoo.com', '6116afedcb0bc31083935c1c262ff4c9', 0),
(3, 'sara', 'mohamed', 'sara@yahoo.com', '6116afedcb0bc31083935c1c262ff4c9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(100) NOT NULL,
  `videoLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `image`, `description`, `category`, `videoLink`) VALUES
(13, 'Create Simple Shopping Cart using PHP & MySql', 'https://www.youtube.com/watch?v=0wYSviHeRbs&t=997s', 'image60987c2c46709.png', 'If you are looking for video tutorial on how to make simple shopping care using PHP with Mysql. In this video tutorial I have show you how to display product on web page, how to add item to shopping cart and how to remove item from shopping cart by using PHP programming language with Mysql database.', 2, '2770jz0v88j0'),
(14, 'كيفية بناء متجر إلكتروني على الووردبريس - متجر ووكومرس', 'https://www.youtube.com/watch?v=S20doQPCLns', 'image60987c7533a42.png', 'يستعرض الفيديو كيفية بناء متجر إلكتروني على الووردبريس - متجر ووكومرس، وتعتبر هذه الخطوة رئيسية لكثير ممن يرغبون بالدخول لمجال التجارة الإلكترونية، حيث يستطيع التاجر بعد الإنتهاء من متابعته للفيديو من بناء متجر إلكتروني متكامل قادر على اتمام عمليات بيع للعملاء بالمناطق التي يرغب بها ، يشرح الفيديو بالتفصيل كيفية إنشاء متجر إلكتروني في ووردبريس وكيفية تصميم متجر الكتروني خطوة بخطوة مع الكثير من النصائح الخاصة بالسيو وتسريع الموقع لضمان الحصول من المبيعات.', 2, '1m52u8t0nhit');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
