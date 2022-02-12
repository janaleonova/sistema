-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 09:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www1`
--

-- --------------------------------------------------------

--
-- Table structure for table `majasdarbs`
--

CREATE TABLE `majasdarbs` (
  `id` int(6) UNSIGNED NOT NULL,
  `epasts` varchar(100) NOT NULL,
  `parole` varchar(255) NOT NULL,
  `vards` varchar(30) NOT NULL,
  `uzvards` varchar(30) NOT NULL,
  `registrets` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `loma` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majasdarbs`
--

INSERT INTO `majasdarbs` (`id`, `epasts`, `parole`, `vards`, `uzvards`, `registrets`, `loma`) VALUES
(1, 'Jānis@epasts.lv', '123', 'Jānis', 'Bērziņš', '2022-01-31 20:44:28', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `majasdarbs`
--
ALTER TABLE `majasdarbs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `epasts` (`epasts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `majasdarbs`
--
ALTER TABLE `majasdarbs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
