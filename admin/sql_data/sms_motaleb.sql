-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2020 at 09:02 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_motaleb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `p_contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roll` (`roll`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='student info tables created success';

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `p_contact`, `photo`, `datetime`) VALUES
(1, 'Selim Reza Swadhin', 123456, '1st', 'Dhaka', '01724063642', '123456.jpg', '2020-08-12 14:29:59'),
(2, 'Zannatul Ferdous Bonna', 123457, '2nd', 'Rajshahi', '01717018146', '123457.jpg', '2020-08-12 14:30:20'),
(3, 'hamidul islam', 123458, '3rd', 'Rongpur', '01724063643', '123458.jpg', '2020-08-12 14:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='repeat tutorial';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `date_time`) VALUES
(1, 'Selim Reza Swadhin', 'selimrezaswadhim@gmail.com', 'codeprojects', 'f37878b685c24f1549ea0ba4db4c9185', 'users_images/codeprojects.jpg', 'active', '2020-08-12 09:47:39'),
(2, 'Zannatul Ferdous Bonna', 'zannat@gmail.com', 'zannatba', 'f37878b685c24f1549ea0ba4db4c9185', 'users_images/zannatba.jpg', 'active', '2020-08-12 09:47:39'),
(3, 'hamidul islam', 'hamid@gmail.com', 'hamidul islam', 'f37878b685c24f1549ea0ba4db4c9185', 'users_images/hamidul islam.jpg', 'inactive', '2020-08-12 10:52:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
