-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 08:07 AM
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
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `is_open` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `is_open`) VALUES
(1, 'Mathematics', 'MATH101', 'open'),
(2, 'Physics', 'PHYS101', 'open'),
(3, 'Chemistry', 'CHEM101', 'open'),
(4, 'Philosophy of Memes', 'MEME001', 'open'),
(5, 'Advanced Sleep Science', 'SLP202', 'close'),
(6, 'TikTok Strategy', 'SOCIAL10', 'open'),
(7, 'How to Skip Class 101', 'SKIP101', 'close'),
(8, 'Rocket Science', 'ROKT101', 'open'),
(9, 'Cooking Nasi Goreng', 'NASGOR1', 'open'),
(10, 'History of Abdul', 'ABDUL01', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL,
  `status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `course_id`, `enrollment_date`, `status`) VALUES
(1, 1, 1, '2025-02-01', 'on_going'),
(2, 2, 2, '2025-02-01', 'on_going'),
(3, 3, 3, '2025-02-01', 'on_going'),
(4, 4, 4, '2025-02-01', 'on_going'),
(5, 5, 5, '2025-02-01', 'on_going'),
(6, 6, 6, '2025-02-01', 'on_going'),
(7, 7, 7, '2025-02-01', 'on_going'),
(8, 8, 8, '2025-02-01', 'on_going'),
(9, 9, 9, '2025-02-01', 'completed'),
(10, 10, 10, '2025-02-01', 'on_going');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `join_date` date NOT NULL,
  `status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `nim`, `phone`, `join_date`, `status`) VALUES
(1, 'Abdul Gila Coding', '202501', '0812340001', '2025-01-01', 'active'),
(2, 'Abdul ngopi dulu', '202502', '0812340002', '2025-01-02', 'active'),
(3, 'Abdul The Explorer', '202503', '0812340003', '2025-01-03', 'active'),
(4, 'King Abdul', '202504', '0812340004', '2025-01-04', 'active'),
(5, 'Abdul Si Tukang Telat', '202505', '0812340005', '2025-01-05', 'active'),
(6, 'Abdul Bakso', '202506', '0812340006', '2025-01-06', 'dropout'),
(7, 'Abdul Rindu Ujian', '202507', '0812340007', '2025-01-07', 'active'),
(8, 'Abdul Coding Sampai Pagi', '202508', '0812340008', '2025-01-08', 'active'),
(9, 'Abdul Lulus Dengan Cinta', '202509', '0812340009', '2025-01-09', 'lulus'),
(10, 'Abdul Anti Remed', '202510', '0812340010', '2025-01-10', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
