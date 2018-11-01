-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 07:46 PM
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
-- Table structure for table `emp_accounts`
--

CREATE TABLE `emp_accounts` (
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

-- --------------------------------------------------------

--
-- Table structure for table `guest_accounts`
--

CREATE TABLE `guest_accounts` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incident_name`
--

CREATE TABLE `incident_name` (
  `Incident_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` varchar(5) NOT NULL,
  `Incident_name` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Urgency_level` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `reportedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_accounts`
--
ALTER TABLE `emp_accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `guest_accounts`
--
ALTER TABLE `guest_accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
