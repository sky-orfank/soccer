-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2016 at 06:30 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_mvc`
--
CREATE DATABASE IF NOT EXISTS `soccer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `soccer`;

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE IF NOT EXISTS `soccerteam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(255) NOT NULL,
  `countGames` int(11) NOT NULL,
  `scoredGoal` int(11) NOT NULL,
  `missedGoal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stat`
--

INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(1, 'Brazil', 104, 221, 102);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(2, 'Germany', 106, 224, 121);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(3, 'Italy', 83, 128, 77);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(4, 'Argentina', 77, 131, 84);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(5, 'England', 62, 79, 56);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(6, 'Spain', 59, 92, 66);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(7, 'France', 59, 106, 71);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(8, 'Holland', 50, 86, 48);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(9, 'Uruguay', 51, 80, 71);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(10, 'Sweden', 46, 74, 69);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(11, 'Russia', 40, 66, 47);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(12, 'Serbia', 43, 64, 59);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(13, 'Mexica', 53, 57, 92);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(14, 'Belgium', 41, 52, 66);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(15, 'Poland', 31, 44, 40);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(16, 'Hungary', 32, 87, 57);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(17, 'Portugal', 26, 43, 29);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(18, 'Czech Republic', 33, 47, 49);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(19, 'Chili', 33, 40, 49);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(20, 'Austria', 29, 43, 47);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(21, 'Switzerland', 33, 45, 59);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(22, 'Paraguay', 27, 30, 38);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(23, 'USA', 33, 37, 62);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(24, 'Rumania', 21, 30, 32);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(25, 'South Korea', 31, 31, 67);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(26, 'Denmark', 16, 27, 24);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(27, 'Croatia', 16, 21, 17);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(28, 'Colombia', 18, 26, 27);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(29, 'Scotland', 23, 25, 41);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(30, 'Republic of Cameroon', 23, 18, 43);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(31, 'Costa Rica', 15, 17, 23);
INSERT INTO `soccerteam` (`id`, `teamName`, `countGames`, `scoredGoal`, `missedGoal`) VALUES
(32, 'Bulgaria', 26, 22, 53);

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
