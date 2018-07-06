-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2018 at 09:40 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `annunci`
--

CREATE TABLE `annunci` (
  `email` varchar(40) NOT NULL,
  `nome_videogioco` varchar(40) NOT NULL,
  `console` varchar(40) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `durata` int(11) NOT NULL,
  `stato` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annunci`
--

INSERT INTO `annunci` (`email`, `nome_videogioco`, `console`, `prezzo`, `durata`, `stato`) VALUES
('address@mail.com', 'COD', 'PS4', 34, 12, 'Disponibile'),
('address@mail.com', 'FIFA', 'PS4', 10, 12, 'Disponibile'),
('address@mail.com', 'Fifa 18', 'Playstation 4', 5, 5, 'Disponibile'),
('address@mail.com', 'Fifa 19', 'Playstation 4', 5, 5, 'Disponibile'),
('address@mail.com', 'FIFA06', 'WII', 10, 34, 'Disponibile'),
('address@mail.com', 'Fifa07', 'playstation', 1, 3, 'Disponibile'),
('address@mail.com', 'PES2018', 'WII', 23, 31, 'Disponibile'),
('address@mail.com', 'SKATE3', 'PS4', 23, 50, 'Disponibile');

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

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`email`, `password`, `nome`, `cognome`, `citta`, `provincia`, `cap`) VALUES
('address@mail.com', 'prova', 'nico', 'salva', 'albenga', 'sv', 17031);

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
  ADD PRIMARY KEY (`email`,`nome_videogioco`),
  ADD KEY `email` (`email`) USING BTREE;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `annunci`
--
ALTER TABLE `annunci`
  ADD CONSTRAINT `foreign_key_utenti` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
