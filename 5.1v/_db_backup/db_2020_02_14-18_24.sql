-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb19.awardspace.net
-- Generation Time: 2020 m. Vas 14 d. 18:24
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2652222_tamo`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `student_username` varchar(100) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `subject` int(3) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `mark` int(2) NOT NULL,
  `type` int(1) NOT NULL,
  `period` int(1) NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `marks`
--

INSERT INTO `marks` (`id`, `student_username`, `subject`, `year`, `month`, `day`, `mark`, `type`, `period`, `uploaded`) VALUES
(1, '181339', 4, 2019, 9, 16, 10, 1, 1, '2020-02-14 16:33:33'),
(2, '181339', 6, 2019, 9, 18, 10, 2, 1, '2020-02-14 16:33:54'),
(3, '181339', 8, 2019, 9, 20, 8, 1, 1, '2020-02-14 16:34:18'),
(4, '181339', 10, 2019, 9, 20, 8, 2, 1, '2020-02-14 16:34:30'),
(5, '181339', 6, 2019, 9, 24, 9, 2, 1, '2020-02-14 16:34:56'),
(6, '181339', 6, 2019, 9, 25, 10, 2, 1, '2020-02-14 16:35:10'),
(7, '181339', 13, 2019, 9, 24, 7, 0, 1, '2020-02-14 16:35:24'),
(8, '181339', 4, 2019, 9, 30, 10, 3, 1, '2020-02-14 16:35:41'),
(9, '181339', 5, 2019, 10, 1, 8, 4, 1, '2020-02-14 16:36:16'),
(10, '181339', 6, 2019, 10, 2, 10, 2, 1, '2020-02-14 16:36:47'),
(11, '181339', 7, 2019, 10, 3, 8, 0, 1, '2020-02-14 16:37:16'),
(12, '181339', 13, 2019, 10, 3, 7, 1, 1, '2020-02-14 16:37:26'),
(13, '181339', 3, 2019, 10, 7, 7, 0, 1, '2020-02-14 16:37:53'),
(14, '181339', 0, 2019, 10, 8, 10, 2, 1, '2020-02-14 16:38:13'),
(15, '181339', 2, 2019, 10, 8, 0, 6, 1, '2020-02-14 16:38:30'),
(16, '181339', 8, 2019, 10, 9, 8, 0, 1, '2020-02-14 16:38:50'),
(17, '181339', 7, 2019, 10, 10, 7, 0, 1, '2020-02-14 16:39:05'),
(18, '181339', 10, 2019, 10, 11, 8, 2, 1, '2020-02-14 16:39:26'),
(19, '181339', 5, 2019, 10, 15, 7, 2, 1, '2020-02-14 16:39:47'),
(20, '181339', 8, 2019, 10, 18, 8, 1, 1, '2020-02-14 16:40:08'),
(21, '181339', 3, 2019, 10, 21, 9, 4, 1, '2020-02-14 16:40:43'),
(22, '181339', 4, 2019, 10, 21, 10, 0, 1, '2020-02-14 16:40:56'),
(23, '181339', 7, 2019, 10, 21, 10, 5, 1, '2020-02-14 16:41:06'),
(24, '181339', 5, 2019, 10, 22, 10, 1, 1, '2020-02-14 16:41:26'),
(25, '181339', 6, 2019, 10, 22, 9, 2, 1, '2020-02-14 16:41:47'),
(26, '181339', 13, 2019, 10, 22, 7, 0, 1, '2020-02-14 16:42:01'),
(27, '181339', 6, 2019, 10, 23, 10, 2, 1, '2020-02-14 16:42:18'),
(28, '181339', 4, 2019, 10, 25, 10, 3, 1, '2020-02-14 16:42:54'),
(29, '181339', 10, 2019, 10, 25, 8, 2, 1, '2020-02-14 16:43:07'),
(30, '181339', 12, 2019, 10, 25, 0, 2, 1, '2020-02-14 16:43:17'),
(31, '181339', 3, 2019, 11, 7, 9, 4, 1, '2020-02-14 16:43:41'),
(32, '181339', 8, 2019, 11, 8, 7, 1, 1, '2020-02-14 16:43:58'),
(33, '181339', 3, 2019, 11, 14, 9, 0, 1, '2020-02-14 16:44:20'),
(34, '181339', 4, 2019, 11, 15, 10, 0, 1, '2020-02-14 16:44:34'),
(35, '181339', 7, 2019, 11, 18, 8, 2, 1, '2020-02-14 16:44:56'),
(36, '181339', 0, 2019, 11, 19, 10, 2, 1, '2020-02-14 16:45:12'),
(37, '181339', 6, 2019, 11, 19, 10, 2, 1, '2020-02-14 16:45:16'),
(38, '181339', 8, 2019, 11, 20, 6, 0, 1, '2020-02-14 16:45:45'),
(39, '181339', 13, 2019, 11, 21, 7, 1, 1, '2020-02-14 16:46:10'),
(40, '181339', 2, 2019, 11, 26, 0, 6, 1, '2020-02-14 16:46:32'),
(41, '181339', 5, 2019, 11, 26, 8, 2, 1, '2020-02-14 16:46:47'),
(42, '181339', 6, 2019, 11, 26, 9, 2, 1, '2020-02-14 16:46:54'),
(43, '181339', 4, 2019, 11, 29, 10, 3, 1, '2020-02-14 16:47:14'),
(44, '181339', 7, 2019, 12, 2, 6, 3, 1, '2020-02-14 16:47:53'),
(45, '181339', 6, 2019, 12, 4, 10, 2, 1, '2020-02-14 16:48:24'),
(46, '181339', 8, 2019, 12, 4, 7, 1, 1, '2020-02-14 16:48:33'),
(47, '181339', 13, 2019, 12, 3, 8, 1, 1, '2020-02-14 16:48:53'),
(48, '181339', 10, 2019, 12, 6, 10, 2, 1, '2020-02-14 16:49:07'),
(49, '181339', 12, 2019, 12, 6, 0, 2, 1, '2020-02-14 16:49:18'),
(50, '181339', 4, 2019, 12, 9, 10, 0, 1, '2020-02-14 16:49:36'),
(51, '181339', 7, 2019, 12, 9, 7, 2, 1, '2020-02-14 16:49:45'),
(52, '181339', 2, 2019, 12, 10, 0, 6, 1, '2020-02-14 16:50:04'),
(53, '181339', 9, 2019, 12, 11, 0, 2, 1, '2020-02-14 16:50:15'),
(54, '181339', 3, 2019, 12, 16, 7, 0, 1, '2020-02-14 16:50:37'),
(55, '181339', 0, 2019, 12, 17, 9, 2, 1, '2020-02-14 16:50:56'),
(56, '181339', 6, 2019, 12, 17, 10, 2, 1, '2020-02-14 16:51:05'),
(57, '181339', 13, 2019, 12, 17, 7, 1, 1, '2020-02-14 16:51:25'),
(58, '181339', 8, 2019, 12, 18, 8, 0, 1, '2020-02-14 16:51:43'),
(59, '181339', 3, 2019, 12, 19, 10, 3, 1, '2020-02-14 16:52:00'),
(60, '181339', 4, 2019, 12, 20, 10, 3, 1, '2020-02-14 16:52:11'),
(61, '181339', 5, 2020, 1, 7, 7, 4, 2, '2020-02-14 16:52:52'),
(62, '181339', 7, 2020, 1, 7, 6, 2, 2, '2020-02-14 16:53:06'),
(63, '181339', 7, 2020, 1, 9, 7, 0, 2, '2020-02-14 16:53:17'),
(64, '181339', 13, 2020, 1, 14, 8, 0, 2, '2020-02-14 16:53:38'),
(65, '181339', 4, 2020, 1, 17, 10, 0, 2, '2020-02-14 16:54:00'),
(66, '181339', 8, 2020, 1, 20, 7, 0, 2, '2020-02-14 16:54:19'),
(67, '181339', 6, 2020, 1, 22, 10, 2, 2, '2020-02-14 16:54:39'),
(68, '181339', 3, 2020, 1, 23, 7, 0, 2, '2020-02-14 16:55:02'),
(69, '181339', 4, 2020, 1, 24, 10, 3, 2, '2020-02-14 16:55:18'),
(70, '181339', 2, 2020, 1, 28, 0, 6, 2, '2020-02-14 16:55:41'),
(71, '181339', 8, 2020, 1, 31, 7, 0, 2, '2020-02-14 16:56:02'),
(72, '181339', 12, 2020, 1, 31, 0, 2, 2, '2020-02-14 16:56:09'),
(73, '181339', 7, 2020, 2, 3, 6, 2, 2, '2020-02-14 16:56:38'),
(74, '181339', 6, 2020, 2, 4, 10, 2, 2, '2020-02-14 16:56:53'),
(75, '181339', 13, 2020, 2, 4, 6, 1, 2, '2020-02-14 16:57:07');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `ip` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `sessions`
--

INSERT INTO `sessions` (`id`, `username`, `ip`, `timestamp`, `delete_at`) VALUES
(77, '181339', '88.216.117.194', '2020-02-14 16:27:46', '2020-02-21'),
(78, 'mantas', '88.216.117.194', '2020-02-14 16:27:51', '2020-02-21'),
(76, '181339', '88.216.117.194', '2020-02-14 16:19:20', '2020-02-21');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `student_username` varchar(100) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `subject` varchar(100) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `teacher` varchar(100) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `first_period` float NOT NULL,
  `second_period` float NOT NULL,
  `annual` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `subjects`
--

INSERT INTO `subjects` (`id`, `student_username`, `subject`, `teacher`, `first_period`, `second_period`, `annual`) VALUES
(2, '181339', 'Geografija', 'JonikienÄ— DanguolÄ—', 0, 0, 0),
(3, '181339', 'Brush up your English', 'LiaudanskienÄ— Virginija', 0, 0, 0),
(4, '181339', 'UÅ¾sienio kalba (anglÅ³)', 'LiaudanskienÄ— Virginija', 0, 0, 0),
(5, '181339', 'Matematika', 'AsaÄiovienÄ— Emilija', 0, 0, 0),
(6, '181339', 'Matematiniai taikymai', 'AsaÄiovienÄ— Emilija', 0, 0, 0),
(7, '181339', 'BraiÅ¾yba', 'StaÅ¡aitienÄ— Neringa', 0, 0, 0),
(8, '181339', 'Dorinis ugdymas (tikyba)', 'TymalkienÄ— Kristina', 0, 0, 0),
(9, '181339', 'Fizika', 'Digaitis ArtÅ«ras', 0, 0, 0),
(10, '181339', 'Fizinis ugdymas', 'Brazaitis RiÄardas', 0, 0, 0),
(11, '181339', 'InformacinÄ—s technologijos (programavimas)', 'RemeikienÄ— Regina', 0, 0, 0),
(12, '181339', 'LietuviÅ³ kalba ir literatÅ«ra', 'JaseviÄiutÄ— Aristolda', 0, 0, 0),
(13, '181339', 'RaÅ¡tingumo Ä¯gÅ«dÅ¾iÅ³ gilinimas', 'ÄŒiunkienÄ— Dalia', 0, 0, 0),
(15, '181339', 'Muzika', 'BartkienÄ— Edita', 0, 0, 0),
(16, '181339', 'Praktinis programavimas', 'RemeikienÄ— Regina', 0, 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school` varchar(100) CHARACTER SET utf32 COLLATE utf32_lithuanian_ci NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `school`, `role`) VALUES
(1, 'Mantas', 'Lengvinas', 'mantas', 'dbc2011655856af11c00892297382cba', 'jmlmantas@gmail.com', 'JML', 1),
(3, 'Mantas', 'Lengvinas', '181339', 'dbc2011655856af11c00892297382cba', 'mantas.leng@gmail.com', 'TauragÄ—s Å½algiriÅ³ gimnazija', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
