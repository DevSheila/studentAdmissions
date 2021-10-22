-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 12:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stud_admissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_profile`
--

CREATE TABLE `stud_profile` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `other_name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `age` int(11) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `course` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_profile`
--

INSERT INTO `stud_profile` (`id`, `adm_no`, `surname`, `other_name`, `email`, `age`, `DOB`, `course`, `gender`, `image`, `phone`, `password`) VALUES
(17, 'CI/00283/017', 'Olive', 'Njeri', 'olvenjeri21@gmail.com', 0, '2002-01-01', 'BSc. Computer Informatics', 'Female', '', 2147483647, '123456789'),
(18, 'CCT/00329/019', 'Oliver', 'Russel M', 'olrus@gmail.com', 0, '2000-03-21', 'BSc. Computer Science', 'Male', '', 723383532, '123456789'),
(19, 'CCS/00232/018', 'Tanui', 'Kelvin', 'olrus@gmail.com', 22, '2000-03-21', 'BSc. Computer Science', 'Male', '', 723383532, '123456789'),
(20, 'CCS/01111/017', 'Jakes', 'Omega', 'olrus@gmail.com', 21, '2000-03-21', 'BSc. Computer Science', 'Male', '', 723383532, '123456789'),
(21, 'CIT/233212/21', 'Gerald', 'Fitz', 'fitzgerald@gmail.com', 20, '2001-02-01', 'BSc. Internet Technology', 'Male', '', 2147483647, '123456789'),
(22, 'CI/021343/019', 'Jane', 'Njeri', 'njerijane@maseno.ac.ke', 22, '1999-12-12', 'BSc. Computer Informatics', 'Female', '', 2147483647, '12345678'),
(23, 'SCI/021943/019', 'Jale', 'Ian', 'njaleit@maseno.ac.ke', 22, '1999-12-12', 'BSc. Software Engineering', 'Male', '', 773458012, '123456789'),
(24, 'CIS/0023/018', 'John', 'Russel M', 'jameskimusabi@gmail.com', 20, '2001-02-12', 'BSc. Computer Science', 'Male', '', 2147483647, '123456789'),
(25, 'CCS/00197/019', 'caleb', 'chale', 'caleb@gmail.com', 20, '2001-02-12', 'BSc. Computer Science', 'Male', '', 103322109, '987654321'),
(26, 'CCS/00209/019', 'Osiemo', 'Russel M', 'russelosiemo@gmail.com', 19, '2002-01-01', 'BSc. Computer Science', 'Male', '', 2147483647, '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stud_profile`
--
ALTER TABLE `stud_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stud_profile`
--
ALTER TABLE `stud_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
