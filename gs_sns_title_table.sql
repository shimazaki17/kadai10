-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 10 月 26 日 15:02
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db21`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_sns_title_table`
--

CREATE TABLE IF NOT EXISTS `gs_sns_title_table` (
`uid` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_sns_title_table`
--

INSERT INTO `gs_sns_title_table` (`uid`, `title`, `photo`, `id`) VALUES
(3, 'フラペチーノ', '201710221012476fe6e99c4b725bf609891099e1a6c7f7.JPG', '21'),
(5, 'フラペチーノ', '2017102212043080b8b126b725efb6f2be2a02b60f4ded.JPG', '22'),
(8, 'オペラ', '2017102213013280b8b126b725efb6f2be2a02b60f4ded.JPG', '20'),
(10, 'フラペチーノ', '20171026145357e12a233b030fcc1be22aabca66fdc4b5.JPG', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_sns_title_table`
--
ALTER TABLE `gs_sns_title_table`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_sns_title_table`
--
ALTER TABLE `gs_sns_title_table`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
