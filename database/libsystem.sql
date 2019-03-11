-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 08:10 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`, `firstName`, `lastName`, `mobile`, `email`, `pic`) VALUES
(1, 'thebigshot', '12345', 'suraj', 'madgaonkar', '8750311282', 'sr@gmail.com', 'WWW.YTS.AG.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(4) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `title`, `author`, `price`, `publisher`, `available`) VALUES
(1001, 'Wings of fire', 'Abdul Kalam', 300, 'Kumel Publishers', 1),
(1002, 'C++', 'Balgurusami', 600, 'MCgraw', 1),
(1003, 'BC++', 'Abc', 400, 'Western', 1),
(1004, 'programming in java', 'balaguruswamy', 350, 'tata', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `bookId` int(4) NOT NULL,
  `issueId` int(3) NOT NULL,
  `issueDate` datetime NOT NULL,
  `returnBookId` int(4) NOT NULL,
  `returnId` int(3) NOT NULL,
  `returnDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `fid` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fullname`, `dept`, `fid`, `email`, `pwd`, `phone`) VALUES
(1, 'Rohan Furtado', 'ETC', 'AB124568', 'rayjoy@gmail.com', 'rohan1996', '8668697253'),
(2, 'asssd', 'COMP', '213', 'abc@mail.com', '1234', '1222455667');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(3) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `position` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestforbooks`
--

CREATE TABLE `requestforbooks` (
  `requestId` int(3) NOT NULL,
  `bookName` text NOT NULL,
  `authorName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `requestDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `unumber` varchar(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `rollno`, `unumber`, `phone`, `dept`, `email`, `pwd`) VALUES
(1, 'Suraj Morgaonkar', 'C-13-07', '201321646', '9552444958', 'COMP', 'smorgaonkar680@gmail.com', 'suraj1995'),
(2, 'rahul sharma', 'b17-11', '132455', '7668906543', 'COMP', 'abc@mail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `verifyfaculty`
--

CREATE TABLE `verifyfaculty` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `dept` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verifystudent`
--

CREATE TABLE `verifystudent` (
  `id` int(11) NOT NULL,
  `unumber` int(11) NOT NULL,
  `rollno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifyfaculty`
--
ALTER TABLE `verifyfaculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifystudent`
--
ALTER TABLE `verifystudent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verifyfaculty`
--
ALTER TABLE `verifyfaculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifystudent`
--
ALTER TABLE `verifystudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
