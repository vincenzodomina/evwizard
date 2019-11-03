-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Nov 2016 um 21:35
-- Server-Version: 5.7.14
-- PHP-Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `evwizard`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cardatabase`
--

CREATE TABLE `cardatabase` (
  `automake` varchar(100) DEFAULT NULL,
  `automodel` varchar(100) DEFAULT NULL,
  `autoyear` year(4) DEFAULT NULL,
  `autoweight` int(4) DEFAULT NULL,
  `autocd`          decimal(3,2) DEFAULT NULL,
  `autofrontalarea` decimal(3,2) DEFAULT NULL,
  `autocda`         decimal(3,2) DEFAULT NULL,
  `autogear1`       decimal(3,2) DEFAULT NULL,
  `autogear2`       decimal(3,2) DEFAULT NULL,
  `autogear3`       decimal(3,2) DEFAULT NULL,
  `autogear4`       decimal(3,2) DEFAULT NULL,
  `autogear5`       decimal(3,2) DEFAULT NULL,
  `autogear6`       decimal(3,2) DEFAULT NULL,
  `autogearfinal`   decimal(3,2) DEFAULT NULL,
  `autodrive`  varchar(3) DEFAULT NULL,
  `autotirewidth` int(3) DEFAULT NULL,
  `autotireheight` int(2) DEFAULT NULL,
  `autowheelsize` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cardatabase`
--

INSERT INTO `cardatabase` (`automake`, `automodel`, `autoyear`, `autoweight`, `autocd`, `autofrontalarea`, `autocda`, `autogear1`, `autogear2`, `autogear3`, `autogear4`, `autogear5`, `autogear6`, `autogearfinal`, `autodrive`, `autotirewidth`, `autotireheight`, `autowheelsize`) VALUES
('BMW', '320iA Limousine  ', 2005, 1425, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                205, 55, 16),
('BMW', '325iA Limousine  ', 2005, 1520, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                205, 55, 16),
('BMW', '330dA Limousine  ', 2005, 1505, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                205, 55, 16),
('BMW', '330iA Limousine  ', 2005, 1540, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                225, 45, 17),
('BMW', '320i Limousine  ', 2005, 1395, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                 205, 55, 16),
('BMW', '325i Limousine  ', 2005, 1490, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                 205, 55, 16),
('BMW', '330d Limousine  ', 2005, 1490, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                 205, 55, 16),
('BMW', '330i Limousine  ', 2005, 1525, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                 225, 45, 17),
('Mazda', 'RX-8 (231PS)', 2003, 1390, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                   225, 50, 17),
('Tesla ', 'Roadster', 2008, 1220, '0', '1', '1', '1', '0', '0', '0', '0', '0', '1',                      255, 45, 17),
('Rover/Austin', 'Mini automatic', 1976, 700, '0', '1', '1', '1', '1', '1', '1', '0', '0', '1',           165, 70, 10),
('BMW', '316tiA Compact E46', 2001, 1395, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1',               195, 65, 15),
('BMW', '318tiA Compact E46', 2001, 1395, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1',               205, 55, 16),
('Mercedes-Benz', 'SLK 200', 1996, 1270, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1',                225, 50, 16),
('Mercedes-Benz', 'SLK 230 Kompressor', 1996, 1325, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1',     225, 50, 16),
('BMW', '320iA Limousine  ', 2005, 1425, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                205, 55, 16),
('BMW', '325iA Limousine  ', 2005, 1520, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                205, 55, 16),
('BMW', '330dA Limousine  ', 2005, 1505, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                205, 55, 16),
('BMW', '330iA Limousine  ', 2005, 1540, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1',                225, 45, 17),
('Rover/Austin', 'Mini 1000.1100', 1976, 700, '0', '1', '1', '1', '1', '1', '1', '0', '0', '1',           165, 70, 10),
('Rover/Austin', 'Mini 1275', 1990, 700, '0', '1', '1', '1', '1', '1', '1', '0', '0', '1',                145, 70, 12),
('Rover/Austin', 'Mini 850  ', 1976, 700, '0', '1', '1', '1', '1', '1', '1', '0', '0', '1',               165, 70, 10),
('BMW', '316ti Compact E46', 2001, 1375, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1',                195, 65, 15),
('BMW', '318i', 0000, 0, '0', '0', '0', '1', '1', '1', '1', '1', '0', '1', 0, 0, 0),
('BMW', '318ti Compact E46', 2001, 1375, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 205, 55, 16),
('BMW', '325ti Compact E46', 2001, 1480, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 205, 55, 16),
('BMW', '325tiA Compact E46', 2001, 1505, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 205, 55, 16),
('Lotus ', 'Elise Mk2', 2000, 850, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 225, 45, 17),
('Mazda', 'RX-8 (192PS)', 2002, 1390, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 225, 50, 17),
('Mercedes-Benz', 'SLK 200 ', 1996, 1270, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 225, 50, 16),
('Mercedes-Benz', 'SLK 200 Kompressor', 1996, 1325, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 225, 50, 16),
('Mercedes-Benz', 'SLK 230 Kompressor', 1996, 1325, '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', 225, 50, 16),
('Mitsubishi ', 'Eclipse', 0000, 0, '0', '0', '0', '1', '1', '1', '1', '1', '0', '1', 0, 0, 0),
('BMW', '320i Limousine  ', 2005, 1395, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', 205, 55, 16),
('BMW', '325i Limousine  ', 2005, 1490, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', 205, 55, 16),
('BMW', '330d Limousine  ', 2005, 1490, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', 205, 55, 16),
('BMW', '330i Limousine  ', 2005, 1525, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', 225, 45, 17),
('Mazda', 'RX-8 (231PS)', 2003, 1390, '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', 225, 50, 17);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
