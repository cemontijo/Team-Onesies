-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2013 at 09:46 AM
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
  `chosen` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`id`, `name`, `date_modified`, `date_created`, `creator`, `chosen`) VALUES
(1, 'my monitor 1', '2013-11-26 04:20:34', '0000-00-00 00:00:00', 'cemontijo@live.com', 0),
(2, 'MyMonitor 2', '2013-11-26 04:20:16', '0000-00-00 00:00:00', 'cemontijo@live.com', 0),
(3, 'my monitor 33', '2013-11-27 03:55:31', '0000-00-00 00:00:00', 'cemontijo@live.com', 0),
(4, 'montior 4', '2013-12-05 08:42:10', '0000-00-00 00:00:00', 'cemontijo@live.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
