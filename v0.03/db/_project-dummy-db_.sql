-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 05:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `[project-dummy-db]`
--

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `naam`) VALUES
(1, 'Emile');

-- --------------------------------------------------------

--
-- Table structure for table `gewerkte_uren`
--

CREATE TABLE `gewerkte_uren` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `persoon` varchar(50) NOT NULL,
  `project` varchar(50) NOT NULL,
  `start` varchar(5) NOT NULL,
  `eind` varchar(5) NOT NULL,
  `pauze` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'In afwachting',
  `aanvraag_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validate_datum` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gewerkte_uren`
--

INSERT INTO `gewerkte_uren` (`id`, `datum`, `persoon`, `project`, `start`, `eind`, `pauze`, `status`, `aanvraag_datum`, `validate_datum`) VALUES
(40, '2019-04-24', 'Emile', 'Quiz', '11:00', '16:00', 30, 'Gevalideerd', '2019-04-23 23:54:39', '2019-04-23 23:55:03'),
(42, '2019-04-24', 'Emile', 'UML', '08:00', '14:00', 1, 'Gevalideerd', '2019-04-24 01:14:56', '2019-04-24 01:15:42'),
(45, '2019-04-24', 'Emile', 'UML', '08:00', '15:00', 30, 'Gevalideerd', '2019-04-24 01:20:13', '2019-04-24 01:20:55'),
(48, '2019-04-24', 'Emile', 'UML', '08:00', '15:15', 30, 'Gevalideerd', '2019-04-24 01:46:37', '2019-04-24 01:47:04'),
(50, '2019-04-24', 'Emile', 'Quiz', '12:00', '17:00', 30, 'Gevalideerd', '2019-04-24 11:05:07', '2019-04-24 11:05:52'),
(53, '2019-04-24', 'Emile', 'Quiz', '08:00', '11:00', 3, 'Gevalideerd', '2019-04-24 13:20:06', '2019-04-24 13:20:32'),
(57, '2019-04-25', 'Emile', 'Urenapplicatie', '08:00', '09:00', 10, 'Gevalideerd', '2019-04-24 22:12:39', '2019-04-24 22:14:44'),
(58, '2019-04-25', 'Emile', 'UML', '09:00', '11:00', 0, 'Gevalideerd', '2019-04-24 22:12:52', '2019-04-24 22:14:45'),
(59, '2019-04-25', 'Emile', 'Quiz', '11:00', '12:00', 15, 'In afwachting', '2019-04-24 22:13:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

CREATE TABLE `projecten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`id`, `naam`) VALUES
(1, 'Urenapplicatie'),
(5, 'UML'),
(6, 'Quiz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gewerkte_uren`
--
ALTER TABLE `gewerkte_uren`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projecten`
--
ALTER TABLE `projecten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gewerkte_uren`
--
ALTER TABLE `gewerkte_uren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `projecten`
--
ALTER TABLE `projecten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
