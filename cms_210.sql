-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2021 at 07:28 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `video_id`, `comment`, `commDate`) VALUES
(23, 2, 14, 'محتوي قيم ومفيد', '2021-05-12 12:52:25'),
(14, 1, 14, 'جيد جداا', '2021-05-11 23:07:35'),
(34, 1, 19, 'favorite sports', '2021-05-12 16:45:12');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `username`, `message`, `date`) VALUES
(4, 'mohamedelfert19@hotmail.com', 'mohamed', 'تجربه رساله', '2021-05-18 09:50:56'),
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
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `image`, `description`, `category`, `videoLink`, `views`) VALUES
(13, 'Create Simple Shopping Cart using PHP & MySql', 'https://www.youtube.com/watch?v=0wYSviHeRbs&t=997s', 'image60987c2c46709.png', 'If you are looking for video tutorial on how to make simple shopping care using PHP with Mysql. In this video tutorial I have show you how to display product on web page, how to add item to shopping cart and how to remove item from shopping cart by using PHP programming language with Mysql database.', 2, '2770jz0v88j0', 81),
(14, 'كيفية بناء متجر إلكتروني على الووردبريس - متجر ووكومرس', 'https://www.youtube.com/watch?v=S20doQPCLns', 'image60987c7533a42.png', 'يستعرض الفيديو كيفية بناء متجر إلكتروني على الووردبريس - متجر ووكومرس، وتعتبر هذه الخطوة رئيسية لكثير ممن يرغبون بالدخول لمجال التجارة الإلكترونية، حيث يستطيع التاجر بعد الإنتهاء من متابعته للفيديو من بناء متجر إلكتروني متكامل قادر على اتمام عمليات بيع للعملاء بالمناطق التي يرغب بها ، يشرح الفيديو بالتفصيل كيفية إنشاء متجر إلكتروني في ووردبريس وكيفية تصميم متجر الكتروني خطوة بخطوة مع الكثير من النصائح الخاصة بالسيو وتسريع الموقع لضمان الحصول من المبيعات.', 2, '1m52u8t0nhit', 86),
(15, 'Simple Shopping Cart using PHP & MySql-2019', 'https://www.youtube.com/watch?v=6OAnZzCJFCk', 'image609908c985b68.png', 'shopping cart using PHP with Mysql. In this video tutorial, I have show you how to display product on a web page, how to add an item to shopping cart and how to remove an item from shopping cart by using PHP programming language with Mysql database.', 2, '45yhul0b5yh5', 17),
(16, 'النفخة الكدابة - علي كاكولي', 'https://www.youtube.com/watch?v=PhX4nWfUpWo', 'image609912030615b.jpg', 'كلمات الأغنية:\r\nطب كنت فين يا لأ لما لما أنا قلت آه \r\nوكنت فين يا عقلي لما لما مشيت وراه \r\nبعد لما فقت لقيت الموت بجد أرحم، من إني أعيش لو ثانية وحدة كمان معاه. \r\nهيقول ارجع لو عشان سبتو مش ناقصة كآبة \r\nفي ناس تمسك فيك لما تكون هيا المتسابة \r\nنافخ نفسه وعلى ايه وعليه \r\nليه نافش ريشو\r\nهبعد عنو عنو ما بق من النفخة الكدابة \r\nمع مرور الوقت عرفت عرفت اني نجيت \r\nأول ما خدت بعضي أنا وبعيد بعيد مشيت \r\nده  أنا أكبر مقلب خدتو كان في حياتي هو\r\nده كان كابوس والحمد لله إني خلاص صحيت', 3, '734buf8iigz', 120),
(17, 'إزاي عملت مكتب كمبيوتر للشغل والجيمينج', 'https://www.youtube.com/watch?v=tuFnILixhNk', 'image609912557a9e0.jpg', 'كفريلانسر بقضي وقت كتير جدًا على الكمبيوتر، في الفيديو دا هوريكم ازاي عملت المكتب دا بأماكن تخزين كتيرة بحيث يكون المكتب فاضي ومعليهوش كراكيب كتير\r\n', 3, '3tglqpdptsgl', 21),
(18, 'Full-Time Scenes As Manchester City Defeat PSG To Reach First Champions League Final!', 'https://www.youtube.com/watch?v=OE5JU0bUaIk', 'image609913040a87c.jpg', 'Manchester City defeat PSG 4-1 on aggregate to reach the Champions League final for the very first time.\r\n', 1, 'bymridkni10', 6),
(19, 'All Sports Trick Shots | Dude Perfect', 'https://www.youtube.com/watch?v=bIDKhZ_4jLQ', 'image6099134849555.jpg', 'Trick shots from all your favorite sports!\r\n', 1, '2aay6a4m6tzc', 9),
(20, 'عملت حاجات مجنونة بالطابعة ثلاثية الأبعاد | 3D Printer !', 'https://www.youtube.com/watch?v=zJ4NVSvQi2o', 'image609a6520031b2.jpg', 'عملت حاجات مجنونة بالطابعة ثلاثية الأبعاد | 3D Printer !\r\n', 3, '3spguaion4w', 27),
(21, 'ازاى تجمع جهازك', 'https://www.youtube.com/watch?v=DvVMojkL6JQ', 'image609a662589f55.png', 'ازاى تجمع جهازك مع عمر عبد الرحيم ؟ بدون حرق', 3, '4aw93qpskkrp', 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
