-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 24, 2008 at 02:19 PM
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
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL auto_increment,
  `category` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` VALUES (1, 'Processor');
INSERT INTO `categories` VALUES (2, 'Motherboard');
INSERT INTO `categories` VALUES (3, 'Hard Disk Drive');
INSERT INTO `categories` VALUES (5, 'UPS');
INSERT INTO `categories` VALUES (8, 'Monitor');
INSERT INTO `categories` VALUES (7, 'RAM');
INSERT INTO `categories` VALUES (9, 'Networking Products');

-- --------------------------------------------------------

-- 
-- Table structure for table `items`
-- 

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
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
INSERT INTO `items` VALUES (4, 'Intel', 1, 'PCS', 5000, 5500);
INSERT INTO `items` VALUES (5, 'Twinmos', 7, 'pcs', 1200, 1300);
INSERT INTO `items` VALUES (6, 'Netech', 5, 'PCS', 2500, 2600);

-- --------------------------------------------------------

-- 
-- Table structure for table `purchase_details`
-- 

DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `pur_dtl_id` int(11) NOT NULL auto_increment,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY  (`pur_dtl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `purchase_details`
-- 

INSERT INTO `purchase_details` VALUES (1, 3, 2, 45, 50, 5);
INSERT INTO `purchase_details` VALUES (2, 3, 6, 2500, 2600, 5);
INSERT INTO `purchase_details` VALUES (3, 5, 2, 6000, 6500, 2);
INSERT INTO `purchase_details` VALUES (4, 6, 2, 6000, 6500, 2);
INSERT INTO `purchase_details` VALUES (5, 6, 5, 1200, 1300, 3);
INSERT INTO `purchase_details` VALUES (6, 7, 5, 1200, 1300, 5);
INSERT INTO `purchase_details` VALUES (7, 7, 6, 2500, 2600, 5);
INSERT INTO `purchase_details` VALUES (8, 7, 4, 5600, 5600, 5);
INSERT INTO `purchase_details` VALUES (9, 8, 4, 5000, 5500, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `purchase_mst`
-- 

DROP TABLE IF EXISTS `purchase_mst`;
CREATE TABLE IF NOT EXISTS `purchase_mst` (
  `purchase_id` int(11) NOT NULL auto_increment,
  `supplier_id` int(11) NOT NULL,
  `mrr_number` int(11) NOT NULL,
  `mrr_date` date NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `discount_amount` float NOT NULL,
  PRIMARY KEY  (`purchase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `purchase_mst`
-- 

INSERT INTO `purchase_mst` VALUES (1, 2, 4578, '2008-05-07', 47878745, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (2, 2, 45636, '2008-05-07', 4587, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (3, 2, 7878, '2008-05-07', 4587845, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (4, 1, 8977, '2008-05-07', 789, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (5, 1, 78789, '2008-05-07', 475, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (6, 2, 7878, '2008-05-07', 456, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (7, 1, 333, '2008-05-07', 6666, '2008-05-07', 0, 0);
INSERT INTO `purchase_mst` VALUES (8, 2, 222, '2008-05-07', 33333, '2008-05-07', 10, 505);

-- --------------------------------------------------------

-- 
-- Table structure for table `suppliers`
-- 

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL auto_increment,
  `supplier_name` varchar(200) collate latin1_general_ci NOT NULL,
  `address` text collate latin1_general_ci NOT NULL,
  `phone` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`supplier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `suppliers`
-- 

INSERT INTO `suppliers` VALUES (1, 'Flora', 'Dhanmondi', '88244545145', 'flora@yahoo.com');
INSERT INTO `suppliers` VALUES (2, 'Excel Technology', 'Dhanmondi', '8888888', 'excelbd@yahoo.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
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
