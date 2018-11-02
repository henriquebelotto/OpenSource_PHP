-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 09:07 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyzcompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidentcategories`
--

CREATE TABLE `incidentcategories` (
  `Incident_id` varchar(4) NOT NULL,
  `Incident_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidentcategories`
--

INSERT INTO `incidentcategories` (`Incident_id`, `Incident_name`) VALUES
('101', 'Not Found');

-- --------------------------------------------------------

--
-- Table structure for table `incidentreports`
--

CREATE TABLE `incidentreports` (
  `report_id` varchar(5) NOT NULL,
  `Incident_name` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Urgency_level` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `category_emp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`username`, `password`, `Emp_id`, `phone`, `email`, `FirstName`, `Lastname`, `Address`, `category_emp`) VALUES
('chai', '1234', '1234', '6478789749', '1234@1234.com', 'Henrique', 'Belotto', '77 Roehampton Avenue, Unit 307 - Buzz to H. Belott', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incidentcategories`
--
ALTER TABLE `incidentcategories`
  ADD PRIMARY KEY (`Incident_name`,`Incident_id`) USING BTREE;

--
-- Indexes for table `incidentreports`
--
ALTER TABLE `incidentreports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `incident_name_fk` (`Incident_name`),
  ADD KEY `email_fk` (`Email`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `Emp_id` (`Emp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incidentreports`
--
ALTER TABLE `incidentreports`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`Email`) REFERENCES `useraccounts` (`email`),
  ADD CONSTRAINT `incident_name_fk` FOREIGN KEY (`Incident_name`) REFERENCES `incidentcategories` (`Incident_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
