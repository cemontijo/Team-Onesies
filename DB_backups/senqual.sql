-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2013 at 05:12 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `senqual`
--
CREATE DATABASE IF NOT EXISTS `senqual` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `senqual`;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `field_name` char(255) NOT NULL,
  `unit_measure` char(255) NOT NULL,
  PRIMARY KEY (`field_name`,`unit_measure`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'TestMonitor13', '2013-11-26 03:55:22', '0000-00-00 00:00:00', 'cemontijo@live.com'),
(2, 'Test-#+´´ symbols Monitor 2', '2013-11-26 03:55:55', '0000-00-00 00:00:00', 'cemontijo@live.com'),
(3, 'jkjk1', '2013-11-26 03:55:55', '0000-00-00 00:00:00', 'cemontijo@live.com');

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
(1, 'rule2'),
(2, 'rule2'),
(3, 'rule2');

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
  `scope_statement1` text NOT NULL,
  `scope_statement2` text NOT NULL,
  `pattern_premise` text NOT NULL,
  `pattern_statement` text NOT NULL,
  `scope_string` text NOT NULL,
  `pattern_string` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `dnl`, `rule_string`, `creator`, `date_modified`, `date_created`, `class`, `scope_statement1`, `scope_statement2`, `pattern_premise`, `pattern_statement`, `scope_string`, `pattern_string`) VALUES
('rule1', 'Testdnl1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquam leo lectus, eget placerat risus vehicula sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus cursus elit nec magna commodo varius. Nam tincidunt nunc scelerisque mi tincidunt facilisis. Donec ullamcorper quam id quam sodales sollicitudin. Fusce quis leo sit amet dui tempor viverra. Fusce molestie erat quis turpis elementum accumsan. Proin ut eleifend mi. Fusce sollicitudin ante orci, in fringilla lorem malesuada nec. Sed quis lectus in enim elementum consectetur.', 'aschweighofer@miners.utep.edu', '2013-09-25 23:17:19', '2013-09-25 23:16:03', '0', '', '', '', '', '', 0),
('rule2', 'TestDnl2', 't amet dui tempor viverra. Fusce molestie erat quis turpis elementum accumsan. Proin ut eleifend mi. Fusce sollicitudin ante orci, in fringilla lorem malesuada nec. Sed quis lectus in en', 'newminer@utep.edu', '2013-09-25 23:17:56', '2013-09-25 23:17:56', '0', '', '', '', '', '', 0);

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
(5, 'test', 'Administra', 'sdfsdfsdffdssd', 'dsf', 'abc', '00293'),
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
-- Constraints for table `sensors`
--
ALTER TABLE `sensors`
  ADD CONSTRAINT `sensors_ibfk1` FOREIGN KEY (`identifier`) REFERENCES `fields` (`field_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
