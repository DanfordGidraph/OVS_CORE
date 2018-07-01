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
-- Table structure for table `candidate_details`
--

DROP TABLE IF EXISTS `candidate_details`;
CREATE TABLE IF NOT EXISTS `candidate_details` (
  `counter` int(10) NOT NULL AUTO_INCREMENT,
  `reg_number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `firebase_id` varchar(50) NOT NULL,
  `firebase_pass` varchar(100) NOT NULL,
  `profile_status` varchar(12) NOT NULL,
  `school` varchar(100) NOT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `reg_number` (`reg_number`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_details`
--

INSERT INTO `candidate_details` (`counter`, `reg_number`, `email`, `user_name`, `firebase_id`, `firebase_pass`, `profile_status`, `school`) VALUES
(1, 'CT100/G/0100/14', 'samplecandone@gmail.com', 'SAMPLE_CANDIDATE_ONE', 'SAMPLE_CANDIDATE_ONE_CT100_G_0100_14', '2b33c20c3c1f4803c7ee21ac8c698ce41912fff0', 'complete', 'Pure and Applied Science'),
(2, 'CT100/G/0110/14', 'samplecandtwo@gmail.com', 'SAMPLE_CANDIDATE_TWO', 'SAMPLE_CANDIDATE_TWO_CT100_G_0110_14', '2b33c20c3c1f4803c7ee21ac8c698ce41912fff0', 'complete', 'Pure and Applied Science'),
(3, 'CT100/G/0120/14', 'samplecandthree@gmail.com', 'SAMPLE_CANDIDATE_THREE', 'SAMPLE_CANDIDATE_THREE_CT100_G_0120_14', '2b33c20c3c1f4803c7ee21ac8c698ce41912fff0', 'complete', 'Pure and Applied Science'),
(4, 'CT100/G/0283/14', 'clarian@mail.com', 'CLARIAN_MAKUNGU', 'CLARIAN_MAKUNGU_CT100_G_0283_14', '112bb791304791ddcf692e29fd5cf149b35fea37', 'complete', 'School of Pure and Applied Sciences');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
