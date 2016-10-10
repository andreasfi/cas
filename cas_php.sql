-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 09:33 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `difficulties`
--

DROP TABLE IF EXISTS `difficulties`;
CREATE TABLE IF NOT EXISTS `difficulties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `differenceName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `difficulties`
--

INSERT INTO `difficulties` (`id`, `differenceName`) VALUES
(1, 'débutant'),
(2, 'modéré'),
(3, 'avancé'),
(4, 'très avancé'),
(5, 'professionnel');

-- --------------------------------------------------------

--
-- Table structure for table `eventcategory`
--

DROP TABLE IF EXISTS `eventcategory`;
CREATE TABLE IF NOT EXISTS `eventcategory` (
  `idEventCategory` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) NOT NULL,
  PRIMARY KEY (`idEventCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcategory`
--

INSERT INTO `eventcategory` (`idEventCategory`, `category`) VALUES
(1, 'Marche'),
(2, 'Peau de Phoque'),
(3, 'Grimpe'),
(4, 'Raquettes'),
(5, 'Ski'),
(6, 'Snowboard'),
(7, 'Télémark'),
(8, 'Ski de fond');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `maxParticipants` int(11) NOT NULL,
  `fk_idEventType` int(11) NOT NULL,
  `fk_idOwner` int(11) NOT NULL,
  `title` text NOT NULL,
  `fk_idEventCategory` int(11) NOT NULL,
  `fk_idDifficulty` int(11) NOT NULL,
  `fk_idPath` int(11) NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `fk_idEventType` (`fk_idEventType`),
  KEY `fk_idOwner` (`fk_idOwner`),
  KEY `fk_idEventCategory` (`fk_idEventCategory`),
  KEY `fk_idDifficulty` (`fk_idDifficulty`),
  KEY `idPath` (`fk_idPath`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`idEvent`, `description`, `startDate`, `endDate`, `maxParticipants`, `fk_idEventType`, `fk_idOwner`, `title`, `fk_idEventCategory`, `fk_idDifficulty`, `fk_idPath`) VALUES
(2, 'Petite montée à la dent de Nendaz, rendez vous au sommet du télécabine de tracouet', '2016-10-08 14:00:00', '2016-10-08 17:00:00', 25, 1, 1, 'Montée à la Dent de Nendaz', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eventtypes`
--

DROP TABLE IF EXISTS `eventtypes`;
CREATE TABLE IF NOT EXISTS `eventtypes` (
  `idEventType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`idEventType`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtypes`
--

INSERT INTO `eventtypes` (`idEventType`, `type`) VALUES
(1, 'rando'),
(2, 'sortie');

-- --------------------------------------------------------

--
-- Table structure for table `eventusers`
--

DROP TABLE IF EXISTS `eventusers`;
CREATE TABLE IF NOT EXISTS `eventusers` (
  `fk_idEvent` int(11) NOT NULL,
  `fk_idUser` int(11) NOT NULL,
  `fk_idStatus` int(11) NOT NULL,
  `submitDate` datetime NOT NULL,
  `numberParticipants` int(1) NOT NULL,
  PRIMARY KEY (`fk_idEvent`,`fk_idUser`),
  KEY `fk_idEvent` (`fk_idEvent`),
  KEY `fk_idUser` (`fk_idUser`),
  KEY `fk_idStatus` (`fk_idStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_change_requests`
--

DROP TABLE IF EXISTS `password_change_requests`;
CREATE TABLE IF NOT EXISTS `password_change_requests` (
  `idRequest` varchar(100) NOT NULL,
  `Time` datetime NOT NULL,
  `fk_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idRequest`),
  KEY `fk_idUser` (`fk_idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_change_requests`
--

INSERT INTO `password_change_requests` (`idRequest`, `Time`, `fk_idUser`) VALUES
('7358b98cd217979862e1628a699c3003f804cae6', '2016-09-29 20:14:13', 1),
('a2b749b2d373e3edbf72db5a567a9a6f2f59db0a', '2016-10-03 11:19:51', 9);

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

DROP TABLE IF EXISTS `paths`;
CREATE TABLE IF NOT EXISTS `paths` (
  `idPath` int(11) NOT NULL AUTO_INCREMENT,
  `coordinatesJSON` text NOT NULL,
  PRIMARY KEY (`idPath`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`idPath`, `coordinatesJSON`) VALUES
(1, '[{"lat":46.223552702209886,"lng":7.5311279296875},{"lat":46.223552702209886,"lng":7.67120361328125},{"lat":46.26724020382508,"lng":7.78106689453125},{"lat":46.37346430137336,"lng":7.811279296875}]'),
(2, '[{"lat":46.223552702209886,"lng":7.5311279296875},{"lat":46.223552702209886,"lng":7.67120361328125},{"lat":46.26724020382508,"lng":7.78106689453125},{"lat":46.37346430137336,"lng":7.811279296875}]');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(11) NOT NULL AUTO_INCREMENT,
  `statusname` varchar(30) NOT NULL,
  PRIMARY KEY (`idStatus`),
  KEY `idStatus` (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idStatus`, `statusname`) VALUES
(1, 'Submited'),
(2, 'Accepted'),
(3, 'Refused');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `fk_idUserTypes` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `mail` (`mail`),
  KEY `fk_idUserTypes` (`fk_idUserTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `mail`, `firstname`, `lastname`, `tel`, `pwd`, `fk_idUserTypes`) VALUES
(1, 'lothgar_pgm@hotmail.com', 'Pierre', 'Baran', '793943353', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(2, 'a@a', 'a', 'a', '041241', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(4, 'pierre.baran@students.hevs.ch', 'a', 'a', '423423', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
(9, 'calixtemayoraz@gmail.com', 'Calixte', 'Mayoraz', '0786298541', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3),
(12, 'tewt@google.cok', 'bob', 'bab', '23', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

DROP TABLE IF EXISTS `usertypes`;
CREATE TABLE IF NOT EXISTS `usertypes` (
  `idUserType` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`idUserType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`idUserType`, `role`) VALUES
(1, 'nonMember'),
(2, 'member'),
(3, 'trailMaster');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `Events_ibfk_1` FOREIGN KEY (`fk_idEventType`) REFERENCES `eventtypes` (`idEventType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_2` FOREIGN KEY (`fk_idOwner`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_3` FOREIGN KEY (`fk_idEventCategory`) REFERENCES `eventcategory` (`idEventCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_4` FOREIGN KEY (`fk_idDifficulty`) REFERENCES `difficulties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_5` FOREIGN KEY (`fk_idPath`) REFERENCES `paths` (`idPath`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventusers`
--
ALTER TABLE `eventusers`
  ADD CONSTRAINT `EventUsers_ibfk_1` FOREIGN KEY (`fk_idEvent`) REFERENCES `events` (`idEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EventUsers_ibfk_2` FOREIGN KEY (`fk_idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EventUsers_ibfk_3` FOREIGN KEY (`fk_idStatus`) REFERENCES `status` (`idStatus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password_change_requests`
--
ALTER TABLE `password_change_requests`
  ADD CONSTRAINT `password_change_requests_ibfk_1` FOREIGN KEY (`fk_idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_idUserTypes`) REFERENCES `usertypes` (`idUserType`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
