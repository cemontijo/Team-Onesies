-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2013 at 03:07 AM
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
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `id` varchar(255) NOT NULL,
  `dnl` varchar(255) NOT NULL,
  `rule_string` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scope_class` varchar(255) NOT NULL,
  `pattern_class` varchar(255) NOT NULL,
  `scope_statement1` varchar(255) DEFAULT NULL,
  `scope_statement2` varchar(255) DEFAULT NULL,
  `pattern_premise` varchar(255) DEFAULT NULL,
  `pattern_statement` varchar(255) DEFAULT NULL,
  `scope_string` varchar(255) DEFAULT NULL,
  `pattern_string` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `dnl`, `rule_string`, `creator`, `date_modified`, `date_created`, `scope_class`, `pattern_class`, `scope_statement1`, `scope_statement2`, `pattern_premise`, `pattern_statement`, `scope_string`, `pattern_string`) VALUES
('rule1', 'For all readings, it is never the case that the statement "temperature > 115" is true within the duration.', 'global, null, null, absence, null, temperature > 115', 'aschweighofer@miners.utep.edu', '2013-12-03 04:44:08', '2013-09-25 23:16:03', 'global', 'absence', NULL, NULL, NULL, 'temperature > 115', 'For all readings, ', 'it is never the case that the statement "temperature > 115" is true within the duration.'),
('rule2', 'TestDnl2', 'n ante orci, in fringilla lorem malesuada nec. Sed quis lectus in en', 'newminer@utep.edu', '2013-12-03 04:27:49', '2013-09-25 23:17:56', 'beforeR', 'universality', '', NULL, NULL, '', 'For all readings before the statement <scope_statement1> becomes true, ', 'it is always the case that the statement <pattern_statement> is true within the duration.'),
('rule3', 'For all readings, it is never the case that the statement "temperature <= 93" is true within the duration.', 'global, null, null, absence, null, temperature <= 93', 'aschweighofer@miners.utep.edu', '2013-12-03 05:07:00', '2013-09-25 23:16:03', 'global', 'absence', NULL, NULL, NULL, 'temperature <= 93', 'For all readings, ', 'it is never the case that the statement "temperature <= 93" is true within the duration.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
