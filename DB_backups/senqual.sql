-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2013 at 10:38 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `senqual`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `date` text NOT NULL,
  `time` text NOT NULL,
  `reading` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`date`, `time`, `reading`) VALUES
('11-15-2013', '1:00', 100),
('11-15-2013', '1:15', 110),
('11-15-2013', '1:30', 95),
('11-15-2013', '1:45', 99),
('11-15-2013', '2:00', 99),
('11-15-2013', '2:15', 95),
('11-15-2013', '2:30', 105),
('11-15-2013', '2:45', 100),
('11-15-2013', '3:00', 90),
('11-15-2013', '3:15', 98),
('11-15-2013', '3:30', 110),
('11-15-2013', '3:45', 95),
('11-15-2013', '4:00', 115),
('11-15-2013', '4:15', 105),
('11-15-2013', '4:30', 90),
('11-15-2013', '4:45', 100),
('11-15-2013', '5:00', 95),
('11-15-2013', '5:15', 110),
('11-15-2013', '5:30', 105),
('11-15-2013', '5:45', 110),
('11-15-2013', '6:00', 90),
('11-15-2013', '6:15', 99),
('11-15-2013', '6:30', 95),
('11-15-2013', '6:45', 110),
('11-15-2013', '7:00', 100),
('11-15-2013', '7:15', 97),
('11-15-2013', '7:30', 96),
('11-15-2013', '7:45', 100),
('11-15-2013', '8:00', 103),
('11-15-2013', '8:15', 99),
('11-15-2013', '8:30', 96),
('11-15-2013', '8:45', 102),
('11-15-2013', '9:00', 110),
('11-15-2013', '9:15', 100),
('11-15-2013', '9:30', 95),
('11-15-2013', '9:45', 110),
('11-15-2013', '10:00', 98),
('11-15-2013', '10:15', 90),
('11-15-2013', '10:30', 100),
('11-15-2013', '10:45', 110),
('11-15-2013', '11:00', 95),
('11-15-2013', '11:15', 99),
('11-15-2013', '6:30', 94),
('11-15-2013', '11:45', 110),
('11-15-2013', '12:00', 100),
('11-15-2013', '12:15', 94),
('11-15-2013', '12:30', 99),
('11-15-2013', '12:45', 110),
('11-15-2013', '13:00', 100),
('11-15-2013', '13:15', 95),
('11-15-2013', '13:30', 99),
('11-15-2013', '13:45', 100),
('11-15-2013', '14:00', 99),
('11-15-2013', '14:15', 96),
('11-15-2013', '14:30', 99),
('11-15-2013', '14:45', 100),
('11-15-2013', '15:00', 110),
('11-15-2013', '15:15', 100),
('11-15-2013', '15:30', 95),
('11-15-2013', '15:45', 110),
('11-15-2013', '16:00', 100),
('11-15-2013', '16:15', 95),
('11-15-2013', '16:30', 99),
('11-15-2013', '16:45', 110),
('11-15-2013', '17:00', 100),
('11-15-2013', '17:15', 95),
('11-15-2013', '17:30', 99),
('11-15-2013', '17:45', 108),
('11-15-2013', '18:00', 100),
('11-15-2013', '18:15', 96),
('11-15-2013', '18:30', 99),
('11-15-2013', '18:45', 110),
('11-15-2013', '19:00', 100),
('11-15-2013', '19:15', 95),
('11-15-2013', '19:30', 100),
('11-15-2013', '19:45', 110),
('11-15-2013', '20:00', 100),
('11-15-2013', '20:15', 95),
('11-15-2013', '20:30', 99),
('11-15-2013', '20:45', 110),
('11-15-2013', '21:00', 100),
('11-15-2013', '21:15', 90),
('11-15-2013', '21:30', 95),
('11-15-2013', '21:45', 110),
('11-15-2013', '22:00', 100),
('11-15-2013', '22:15', 93),
('11-15-2013', '22:30', 96),
('11-15-2013', '22:45', 115),
('11-15-2013', '23:00', 110),
('11-15-2013', '23:15', 98),
('11-15-2013', '23:30', 105),
('11-15-2013', '23:45', 110);

-- --------------------------------------------------------

--
-- Table structure for table `monitored_readings`
--

CREATE TABLE IF NOT EXISTS `monitored_readings` (
  `reading` text NOT NULL,
  `date_monitored` date NOT NULL,
  `anomaly_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rule_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE IF NOT EXISTS `monitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creator` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`id`, `name`, `date_modified`, `date_created`, `creator`) VALUES
(1, 'my monitor 1', '2013-11-26 04:20:34', '0000-00-00 00:00:00', 'cemontijo@live.com'),
(2, 'MyMonitor 2', '2013-11-26 04:20:16', '0000-00-00 00:00:00', 'cemontijo@live.com'),
(3, 'my monitor 33', '2013-11-27 03:55:31', '0000-00-00 00:00:00', 'cemontijo@live.com');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_rules`
--

CREATE TABLE IF NOT EXISTS `monitor_rules` (
  `monitor_id` int(11) NOT NULL,
  `rule_id` varchar(255) NOT NULL,
  PRIMARY KEY (`monitor_id`,`rule_id`),
  KEY `rule_id` (`rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monitor_rules`
--

INSERT INTO `monitor_rules` (`monitor_id`, `rule_id`) VALUES
(1, 'rule1'),
(3, 'rule1'),
(1, 'rule2'),
(2, 'rule2');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `id` varchar(255) NOT NULL,
  `dnl` text NOT NULL,
  `rule_string` text NOT NULL,
  `creator` varchar(255) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `class` text NOT NULL,
  `scope_statement1` text,
  `scope_statement2` text,
  `pattern_premise` text,
  `pattern_statement` text,
  `scope_string` text,
  `pattern_string` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `dnl`, `rule_string`, `creator`, `date_modified`, `date_created`, `class`, `scope_statement1`, `scope_statement2`, `pattern_premise`, `pattern_statement`, `scope_string`, `pattern_string`) VALUES
('rule1', 'Testdnl1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquam leo lectus, eget placerat risus vehicula sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus cursus elit nec magna commodo varius. Nam tincidunt nunc scelerisque mi tincidunt facilisis. Donec ullamcorper quam id quam sodales sollicitudin. Fusce quis leo sit amet dui tempor viverra. Fusce molestie erat quis turpis elementum accumsan. Proin ut eleifend mi. Fusce sollicitudin ante orci, in fringilla lorem malesuada nec. Sed quis lectus in enim elementum consectetur.', 'aschweighofer@miners.utep.edu', '2013-11-27 02:24:28', '2013-09-25 23:16:03', 'global scope', '', '', '', '', '', '0'),
('rule2', 'TestDnl2', 't amet dui tempor viverra. Fusce molestie erat quis turpis elementum accumsan. Proin ut eleifend mi. Fusce sollicitudin ante orci, in fringilla lorem malesuada nec. Sed quis lectus in en', 'newminer@utep.edu', '2013-11-27 02:25:07', '2013-09-25 23:17:56', 'absence pattern', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE IF NOT EXISTS `sensors` (
  `identifier` char(255) NOT NULL,
  `serial_number` text NOT NULL,
  `type` text NOT NULL,
  `location` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `accuracy` text NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `creator` text NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`identifier`, `serial_number`, `type`, `location`, `latitude`, `longitude`, `accuracy`, `date_modified`, `date_created`, `creator`) VALUES
('aaa', 'aaa', 'bbb', 'ccc', '40.716558', '-73.975754', 'fff', '2013-11-27 07:55:37', '0000-00-00 00:00:00', 'aaa'),
('testing', 'testing2', 'testing2', 'testing2', '31.977794', '-106.508331', 'testing2', '2013-11-27 07:56:00', '2013-11-13 13:21:21', 'Jaime');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_fields`
--

CREATE TABLE IF NOT EXISTS `sensor_fields` (
  `field_name` char(255) NOT NULL,
  `unit_measure` char(255) NOT NULL,
  `sensor_id` char(255) NOT NULL,
  PRIMARY KEY (`field_name`,`unit_measure`,`sensor_id`),
  UNIQUE KEY `sensor_id` (`sensor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_fields`
--

INSERT INTO `sensor_fields` (`field_name`, `unit_measure`, `sensor_id`) VALUES
('aaa', 'aaa', 'aaa'),
('testFar', '90', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'hans.mustermann@gmail.com', 'hans', 1),
(2, 'test', 'abc', 0),
(4, 'aschweighofer', 'pass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(32) NOT NULL,
  `affiliation` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `email`, `name`, `title`, `affiliation`, `password`, `phone`) VALUES
(2, 'lklk', 'lklkl', 'lklk', 'lkl', 'lkklkl', ''),
(3, 'sdfdsf', 'dsf', 'sdf', '', 'fffff', ''),
(4, 'hans.mustermann@gmail.com', 'Hans Mustermann', 'Herr', 'Student', 'aaaa', '+4366666666'),
(5, 'test', 'El Testador', 'PhD', 'UTEP', 'abc', '555-5555'),
(7, 'aschweighofer', 'Achim Schweighofer', 'Bsc.', 'University', 'pass', '02983023983');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monitor_rules`
--
ALTER TABLE `monitor_rules`
  ADD CONSTRAINT `monitor_rules_ibfk_1` FOREIGN KEY (`monitor_id`) REFERENCES `monitors` (`id`),
  ADD CONSTRAINT `monitor_rules_ibfk_2` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`);

--
-- Constraints for table `sensor_fields`
--
ALTER TABLE `sensor_fields`
  ADD CONSTRAINT `sensor_fields_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`identifier`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
