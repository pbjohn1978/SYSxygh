-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2017 at 05:03 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysxygh`
--

-- --------------------------------------------------------

--
-- Table structure for table `mfatwilio`
--

DROP TABLE IF EXISTS `mfatwilio`;
CREATE TABLE IF NOT EXISTS `mfatwilio` (
  `MFAid` int(11) NOT NULL AUTO_INCREMENT,
  `MFAtoken` int(11) NOT NULL,
  `MFAsid` int(11) NOT NULL,
  `MFAfromPhoneNum` int(11) NOT NULL,
  PRIMARY KEY (`MFAid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `normalizedmacs`
--

DROP TABLE IF EXISTS `normalizedmacs`;
CREATE TABLE IF NOT EXISTS `normalizedmacs` (
  `NorID` int(11) NOT NULL AUTO_INCREMENT,
  `NorMac` int(11) NOT NULL,
  PRIMARY KEY (`NorID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webaccessusers`
--

DROP TABLE IF EXISTS `webaccessusers`;
CREATE TABLE IF NOT EXISTS `webaccessusers` (
  `WebUserID` int(11) NOT NULL AUTO_INCREMENT,
  `WebFirstName` varchar(65) NOT NULL,
  `WebLastName` varchar(65) NOT NULL,
  `WebPassword` text NOT NULL,
  `WebUserName` varchar(65) NOT NULL,
  `WebMFA` varchar(65) NOT NULL,
  `WebMFAphoneNum` varchar(25) NOT NULL,
  `WebAccessLevel` int(11) NOT NULL,
  `WebUserGuid` varchar(65) NOT NULL,
  PRIMARY KEY (`WebUserID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webaccessusers`
--

INSERT INTO `webaccessusers` (`WebUserID`, `WebFirstName`, `WebLastName`, `WebPassword`, `WebUserName`, `WebMFA`, `WebMFAphoneNum`, `WebAccessLevel`, `WebUserGuid`) VALUES
(1, 'admin', 'user', 'sysxygh', 'admin', '11111', '1234567890', 3, '90206678-C259-4A38-8BA2-4E6D336B67C7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
