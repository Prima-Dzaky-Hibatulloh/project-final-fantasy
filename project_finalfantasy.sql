-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 07:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_finalfantasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `cookie` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `username`, `password`, `created_at`, `cookie`, `token`, `role_id`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$cew1LV3lSLteYr2e2AGAO.8O9F6Z5ZaodXfXcdrFgiyULOROfq44W', '2024-12-13', NULL, NULL, 1),
(2, 'andhika@gmail.com', 'andika', '$2y$10$tWAPbv1I3waVH0ErlFF12.i/LX0GQf4r2xp8JoFHhC133mZVCIkEq', '2024-12-13', NULL, 'f0cc0d0252405d608d30a27c069cc236', 2),
(3, 'eko@gmail.com', 'eko', '$2y$10$Su8bKZpxdxqzsLwnUguAb.Bnwto/FJIRcZvSE65Ht0t6V6BAY4EjG', '2024-12-13', NULL, NULL, 2),
(4, 'putra@gmail.com', 'putra', '$2y$10$zqNYMi1F.WFaV3fYOS6pQ.ktddMY0Kzmn6vbBfHnfzsxaj.pRicky', '2024-12-13', NULL, NULL, 2),
(5, 'kronos@gmail.com', 'kronos', '$2y$10$Gt3OKLX2ZzFvlctQjdaBIOJCaBlGN8tacOKtTTd2IoDAPOv.UTTAe', '2024-12-13', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `combine`
--

CREATE TABLE `combine` (
  `id` int(11) NOT NULL,
  `materia1_id` int(11) NOT NULL,
  `materia2_id` int(11) NOT NULL,
  `effect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `combine`
--

INSERT INTO `combine` (`id`, `materia1_id`, `materia2_id`, `effect`) VALUES
(1, 1, 3, 'Memulihkan 5% MP dari damage Bahamut.'),
(2, 1, 5, 'Memulihkan 3% MP dari total damage yang diberikan oleh Fire.'),
(3, 1, 2, 'Memulihkan 3% MP dari target yang berhasil dicuri.');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `category` enum('support','magic','command','summon','complete') NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id`, `name`, `category`, `description`, `picture`) VALUES
(1, 'MP Absorption', 'support', 'Allows you to recover MP when unleashing an attack of the linked materia\'s type.', 'asset-materia/blue.png'),
(2, 'Steal', 'command', 'grants the user to execute the battle command: Steal.', 'asset-materia/yellow.png'),
(3, 'Bahamut', 'summon', 'It summons Bahamut, a dragon whose non-elemental magic attacks deal major damage to enemies.', 'asset-materia/red.png'),
(4, 'ATB Stagger', 'complete', 'It increases a character\'s ATB gauge when staggering an enemy.', 'asset-materia/purple.png'),
(5, 'Fire', 'magic', 'provide the user Fire Fire-elemental spells.', 'asset-materia/green.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `combine`
--
ALTER TABLE `combine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia1_id` (`materia1_id`),
  ADD KEY `materia2_id` (`materia2_id`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `combine`
--
ALTER TABLE `combine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `combine`
--
ALTER TABLE `combine`
  ADD CONSTRAINT `combine_ibfk_1` FOREIGN KEY (`materia1_id`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `combine_ibfk_2` FOREIGN KEY (`materia2_id`) REFERENCES `materia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
