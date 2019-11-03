-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Nov 2019 um 18:17
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
CREATE DATABASE IF NOT EXISTS `evwizard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `evwizard`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ajax_categories`
--

CREATE TABLE `ajax_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `ajax_categories`
--

INSERT INTO `ajax_categories` (`id`, `category`, `pid`) VALUES
(1, 'Tutorials', 0),
(2, 'Demos', 0),
(3, 'Entertainment', 0),
(4, 'Real Estate', 0),
(5, 'Web Development', 0),
(6, 'Browsers', 0),
(7, 'Laptop', 0),
(8, 'PHP', 1),
(9, 'jQuery', 1),
(10, 'AJAX', 1),
(11, 'CodeIgniter', 1),
(12, 'PHP demos', 2),
(13, 'jQuery demos', 2),
(14, 'Film', 3),
(15, 'Music', 3),
(16, 'Commercial', 4),
(17, 'Home', 4),
(18, 'CSS', 5),
(19, 'PHP', 5),
(20, 'FireFox', 6),
(21, 'Internet Explorer', 6),
(22, 'Safari', 6),
(23, 'Opera', 6),
(24, 'IBM', 7),
(25, 'Sony', 7),
(26, 'Dell', 7),
(27, 'HP ', 7),
(28, 'Version 4', 8),
(29, 'Version 5', 8),
(30, 'jQuery Tutorials', 9),
(31, 'jQuery Demos', 9),
(32, 'Codeigniter 1.7', 11),
(33, 'Codeigniter 2.0', 11),
(34, 'Good Demos', 12),
(35, 'Average Demos', 12),
(36, 'Good Demos', 13),
(37, 'Old', 28),
(38, 'New', 29),
(39, 'Good', 30),
(40, 'Bad', 31),
(41, 'Old', 32),
(42, 'New', 33);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `all`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `all` (
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `batterydatabase`
--

CREATE TABLE `batterydatabase` (
  `battmake` varchar(100) NOT NULL,
  `battmodel` varchar(100) NOT NULL,
  `battvolt` decimal(4,1) NOT NULL,
  `battcapa` decimal(6,2) NOT NULL,
  `battdisc` decimal(5,2) NOT NULL,
  `battprice` float NOT NULL,
  `battweight` int(6) NOT NULL,
  `battchem` varchar(100) NOT NULL,
  `battdealer` varchar(100) NOT NULL,
  `battpricedate` date NOT NULL,
  `battcomment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `batterydatabase`
--

INSERT INTO `batterydatabase` (`battmake`, `battmodel`, `battvolt`, `battcapa`, `battdisc`, `battprice`, `battweight`, `battchem`, `battdealer`, `battpricedate`, `battcomment`) VALUES
('Tesla', 'Model S battery module', '22.2', '233.00', '1.00', 1200, 25000, '', 'www.ebay.de', '2016-02-07', 'used battery modules - capacity can vary - example with 16.000 miles usage'),
('Various', '18650 from dead notebooks', '3.7', '2.00', '0.00', 1, 48, '', 'www.ebay.de', '2016-02-07', '"from dead Notebooks. price estimated average when buying ""lot of""-notebook batterys"'),
('Thundersky', 'WB-LP12V40AH ', '12.0', '90.00', '0.00', 147, 15000, '', '', '2016-01-01', ''),
('Chevrolet', 'Volt 2015 battery module', '45.0', '50.00', '4.00', 446, 18144, '', 'www.hybridautocenter.com', '2016-03-26', ''),
('OPTIMA', 'YellowTop S5.5', '12.0', '75.00', '10.00', 183, 26500, 'Lead acid', 'www.basba.de', '2016-03-26', ''),
('Panasonic', 'NCR18650PF', '3.6', '2.90', '3.40', 2, 48, '', 'www.keeppower.com.cn?', '2016-03-22', 'Single 18650 cell. price for 1000 cells'),
('Chevrolet', 'Volt 2013 battery module', '22.5', '45.00', '4.44', 221, 9072, 'LiMn2O4?', 'www.hybridautocenter.com', '2016-03-26', ''),
('Nissan', 'Leaf 2013-2015 battery module', '7.6', '62.00', '4.00', 116, 3700, 'LiMn2O4?', 'www.hybridautocenter.com', '2016-03-26', '2P2S per module. pouch cells'),
('Nissan', 'Leaf 2015 battery module', '7.6', '64.00', '3.75', 125, 3700, 'LiMn2O4?', 'www.hybridautocenter.com', '2016-03-26', ''),
('Tesla', 'Smart E battery module', '57.0', '57.00', '2.60', 891, 19000, '', 'www.evwest.com', '2016-02-07', 'from Smart E or Mercedes Benz B-class E'),
('Sanyo', 'NCR18650GA', '3.6', '3.50', '2.80', 4, 48, '', 'www.keeppower.com.cn?', '2016-03-22', 'Single 18650 cell. price for 1000 cells'),
('Thundersky', 'WB-LYP90AH', '3.2', '90.00', '0.00', 83, 3100, '', '', '2016-01-01', ''),
('LG', 'INR18650MJ1', '3.6', '3.50', '2.80', 4, 48, '', 'www.keeppower.com.cn?', '2016-03-22', 'Single 18650 cell. price for 1000 cells'),
('Sanyo', 'UR18650NSX?', '3.6', '2.60', '7.70', 3, 48, '', 'www.keeppower.com.cn?', '2016-03-22', 'Single 18650 cell. price for 1000 cells'),
('Calb ', '180Ah', '3.2', '180.00', '10.00', 185, 5590, '', 'www.evsource.com', '2016-07-09', ''),
('Sony', 'US18650NC1?', '3.6', '2.90', '2.75', 4, 43, '', 'www.akkuparts24.de', '2016-02-07', ''),
('Sony', 'US18650VTC5', '3.6', '2.60', '11.50', 4, 48, '', 'www.keeppower.com.cn?', '2016-03-22', 'Single 18650 cell. price for 1000 cells'),
('Headway ', 'H-38120S', '3.2', '10.00', '0.00', 14, 330, '', 'www.Headway-headquarters.com', '2016-01-01', ''),
('Calb ', 'SE180Ah', '3.2', '180.00', '0.00', 259, 5600, '', 'www.faktor.de', '2016-01-01', ''),
('Calb ', '72Ah', '3.2', '72.00', '0.00', 105, 1950, '', 'www.rebbl.com', '2016-01-01', ''),
('Headway', 'H-40152S', '3.2', '15.00', '0.00', 23, 480, '', 'www.Headway-headquarters.com', '2016-01-01', ''),
('Panasonic ', 'NCR18650B ', '3.7', '3.40', '0.00', 6, 48, '', 'www.alibaba.com', '2016-01-01', ''),
('Sanyo ', 'UR18650ZTA', '3.7', '3.00', '0.00', 6, 48, '', 'www.alibaba.com', '2016-01-01', ''),
('SAFT ', 'LSH 20 ', '3.6', '13.00', '0.00', 28, 100, '', 'www.accushop.at', '2016-01-01', ''),
('Panasonic ', 'NCR18650E', '3.6', '2.25', '8.88', 6, 45, 'Lion', 'www.akkuteile.de', '2016-03-19', ''),
('Panasonic ', 'UR18650NSX', '3.6', '2.60', '8.00', 7, 46, '', 'www.akkuteile.de', '2016-03-19', ''),
('Saft ', 'LS26500 ', '10.8', '7.70', '0.00', 58, 147, '', 'www.accushop.at', '2016-01-01', ''),
('A123', 'AMP20M1 ', '3.3', '20.00', '15.00', 50, 480, 'LiFePo4', 'http://shop.strato.de/', '2016-02-07', 'Prismatic pouch'),
('A123', 'AHR32113M1 Ultra-B ', '3.3', '4.40', '0.00', 28, 195, '', 'www.modellbaufuchs.de', '2016-01-01', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cardatabase`
--

CREATE TABLE `cardatabase` (
  `automake` varchar(100) DEFAULT NULL,
  `automodel` varchar(100) DEFAULT NULL,
  `autoyear` year(4) DEFAULT NULL,
  `autoweight` int(4) DEFAULT NULL,
  `autocd` decimal(3,2) DEFAULT NULL,
  `autofrontalarea` decimal(3,2) DEFAULT NULL,
  `autocda` decimal(3,2) DEFAULT NULL,
  `autogear1` decimal(3,2) DEFAULT NULL,
  `autogear2` decimal(3,2) DEFAULT NULL,
  `autogear3` decimal(3,2) DEFAULT NULL,
  `autogear4` decimal(3,2) DEFAULT NULL,
  `autogear5` decimal(3,2) DEFAULT NULL,
  `autogear6` decimal(3,2) DEFAULT NULL,
  `autogearfinal` decimal(3,2) DEFAULT NULL,
  `autodrive` varchar(3) DEFAULT NULL,
  `autotirewidth` int(3) DEFAULT NULL,
  `autotireheight` int(2) DEFAULT NULL,
  `autowheelsize` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cardatabase`
--

INSERT INTO `cardatabase` (`automake`, `automodel`, `autoyear`, `autoweight`, `autocd`, `autofrontalarea`, `autocda`, `autogear1`, `autogear2`, `autogear3`, `autogear4`, `autogear5`, `autogear6`, `autogearfinal`, `autodrive`, `autotirewidth`, `autotireheight`, `autowheelsize`) VALUES
('Rover/Austin', 'Mini1275', 1990, 700, '0.49', '1.53', '0.74', '3.33', '2.09', '1.35', '1.00', '0.00', '0.00', '3.44', 'FWD', 145, 70, 12),
('Rover/Austin', 'Mini1000.1100', 1976, 700, '0.49', '1.53', '0.74', '3.52', '2.22', '1.43', '1.00', '0.00', '0.00', '3.44', 'FWD', 165, 70, 10),
('Rover/Austin', 'Mini850 ', 1976, 700, '0.49', '1.53', '0.74', '3.52', '2.22', '1.43', '1.00', '0.00', '0.00', '3.76', 'FWD', 165, 70, 10),
('Rover/Austin', 'Miniautomatic', 1976, 700, '0.49', '1.53', '0.74', '2.69', '1.85', '1.46', '1.00', '0.00', '0.00', '3.27', 'FWD', 165, 70, 10),
('BMW', '316tiCompactE46', 2001, 1375, '0.29', '2.07', '0.60', '4.23', '2.52', '1.66', '1.22', '1.00', '0.00', '3.38', 'RWD', 195, 65, 15),
('BMW', '316tiACompactE46', 2001, 1395, '0.31', '2.07', '0.64', '3.42', '2.22', '1.60', '1.00', '0.75', '0.00', '3.73', 'RWD', 195, 65, 15),
('BMW', '318tiCompactE46', 2001, 1375, '0.31', '2.07', '0.64', '4.23', '2.52', '1.66', '1.22', '1.00', '0.00', '3.38', 'RWD', 205, 55, 16),
('BMW', '318tiACompactE46', 2001, 1395, '0.32', '2.07', '0.66', '3.42', '2.22', '1.60', '1.00', '0.75', '0.00', '3.73', 'RWD', 205, 55, 16),
('BMW', '320iLimousine ', 2005, 1395, '0.28', '2.11', '0.59', '4.32', '2.46', '1.66', '1.23', '1.00', '0.85', '3.38', 'RWD', 205, 55, 16),
('BMW', '320iALimousine ', 2005, 1425, '0.28', '2.11', '0.59', '4.17', '2.34', '1.52', '1.14', '0.87', '0.69', '3.91', 'RWD', 205, 55, 16),
('BMW', '325iLimousine ', 2005, 1490, '0.30', '2.11', '0.63', '4.32', '2.46', '1.66', '1.23', '1.00', '0.85', '3.23', 'RWD', 205, 55, 16),
('BMW', '325iALimousine ', 2005, 1520, '0.30', '2.11', '0.63', '4.17', '2.34', '1.52', '1.14', '0.87', '0.69', '3.73', 'RWD', 205, 55, 16),
('BMW', '325tiCompactE46', 2001, 1480, '0.30', '2.07', '0.62', '4.23', '2.52', '1.66', '1.22', '1.00', '0.00', '3.23', 'RWD', 205, 55, 16),
('BMW', '325tiACompactE46', 2001, 1505, '0.31', '2.07', '0.64', '3.67', '2.00', '1.41', '1.00', '0.74', '0.00', '3.23', 'RWD', 205, 55, 16),
('BMW', '330dLimousine ', 2005, 1490, '0.29', '2.11', '0.61', '5.14', '2.83', '1.80', '1.26', '1.00', '0.83', '2.56', 'RWD', 205, 55, 16),
('BMW', '330dALimousine ', 2005, 1505, '0.29', '2.11', '0.61', '4.17', '2.34', '1.52', '1.14', '0.87', '0.69', '3.15', 'RWD', 205, 55, 16),
('BMW', '330iLimousine ', 2005, 1525, '0.30', '2.11', '0.63', '4.35', '2.50', '1.67', '1.23', '1.00', '0.85', '3.15', 'RWD', 225, 45, 17),
('BMW', '330iALimousine ', 2005, 1540, '0.30', '2.11', '0.63', '4.17', '2.34', '1.52', '1.14', '0.87', '0.69', '3.64', 'RWD', 225, 45, 17),
('Lotus', 'EliseMk2', 2000, 850, '0.42', '1.63', '0.68', '2.92', '1.75', '1.31', '1.03', '0.85', '0.00', '4.20', 'RWD', 225, 45, 17),
('Mazda', 'RX-8(192PS)', 2002, 1390, '0.30', '2.04', '0.61', '3.48', '2.02', '1.48', '1.00', '0.76', '0.00', '4.44', 'RWD', 225, 50, 17),
('Mazda', 'RX-8(231PS)', 2003, 1390, '0.30', '2.04', '0.61', '3.76', '2.27', '1.65', '1.19', '1.00', '0.84', '4.44', 'RWD', 225, 50, 17),
('Mercedes-Benz', 'SLK200', 1996, 1270, '0.33', '1.84', '0.61', '3.93', '2.41', '1.49', '1.00', '0.83', '0.00', '3.91', 'RWD', 225, 50, 16),
('Mercedes-Benz', 'SLK200', 1996, 1270, '0.33', '1.84', '0.61', '3.91', '2.17', '1.37', '1.00', '0.81', '0.00', '3.91', 'RWD', 225, 50, 16),
('Mercedes-Benz', 'SLK200Kompressor', 1996, 1325, '0.33', '1.84', '0.61', '3.86', '2.18', '1.38', '1.00', '0.80', '0.00', '3.46', 'RWD', 225, 50, 16),
('Mercedes-Benz', 'SLK230Kompressor', 1996, 1325, '0.33', '1.84', '0.61', '3.93', '2.41', '1.49', '1.00', '0.83', '0.00', '3.27', 'RWD', 225, 50, 16),
('Mercedes-Benz', 'SLK230Kompressor', 1996, 1325, '0.33', '1.84', '0.61', '3.86', '2.18', '1.38', '1.00', '0.80', '0.00', '3.46', 'RWD', 225, 50, 16),
('Tesla', 'ModelS', 2012, 2170, '0.24', '2.34', '0.56', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9.73', 'RWD', 245, 35, 21),
('Tesla', 'Roadster', 2008, 1220, '0.35', '2.10', '0.74', '2.65', '0.00', '0.00', '0.00', '0.00', '0.00', '3.12', 'RWD', 255, 45, 17),
('average', 'sports coupe', 2000, 1300, '0.30', '2.00', '0.60', '3.00', '2.50', '2.00', '1.50', '1.00', '0.80', '3.00', 'RWD', 225, 45, 18),
('Maxis', 'Kombi', 2000, 1000, '0.30', '1.00', '0.60', '3.00', '2.50', '2.00', '1.50', '1.00', '0.80', '3.00', 'RWD', 225, 45, 18),
('Maxis', 'Kombi', 2000, 1000, '0.30', '1.00', '0.60', '3.00', '2.50', '2.00', '1.50', '1.00', '0.80', '3.00', 'RWD', 225, 45, 18),
('Maxis', 'Kombi', 2000, 1000, '0.30', '1.00', '0.60', '3.00', '2.50', '2.00', '1.50', '1.00', '0.80', '3.00', 'RWD', 225, 45, 18),
('BMW', '318tiACompactE46', 2008, 1395, '0.32', '2.07', '0.66', '3.42', '2.22', '1.60', '1.00', '0.75', '0.00', '3.73', 'RWD', 205, 55, 16);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `motordatabase`
--

CREATE TABLE `motordatabase` (
  `motmake` varchar(100) NOT NULL,
  `motmodel` varchar(100) NOT NULL,
  `motacdc` varchar(2) NOT NULL,
  `motprice` int(6) NOT NULL,
  `motweight` int(4) NOT NULL,
  `motpow` int(4) NOT NULL,
  `mottorq` int(5) NOT NULL,
  `motcontrpm` int(5) NOT NULL,
  `motpeakrpm` int(5) NOT NULL,
  `motvolt` int(3) NOT NULL,
  `moteff` int(2) NOT NULL,
  `motdealer` varchar(100) NOT NULL,
  `motpricedate` date NOT NULL,
  `motarray` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `motordatabase`
--

INSERT INTO `motordatabase` (`motmake`, `motmodel`, `motacdc`, `motprice`, `motweight`, `motpow`, `mottorq`, `motcontrpm`, `motpeakrpm`, `motvolt`, `moteff`, `motdealer`, `motpricedate`, `motarray`) VALUES
('Remy', 'REM-HVH-250-090SO-G1.6H', 'AC', 4320, 49, 76, 325, 2000, 10000, 320, 94, 'www.neweagle.net', '2016-02-16', '325,325,325,325,325,280,225,185,145,120,102,92,83,76,69,62,55,50,47,43,40 '),
('Remy', 'REM-HVH-250-115DO-G1.6H', 'AC', 4595, 57, 140, 420, 3000, 10000, 320, 96, 'www.neweagle.net', '2016-02-17', '420,420,420,420,420,420,420,380,333,285,250,223,198,178,158,145,135,125,118,110,100'),
('UQM', 'Powerphase 100 (CODA)', 'AC', 5850, 50, 100, 300, 3000, 7700, 300, 94, 'www.store.evtv.me', '2016-02-16', '300,300,300,300,300,300,300,275,237,210,187,171,158,145,133,126 '),
('UQM', 'Powerphase 135', 'AC', 13680, 50, 135, 340, 3000, 8000, 335, 94, 'www.neweagle.net', '2016-02-17', '340,340,340,340,340,340,340,335,305,276,255,235,215,200,185,174,150 '),
('Siemens ', '1PV5135-4WS14 (Azure version)', 'AC', 2250, 91, 97, 297, 3000, 9700, 215, 95, 'www.evwest.com', '2016-02-17', '297,297,297,297,297,297,297,255,231,216,200,182,168,151,137,120,105,95,85,75,65 '),
('Enstroj', 'Emrax 207', 'AC', 3290, 9, 80, 160, 3000, 6000, 300, 98, 'www.enstroj.si', '2016-02-16', '140,140,140,140,140,140,140,138,135,132,128,122,115 '),
('Enstroj', 'Emrax 228', 'AC', 3390, 12, 100, 240, 2500, 5500, 400, 98, 'www.enstroj.si', '2016-02-17', '240,240,240,240,240,240,236,232,227,223,216 '),
('Enstroj', 'Emrax 268', 'AC', 5590, 20, 200, 500, 1500, 4000, 400, 98, 'www.enstroj.si', '2016-02-18', '500,500,500,500,380,300,230,200,170 '),
('HPEVS', 'AC-50 at 96V', 'AC', 3465, 52, 53, 120, 3500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '163,160,160,159,159,157,157,156,122,95,75,61,52,43,34,29,27 '),
('HPEVS', 'AC-51 at 144V', 'AC', 4129, 52, 88, 108, 4500, 8000, 144, 0, 'www.evwest.com', '2016-02-25', '146,142,137,136,136,136,136,136,136,136,122,108,92,71,57,47,43 '),
('HPEVS', 'AC-75 at 96V', 'AC', 4131, 81, 59, 248, 2500, 6500, 96, 0, 'www.evwest.com', '2016-02-25', '248,233,231,228,228,228,176,136,107,81,65,53,41,27 '),
('HPEVS', 'AC-76 at 144V', 'AC', 4815, 91, 67, 228, 3000, 6000, 144, 0, 'www.evwest.com', '2016-02-25', '228,217,214,212,212,209,209,179,149,130,108,80,53 '),
('HPEVS', 'AC-12 at 72V', 'AC', 2664, 23, 22, 61, 3500, 8000, 72, 0, 'www.evwest.com', '2016-02-25', '61,58,57,56,56,56,57,58,49,39,31,25,20,16,14,12,11 '),
('HPEVS', 'AC-9 at 48V', 'AC', 2214, 23, 21, 95, 2000, 7500, 48, 0, 'www.evwest.com', '2016-02-25', '95,92,92,92,92,77,58,45,34,27,21,17,14,11,8,7 '),
('HPEVS', 'AC-20 at 48V', 'AC', 2457, 27, 26, 111, 2500, 8000, 48, 0, 'www.evwest.com', '2016-02-25', '111,108,106,103,102,100,81,61,41,31,23,18,13,10,8,7,5 '),
('HPEVS', 'AC-20 at 72V', 'AC', 2700, 27, 36, 94, 4000, 8000, 72, 0, 'www.evwest.com', '2016-02-25', '94,92,88,85,84,83,83,81,81,75,65,54,45,35,28,22,18 '),
('HPEVS', 'AC-34 at 72V', 'AC', 3132, 39, 37, 119, 3000, 8000, 72, 0, 'www.evwest.com', '2016-02-25', '119,115,114,114,114,113,111,98,80,61,49,39,31,25,20,16,14 '),
('HPEVS', 'AC-15 at 96V', 'AC', 2808, 23, 45, 95, 4500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '95,94,94,94,94,94,94,94,94,92,84,72,60,51,43,38,33 '),
('HPEVS', 'AC-20 at 96V', 'AC', 3038, 27, 49, 111, 4500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '111,108,106,105,104,103,102,100,99,98,92,76,65,53,44,35,28 '),
('HPEVS', 'AC-23 at 96V', 'AC', 2858, 27, 42, 172, 2500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '172,170,167,163,159,155,131,115,94,72,56,42,34,27,24,20,16 '),
('HPEVS', 'AC-34 at 96V', 'AC', 3263, 52, 49, 144, 3500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '144,138,136,136,136,136,136,136,108,88,71,57,47,38,31,27,23 '),
('HPEVS', 'AC-34 at 96V dual', 'AC', 7875, 68, 97, 289, 3500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '289,278,271,271,271,271,271,266,217,175,142,109,88,75,65,52,45 '),
('HPEVS', 'AC-35 at 144V', 'AC', 4004, 52, 62, 127, 5000, 8000, 144, 0, 'www.evwest.com', '2016-02-25', '127,122,122,122,122,122,122,122,122,122,122,98,84,72,62,53,43 '),
('HPEVS', 'AC-35 at 144V dual', 'AC', 7875, 68, 124, 255, 5000, 8000, 144, 0, 'www.evwest.com', '2016-02-25', '255,248,244,244,244,244,244,244,244,244,244,203,172,148,126,108,88 '),
('HPEVS', 'AC-34 at 96V oilcooled', 'AC', 3893, 43, 49, 144, 3500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '144,137,136,136,136,136,136,136,108,88,71,57,47,38,31,27,23 '),
('HPEVS', 'AC-50 at 96V oilcooled', 'AC', 4095, 54, 53, 120, 3500, 8000, 96, 0, 'www.evwest.com', '2016-02-25', '163,160,160,159,159,157,157,156,122,95,75,61,52,43,34,29,27 '),
('HPEVS', 'AC-35 at 144V oilcooled dual', 'AC', 8595, 89, 124, 255, 5000, 8000, 144, 0, 'www.evwest.com', '2016-02-25', '255,248,244,244,244,244,244,244,244,244,244,203,172,148,126,108,88 '),
('HPEVS', 'AC-35 at 144V oilcooled ', 'AC', 4634, 43, 62, 127, 5000, 8000, 144, 0, 'www.evwest.com', '2016-02-25', '127,122,122,122,122,122,122,122,122,122,122,98,84,72,62,53,43 '),
('FLECK', 'N60 45kW 144V', 'AC', 3800, 80, 53, 180, 2500, 6000, 144, 0, 'www.fleck-elektroauto.de', '2016-02-28', '180,180,180,180,180,180,170,140,110,90,75,62,53 '),
('FLECK', 'AKOE 132.12.2.100003 Doppelmotor S2', 'AC', 4300, 120, 115, 232, 4500, 6500, 96, 0, 'www.fleck-elektroauto.de', '2016-03-02', '232,232,232,232,232,232,232,232,232,232,218,200,185,168 '),
('FLECK', 'AKOE 132.12.2.100001 Doppelmotor S2', 'AC', 4300, 120, 115, 250, 5000, 7500, 144, 0, 'www.fleck-elektroauto.de', '2016-03-02', '250,250,250,250,250,250,250,250,250,248,245,228,210,194,178,164 '),
('FLECK', 'AKOE 160 Doppelmotor S2 144V', 'AC', 5200, 160, 125, 420, 2750, 6000, 144, 0, 'www.fleck-elektroauto.de', '2016-03-02', '420,420,420,420,420,420,405,360,310,271,231,195,162 '),
('FLECK', 'AKOE 160 Doppelmotor S2 96V V1', 'AC', 5200, 160, 118, 355, 3000, 6000, 96, 0, 'www.fleck-elektroauto.de', '2016-03-02', '355,355,355,355,355,355,355,310,275,242,215,190,165 '),
('FLECK', 'AKOE 160 Doppelmotor S2 96V V2', 'AC', 5200, 160, 118, 375, 2500, 6000, 96, 0, 'www.fleck-elektroauto.de', '2016-03-02', '375,375,375,375,375,375,360,312,275,240,212,184,157 '),
('FLECK', 'AKOE 132.1.2.100043 20kW', 'AC', 2200, 55, 36, 110, 3000, 5750, 96, 0, 'www.fleck-elektroauto.de', '2016-03-02', '110,110,110,110,110,110,106,97,84,74,64,54 '),
('FLECK', 'AKOE 132.2.2.100024 28kW', 'AC', 2500, 65, 48, 168, 2500, 6000, 75, 0, 'www.fleck-elektroauto.de', '2016-03-02', '168,168,168,168,168,168,150,130,111,95,80,65,55 '),
('FLECK', 'AKOE 160.3.2.100001 44kW', 'AC', 3000, 80, 82, 260, 2700, 6000, 120, 0, 'www.fleck-elektroauto.de', '2016-03-02', '260,260,260,260,260,260,246,216,185,150,126,105,90 '),
('FLECK', 'AKOE 160.1.2.100004 40kW', 'AC', 2800, 70, 60, 210, 2700, 6000, 65, 0, 'www.fleck-elektroauto.de', '2016-03-02', '210,210,210,210,210,210,190,162,139,119,100,82,68 '),
('MES DEA', 'MES DRIVE 200-200 24-48KW/289VDC', 'AC', 5880, 53, 48, 155, 2950, 9000, 289, 90, 'www.e-transportation.eu', '2016-03-19', '155,155,155,137,122,106,91,80,70,63,57,51,46,42,39,36,33,31,29 '),
('Siemens ', '1PV5135-4WS14', 'AC', 3990, 91, 63, 190, 4000, 10000, 300, 88, 'www.e-transportation.eu', '2016-03-19', '190,190,190,190,190,189,185,182,180,175,168,152,138,125,115,106,98,90,83,78,75 '),
('YASA', '750', 'AC', 11520, 33, 200, 790, 1400, 2400, 400, 0, 'www.yasamotors.com', '2016-03-19', '720,720,720,720,530 '),
('Lexus ', 'GS450h/LS600h transmission MG2', 'AC', 2000, 45, 110, 300, 5000, 10000, 430, 95, 'www.ebay.com', '2016-03-19', '858,858,858,630,432,415,325,250,195,152,128,122 ');

-- --------------------------------------------------------

--
-- Struktur des Views `all`
--
DROP TABLE IF EXISTS `all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`evwizard`@`%` SQL SECURITY DEFINER VIEW `all`  AS  select `cardatabase`.`make` AS `make`,`cardatabase`.`model` AS `model`,`cardatabase`.`yearcar` AS `yearcar`,`cardatabase`.`weight` AS `weight`,`cardatabase`.`cd` AS `cd`,`cardatabase`.`cdarea` AS `cdarea`,`cardatabase`.`cda` AS `cda`,`cardatabase`.`gear1` AS `gear1`,`cardatabase`.`gear2` AS `gear2`,`cardatabase`.`gear3` AS `gear3`,`cardatabase`.`gear4` AS `gear4`,`cardatabase`.`gear5` AS `gear5`,`cardatabase`.`gear6` AS `gear6`,`cardatabase`.`gearfinal` AS `gearfinal`,`cardatabase`.`tirewidth` AS `tirewidth`,`cardatabase`.`tireheight` AS `tireheight`,`cardatabase`.`wheeldia` AS `wheeldia`,`cardatabase`.`transtype` AS `transtype` from `cardatabase` ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ajax_categories`
--
ALTER TABLE `ajax_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ajax_categories`
--
ALTER TABLE `ajax_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
