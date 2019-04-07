-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2019 at 08:27 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `annee`
--

CREATE TABLE `annee` (
  `idAnnee` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annee`
--

INSERT INTO `annee` (`idAnnee`) VALUES
(2016),
(2017);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` varchar(50) NOT NULL,
  `n` varchar(20) NOT NULL,
  `p` varchar(20) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `n`, `p`, `mdp`, `genre`, `mail`) VALUES
('pseudo1', 'nom1', 'prenom1', 'mdp', 'p', 'mail'),
('login1', '', '', '', 'P', ''),
('log1', 'nom1', 'prenom1', 'mdp1', 'P', 'mail1'),
('', '', '', '', 'P', ''),
('', '', '', '', 'P', ''),
('dd', 'dd', 'ffff', 'ff', 'papa', 'ff'),
('a', 'a', 'a', 'a', 'maman', 'a'),
('b', 'b', 'b', 'b', 'papa', 'b'),
('c', 'c', 'c', 'c', 'papa', 'c'),
('Mehdi34', 'RAMIREZ', 'Mehdi', 'Sarahmehdi1', 'papa', 'mehdi.ramo@outlook.fr'),
('Gaelle18', 'Novales', 'Gaelle', 'mdp', 'maman', 'gaelle@novales.fr');

-- --------------------------------------------------------

--
-- Table structure for table `frequence`
--

CREATE TABLE `frequence` (
  `idPrenom` int(30) NOT NULL,
  `idAnnee` int(30) NOT NULL,
  `Nombre` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequence`
--

INSERT INTO `frequence` (`idPrenom`, `idAnnee`, `Nombre`) VALUES
(2, 2016, 20),
(2, 2016, 20),
(1, 2017, 50),
(3, 2017, 90),
(4, 2016, 70),
(2, 2017, 60),
(4, 2017, 100),
(5, 2017, 10),
(7, 2017, 150),
(8, 2017, 60),
(9, 2017, 70),
(10, 2017, 100),
(11, 2017, 200),
(12, 2017, 200),
(13, 2017, 20),
(14, 2017, 30),
(15, 2017, 150);

-- --------------------------------------------------------

--
-- Table structure for table `origine`
--

CREATE TABLE `origine` (
  `idorigine` int(2) NOT NULL DEFAULT '0',
  `origine` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `origine`
--

INSERT INTO `origine` (`idorigine`, `origine`) VALUES
(11, 'origine1'),
(12, 'origine2'),
(13, 'origine3'),
(14, 'origine4'),
(15, 'origine5');

-- --------------------------------------------------------

--
-- Table structure for table `possede`
--

CREATE TABLE `possede` (
  `idprenom` int(1) DEFAULT NULL,
  `idorigine` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `possede`
--

INSERT INTO `possede` (`idprenom`, `idorigine`) VALUES
(1, 11),
(2, 12),
(3, 13),
(4, 11),
(5, 15),
(1, 15),
(1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `prenom`
--

CREATE TABLE `prenom` (
  `prenom` varchar(15) DEFAULT NULL,
  `sexe` int(1) DEFAULT NULL,
  `idprenom` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prenom`
--

INSERT INTO `prenom` (`prenom`, `sexe`, `idprenom`) VALUES
('andrea', 2, 1),
('sarah', 2, 2),
('maxime', 1, 3),
('Francois-jaques', 1, 4),
('dominique', 3, 5),
('Mehdi', 1, 7),
('Elea', 2, 8),
('Salome', 2, 9),
('Oriane', 2, 10),
('Laura', 2, 11),
('Pierre', 1, 12),
('Axel', 1, 13),
('Theo', 1, 14),
('Henri', 1, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`idAnnee`);

--
-- Indexes for table `frequence`
--
ALTER TABLE `frequence`
  ADD KEY `idPrenom` (`idPrenom`),
  ADD KEY `idAnnee` (`idAnnee`);

--
-- Indexes for table `origine`
--
ALTER TABLE `origine`
  ADD PRIMARY KEY (`idorigine`);

--
-- Indexes for table `possede`
--
ALTER TABLE `possede`
  ADD KEY `idorigine` (`idorigine`),
  ADD KEY `idprenom` (`idprenom`);

--
-- Indexes for table `prenom`
--
ALTER TABLE `prenom`
  ADD PRIMARY KEY (`idprenom`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `frequence`
--
ALTER TABLE `frequence`
  ADD CONSTRAINT `frequence_ibfk_1` FOREIGN KEY (`idPrenom`) REFERENCES `prenom` (`idprenom`),
  ADD CONSTRAINT `frequence_ibfk_2` FOREIGN KEY (`idAnnee`) REFERENCES `annee` (`idAnnee`);

--
-- Constraints for table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_ibfk_1` FOREIGN KEY (`idorigine`) REFERENCES `origine` (`idorigine`),
  ADD CONSTRAINT `possede_ibfk_2` FOREIGN KEY (`idprenom`) REFERENCES `prenom` (`idprenom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
