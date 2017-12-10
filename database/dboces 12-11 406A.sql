-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 09:05 PM
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
-- Table structure for table `tblcourses`
--

CREATE TABLE `tblcourses` (
  `Course` varchar(100) NOT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourses`
--

INSERT INTO `tblcourses` (`Course`, `Department`) VALUES
('Basic Education Department', 'Basic Education'),
('Bachelor of Science in Criminology with Forensic Program', 'College of Criminal Justice Education and Forensics'),
('Bachelor of Science in Computer Science', 'College of Information and Communications Technology'),
('Bachelor of Science in Information Technology Major in Animation', 'College of Information and Communications Technology'),
('Bachelor of Science in Information Technology Major in Network Administration', 'College of Information and Communications Technology'),
('Bachelor of Science in Information Technology Major in Web Development', 'College of Information and Communications Technology'),
('AB Communication', 'School of Arts and Sciences'),
('Bachelor of Science in Psychology', 'School of Arts and Sciences'),
('Bachelor of Science in Accountancy', 'School of Business and Accountancy'),
('Bachelor of Science in Accounting Technology', 'School of Business and Accountancy'),
('Bachelor of Science in Business Administration Major in Banking', 'School of Business and Accountancy'),
('Bachelor of Science in Business Administration Major in Business Management', 'School of Business and Accountancy'),
('Bachelor of Science in Business Administration Major in Human Resources Development Management', 'School of Business and Accountancy'),
('Bachelor of Science in Business Administration Major in Interdisciplinary Studies', 'School of Business and Accountancy'),
('Bachelor of Science in Business Administration Major in Legal Management', 'School of Business and Accountancy'),
('Bachelor of Science in Business Administration Major in Marketing Management', 'School of Business and Accountancy'),
('Bachelor of Elementary Education', 'School of Education'),
('Bachelor of Elementary Education Major in Special Education', 'School of Education'),
('Bachelor of Physical Education Major in School Physical Education', 'School of Education'),
('Bachelor of Secondary Education Major in Biological Science', 'School of Education'),
('Bachelor of Secondary Education Major in English', 'School of Education'),
('Bachelor of Secondary Education Major in Filipino', 'School of Education'),
('Bachelor of Secondary Education Major in Mathematics', 'School of Education'),
('Bachelor of Secondary Education Major in Music, Arts, PE and Health', 'School of Education'),
('Bachelor of Secondary Education Major in Social Studies', 'School of Education'),
('Bachelor of Secondary Education Major in Values Education', 'School of Education'),
('Bachelor of Science in Aeronautical Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Architecture', 'School of Engineering and Architecture'),
('Bachelor of Science in Civil Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Computer Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Electrical Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Electronics Communication Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Industrial Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Mechanical Engineering', 'School of Engineering and Architecture'),
('Bachelor of Science in Culinary Arts Management', 'School of Hospitality and Tourism Management'),
('Bachelor of Science in Hotel and Restaurant Management', 'School of Hospitality and Tourism Management'),
('Bachelor of Science in Tourism Management', 'School of Hospitality and Tourism Management'),
('Bachelor of Science in Tourism Management Major in Events Management', 'School of Hospitality and Tourism Management'),
('Bachelor of Science in Medical Technology', 'School of Nursing and Allied Medical Sciences'),
('Bachelor of Science in Nursing', 'School of Nursing and Allied Medical Sciences'),
('Bachelor of Science in Radiologic Technology', 'School of Nursing and Allied Medical Sciences');

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
(1000000, 'Rhouleen Joy', 'Velasquez', 'Malong', '2017-06-01', 'OCES Administrator', 'College of Information and Communications Technology', 'rhouleenmalong', 'rhou123'),
(1000001, 'Ariane', 'Del Rosario', 'Nulud', '2017-10-27', 'System Administrator', 'College of Information and Communications Technology', 'arianenulud', 'ariane123'),
(1000002, 'Rhanel', 'Velasquez', 'Malong', '1963-02-27', 'OCES Administrator', 'College of Information and Communications Technology', 'rhanelmalong', 'rha123'),
(20448088, 'John Joshua', 'Tanglao', 'Jimenez', '1999-03-05', 'System Administrator', 'College of Information and Communications Technology', 'crisostomoibarra', 'ecb140a8b9b3417306c7ccd2a7bedbca');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD PRIMARY KEY (`Course`),
  ADD KEY `Department` (`Department`);

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
  MODIFY `ProgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblreports`
--
ALTER TABLE `tblreports`
  MODIFY `Activity_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblvolunteers`
--
ALTER TABLE `tblvolunteers`
  MODIFY `VolunID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD CONSTRAINT `tblcourses_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `tbldepartment` (`Department`);

--
-- Constraints for table `tblfinance`
--
ALTER TABLE `tblfinance`
  ADD CONSTRAINT `tblfinance_ibfk_1` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`) ON DELETE CASCADE;

--
-- Constraints for table `tblprograms`
--
ALTER TABLE `tblprograms`
  ADD CONSTRAINT `tblprograms_ibfk_1` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tblvolunteers_ibfk_2` FOREIGN KEY (`Activity_Code`) REFERENCES `tblreports` (`Activity_Code`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
