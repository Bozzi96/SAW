-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2018 at 07:45 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `annunci`
--

CREATE TABLE `annunci` (
  `id_ad` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nome_videogioco` varchar(40) NOT NULL,
  `console` varchar(40) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `durata` int(11) NOT NULL,
  `stato` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `citta` varchar(40) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videogiochi`
--

CREATE TABLE `videogiochi` (
  `nome` varchar(40) NOT NULL,
  `console` varchar(40) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annunci`
--
ALTER TABLE `annunci`
  ADD PRIMARY KEY (`id_ad`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `foreign_key_videogiochi` (`nome_videogioco`,`console`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `videogiochi`
--
ALTER TABLE `videogiochi`
  ADD PRIMARY KEY (`nome`,`console`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annunci`
--
ALTER TABLE `annunci`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `annunci`
--
ALTER TABLE `annunci`
  ADD CONSTRAINT `foreign_key_utenti` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`),
  ADD CONSTRAINT `foreign_key_videogiochi` FOREIGN KEY (`nome_videogioco`,`console`) REFERENCES `videogiochi` (`nome`, `console`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
