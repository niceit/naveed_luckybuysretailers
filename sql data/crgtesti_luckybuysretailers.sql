-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2014 at 01:57 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crgtesti_luckybuysretailers`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_merchants`
--

CREATE TABLE IF NOT EXISTS `bank_merchants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `eftpos_merchant_id` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` tinytext,
  `last_name` tinytext,
  `email` tinytext,
  `phone_mobile` char(15) DEFAULT NULL,
  `phone_business` char(15) DEFAULT NULL,
  `merchant_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `fakenames`
--

CREATE TABLE IF NOT EXISTS `fakenames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(70) CHARACTER SET latin1 NOT NULL,
  `trading_name` varchar(70) CHARACTER SET latin1 NOT NULL,
  `phone_business` tinytext CHARACTER SET latin1 NOT NULL,
  `phone_mobile` tinytext CHARACTER SET latin1 NOT NULL,
  `account_name` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `bsb` tinytext CHARACTER SET latin1,
  `account_number` tinytext CHARACTER SET latin1,
  `gender` varchar(6) CHARACTER SET latin1 NOT NULL,
  `title` varchar(6) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `middle_initial` varchar(1) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `last_name` varchar(23) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `address` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `cardholder_name` tinytext CHARACTER SET latin1,
  `suburb` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `state` varchar(22) CHARACTER SET latin1 NOT NULL,
  `postcode` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `country` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `abn` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `password` varchar(25) CHARACTER SET latin1 NOT NULL,
  `maidenname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `birthday` varchar(10) CHARACTER SET latin1 NOT NULL,
  `cctype` varchar(10) CHARACTER SET latin1 NOT NULL,
  `card_number` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `bonus_cash_amount` decimal(2,1) DEFAULT NULL,
  `CVV2` varchar(3) CHARACTER SET latin1 NOT NULL,
  `ccexpires` varchar(10) CHARACTER SET latin1 NOT NULL,
  `occupation` varchar(70) CHARACTER SET latin1 NOT NULL,
  `domain` varchar(70) CHARACTER SET latin1 NOT NULL,
  `guid` varchar(36) CHARACTER SET latin1 NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `expiry_month` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `expiry_year` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `name` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3001 ;

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `business_name` varchar(255) DEFAULT NULL,
  `abn` varchar(20) DEFAULT NULL,
  `trading_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `business_category` varchar(255) DEFAULT NULL,
  `commencement_date` date DEFAULT NULL,
  `bonus_cash_amount` int(3) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `bsb` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `ddr_t_and_c` tinyint(1) DEFAULT NULL,
  `bonuscash_t_and_c` tinyint(1) DEFAULT NULL,
  `payment_unique_id` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `merchant_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state` varchar(3) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `eftpos_supplier` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `terminals`
--

CREATE TABLE IF NOT EXISTS `terminals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bank_merchant_id` int(11) DEFAULT NULL,
  `eftpos_terminal_id` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
