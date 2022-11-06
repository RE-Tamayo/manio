-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 03:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`) VALUES
(1, 'justine', 'manio');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `gradelvl` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `gradelvl`, `section`, `user_id`, `subjects_id`) VALUES
(4, 7, '7A', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gradelvl` int(11) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `child_legit` varchar(255) NOT NULL,
  `child_pos` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `lastschool` varchar(255) NOT NULL,
  `gradelvl_lastschool` int(11) NOT NULL,
  `schoolyear_lastschool` varchar(255) NOT NULL,
  `sibling_names` text NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `mother_occupation` varchar(255) NOT NULL,
  `father_phone` varchar(255) NOT NULL,
  `mother_phone` varchar(255) NOT NULL,
  `enrollment_status` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `fname`, `mname`, `lname`, `email`, `gradelvl`, `schoolyear`, `postcode`, `barangay`, `city`, `province`, `dob`, `age`, `child_legit`, `child_pos`, `sex`, `nationality`, `religion`, `lastschool`, `gradelvl_lastschool`, `schoolyear_lastschool`, `sibling_names`, `father`, `mother`, `father_occupation`, `mother_occupation`, `father_phone`, `mother_phone`, `enrollment_status`, `section`) VALUES
(55, 17, 'ads', 'asd', 'asd', 'asd', 7, 'asd', 'asd', 'asd', 'as', 'asd', '2022-01-01', 0, 'Adopted', 'first', 'male', 'asd', 'asd', 'asd', 6, 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasd', 'asd', 'asd', 'Enrolled', '7A');

-- --------------------------------------------------------

--
-- Table structure for table `student_acc`
--

CREATE TABLE `student_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_acc`
--

INSERT INTO `student_acc` (`id`, `username`, `pwd`) VALUES
(17, 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_start` time NOT NULL,
  `subject_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `set_id`, `subject_name`, `subject_start`, `subject_end`) VALUES
(1, 1, 'Math', '09:12:40', '12:12:40'),
(2, 1, 'English', '26:12:40', '25:12:40'),
(3, 1, 'Mapeh', '12:00:00', '13:00:00'),
(4, 2, 'Hekasi', '13:00:00', '15:00:00'),
(5, 2, 'TLE', '16:00:00', '18:00:00'),
(6, 2, 'Filipino', '09:12:40', '12:12:40'),
(7, 3, 'History', '21:59:06', '21:59:06'),
(8, 3, 'Physics', '21:59:06', '21:59:06'),
(9, 3, 'Astronomy', '21:59:06', '21:59:06'),
(10, 4, 'Computer Science', '21:59:06', '21:59:06'),
(11, 4, 'Chemistry', '21:59:06', '21:59:06'),
(12, 4, 'Physical Education', '21:59:06', '21:59:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_acc`
--
ALTER TABLE `student_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `student_acc`
--
ALTER TABLE `student_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student_acc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
