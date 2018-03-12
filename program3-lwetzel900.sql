-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 05:12 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
Drop DATABASE IF EXISTS `wedding`;
Drop DATABASE IF EXISTS `program3-lwetzel900`;
CREATE DATABASE IF NOT EXISTS `program3-lwetzel900` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `program3-lwetzel900`;
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
(1, 'images/gallery/20170617_113208.jpg');

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
(1, 'wedding', 'your wedding ceromony', 'images/service/serviceDefault.jpg'),
(2, 'wedding reception', 'for everything after the ceromy', 'images/service/serviceDefault.jpg'),
(3, 'Anniversary ', 'celebrating a big turning point in a relationship? we can cover that to', 'images/service/serviceDefault.jpg'),
(8, 'Birthday', 'Rather it is for your 4 or 40 year old, we got you covered', 'images/service/brandon.jpg'),
(9, 'get some', 'gotta get it in while you still got it', 'images/service/serviceDefault.jpg'),
(11, 'Fun', 'lets have some fun', 'images/service/brandon (2).jpg'),
(12, 'fun fun', 'even more fun', 'images/service/serviceDefault.jpg'),
(13, 'funner', 'the most fun', 'images/service/serviceDefault.jpg'),
(14, 'yum', 'taste testing', 'images/service/serviceDefault.jpg'),
(15, 'thats it', 'thats all there is ', 'images/service/serviceDefault.jpg'),
(16, 'Graduation Reception', 'your special person is graduating high school or college, you guessed it. we do that as well', 'images/service/serviceDefault.jpg'),
(17, 'haha', 'stand up comedy', 'images/service/serviceDefault.jpg'),
(19, 'Ugh!!!', 'Ugh ugh ugh', 'images/service/serviceDefault.jpg'),
(20, 'All in All', 'all in all this has been interesting', 'images/service/serviceDefault.jpg');

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
(1, 'Loren', 'Wetzel', 'lwetzel90@gmail.com', '609 4th Ave', 'Nebraska City', 68410, '4028817220', '$2y$12$33CoiE0rHEZR/Fk.qheCg.S0718wisKuyZweG4ZpWzjp37781/arG'),
(2, 'jonny', 'jonson', 'jon@jonson.com', '156 johnnyway', 'jonsville', 68450, '7896541523', '$2y$12$nIjUEHtRovHmlPhqIRm9b.53t8xb9o0YyJ8z7MFGhjm7K0ek9gb2u'),
(3, 'randy', 'randson', 'some@thing.com', '123 rtsd', 'Randville', 10212, '789-654-1478', '$2y$12$gZuU3nIegtNPgtn0RZko7eKpFRh7BzTSlEYBwPWaWU5YtroinLYDm'),
(4, 'billy', 'billyson', 'billy@billy.com', '234 1st ave.', 'Billyville', 98563, '410-879-9632', '$2y$12$N2quYbZ1HU/j8vJh65m5z.QUh4Sy7uaciOi9EaqpES8Ub8hjktMMq'),
(5, 'qwe', 'rty.', 'qwe@rty.com', '123 wert ', 'Qwerty City', 78987, '123-456-7890', '$2y$12$9iWsac6OcRZ3RarjnQEHn.fjquYx8vrteTPzv325qKGafdEXmu8RO'),
(6, 'asdf2', 'adgf', 'asfd@sdfads.com', 'agf', 'asdf', 12345, '123-456-7890', '$2y$12$de0yFqEz8lL4OdW4.WudWuqSPIovUwIhuv9MaTmuCij1KJZrQieaq'),
(7, '', '', '', '', '', 0, '', '$2y$12$kpEb.BmNncqjOgmliVPJHe.N8EdtbAPj4LlkMil1Rnt/MrlGnisOW'),
(19, 'agfdshaf', 'afdhafh', 'sgfhGD@xgzgf.com', '123 fsdh', 'afdg', 78965, '789-456-7896', '$2y$12$l9VjXBT8NOeDcTUqczb7PO9EyQLaUWUO14oXe9jvzTZZtk0B67fM6'),
(20, 'ahsdjfg', 'ahdfgl', 'get@some.com', '123 kjfagndskj', 'adfsadf', 12345, '789-654-1230', '$2y$12$n5aymuRtAB9kzJSEMqL3j.4ClHhTN8j6LU4yaDlIAJOcsK4Tjywwu'),
(21, 'fdah', 'fadh', 'fgshtth@zgfh.com', '123 s fdgh', 'adg', 56786, '789-456-7898', '$2y$12$FuLHCGE1tboZOseeODfgfuGUhkHtuOIowBuiDCDFwsRh1ykyA44Vi');

-- --------------------------------------------------------

--
-- Table structure for table `userselection`
--

CREATE TABLE `userselection` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userselection`
--

INSERT INTO `userselection` (`id`, `userID`, `venueID`, `serviceID`) VALUES
(14, 2, 1, 4),
(17, 2, 2, 3),
(23, 1, 5, 1),
(24, 0, 0, 11),
(25, 1, 2, 13),
(26, 1, 1, 2),
(27, 1, 1, 14);

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
(2, 'Arbor Lodge', 'Nebraska City', 'NE', 'default'),
(5, 'blah blah', 'blahville', 'BA', 'default'),
(6, 'That Venue', 'Over There', 'BS', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `venueservice`
--

CREATE TABLE `venueservice` (
  `id` int(11) NOT NULL,
  `venueID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venueservice`
--

INSERT INTO `venueservice` (`id`, `venueID`, `serviceID`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 2, 3),
(5, 2, 1),
(6, 2, 8),
(8, 5, 9),
(10, 5, 1),
(11, 5, 3),
(12, 5, 2),
(14, 2, 13),
(15, 1, 14),
(16, 5, 15),
(17, 1, 16),
(18, 5, 8),
(19, 5, 19),
(20, 6, 20),
(21, 1, 21),
(22, 5, 22),
(23, 6, 8),
(24, 2, 8),
(25, 2, 8),
(26, 6, 11),
(27, 1, 8);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`);

--
-- Indexes for table `venueservice`
--
ALTER TABLE `venueservice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userselection`
--
ALTER TABLE `userselection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venueservice`
--
ALTER TABLE `venueservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
