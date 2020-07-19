-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 11:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qna`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `answer` varchar(500) DEFAULT NULL,
  `acreated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `qid`, `uid`, `answer`, `acreated_on`) VALUES
(32, 72, 1, 'h', '2020-07-19 14:17:48'),
(35, 73, 1, 'IDK', '2020-07-19 15:44:55'),
(38, 72, 1, 'NO', '2020-07-19 18:20:46'),
(39, 77, 10, 'seriously?!!', '2020-07-19 21:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `backenduser`
--

CREATE TABLE `backenduser` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `birth` date NOT NULL,
  `occupation` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `role` varchar(255) CHARACTER SET utf8 NOT NULL,
  `key` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backenduser`
--

INSERT INTO `backenduser` (`uid`, `email`, `password`, `first_name`, `last_name`, `birth`, `occupation`, `status`, `role`, `key`) VALUES
(1, 'admin@admin.com', '123', 'admin', 'admin', '0000-00-00', '0', 1, '', NULL),
(6, 'rami@user.com', 'user', 'Rami', 'Helmi', '2020-07-02', 'web developer', 0, '', NULL),
(8, 'user@user.com', 'user', 'user', 'test', '2020-07-08', 'studenttt', 1, '1', NULL),
(10, 'ahmed@user.com', '333', 'Ahned', 'Mohamed', '2020-07-17', 'student', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `uid`, `question`, `status`, `created_on`, `updated_on`) VALUES
(72, 1, 'hello?', 1, '2020-07-19 14:16:30', '2020-07-19 14:16:30'),
(73, 1, 'why you doing that?!', 1, '2020-07-19 15:12:44', '2020-07-19 15:12:44'),
(75, 1, 'HEHE', 0, '2020-07-19 18:18:50', '2020-07-19 18:18:50'),
(77, 10, 'hhhhhhh', 1, '2020-07-19 21:38:13', '2020-07-19 21:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vid` int(11) NOT NULL,
  `upvote` int(1) DEFAULT NULL,
  `downvote` int(1) DEFAULT NULL,
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vid`, `upvote`, `downvote`, `aid`, `uid`) VALUES
(2, 1, NULL, 32, 1),
(3, NULL, 1, 32, 6),
(4, 1, NULL, 32, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `answers_ibfk_1` (`qid`),
  ADD KEY `answers_ibfk_2` (`uid`);

--
-- Indexes for table `backenduser`
--
ALTER TABLE `backenduser`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `questions_ibfk_1` (`uid`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `aid` (`aid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `backenduser`
--
ALTER TABLE `backenduser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `backenduser` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `backenduser` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `answers` (`aid`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `backenduser` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
