-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 09:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rps_scores`
--

-- --------------------------------------------------------

--
-- Table structure for table `highscores`
--

CREATE TABLE `highscores` (
  `ID` int(11) NOT NULL,
  `name` varchar(3) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highscores`
--

INSERT INTO `highscores` (`ID`, `name`, `score`) VALUES
(1, 'hoi', 5),
(2, 'ert', 2),
(3, 'ert', 3),
(4, 'ger', 1),
(5, '42', 1),
(6, 'fwe', 5),
(7, 'fre', 1),
(8, 'gtr', 2),
(9, 'gtr', 1),
(10, 'gtr', 2),
(11, 'lol', 1),
(12, 'hoi', 3),
(13, 'hoi', 1),
(14, 'hoi', 1),
(15, 'hoi', 2),
(16, 'hoi', 2),
(17, 'hoi', 6),
(18, 'hoi', 6),
(19, 'hoi', 7),
(20, 'hoi', 7),
(21, 'hoi', 8),
(22, 'hoi', 8),
(23, 'hoi', 8),
(24, 'hoi', 9),
(25, 'hoi', 2),
(26, '>', 2),
(27, '>', 2),
(28, '>', 3),
(29, '>', 3),
(30, '>', 5),
(31, '>', 5),
(32, '>', 5),
(33, '>', 5),
(34, '>', 1),
(35, '>', 1),
(36, '>', 2),
(37, '>', 2),
(38, 'nhj', 2),
(39, 'nhj', 2),
(40, 'loi', 1),
(41, 'hui', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `highscores`
--
ALTER TABLE `highscores`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highscores`
--
ALTER TABLE `highscores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
