-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 12:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(250) NOT NULL,
  `password` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(250) NOT NULL,
  `village` varchar(250) NOT NULL,
  `session` varchar(200) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `job` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `date`, `name`, `village`, `session`, `degree`, `job`, `email`, `account`, `mobile`, `password`, `photo`) VALUES
(2, '2019-11-16', 'Anjan Dey', 'Kachukhali', '2005', 'Bsc. Eng in CSE', 'No job', 'anjondey017@gmail.com', '01764558537', '01764558537', 'MTIzNDU=', 'images/students/1573923478.jpg'),
(3, '2019-11-18', 'kanon', 'kolaiya', '2005', 'Bsc. Eng in CSE', 'No job', 'kanon09@gmail.com', '01764558537', '01764558537', 'MTIzNDU=', 'images/students/1574071401.jpg'),
(4, '2019-11-18', 'Nobo ', 'kowya', '2005', 'Bsc. Eng in IT', 'vartsity leacherer', 'nobonkust09@gmail.com', '017635489201', '0176929821', 'MTIzNDU=', 'images/students/1574071548.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_signup`
--

CREATE TABLE `teacher_signup` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `repeat_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_signup`
--

INSERT INTO `teacher_signup` (`name`, `email`, `password`, `repeat_password`) VALUES
('HMUPHS', 'hmuphs09@gmail.com', 'MTIzNDU=', 'MTIzNDU=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
