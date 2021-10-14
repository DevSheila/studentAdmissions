-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 02:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `school` varchar(100) NOT NULL,
  `dep_id` varchar(20) NOT NULL,
  `dep_name` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `name`, `school`, `dep_id`, `dep_name`, `role`, `password`) VALUES
(1, 'caleb', 'computing', '1234', 'comp science', 'lecturer', '123');

-- --------------------------------------------------------

--
-- Table structure for table `docs_collected`
--

CREATE TABLE `docs_collected` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `adm_letter` varchar(200) NOT NULL,
  `kcse_certificate` varchar(200) NOT NULL,
  `id_birth_cert` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docs_collected`
--

INSERT INTO `docs_collected` (`id`, `adm_no`, `name`, `adm_letter`, `kcse_certificate`, `id_birth_cert`, `status`, `date_submitted`) VALUES
(2, 'CCS/00215/019', 'sheila', '1633703399_stud_admissions.txt', '1633703399_sendmailConfig.txt', '1633703399_pht-wk7.txt', 'approved', '0000-00-00'),
(6, 'jane joe', 'CCS/00220/019', '1634203918_schema.txt', '1634203918_databaseSetup.txt', '1634203918_pht-wk7.txt', 'complete', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE `movement` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adm_no` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `date_reported` date NOT NULL,
  `placement` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `eligibility` varchar(20) NOT NULL,
  `finance_status` varchar(20) NOT NULL,
  `fees_amount` varchar(20) NOT NULL,
  `hostel_residence` varchar(20) NOT NULL,
  `hostel_name` varchar(20) NOT NULL,
  `hostel_room_no` varchar(20) NOT NULL,
  `officer_name` varchar(20) NOT NULL,
  `officer_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nominal_roll`
--

CREATE TABLE `nominal_roll` (
  `id` int(11) NOT NULL,
  `adm_no` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fees_file` varchar(20) NOT NULL,
  `fees_total` varchar(20) NOT NULL,
  `accomodation` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nominal_roll`
--

INSERT INTO `nominal_roll` (`id`, `adm_no`, `name`, `fees_file`, `fees_total`, `accomodation`, `status`) VALUES
(1, 'CCS/00215/019', 'sheila', '1633704784_schema.tx', '300', 'non resident', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `stud_account`
--

CREATE TABLE `stud_account` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adm_no` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_account`
--

INSERT INTO `stud_account` (`id`, `name`, `adm_no`, `password`, `date_created`) VALUES
(1, 'sheila', 'CCS/00215/019', '123', '19th September'),
(2, 'jane joe', 'CCS/00220/019', '123', 'Thursday 14th of October 2021 11:47:32 AM'),
(3, 'Dian Kwamboka', 'CCS/00218/019', '123', 'Thursday 14th of October 2021 03:19:58 PM');

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
  `status` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_profile`
--

INSERT INTO `stud_profile` (`id`, `adm_no`, `surname`, `other_name`, `email`, `age`, `DOB`, `course`, `gender`, `image`, `phone`, `status`, `password`) VALUES
(17, 'CI/00283/017', 'Olive', 'Njeri', 'olvenjeri21@gmail.com', 0, '2002-01-01', 'BSc. Computer Informatics', 'Female', '', 2147483647, 'approved', '123456789'),
(18, 'CCT/00329/019', 'Oliver', 'Russel M', 'olrus@gmail.com', 0, '2000-03-21', 'BSc. Computer Science', 'Male', '', 723383532, 'declined', '123456789'),
(20, 'CCS/01111/017', 'Jakes', 'Omega', 'olrus@gmail.com', 21, '2000-03-21', 'BSc. Computer Science', 'Male', '', 723383532, 'declined', '123456789'),
(21, 'CIT/233212/21', 'Gerald', 'Fitz', 'fitzgerald@gmail.com', 20, '2001-02-01', 'BSc. Internet Technology', 'Male', '', 2147483647, 'approved', '123456789'),
(22, 'CI/021343/019', 'Jane', 'Njeri', 'njerijane@maseno.ac.ke', 22, '1999-12-12', 'BSc. Computer Informatics', 'Female', '', 2147483647, 'approved', '12345678'),
(23, 'SCI/021943/019', 'Jale', 'Ian', 'njaleit@maseno.ac.ke', 22, '1999-12-12', 'BSc. Software Engineering', 'Male', '', 773458012, 'declined', '123456789'),
(24, 'CIS/0023/018', 'John', 'Russel M', 'jameskimusabi@gmail.com', 20, '2001-02-12', 'BSc. Computer Science', 'Male', '', 2147483647, 'declined', '123456789'),
(25, 'CCS/00197/019', 'caleb', 'chale', 'caleb@gmail.com', 20, '2001-02-12', 'BSc. Computer Science', 'Male', '', 103322109, 'declined', '987654321'),
(26, 'CCS/00209/019', 'Osiemo', 'Russel M', 'russelosiemo@gmail.com', 19, '2002-01-01', 'BSc. Computer Science', 'Male', '', 2147483647, 'approved', '123456789'),
(31, 'CCS/00215/019', 'sheila', 'sharon wambui karani', 'sheilasharon10@gmail.com', 20, '2001-02-19', 'BSc. Computer Science', 'Female', '', 7689798, 'declined', '123'),
(34, 'CCS/00220/019', 'jane joe', 'wambui', 'devsheilawambui@gmail.com', 0, '2021-09-29', 'Bsc', 'Female', '1634213114_menu.PNG', 7689798, 'complete', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs_collected`
--
ALTER TABLE `docs_collected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominal_roll`
--
ALTER TABLE `nominal_roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_account`
--
ALTER TABLE `stud_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_profile`
--
ALTER TABLE `stud_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `docs_collected`
--
ALTER TABLE `docs_collected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movement`
--
ALTER TABLE `movement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominal_roll`
--
ALTER TABLE `nominal_roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stud_account`
--
ALTER TABLE `stud_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stud_profile`
--
ALTER TABLE `stud_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
