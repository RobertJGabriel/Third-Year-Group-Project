-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2014 at 02:59 AM
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
  `memberId` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cardio`
--

CREATE TABLE IF NOT EXISTS `cardio` (
  `memberId` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `distance` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberId` varchar(200) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `fName`, `lName`, `address`, `phone`, `email`, `password`, `status`, `height`) VALUES
('4992', 'Robert', 'gabriel', 'twte', 0, 'rob@twitter', 'qw', 3, 22),
('44', 'keh', 'g', 'h', 0, 'rob@twitter', 'q', 2, 0),
('df', 'dfgchv', 'drtgyh', 'f', 7, 'fg@email.com', '7', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `date` date NOT NULL,
  `startTimes` int(11) NOT NULL,
  `trainerId` varchar(200) NOT NULL,
  `studentId` varchar(200) NOT NULL
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
  `trainerId` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` int(11) NOT NULL,
  `noOfHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainerSchedule`
--

INSERT INTO `trainerSchedule` (`trainerId`, `date`, `startTime`, `noOfHours`) VALUES
('44', '2014-11-14', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE IF NOT EXISTS `workout` (
  `memberId` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `setId` int(11) NOT NULL,
  `exerciseType` varchar(200) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
