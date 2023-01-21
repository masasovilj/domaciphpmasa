-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 08:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvshows`
--

-- --------------------------------------------------------

--
-- Table structure for table `tvshow`
--

CREATE TABLE `tvshow` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `leading_actor` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tvshow`
--

INSERT INTO `tvshow` (`id`, `userid`, `title`, `director`, `leading_actor`, `year`, `genre`, `created_at`) VALUES
(1, 1, 'Game of Thrones', 'Mark Mylod, Alex Graves, David Nutter', 'Emilia Clarke, Kit Harington', 2011, 'Drama', '2022-12-23 23:45:06'),
(2, 1, 'Breaking Bad', 'Vince Gilligan', 'Bryan Cranston & Aaron Paul', 2008, 'Drama', '2022-12-23 23:57:20'),
(3, 1, 'Better Call Saul', 'Vince Gilligan', 'Bob Odenkirk', 2015, 'Drama', '2022-12-23 23:57:20'),
(4, 2, 'Ozark', 'Bill Dubuque', 'Jason Bateman', 2017, 'Drama', '2022-12-23 23:57:20'),
(5, 1, 'Stranger Things', 'Matt Duffer', 'Millie Bobbie Brown', 2016, 'Mystery', '2022-12-23 23:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'ss20190196@student.fon.bg.ac.rs', 'masa', 'masa1234', '2022-12-22 23:31:20'),
(2, 'testuser@mail.com', 'testuser', 'testuser', '2022-12-22 23:53:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tvshow`
--
ALTER TABLE `tvshow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tvshow`
--
ALTER TABLE `tvshow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tvshow`
--
ALTER TABLE `tvshow`
  ADD CONSTRAINT `tvshow_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
