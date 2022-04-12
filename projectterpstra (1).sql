-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2022 om 13:58
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.2

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
(10, 'Test1', 'Hoorn'),
(11, 'Jan', 'Medemblik'),
(12, 'Pietje', 'Amsterdam'),
(13, 'Hans', 'Alkmaar'),
(14, 'Pietje', 'Hoorn');

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
  `workdate` varchar(55) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `urenregistratie`
--

INSERT INTO `urenregistratie` (`id`, `klantid`, `userid`, `aantaluren`, `extra`, `workdate`, `date`, `time`) VALUES
(52, 10, 9, '3', '1', '26-03-2022', '30-03-2022', '11:48'),
(57, 10, 9, '3,5', '', '29-03-2022', '01-04-2022', '11:38'),
(58, 11, 9, '10', '', '01-04-2022', '01-04-2022', '11:48'),
(59, 13, 9, '4,5', '', '28-03-2022', '01-04-2022', '12:41'),
(60, 10, 9, '7,5', 'tijmen i', '11-04-2022', '11-04-2022', '12:48');

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
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `urenregistratie`
--
ALTER TABLE `urenregistratie`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
