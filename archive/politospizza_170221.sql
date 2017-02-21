-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 feb 2017 om 14:48
-- Serverversie: 10.1.19-MariaDB
-- PHP-versie: 5.6.28

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
-- Tabelstructuur voor tabel `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `nameId` int(11) NOT NULL,
  `sizeId` int(11) DEFAULT NULL,
  `catId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `food`
--

INSERT INTO `food` (`id`, `nameId`, `sizeId`, `catId`, `price`) VALUES
(1, 1, 1, 1, '2.50'),
(2, 2, 1, 1, '3.00'),
(3, 3, 1, 1, '3.50'),
(4, 4, 1, 1, '2.50'),
(5, 1, 1, 1, '3.95'),
(6, 6, 1, 1, '4.95'),
(7, 7, 1, 1, '3.95'),
(8, 8, 1, 1, '4.50'),
(9, 9, 1, 1, '4.50'),
(10, 10, 1, 1, '4.50'),
(11, 11, 1, 1, '4.50'),
(12, 12, 1, 1, '4.65'),
(13, 13, 1, 1, '5.25'),
(14, 14, 1, 1, '4.99'),
(15, 15, 1, 1, '1.95'),
(16, 16, 2, 2, '10.50'),
(17, 16, 3, 2, '12.50'),
(18, 16, 4, 2, '14.00'),
(19, 17, 2, 2, '10.50'),
(20, 17, 3, 2, '12.50'),
(21, 17, 4, 2, '14.00'),
(22, 18, 2, 2, '10.50'),
(23, 18, 3, 2, '12.50'),
(24, 18, 4, 2, '14.00'),
(25, 19, 2, 2, '10.50'),
(26, 19, 3, 2, '12.50'),
(27, 19, 4, 2, '14.00'),
(28, 20, 2, 2, '10.50'),
(29, 20, 3, 2, '12.50'),
(30, 20, 4, 2, '14.00'),
(31, 21, 2, 2, '10.50'),
(32, 21, 3, 2, '12.50'),
(33, 21, 4, 2, '14.00'),
(34, 22, 2, 2, '10.50'),
(35, 22, 3, 2, '12.50'),
(36, 22, 4, 2, '14.00'),
(37, 23, 2, 2, '10.50'),
(38, 23, 3, 2, '12.50'),
(39, 23, 4, 2, '14.00'),
(40, 24, 2, 2, '11.50'),
(41, 24, 3, 2, '13.50'),
(42, 24, 4, 2, '15.20'),
(43, 25, 2, 2, '11.50'),
(44, 25, 3, 2, '13.50'),
(45, 25, 4, 2, '15.20'),
(46, 26, 2, 2, '11.50'),
(47, 26, 3, 2, '13.50'),
(48, 26, 4, 2, '15.20'),
(49, 27, 2, 2, '11.50'),
(50, 27, 3, 2, '13.50'),
(51, 27, 4, 2, '15.20'),
(52, 28, 2, 2, '11.50'),
(53, 28, 3, 2, '13.50'),
(54, 28, 4, 2, '15.20'),
(55, 29, 2, 2, '11.50'),
(56, 29, 3, 2, '13.50'),
(57, 29, 4, 2, '15.20'),
(58, 30, 2, 2, '11.50'),
(59, 30, 3, 2, '13.50'),
(60, 30, 4, 2, '15.20'),
(61, 31, 2, 2, '11.50'),
(62, 31, 3, 2, '13.50'),
(63, 31, 4, 2, '15.20'),
(64, 32, 2, 2, '12.70'),
(65, 32, 3, 2, '14.50'),
(66, 32, 4, 2, '15.99'),
(67, 33, 2, 2, '12.70'),
(68, 33, 3, 2, '14.50'),
(69, 33, 4, 2, '15.99'),
(70, 34, 2, 2, '12.70'),
(71, 34, 3, 2, '14.50'),
(72, 34, 4, 2, '15.99'),
(73, 35, 2, 2, '12.70'),
(74, 35, 3, 2, '14.50'),
(75, 35, 4, 2, '15.99'),
(76, 43, 1, 3, '9.95'),
(77, 44, 1, 3, '9.95'),
(78, 45, 1, 3, '10.95'),
(79, 46, 1, 3, '9.95'),
(80, 47, 1, 3, '9.95'),
(81, 48, 1, 3, '10.45'),
(82, 49, 1, 3, '9.95'),
(83, 50, 1, 3, '10.45'),
(84, 51, 1, 3, '11.95'),
(85, 52, 1, 3, '13.00'),
(86, 53, 1, 4, '2.45'),
(87, 54, 1, 4, '2.25'),
(88, 55, 1, 4, '3.50'),
(89, 56, 1, 4, '3.95'),
(90, 57, 1, 5, '2.95'),
(91, 58, 1, 5, '2.95'),
(92, 59, 1, 5, '2.95'),
(93, 60, 1, 5, '2.45'),
(94, 61, 1, 5, '2.45');

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
(1, 'entree'),
(2, 'pizza'),
(3, 'pasta'),
(4, 'dessert'),
(5, 'drinks');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `foodnames`
--

CREATE TABLE `foodnames` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `foodnames`
--

INSERT INTO `foodnames` (`id`, `name`, `description`) VALUES
(1, 'Lookbrood', '4 stuks'),
(2, 'Lookbrood Kaas', '4 stuks'),
(3, 'Lookbrood Kaas & Ham', '4 stuks'),
(4, 'Lookbrood Pesto', '4 stuks'),
(5, 'Cheezy Bread', 'Kaasbrood'),
(6, 'Chicken Taquito''s', '3 stuks - saus inbegrepen'),
(7, 'American Potatoes', '350 gr.- saus inbegrepen'),
(8, 'Kick''n Chicken', '8 stuks'),
(9, 'Chickenito''s', '8 stuks'),
(10, 'Chicken Wings', '8 stuks'),
(11, 'Chicken Nuggets', '8 stuks'),
(12, 'Buffalo Bites', '8 stuks'),
(13, 'Bruschetta', ' 4 stuks'),
(14, 'Onion Rings', '8 stuks'),
(15, 'Augurken', '16 stuks'),
(16, 'American', 'tomatensaus, dubbele pepperoni, mozzarella'),
(17, 'BBQ Chicken', 'bbq saus, kaas, kip, paprika, ui'),
(18, 'Beefanatika', 'tomatensaus, kaas, merguez, meatballs, ui, tomaten, oregano'),
(19, 'BBQ Grill', 'bbq saus, kaas, spek, ,meatballs, ui'),
(20, 'BBQ Meatballs', 'bbq saus, kaas, meatballs, paprika, ui'),
(21, 'Bolognese', 'bolognesesaus, kaas, look'),
(22, 'Calzone', 'bolognesesaus, kaas, paprika, ham, salami, champignons'),
(23, 'Cannibal', 'bbq saus, kaas, kip, merguez, meatballs'),
(24, 'Creamy Cheese', 'roomsaus, kaas, gorgonzola, geitenkaas, emmenthaler'),
(25, 'Curry Oriental', 'tomatensaus, kaas, kip, tomaten, ananas, currysaus'),
(26, 'Extravagant', 'tomatensaus, kaas, ham, meatballs, salami, ui, champ., paprika, olijven'),
(27, 'Funky Chicken', 'tomatensaus, kaas, kip, paprika, ui, ananas'),
(28, 'Hawaï', 'tomatensaus, kaas, kip, ham, ananas'),
(29, '4 Kazen', 'tomatensaus, kaas, gorgonzola, geitenkaas, emmenthaler'),
(30, 'Margherita', 'tomatensaus, kaas, mozzarella, oregano'),
(31, 'Mexicano', 'tomatensaus, kaas, kip, mais, ui, paprika, look, jalapenos'),
(32, 'Fizza Tonno', 'tomatensaus, kaas, tonijn, ansjovis, ui, champignons, oregano'),
(33, 'Polito''s Special', 'tomatensaus, kaas, salami, gehakt, ui, kip, gorgonzola, ei, champignons'),
(34, 'Polito''s Deluxe', 'tomatensaus, kaas, tonijn, ui, paprika, look, oregano'),
(35, 'Quattro Stagioni', 'tomatensaus, kaas, ham, salami, champignons, paprika'),
(43, 'Lasagne', 'bolognaise, bechamelsaus, kaas'),
(44, 'Lasagne Vegetarisch', 'verse groentjes, roomsaus'),
(45, 'Lasagne Zalm', 'laagje pasta met zalm en roomsaus'),
(46, 'Tagliatelle Bolognese', 'bolognaisesaus, kaas'),
(47, 'Tagliatelle Carbonara', 'roomsaus, spek, kaas'),
(48, 'Tagliatelle Quattro Formaggi', 'roomsaus, gouda, mozzarella, brie, gorgonzola'),
(49, 'Tagliatelle Ham & Kaas', 'kaassaus, ham'),
(50, 'Tagliatelle Pesto Chicken', 'pestosaus, stukjes kip'),
(51, 'Tagliatelle Frutti Di Mare', 'tomatensaus, look, zeevruchten'),
(52, 'Tagliatelle Polito', 'roomsaus, spek, kip, champignons'),
(53, 'Tiramisu', 'italiaanse specialiteit'),
(54, 'Brownie', 'chocoladegebak'),
(55, 'Cookie Dough Cheesecake', 'Kaastaart met koekjescrumble en chocoladeschilfers'),
(56, 'Mix & Match', 'ijs, koekjescrumble, coulis van rode vruchten, chocoladeschilfers'),
(57, 'Pepsi Cola', '1,5L'),
(58, 'Pepsi Max', '1,5L'),
(59, 'Ice Tea', '1,5L'),
(60, 'Spa Plat', '1.5L'),
(61, 'Spa Bruis', '1,5L');

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
-- AUTO_INCREMENT voor een tabel `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT voor een tabel `foodcat`
--
ALTER TABLE `foodcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `foodnames`
--
ALTER TABLE `foodnames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
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
