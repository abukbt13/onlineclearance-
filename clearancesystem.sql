-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2023 at 01:32 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearancesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `response` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `description`, `regno`, `category`, `response`, `status`) VALUES
(1, 'you have not done exams', 'CT201/100134/19', 'Fail', 'asdfgrhyjk', 2),
(2, 'never did the cat', 'CT201/100134/19', 'Unattempted CAT', 'wsxdfghj', 2),
(3, 'not done exam', 'CT201/100134/19', 'Unattempted CAT', 'come and do exams 23/2/2023', 2),
(4, 'Unattempted cat', 'CT201/100134/19', 'Missing Marks', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `staffno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `staffno`, `name`, `email`, `phone`, `password`, `role`) VALUES
(1, 'MUSTSTAFF/1001/19\r\n', 'Victor Auma', 'jivo@mailinator.com', 46, 'Pa$$w0rd!', 'kivade@mailinator.com'),
(2, 'MUSTSTAFF/10002/19', 'Karani Alex', 'karani@gmail.com', 728548760, 'da570354c7f62a2a8a38705779e93044\r\n', 'admin'),
(3, 'MUSTSTAFF/10003/19', 'Alna John', 'guvuza@mailinator.com', 36, 'da570354c7f62a2a8a38705779e93044', 'hosal@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `boardings`
--

CREATE TABLE `boardings` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `boardings`
--

INSERT INTO `boardings` (`id`, `regno`, `category`, `description`, `cost`, `status`) VALUES
(1, 'CT201/100134/19', 'Damages', 'broke a window pane', 3456, 1),
(2, 'CT201/100134/19', 'Damages', 'wasdftghj', 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `feebalance` int NOT NULL,
  `admin_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `regno`, `feebalance`, `admin_id`, `status`) VALUES
(1, 'CT201/100134/19', 25115, 0, 0),
(2, 'CT201/100134/20', 24002, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `regno`, `category`, `description`, `cost`, `status`) VALUES
(1, 'vyte@mailinator.com', 'Carelessness', 'Reprehenderit aut m', 25, 0),
(2, 'CT201/100134/19', 'Lost Book', 'adsfghjk', 5667, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `academic_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `regno`, `category`, `status`, `academic_id`) VALUES
(17, 'CT201/102131/20', 'Missing Marks', 1, 8),
(18, 'CT201/100134/19', 'Fail', 1, 1),
(19, 'CT201/100134/19', 'Unattempted CAT', 1, 2),
(20, 'CT201/100134/19', 'Unattempted CAT', 1, 3),
(21, 'CT201/100134/19', 'Fail', 0, 1),
(22, 'CT201/100134/19', 'Unattempted CAT', 0, 2),
(23, 'CT201/100134/19', 'Unattempted CAT', 0, 3),
(24, 'CT201/100134/19', 'Missing Marks', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int NOT NULL,
  `sportscategory` varchar(255) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `regno`, `description`, `cost`, `sportscategory`, `status`) VALUES
(1, 'hafobac@mailinator.com', 'Aut delectus sit i', 75, '', 0),
(2, 'hafobac@mailinator.com', 'Aut delectus sit i', 75, '', 0),
(3, 'CT201/102131/20', 'Consequatur Culpa d', 60, 'Volleyball', 0),
(4, 'CT201/100134/19', 'sdfghjkl', 1000, 'Chess', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `regno` varchar(255) NOT NULL,
  `idno` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `library` varchar(255) DEFAULT NULL,
  `boardings` varchar(255) DEFAULT NULL,
  `sports` varchar(255) DEFAULT NULL,
  `academics` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `regno`, `idno`, `name`, `email`, `school`, `course`, `library`, `boardings`, `sports`, `academics`) VALUES
(1, 'CT201/100134/19', 36844504, 'Abraham Kipkemoi Kibet', 'abukbt13@gmail.com', 'SCI', 'BCS', '1', '1', '1', '1'),
(2, 'CT/329092/4900', 36844804, 'Ammon', 'freeman@gmail.com', 'SPURS', 'STATISTICS', NULL, NULL, NULL, NULL),
(3, 'valiwu@mailinator.com', 23456789, 'Janna Blanchard', 'tygatisyhy@mailor.com', 'Nihil adipisicing su', 'Sed sit magni ut lib', NULL, NULL, NULL, NULL),
(4, 'ED201/100221/20', 35747483, 'Mercy Chelangat', 'chelangat@gmail.com', 'SED', 'Education Science', NULL, NULL, NULL, NULL),
(5, 'CT201/100134/20', 36844500, 'Boaz', 'abukb13@gmail.com', 'SCI', 'BCS', NULL, NULL, NULL, NULL),
(6, 'CT201/102131/20', 39651211, 'Ezra', 'kinyuaezra2020@gmail.com', 'SCI', 'BCS', NULL, NULL, NULL, NULL),
(8, 'CT201/102131/20', 36844504, 'Abraham Kipkemoi Kibet', 'abukbt13@gmail.yahoo', 'SCI', 'BCS', NULL, NULL, NULL, NULL),
(9, 'CT201/100108/19', 37885393, 'Ndolo Boni', 'ndolo@gmail.com', 'SPURS', 'Statistics', '1', '1', '1', '1'),
(10, 'CT201/100088/19', 36651211, 'Kevoo Kihara', 'vydorek@mailinator.com', 'SED', 'Physics Chemistry', NULL, '1', NULL, '1'),
(11, 'CT201/100088/20', 36651211, 'Kevoo Kihara', 'vydorek@mailinator.com', 'SED', 'Physics Chemistry', '1', '1', '1', '1'),
(12, 'CT201/100088/21', 36651211, 'Kevoo Munene', 'dfgh@mailinator.com', 'ACHED', 'Physics Chemistry', '1', '1', '1', '1'),
(13, 'CT201/100134/22', 36844504, 'AAron', 'biwik@mailinator.com', 'Engineering', 'Civil engineering', '1', '1', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boardings`
--
ALTER TABLE `boardings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boardings`
--
ALTER TABLE `boardings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
