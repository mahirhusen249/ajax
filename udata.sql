-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 06:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udata`
--

-- --------------------------------------------------------

--
-- Table structure for table `utbl`
--

CREATE TABLE `utbl` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utbl`
--

INSERT INTO `utbl` (`id`, `fname`, `lname`, `mobileno`, `email`, `password`, `gender`, `date`) VALUES
(1, 'Mahirhusen', 'Shaikh', '07621878605', 'mahirkhan85673@gmail.com', '12345', 'male', '2024-09-28'),
(2, 'tahir', 'murtuamiya', '07621876605', 'tahirkhan85673@gmail.com', '1234', 'male', '2024-09-27'),
(3, 'arman', 'agariya', '9666465170', 'arman@gmail.com', '12345', 'male', '2024-09-28'),
(4, 'mohmad', ' nedriya', '12349876', 'mohmad@gmail.com', '1234', 'male', '2024-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utbl`
--
ALTER TABLE `utbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utbl`
--
ALTER TABLE `utbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
