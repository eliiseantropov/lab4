-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2017 at 10:19 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `BookID` char(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Pages` int(11) DEFAULT NULL,
  `Edition` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Company` varchar(255) DEFAULT NULL,
  `Author` varchar(255) NOT NULL,
  `Onloan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`BookID`, `Title`, `Pages`, `Edition`, `Year`, `Company`, `Author`, `Onloan`) VALUES
('1', 'Ulysses', 732, 1, 1922, 'Sylvia Beach', 'James Joyce', 0),
('2', 'War and Peace', 1225, 1, 1869, 'The Russian Messenger', 'Leo Tolstoy', 0),
('3', 'Moby Dick', 378, 1, 1851, 'Harper&Brothers', 'Herman Melville', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment`) VALUES
(1, 'jv'),
(2, 'bhvh'),
(3, 'bhvh'),
(4, '&lt;b&gt;hello&lt;/b&gt;'),
(5, '&lt;iframe style=&quot;position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;&quot; border=&quot;0&quot; src=&quot;http://ju.se/&quot;  /&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `userNAME` varchar(255) NOT NULL,
  `userPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `userNAME`, `userPASSWORD`) VALUES
(1, 'eliise', 'b0371c80a44286dec59a802a01ca32fc83176712');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
