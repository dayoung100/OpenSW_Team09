-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-12-16 19:36
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
-- 데이터베이스: `testing`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `title` int(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `content` text NOT NULL,
  `userId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `account`
--

INSERT INTO `account` (`id`, `title`, `start`, `end`, `content`, `userId`) VALUES
(4, 20000, '2020-12-16 00:00:00', '2020-12-17 00:00:00', '병원비', 'test');

-- --------------------------------------------------------

--
-- 테이블 구조 `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `content` text NOT NULL,
  `userId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `diary`
--

INSERT INTO `diary` (`id`, `title`, `start`, `end`, `content`, `userId`) VALUES
(4, 'test2', '2020-12-23 00:00:00', '2020-12-29 00:00:00', 'test2', 'test');

-- --------------------------------------------------------

--
-- 테이블 구조 `todolist`
--

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `content` text NOT NULL,
  `userId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `todolist`
--

INSERT INTO `todolist` (`id`, `title`, `start`, `end`, `content`, `userId`) VALUES
(1, 'test', '2020-12-23 00:00:00', '2020-12-24 00:00:00', 'test', 'test'),
(2, 'test1', '2020-12-15 00:00:00', '2020-12-16 00:00:00', 'test1', 'test'),
(3, 'test', '2020-12-31 00:00:00', '2021-01-01 00:00:00', 'test', 'test');

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `userId` text NOT NULL,
  `userPwd` text NOT NULL,
  `userEmail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `userIdx` (`userId`) USING HASH;

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
