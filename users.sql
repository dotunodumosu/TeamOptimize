-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2019 at 02:37 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demos`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `email`, `profile_photo`) VALUES
(1, 'JamesD', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'secatmcbn@aol.com', NULL),
(2, 'Jame Maner', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'james@gmail.com', NULL),
(7, 'Fidel Agba', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'phidel@yahoo.com', NULL),
(8, 'Geofrey T', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'gtman@yahoo.com', NULL),
(10, 'Jeff T', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'jefft@gmail.com', NULL),
(12, 'Jeffery Tan', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'tanjeff@yahoo.com', NULL),
(16, 'Phidel Agba', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'wrex001@yahoo.ca', NULL),
(18, 'Jamem', 'b2371f69ae0f0fb13ba5ec44eb34a0fa', 'jamem@yahoo.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
