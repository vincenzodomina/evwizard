-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Dez 2016 um 17:29
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
('Tesla', 'Smart E battery module', '57.0', '57.00', '2.60', 891, 19000, '', 'www.evwest.de', '2016-02-07', 'from Smart E or Mercedes Benz B-class E'),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
