-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jan 2024 um 02:26
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hotel_project`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(64) NOT NULL,
  `news_text` varchar(1024) NOT NULL,
  `news_filepath` varchar(512) NOT NULL,
  `news_date` date DEFAULT current_timestamp(),
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_text`, `news_filepath`, `news_date`, `admin_id`) VALUES
(20, 'Werner und Tottenham - passt das?', 'Werners Motive sind klar nachvollziehbar: Der Angreifer will unbedingt bei der Heim-EM im Sommer dabei sein. Ein Ziel, das er jedoch in Leipzig ernsthaft gefährdet sieht, da er bei den Sachsen zuletzt nur noch die zweite Geige spielte. „Er muss Spielpraxis sammeln, wenn er bei der Europameisterschaft eine Rolle spielen möchte“, betonte Rose.', 'resized/2068144_body_780622_ticker_dier_afp.jpg', '2024-01-12', 0),
(21, 'Urlaubstrends 2024: Der Sommer kann kommen', 'Der Mittelmeerraum wird 2024 erneut zu den beliebtesten Urlaubsregionen der Österreicherinnen und Österreicher zählen, ist Freizeitforscher Peter Zellmann überzeugt. Und der Trend, kurzfristig zu buchen, wird sich weiter verstärken.', 'resized/Screenshot 2024-01-13 022337.png', '2024-01-13', 0),
(22, 'Urlaubstrends 2024: Der Sommer kann kommen', 'Der Mittelmeerraum wird 2024 erneut zu den beliebtesten Urlaubsregionen der Österreicherinnen und Österreicher zählen, ist Freizeitforscher Peter Zellmann überzeugt. Und der Trend, kurzfristig zu buchen, wird sich weiter verstärken.', '', '2024-01-13', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
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
  `erstellt_am` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
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
  `status` varchar(32) NOT NULL DEFAULT 'aktiv',
  `profile_photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `role`, `anrede`, `vorname`, `lastname`, `email`, `username`, `password`, `status`, `profile_photo`) VALUES
(40, 'user', 'Herr', 'user', 'user', 'user@user.user', 'user', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2', 'aktiv', ''),
(41, 'admin', 'Herr', 'admin', 'admin', 'admin@admin.admin', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'aktiv', ''),
(42, 'user', 'Herr', 'Kenn-Michael', 'Sanga', 'kennsanga@yahoo.com', 'if23b128', '720fa1a25ee112bb64259ab07d62e20076a3b55879d998596a5ed35362d1e6ba67e2b504e0e78eea5cd291f280e639c24f6b640853d494494fe05e521cb268b0', 'aktiv', ''),
(43, 'user', 'Frau', 'test', 'test', 'test@test.test', 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'aktiv', ''),
(44, 'user', 'Herr', '', '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'aktiv', ''),
(45, 'admin', 'Frau', 'Ece', 'Sen', 'eecesenn@gmail.com', 'if23b062', 'f6b07b6c1340e947b861def5f8b092d8ee710826dc56bd175bdc8f3a16b0b8acf853c64786a710dedf9d1524d61e32504e27d60de159af110bc3941490731578', 'aktiv', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`,`user_id`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `uid_fk` (`uid_fk`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
