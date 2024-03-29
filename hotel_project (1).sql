-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 03:12 PM
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
-- Database: `hotel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(64) NOT NULL,
  `news_text` varchar(1024) NOT NULL,
  `news_filepath` varchar(512) NOT NULL,
  `news_date` date DEFAULT current_timestamp(),
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_text`, `news_filepath`, `news_date`, `admin_id`) VALUES
(1, 'Urlaubstrends 2024: Der Sommer kann kommen', 'Der Mittelmeerraum wird 2024 erneut zu den beliebtesten Urlaubsregionen der Österreicherinnen und Österreicher zählen, ist Freizeitforscher Peter Zellmann überzeugt. Und der Trend, kurzfristig zu buchen, wird sich weiter verstärken.', 'resized/Screenshot 2024-01-13 022337.png', '2024-01-13', 0),
(2, 'Neuheit im Jahr 2024: Spa-Dienstleistungen ab August in unserem ', 'Liebe Gäste,\r\n\r\nWir freuen uns, Ihnen mitteilen zu können, dass wir ab sofort exklusive Wellness-Dienstleistungen in unserem Hotel anbieten. Entspannen Sie Körper und Geist in unserem brandneuen Spa, das eine Vielzahl von erholsamen Behandlungen und modernen Einrichtungen bietet. Genießen Sie Massagen, Gesichtsbehandlungen und vieles mehr für ein unvergessliches Wellnesserlebnis. Reservieren Sie noch heute und lassen Sie sich von unserem engagierten Team verwöhnen.\r\n\r\nMit freundlichen Grüßen,\r\nCasa Valle Team', 'resized/spa_1.jpg', '2024-01-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  `breakfast_service` varchar(10) DEFAULT NULL,
  `parking_service` varchar(10) DEFAULT NULL,
  `pets_service` varchar(10) DEFAULT NULL,
  `reservation_status` varchar(20) DEFAULT 'neu',
  `admin_id` int(11) NOT NULL,
  `uid_fk` int(11) DEFAULT NULL,
  `erstellt_am` datetime DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `arrival_date`, `departure_date`, `room_type`, `breakfast_service`, `parking_service`, `pets_service`, `reservation_status`, `admin_id`, `uid_fk`, `erstellt_am`, `room_id`, `price`) VALUES
(29, '2024-01-24', '2024-01-26', 'Pool', 'Ja', 'Ja', 'Ja', 'neu', 0, 42, '2024-01-15 15:07:36', 8, 205),
(30, '2024-01-18', '2024-01-19', 'Double', 'Nein', 'Nein', 'Ja', 'neu', 0, 42, '2024-01-15 15:07:52', 3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`) VALUES
(1, 'Single'),
(2, 'Single'),
(3, 'Double'),
(4, 'Double'),
(5, 'Familienzimmer'),
(6, 'Familienzimmer'),
(7, 'Pool'),
(8, 'Pool');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  `anrede` varchar(32) NOT NULL,
  `vorname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'aktiv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `anrede`, `vorname`, `lastname`, `email`, `username`, `password`, `status`) VALUES
(40, 'user', 'Herr', 'user', 'user', 'user@user.user', 'user', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'aktiv'),
(41, 'admin', 'Herr', 'admin', 'admin', 'admin@admin.admin', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'aktiv'),
(42, 'user', 'Herr', 'Kenn-Michael', 'Sanga', 'kennsanga@yahoo.com', 'if23b128', '720fa1a25ee112bb64259ab07d62e20076a3b55879d998596a5ed35362d1e6ba67e2b504e0e78eea5cd291f280e639c24f6b640853d494494fe05e521cb268b0', 'aktiv'),
(45, 'admin', 'Frau', 'Ece', 'Sen', 'eecesenn@gmail.com', 'if23b062', 'f6b07b6c1340e947b861def5f8b092d8ee710826dc56bd175bdc8f3a16b0b8acf853c64786a710dedf9d1524d61e32504e27d60de159af110bc3941490731578', 'aktiv'),
(46, 'user', 'Herr', 'Lewis', 'Hamilton', 'lh44@gmail.com', 'hamilton', '3014f908bc8a7992d2f49dcaf9343caf2a8bb12321b8020d21d950bf71c7dada7a8220c2be236e6cfa7a10d33f679c00c263ff066d69e4df2fbac12194f0d099', 'aktiv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`,`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `uid_fk` (`uid_fk`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
