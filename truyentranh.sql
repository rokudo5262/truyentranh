-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 11, 2020 lúc 08:18 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `truyentranh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `name_admin` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `gmail_admin` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password_admin` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `gmail_admin`, `password_admin`) VALUES
(1, 'Trịnh Quang Trường', 'rokudo5262@gmail.com', '01227711951');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `alternative`
--

DROP TABLE IF EXISTS `alternative`;
CREATE TABLE IF NOT EXISTS `alternative` (
  `id_alternative` int(11) NOT NULL AUTO_INCREMENT,
  `name_alternative` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_alternative`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `alternative`
--

INSERT INTO `alternative` (`id_alternative`, `name_alternative`, `id_book`) VALUES
(1, 'Naruto Shippuden', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id_artist` int(11) NOT NULL AUTO_INCREMENT,
  `name_artist` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_artist`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `artist`
--

INSERT INTO `artist` (`id_artist`, `name_artist`) VALUES
(1, 'Kishimoto Masashi'),
(2, 'Obata takeshi'),
(3, 'Kubo Tite'),
(4, 'Mashima Hiro'),
(5, 'Katsura Hoshino'),
(6, 'Nishikida Keishi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist_book`
--

DROP TABLE IF EXISTS `artist_book`;
CREATE TABLE IF NOT EXISTS `artist_book` (
  `id_artist` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_artist`,`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `artist_book`
--

INSERT INTO `artist_book` (`id_artist`, `id_book`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name_author` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`id_author`, `name_author`) VALUES
(1, 'Kishimoto Masashi'),
(2, 'Ohba tsugumi'),
(3, 'Kubo Tite'),
(4, 'Mashima Hiro'),
(5, 'Katsura Hoshino'),
(6, 'Kuraishi yuu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author_book`
--

DROP TABLE IF EXISTS `author_book`;
CREATE TABLE IF NOT EXISTS `author_book` (
  `id_author` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_author`,`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `author_book`
--

INSERT INTO `author_book` (`id_author`, `id_book`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `name_book` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `img_book` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `realease_book` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `summary_book` varchar(9999) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id_book`, `name_book`, `img_book`, `realease_book`, `summary_book`, `id_status`, `id_type`, `id_team`) VALUES
(1, 'Naruto', '1.jpg', '1999', 'Twelve years ago, the powerful Nine-Tailed Demon Fox attacked the ninja village of Konohagakure the village hidden in the leaves. The demon was defeated and sealed into the infant Naruto Uzumaki, by the Fourth Hokage who sacrificed his life to protect the village. Now, Naruto is the number one most Unpredictable knuckleheaded ninja who’s determined to become the next Hokage and be acknowledged by everyone who ever doubted him! From cool fights showing what it really means to be a ninja to fights for things they believe in to hairbrained fun and jokes naruto’s adventures have got it all! With the will to never give up and a great left hook along with his ninja way: to never go back on his word, will Naruto the former outcast achieve his dream?', 1, 1, 1),
(2, 'Naruto Gaiden: The Seventh Hokage', '2.jpg', '2015', 'A spin-off sequel mini-series of the Naruto and part of the grand master plan of Masashi Kishimoto’s “Naruto Shin Jidai Kaimaku Project“ (Naruto’s New Era Opening Project). The mini-series stars the next generation of young ninja, including Boruto Uzumaki, who is the son of Naruto Uzumaki, the Seventh Hokage of the Hidden Leaf Village.', 1, 1, 1),
(3, 'Death Note', '3.jpg', '2004', 'An overachieving 12th grader, Yagami Light is an aspiring young man who seems destined for success. Unfortunately, his daily habits bore his incredible intelligence--So when a strange black notebook falls from the heavens during his class, it isn’t long before he takes it for himself. In his room, he finds, to his horror/fascination, that the Death Note is real, and owned by Ryuk, a Shinigami (Death God). Any person’s name written in the Death Note will die in 40 seconds.... without fail. With this supposed gift of God, Light swears upon his grave that he will ’cleanse’ the world of the evil and needless people that inhabit it, thus creating a utopia for all. With the world’s greatest detective, L, hot on his tail, will Light’s ideals prove too fantastic to realize, or will he succeed bringing justice?', 1, 1, 1),
(4, 'Bleach', '4.jpg', '2001', 'Ichigo Kurosaki has always been able to see ghosts, but this ability doesn’t change his life nearly as much as his close encounter with Rukia Kuchiki, a Soul Reaper and member of the mysterious Soul Society. While fighting a Hollow, an evil spirit that preys on humans who display psychic energy, Rukia attempts to lend Ichigo some of her powers so that he can save his family; but much to her surprise, Ichigo absorbs every last drop of her energy. Now a full-fledged Soul Reaper himself, Ichigo quickly learns that the world he inhabits is one full of dangerous spirits, and along with Rukia--who is slowly regaining her powers--it’s Ichigo’s job to protect the innocent from Hollows and help the spirits themselves find peace. In 2005, Bleach was awarded the Shogakukan Manga Award in the Shounen category.', 1, 1, 1),
(5, 'Fairy Tail', '5.jpg', '2006', 'A young celestial mage, Lucy Heartfilia, runs away from home and travels to the land of Fiore to join the magical Fairy Tail Guild. Along the way, she meets Natsu Dragneel, a teenage boy looking for his foster parent, a dragon named Igneel, with his best friend, Happy the cat. Shortly after their meeting, Lucy is abducted by Bora of Prominence, who was posing as Salamander of Fairy Tail, to be sold as a slave. Natsu rescues her and reveals that he is the real Salamander of fairy tail and has the skills of a Dragon Slayer, an ancient fire magic. He offers her membership into the guild, which she gladly accepts, they along with Erza Scarlet -Armored maiden, Gray Fullbuster -Ice Maker, and Happy become a team performing various missions offered to the Fairy Tail guild. Fairy Tail won the 2009 Kodansha Manga Award for shounen manga. It has also won The Society for the Promotion of Japanese Animation’s Industry Awards for best comedy manga.', 1, 1, 1),
(6, 'D.Gray-man', '6.jpg', '2004', 'D.Gray-man follows the adventures of 15-year-old Allen Walker, whose left arm can transform into a monstrous claw and destroy akuma, evolving machines created by the Millennium Earl to help him destroy humanity. As ordered by his master General Cross Marian, Allen becomes an Exorcist, people who can destroy akuma, for the Black Order, an organization attempting to stop the Earl. He becomes a powerful asset for the Order because he can detect disguised akuma with his left eye. Allen is sent to recover pieces of Innocence, a substance that gives certain people, called Exorcists, the ability to destroy akuma. The Earl decides to call together the Noah Family, superhuman descendants of Noah who can destroy Innocence. Both sides start the search for the Great Heart, the most powerful piece of Innocence that will assure victory to the side that finds it.', 1, 1, 1),
(7, 'Wagatsuma-san wa Ore no Yome', '7.jpg', '2011', 'Aoshima Hitoshi is a second year student in high school, who wishes he had a girlfriend. One day he wakes up for an unknown reason 10 years in the future, and he is married to the prettiest girl in school, Wagatsuma Ai! How has their relationship grown from mere acquaintances to husband and wife!?', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `id_chapter` int(11) NOT NULL AUTO_INCREMENT,
  `number_chapter` int(11) NOT NULL,
  `name_chapter` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `date_chapter` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_chapter`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`id_chapter`, `number_chapter`, `name_chapter`, `date_chapter`, `id_book`) VALUES
(1, 1, 'Uzumaki Naruto!!', '2020-01-01 17:26:47', 1),
(2, 2, 'Konohamaru!!', '2020-01-02 17:26:47', 1),
(3, 3, 'Uchiha Sasuke!!', '2020-01-03 17:26:47', 1),
(4, 4, 'Hatake Kakashi!!', '2020-01-04 17:26:47', 1),
(5, 5, 'Unpreparedness is One\'s Greatest Enemy!!', '2020-01-05 17:26:47', 1),
(6, 6, 'Only for Sasuke...!!', '2020-01-06 17:26:47', 1),
(7, 7, 'Kakashi\'s Conclustion', '2020-01-07 17:26:47', 1),
(8, 8, 'And That\'s Why You\'re Disqualified!!', '2020-01-08 17:26:47', 1),
(9, 9, 'The Worst Client', '2020-01-08 17:27:47', 1),
(10, 10, 'The Second Critter', '2020-01-08 17:29:47', 1),
(11, 11, 'Disembarking...!!', '2020-01-08 17:30:47', 1),
(12, 12, 'This is the End!!', '2020-01-08 19:35:23', 1),
(13, 13, 'I\'m a Ninja!!', '2020-01-08 19:35:24', 1),
(14, 14, 'A Secret Plan...!!', '2020-01-08 19:35:59', 1),
(15, 15, 'The Sharingan Revived!!', '2020-01-08 19:36:00', 1),
(16, 16, 'Who Are You?!', '2020-01-08 19:37:27', 1),
(17, 17, 'Preparing for Battle!!', '2020-01-08 19:37:28', 1),
(18, 18, 'The Training Commences', '2020-01-08 19:38:35', 1),
(19, 19, 'A Symbol of Courage', '2020-01-08 19:39:29', 1),
(20, 20, 'The Country that Had a Hero...!!', '2020-01-08 19:39:51', 1),
(21, 21, 'Encounter in the Forest...!!', '2020-01-08 19:53:08', 1),
(22, 22, 'A Rival Appears!!', '2020-01-08 19:53:30', 1),
(23, 23, 'Two Assaults...!!', '2020-01-08 19:54:32', 1),
(24, 24, 'Speed!!', '2020-01-09 23:23:52', 1),
(25, 25, 'For the Sake of Dreams...!!', '2020-01-09 23:24:10', 1),
(26, 26, 'The Sharingan Crumbles...!!', '2020-01-09 23:24:23', 1),
(27, 27, 'Awakening...!!', '2020-01-09 23:24:42', 1),
(28, 28, 'Nine-Tails...!!', '2020-01-09 23:25:00', 1),
(29, 29, 'Important People...!!', '2020-01-09 23:25:21', 1),
(30, 30, 'Your Future is...!!', '2020-01-09 23:25:36', 1),
(31, 31, 'Everyone\'s Respective Battles...!!', '2020-01-09 23:25:48', 1),
(32, 32, 'The Tool Named Shinobi', '2020-01-09 23:26:17', 1),
(33, 33, 'The Hero\'s Bridge!!', '2020-01-09 23:26:30', 1),
(34, 34, 'Intruders?', '2020-01-09 23:26:46', 1),
(35, 35, 'Iruka vs. Kakashi?!', '2020-01-09 23:27:04', 1),
(36, 36, 'Sakura\'s Depression!!', '2020-01-09 23:27:19', 1),
(37, 37, 'The Worst Compatibility...!!', '2020-01-09 23:31:25', 1),
(38, 38, 'Start...!!', '2020-01-09 23:31:42', 1),
(39, 39, 'The Challengers!!', '2020-01-09 23:31:54', 1),
(40, 40, 'The First Exam', '2020-01-09 23:32:06', 1),
(41, 41, 'The Whisper of Demons...!?', '2020-01-09 23:32:25', 1),
(42, 42, 'Everyone\'s Respective Battles...!!', '2020-01-09 23:32:37', 1),
(43, 43, 'The Tenth Question...!!', '2020-01-09 23:34:40', 1),
(44, 44, 'The Natures Tested for...!!', '2020-01-09 23:34:53', 1),
(45, 45, 'The Second Exam', '2020-01-09 23:35:06', 1),
(46, 46, 'The Password is...', '2020-01-09 23:35:20', 1),
(47, 47, 'Predator!!', '2020-01-09 23:35:31', 1),
(48, 48, 'The Target is...!!', '2020-01-09 23:43:19', 1),
(49, 49, 'Coward...!!', '2020-01-09 23:43:35', 1),
(50, 50, 'I\'ve Got to...!!', '2020-01-09 23:43:46', 1),
(51, 51, 'Beauty is the Beast!!', '2020-01-09 23:44:00', 1),
(52, 52, 'The Principles of Use!!', '2020-01-09 23:44:12', 1),
(53, 53, 'Sakura\'s Decision!!', '2020-01-09 23:48:34', 1),
(54, 54, 'Sakura and Ino', '2020-01-09 23:48:53', 1),
(55, 55, 'No Holds Barred!!', '2020-01-09 23:49:04', 1),
(56, 56, 'The Strength That is Given...!!', '2020-01-09 23:49:17', 1),
(57, 57, 'Ten Hours Earlier', '2020-01-09 23:49:29', 1),
(58, 58, 'Witnesses...!!', '2020-01-09 23:49:39', 1),
(59, 59, 'The Tragedy of the Sand!!', '2020-01-09 23:49:53', 1),
(60, 60, 'The Last Chance...!!', '2020-01-09 23:50:04', 1),
(61, 61, 'The Path You Should Tread...!!', '2020-01-09 23:50:18', 1),
(62, 62, 'Trapped Like Rats!', '2020-01-09 23:54:06', 1),
(63, 63, 'One More Face', '2020-01-09 23:54:34', 1),
(64, 64, 'Lord Hokage\'s Message...!!', '2020-01-09 23:54:47', 1),
(65, 65, 'Life-and-Death Battles!!', '2020-01-09 23:55:07', 1),
(66, 66, 'Sakura\'s Advice', '2020-01-09 23:55:25', 1),
(67, 67, 'Unholy Gifts!', '2020-01-09 23:56:49', 1),
(68, 68, 'Blood of the Uchiha', '2020-01-09 23:57:00', 1),
(69, 69, 'The Deadly Visitor!!', '2020-01-09 23:57:14', 1),
(70, 70, 'The One Who Dies!!', '2020-01-09 23:57:25', 1),
(71, 71, 'The Insurmountable Wall...!!', '2020-01-09 23:57:46', 1),
(72, 72, 'Rivals...!!', '2020-01-09 23:58:02', 1),
(73, 73, 'A Declaration of Defeat...?!', '2020-01-09 23:59:42', 1),
(74, 74, 'The Sixth Round Match, and Then...!!', '2020-01-09 23:59:55', 1),
(75, 75, 'Naruto\'s Coming-of-Age...!!', '2020-01-10 00:00:05', 1),
(76, 76, 'Kiba Turns the Tables... and So Does Naruto?!', '2020-01-10 00:00:20', 1),
(77, 77, 'Naruto\'s Clever Scheme!', '2020-01-10 00:00:37', 1),
(78, 78, 'Neji and Hinata', '2020-01-10 00:00:51', 1),
(79, 79, 'The Hyuga Clan', '2020-01-10 00:01:11', 1),
(80, 80, 'The Outer Limits', '2020-01-10 00:01:21', 1),
(81, 81, 'Gaara Versus..', '2020-01-10 00:01:33', 1),
(82, 82, 'Lee\'s Secret!!', '2020-01-10 00:02:06', 1),
(83, 83, 'The Ultimate Defense... Crumbles?!', '2020-01-10 00:02:21', 1),
(84, 84, 'The Genius of Hard Work...!!', '2020-01-10 00:02:32', 1),
(85, 85, 'Now, of All Times...!!', '2020-01-10 00:02:52', 1),
(86, 86, 'A Splendid Ninja...!!', '2020-01-10 00:03:04', 1),
(87, 87, 'The Preliminaries... Completed!!', '2020-01-10 00:03:17', 1),
(88, 88, 'What About Sasuke...?!', '2020-01-10 00:07:56', 1),
(89, 89, 'Naruto\'s Wish...!!', '2020-01-10 00:08:13', 1),
(90, 90, 'What About My Training?!', '2020-01-10 00:08:26', 1),
(91, 91, 'Make Me Your Disciple?!', '2020-01-10 00:08:42', 1),
(92, 92, 'Konoha. vs. Sound vs. Sand', '2020-01-10 00:09:05', 1),
(93, 93, 'Impassioned Efforts... Each and Every One!!', '2020-01-10 00:09:18', 1),
(94, 94, 'The Key...!!', '2020-01-10 00:09:30', 1),
(95, 95, 'A Chance Encounter...!!', '2020-01-10 00:09:44', 1),
(96, 96, 'The Unexpected Visitor!!', '2020-01-10 00:10:07', 1),
(97, 97, 'My Reason for Living...!!', '2020-01-10 00:10:21', 1),
(98, 98, 'The Proud Failure!', '2020-01-10 00:10:36', 1),
(99, 99, 'The Finals Commence...!!', '2020-01-10 00:10:48', 1),
(100, 100, 'Prepared to Lose...!!', '2020-01-10 00:10:59', 1),
(101, 101, 'The Other...!!', '2020-01-10 00:13:01', 1),
(102, 102, 'The Caged Bird...!!', '2020-01-10 00:13:14', 1),
(103, 103, 'The Failure!!', '2020-01-10 00:13:26', 1),
(104, 104, 'The Power to Change...!!', '2020-01-10 00:15:44', 1),
(105, 105, 'The Great Flight!!', '2020-01-10 00:15:57', 1),
(106, 106, 'Sasuke Forfeits...?!', '2020-01-10 00:16:19', 1),
(107, 107, 'The Boy with No Fighting Spirit!!', '2020-01-10 00:17:09', 1),
(108, 108, 'A Plot Within a Plot...?!', '2020-01-10 00:17:22', 1),
(109, 109, 'Tree Leaves, Dancing...!!', '2020-01-10 23:52:21', 1),
(110, 110, 'At Long Last...!!', '2020-01-10 23:52:40', 1),
(111, 111, 'Sasuke vs. Gaara!!', '2020-01-10 23:52:50', 1),
(112, 112, 'Sasuke\'s Taijutsu...!!', '2020-01-10 23:53:00', 1),
(113, 113, 'The Reason He Was Late...!!', '2020-01-10 23:53:11', 1),
(114, 114, 'Violent Assault...!!', '2020-01-10 23:53:22', 1),
(115, 115, 'The Chûnin Exam, Concluded...!!', '2020-01-10 23:53:33', 1),
(116, 116, 'Operation Destroy Konoha...!!', '2020-01-10 23:53:46', 1),
(117, 117, 'The Imparted Mission...!!', '2020-01-10 23:54:00', 1),
(118, 118, 'Detainment...!!', '2020-01-10 23:54:20', 1),
(119, 119, 'The Life I Wanted...!!', '2020-01-10 23:54:33', 1),
(120, 120, 'Hokage vs. Hokage!!', '2020-01-10 23:54:44', 1),
(121, 121, 'The Terrible Experiment...!!', '2020-01-10 23:54:55', 1),
(122, 122, 'The Bestowed Will!!', '2020-01-10 23:58:30', 1),
(123, 123, 'The Final Seal', '2020-01-10 23:58:42', 1),
(124, 124, 'The Eternal Battle...!!', '2020-01-10 23:58:57', 1),
(125, 125, 'The Time of Awakening...!!', '2020-01-10 23:59:15', 1),
(126, 126, 'Off Guard...!!', '2020-01-10 23:59:30', 1),
(127, 127, 'To Feel Alive...!!', '2020-01-11 00:14:21', 1),
(128, 128, 'Exceeding One\'s Limits...!!', '2020-01-11 00:14:35', 1),
(129, 129, 'To Hurt...!!', '2020-01-11 00:14:51', 1),
(130, 130, 'Love...!!', '2020-01-11 00:15:25', 1),
(131, 131, 'The Name Gaara...!!', '2020-01-11 00:21:22', 1),
(132, 132, 'The Two... Darkness and Light', '2020-01-11 00:21:37', 1),
(133, 133, 'Those Who Are Strong...!!', '2020-01-11 00:21:47', 1),
(134, 134, 'Naruto\'s Ninja Handbook!', '2020-01-11 00:22:13', 1),
(135, 135, 'The Gale-Like Battle...!!', '2020-01-11 00:22:29', 1),
(136, 136, 'The Last Blow...!!', '2020-01-11 00:35:48', 1),
(137, 137, 'The Shinobi of Konoha...!!', '2020-01-11 00:36:07', 1),
(138, 138, 'Operation Destroy Konoha, Terminated!!', '2020-01-11 00:36:21', 1),
(139, 139, 'Eulogy...!!', '2020-01-11 00:37:23', 1),
(140, 140, 'Contact...!!', '2020-01-11 00:37:45', 1),
(141, 141, 'Uchiha Itachi!!', '2020-01-11 00:37:57', 1),
(142, 142, 'Kakashi vs. Itachi', '2020-01-11 00:38:10', 1),
(143, 143, 'The Fourth Hokage\'s Legacy!!', '2020-01-11 00:38:23', 1),
(144, 144, 'The Pursuers', '2020-01-11 00:38:37', 1),
(145, 145, 'Memories of Despair', '2020-01-11 00:38:54', 1),
(146, 146, 'Along with Hatred...!!', '2020-01-11 00:39:11', 1),
(147, 147, 'It\'s My Fight!', '2020-01-11 00:43:05', 1),
(148, 148, 'Itachi\'s Power!!', '2020-01-11 00:43:17', 1),
(149, 149, 'The Legendary...!!', '2020-01-11 00:43:28', 1),
(150, 150, 'Training Begins...?!', '2020-01-11 00:43:40', 1),
(151, 1, 'Opening', '2020-01-12 17:24:10', 6),
(152, 2, 'A Full Moon Night', '2020-01-12 17:24:28', 6),
(153, 3, 'The Pentacle', '2020-01-12 17:24:40', 6),
(154, 4, 'Determination and its Beginning', '2020-01-12 17:24:56', 6),
(155, 5, 'The Black Priests', '2020-01-12 17:25:09', 6),
(156, 1, 'Sarada Uchiha', '2020-01-12 18:20:20', 2),
(157, 2, 'The Boy with the Sharingan…!!', '2020-01-12 18:20:43', 2),
(158, 3, 'A Chance Meeting 1', '2020-01-12 18:26:08', 2),
(159, 4, 'A Chance Meeting 2', '2020-01-12 18:26:18', 2),
(160, 5, 'The Future', '2020-01-12 18:26:31', 2),
(161, 6, 'Unevolving Species', '2020-01-12 18:26:46', 2),
(162, 7, 'Genetic Slaves', '2020-01-12 18:27:06', 2),
(163, 8, 'The Real Thing', '2020-01-12 18:27:21', 2),
(164, 9, 'I\'ll Protect You', '2020-01-12 18:27:34', 2),
(165, 10, 'What is Reflected in Those Eyes', '2020-01-12 18:27:50', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `name_genre` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `summary_genre` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`id_genre`, `name_genre`, `summary_genre`) VALUES
(1, 'Shounen', 'Shounen là loại manga nhắm tới độc giả là nam giới vị thành niên'),
(2, 'Shoujo', 'Shoujo là một loại manga nhắm tới độc giả là những cô gái vị thành niên'),
(3, 'Action', ''),
(4, 'Adventure', ''),
(5, 'Comedy', ''),
(6, 'Drama', ''),
(7, 'Fantasy', ''),
(8, 'Martial Arts', ''),
(9, 'Ecchi', 'Ecchi thường bao gồm yếu tố khêu gợi lồng trong những tình huống hài hước hoặc vô ý của nhân vật thường tập trung vào các nhân vật trong độ tuổi đi học'),
(10, 'Harem', 'Harem  tập trung vào nhân vật chính được, thường là tình yêu, gắn kết với 2 hoặc nhiều hơn nhân vật khác giới hoặc cùng giới'),
(11, 'Horror', ''),
(12, 'Supernatural', ''),
(13, 'Tragedy', ''),
(14, 'Historical', ''),
(15, 'Sci fi', ''),
(16, 'School Life', ''),
(17, 'Yuri', 'Yuri thường dùng để gọi những tác phẩm thuộc thể loại có liên quan đến đồng tính nữ'),
(21, 'Mecha', ''),
(22, 'Sports', ''),
(18, 'Yaoi', 'Yaoi thường dùng để gọi những tác phẩm thuộc thể loại có liên quan đến đồng tính nam'),
(19, 'Gender Bender', ''),
(20, 'Isekai', ''),
(23, 'Webtoons', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre_book`
--

DROP TABLE IF EXISTS `genre_book`;
CREATE TABLE IF NOT EXISTS `genre_book` (
  `id_genre` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `genre_book`
--

INSERT INTO `genre_book` (`id_genre`, `id_book`) VALUES
(1, 1),
(1, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `img_page` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_chapter` int(11) NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `page`
--

INSERT INTO `page` (`id_page`, `img_page`, `id_chapter`) VALUES
(1, '(1).jpg', 1),
(2, '(2).jpg', 1),
(3, '(3).jpg', 1),
(4, '(4).jpg', 1),
(5, '(5).jpg', 1),
(6, '(6).jpg', 1),
(7, '(7).jpg', 1),
(8, '(8).jpg', 1),
(9, '(9).jpg', 1),
(10, '(10).jpg', 1),
(11, '(11).jpg', 1),
(12, '(12).jpg', 1),
(13, '(13).jpg', 1),
(14, '(14).jpg', 1),
(15, '(15).jpg', 1),
(16, '(16).jpg', 1),
(17, '(17).jpg', 1),
(18, '(18).jpg', 1),
(19, '(19).jpg', 1),
(20, '(20).jpg', 1),
(21, '(21).jpg', 1),
(22, '(22).jpg', 1),
(23, '(23).jpg', 1),
(24, '(24).jpg', 1),
(25, '(25).jpg', 1),
(26, '(26).jpg', 1),
(27, '(27).jpg', 1),
(28, '(28).jpg', 1),
(29, '(29).jpg', 1),
(30, '(30).jpg', 1),
(31, '(31).jpg', 1),
(32, '(32).jpg', 1),
(33, '(33).jpg', 1),
(34, '(34).jpg', 1),
(35, '(35).jpg', 1),
(36, '(36).jpg', 1),
(37, '(37).jpg', 1),
(38, '(38).jpg', 1),
(39, '(39).jpg', 1),
(40, '(40).jpg', 1),
(41, '(41).jpg', 1),
(42, '(42).jpg', 1),
(43, '(43).jpg', 1),
(44, '(44).jpg', 1),
(45, '(45).jpg', 1),
(46, '(46).jpg', 1),
(47, '(47).jpg', 1),
(48, '(48).jpg', 1),
(49, '(49).jpg', 1),
(50, '(50).jpg', 1),
(51, '(51).jpg', 1),
(52, '(52).jpg', 1),
(53, '(53).jpg', 1),
(54, '(54).jpg', 1),
(55, '(55).jpg', 1),
(56, '(56).jpg', 1),
(57, '(57).jpg', 1),
(58, '(58).jpg', 1),
(59, '(59).jpg', 1),
(60, '(60).jpg', 1),
(61, '(61).jpg', 1),
(62, '(62).jpg', 2),
(63, '(63).jpg', 2),
(64, '(64).jpg', 2),
(65, '(65).jpg', 2),
(66, '(66).jpg', 2),
(67, '(67).jpg', 2),
(68, '(68).jpg', 2),
(69, '(69).jpg', 2),
(70, '(70).jpg', 2),
(71, '(71).jpg', 2),
(72, '(72).jpg', 2),
(73, '(73).jpg', 2),
(74, '(74).jpg', 2),
(75, '(75).jpg', 2),
(76, '(76).jpg', 2),
(77, '(77).jpg', 2),
(78, '(78).jpg', 2),
(79, '(79).jpg', 2),
(80, '(80).jpg', 2),
(81, '(81).jpg', 2),
(82, '(82).jpg', 2),
(83, '(83).jpg', 2),
(84, '(84).jpg', 2),
(85, '(85).jpg', 2),
(86, '(86).jpg', 3),
(87, '(87).jpg', 3),
(88, '(88).jpg', 3),
(89, '(89).jpg', 3),
(90, '(90).jpg', 3),
(91, '(91).jpg', 3),
(92, '(92).jpg', 3),
(93, '(93).jpg', 3),
(94, '(94).jpg', 3),
(95, '(95).jpg', 3),
(96, '(96).jpg', 3),
(97, '(97).jpg', 3),
(98, '(98).jpg', 3),
(99, '(99).jpg', 3),
(100, '(100).jpg', 3),
(101, '(101).jpg', 3),
(102, '(102).jpg', 3),
(103, '(103).jpg', 3),
(104, '(104).jpg', 3),
(105, '(105).jpg', 3),
(106, '(106).jpg', 3),
(107, '(107).jpg', 3),
(108, '(108).jpg', 3),
(109, '(109).jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `name_status` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `summary_status` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id_status`, `name_status`, `summary_status`) VALUES
(1, 'Completed', ''),
(2, 'On Going', ''),
(3, 'Stopped', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `summary_type` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id_type`, `name_type`, `summary_type`) VALUES
(1, 'Manga', ''),
(2, 'Comic', ''),
(3, 'Manhwa', ''),
(4, 'Manhua', ''),
(5, 'Other', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `gmail_user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `summary_user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `gmail_user`, `password_user`, `summary_user`) VALUES
(1, 'Trịnh Quang Trường', 'rokudo5262@gmail.com', 'e2bd122f9f194067659ec04045ac72f8', 'Admin'),
(2, 'Trịnh Quang Trường', '3001160129@ittc.edu.vn', 'e2bd122f9f194067659ec04045ac72f8', 'Admin'),
(10, 'rokudo12345@gmail.com', 'rokudo12345@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(11, 'rokudo123456@gmail.com', 'rokudo123456@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
