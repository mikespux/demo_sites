

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpstracker-config`
--

CREATE TABLE IF NOT EXISTS `gpstracker-config` (
  `xid` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `value1` varchar(120) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`xid`),
  UNIQUE KEY `label` (`label`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cinfiguration table for gpstracker' AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gpstracker-config`
--

INSERT INTO `gpstracker-config` (`xid`, `label`, `value1`, `Description`) VALUES
(1, 'showdistance', '0', '0'),
(2, 'xtitle', 'GPS TRacker', '0'),
(3, 'homeurl', 'http://asinha.selfip.net:9001/gps/', '0'),
(4, 'incoming_file', '/tmp/l.txt', '0'),
(5, 'xkey', 'ABQIAAAAVON2tNR2_s9tw4pr5UQxoBTTZhJhMyEtneZsFv8Hr8EUteMtwBQEAwF__98AmhyyTPaixpzXuiH0qw', ''),
(6, 'xzoom', '15', ''),
(7, 'app_path', '/var/www/gps/', ''),
(8, 'auto_fare', '3.0', 'Rates autofare charges'),
(9, 'taxi_fare', '4.0', 'Taxi fare per km'),
(10, 'ac_cab', '10.0', 'AC Cab fare per km'),
(11, 'co_fare', '7.5', 'Company Claim per km'),
(12, 'currency', 'Rs.', 'Currency for fare calc'),
(13, 'xwidth', '700', 'Width of the map in pixels'),
(14, 'xheight', '500', 'Height of the map in pixels'),
(15, 'map_refresh', '30', 'Seconds to refresh the map view, when current track selected'),
(16, 'dull_lat', '0.00010', 'Lat seconds to dull, not register - to compensate for gps roaming'),
(17, 'dull_long', '0.00010', 'Longitude seconds to dull, not register - to compensate for gps roaming'),
(18, 'last_x', '150', 'Last 150 points to be shown for last track'),
(19, 'start_x', '100', 'starting record, when LONG is selected to be shown'),
(20, 'app_ver', '0.3', 'Version of GPS tracker'),
(21, 'snapon', '1', 'Enable/Disable snapon feature'),
(22, 'maxmarkers', '250', 'Max markers to be shown'),
(23, 'distmulti', '1.04', 'Since markers are placed, at lesser dist than actual');




SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `device_info`
--

CREATE TABLE IF NOT EXISTS `device_info` (
  `xid` int(11) NOT NULL,
  `device_no` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL,
  `mileage` varchar(11) NOT NULL,
  `linecolor` varchar(20) NOT NULL,
  `linewidth` varchar(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  UNIQUE KEY `imei` (`imei`),
  UNIQUE KEY `device_no` (`device_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_info`
--

INSERT INTO `device_info` (`xid`, `device_no`, `imei`, `mileage`, `linecolor`, `linewidth`, `description`) VALUES
(0, 1, '354777031492397', '4.55', '#0000FF', '4', 'HR26BC111'),
(0, 2, '354777031492395', '1.44', '#FF0066', '3', 'HR 26 BC 2111');


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `snapon`
--

CREATE TABLE IF NOT EXISTS `snapon` (
  `xid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `long` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `dist` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`xid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `snapon`
--

INSERT INTO `snapon` (`xid`, `name`, `lat`, `long`, `description`, `dist`, `active`) VALUES
(1, 'home', '28.51082', '77.232545', 'Base for 2111', 100, 1),
(2, 'Bpark', '28.49000', '77.091131', 'My Resi', 100, 1);


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `trackpoint`
--

CREATE TABLE IF NOT EXISTS `trackpoint` (
  `lock` varchar(100) NOT NULL,
  `sdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ddate` datetime NOT NULL,
  `local_ip` varchar(15) NOT NULL,
  `remote_ip` varchar(15) NOT NULL,
  `imei` varchar(20) NOT NULL,
  `alert_type` varchar(40) NOT NULL,
  `phone_no` varchar(18) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bearing` varchar(20) NOT NULL,
  `unknown2` varchar(20) NOT NULL,
  `unknown3` varchar(20) NOT NULL,
  `lat` varchar(12) NOT NULL,
  `dlat` text NOT NULL,
  `long` varchar(12) NOT NULL,
  `dlong` text NOT NULL,
  `speed` varchar(10) NOT NULL,
  `xid` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`xid`),
  UNIQUE KEY `xid` (`xid`),
  UNIQUE KEY `lock` (`lock`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4931 ;

--
-- Dumping data for table `trackpoint`
--

INSERT INTO `trackpoint` (`lock`, `sdate`, `ddate`, `local_ip`, `remote_ip`, `imei`, `alert_type`, `phone_no`, `status`, `bearing`, `unknown2`, `unknown3`, `lat`, `dlat`, `long`, `dlong`, `speed`, `xid`) VALUES
('2010-08-08 17:19:00.2010-08-08 17:49:00.07713.9484.2830.6567', '2010-08-08 17:19:00', '2010-08-08 17:49:00', '192.168.1.142  ', '117.96.4.45    ', '354777031492395', 'tracker', '+919810159444', 'F', '114918.000', 'A', '', '2830.6567', 'N', '07713.9484', 'E', '0.11', 4921),
('2010-08-08 17:20:00.2010-08-08 17:50:00.07713.9498.2830.6593', '2010-08-08 17:20:00', '2010-08-08 17:50:00', '192.168.1.142  ', '110.224.0.21   ', '354777031492395', 'tracker', '+919810159444', 'F', '115018.000', 'A', '', '2830.6593', 'N', '07713.9498', 'E', '0.29', 4922),
('2010-08-08 17:22:00.2010-08-08 17:51:00.07713.9504.2830.6592', '2010-08-08 17:22:00', '2010-08-08 17:51:00', '192.168.1.142  ', '110.224.75.9   ', '354777031492395', 'tracker', '+919810159444', 'F', '115118.000', 'A', '', '2830.6592', 'N', '07713.9504', 'E', '0.91', 4923),
('2010-08-08 17:23:00.2010-08-08 17:52:00.07713.9533.2830.6590', '2010-08-08 17:23:00', '2010-08-08 17:52:00', '192.168.1.142  ', '110.224.217.143', '354777031492395', 'tracker', '+919810159444', 'F', '115218.000', 'A', '', '2830.6590', 'N', '07713.9533', 'E', '0.84', 4924),
('2010-08-08 17:25:00.2010-08-08 17:55:00.07713.9457.2830.6597', '2010-08-08 17:25:00', '2010-08-08 17:55:00', '192.168.1.142  ', '117.96.219.199 ', '354777031492395', 'tracker', '+919810159444', 'F', '115518.000', 'A', '', '2830.6597', 'N', '07713.9457', 'E', '1.40', 4925),
('2010-08-08 17:26:00.2010-08-08 17:56:00.07713.9516.2830.6644', '2010-08-08 17:26:00', '2010-08-08 17:56:00', '192.168.1.142  ', '110.224.29.24  ', '354777031492395', 'tracker', '+919810159444', 'F', '115618.000', 'A', '', '2830.6644', 'N', '07713.9516', 'E', '0.87', 4926),
('2010-08-08 17:27:00.2010-08-08 17:57:00.07713.9500.2830.6607', '2010-08-08 17:27:00', '2010-08-08 17:57:00', '192.168.1.142  ', '110.224.207.202', '354777031492395', 'tracker', '+919810159444', 'F', '115718.000', 'A', '', '2830.6607', 'N', '07713.9500', 'E', '0.90', 4927),
('2010-08-08 17:28:00.2010-08-08 17:58:00.07713.9534.2830.6547', '2010-08-08 17:28:00', '2010-08-08 17:58:00', '192.168.1.142  ', '117.96.80.182  ', '354777031492395', 'tracker', '+919810159444', 'F', '115818.000', 'A', '', '2830.6547', 'N', '07713.9534', 'E', '0.90', 4928),
('2010-08-08 17:29:00.2010-08-08 17:59:00.07713.9528.2830.6558', '2010-08-08 17:29:00', '2010-08-08 17:59:00', '192.168.1.142  ', '117.96.11.22   ', '354777031492395', 'tracker', '+919810159444', 'F', '115918.000', 'A', '', '2830.6558', 'N', '07713.9528', 'E', '0.74', 4929),
('2010-08-08 17:31:00.2010-08-08 18:00:00.07713.9512.2830.6561', '2010-08-08 17:31:00', '2010-08-08 18:00:00', '192.168.1.142  ', '117.99.74.57   ', '354777031492395', 'tracker', '+919810159444', 'F', '120018.000', 'A', '', '2830.6561', 'N', '07713.9512', 'E', '0.38', 4930);



