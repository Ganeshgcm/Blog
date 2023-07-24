-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 02:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(256) NOT NULL,
  `blog_body` varchar(256) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_body`, `blog_image`, `category`, `author_id`, `publish_date`) VALUES
(14, 'Manipur Violence: Amit Shah Calls All-Party Meet in New Delhi on June 24', ' <p><strong>Union Home Minister Amit Shah convened an all-party meeting on June 24 in New Delhi to discuss the volatile situation in Manipur, which was rocked by ethnic clashes over a month ago. The meeting will take place at 3pm, informed the Ministry of ', ' download.jpg', 3, 5, '2023-06-23 03:59:11'),
(15, 'Media Association Calls Upon Biden to Raise Press Freedom Issues in India With Modi', ' <p><strong>New Delhi:&nbsp;The International Press Institute (IPI) has called on US President Joe Biden to raise press freedom issues in India with Prime Minister Narendra Modi, saying that the &ldquo;weaponisation of the law against critical journalists ', ' President_Joe_Biden_at_the_G20_04.jpg', 4, 5, '2023-06-23 04:02:39'),
(16, 'SAFF Championship: India outmuscle, outpace tired Pakistan', ' <p><strong>It was difficult to not feel sorry for a shattered and embarrassed Saqib Hanif as he buried his face in his hands, with his teammates putting their arms around him to console him.</strong></p>\r\n\r\n<p><strong>The Pakistan goalkeeper, along with 1', ' Chhetri-5.jpg', 5, 5, '2023-06-23 04:04:30'),
(18, 'Ranbir Kapoor moves away from Alia Bhatt as paparazzi ask her to pose solo, she turns down request', ' <p><strong>Ranbir Kapoor moves away from Alia Bhatt as paparazzi ask her to pose solo, she turns down request&nbsp;Alia Bhatt and<a href=\"https://www.hindustantimes.com/topic/ranbir-kapoor\" target=\"_blank\">&nbsp;Ranbir Kapoor&nbsp;</a>were spotted with da', ' images.jpg', 6, 5, '2023-06-23 04:11:20'),
(19, 'Adipurush box office collection day 6: Prabhas-starrer struggles amid controversy, Hindi collections fall to just Rs 4 crore on Wednesday', ' <p><strong>Director Om Raut&rsquo;s Adipurush, starring Prabhas, Saif Ali Khan and Kriti Sanon, had a historic opening weekend at the domestic box office, but the weekday collections have been declining rapidly. After earning Rs 10 crore across all langua', ' adipurush-box-office-1.jpg', 7, 5, '2023-06-23 04:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(3, 'Politics'),
(4, 'News'),
(5, 'Sports'),
(6, 'Bollywood'),
(7, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(5, 'ganesh', 'ganeshmishra1997@gmail.co', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
