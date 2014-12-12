-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2014 at 11:49 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberId` varchar(10) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `fName`, `lName`, `address`, `phone`, `email`, `password`, `status`, `height`) VALUES
('R00000000', 'Admin', 'Admin', 'Cork Rosa Ave 12', 893254158, 'admin@admin', 'aa', 3, 180),
('R00000001', 'Trainer', 'One', 'Cork, Bishopstown 12A', 876542158, 'trainer@one', 'to', 2, 0),
('R00000002', 'Trainer', 'Two', 'Cork, Hidden Street 6', 858957845, 'trainer@two', 'tt', 2, 0),
('R00000003', 'Trainer', 'Three', 'Cork, Model Farm Road 10', 859654712, 'trainer@three', 'tt', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `dates` varchar(20) NOT NULL,
  `startTimes` smallint(6) NOT NULL,
  `trainerId` varchar(10) NOT NULL,
  `studentId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `memberId` varchar(20) NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainerschedule`
--

CREATE TABLE IF NOT EXISTS `trainerschedule` (
  `trainerId` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `startTime` smallint(6) NOT NULL,
  `noOfHours` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainerschedule`
--

INSERT INTO `trainerschedule` (`trainerId`, `date`, `startTime`, `noOfHours`) VALUES
('R00000001', '2014-12-12', 9, 5),
('R00000001', '2014-12-13', 11, 5),
('R00000002', '2014-12-12', 12, 5),
('R00000002', '2014-12-13', 9, 5),
('R00000003', '2014-12-12', 15, 4),
('R00000003', '2014-12-13', 13, 6);

--
-- Triggers `trainerschedule`
--
DELIMITER //
CREATE TRIGGER `delete schedules` BEFORE DELETE ON `trainerschedule`
 FOR EACH ROW BEGIN 
       delete from schedules where dates = OLD.date and trainerId = OLD.trainerId;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE IF NOT EXISTS `workout` (
  `memberId` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `setId` int(11) NOT NULL,
  `exerciseType` varchar(50) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
 ADD PRIMARY KEY (`memberId`,`date`);

--
-- Indexes for table `cardio`
--
ALTER TABLE `cardio`
 ADD PRIMARY KEY (`memberId`,`date`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`memberId`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`dates`,`startTimes`,`trainerId`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `trainerschedule`
--
ALTER TABLE `trainerschedule`
 ADD PRIMARY KEY (`trainerId`,`date`,`startTime`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
 ADD PRIMARY KEY (`memberId`,`date`,`setId`,`exerciseType`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
