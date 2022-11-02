-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:00 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(100) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `subject`, `description`, `deadline`, `user`) VALUES
(1, 'Teambuilding', 'Developmental Activities', 'Presentation of the proposed teambuilding activities.', '2022-11-02', 'jo@tao.com'),
(2, 'mysql integration to PHP app', 'Web Dev', 'creating a crud application', '2022-11-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `email`, `password`) VALUES
(1, 'Joann', 'Bernadez', 'Davao', 'jo@tao.com', '12345678'),
(2, 'Anna', 'Jorge', 'Cebu', 'ana@tao.com', '123'),
(3, 'Joseph', 'Molina', 'Mars', 'seph@tao.com', '123456'),
(4, 'Jessa', 'Tano', 'Negros', 'jess@tao.com', '123'),
(5, 'Juspher', 'Balangyao', 'Bohol', 'jus@tao.com', '1234'),
(6, 'Ryuk', 'Uzumaki', 'Nowhere', 'ryuk@tao.com', '123'),
(7, 'Jo', 'Ann', 'Cebu', 'ann@tao.com', '123'),
(8, 'Juls', 'Estorco', 'Negros', 'juls@tao.com', 'Juls123!'),
(9, 'Shaki', 'Tinapay', 'Medellen', 'shak@tao.com', 'Shak123!'),
(10, 'Jan Nino', 'Baoc', 'Nasipit', 'baoc@gmail.com', 'Jan1234!'),
(11, 'Ambot', 'Nimo', 'naga', 'ambot@gmail.com', 'Ambot123!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
