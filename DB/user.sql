-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2017 at 10:43 AM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `13year`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `uname`, `passwd`, `role`, `school_id`, `teacher_id`) VALUES
(1, 'Main Admin', 'admin', '$2y$10$QrS.4kNV87GNlDDGVsjFAuy/OWbh92CdZKoD5UJLwXQdByPSMB9.O', '0', NULL, NULL),
(2, 'School Coordinator', 'sadmin', '$2y$10$DL0qXLSSulaSpvLg3Bm5Hug6hrfefOU2JjmQoRFNGFf5RADXfyAGK', '1', '17141', 0),
(10, 'Finance Admin', 'finadmin', '$2y$10$9u7eDItXenjds2/HuOpa4OlnIh6l4C37ZeYEUaYXj6pG1dBTXbh6m', '2', '17141', NULL),
(12, 'P. N. S. K. Perera', 'pnskperera', '$2y$10$kWzw.pygLpS79tbkDRIp4OtxdPbsrxyN.ZlIWPtLn3O1ZuwEzzjO.', '3', '17141', 2),
(15, 'S. Coordinator', 'coord', '$2y$10$l4AEys00ljS3kxkDo1xP/O7mYAFvYTYmFF075JVyTuZCDSxRceS9q', '1', '17141', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
