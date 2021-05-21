-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2021 at 02:14 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_unique`) VALUES
(1, 'تيوبات رياضيه', 'sport-tubes'),
(2, 'تيوبات تعليميه', 'learn-tubes'),
(3, 'تيوبات ترفيهيه', 'fun-tubes'),
(4, 'تيوبات ثقافيه', 'culture-tube');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `video_id`, `comment`, `commDate`) VALUES
(54, 4, 2, 'اغنيه جميله وحلوه', '2021-05-20 16:20:45'),
(55, 1, 6, 'تجربه تعليق', '2021-05-20 16:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `username` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `username`, `message`, `date`) VALUES
(7, 'me_m52@yahoo.com', 'medo', 'تجربه ارسال رساله', '2021-05-19 14:39:08'),
(6, 'ali@yahoo.com', 'ali', 'اشكركم جدا علي توفير هذه الخاصيه للتعبير وارسال رسائل لكم', '2021-05-18 10:14:37');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_Admin`) VALUES
(1, 'محمد', 'ابراهيم', 'medo@yahoo.com', 'a2f621f4b3dac46f8ef3dd901179b9cf', 1),
(5, 'سامح', 'ياسر', 'sameh@yahoo.com', 'd93a5def7511da3d0f2d171d9c344e91', 0),
(4, 'ساره', 'احمد', 'sara@yahoo.com', '6116afedcb0bc31083935c1c262ff4c9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(100) NOT NULL,
  `videoLink` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `link`, `image`, `description`, `category`, `videoLink`, `views`) VALUES
(2, 1, 'النفخة الكدابة - علي كاكولي', 'https://www.youtube.com/watch?v=PhX4nWfUpWo', 'post58f5f2b5dfa7c.jpg', 'كلمات الأغنية:\r\nطب كنت فين يا لأ لما لما أنا قلت آه \r\nوكنت فين يا عقلي لما لما مشيت وراه \r\nبعد لما فقت لقيت الموت بجد أرحم، من إني أعيش لو ثانية وحدة كمان معاه. \r\nهيقول ارجع لو عشان سبتو مش ناقصة كآبة \r\nفي ناس تمسك فيك لما تكون هيا المتسابة \r\nنافخ نفسه وعلى ايه وعليه \r\nليه نافش ريشو\r\nهبعد عنو عنو ما بق من النفخة الكدابة \r\nمع مرور الوقت عرفت عرفت اني نجيت \r\nأول ما خدت بعضي أنا وبعيد بعيد مشيت \r\nده  أنا أكبر مقلب خدتو كان في حياتي هو\r\nده كان كابوس والحمد لله إني خلاص صحيت', 3, 'khBec15uiCc', 9),
(6, 4, 'أفضل كورس مجاني تعليمي شوبيفاي للمبتدئين2021 - كيفية إنشاء متجر دروبشيبينغ بدون أموال', 'https://www.youtube.com/watch?v=8tveG6nUZLU', 'post58f5f2b5dfa7c.jpg', 'هذا الكورس يتضمن :\r\n\r\n\r\n  دراسة السوق الإلكتروني و أنواع المتاجر فى شوبيفاى \r\n البناء  موقع و متجر إلكتروني علي شوبيفاي\r\nكيفية اختيار أسم المتجر أو الدوماين \"domain\" \r\nشرح مفصل عن متجر الشوبيفاي من ال \"أ\" إلي ال \"ي\"\r\n- تعديلات المتجر\r\n- الخصومات المنتج والعملاء\r\n- إدارة المتجر و ثغراته من لوحة القيادة\r\n- تحليلات المتجر بالتفصيل و إضافة منتجات .\r\n- إختيار الشعار المخصص\r\n- عرض المنتج و مزاياه\r\n- ملاحظات العميل علي المنتج\r\n- إنشاء علامة تجارية مميزة\r\n- كتابة محتوي قوي و موثوق\r\n- إنشاء حمايات للمستهلك\r\n- مدونات للمنتج\r\n- احسن التطبيقات المستخدمة في المتجر\r\n- تسعير المنتج.\r\n- إنشاء صفحة علي الفيس بوك و الإنستجرام مميزه\r\n- فيس بوك بيكسل و جوجل اناليتيكس.\r\nتسويق عبر المؤثرين و كيف تبحث عن المؤثرين عبر الإنستاجرام و كيف تبحث عن المؤثرين عبر ', 2, '8tveG6nU5sd5', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
