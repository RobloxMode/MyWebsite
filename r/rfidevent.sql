-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 08:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfidevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'labid', 'labid@gmail.com', '68053af2923e00204c3ca7c6a3150cf7');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE `tblevent` (
  `eventid` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `penalty` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbllog`
--

CREATE TABLE `tbllog` (
  `id` int(11) NOT NULL,
  `eventid` varchar(50) NOT NULL,
  `studentno` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `amin` varchar(50) NOT NULL DEFAULT '---------------',
  `amout` varchar(50) NOT NULL DEFAULT '---------------',
  `pmin` varchar(50) NOT NULL DEFAULT '---------------',
  `pmout` varchar(50) NOT NULL DEFAULT '---------------',
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `studentno` varchar(50) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `profile_picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `email`, `password`, `studentno`, `lrn`, `fullname`, `address`, `mobileno`, `program`, `section`, `profile_picture`) VALUES
(70, 'lot@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '21-00078', '123456789023456', '', 'dyan lang', '0987654353', 'BSIT', '4E', ''),
(72, 'mr@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', '22-00074', '65783526789075345', 'mr', 'dito lang', '0987654324', 'BSITE', '4e', 0x30343935333861353161376361633761616435623636626137626633616434652e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `tbllog`
--
ALTER TABLE `tbllog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbllog`
--
ALTER TABLE `tbllog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
