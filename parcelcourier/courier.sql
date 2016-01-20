-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2015 at 08:55 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prcDeleteRoute`(
_sessionID VARCHAR(50))
BEGIN
  DELETE FROM gpslocations
  WHERE sessionID = _sessionID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prcGetAllRoutesForMap`()
BEGIN
  SELECT DISTINCT(sessionId), MAX(gpsTime) gpsTime, 
  CONCAT('{ "latitude":"', CAST(latitude AS CHAR),'", "longitude":"', CAST(longitude AS CHAR), '", "speed":"', CAST(speed AS CHAR), '", "direction":"', CAST(direction AS CHAR), '", "distance":"', CAST(distance AS CHAR), '", "locationMethod":"', locationMethod, '", "gpsTime":"', DATE_FORMAT(gpsTime, '%b %e %Y %h:%i%p'), '", "userName":"', userName, '", "phoneNumber":"', phoneNumber, '", "sessionID":"', CAST(sessionID AS CHAR), '", "accuracy":"', CAST(accuracy AS CHAR), '", "extraInfo":"', extraInfo, '" }') json
  FROM gpslocations
  WHERE sessionID != '0' && CHAR_LENGTH(sessionID) != 0 && gpstime != '0000-00-00 00:00:00'
  GROUP BY sessionID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prcGetRouteForMap`(
_sessionID VARCHAR(50))
BEGIN
  SELECT CONCAT('{ "latitude":"', CAST(latitude AS CHAR),'", "longitude":"', CAST(longitude AS CHAR), '", "speed":"', CAST(speed AS CHAR), '", "direction":"', CAST(direction AS CHAR), '", "distance":"', CAST(distance AS CHAR), '", "locationMethod":"', locationMethod, '", "gpsTime":"', DATE_FORMAT(gpsTime, '%b %e %Y %h:%i%p'), '", "userName":"', userName, '", "phoneNumber":"', phoneNumber, '", "sessionID":"', CAST(sessionID AS CHAR), '", "accuracy":"', CAST(accuracy AS CHAR), '", "extraInfo":"', extraInfo, '" }') json
  FROM gpslocations
  WHERE sessionID = _sessionID
  ORDER BY lastupdate;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prcGetRoutes`()
BEGIN
  CREATE TEMPORARY TABLE tempRoutes (
    sessionID VARCHAR(50),
    userName VARCHAR(50),
    startTime DATETIME,
    endTime DATETIME)
  ENGINE = MEMORY;

  INSERT INTO tempRoutes (sessionID, userName)
  SELECT DISTINCT sessionID, userName
  FROM gpslocations;

  UPDATE tempRoutes tr
  SET startTime = (SELECT MIN(gpsTime) FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.userName = tr.userName);

  UPDATE tempRoutes tr
  SET endTime = (SELECT MAX(gpsTime) FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.userName = tr.userName);

  SELECT

  CONCAT('{ "sessionID": "', CAST(sessionID AS CHAR),  '", "userName": "', userName, '", "times": "(', DATE_FORMAT(startTime, '%b %e %Y %h:%i%p'), ' - ', DATE_FORMAT(endTime, '%b %e %Y %h:%i%p'), ')" }') json
  FROM tempRoutes
  ORDER BY startTime DESC;

  DROP TABLE tempRoutes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prcSaveGPSLocation`(
_latitude DECIMAL(10,7),
_longitude DECIMAL(10,7),
_speed INT(10),
_direction INT(10),
_distance DECIMAL(10,1),
_date TIMESTAMP,
_locationMethod VARCHAR(50),
_userName VARCHAR(50),
_phoneNumber VARCHAR(50),
_sessionID VARCHAR(50),
_accuracy INT(10),
_extraInfo VARCHAR(255),
_eventType VARCHAR(50)
)
BEGIN
   INSERT INTO gpslocations (latitude, longitude, speed, direction, distance, gpsTime, locationMethod, userName, phoneNumber,  sessionID, accuracy, extraInfo, eventType)
   VALUES (_latitude, _longitude, _speed, _direction, _distance, _date, _locationMethod, _userName, _phoneNumber, _sessionID, _accuracy, _extraInfo, _eventType);
   SELECT NOW();
END$$

DELIMITER ;

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

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE IF NOT EXISTS `parcel` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `parcel_no` varchar(20) NOT NULL,
  `parcel_weight` int(13) NOT NULL,
  `parcel_name` varchar(100) NOT NULL,
  `sender_pno` varchar(15) NOT NULL,
  `sender_idno` int(12) NOT NULL,
  `reciever_no` varchar(15) NOT NULL,
  `cost` float NOT NULL,
  `destination` varchar(100) NOT NULL,
  `courier_nopl` varchar(15) NOT NULL,
  `passlock` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'onway',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`id`, `parcel_no`, `parcel_weight`, `parcel_name`, `sender_pno`, `sender_idno`, `reciever_no`, `cost`, `destination`, `courier_nopl`, `passlock`, `status`) VALUES
(1, '94', 2, 'Mail', '0721309140', 26778910, '0721309140', 40, 'Nairobi', 'KAB 123H', '19', 'onway'),
(2, '16', 2, 'Letter', '+254721309140', 28805645, '+254721309140', 40, 'Nairobi', 'KBH 334A', '72', 'onway'),
(3, '32', 34, 'Bag', '+254714226107', 52187981, '+254714226107', 40, 'Karatina', 'KBK 234U', '64', 'onway');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `plate` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `plate`, `name`) VALUES
(1, 'KBH 334A', 'Bukinya'),
(10, 'KBK 234U', 'TOYOTA CRUISER'),
(11, 'KBJ 334K', 'Nissan sunny'),
(12, 'KBA 101Z', 'Track'),
(13, 'KBA 101Z', 'Track');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `state`) VALUES
(1, 'James', 'admin', 'mamb.dedan@gmail.com', ''),
(2, 'caren', 'caren@gmail.com', 'admin', '1'),
(3, 'Dedan', 'keny@gmail.com', '123,./123', '0'),
(4, 'Senagi', 'senagi@gmail.com', 'senagi', '0'),
(5, 'Senagi', 'senagi@gmail.com', 'senagi', '0'),
(6, 'mike', 'orengemichael@yahoo.com', 'mike', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
