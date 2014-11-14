-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2014 at 09:07 PM
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
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FavoriteTeam` varchar(30) NOT NULL,
  PRIMARY KEY (`CustomerID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Password`, `FavoriteTeam`) VALUES
(5, 'Lionel', 'Messi', 'lmessi@barca.com', 'lmessi', 'Barcelona'),
(6, 'Cristiano', 'Ronaldo', 'cronaldo@madrid.com', 'cronaldo', 'Madrid'),
(7, 'Andres', 'Iniesta', 'ainiesta@barca.com', 'ainiesta', 'Barcelona'),
(8, 'Eden', 'Hazard', 'ehazard@chelsea.com', 'chelsea', 'Chelsea'),
(9, 'Jack', 'Wilshere', 'jwilshere@arsenal.com', 'arsenal', 'Arsenal'),
(10, 'cesc', 'fabregas', 'cfab@barca.com', 'cgabs', 'Barcelona'),
(11, 'Zlatan', 'Ibrahimovic', 'ibra@psg.com', 'zlatan', 'Barcelona');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
