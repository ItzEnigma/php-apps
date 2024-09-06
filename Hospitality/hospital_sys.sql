-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 10:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `Patient` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Reserve_Date` date NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `Patient`, `Email`, `Reserve_Date`, `Creation_Date`) VALUES
(1, 'Hosam', 'hosamhosam01@gmail.com', '0000-00-00', '2024-08-25 20:09:00'),
(2, 'hosam', 'testemail@gmail.com', '2024-08-15', '2024-08-25 20:12:41'),
(3, 'hosam', 'testemail@gmail.com', '2024-08-15', '2024-08-25 20:12:44'),
(4, 'hosam2', 'testemail@gmail.com', '2024-08-15', '2024-08-25 20:14:38'),
(5, 'hosam2', 'testemail@gmail.com', '2024-08-15', '2024-08-25 20:15:11'),
(7, 'ItzEnigma', 'enigma@gmail.com', '2024-08-29', '2024-08-25 20:36:35'),
(8, 'Mohamed', 'mohamed_mail@live.com', '2024-09-04', '2024-08-25 20:36:53'),
(9, 'Enigma', 'testemai2l@gmail.com', '2024-11-08', '2024-08-25 20:37:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
