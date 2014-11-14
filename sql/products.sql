-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 11:10 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `futbolclub_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(30) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `Quantity` (`Quantity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Quantity`) VALUES
(1, 'Barcelona Jersey', '95.00', 100),
(2, 'Real Madrid Jersey ', '95.00', 100),
(3, 'Bayern Munich Jersey', '95.00', 100),
(4, 'Dortmund Jersey', '95.00', 100),
(5, 'Liverpool Jersey', '95.00', 100),
(6, 'Arsenal Jersey', '95.00', 100),
(7, 'Man United Jersey', '95.00', 100),
(8, 'Chelsea Jersey', '95.00', 100),
(9, 'Man City Jersey', '95.00', 100),
(10, 'Brazil Jersey', '95.00', 100),
(11, 'Spain Jersey', '95.00', 100),
(12, 'Germany Jersey', '95.00', 100),
(13, 'Germany Gotze Jersey', '95.00', 100),
(14, 'Athletico Madrid Jersey', '85.00', 100),
(15, 'Tottehnam Jersey', '85.00', 100),
(16, 'Milan Jersey', '85.00', 100),
(17, 'PSG Jersey', '85.00', 100),
(18, 'Italy Jersey', '85.00', 100),
(19, 'Celtic Jersey ', '75.00', 100),
(20, 'Croatia Jersey', '75.00', 100),
(21, 'USA Jersey', '75.00', 100),
(22, 'NY Red Bulls Jersey', '75.00', 100),
(23, 'Marseille Jersey', '75.00', 100),
(24, 'Greece', '75.00', 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
