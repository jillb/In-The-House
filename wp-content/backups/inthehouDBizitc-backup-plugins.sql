-- WordPress Backup to Dropbox SQL Dump
-- Version 1.4.3
-- http://wpb2d.com
-- Generation Time: February 6, 2013 at 18:02

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Create and use the backed up database
--

CREATE DATABASE IF NOT EXISTS inthehouDBizitc;
USE inthehouDBizitc;

--
-- Table structure for table `wp_wbz404_logs`
--

CREATE TABLE `wp_wbz404_logs` (
  `id` bigint(40) NOT NULL AUTO_INCREMENT,
  `redirect_id` bigint(40) NOT NULL,
  `timestamp` bigint(40) NOT NULL,
  `remote_host` varchar(512) NOT NULL,
  `referrer` varchar(512) NOT NULL,
  `action` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `redirect_id` (`redirect_id`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='404 Redirected Plugin Logs Table';

--
-- Dumping data for table `wp_wbz404_logs`
--

INSERT INTO `wp_wbz404_logs` (`id`, `redirect_id`, `timestamp`, `remote_host`, `referrer`, `action`) VALUES
('1', '1', '1348620557', '127.0.0.1', '', '404'),
('2', '1', '1348620559', '127.0.0.1', '', '404'),
('3', '2', '1348620570', '127.0.0.1', '', '404'),
('4', '2', '1348620575', '127.0.0.1', '', '404'),
('5', '2', '1348620598', '127.0.0.1', '', '404'),
('6', '1', '1348620604', '127.0.0.1', '', '404'),
('7', '3', '1348620628', '127.0.0.1', '', '/page-not-found/'),
('8', '1', '1348620671', '127.0.0.1', '', '404'),
('9', '4', '1348684282', '127.0.0.1', 'http://inthehouse.dev/wp-admin/themes.php?page=in-the-house-festival&section=design', 'http://inthehouse.dev/'),
('10', '5', '1349220872', '127.0.0.1', 'http://inthehouse.dev/contact/', '404');

INSERT INTO `wp_wbz404_logs` (`id`, `redirect_id`, `timestamp`, `remote_host`, `referrer`, `action`) VALUES
('11', '6', '1349220890', '127.0.0.1', '', '/thank-you-for-your-message/');

--
-- Table structure for table `wp_wbz404_redirects`
--

CREATE TABLE `wp_wbz404_redirects` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `url` varchar(512) NOT NULL,
  `status` bigint(20) NOT NULL,
  `type` bigint(20) NOT NULL,
  `final_dest` varchar(512) NOT NULL,
  `code` bigint(20) NOT NULL,
  `disabled` int(10) NOT NULL DEFAULT '0',
  `timestamp` bigint(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `type` (`type`),
  KEY `code` (`code`),
  KEY `timestamp` (`timestamp`),
  KEY `disabled` (`disabled`),
  FULLTEXT KEY `url` (`url`),
  FULLTEXT KEY `final_dest` (`final_dest`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='404 Redirected Plugin Redirects Table';

--
-- Dumping data for table `wp_wbz404_redirects`
--

INSERT INTO `wp_wbz404_redirects` (`id`, `url`, `status`, `type`, `final_dest`, `code`, `disabled`, `timestamp`) VALUES
('1', '/sldkj', '3', '0', '0', '301', '0', '1348620557'),
('2', '/dddd', '3', '0', '0', '301', '0', '1348620570'),
('3', '/page-not-found', '2', '1', '114', '301', '0', '1348620628'),
('4', '/?themepreview=1', '2', '1', '4', '301', '0', '1348684282'),
('5', '/contact/thank-you-for-your-message/', '3', '0', '0', '301', '0', '1349220872'),
('6', '/thank-you-for-your-message', '2', '1', '132', '301', '0', '1349220890');

