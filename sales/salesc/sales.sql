-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 03, 2008 at 03:23 PM
-- Server version: 5.0.33
-- PHP Version: 5.2.1
-- 
-- Database: `sales`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL auto_increment,
  `category` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` VALUES (1, 'Processor');
INSERT INTO `categories` VALUES (2, 'Motherboard');
INSERT INTO `categories` VALUES (3, 'Hard Disk Drive');
INSERT INTO `categories` VALUES (5, 'UPS');
INSERT INTO `categories` VALUES (7, 'RAM');

-- --------------------------------------------------------

-- 
-- Table structure for table `items`
-- 

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_id` int(11) NOT NULL auto_increment,
  `item_name` varchar(255) collate latin1_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `mesure_unit` varchar(50) collate latin1_general_ci NOT NULL,
  `purchase_price` float NOT NULL,
  `mrp` float NOT NULL,
  PRIMARY KEY  (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `items`
-- 

INSERT INTO `items` VALUES (2, 'Samsung', 3, 'pcs', 6000, 6500);
INSERT INTO `items` VALUES (4, 'Intel', 1, '', 0, 0);
INSERT INTO `items` VALUES (5, 'Twinmos', 7, 'pcs', 1200, 1300);
INSERT INTO `items` VALUES (6, 'Netech', 5, 'PCS', 2500, 2600);

-- --------------------------------------------------------

-- 
-- Table structure for table `purchase_details`
-- 

DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE `purchase_details` (
  `pur_dtl_id` int(11) NOT NULL auto_increment,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `mesure_unit` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`pur_dtl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `purchase_details`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `purchase_mst`
-- 

DROP TABLE IF EXISTS `purchase_mst`;
CREATE TABLE `purchase_mst` (
  `purchase_id` int(11) NOT NULL auto_increment,
  `supplier_id` int(11) NOT NULL,
  `mrr_number` int(11) NOT NULL,
  `mrr_date` date NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  PRIMARY KEY  (`purchase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `purchase_mst`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `suppliers`
-- 

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL auto_increment,
  `supplier_name` varchar(200) collate latin1_general_ci NOT NULL,
  `address` text collate latin1_general_ci NOT NULL,
  `phone` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `suppliers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_sl` int(11) unsigned NOT NULL auto_increment,
  `user_id` varchar(100) collate latin1_general_ci NOT NULL,
  `pass` binary(32) NOT NULL,
  `fname` varchar(250) collate latin1_general_ci NOT NULL,
  `lname` varchar(250) collate latin1_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`user_sl`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', 0x6531306164633339343962613539616262653536653035376632306638383365, 'Super', 'Administrator', 1);
