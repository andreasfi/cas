-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 11:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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

CREATE TABLE `difficulties` (
  `id` int(11) NOT NULL,
  `differenceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `eventcategory` (
  `idEventCategory` int(11) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `events` (
  `idEvent` int(11) NOT NULL,
  `description` text NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `maxParticipants` int(11) NOT NULL,
  `fk_idEventType` int(11) NOT NULL,
  `fk_idOwner` int(11) NOT NULL,
  `title` text NOT NULL,
  `fk_idEventCategory` int(11) NOT NULL,
  `fk_idDifficulty` int(11) NOT NULL,
  `fk_idPath` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`idEvent`, `description`, `startDate`, `endDate`, `maxParticipants`, `fk_idEventType`, `fk_idOwner`, `title`, `fk_idEventCategory`, `fk_idDifficulty`, `fk_idPath`) VALUES
(2, 'Petite montée à la dent de Nendaz, rendez vous au sommet du télécabine de tracouet', '2016-10-08 14:00:00', '2016-10-08 17:00:00', 25, 1, 1, 'Montée à la Dent de Nendaz', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eventtypes`
--

CREATE TABLE `eventtypes` (
  `idEventType` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `eventusers` (
  `fk_idEvent` int(11) NOT NULL,
  `fk_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_change_requests`
--

CREATE TABLE `password_change_requests` (
  `idRequest` varchar(100) NOT NULL,
  `Time` datetime NOT NULL,
  `fk_idUser` int(11) NOT NULL
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

CREATE TABLE `paths` (
  `idPath` int(11) NOT NULL,
  `coordinatesJSON` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`idPath`, `coordinatesJSON`) VALUES
(1, '[{"lat":46.223552702209886,"lng":7.5311279296875},{"lat":46.223552702209886,"lng":7.67120361328125},{"lat":46.26724020382508,"lng":7.78106689453125},{"lat":46.37346430137336,"lng":7.811279296875}]'),
(2, '[{"lat":46.223552702209886,"lng":7.5311279296875},{"lat":46.223552702209886,"lng":7.67120361328125},{"lat":46.26724020382508,"lng":7.78106689453125},{"lat":46.37346430137336,"lng":7.811279296875}]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `fk_idUserTypes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `mail`, `firstname`, `lastname`, `tel`, `pwd`, `fk_idUserTypes`) VALUES
(1, 'lothgar_pgm@hotmail.com', 'Pierre', 'Baran', '793943353', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(2, 'a@a', 'a', 'a', '041241', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(4, 'pierre.baran@students.hevs.ch', 'a', 'a', '423423', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
(9, 'calixtemayoraz@gmail.com', 'Calixte', 'Mayoraz', '0786298541', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `idUserType` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`idUserType`, `role`) VALUES
(1, 'nonMember'),
(2, 'member'),
(3, 'trailMaster');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventcategory`
--
ALTER TABLE `eventcategory`
  ADD PRIMARY KEY (`idEventCategory`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`),
  ADD KEY `fk_idEventType` (`fk_idEventType`),
  ADD KEY `fk_idOwner` (`fk_idOwner`),
  ADD KEY `fk_idEventCategory` (`fk_idEventCategory`),
  ADD KEY `fk_idDifficulty` (`fk_idDifficulty`),
  ADD KEY `idPath` (`fk_idPath`);

--
-- Indexes for table `eventtypes`
--
ALTER TABLE `eventtypes`
  ADD PRIMARY KEY (`idEventType`);

--
-- Indexes for table `eventusers`
--
ALTER TABLE `eventusers`
  ADD PRIMARY KEY (`fk_idEvent`,`fk_idUser`),
  ADD KEY `fk_idEvent` (`fk_idEvent`),
  ADD KEY `fk_idUser` (`fk_idUser`);

--
-- Indexes for table `password_change_requests`
--
ALTER TABLE `password_change_requests`
  ADD PRIMARY KEY (`idRequest`),
  ADD KEY `fk_idUser` (`fk_idUser`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`idPath`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `fk_idUserTypes` (`fk_idUserTypes`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`idUserType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `eventcategory`
--
ALTER TABLE `eventcategory`
  MODIFY `idEventCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `eventtypes`
--
ALTER TABLE `eventtypes`
  MODIFY `idEventType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `idPath` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `idUserType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `EventUsers_ibfk_2` FOREIGN KEY (`fk_idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
