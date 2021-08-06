-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 05:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viper_lineups_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `poisonorbs`
--

CREATE TABLE `poisonorbs` (
  `id` bigint(20) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image_url` varchar(2048) NOT NULL,
  `difficulty` varchar(10) NOT NULL,
  `map` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poisonorbs`
--

INSERT INTO `poisonorbs` (`id`, `image_id`, `title`, `image_url`, `difficulty`, `map`, `verified`, `user_name`) VALUES
(1, 8684742785400214, 'Poison Orb Example One', 'https://picsum.photos/400/300', 'hard', 'icebox', 1, ''),
(4, 765438, 'Poison Orb Example Two', 'https://picsum.photos/400/300', 'easy', 'ascent', 1, ''),
(9, 7293057289483, 'Poison Orb Example Three', 'https://picsum.photos/400/300', 'extreme', 'split', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `snakebites`
--

CREATE TABLE `snakebites` (
  `id` bigint(20) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image_url` varchar(2048) NOT NULL,
  `difficulty` varchar(10) NOT NULL,
  `map` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `snakebites`
--

INSERT INTO `snakebites` (`id`, `image_id`, `title`, `image_url`, `difficulty`, `map`, `verified`, `user_name`) VALUES
(1, 732437669112, 'Snakebite Example One', 'https://picsum.photos/400/300', 'hard', 'bind', 1, ''),
(2, 648452, 'Snakebite Example Two', 'https://picsum.photos/400/300', 'medium', 'ascent', 1, ''),
(3, 359047, 'Snakebite Example Three', 'https://picsum.photos/400/300', 'extreme', 'icebox', 1, ''),
(4, 26778188917040, 'Snakebite Example Four', 'https://picsum.photos/400/300', 'easy', 'bind', 1, 'test_account_3');

-- --------------------------------------------------------

--
-- Table structure for table `toxinscreens`
--

CREATE TABLE `toxinscreens` (
  `id` bigint(20) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image_url` varchar(2048) NOT NULL,
  `difficulty` varchar(10) NOT NULL,
  `map` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toxinscreens`
--

INSERT INTO `toxinscreens` (`id`, `image_id`, `title`, `image_url`, `difficulty`, `map`, `verified`, `user_name`) VALUES
(1, 81612, 'Toxic Screen Example One', 'https://picsum.photos/350/250', 'easy', 'ascent', 1, ''),
(2, 69162134019, 'Toxic Screen Example Two', 'https://picsum.photos/400/300', 'hard', 'breeze', 1, ''),
(3, 1914417719905783088, 'Toxin Screen Example Three', 'https://picsum.photos/400/300', 'medium', 'split', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poisonorbs`
--
ALTER TABLE `poisonorbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `title` (`title`),
  ADD KEY `image_url` (`image_url`(768)),
  ADD KEY `difficulty` (`difficulty`),
  ADD KEY `map` (`map`),
  ADD KEY `verified` (`verified`);

--
-- Indexes for table `snakebites`
--
ALTER TABLE `snakebites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `title` (`title`),
  ADD KEY `image_url` (`image_url`(768)),
  ADD KEY `difficulty` (`difficulty`),
  ADD KEY `map` (`map`),
  ADD KEY `verified` (`verified`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `toxinscreens`
--
ALTER TABLE `toxinscreens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `title` (`title`),
  ADD KEY `image_url` (`image_url`(768)),
  ADD KEY `difficulty` (`difficulty`),
  ADD KEY `map` (`map`),
  ADD KEY `verified` (`verified`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poisonorbs`
--
ALTER TABLE `poisonorbs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `snakebites`
--
ALTER TABLE `snakebites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `toxinscreens`
--
ALTER TABLE `toxinscreens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
