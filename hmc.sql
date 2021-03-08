-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2021 at 06:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendant_and_gardener`
--

CREATE TABLE `attendant_and_gardener` (
  `ID` int(2) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `CONTACT` bigint(12) NOT NULL,
  `NO_OF_DAYS` int(3) DEFAULT 0,
  `TYPE` varchar(10) NOT NULL,
  `JOINING_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendant_and_gardener`
--

INSERT INTO `attendant_and_gardener` (`ID`, `NAME`, `PASSWORD`, `EMAIL_ID`, `CONTACT`, `NO_OF_DAYS`, `TYPE`, `JOINING_DATE`) VALUES
(1, 'YASEER', '', 'yaser@gmail.com', 9951509263, 1, 'Gardener', '0000-00-00'),
(4, 'Laxman', '', 'laxman@gmail.com', 9381391321, 0, 'Attendant', '0000-00-00'),
(5, 'Chandra', '', 'chandu@gmail.com', 38190809008, 0, 'Gardener', '0000-00-00'),
(8, 'Mohan', '', 'adavimohan@gmail.com', 9848131, 0, 'Gardener', '2021-02-20'),
(9, 'Aamir', 'aammir', 'aamir@gmail.com', 8466876272, 1, 'Attendant', '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CONTACT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clerk`
--

INSERT INTO `clerk` (`ID`, `NAME`, `EMAIL_ID`, `PASSWORD`, `CONTACT`) VALUES
(1, 'ALI', 'ali@gmail.com', 'aliali', '9160412341'),
(2, 'Yaseer', 'yaseerhussainshaik@gmail.com', 'zarsya', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ID` int(2) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `EMAIL_ID` varchar(50) DEFAULT NULL,
  `HALL` int(1) DEFAULT NULL,
  `ROOM` int(1) DEFAULT NULL,
  `COM_TYPE` varchar(10) DEFAULT NULL,
  `COM_DESCP` varchar(200) DEFAULT NULL,
  `COM_STATUS` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ID`, `NAME`, `EMAIL_ID`, `HALL`, `ROOM`, `COM_TYPE`, `COM_DESCP`, `COM_STATUS`) VALUES
(10, 'YASEER', 'yaseerhussainshaik@gmail.com', 1, 1, 'MESS', 'food baledu\r\n', 1),
(11, 'Hello', 'hello@gmail.com', 2, 2, 'WATER', 'fullll', 1),
(12, 'ALi', 'ali@gmail.com', 1, 1, 'OTHER', 'Descriptiom', 1),
(13, 'YASEER', 'yaseerhussainshaik@gmail.com', 1, 1, 'WATER', 'water.....', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mess_fee`
--

CREATE TABLE `mess_fee` (
  `ID` int(2) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `AMOUNT` double(40,2) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_fee`
--

INSERT INTO `mess_fee` (`ID`, `NAME`, `EMAIL_ID`, `AMOUNT`, `DATE`) VALUES
(2, 'YASEER', 'yaseerhussainshaik@gmail.com', 35000.00, '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `mess_manager`
--

CREATE TABLE `mess_manager` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CONTACT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_manager`
--

INSERT INTO `mess_manager` (`ID`, `NAME`, `EMAIL_ID`, `PASSWORD`, `CONTACT`) VALUES
(1, 'ALI', 'ali@gmail.com', 'aliali', '9160412341'),
(2, 'yaseer', 'yaseerhussainshaik@gmail.com', 'zarsya', '9951509263');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leaves`
--

CREATE TABLE `staff_leaves` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `NO_OF_DAYS` int(3) NOT NULL,
  `REASON` varchar(250) NOT NULL,
  `DATES` longtext NOT NULL,
  `MONTHS` int(2) NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_leaves`
--

INSERT INTO `staff_leaves` (`ID`, `TYPE`, `NAME`, `EMAIL_ID`, `NO_OF_DAYS`, `REASON`, `DATES`, `MONTHS`, `STATUS`) VALUES
(1, 'Gardener', 'Yaseer', 'yaser@gmail.com', 2, '', '2021-02-03', 2, 1),
(2, 'Gardener', 'Yaseer', 'yaser@gmail.com', 1, 'dont', '2021-02-03', 2, 1),
(3, 'Attendant', 'Ali', 'ali@gmail.com', 1, 'bathrrom', '2021-02-03', 2, 1),
(4, 'Attendant', 'Ali', 'ali@gmail.com', 1, 'haan', '2021-02-03', 2, 1),
(5, 'Gardener', 'Yaseer', 'yaser@gmail.com', 1, 'jdkadasjk', '2021-02-13', 2, 1),
(6, 'Gardener', 'Yaseer', 'yaser@gmail.com', 1, 'jdkadasjk', '2021-02-13', 2, 1),
(7, 'Gardener', 'Yaseer', 'yaser@gmail.com', 1, 'jdkadasjk', '2021-02-13', 2, 1),
(8, 'Gardener', 'Yaseer', 'yaser@gmail.com', 1, 'kjdla', '2021-02-13', 2, 1),
(9, 'Gardener', 'Aamir', 'aamir@gmail.com', 1, 'fjkadjk', '2021-02-27', 2, 1),
(10, 'Gardener', 'Aamir', 'aamir@gmail.com', 1, 'hkjnkjnk', '2021-02-27', 2, 1),
(11, 'Gardener', 'Aamir', 'aamir@gmail.com', 1, 'hkjnkjnk', '2021-02-27', 2, 0),
(12, 'Gardener', 'Aamir', 'aamir@gmail.com', 1, 'hkjnkjnk', '2021-02-27', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `GENDER` tinyint(1) NOT NULL,
  `EMAIL_ID` varchar(60) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `PERMANENT_ADDRESS` varchar(250) NOT NULL,
  `CONTACT` varchar(10) NOT NULL,
  `ROOM` int(2) DEFAULT NULL,
  `HALL` int(1) DEFAULT NULL,
  `AMENITIES` tinyint(1) DEFAULT 0,
  `MESS_DUES` double(20,2) DEFAULT NULL,
  `HALL_DUES` double(20,2) DEFAULT NULL,
  `BALANCE` double(40,2) NOT NULL,
  `TWIN_SHARE` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `NAME`, `GENDER`, `EMAIL_ID`, `PASSWORD`, `PERMANENT_ADDRESS`, `CONTACT`, `ROOM`, `HALL`, `AMENITIES`, `MESS_DUES`, `HALL_DUES`, `BALANCE`, `TWIN_SHARE`) VALUES
(1, 'YASEER', 1, 'yaseerhussainshaik@gmail.com', 'zarsya', '129/1-1,Alimabad Street ,Rayachoti , Kadapa-516269.', '9951509263', 1, 1, 1, 0.00, 0.00, 9200.00, 0),
(2, 'Hello', 1, 'hello@gmail.com', 'hello', 'hello world street,uk.', '123483', 2, 2, 1, 2500.00, 2500.00, 20000.00, 0),
(6, 'ALi', 1, 'ali@gmail.com', 'aliali', 'aliali', '9160412341', 1, 1, 1, 0.00, 0.00, 4000.00, 1),
(7, 'lakshman', 1, 'lakshman@gmail.com', 'lakshman', 'kadapa', '9192828287', 1, 1, 1, 2500.00, 3500.00, 10000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `EMAIL_ID` varchar(40) NOT NULL,
  `TOOL` varchar(40) NOT NULL,
  `STATUS` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`ID`, `NAME`, `EMAIL_ID`, `TOOL`, `STATUS`) VALUES
(1, 'Aamir', 'aamir@gmail.com', 'Axe,Spead,Sickle,Headge Schears,Rake', 1),
(2, 'Aamir', 'aamir@gmail.com', ',Spead,,,Rake', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CONTACT` varchar(10) NOT NULL,
  `HALL` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`ID`, `NAME`, `EMAIL_ID`, `PASSWORD`, `CONTACT`, `HALL`) VALUES
(1, 'ALI', 'ali@gmail.com', 'aliali', '9160412341', 1),
(2, 'laxman', 'laxman@gmail.com', 'laxman', '9951509263', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendant_and_gardener`
--
ALTER TABLE `attendant_and_gardener`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`,`EMAIL_ID`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mess_fee`
--
ALTER TABLE `mess_fee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `mess_manager`
--
ALTER TABLE `mess_manager`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `staff_leaves`
--
ALTER TABLE `staff_leaves`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendant_and_gardener`
--
ALTER TABLE `attendant_and_gardener`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clerk`
--
ALTER TABLE `clerk`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mess_fee`
--
ALTER TABLE `mess_fee`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mess_manager`
--
ALTER TABLE `mess_manager`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_leaves`
--
ALTER TABLE `staff_leaves`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
