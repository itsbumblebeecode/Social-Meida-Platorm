-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2024 at 12:08 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technoweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`) VALUES
(23, 'admin', 'only', 'admin123@gmail.com', 'admin12', '$2y$10$ebLZgFFpwFOnsr70N78GKeJqJ1cH5Aj1gK6Qt2SERTH', 0),
(22, 'Ali', 'Ahmed', 'ali321@gmail.com', 'Ali321', '$2y$10$WDnlNMNvC521ITatdc.tDOpTUqUG3w4FdLLK9ccc7mq', 1),
(21, 'Hassan', 'Khan', 'hk9878@gmail.com', 'khansaab', '$2y$10$8TggxNFGxp4K2CrQ2oLvE.d/kL773TofZL9bQLmoA5i', 0),
(20, 'Musa', 'Imran', 'musa234@gmail.com', 'musa987', '$2y$10$pVRofOm/pblFPTe3OZ7Xu.sXoPVXGUT4E2bbC257ZWa', 0),
(19, 'Maaz', 'khan', 'maazkhan123@gmail.com', 'maaz45', '$2y$10$BKeUXgEYv7egluNwWUGhXuUOUoJDTe2BXiRtB2ExzCE', 0),
(16, 'Oman', 'Afridi', 'oman456@gmail.com', 'oman345', '$2y$10$1MUeaQPfIVSuCwRHnPN34evOk4hJrviuHXndzmqRw9R', 1),
(18, 'Muhammad', 'Hassan', 'hk6224325@gmail.com', 'hassan789', '$2y$10$VcKdXT3BigewagXdJvsMcu//WhgFomtVZond86o.Lq9', 0),
(30, 'Amjad', 'khan', 'khan456@gmail.com', 'amjad123', '$2y$10$E04AxFXDJcgJVFUbEFBV8u0xvh073cJ3oXl.e8SRUk9', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
