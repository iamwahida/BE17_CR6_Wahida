-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Dez 2022 um 20:35
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be17_cr6_bigeventswahida`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnumber` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `time`, `description`, `image`, `capacity`, `email`, `pnumber`, `address`, `url`, `type`) VALUES
(1, 'My Fight', '2022-12-05', '20:00:00', 'My fight is a play by George Tabori, staged in the form of a grotesque in 1987, about Adolf Hitler\'s \"Viennese years\" as a resident of a men\'s hostel in the capital of Austria-Hungary before the First World War.', 'https://events.wien.info/media/full/40760.jpg', 250, 'burgtheater@mail.com', 678534353, 'Universitätsring 2, 1010 Vienna', 'https://events.wien.info/en/12hq/mein-kampf/', 'Theater'),
(2, 'Bonez MC & RAF Camora', '2022-12-07', '19:00:00', 'Fans have been waiting and hoping for this for a long time: Plastic Palms is back! After 4 years the successful project of Bonez MC & RAF Camora starts into the third round', 'https://events.wien.info/media/full/151_WienerStadthalle_HalleD_credit-BildagenturZolles_YZ_2373_edit_1.jpg', 500, 'palmen@mail.com', 678835435, 'Halle D Roland-Rainer-Platz 1, 1150 Vienna', 'https://events.wien.info/en/15v9/bonez-mc-raf-camora/', 'Music'),
(4, 'La Cenerentola\r\n', '2022-12-03', '18:00:00', 'The Volksoper Wien presents an evening with two Tchaikovsky masterpieces: the opera Iolanta and the ballet The Nutcracker. Iolanta is a blind princess. A famous doctor can cure her, but only after she is being told about her blindness.', 'https://events.wien.info/media/full/40558_1.jpg', 500, 'opera@mail.com', 6547484, 'Währinger Straße 78, 1090 Vienna', 'https://events.wien.info/en/15d5/la-cenerentola/', 'Opera'),
(5, 'Christmas Market & New Year\'s Market Schloss Schönbrunn 2022', '2022-12-02', '10:00:00', 'From November 19, 2022 to January 4, 2023, the former summer residence of the Habsburgs in Vienna will once again provide a magnificent setting for the traditional Schönbrunn Palace Culture & Christmas Market and New Year\'s Market. ', 'https://events.wien.info/media/full/XM19_Andreas_Tischler_5.jpg', 1050, 'schönbrunner@mail.com', 67843344, 'Schönbrunner Schlossstraße, 1130 Vienna', 'https://events.wien.info/en/13wn/christmas-market-new-years-market-schloss-schonbrunn-2022/', 'Market');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
