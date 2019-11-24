-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2019 at 12:57 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
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
  `eventid` int(255) NOT NULL,
  `commentid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(1) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`eventid`, `commentid`, `username`, `rating`, `description`, `timestamp`) VALUES
(2, 1, 'UCFSucks', 1, 'I hate these parties they are always so lame!!!!', '2019-11-11 01:59:21'),
(2, 2, 'UCFisGreat', 5, 'Always a fun time ', '2019-11-11 01:59:21'),
(2, 3, 'UCFSucks', 1, 'I hate these parties they are always so lame!!!!', '2019-11-11 01:59:23'),
(2, 4, 'UCFisGreat', 5, 'Always a fun time ', '2019-11-11 01:59:23'),
(2, 5, 'Ben', 1, 'love this class', '2019-11-11 03:31:40'),
(2, 6, 'Ben', 4, 'fun but It would be better if it was not in the middle of November.', '2019-11-11 03:37:36'),
(2, 7, 'Ben', 5, 'Lol', '2019-11-11 03:40:53'),
(2, 8, 'Ben', 3, 'Whats good', '2019-11-11 23:24:44'),
(3, 9, 'Bleheup', 1, 'Type comment here', '2019-11-19 23:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `commentPrivate`
--

CREATE TABLE `commentPrivate` (
  `PRIVATEe` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(1) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentRSO`
--

CREATE TABLE `commentRSO` (
  `RSOe` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentRSO`
--

INSERT INTO `commentRSO` (`RSOe`, `commentid`, `rating`, `username`, `description`, `timestamp`) VALUES
(1, 1, 1, 'Bleheup', 'Type comment here', '2019-11-19 23:49:18'),
(1, 2, 4, 'admin', 'I like erlang', '2019-11-20 01:27:48');

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
(2, '2019-11-18', 'Join us for a Halloween Party with Students and Teachers. ', 'UCF Halloween Party', '18:00:00', '19:00:00'),
(3, '2019-11-08', 'Come to how Halloween theme Photography meeting ', 'Photography meeting', '10:00:00', '11:00:00'),
(4, '2019-11-08', 'WANT TO LEARN HOW TO HACK!\r\n', 'HACK UCF', '15:00:00', '16:00:00'),
(5, '2019-11-08', 'Come by and learn stuff about competitive programming ', 'Competitive programing', '22:30:00', '23:30:00'),
(10, '2019-11-19', 'Lets show UCF some love and clean up the campus ', 'UCF Cleanup', '15:00:00', '16:00:00'),
(11, '2019-11-23', 'Lets talk Apple!', 'MAC Team', '12:00:00', '14:00:00');

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
  `event_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_name`, `longitude`, `latitude`, `date`, `start`, `end`, `event_name`) VALUES
('Library', 1, 1, '2019-11-19', '20:15:00', '20:30:00', 'Demo'),
('Mallican Hall', 1, 1, '2019-11-29', '12:00:00', '16:00:00', 'Flat Earth Society'),
('Technology Commons', 1, 1, '2019-11-23', '12:00:00', '14:00:00', 'MAC Team'),
('Event Location', 1, 1, '2019-11-28', '12:13:00', '13:13:00', 'Type Name here'),
('Millican Hall', 1, 1, '2019-11-19', '15:00:00', '16:00:00', 'UCF Cleanup'),
('Memory Mall', 1, 1, '2019-11-18', '18:00:00', '19:00:00', 'UCF Halloween Party'),
('Event Location', 1, 1, '2019-11-20', '12:13:00', '13:13:00', 'ui'),
('Vitamin water Inc', 1, 1, '2020-02-13', '12:12:00', '13:12:00', 'vitamin water'),
('Event Location', 1, 1, '2019-11-29', '12:12:00', '12:23:00', 'We love erlang');

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
(1, 'bleheup@knights.ucf.edu', '1234'),
(2, 'bmason@mason.com', '1234'),
(3, 'MGuerra@Guerra.com', '1234'),
(4, 'NSolano@Solano.com', '1234'),
(5, 'Kevin@Thai.com', '1234'),
(6, 'Emily@Le.com', '1234'),
(7, 'Emily@Ly.com', '1234'),
(8, 'admin@test.com', '4801481102Ben3@'),
(9, 'Habeeba@Au.com', '1234'),
(10, 'Emma@m.com', '1234'),
(11, 'sksks@sss.com', 'myspace'),
(15, 'Jorge@San.com', '1234'),
(16, 'scott@s.com', '1234'),
(17, 'stewart@s.com', '1234'),
(18, 'lindsay@l.com', '1234'),
(19, 'Mikayla@L.com', '1234'),
(20, 'Raejean@wren.com', '1234');

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
(1, 'Benjamin ', 'Le Heup', 'Bleheup', 1, 'University of Central Florida'),
(2, 'Brent', 'Davis', 'bmason', 1, 'University of Central Florida'),
(3, 'Mikayla', 'Guerra', 'mickey', 1, 'University of Central Florida'),
(4, 'Nadja', 'Solano', 'Im12', 1, 'University of Central Florida'),
(5, 'Kevin', 'Thai', 'Thai', 1, 'Seminole State College'),
(6, 'Emily', 'Le Heup', 'Amy', 1, 'University of Central Florida'),
(7, 'Emily', 'Ly', 'ELy', 1, 'Seminole State College'),
(8, 'Admin', 'Test', 'admin', 3, 'University of Central Florida'),
(9, 'Habeeba', 'Au', 'HAu', 1, 'Valencia College'),
(10, 'Emma', 'EM', 'Em', 1, 'University of Central Florida'),
(11, 'Emily', 'Baker', 'myspace', 1, 'UCF'),
(12, 'test', 'test', 'test', 1, 'test university'),
(13, 'test', 'test', 'test2', 1, 'Youtube'),
(14, 'test', 'test', 'test3', 1, 'FSU'),
(15, 'Jorge', 'San', 'JSan', 1, 'Valencia College'),
(16, 'Scott', 'Filetti', 'sfile', 1, 'University of Cental Florida'),
(17, 'Stew', 'WIE', 'stewie@s.com', 1, 'Keiser University'),
(18, 'lindsay', 'T', 'lindsay@l.com', 1, 'waterloo'),
(19, 'mikayla', 'lencieri', 'ML', 1, 'University of Central Florida'),
(20, 'Raejean', 'Wren', 'Rwren ', 1, 'Valencia College');

-- --------------------------------------------------------

--
-- Table structure for table `Private_event`
--

CREATE TABLE `Private_event` (
  `PRIVATEe` int(11) NOT NULL,
  `university` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `event_name` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Private_event`
--

INSERT INTO `Private_event` (`PRIVATEe`, `university`, `date`, `description`, `event_name`, `start`, `end`) VALUES
(1, 'University of Central Florida', '2019-11-30', 'Think you can code? Come tryout for our programming team who has 37 years record of placing in the top 3 regionally. ', 'UCF Programming Team Tryouts', '09:00:00', '10:00:00'),
(2, 'University of Central Florida', '2019-11-30', 'Think you can code? Come tryout for our programming team who has 37 years record of placing in the top 3 regionally. ', 'UCF Programming Team Tryouts', '09:00:00', '10:00:00'),
(3, 'University of Central Florida', '2019-11-13', 'Event Description', 'Type Name here', '12:13:00', '13:13:00'),
(4, 'University of Central Florida', '2019-11-19', 'Demo!!!', 'Demo', '20:15:00', '20:30:00'),
(5, 'University of Central Florida', '2019-11-19', 'Event Description', 'Type Name here', '12:11:00', '13:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `RSOmembers`
--

CREATE TABLE `RSOmembers` (
  `RSO` int(255) NOT NULL,
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RSOmembers`
--

INSERT INTO `RSOmembers` (`RSO`, `userid`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 8),
(1, 9),
(1, 10),
(4, 1),
(4, 3),
(4, 8),
(5, 1),
(5, 5),
(5, 7);

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
  `userid_admin` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RSOs`
--

INSERT INTO `RSOs` (`RSO`, `university`, `name`, `email`, `description`, `userid_admin`, `active`) VALUES
(1, 'University of Central Florida', 'ER What?', 'ErWhat@er.com', 'In this Organization we spend time figuring the mysteries of Erlang. Why isn\'t your code compiling\"? Come by and as Gary \"Bill Gates\" Leavens for the answers. ', 1, 1),
(2, 'Florida State University', 'Garnett and Gold', 'GandG@FSU.com', 'Show your passions for your school and come b y to see how you can participate in making our school a better place. ', 8, 0),
(3, 'Florida State University', 'Gardening Club', 'Gardening@FSU.com', 'Lets spend time beautifying the campus. ', 1, 0),
(4, 'University of Central Florida', 'Black and Gold', 'TheBestUniversity@ucf.edu', 'Join the hype team.', 2, 0),
(5, 'Seminole State College', 'Seminole Nerds', 'SemNerds@Sem.com', 'Like to play video games? Want to talk about tech? Come to our meetings to talk about all things nerdy.', 5, 0);

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
(1, 8, 1, '2019-11-15', 'We will be going in depth on lamdas', 'Fall 2019 meet 1', '12:30:00', '16:30:00'),
(14, 1, 1, '2019-11-29', 'Event Description', 'We love erlang', '12:12:00', '12:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `commentPrivate`
--
ALTER TABLE `commentPrivate`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `commentRSO`
--
ALTER TABLE `commentRSO`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`event_name`);

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
-- Indexes for table `Private_event`
--
ALTER TABLE `Private_event`
  ADD PRIMARY KEY (`PRIVATEe`);

--
-- Indexes for table `RSOmembers`
--
ALTER TABLE `RSOmembers`
  ADD UNIQUE KEY `RSO` (`RSO`,`userid`);

--
-- Indexes for table `RSOs`
--
ALTER TABLE `RSOs`
  ADD PRIMARY KEY (`RSO`);

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
  MODIFY `commentid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `commentPrivate`
--
ALTER TABLE `commentPrivate`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commentRSO`
--
ALTER TABLE `commentRSO`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `personalInfo`
--
ALTER TABLE `personalInfo`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `Private_event`
--
ALTER TABLE `Private_event`
  MODIFY `PRIVATEe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `RSOs`
--
ALTER TABLE `RSOs`
  MODIFY `RSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `RSO_events`
--
ALTER TABLE `RSO_events`
  MODIFY `RSOe` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
