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
-- Table structure for table `delegate_details`
--

DROP TABLE IF EXISTS `delegate_details`;
CREATE TABLE IF NOT EXISTS `delegate_details` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `reg_number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `firebase_id` varchar(100) NOT NULL,
  `firebase_pass` varchar(50) NOT NULL,
  `profile_status` varchar(12) NOT NULL,
  `school` varchar(100) NOT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `reg_number` (`reg_number`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delegate_details`
--

INSERT INTO `delegate_details` (`counter`, `reg_number`, `email`, `user_name`, `firebase_id`, `firebase_pass`, `profile_status`, `school`) VALUES
(1, 'CT100/G/0200/14', 'sampledelone@outlook.com', 'SAMPLE_DELEGATE_ONE', 'SAMPLE_DELEGATE_ONE_CT100_G_0200_14', 'a45d6a75421c26d1a05c6c5040f9e33c1dc45b6c', 'complete', 'Pure and Applied Science'),
(2, 'CT100/G/0210/14', 'sampledeltwo@outlook.com', 'SAMPLE_DELEGATE_TWO', 'SAMPLE_DELEGATE_TWO_CT100_G_0210_14', 'a45d6a75421c26d1a05c6c5040f9e33c1dc45b6c', 'complete', 'Pure and Applied Science'),
(3, 'CT100/G/0220/14', 'sampledelthree@outlook.com', 'SAMPLE_DELEGATE_THREE', 'SAMPLE_DELEGATE_THREE_CT100_G_0220_14', 'a45d6a75421c26d1a05c6c5040f9e33c1dc45b6c', 'complete', 'Pure and Applied Science'),
(4, 'CT100/G/0230/14', 'sampledelfour@outlook.com', 'SAMPLE_DELEGATE FOUR', 'SAMPLE_DELEGATE FOUR_CT100_G_0230_14', 'a45d6a75421c26d1a05c6c5040f9e33c1dc45b6c', 'complete', 'School of Health Sciences');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
