-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 02:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillvirtualinstructor`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `duration` int(10) NOT NULL,
  `difficulty` varchar(10) NOT NULL,
  `parts` int(2) NOT NULL,
  `experience` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `title`, `category`, `author`, `image`, `description`, `duration`, `difficulty`, `parts`, `experience`) VALUES
(1, 'Learn how to make a paper crane - Origami lesson', 'origami', 'Michael Scofield', 'origami.jpg', 'A simple and easy to follow lesson that will teach you how to create a paper crane using origami, the art of paper folding, which is often associated with Japanese culture.', 30, 'Begginer', 2, 'No prior experience needed'),
(2, 'Easy paper boat using origami', 'origami', 'Sharleen Astrid', 'boat.jpg', 'A simple and easy to follow lesson that will teach you how to create a paper boat to play with', 10, 'Begginer', 1, 'No prior experience needed'),
(3, 'Playful paper frog - fun for you or your kids', 'origami', 'Michael Scofield', 'frog.jpg', 'A single lesson that will teach you or your kids how to make some fun and easy paper frogs that actually jump.', 15, 'Begginer', 1, 'No prior experience needed'),
(4, 'Learn the basics of CPR on adults', 'cpr', 'WikiHow', 'cpr.jpg', 'Learn how to properly help an unconscious person. Please use a mannequin for a more hands-on experience', 45, 'Medium-Har', 2, 'Any medical experience is welcome'),
(5, 'CPR for children', 'cpr', 'WikiHow', 'cprbaby.jpg', 'A guide to perform CPR on children in case of emergency, please practice using a mannequin for a better learning experience', 45, 'Hard', 1, 'Any prior experience in CPR');

-- --------------------------------------------------------

--
-- Table structure for table `cpr`
--

CREATE TABLE `cpr` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `json` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpr`
--

INSERT INTO `cpr` (`id`, `course_id`, `name`, `image`, `json`) VALUES
(1, 4, 'Basics of CPR on adults', 'cpradult5', 'cpr1'),
(2, 4, 'How to give rescue breaths to adults', 'cprbreath1', 'cpr3'),
(3, 5, 'How to perform CPR on a child', 'cprchild6', 'cpr2');

-- --------------------------------------------------------

--
-- Table structure for table `origami`
--

CREATE TABLE `origami` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `json` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `origami`
--

INSERT INTO `origami` (`id`, `course_id`, `name`, `image`, `json`) VALUES
(1, 1, 'Learn how to make square paper for origami', 'paper', 'origami1'),
(2, 1, 'Learn how to make a paper crane using origami', 'crane2', 'origami2'),
(3, 2, 'Making the paper boat', 'boat', 'origami3'),
(4, 3, 'How to Fold an Easy Origami Jumping Frog', 'frog2', 'origami5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `name`, `password`) VALUES
('bleojua', 'adrian.bleoju@yahoo.com', 'Bleoju Adrian-Petru', 'bleojua'),
('asd', 'asd', 'asd', 'asd'),
('bleojua98', 'bleojua98@gmail.com', 'Bleoju Adrian-Petru', 'bleojua98'),
('Test', 'gheorghitard@gmail.com', 'Razvan-Daniel Gheorghita', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cpr`
--
ALTER TABLE `cpr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `json` (`json`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `origami`
--
ALTER TABLE `origami`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `json` (`json`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
