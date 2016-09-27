-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2016 at 02:25 PM
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



-- --------------------------------------------------------

--
-- Table structure for table `Difficulties`
--

CREATE TABLE `Difficulties` (
  `id` int(11) NOT NULL,
  `differenceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EventCategory`
--

CREATE TABLE `EventCategory` (
  `idEventCategory` int(11) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
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

-- --------------------------------------------------------

--
-- Table structure for table `EventTypes`
--

CREATE TABLE `EventTypes` (
  `idEventType` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EventUsers`
--

CREATE TABLE `EventUsers` (
  `fk_idEvent` int(11) NOT NULL,
  `fk_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Paths`
--

CREATE TABLE `Paths` (
  `idPath` int(11) NOT NULL,
  `coordinatesJSON` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `UserTypes`
--

CREATE TABLE `UserTypes` (
  `idUserType` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserTypes`
--

INSERT INTO `UserTypes` (`idUserType`, `role`) VALUES
(1, 'nonMember'),
(2, 'member'),
(3, 'trailMaster');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defdwf`
--
ALTER TABLE `defdwf`
  ADD PRIMARY KEY (`xsada`);

--
-- Indexes for table `Difficulties`
--
ALTER TABLE `Difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `EventCategory`
--
ALTER TABLE `EventCategory`
  ADD PRIMARY KEY (`idEventCategory`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`idEvent`),
  ADD KEY `fk_idEventType` (`fk_idEventType`),
  ADD KEY `fk_idOwner` (`fk_idOwner`),
  ADD KEY `fk_idEventCategory` (`fk_idEventCategory`),
  ADD KEY `fk_idDifficulty` (`fk_idDifficulty`),
  ADD KEY `idPath` (`fk_idPath`);

--
-- Indexes for table `EventTypes`
--
ALTER TABLE `EventTypes`
  ADD PRIMARY KEY (`idEventType`);

--
-- Indexes for table `EventUsers`
--
ALTER TABLE `EventUsers`
  ADD PRIMARY KEY (`fk_idEvent`,`fk_idUser`),
  ADD KEY `fk_idEvent` (`fk_idEvent`),
  ADD KEY `fk_idUser` (`fk_idUser`);

--
-- Indexes for table `Paths`
--
ALTER TABLE `Paths`
  ADD PRIMARY KEY (`idPath`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_idUserTypes` (`fk_idUserTypes`);

--
-- Indexes for table `UserTypes`
--
ALTER TABLE `UserTypes`
  ADD PRIMARY KEY (`idUserType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defdwf`
--
ALTER TABLE `defdwf`
  MODIFY `xsada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Difficulties`
--
ALTER TABLE `Difficulties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `EventCategory`
--
ALTER TABLE `EventCategory`
  MODIFY `idEventCategory` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `EventTypes`
--
ALTER TABLE `EventTypes`
  MODIFY `idEventType` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Paths`
--
ALTER TABLE `Paths`
  MODIFY `idPath` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `UserTypes`
--
ALTER TABLE `UserTypes`
  MODIFY `idUserType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `Events_ibfk_1` FOREIGN KEY (`fk_idEventType`) REFERENCES `EventTypes` (`idEventType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_2` FOREIGN KEY (`fk_idOwner`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_3` FOREIGN KEY (`fk_idEventCategory`) REFERENCES `EventCategory` (`idEventCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_4` FOREIGN KEY (`fk_idDifficulty`) REFERENCES `Difficulties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Events_ibfk_5` FOREIGN KEY (`fk_idPath`) REFERENCES `Paths` (`idPath`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `EventUsers`
--
ALTER TABLE `EventUsers`
  ADD CONSTRAINT `EventUsers_ibfk_1` FOREIGN KEY (`fk_idEvent`) REFERENCES `Events` (`idEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EventUsers_ibfk_2` FOREIGN KEY (`fk_idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_idUserTypes`) REFERENCES `UserTypes` (`idUserType`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
