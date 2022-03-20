-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 mrt 2022 om 23:29
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectterpstra`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` int(111) NOT NULL,
  `klant` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id`, `klant`, `woonplaats`) VALUES
(1, 'test1', 'Opperdoes'),
(2, 'test2', 'Medemblik'),
(3, 'test3', 'Hoorn'),
(6, 'Pietje Pet', 'Amsterdam'),
(7, 'Jantje', 'Abbekerk'),
(8, 'Sara', 'Hoorn'),
(9, 'Jan', 'Middenmeer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `urenregistratie`
--

CREATE TABLE `urenregistratie` (
  `id` int(111) NOT NULL,
  `klantid` int(111) NOT NULL,
  `userid` int(111) NOT NULL,
  `aantaluren` varchar(45) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `urenregistratie`
--

INSERT INTO `urenregistratie` (`id`, `klantid`, `userid`, `aantaluren`, `extra`, `date`, `time`) VALUES
(34, 3, 9, '1,5', '2', '19-03-2022', '16:00'),
(35, 6, 9, '4,5', '3 zakken potgrond', '19-03-2022', '17:52'),
(36, 1, 9, '0,5', '', '19-03-2022', '17:56');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(111) NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(7, 'admin', '$2y$10$gN2MhyHIWF40Vb2srXlLHOW1VeYx0fFPMTGsLUfZGuNesGSFCvM5G', 1),
(8, 'tijmen', '$2y$10$nOzwvUTW0/ENi12eiUGuuOwQxYhCqDTv/MAYHcnxh/iK16XYX0i7y', 0),
(9, 'piet', '$2y$10$jUaXKmgnAQ6yFrp3DpHuvu0hP7U2lLNfJ1kfZgwpqsgWq/RJ/IalS', 0),
(36, 'test', '$2y$10$Dv7mJTSGVP2WUff4WVnrB.f5P6dwm.NR9oVEdQExBDxqXNYN9tB1O', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexen voor tabel `urenregistratie`
--
ALTER TABLE `urenregistratie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `urenregistratie`
--
ALTER TABLE `urenregistratie`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
