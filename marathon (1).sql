-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2017 at 09:14 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `adminID` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `data_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`adminID`, `username`, `password`, `data_registered`) VALUES
('adm001', 'admin', 'admin', '2017-08-16 03:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `studentID` varchar(9) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `medical_issues` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `kelompok` varchar(12) DEFAULT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `participantID` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`participantID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`username`, `email`, `password`, `name`, `studentID`, `contact`, `medical_issues`, `address`, `kelompok`, `time_registered`, `participantID`) VALUES
('syafiq', 'syafiq@tnb.com.my', 'syafiq', NULL, 'sn022', '1111', 'sakit jantung', '', 'option1', '2017-08-17 00:52:22', 114),
('testtest', 'test@test.com', 'test', NULL, 'sn002', '1111112121', 'sasa', 'xtau', 'option1', '2017-08-17 00:55:54', 117),
('haziq', 'test@test.com', 'test', NULL, 'SN0101643', NULL, NULL, NULL, NULL, '2017-08-17 01:09:05', 118),
('ayam', 'test@test.com', 'test', NULL, 'test12222', NULL, NULL, NULL, NULL, '2017-08-17 01:12:45', 119),
('testuser', 'test@test.com', 'ayam', NULL, 'sn89', NULL, NULL, NULL, NULL, '2017-08-17 01:13:37', 120);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
