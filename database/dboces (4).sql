-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 06:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('Basic Education'),
('College of Criminal Justice Education and Forensics'),
('College of Information and Communications Technology'),
('School of Arts and Sciences'),
('School of Business and Accountancy'),
('School of Education'),
('School of Engineering and Architecture'),
('School of Hospitality and Tourism Management'),
('School of Nursing and Allied Medical Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `tblfinance`
--

CREATE TABLE `tblfinance` (
  `FinanceID` int(11) NOT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Amount` decimal(30,2) DEFAULT NULL,
  `Activity_Code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfinance`
--

INSERT INTO `tblfinance` (`FinanceID`, `Particulars`, `Amount`, `Activity_Code`) VALUES
(2, 'qweqwe', '123.23', 21),
(3, 'qweqwe', '2.00', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblprograms`
--

CREATE TABLE `tblprograms` (
  `ProgID` int(11) NOT NULL,
  `TimeStart` varchar(255) DEFAULT NULL,
  `TimeEnd` varchar(255) DEFAULT NULL,
  `Activity` varchar(255) DEFAULT NULL,
  `PersonsResponsible` varchar(255) DEFAULT NULL,
  `Activity_Code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprograms`
--

INSERT INTO `tblprograms` (`ProgID`, `TimeStart`, `TimeEnd`, `Activity`, `PersonsResponsible`, `Activity_Code`) VALUES
(2, 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 21);

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
  `School_Year` varchar(10) DEFAULT NULL,
  `Semester` varchar(10) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreports`
--

INSERT INTO `tblreports` (`Activity_Code`, `UserID`, `Activity_Title`, `Proponents`, `Beneficiaries`, `Accomplished_Objectives`, `Date`, `Venue`, `Time_Implemented`, `Brief_Narrative`, `Actual_Participation`, `School_Year`, `Semester`, `Remarks`) VALUES
(1, 1000000, 'qweqw', 'eqweqwe', 'qweqw', 'eqweqweqwe', '0000-00-00', 'qweqw', 'eqwe', 'qweqweqwe', 'qweqweqweqwe', '2017-2018', '2nd Semest', '1'),
(2, 1000000, 'qweqw', 'eqweq', 'weqwe', 'qweqwe', '1967-12-19', 'qweqwe', 'qweqw', 'eqweqweqe', 'qweqweqeqwe', '2017-2018', '2nd Semest', '1'),
(3, 1000000, 'qwe', 'qweqe', 'qwe', 'qweqweqw', '1967-11-19', 'eqweq', 'weqweq', 'weqwe', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(4, 1000000, 'zxczxc', 'zxczx', 'czxc', 'zxczxc', '1967-12-19', 'zxczxc', 'zxczxc', 'zxczxczxczxczxc', 'zxczxczxc', '2017-2018', '2nd Semest', 'Pending'),
(5, 1000000, 'qweqweq', 'weqwe', 'qweq', 'weqweqwe', '1967-11-19', 'eqweqwe', 'qweqw', 'eqweqwe', 'qweqweqweqweqw', '2017-2018', '2nd Semest', 'Pending'),
(6, 1000000, 'qweqwe', 'qweq', 'weqe', 'qweqweqw', '1967-12-19', 'qweqweqw', 'eqweqwe', 'qweqweqwe', 'qweqweqweqw', '2017-2018', '2nd Semest', 'Pending'),
(7, 1000000, 'qweqwe', 'qweqwe', 'qweq', 'weqwe', '1967-11-18', 'qweqweq', 'weqwe', 'qweqweqwe', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(8, 1000000, 'zdasdas', 'dasd', 'asdasd', 'asdasd', '1967-11-17', 'adasdas', 'dasd', 'asdasd', 'eqweqweqweq', '2017-2018', '2nd Semest', 'Pending'),
(9, 1000000, 'qweqwe', 'qweqw', 'eqwe', 'qweqwe', '1968-12-18', 'qweqweq', 'weqwe', 'qweqwe', 'weqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(10, 1000000, 'eqweqwe', 'qwe', 'qweqwe', 'qweqwe', '1967-11-19', 'qeqweqwe', 'qwe', 'qweqweqweqw', 'qweqweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(11, 1000000, '2', '3', '1', 'eqweqwe', '1967-12-18', 'qweqwe', 'qweqwe', 'qweqweq', 'qweqweqweqweqw', '2017-2018', '2nd Semest', 'Pending'),
(12, 1000000, '11', '1', '1', 'eqweqwe', '1967-10-17', 'qweqwe', 'qwe', 'qweqweqweqw', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(13, 1000000, 'qweq', 'weqweqwe', 'qweqwe', 'qweqweqwe', '1968-12-19', 'qweqwe', 'qweqw', 'eqweqwe', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(14, 1000000, 'qweqwe', 'qweqw', 'eqwe', 'qweqwe', '1968-12-19', 'qweqw', 'eqwe', 'qweqwe', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(15, 1000000, 'qweqw', 'eqwe', 'qweqwe', 'qweqwe', '1968-11-18', 'qweqw', 'eqwe', 'qweqweqwe', 'qweqweqw', '2017-2018', '2nd Semest', 'Pending'),
(16, 1000000, 'qweqweqwe', 'qweq', 'weqwe', 'qweqwe', '1967-11-18', 'qweqw', 'eqwe', 'qweqweqwe', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(17, 1000000, 'awdawda', 'wdawd', 'dawd', 'awdawd', '1967-11-21', 'qwdqwd', 'qwdqwdqwd', 'qwdqwdqwd', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending'),
(18, 1000000, 'qweqw', 'eqwe', 'qweqwe', 'qweqwe', '1968-12-19', 'qweqw', 'eqweq', 'qweqweqq', 'qeqwe', '2017-2018', '2nd Semest', 'Pending'),
(19, 1000000, 'qwe', 'qweqw', 'eqwe', 'qweqwe', '1968-12-18', 'eqwe', 'qweq', 'weqweqwe', 'qweqwe', '2017-2018', '2nd Semest', 'Pending'),
(20, 1000000, 'qwe', 'qweqwe', 'qwe', 'qweqwe', '1968-12-19', 'qweqwe', 'qweq', 'weqweqwe', 'qweqwe', '2017-2018', '2nd Semest', 'Pending'),
(21, 1000000, 'qwe', 'weqw', 'eqwe', 'qweqwe', '1967-10-19', 'qweq', 'weqwe', 'qweqweq', 'qweqweqwe', '2017-2018', '2nd Semest', 'Pending');

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
(1000000, 's', 'Test', 'Test', '1958-01-01', 'University Administrator', 'School of Hospitality and Tourism Management', 'Test', '1234'),
(1000001, 'asfafad', 'asfafa', 'asfafa', '1953-02-05', 'OCES Administrator', 'School of Engineering and Architecture', 'asgfasga', 'asfafa'),
(20448088, 'John Joshua', 'Tanglao', 'Jimenez', '1963-09-15', 'System Administrator', 'College of Information and Communications Technology', 'jjjimenez', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e');

-- --------------------------------------------------------

--
-- Table structure for table `tblvolunteers`
--

CREATE TABLE `tblvolunteers` (
  `VolunID` int(11) NOT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Participation` varchar(255) DEFAULT NULL,
  `Groups` varchar(10) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Activity_Code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvolunteers`
--

INSERT INTO `tblvolunteers` (`VolunID`, `Category`, `Participation`, `Groups`, `UserID`, `Activity_Code`) VALUES
(4, 'OCES Administrator', 'Coordination Engagement', 'A', 1000000, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`Department`);

--
-- Indexes for table `tblfinance`
--
ALTER TABLE `tblfinance`
  ADD PRIMARY KEY (`FinanceID`),
  ADD KEY `Activity_Code` (`Activity_Code`);

--
-- Indexes for table `tblprograms`
--
ALTER TABLE `tblprograms`
  ADD PRIMARY KEY (`ProgID`),
  ADD KEY `Activity_Code` (`Activity_Code`);

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
  ADD PRIMARY KEY (`VolunID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Activity_Code` (`Activity_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfinance`
--
ALTER TABLE `tblfinance`
  MODIFY `FinanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblprograms`
--
ALTER TABLE `tblprograms`
  MODIFY `ProgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblreports`
--
ALTER TABLE `tblreports`
  MODIFY `Activity_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tblvolunteers`
--
ALTER TABLE `tblvolunteers`
  MODIFY `VolunID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfinance`
--
ALTER TABLE `tblfinance`
  ADD CONSTRAINT `tblfinance_ibfk_1` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`);

--
-- Constraints for table `tblprograms`
--
ALTER TABLE `tblprograms`
  ADD CONSTRAINT `tblprograms_ibfk_1` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`);

--
-- Constraints for table `tblreports`
--
ALTER TABLE `tblreports`
  ADD CONSTRAINT `tblreports_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`UserID`);

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `tbldepartment` (`Department`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tblvolunteers`
--
ALTER TABLE `tblvolunteers`
  ADD CONSTRAINT `tblvolunteers_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`UserID`),
  ADD CONSTRAINT `tblvolunteers_ibfk_2` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
