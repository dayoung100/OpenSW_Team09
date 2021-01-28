-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-12-16 16:17
-- 서버 버전: 10.4.14-MariaDB
-- PHP 버전: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `calendar`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `content`) VALUES
(24, '10000원', '#FFD700', '2020-12-16 00:00:00', '2020-12-17 00:00:00', '병원비'),
(25, '내용', '#0071c5', '2020-12-16 00:00:00', '2020-12-17 00:00:00', '오늘 너무 힘들다'),
(26, 'ㅏㅏ', '#008000', '2020-12-16 00:00:00', '2020-12-17 00:00:00', 'ㅏㅓㅘㅓ'),
(28, '10000원', '#FFD700', '2020-12-17 00:00:00', '2020-12-18 00:00:00', '병원비'),
(29, 'test', 'diary', '2020-12-18 00:00:00', '2020-12-19 00:00:00', 'test'),
(30, 'test1', 'account', '2020-12-18 00:00:00', '2020-12-19 00:00:00', 'test1');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;