-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 10:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Chip`
--

-- --------------------------------------------------------

--
-- Table structure for table `Fav_Subject`
--

CREATE TABLE `Fav_Subject` (
  `subj_ID` int(11) NOT NULL,
  `subj_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Fav_Subject`
--

INSERT INTO `Fav_Subject` (`subj_ID`, `subj_name`, `quantity`) VALUES
(1, 'Math', 7),
(2, 'English/Reading', 5),
(3, 'Science', 2),
(4, 'History', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Fav_Subject`
--
ALTER TABLE `Fav_Subject`
  ADD PRIMARY KEY (`subj_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Fav_Subject`
--
ALTER TABLE `Fav_Subject`
  MODIFY `subj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
