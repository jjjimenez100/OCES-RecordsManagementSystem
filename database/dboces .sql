-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 08:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dboces`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `Department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`Department`) VALUES
('CICT');

-- --------------------------------------------------------

--
-- Table structure for table `tblreports`
--

CREATE TABLE `tblreports` (
  `Activity_Code` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Activity_Title` varchar(100) NOT NULL,
  `Proponents` varchar(250) DEFAULT NULL,
  `Beneficiaries` varchar(250) DEFAULT NULL,
  `Accomplished_Objectives` varchar(250) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Venue` varchar(150) DEFAULT NULL,
  `Time_Implemented` varchar(50) NOT NULL,
  `Brief_Narrative` text NOT NULL,
  `Actual_Participation` varchar(200) DEFAULT NULL,
  `File_Activity` varchar(150),
  `School_Year` varchar(10) DEFAULT NULL,
  `Semester` varchar(10) DEFAULT NULL,
  `Remarks` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Date_Of_Employment` date DEFAULT NULL,
  `Position_Level` varchar(50) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserID`, `First_Name`, `Middle_Name`, `Last_Name`, `Date_Of_Employment`, `Position_Level`, `Department`, `Username`, `Password`) VALUES
(20424565, 'Ariane', 'Del Rosario', 'Nulud', '2017-10-20', 'Staff OCES', 'CICT', 'ariane011022033@hau.edu.ph', 'ariane');

-- --------------------------------------------------------

--
-- Table structure for table `tblvolunteers`
--

CREATE TABLE `tblvolunteers` (
  `Activity_Code` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Category` varchar(5) DEFAULT NULL,
  `Participation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`Department`);

--
-- Indexes for table `tblreports`
--
ALTER TABLE `tblreports`
  ADD PRIMARY KEY (`Activity_Code`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `tblvolunteers`
--
ALTER TABLE `tblvolunteers`
  ADD KEY `Activity_Code` (`Activity_Code`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblreports`
--
ALTER TABLE `tblreports`
  MODIFY `Activity_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblvolunteers`
--
ALTER TABLE `tblvolunteers`
  MODIFY `Activity_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblreports`
--
ALTER TABLE `tblreports`
  ADD CONSTRAINT `tblreports_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `tbldepartment` (`Department`) ON DELETE CASCADE;

--
-- Constraints for table `tblvolunteers`
--
ALTER TABLE `tblvolunteers`
  ADD CONSTRAINT `tblvolunteers_ibfk_1` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblvolunteers_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
