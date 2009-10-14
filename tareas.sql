-- phpMyAdmin SQL Dump
-- version 3.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2009 at 07:06 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tareas`
--

-- --------------------------------------------------------

--
-- Table structure for table `debt`
--

CREATE TABLE IF NOT EXISTS `debt` (
  `idDebt` int(11) NOT NULL AUTO_INCREMENT,
  `idUser1` int(11) NOT NULL,
  `idUser2` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`idDebt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `debt`
--


-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `idTask` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `week` varchar(20) NOT NULL,
  PRIMARY KEY (`idTask`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `task`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

