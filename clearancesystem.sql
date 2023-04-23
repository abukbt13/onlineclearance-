-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2023 at 06:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `response` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `description`, `regno`, `category`, `response`, `status`) VALUES
(2, 'fdghjk', 'CT201/100134/18', 'Fail', NULL, 2),
(3, 'RFTGYHUJKIL', 'CT201/100134/19', 'Missing Marks', 'come bgbg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `department` varchar(255) NOT NULL,
  `idno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `department`, `idno`) VALUES
(1, 'Abraham', 'abukbt13@gmail.com', 736754757, 'academics', 36844504),
(2, 'Vikii', 'ndolo@gmail.com', 768946595, 'library', 10862804),
(3, 'ezra', 'ezra@gmail.com', 768946595, 'library', 14805),
(4, 'inance', 'finance@gmail.com', 723456780, 'finance', 12345678),
(5, 'Boarding', 'boarding@gmail.com', 768946595, 'boarding', 728548760);

-- --------------------------------------------------------

--
-- Table structure for table `boardings`
--

CREATE TABLE `boardings` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boardings`
--

INSERT INTO `boardings` (`id`, `regno`, `category`, `description`, `cost`, `status`) VALUES
(1, 'CT201/102131/20', 'Damages', 'You broke 3 windows', 789, 0),
(2, 'CT201/100134/19', 'Damages', 'did lots of damages you broke windows you were reported drunk', 3245, 1),
(3, 'CT201/102131/20', 'Lost Items', 'lost keys', 5678, 0),
(4, 'CT201/100134/18', 'Damages', 'erfgtyhujiko', 765, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `regno`, `department`, `status`) VALUES
(1, 'CT201/100134/19', 'academics', 1),
(2, 'CT201/100134/19', 'library', 1),
(3, 'CT201/100134/19', 'boardings', 0),
(7, 'CT201/100134/18', 'library', 0),
(9, 'CT201/100134/18', 'boarding', 0),
(12, 'CT201/100134/19', 'boarding', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `feebalance` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `regno`, `feebalance`, `admin_id`, `status`) VALUES
(2, 'CT201/100134/19', 63755, 4, 0),
(3, 'CT201/100134/18', 53645, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `regno`, `category`, `description`, `cost`, `status`) VALUES
(1, 'CT201/100134/18', 'Unreturned book', 'chinua achebe', 567, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `regno`, `category`, `status`, `academic_id`) VALUES
(17, 'CT201/102131/20', 'Missing Marks', 1, 8),
(18, 'CT201/100134/19', 'Fail', 1, 1),
(19, 'CT201/100134/19', 'Unattempted CAT', 1, 2),
(20, 'CT201/100134/19', 'Unattempted CAT', 1, 3),
(21, 'CT201/100134/19', 'Fail', 1, 1),
(22, 'CT201/100134/19', 'Unattempted CAT', 1, 2),
(23, 'CT201/100134/19', 'Unattempted CAT', 1, 3),
(24, 'CT201/100134/19', 'Missing Marks', 1, 4),
(25, 'CT201/100134/19', 'Fail', 1, 5),
(26, 'CT201/100134/19', 'Missing Marks', 1, 7),
(27, 'CT201/100134/19', 'Unattempted CAT', 1, 8),
(28, 'CT201/100134/19', 'Missing Marks', 1, 9),
(29, 'CT201/100134/19', 'Missing Marks', 1, 10),
(30, 'CT201/100134/19', 'Unattempted CAT', 1, 11),
(31, 'CT201/100134/18', 'Fail', 0, 1),
(32, 'CT201/100134/18', 'Fail', 0, 2),
(33, 'CT201/100134/18', 'Fail', 0, 2),
(34, 'CT201/100134/18', 'Fail', 0, 2),
(35, 'CT201/100134/18', 'Fail', 0, 2),
(36, 'CT201/100134/19', 'Missing Marks', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `sportscategory` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `library` varchar(255) DEFAULT NULL,
  `boardings` varchar(255) DEFAULT NULL,
  `sports` varchar(255) DEFAULT NULL,
  `academics` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `regno`, `name`, `email`, `school`, `course`, `library`, `boardings`, `sports`, `academics`) VALUES
(1, 'CT201/100134/19', 'Abraham Kibet', 'abukbt13@gmail.com', 'SCI', 'BCS', '1', NULL, NULL, '1'),
(2, 'CT201/102131/20', 'Mwangi', 'kinyua@gmail.com', 'SCI', 'BCS', NULL, NULL, NULL, NULL),
(3, 'CT201/100134/18', 'Kemboi', 'abukbt12@gmail.com', 'SCI', 'BCS', NULL, '1', NULL, NULL);

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
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `boardings`
--
ALTER TABLE `boardings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
