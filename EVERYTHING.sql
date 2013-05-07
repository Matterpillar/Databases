-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2013 at 10:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` int(3) NOT NULL DEFAULT '0',
  `courseName` varchar(100) NOT NULL,
  `schoolNum` int(2) DEFAULT NULL,
  `majorNum` int(3) NOT NULL,
  `courseNumber` int(3) NOT NULL,
  `numCredits` int(1) DEFAULT NULL,
  `maxCapacity` int(3) NOT NULL,
  `spotsLeft` int(3) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `schoolNum`, `majorNum`, `courseNumber`, `numCredits`, `maxCapacity`, `spotsLeft`) VALUES
(1, 'Introduction to Computer Science', 1, 198, 111, 4, 500, 500),
(2, 'Data Structures', 1, 198, 112, 4, 200, 200),
(3, 'Computer Applications for Business', 1, 198, 170, 3, 100, 100),
(4, 'Honors Seminar in Computer Science', 1, 198, 195, 1, 100, 100),
(5, 'Introduction to Discrete Structures I', 1, 198, 205, 4, 100, 100),
(6, 'Introduction to Discrete Structures II', 1, 198, 206, 4, 100, 100),
(7, 'Computer Architecture', 1, 198, 211, 4, 100, 80),
(8, 'Software Methodology', 1, 198, 213, 1, 100, 100),
(9, 'Systems Programming', 1, 198, 214, 4, 100, 100),
(10, 'Principles of Programming Languages', 1, 198, 314, 4, 100, 70),
(11, 'Numerical Analysis and Computing', 1, 198, 323, 4, 100, 100),
(12, 'Numerical Methods', 1, 198, 324, 4, 100, 100),
(13, 'Introduction to Imaging and Multimedia', 1, 198, 334, 4, 100, 100),
(14, 'Principles of Information and Data Management', 1, 198, 336, 4, 100, 100),
(15, 'Design and Analysis of Computer Algorithms', 1, 198, 344, 4, 100, 100),
(16, 'Internet Technology', 1, 198, 352, 4, 100, 100),
(17, 'Internship in Computer Science', 1, 198, 395, 3, 100, 100),
(18, 'Seminar in Computers and Society', 1, 198, 405, 3, 100, 100),
(19, 'Computer Architecture II', 1, 198, 411, 4, 100, 100),
(20, 'Compilers', 1, 198, 415, 4, 100, 100),
(21, 'Operating Systems Design', 1, 198, 416, 4, 100, 100),
(22, 'Distributed Systems: Concepts and Design', 1, 198, 417, 4, 100, 100),
(23, 'Computer Security', 1, 198, 419, 4, 100, 100),
(24, 'Modeling and Simulation of Continuous Systems', 1, 198, 424, 4, 100, 100),
(25, 'Computer Methods in Statistics', 1, 198, 425, 4, 100, 100),
(26, 'Introduction to Computer Graphics', 1, 198, 428, 4, 100, 100),
(27, 'Software Engineering', 1, 198, 431, 4, 100, 100),
(28, 'Database Systems Implementation', 1, 198, 437, 4, 100, 100),
(29, 'Introduction to Artificial Intelligence', 1, 198, 440, 4, 100, 100),
(30, 'Topics in Computer Science', 1, 198, 442, 4, 100, 100),
(31, 'Topics in Computer Science', 1, 198, 443, 4, 100, 100),
(32, 'Topics in Computer Science', 1, 198, 444, 4, 100, 100),
(33, 'Formal Languages and Automata', 1, 198, 452, 3, 100, 100),
(34, 'Independent Study in Computer Science', 1, 198, 493, 4, 100, 100),
(35, 'Precalculus', 1, 640, 115, 4, 100, 100),
(36, 'Calculus 2', 1, 640, 152, 4, 100, 100),
(37, 'Linear Algebra', 1, 640, 250, 4, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `hasreceivedspnum`
--

CREATE TABLE IF NOT EXISTS `hasreceivedspnum` (
  `netid` char(8) NOT NULL,
  `SPNum` bigint(10) NOT NULL,
  KEY `netid` (`netid`),
  KEY `SPNum` (`SPNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hastaken`
--

CREATE TABLE IF NOT EXISTS `hastaken` (
  `netid` char(8) NOT NULL DEFAULT '',
  `courseID` int(3) NOT NULL DEFAULT '0',
  `gradeEarned` char(2) DEFAULT NULL,
  PRIMARY KEY (`netid`,`courseID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hastaken`
--

INSERT INTO `hastaken` (`netid`, `courseID`, `gradeEarned`) VALUES
('maraneta', 1, 'A'),
('maraneta', 35, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `managesspnumsfor`
--

CREATE TABLE IF NOT EXISTS `managesspnumsfor` (
  `netid` char(8) NOT NULL,
  `courseID` int(3) NOT NULL,
  `sectionNumber` int(3) NOT NULL,
  KEY `netid` (`netid`),
  KEY `sectionNumber` (`sectionNumber`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE IF NOT EXISTS `prerequisite` (
  `courseID` int(3) NOT NULL,
  `prereqCourseID` int(3) NOT NULL,
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prerequisite`
--

INSERT INTO `prerequisite` (`courseID`, `prereqCourseID`) VALUES
(1, 35),
(2, 1),
(5, 36),
(5, 1),
(6, 5),
(7, 2),
(8, 2),
(9, 2),
(10, 5),
(10, 7),
(11, 36),
(11, 37),
(12, 11),
(13, 2),
(13, 6),
(14, 2),
(14, 5),
(15, 2),
(15, 6),
(16, 6),
(16, 7),
(19, 7),
(20, 7),
(20, 10),
(21, 9),
(22, 21),
(23, 5),
(23, 21),
(24, 11),
(25, 6),
(25, 36),
(26, 2),
(26, 36),
(26, 37),
(27, 8),
(28, 9),
(28, 14),
(29, 10),
(33, 15);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `netid` char(8) NOT NULL DEFAULT '',
  `password` char(20) NOT NULL,
  `firstName` char(20) DEFAULT NULL,
  `lastName` char(20) DEFAULT NULL,
  `securityQuestion` char(100) DEFAULT NULL,
  `securityAnswer` char(30) DEFAULT NULL,
  PRIMARY KEY (`netid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`netid`, `password`, `firstName`, `lastName`, `securityQuestion`, `securityAnswer`) VALUES
('aborgida', 'pie', 'Alex', 'Borgida', 'What street did you live on in third grade?', 'Cool Drive'),
('marsic', 'steak', 'Ivan', 'Marsic', 'What street did you live on in third grade?', 'Marsic Drive');

-- --------------------------------------------------------

--
-- Table structure for table `requestsspnum`
--

CREATE TABLE IF NOT EXISTS `requestsspnum` (
  `netid` char(8) NOT NULL,
  `courseID` int(3) NOT NULL,
  `sectionNumber` int(3) NOT NULL,
  `timeReq` char(20) NOT NULL,
  `comments` char(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  KEY `netid` (`netid`),
  KEY `courseID` (`courseID`),
  KEY `sectionNumber` (`sectionNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sectionstaught`
--

CREATE TABLE IF NOT EXISTS `sectionstaught` (
  `sectionNumber` int(3) NOT NULL,
  `courseID` int(3) NOT NULL DEFAULT '0',
  `numRegistered` int(3) DEFAULT NULL,
  `netid` char(8) DEFAULT NULL,
  `sectionMax` int(3) DEFAULT NULL,
  PRIMARY KEY (`sectionNumber`,`courseID`),
  KEY `courseID` (`courseID`),
  KEY `netid` (`netid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialpermissionnumber`
--

CREATE TABLE IF NOT EXISTS `specialpermissionnumber` (
  `SPNum` bigint(10) NOT NULL DEFAULT '0',
  `courseID` int(3) DEFAULT NULL,
  `sectionNumber` int(3) DEFAULT NULL,
  `netid` char(8) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`SPNum`),
  KEY `courseID` (`courseID`),
  KEY `sectionNumber` (`sectionNumber`),
  KEY `netid` (`netid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `netid` char(8) NOT NULL DEFAULT '',
  `password` char(20) NOT NULL,
  `firstName` char(20) DEFAULT NULL,
  `lastName` char(20) DEFAULT NULL,
  `securityQuestion` char(100) DEFAULT NULL,
  `securityAnswer` char(30) DEFAULT NULL,
  `RUID` int(9) DEFAULT NULL,
  `major` char(30) NOT NULL,
  `numCredits` int(3) NOT NULL,
  `graduationMonth` int(2) NOT NULL,
  `graduationYear` int(4) NOT NULL,
  PRIMARY KEY (`netid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`netid`, `password`, `firstName`, `lastName`, `securityQuestion`, `securityAnswer`, `RUID`, `major`, `numCredits`, `graduationMonth`, `graduationYear`) VALUES
('maraneta', 'pie', 'Matt', 'Araneta', 'What street did you live on in third grade?', 'Ruppert Drive', 132003662, 'Computer Science', 100, 5, 2013);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasreceivedspnum`
--
ALTER TABLE `hasreceivedspnum`
  ADD CONSTRAINT `hasreceivedspnum_ibfk_1` FOREIGN KEY (`netid`) REFERENCES `student` (`netid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasreceivedspnum_ibfk_2` FOREIGN KEY (`SPNum`) REFERENCES `specialpermissionnumber` (`SPNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hastaken`
--
ALTER TABLE `hastaken`
  ADD CONSTRAINT `hastaken_ibfk_1` FOREIGN KEY (`netid`) REFERENCES `student` (`netid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hastaken_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managesspnumsfor`
--
ALTER TABLE `managesspnumsfor`
  ADD CONSTRAINT `managesspnumsfor_ibfk_1` FOREIGN KEY (`netid`) REFERENCES `professor` (`netid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managesspnumsfor_ibfk_2` FOREIGN KEY (`sectionNumber`) REFERENCES `sectionstaught` (`sectionNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managesspnumsfor_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD CONSTRAINT `prerequisite_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requestsspnum`
--
ALTER TABLE `requestsspnum`
  ADD CONSTRAINT `requestsspnum_ibfk_1` FOREIGN KEY (`netid`) REFERENCES `student` (`netid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requestsspnum_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requestsspnum_ibfk_3` FOREIGN KEY (`sectionNumber`) REFERENCES `sectionstaught` (`sectionNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sectionstaught`
--
ALTER TABLE `sectionstaught`
  ADD CONSTRAINT `sectionstaught_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sectionstaught_ibfk_2` FOREIGN KEY (`netid`) REFERENCES `professor` (`netid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specialpermissionnumber`
--
ALTER TABLE `specialpermissionnumber`
  ADD CONSTRAINT `specialpermissionnumber_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `specialpermissionnumber_ibfk_2` FOREIGN KEY (`sectionNumber`) REFERENCES `sectionstaught` (`sectionNumber`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `specialpermissionnumber_ibfk_3` FOREIGN KEY (`netid`) REFERENCES `student` (`netid`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
