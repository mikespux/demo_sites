-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 06:58 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpslocations`
--

CREATE TABLE IF NOT EXISTS `gpslocations` (
  `GPSLocationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` decimal(10,7) NOT NULL DEFAULT '0.0000000',
  `longitude` decimal(10,7) NOT NULL DEFAULT '0.0000000',
  `phoneNumber` varchar(50) NOT NULL DEFAULT '',
  `userName` varchar(50) NOT NULL DEFAULT '',
  `sessionID` varchar(50) NOT NULL DEFAULT '',
  `speed` int(10) unsigned NOT NULL DEFAULT '0',
  `direction` int(10) unsigned NOT NULL DEFAULT '0',
  `distance` decimal(10,1) NOT NULL DEFAULT '0.0',
  `gpsTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locationMethod` varchar(50) NOT NULL DEFAULT '',
  `accuracy` int(10) unsigned NOT NULL DEFAULT '0',
  `extraInfo` varchar(255) NOT NULL DEFAULT '',
  `eventType` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`GPSLocationID`),
  KEY `sessionIDIndex` (`sessionID`),
  KEY `phoneNumberIndex` (`phoneNumber`),
  KEY `userNameIndex` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gpslocations`
--

INSERT INTO `gpslocations` (`GPSLocationID`, `lastUpdate`, `latitude`, `longitude`, `phoneNumber`, `userName`, `sessionID`, `speed`, `direction`, `distance`, `gpsTime`, `locationMethod`, `accuracy`, `extraInfo`, `eventType`) VALUES
(1, '2007-01-03 19:43:00', -0.4831579, 37.1273549, 'Karatina', 'Karatina', '8BA21D90-3F90-407F-BAAE-800B04B1F5ED', 0, 0, 0.0, '2007-01-03 19:43:00', 'na', 137, 'na', 'gpsTracker'),
(2, '2007-01-03 19:44:00', -0.4201300, 36.9475900, 'Nyeri', 'Nyeri', '8BA21D90-3F90-407F-BAAE-800B04B1F5ED', 0, 0, 0.0, '2007-01-03 19:44:00', 'na', 137, 'na', 'gpsTracker'),
(3, '2007-01-03 19:45:00', -1.2833333, 36.8166667, 'Nairobi', 'Nairobi', '8BA21D90-3F90-407F-BAAE-800B04B1F5ED', 0, 0, 0.0, '2007-01-03 19:45:00', 'na', 137, 'na', 'gpsTracker');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
