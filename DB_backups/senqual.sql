-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2013 at 07:21 AM
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
-- Table structure for table `monitors`
--

CREATE TABLE IF NOT EXISTS `monitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`id`, `name`) VALUES
(1, 'TestMonitor13'),
(2, 'Test-#+´´ symbols Monitor 2'),
(3, 'jkjk1');

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
  `created_by` varchar(255) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `dnl`, `rule_string`, `created_by`, `modified_at`, `created_at`) VALUES
('rule1', 'Testdnl1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquam leo lectus, eget placerat risus vehicula sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus cursus elit nec magna commodo varius. Nam tincidunt nunc scelerisque mi tincidunt facilisis. Donec ullamcorper quam id quam sodales sollicitudin. Fusce quis leo sit amet dui tempor viverra. Fusce molestie erat quis turpis elementum accumsan. Proin ut eleifend mi. Fusce sollicitudin ante orci, in fringilla lorem malesuada nec. Sed quis lectus in enim elementum consectetur.', 'aschweighofer@miners.utep.edu', '2013-09-25 23:17:19', '2013-09-25 23:16:03'),
('rule2', 'TestDnl2', 't amet dui tempor viverra. Fusce molestie erat quis turpis elementum accumsan. Proin ut eleifend mi. Fusce sollicitudin ante orci, in fringilla lorem malesuada nec. Sed quis lectus in en', 'newminer@utep.edu', '2013-09-25 23:17:56', '2013-09-25 23:17:56');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
