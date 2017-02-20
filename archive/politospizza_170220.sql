-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 20 feb 2017 om 19:24
-- Serverversie: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP-versie: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `politospizza`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `famName` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  `placeId` int(11) NOT NULL,
  `phoneNr` varchar(25) NOT NULL,
  `mobileNr` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `loginId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`id`, `firstName`, `famName`, `adres`, `placeId`, `phoneNr`, `mobileNr`, `email`, `loginId`) VALUES
(1, 'Dries', 'Hooghe', 'Harelbekestraat 37', 3, '', '0495332822', 'dries.hooghe@outlook.com', 1),
(2, 'Marijke', 'Van de Velde', 'Cichoreistraat 2', 3, '056700562', '0495224685', 'hotmarijke@hotmail.com', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deliveryprices`
--

CREATE TABLE `deliveryprices` (
  `deliveryNr` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `deliveryprices`
--

INSERT INTO `deliveryprices` (`deliveryNr`, `price`) VALUES
(1, '0.00'),
(2, '2.40'),
(3, '4.20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `catId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `catId`, `price`) VALUES
(1, 'Pepsi (2l)', 5, '3.80');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `nameId` int(11) NOT NULL,
  `sizeId` int(11) DEFAULT NULL,
  `catId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `food`
--

INSERT INTO `food` (`id`, `name`, `nameId`, `sizeId`, `catId`, `price`) VALUES
(1, 'Lookbrood', 0, 1, 3, '2.70'),
(2, 'Lookbrood kaas', 0, 1, 3, '3.20'),
(3, 'Lookbrood kaas salami', 0, 1, 3, '4.00'),
(4, 'Lookbrood kaas ham', 0, 1, 3, '4.00'),
(5, 'Cheesy bread', 0, 1, 3, '4.00'),
(6, 'Chicken wings', 0, 1, 3, '4.60'),
(7, 'Spicy chicken wings', 0, 1, 3, '4.60'),
(8, 'American potatoes', 0, 1, 3, '4.00'),
(9, 'Gegrilde feta', 0, 1, 3, '5.00'),
(10, 'Summer BBQ', 0, 2, 1, '10.00'),
(11, 'Chicken delight', 0, 2, 1, '10.00'),
(12, 'Fizza tonno', 0, 2, 1, '10.00'),
(13, 'Margherita', 0, 2, 1, '9.00'),
(14, 'Quattro stagioni', 0, 2, 1, '11.00'),
(15, 'Summer BBQ', 0, 3, 1, '12.00'),
(16, 'Chicken delight', 0, 3, 1, '12.00'),
(17, 'Fizza tonno', 0, 3, 1, '12.00'),
(18, 'Margherita', 0, 3, 1, '11.00'),
(19, 'Quattro stagioni', 0, 3, 1, '13.00'),
(20, 'Summer BBQ', 0, 4, 1, '14.00'),
(21, 'Chicken delight', 0, 4, 1, '14.00'),
(22, 'Fizza tonno', 0, 4, 1, '14.00'),
(23, 'Margherita', 0, 4, 1, '13.00'),
(24, 'Quattro stagioni', 0, 4, 1, '15.00'),
(25, 'Tagliatelli Carbonara', 0, 1, 2, '9.99');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `foodcat`
--

CREATE TABLE `foodcat` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `foodcat`
--

INSERT INTO `foodcat` (`id`, `category`) VALUES
(1, 'pizza'),
(2, 'pasta'),
(3, 'pre'),
(4, 'dessert'),
(5, 'drinks');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `foodnames`
--

CREATE TABLE `foodnames` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logindata`
--

CREATE TABLE `logindata` (
  `id` int(11) NOT NULL,
  `pwd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `logindata`
--

INSERT INTO `logindata` (`id`, `pwd`) VALUES
(1, 'hooghe777'),
(2, 'hotmarijke');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opening`
--

CREATE TABLE `opening` (
  `id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL,
  `starthour` time NOT NULL,
  `endhour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `opening`
--

INSERT INTO `opening` (`id`, `day`, `starthour`, `endhour`) VALUES
(2, 'tue', '17:00:00', '23:00:00'),
(3, 'wed', '17:00:00', '23:00:00'),
(4, 'thu', '17:00:00', '23:00:00'),
(5, 'fri', '17:00:00', '23:30:00'),
(6, 'sat', '11:00:00', '23:30:00'),
(7, 'sun', '11:00:00', '23:30:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderlines`
--

CREATE TABLE `orderlines` (
  `orderLineId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `costumerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `places`
--

CREATE TABLE `places` (
  `placeId` int(11) NOT NULL,
  `postCode` varchar(5) NOT NULL,
  `town` varchar(25) NOT NULL,
  `deliveryNr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `places`
--

INSERT INTO `places` (`placeId`, `postCode`, `town`, `deliveryNr`) VALUES
(1, '8540', 'Deerlijk', 1),
(2, '8530', 'Harelbeke', 1),
(3, '8790', 'Waregem', 2),
(4, '8791', 'Beveren-Leie', 2),
(5, '8792', 'Desselgem', 2),
(6, '8793', 'Sint-Eloois-Vijve', 2),
(7, '8531', 'Bavikhove', 2),
(8, '8531', 'Hulste', 2),
(11, '8570', 'Vichte', 1),
(12, '8553', 'Otegem', 2),
(13, '8551', 'Heestert', 3),
(14, '8550', 'Zwevegem', 2),
(15, '8520', 'Kuurne', 2),
(16, '8500', 'Kortrijk', 3),
(17, '8710', 'Wielsbeke', 3),
(18, '8710', 'Ooigem', 3),
(19, '8710', 'Sint-Baafs-Vijve', 3),
(20, '8570', 'Ingooigem', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'N'),
(2, 'Small'),
(3, 'Medium'),
(4, 'Large');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `deliveryprices`
--
ALTER TABLE `deliveryprices`
  ADD PRIMARY KEY (`deliveryNr`);

--
-- Indexen voor tabel `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `foodcat`
--
ALTER TABLE `foodcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `foodnames`
--
ALTER TABLE `foodnames`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexen voor tabel `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orderlines`
--
ALTER TABLE `orderlines`
  ADD PRIMARY KEY (`orderLineId`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`placeId`);

--
-- Indexen voor tabel `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `deliveryprices`
--
ALTER TABLE `deliveryprices`
  MODIFY `deliveryNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT voor een tabel `foodcat`
--
ALTER TABLE `foodcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `foodnames`
--
ALTER TABLE `foodnames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `logindata`
--
ALTER TABLE `logindata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `opening`
--
ALTER TABLE `opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `orderlines`
--
ALTER TABLE `orderlines`
  MODIFY `orderLineId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `places`
--
ALTER TABLE `places`
  MODIFY `placeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
