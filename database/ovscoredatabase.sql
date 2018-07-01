-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql200.byetcluster.com
-- Generation Time: Jul 01, 2018 at 08:41 AM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ovscoredatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates_and_delegates`
--

CREATE TABLE IF NOT EXISTS `candidates_and_delegates` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `reg_number` varchar(20) NOT NULL,
  `designation` varchar(10) NOT NULL,
  PRIMARY KEY (`counter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Table structure for table `candidate_details`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Table structure for table `delegate_details`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `counter` int(5) NOT NULL AUTO_INCREMENT,
  `reg_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `firebase_id` varchar(100) NOT NULL,
  `firebase_pass` varchar(50) NOT NULL,
  `school` varchar(100) NOT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `reg_number` (`reg_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



-- --------------------------------------------------------

--
-- Table structure for table `voting_manager`
--

CREATE TABLE IF NOT EXISTS `voting_manager` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `vote_type` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`counter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `voting_manager`
--

INSERT INTO `voting_manager` (`counter`, `vote_type`, `status`) VALUES
(1, 'delegate_voting', 'closed'),
(2, 'candidate_voting', 'closed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
