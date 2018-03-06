-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 06:56 AM
-- Server version: 10.1.30-MariaDB
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
-- Database: `program3-lwetzel900`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `galleryImages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `galleryImages`) VALUES
(6, 'images/gallery/20170617_113208.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceType` varchar(50) NOT NULL,
  `serviceDescription` varchar(225) NOT NULL,
  `servicePic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceType`, `serviceDescription`, `servicePic`) VALUES
(1, 'wedding', 'your wedding ceromony', NULL),
(2, 'wedding reception', 'for everything after the ceromy', NULL),
(4, 'aniversary', 'celebrating a big turning point in a relationship? we can cover that to', NULL),
(5, 'graduation reception', 'your special person is graduating high school or college, you guessed it. we do that as well', NULL),
(7, 'birthday', 'rater it be your 4 or 40 year old, we got you covered', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fName` varchar(15) NOT NULL,
  `lName` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fName`, `lName`, `email`, `address`, `city`, `zip`, `phone`, `password`) VALUES
(9, 'Loren', 'Wetzel', 'lwetzel90@gmail.com', '609 4th Ave', 'Nebraska City', 68410, '4028817220', '$2y$12$33CoiE0rHEZR/Fk.qheCg.S0718wisKuyZweG4ZpWzjp37781/arG'),
(10, 'jonny', 'jonson', 'jon@jonson.com', '156 johnnyway', 'jonsville', 68450, '7896541523', '$2y$12$nIjUEHtRovHmlPhqIRm9b.53t8xb9o0YyJ8z7MFGhjm7K0ek9gb2u');

-- --------------------------------------------------------

--
-- Table structure for table `userselection`
--

CREATE TABLE `userselection` (
  `userID` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venueID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `venuePic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venueID`, `name`, `city`, `state`, `venuePic`) VALUES
(1, 'Fox Center', 'Nebraska City', 'NE', NULL),
(4, 'Arbor Lodge', 'Nebraska City', 'NE', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `venueservice`
--

CREATE TABLE `venueservice` (
  `venueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `secondServiceID` int(11) NOT NULL,
  `thirdServiceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venueservice`
--

INSERT INTO `venueservice` (`venueID`, `serviceID`, `secondServiceID`, `thirdServiceID`) VALUES
(1, 3, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userselection`
--
ALTER TABLE `userselection`
  ADD KEY `fkUserSelection` (`venueID`),
  ADD KEY `fkUserSelect` (`serviceID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`);

--
-- Indexes for table `venueservice`
--
ALTER TABLE `venueservice`
  ADD PRIMARY KEY (`venueID`,`serviceID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userselection`
--
ALTER TABLE `userselection`
  ADD CONSTRAINT `fkUserSelect` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`),
  ADD CONSTRAINT `fkUserSelection` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Constraints for table `venueservice`
--
ALTER TABLE `venueservice`
  ADD CONSTRAINT `fkVenueService` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;