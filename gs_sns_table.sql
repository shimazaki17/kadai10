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
-- テーブルの構造 `gs_sns_table`
--

CREATE TABLE IF NOT EXISTS `gs_sns_table` (
`id` int(12) NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_sns_table`
--

INSERT INTO `gs_sns_table` (`id`, `lid`, `lpw`, `image`) VALUES
(20, '1', '$2y$10$N6kSF9tFNhIQIG/fsjOyu.SXAWJJGp9HnKB/Fq72iAQFZKq1PYUmO', '20171022084529d41d8cd98f00b204e9800998ecf8427e.JPG'),
(21, '2', '$2y$10$RxiWYRwW5g/rzROCLQcb4OSK3GnPmfOJJYlaYkea9fiwIamQwZ2tK', '20171022084606d41d8cd98f00b204e9800998ecf8427e.JPG'),
(22, '3', '$2y$10$71BP.hFu3tuEHl78gX30DOyER2vZUd1nLbq0CKTGf8kqFJi.8g.ae', '20171022084636d41d8cd98f00b204e9800998ecf8427e.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_sns_table`
--
ALTER TABLE `gs_sns_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_sns_table`
--
ALTER TABLE `gs_sns_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
