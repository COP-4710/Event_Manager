-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2019 at 01:52 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(1) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `username`, `rating`, `description`, `timestamp`, `eventid`) VALUES
(1, 'UCFSucks', 1, 'I hate these parties they are always so lame!!!!', '2019-11-11 01:59:21', 2),
(2, 'UCFisGreat', 5, 'Always a fun time ', '2019-11-11 01:59:21', 2),
(3, 'UCFSucks', 1, 'I hate these parties they are always so lame!!!!', '2019-11-11 01:59:23', 2),
(4, 'UCFisGreat', 5, 'Always a fun time ', '2019-11-11 01:59:23', 2),
(5, 'Ben', 1, 'love this class', '2019-11-11 03:31:40', 2),
(6, 'Ben', 4, 'fun but It would be better if it was not in the middle of November.', '2019-11-11 03:37:36', 2),
(7, 'Ben', 5, 'Lol', '2019-11-11 03:40:53', 2),
(8, 'Ben', 3, 'Whats good', '2019-11-11 23:24:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commentPrivate`
--

CREATE TABLE `commentPrivate` (
  `commentid` int(11) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PRIVATEe` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentRSO`
--

CREATE TABLE `commentRSO` (
  `RSOe` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `event_name` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `date`, `description`, `event_name`, `start`, `end`) VALUES
(2, '2019-11-08', 'Join us for a Halloween Party with Students and Teachers. ', 'UCF Halloween Party', '18:00:00', '19:00:00'),
(3, '2019-11-08', 'Come to how Halloween theme Photography meeting ', 'Photography meeting', '10:00:00', '11:00:00'),
(4, '2019-11-08', 'WANT TO LEARN HOW TO HACK!\r\n', 'HACK UCF', '15:00:00', '16:00:00'),
(5, '2019-11-08', 'Ben is the best as computer science and here is here to accept nobel piece prize', 'ACM', '22:30:00', '23:30:00'),
(6, '2019-11-08', 'Ben is the best as computer science and here is here to accept nobel piece prize', 'ACM', '22:30:00', '23:30:00'),
(7, '2019-11-08', 'Ben is the best as computer science and here is here to accept nobel piece prize', 'ACM', '22:30:00', '23:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_name` varchar(255) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `event_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `email`, `password`) VALUES
(1, 'b.m', '5'),
(2, '.m', '5'),
(3, '', ''),
(4, '.', '5'),
(14, 'ivigioknl', '5'),
(15, 'test@test.com', 'test'),
(17, 'benleheup@gmail.com', '12345678'),
(20, 'benlehep@gmail.com', '12345678'),
(28, 'benlp@gmail.com', '12345678'),
(29, 'benlp@gifgkufkumail.com', '12345678'),
(30, 'b6tv5@', '0'),
(43, '123@1', '1'),
(44, 'y8@1', '12'),
(45, 'biqwdbip@1', '12'),
(46, 'oewfno@q', '12'),
(47, 'opjoin@q', '12'),
(48, 'WQd!@1', '12'),
(49, 'dou@1', '12'),
(50, 'T@T', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `personalInfo`
--

CREATE TABLE `personalInfo` (
  `userid` int(255) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userlevel` int(1) NOT NULL DEFAULT '1',
  `university` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personalInfo`
--

INSERT INTO `personalInfo` (`userid`, `firstname`, `lastname`, `username`, `userlevel`, `university`) VALUES
(3, '', '', '', 1, ''),
(17, 'Ben', 'Le', 'bleheup', 1, 'UNIVERSITY OF CENTRAL FLORIDA'),
(20, 'Ben', 'Le', 'blehep', 1, 'UNIVERSITY OF CENTRAL FLORIDA'),
(28, 'Ben', 'Le', 'blep', 1, 'UNIVERSITY OF CENTRAL FLORIDA'),
(29, 'Ben', 'Le', 'blep]', 1, 'UNIVERSITY OF CENTRAL FLORIDA'),
(30, 'byibiyb', ' ubhu', 'bhp h', 1, 'ububub'),
(49, 'bdiqb', 'dbijq', 'bdfi;', 1, 'bqdq'),
(50, 'T', 'T', 'T', 3, 'EVERYUNIVERSITY');

-- --------------------------------------------------------

--
-- Table structure for table `Private_event`
--

CREATE TABLE `Private_event` (
  `PRIVATEe` int(11) NOT NULL,
  `university` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `event_name` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RSOs`
--

CREATE TABLE `RSOs` (
  `RSO` int(11) NOT NULL,
  `university` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RSOs`
--

INSERT INTO `RSOs` (`RSO`, `university`, `name`, `email`, `description`, `userid`) VALUES
(1, 'University of Central Florida', 'ER What?', 'ErWhat@er.com', 'In this Organization we spend time figuring the mysteries of Erlang. Why isn\'t your code compiling\"? Come by and as Gary \"Bill Gates\" Leavens for the answers. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `RSO_events`
--

CREATE TABLE `RSO_events` (
  `RSOe` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `RSO` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `event_name` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RSO_events`
--

INSERT INTO `RSO_events` (`RSOe`, `userid`, `RSO`, `date`, `description`, `event_name`, `start`, `end`) VALUES
(3, 3, 3, '2019-11-19', 'houho', 'uhno', '06:00:00', '08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `personalInfo`
--
ALTER TABLE `personalInfo`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `RSOs`
--
ALTER TABLE `RSOs`
  ADD PRIMARY KEY (`RSO`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `RSO_events`
--
ALTER TABLE `RSO_events`
  ADD UNIQUE KEY `RSOe` (`RSOe`,`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `personalInfo`
--
ALTER TABLE `personalInfo`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `RSOs`
--
ALTER TABLE `RSOs`
  MODIFY `RSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
