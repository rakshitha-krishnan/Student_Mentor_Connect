-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2023 at 03:34 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `AdminId` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `FirstName` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdminId`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
('11840207', 'Rakshitha', 'Krishnan', 'rakrish@educonnect.edu', 'rakrish@123'),
('11840257', 'Saketh', 'Rao', 'saketh@educonnect.edu', 'Saketh@123'),
('11840671', 'Vishwa', 'Raidu', 'vishwa@educonnect.edu', 'vishwa@123'),
('11840675', 'VinithVarma', 'Pathapati', 'vinithvarmapathapati@educonnect.edu', 'Vinith@123'),
('11840678', 'Shireesha', 'Kanikireddy', 'skanikir@educonnect.edu', 'skanikir@123');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `Course_ID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Domain` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_ID`, `Course_Name`, `Domain`) VALUES
('101', 'Introduction to Computer Science', 'Data Structures'),
('102', 'Data Structures and Algorithms', 'Data Structures'),
('103', 'Web Development Basics', 'Data Structures'),
('104', 'Database Management Systems', 'Data Structures'),
('105', 'Computer Networks', 'Networking'),
('106', 'Operating Systems', 'Operating Systems'),
('108', 'Artificial Intelligence', 'Artificial Intelligence'),
('109', 'Mobile App Development', 'Mobile Development'),
('111', 'Network Security', 'Networking'),
('112', 'Network Analysis', 'Networking'),
('113', 'AOS', 'Operating Systems'),
('114', 'Linux', 'Operating Systems'),
('115', 'Machine Learning', 'Artificial Intelligence'),
('116', 'Neural Networks', 'Artificial Intelligence'),
('117', 'Android Studio', 'Mobile Development'),
('118', 'Mobile Apps', 'Mobile Development');

-- --------------------------------------------------------

--
-- Table structure for table `course_approval`
--

DROP TABLE IF EXISTS `course_approval`;
CREATE TABLE IF NOT EXISTS `course_approval` (
  `R_Number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_ID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Domain_Approval` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`R_Number`,`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_approval`
--

INSERT INTO `course_approval` (`R_Number`, `Course_ID`, `Domain_Approval`) VALUES
('R101', '102', 'Approved'),
('R101', '103', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `EID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Publications` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Area_of_Expert` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_ID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`EID`, `First_Name`, `Last_Name`, `Email`, `password`, `Publications`, `Area_of_Expert`, `Course_ID`) VALUES
('E101', 'Alice', 'Smith', 'alice.smith@educonnect.edu', '63d9c147be7bdb5bfd02cdd4496363d1af5bb158bb1c3915d2203998dfe9514e', 'Networking', 'Networking', '105'),
('E102', 'Bob', 'Johnson', 'bob.johnson@educonnect.edu', 'be5ca1bf6817ec550012e3dc7a258dde9ffe4a1859409fafe46cd7d9ca7c2f84', 'Computer Networks', 'Networking', '111'),
('E103', 'Charlie', 'Brown', 'charlie.brown@educonnect.edu', '19a412265a273b46876f8604e9045457461d929b1c0dfc5992cbc73156f2b28a', 'Multipule Processors', 'Networking', '112'),
('E104', 'David', 'Davis', 'david.davis@educonnect.edu', '5f6a1504be8b4efe008354a77eb7630f26c055fc162d718de323a47f74b72b51', 'Software Modeling', 'Data Structures', '101'),
('E105', 'Eva', 'Miller', 'eva.miller@educonnect.edu', '2f67d915e2277df502f7ace10983dc2d080d77addd5876159f71a383425a3283', 'Data Mining', 'Data Structures', '102'),
('E106', 'Frank', 'Wilson', 'frank.wilson@educonnect.edu', '765ad152dac7b493e9c2201d47065ac3985baaa1b2fad13df398d55b1d02e3bf', 'Network Security', 'Data Structures', '103'),
('E107', 'Grace', 'Moore', 'grace.moore@educonnect.edu', '356922555299c4c3d866d93c46351ad90992fe23313e4c4d853e687dd2f2c69b', 'Data modeling', 'Operating Systems', '106'),
('E108', 'Henry', 'Taylor', 'henry.taylor@educonnect.edu', '7f5c89fff6640953440d567cd267971f98eaab79b1d0c4ddf37767fd7c625228', 'web pages ', 'Operating Systems', '113'),
('E109', 'Irene', 'Anderson', 'irene.anderson@educonnect.edu', '1b1bcf86ec8e15427e47a00403b293dfe62d4880b5720ede051a453de394bf9e', 'Mobile apps', 'Operating Systems', '114'),
('E110', 'Jack', 'Thomas', 'jack.thomas@educonnect.edu', 'c7bdb9f386ac4ccd7b63e6ef0be8d6979f75585226ad0da6833f271e200dc5bc', 'Software Architecture', 'Artificial Intelligence', '108'),
('E111', 'Katie', 'Jackson', 'katie.jackson@educonnect.edu', 'eae1c0ae731a5274f19270b7601490d5da7e4a3bae9f0d7cc2dd18137f493d13', 'Machine learing ', 'Artificial Intelligence', '115'),
('E112', 'Liam', 'White', 'liam.white@educonnect.edu', '04ff733dd24539f4203966dd5570350c28224fbbdf90da6710a4dc715c3f0dbe', 'Data warhouse', 'Artificial Intelligence', '116'),
('E113', 'Mia', 'Harris', 'mia.harris@educonnect.edu', 'e2a1fc5f4ff04a534d4fd71fb5cc10c2f98e66b4e8c2b23deeb8ab4946e21e74', 'Intelligent Systems', 'Mobile Development', '109'),
('E114', 'Noah', 'Martin', 'noah.martin@educonnect.edu', 'a6a176c23ac956487ad8c294cbe69d4f47422def240d22dc6db7f9b70f79e119', 'Wireless Computer Networks', 'Mobile Development', '117'),
('E115', 'Olivia', 'Thompson', 'olivia.thompson@educonnect.edu', '3dd5cd14e0d02d66578aa5480e2bbc88f33a3f4f71e7fcd59db30b21fe79927c', 'Mobile appps', 'Mobile Development', '118');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_feedback`
--

DROP TABLE IF EXISTS `instructor_feedback`;
CREATE TABLE IF NOT EXISTS `instructor_feedback` (
  `R_Number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Rating1` int NOT NULL,
  `Rating2` int NOT NULL,
  `Rating3` int NOT NULL,
  `Rating4` int NOT NULL,
  `Rating5` int NOT NULL,
  `Feedback` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`R_Number`,`Course_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_feedback`
--

INSERT INTO `instructor_feedback` (`R_Number`, `Course_Name`, `Rating1`, `Rating2`, `Rating3`, `Rating4`, `Rating5`, `Feedback`) VALUES
('R101', 'Data Structures and Algorithms', 1, 3, 1, 2, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
CREATE TABLE IF NOT EXISTS `mentor` (
  `R_Number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `EID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`R_Number`,`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`R_Number`, `EID`) VALUES
('R101', 'E104'),
('R102', 'E101');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_feedback`
--

DROP TABLE IF EXISTS `mentor_feedback`;
CREATE TABLE IF NOT EXISTS `mentor_feedback` (
  `R_Number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `EID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `MQ1` int NOT NULL,
  `MQ2` int NOT NULL,
  `MQ3` int NOT NULL,
  `MQ4` int NOT NULL,
  `MQ5` int NOT NULL,
  `MQ6` int NOT NULL,
  `MQ7` int NOT NULL,
  `MQ8` int NOT NULL,
  `MQ9` int NOT NULL,
  `MQ10` int NOT NULL,
  `feedback_completed` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`R_Number`,`EID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_feedback`
--

INSERT INTO `mentor_feedback` (`R_Number`, `EID`, `MQ1`, `MQ2`, `MQ3`, `MQ4`, `MQ5`, `MQ6`, `MQ7`, `MQ8`, `MQ9`, `MQ10`, `feedback_completed`) VALUES
('R101', 'E104', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `R_Number` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Area_of_Interest` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`R_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`R_Number`, `First_Name`, `Last_Name`, `Email`, `Area_of_Interest`, `password`) VALUES
('R101', 'Sarah', 'Johnson', 'sarah.johnson@educonnect.edu', 'Data Structures', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
('R102', 'Michael', 'Smith', 'michael.smith@educonnect.edu', 'Networking', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
('R103', 'Emily', 'Davis', 'emily.davis@educonnect.edu', 'Mobile Development', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
('R104', 'Brian', 'Wilson', 'brian.wilson@educonnect.edu', 'Networking', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
('R105', 'Brian', 'Wilson', 'brian.wilson@educonnect.edu', 'Operating Systems', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
