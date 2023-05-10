-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230509.3f09bc27c2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 08:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class` varchar(5) NOT NULL,
  `s1` varchar(15) NOT NULL,
  `s2` varchar(15) NOT NULL,
  `s3` varchar(15) NOT NULL,
  `s4` varchar(15) NOT NULL,
  `s5` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class`, `s1`, `s2`, `s3`, `s4`, `s5`) VALUES
('BE', 'ML', 'DAA', 'DL', 'Block Chain', 'VR'),
('FE', 'Math', 'Physics', 'Chemisty', 'Mechanics', 'PPL'),
('SE', 'DSA', 'PPL', 'OS', 'WT', 'DBMS'),
('TE', 'DSBDA', 'OS', 'AI', 'CC', 'ML');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `seatno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `class` varchar(5) NOT NULL,
  `m1` int(3) NOT NULL,
  `m2` int(3) NOT NULL,
  `m3` int(3) NOT NULL,
  `m4` int(3) NOT NULL,
  `m5` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `percent` float NOT NULL,
  `result` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`seatno`, `name`, `pass`, `class`, `m1`, `m2`, `m3`, `m4`, `m5`, `total`, `percent`, `result`) VALUES
('B789', 'Milind', '456', 'BE', 12, 50, 40, 34, 30, 166, 33.2, 'F'),
('S123', 'Mayur', 'abc', 'SE', 80, 70, 50, 86, 55, 341, 68.2, 'P'),
('T456', 'Dipak', '123', 'TE', 100, 100, 100, 48, 55, 403, 80.6, 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class`);

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`seatno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
