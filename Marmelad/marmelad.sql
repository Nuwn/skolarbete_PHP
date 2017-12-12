-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 11:31 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marmelad`
--

-- --------------------------------------------------------

--
-- Table structure for table `antal`
--

CREATE TABLE IF NOT EXISTS `antal` (
  `varu_id` int(11) NOT NULL,
  `antal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `antal`
--

INSERT INTO `antal` (`varu_id`, `antal`) VALUES
(37, 12),
(38, 11),
(39, 0),
(40, 0),
(41, 0),
(42, 0),
(43, 0),
(44, 0),
(45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kund`
--

CREATE TABLE IF NOT EXISTS `kund` (
  `kund_id` int(11) NOT NULL,
  `Fnamn` char(50) COLLATE utf8_bin NOT NULL,
  `Enamn` char(50) COLLATE utf8_bin NOT NULL,
  `addr1` varchar(50) COLLATE utf8_bin NOT NULL,
  `addr2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `postnr` int(5) NOT NULL,
  `ort` varchar(30) COLLATE utf8_bin NOT NULL,
  `Ftele` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `Mtele` varchar(10) COLLATE utf8_bin NOT NULL,
  `Epost` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kund`
--

INSERT INTO `kund` (`kund_id`, `Fnamn`, `Enamn`, `addr1`, `addr2`, `postnr`, `ort`, `Ftele`, `Mtele`, `Epost`) VALUES
(1, 'Patric', 'keisala', 'Sävstaholmsgatan 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'p.keisala@gmail.com'),
(21, 'Patric', 'keisala', 'Sävstaholmsgatan 15', '15', 21224, 'Malmö', '739770711', '34231231', 'p.keisa@gmail.com'),
(23, 'Patric', 'keisala', 'Sävstaholmsgatan 15', '15', 21224, 'Malmö', '739770711', '34231231', 'p.keia@gmail.com'),
(25, 'Patric', 'keisala', 'Sävstaholmsgatan 15', '15', 21224, 'Malmö', '739770711', '34231231', 'p.kea@gmail.com'),
(26, 'Patric', 'keisala', 'Sävstaholmsgatan 15', '15', 21224, 'Malmö', '739770711', '321123123', 'p.asd@gmail.com'),
(27, 'Patric', 'keisala', 'Sävstaholmsgatan 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'p.keisala@gma.com'),
(35, 'admin', 'admin', 'Sävstaholmsgatan 15', '', 21224, 'Malmö', '739770711', '0739770711', 'admin@admin.ad'),
(36, 'admin2', 'admin2', 'Sävstaholmsgatan 15', '', 21224, 'Malmö', '739770711', '0739770711', 'admin2@admin.com'),
(38, 'admin', 'admin', 'Sävstaholmsgatan 15', '', 21224, 'Malmö', '739770711', '0739770711', 'a@admin.com'),
(39, 'admin', 'admin', 'Sävstaholmsgatan 15, 15, 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'ad@admin.com'),
(40, 'test', 'test', 'Sävstaholmsgatan 15', '', 21224, 'Malmö', '739770711', '0739770711', 'test@test.com'),
(41, 'admin', 'admin', 'Sävstaholmsgatan 15, 15, 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'adm@admin.com'),
(42, 'admin', 'admin', 'Sävstaholmsgatan 15, 15, 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'admi@admin.com'),
(44, 'Patric', 'keisala', 'Sävstaholmsgatan 15, 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'p.keisala1@gmail.com'),
(47, 'admin', 'admin', 'Sävstaholmsgatan 15, 15', '15', 21224, 'Malmö', '739770711', '0739770711', 'admin@admin.com'),
(48, 'patric', 'keisala', 'sävstaholmsgatan 15', '', 21224, 'malmö', '739770711', '0739770711', 'finne_n@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kundorder`
--

CREATE TABLE IF NOT EXISTS `kundorder` (
  `order_id` int(11) NOT NULL,
  `varu_id` int(11) NOT NULL,
  `kund_id` int(11) NOT NULL,
  `antal` int(11) NOT NULL,
  `leverans` varchar(50) COLLATE utf8_bin NOT NULL,
  `rabatt` decimal(10,2) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `behandlad` int(1) NOT NULL DEFAULT '0',
  `notering` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempt`
--

CREATE TABLE IF NOT EXISTS `loginattempt` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `loginattempt`
--

INSERT INTO `loginattempt` (`time`, `user_email`) VALUES
('2016-11-08 08:18:00', 'p.keisala@gma.com'),
('2016-11-08 08:18:16', 'p.keisala@gma.com'),
('2016-11-08 08:18:22', 'p.keisala@gma.com'),
('2016-11-08 23:19:25', 'p.keisala@gma.com'),
('2016-11-08 23:19:49', 'p.keisala@gma.com'),
('2016-11-09 00:25:18', 'p.keisala@gma.com'),
('2016-11-09 00:26:00', 'p.keisala@gma.com'),
('2016-11-09 00:26:19', 'p.keisala@gma.com'),
('2016-11-09 00:28:32', 'admin@gma.com'),
('2016-11-09 00:29:24', 'admi@admin.com'),
('2016-11-09 00:29:42', 'admi@admin.com'),
('2016-11-09 00:30:11', 'admi@admin.com'),
('2016-11-09 00:30:56', 'adm@admin.com'),
('2016-11-09 00:31:33', 'adm@admin.com'),
('2016-11-09 00:35:28', 'test@test.com'),
('2016-11-09 00:35:48', 'test@test.com'),
('2016-11-09 00:35:52', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `produkt`
--

CREATE TABLE IF NOT EXISTS `produkt` (
  `varu_id` int(11) NOT NULL,
  `namn` char(30) COLLATE utf8_bin NOT NULL,
  `img` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `info` char(255) COLLATE utf8_bin DEFAULT NULL,
  `typ` char(30) COLLATE utf8_bin NOT NULL,
  `vikt` decimal(10,2) NOT NULL,
  `pris` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`varu_id`, `namn`, `img`, `info`, `typ`, `vikt`, `pris`) VALUES
(37, 'Björnbär', '/img/bjorn2.png', 'Närodlade björnbär, ekologisk lime, mörk rom från Dominikanska republiken och ljus muscovarörsocker. Syrlig i sin karaktär, syrlighet som efterhand ersätts av kolasmak. Lång härlig eftersmak.', 'Standard', '110.00', '30.00'),
(38, 'Björnbär', '/img/bjorn2.png', 'Närodlade björnbär, ekologisk lime, mörk rom från Dominikanska republiken och ljus muscovarörsocker. Syrlig i sin karaktär, syrlighet som efterhand ersätts av kolasmak. Lång härlig eftersmak.', 'Standard', '290.00', '50.00'),
(39, 'Paradis', '/img/paradis-110.png', 'Närodlade paradisäpplen, vanilj, kanel, ekologisk citron, socker och vatten. Smak av vanilj och kanel som balanserar syrligheten från frukten.', 'Premium', '110.00', '40.00'),
(40, 'Paradis', '/img/paradis-290.png', 'Närodlade paradisäpplen, vanilj, kanel, ekologisk citron, socker och vatten. Smak av vanilj och kanel som balanserar syrligheten från frukten.', 'Premium', '290.00', '60.00'),
(41, 'Rabarber', '/img/rabarber.png', 'Närodlade rabarber, ingefära, stjärnanis, ekologisk citron och socker. Syrlig smak med lång eftersmak av salmiak.', 'Superior', '110.00', '80.00'),
(42, 'Rabarber', '/img/rabarber.png', 'Närodlade rabarber, ingefära, stjärnanis, ekologisk citron och socker. Syrlig smak med lång eftersmak av salmiak.', 'Superior', '290.00', '120.00'),
(43, 'Plommon', '/img/plommon.png', 'Endast fruktköttet i plommonen som används, kokas varsamt först en gång, sedan en sista gång lite häftigare, där samtidigt marmeladprovet tas.', 'Standard', '110.00', '30.00'),
(44, 'Plommon', '/img/plommon.png', 'Endast fruktköttet i plommonen som används, kokas varsamt först en gång, sedan en sista gång lite häftigare, där samtidigt marmeladprovet tas.', 'Standard', '290.00', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `Uname` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pword` varchar(512) COLLATE utf8_bin NOT NULL,
  `salt` varchar(255) COLLATE utf8_bin NOT NULL,
  `typ` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Uname`, `Pword`, `salt`, `typ`) VALUES
(11, 'ad@admin.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'hO9RAs0PiYdxnps25JTfrw==', b'0'),
(12, 'test@test.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'mho6FEPNUltKOgq415DuBQ==', b'0'),
(13, 'adm@admin.com', '64e57929d0d828fac869a4b39743b071fa0fe8250a2a5abe6fa30116a3dd90a9', 'ofl/5xEjSK+e75/QaHjoJg==', b'0'),
(14, 'admi@admin.com', '1e3806137d0e5754a24603ddb96760b3d8eaddc8bf46d1d802a1ee170bfc86ac', 'mqks9rBObwRh1lMJKf1oIQ==', b'1'),
(15, 'p.keisala1@gmail.com', 'd9833a7c88906dcdf78dc8e51ce874c6ed78c14160a6d2b843557cf041298486', 'm7r1o8SmKb6gbfMbTAebyg==', b'0'),
(16, 'admin@admin.com', '0748be8b4321a39002e8b166628623ff3ca4725c1ad2fe7cab1f73e4e717d0d6', 'VFGE04cJz8t/3OfjJ66S1A==', b'1'),
(17, 'finne_n@hotmail.com', '63dd3d461d4845a69b8476b0b4b09f3c8ef8eea88793e51ba4ddef7e9d3ed950', '7l8+lz+2b/6uBw5K+zeHYA==', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kund`
--
ALTER TABLE `kund`
  ADD PRIMARY KEY (`kund_id`),
  ADD UNIQUE KEY `Epost` (`Epost`);

--
-- Indexes for table `kundorder`
--
ALTER TABLE `kundorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`varu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kund`
--
ALTER TABLE `kund`
  MODIFY `kund_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `kundorder`
--
ALTER TABLE `kundorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `varu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
