-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 21 jan 2023 om 10:33
-- Serverversie: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- PHP-versie: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BicycleRentalSystem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Bicycle`
--

CREATE TABLE `Bicycle` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT 1,
  `category` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `picture` varchar(300) DEFAULT NULL,
  `borg` double NOT NULL,
  `priceperday` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Bicycle`
--

INSERT INTO `Bicycle` (`id`, `name`, `isAvailable`, `category`, `description`, `picture`, `borg`, `priceperday`) VALUES
(1, 'Yellow Mountainbike', 0, 'MountainBike', 'A cool mountainbike to cross around the woods with.', 'https://www.edelstenbikes.com/wp-content/uploads/2018/12/superb.jpg', 250, 100),
(2, 'Blue mountainbike', 0, 'MountainBike', 'A cool mountainbike to ride around woods with.', 'https://www.belgafietsen.nl/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/9/D/9DC11F40-2817-4238-84BF-ACC1D9D7E2A9.jpg', 250, 50),
(4, 'E-bike', 1, 'E-bike', 'A cool electrical bike to ride around with.', 'https://www.fietscorner.nl/media/catalog/product/cache/ce2c090f9c3d4f35979d90b7dd274348/4/3/436_6._comfort_pro_wave_-_jeans_blauw_zwart_mat_3.jpg', 250, 50),
(5, 'Black E-Bike', 1, 'E-Bike', 'a froom froom ebike', 'http://cdn.shopify.com/s/files/1/0554/1586/5539/products/NieF-Colosseo-48V-14A-Fat-bike-26x4-1.png?v=1659109540', 500, 100);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Rentals`
--

CREATE TABLE `Rentals` (
  `orderId` int(11) NOT NULL,
  `bicycleId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Rentals`
--

INSERT INTO `Rentals` (`orderId`, `bicycleId`, `email`, `startDate`, `endDate`, `price`) VALUES
(1, 3, '2', '2022-12-29', '2023-01-02', 250),
(2, 2, 'jespervdven5@gmail.com', '2023-01-19', '2023-01-21', 400),
(3, 4, 'Poopie@gmail.com', '2023-01-19', '2023-01-21', 400),
(4, 4, 'Poopie@gmail.com', '2023-01-19', '2023-01-21', 400),
(5, 4, 'Poopie@gmail.com', '2023-01-19', '2023-01-21', 400),
(6, 4, 'Poopie@gmail.com', '2023-01-19', '2023-01-21', 400),
(7, 11, '11@gmail.com', '2023-01-29', '2023-02-06', 800),
(8, 11, '11@gmail.com', '2023-01-29', '2023-02-06', 800),
(9, 1, 'jesperwerkt@outlook.com', '2023-01-18', '2023-01-19', 300),
(10, 1, 'jesperwerkt@outlook.com', '2023-01-18', '2023-01-19', 300),
(11, 2, 'Jespervdven5@gmail.com', '2023-01-18', '2023-01-19', 300),
(12, 5, 'jesperwerkt@outlook.com', '2023-01-21', '2023-01-22', 222);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`id`, `name`, `email`, `phoneNumber`, `password`) VALUES
(1, 'Piet van Os', 'ospieter@gmail.com', '0626698188', '$2y$10$/rr2AIzqCkPkt8ysw2Mmx.MrUNjW4FWvwn4dOYbbo1bTTXa20w7PK'),
(5, 'jesper van der ven', '679691@student.inholland.nl', '0646671166', '$2y$10$ry.6VvXatVyiU8mUUoQfCe40c6CqKVT7yroSI54LXrBJQcDZow07m');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Bicycle`
--
ALTER TABLE `Bicycle`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Rentals`
--
ALTER TABLE `Rentals`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Bicycle`
--
ALTER TABLE `Bicycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `Rentals`
--
ALTER TABLE `Rentals`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
