-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2014 at 01:36 PM
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
('R00102430', 'Robert', 'Gabriel', 'fdghjkl', 851499082, '', 'z', 1, 0),
('R00102431', 'Trainer', 'Batman', 'fghj', 567, 'gtirob@gmail.com', 'zaq', 2, 0);

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
('2014-10-26', 11, 'R00102431', 'R00102430'),
('2014-10-26', 2, 'R00102431', 'R00102430'),
('2014-10-11', 10, 'R00102430', 'R00102430'),
('2014-10-11', 11, 'R00102430', 'R00102430');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `memberId` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`memberId`, `color`) VALUES
('R00102430', '#fdcdf3'),
('R00102430', '#ff0000');

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
('R00102430', '2014-10-11', 10, 2),
('R183728', '2014-10-11', 9, 16),
('R00102430', '2014-10-11', 11, 4);

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
('R00102430', '2014-10-23', 1, 'DeadLift', 2, 3),
('R00102430', '2014-10-24', 3, 'Lifts', 3, 123),
('R00102430', '0000-00-00', 0, 'Bicep Dumbbell', 1, 11),
('R00102430', '0000-00-00', 0, 'Bicep Dumbbell', 1, 11),
('R00102430', '0000-00-00', 0, 'Shoulders Dumbbell', 4, 11),
('R00102430', '0000-00-00', 0, 'Shoulders Dumbbell', 4, 11),
('R00102430', '0000-00-00', 0, 'Shoulders Dumbbell', 5, 19),
('R00102430', '0000-00-00', 0, 'Shoulders Dumbbell', 15, 118),
('R00102430', '2014-10-26', 0, 'Bicep Dumbbell', 15, 131),
('R00102430', '2014-10-26', 0, 'Shoulders Dumbbell', 6, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
