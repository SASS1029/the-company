-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 23, 2022 at 01:19 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phpto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `phpto`) VALUES
(1, 'Keisuke', 'Honda', 'user_1', '$2y$10$KODHf2ku9VN68UJTgt7bu.rFFxD3vVyUECaQsd9admUiVxJCk4uR.', NULL),
(2, 'Shinji', 'Kagawa', 'user_2', '$2y$10$pNzThNRYwjbRXHQYiKs7beIVroAjnmTuGJJSByGISsolk2oCtHM7O', NULL),
(3, 'Yuto', 'Nagatomo', 'user_3', '$2y$10$nbo5JhyHsd/b0QX4C7kWoumyp0LhIyvNPdwjMEB5vjefN0rXMfTOO', NULL),
(4, 'Maya', 'Yoshida', 'user_4', '$2y$10$Be65cbYMEId4M./dsRQWxe9R6vXvWGPq74clJfVAu8FqlB8LU7Ac6', NULL),
(5, 'Takehusa', 'Kubo', 'user_5', '$2y$10$6k24wKSx4F7bfGA4PUZE6uGu9gLevuqusmca0v2noKfoaHo8Dv1W.', NULL),
(6, 'Takehiro', 'Tomiyasu', 'taketomi', '$2y$10$EidYMG5/Iy9j9d93HywumeG858NwwHdq.nz/DSySILXzyivAgFV96', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
