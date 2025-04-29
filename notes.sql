-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 08:27 AM
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
-- Database: `note`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) NOT NULL,
  `date` varchar(30) NOT NULL,
  `day` varchar(10) NOT NULL,
  `note` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `date`, `day`, `note`) VALUES
(1, '18 February 2025', 'Tuesday', 'Culture: lec-11(1/2) , JS'),
(2, '19 February 2025', 'Wednesday', 'Culture: lec-11 , JS'),
(3, '20 February 2025', 'Thursday', 'Culture: lec 12 lec 13, JS'),
(4, '21 February 2025', 'Friday', 'Culture: lec-14 lec-15 , PHP(strting)'),
(5, '22 February 2025', 'Saturday', 'Culture: lec-16 lec-17 , Guj. History: lec-1(1/2)'),
(6, '24 February 2025', 'Monday', 'Culture: lec-18 , JS , JQuery'),
(7, '25 February 2025', 'Tuesday', 'Culture: lec-19 lec-20 , JQuery'),
(8, '26 February 2025', 'Wednesday', 'Culture: lec-21 lec-22 lec-23'),
(9, '27 February 2025', 'Thursday', 'Cuture: lec-24 lec-25 lec-26'),
(10, '28 February 2025', 'Friday', 'Culture: lec-27 lec-28'),
(11, '1 March 2025', 'Saturday', 'Culture: lec-29 lec-30(ND)'),
(12, '2 March 2025', 'Sunday', 'Culture: lec-30 lec-31(1/2)'),
(13, '3 March 2025', 'Monday', 'Culture: lec-31(1/2) lec-32'),
(14, '4 March 2025', 'Tuesday', 'Guj. History: lec-1(1/2)(ND) lec-2(ND) , PHP'),
(15, '5 March 2025', 'Wednesday', 'PHP'),
(16, '6 March 2025', 'Thursday', 'Guj. History: lec-1(1/2) , Culture: lec-33'),
(17, '7 March 2025', 'Friday', 'Guj. history: lec-2(1/2) , Culture: lec-34'),
(18, '8 March 2025', 'Saturday', 'Guj. History: lec-2(1/2)(ND) , Culture: lec-35 , Reasoning'),
(19, '9 March 2025', 'Sunday', 'Guj. History: lec-2(1/2)(ND) , Polity: lec-1 lec-2(1/2)'),
(20, '10 March 2025', 'Monday', 'Polity: lec-2(1/2) lec-3(1/2)'),
(21, '11 March 2025', 'Tuesday', 'Polity: lec-3(1/2) , PHP'),
(22, '12 March 2025', 'Wednesday', 'PHP'),
(23, '13 March 2025', 'Thursday', 'Polity: lec-3(1/2) , Test'),
(24, '14 March 2025', 'Friday', 'HOLIDAY'),
(25, '15 March 2025', 'Saturday', 'Polity: lec-4 , Test(P+H)'),
(26, '16 March 2025', 'Sunday', 'Polity: lec-4 , Test(P+Cul)'),
(27, '17 March 2025', 'Monday', 'Polity: lec-6 test , Culture: test'),
(28, '18 March 2025', 'Tuesday', 'Polity: lec-7(1/2) test'),
(29, '19 March 2025', 'Wednesday', 'Polity: lec-7(1/2) , PHP'),
(30, '20 March 2025', 'Thursday', 'Polity: lec-8 lec-9'),
(31, '21 March 2025', 'Friday', 'Polity: lec-10 lec-11(1/2)'),
(32, '22 March 2025', 'Saturday', 'Polity: lec-11(1/2) lec-12'),
(33, '23 March 2025', 'Sunday', 'Polity: lec-13 lec-14(ND)'),
(34, '24 March 2025', 'Monday', 'Polity: lec-14(1/2) , PHP'),
(35, '25 March 2025', 'Tuesday', 'PHP , Polity: lec-14(1/2)'),
(36, '26 March 2025', 'Wednesday', 'PHP'),
(37, '27 March 2025', 'Thursday', 'Polity: lec-15'),
(38, '28 March 2025', 'Friday', 'PHP'),
(39, '29 March 2025', 'Saturday', 'Clg'),
(40, '30 March 2025', 'Sunday', 'Polity: lec-16 lec-17(1/2)'),
(41, '31 March 2025', 'Monday', 'Polity: lec-17(1/2) lec-18 lec-19(1/2)'),
(42, '1 April 2025', 'Tuesday', 'Polity: lec-19(1/2) , PHP'),
(43, '2 April 2025', 'Wednesday', 'PHP , Polity: lec-20(1/2)'),
(44, '3 April 2025', 'Thursday', 'PHP , Polity: lec-20(1/2) lec-21(1/2)(ND)'),
(45, '4 April 2025', 'Friday', 'Polity: lec-21(25%)'),
(46, '5 April 2025', 'Saturday', 'PHP'),
(47, '6 April 2025', 'Sunday', 'Polity: lec-21(75%) lec-22'),
(48, '6 April 2025', 'Sunday', 'Polity: lec-21(1/2) lec-22(1/2)'),
(49, '7 April 2025', 'Monday', 'Polity: lec-22(1/2) lec-23(1/2)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
