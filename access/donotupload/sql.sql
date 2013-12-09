-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 
-- Database: `users`
-- 
-- 
-- --------------------------------------------------------

-- 
-- Table structure for table `config`
-- 

CREATE TABLE `config` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) TYPE=MyISAM;

-- 
-- Dumping data for table `config`
-- 

INSERT INTO `config` (`name`, `value`) VALUES 
('language', 'en');

-- --------------------------------------------------------

-- 
-- Table structure for table `members`
-- 

CREATE TABLE `members` (
  `id` int(32) NOT NULL auto_increment,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `regkey` varchar(255) NOT NULL,
  `regip` varchar(255) NOT NULL,
  `lastip` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `members`
-- 

INSERT INTO `members` (`id`, `user`, `pass`, `email`, `fname`, `lname`, `regkey`, `regip`, `lastip`, `admin`) VALUES 
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator@script.com', 'Administrator', '', '', '', '', 1);
