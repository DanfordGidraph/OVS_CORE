-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2018 at 01:36 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovscoredatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates_and_delegates`
--

DROP TABLE IF EXISTS `candidates_and_delegates`;
CREATE TABLE IF NOT EXISTS `candidates_and_delegates` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `reg_number` varchar(20) NOT NULL,
  `designation` varchar(10) NOT NULL,
  PRIMARY KEY (`counter`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates_and_delegates`
--

INSERT INTO `candidates_and_delegates` (`counter`, `reg_number`, `designation`) VALUES
(1, 'CT100/G/0100/14', 'candidate'),
(2, 'CT100/G/0110/14', 'candidate'),
(3, 'CT100/G/0120/14', 'candidate'),
(4, 'CT100/G/0200/14', 'delegate'),
(5, 'CT100/G/0210/14', 'delegate'),
(6, 'CT100/G/0220/14', 'delegate'),
(7, 'CT100/G/0283/14', 'candidate'),
(8, 'CT100/G/0230/14', 'delegate'),
(9, 'CT100/G/0230/14', 'delegate');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
