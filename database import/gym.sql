-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2014 at 12:42 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE IF NOT EXISTS `bmi` (
  `memberId` varchar(10) NOT NULL,
  `date` varchar(200) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`memberId`, `date`, `weight`) VALUES
('4992', '2014-11-9', 4),
('df', '2014-11-9', 65),
('df', '2014-11-9', 87),
('df', '2014-11-9', 87),
('4992', '2014-11-9', 4),
('4992', '2014-11-20', 3),
('4992', '2014-11-20', 2),
('4992', '2014-11-20', 2),
('4992', '2014-11-20', 66),
('11', '2014-11-21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cardio`
--

CREATE TABLE IF NOT EXISTS `cardio` (
  `memberId` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `distance` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardio`
--

INSERT INTO `cardio` (`memberId`, `date`, `distance`, `duration`) VALUES
('4992', '0000-00-00', 3, 3),
('4992', '2014-11-17', 5, 56),
('4992', '2014-11-20', 17, 6),
('4992', '2014-11-20', 4, 4),
('4992', '2014-11-20', 17, 22),
('4992', '2014-11-20', 443, 1222),
('4992', '2014-11-20', 3, 4),
('11', '2014-11-21', 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberId` varchar(16) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `fName`, `lName`, `address`, `phone`, `email`, `password`, `status`, `height`) VALUES
('df', 'dfgchv', 'drtgyh', 'f', 7, 'fg@email.com', 'qw', 2, 0),
('v', 'Rib', 'v', 'fd', 567, 'fgsss@email.coms', 'q', 2, 0),
('g', 'd', 'g', 'fg', 67, 'fg@email.com', 'q', 2, 0),
('r0029', 'Robert', 'Gabriel', 'mans', 987, 'rob@gmail.com', 'z', 2, 2),
('11', 'Robert', 'Gabriel', '5678', 1, 'rob@t', '1', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `dates` varchar(200) NOT NULL,
  `startTimes` int(11) NOT NULL,
  `trainerId` varchar(10) NOT NULL,
  `studentId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `memberId` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainerSchedule`
--

CREATE TABLE IF NOT EXISTS `trainerSchedule` (
  `trainerId` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `startTime` int(11) NOT NULL,
  `noOfHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE IF NOT EXISTS `workout` (
  `memberId` varchar(16) NOT NULL,
  `date` varchar(200) NOT NULL,
  `setId` int(11) NOT NULL,
  `exerciseType` varchar(50) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`memberId`, `date`, `setId`, `exerciseType`, `reps`, `weight`) VALUES
('4992', '2014-11-17', 1, 'Back Dumbbell', 22, 10),
('4992', '2014-11-17', 2, 'Back Dumbbell', 7, 5),
('4992', '2014-11-20', 3, 'Back Dumbbell', 5, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
