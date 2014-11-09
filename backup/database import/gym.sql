-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2014 at 02:39 PM
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
-- Table structure for table `cardio`
--

CREATE TABLE IF NOT EXISTS `cardio` (
  `memberId` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `distance` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardio`
--

INSERT INTO `cardio` (`memberId`, `date`, `distance`, `duration`) VALUES
('R00102430', '0000-00-00', 4, 13),
('R00102430', '0000-00-00', 3, 6),
('R00102430', '0000-00-00', 3, 6),
('R00102430', '0000-00-00', 1, 2),
('R00102430', '0000-00-00', 0, 4),
('R00102430', '0000-00-00', 3, 7);

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
  `status` int(11) NOT NULL DEFAULT '1',
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `fName`, `lName`, `address`, `phone`, `email`, `password`, `status`, `height`) VALUES
('R00102430', 'Robert', 'Gabriel', 'Manasfield House', 851499082, 'robert_gabriel@outlook.com', 'zaqwsx', 1, 0),
('R01', 'ken', 'Gabriel', 'Manfield House', 9783, 'rob@gmail.com', 'z', 2, 33444);

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

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`date`, `startTimes`, `trainerId`, `studentId`) VALUES
('2014-10-31', 11, 'R01', 'R00102430'),
('2014-10-31', 9, 'R01', 'R00102430'),
('2014-10-31', 14, 'R01', 'R00102430'),
('2014-10-31', 18, 'R01', 'R00102430'),
('2014-10-31', 12, 'R01', 'R00102430'),
('2014-10-31', 12, 'R01', 'R00102430'),
('2014-10-31', 17, 'R01', 'R00102430'),
('2014-10-31', 17, 'R01', 'R00102430');

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
('R01', '2014-10-31', 9, 28);

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE IF NOT EXISTS `workout` (
  `memberId` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `setId` int(11) NOT NULL,
  `exerciseType` varchar(200) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`memberId`, `date`, `setId`, `exerciseType`, `reps`, `weight`) VALUES
('R00102430', '0000-00-00', 0, 'Back Dumbbell', 44, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
