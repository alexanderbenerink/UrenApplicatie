-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 01:04 AM
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
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `beheerder` tinyint(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registratie_datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gewerkte_uren`
--

CREATE TABLE `gewerkte_uren` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `gebruiker` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `start` varchar(5) NOT NULL,
  `eind` varchar(5) NOT NULL,
  `pauze` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'In afwachting',
  `aanvraag_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validatie_datum` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gewerkte_uren`
--

INSERT INTO `gewerkte_uren` (`id`, `datum`, `gebruiker`, `project`, `start`, `eind`, `pauze`, `status`, `aanvraag_datum`, `validatie_datum`) VALUES
(5, '2019-05-09', 'Emile', 'Urenapplicatie', '08:00', '08:00', 30, 'In afwachting', '2019-05-09 21:36:07', NULL),
(6, '2019-05-09', 'Emile', 'Urenapplicatie', '15:00', '20:00', 2, 'In afwachting', '2019-05-09 21:54:39', NULL),
(7, '2019-05-09', 'Emile', 'Urenapplicatie', '16:00', '18:00', 50, 'In afwachting', '2019-05-09 21:54:49', NULL),
(8, '2019-05-09', 'Emile', 'Urenapplicatie', '08:00', '14:00', 20, 'In afwachting', '2019-05-09 21:55:52', NULL),
(9, '2019-05-10', 'Emile', 'Urenapplicatie', '08:00', '12:00', 30, 'In afwachting', '2019-05-09 22:14:18', NULL),
(10, '2019-05-10', 'Emile', 'Urenapplicatie', '13:00', '14:00', 20, 'In afwachting', '2019-05-09 22:18:09', NULL),
(11, '2019-05-10', 'Emile', 'Urenapplicatie', '08:00', '17:00', 60, 'In afwachting', '2019-05-09 22:18:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

CREATE TABLE `projecten` (
  `id` int(11) NOT NULL,
  `naam_project` varchar(100) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `aanmaak_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_koppelingen`
--

CREATE TABLE `project_koppelingen` (
  `id` int(11) DEFAULT NULL,
  `persoon_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gewerkte_uren`
--
ALTER TABLE `gewerkte_uren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projecten`
--
ALTER TABLE `projecten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
