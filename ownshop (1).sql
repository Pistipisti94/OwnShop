-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 07. 08:45
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ownshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `userid` int(4) UNSIGNED NOT NULL,
  `termekid` int(4) UNSIGNED NOT NULL,
  `megrendeles` date NOT NULL,
  `feldolgozas` enum('feldolgozás alatt','becsomagolva','átadva futárnak','kiszállítva') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termekid` int(4) UNSIGNED NOT NULL,
  `termekfajta` varchar(30) NOT NULL,
  `marka` varchar(20) NOT NULL,
  `tipus` varchar(40) NOT NULL,
  `megjelenes` year(4) NOT NULL,
  `beerkezes` date NOT NULL,
  `megjegyzes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termekid`, `termekfajta`, `marka`, `tipus`, `megjelenes`, `beerkezes`, `megjegyzes`) VALUES
(1, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(2, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(7, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(8, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(9, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(10, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(11, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(12, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(13, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(14, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(15, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(16, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(17, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(18, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(19, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(20, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(21, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(22, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(23, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(24, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(25, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(26, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(27, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(28, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(29, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(30, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(31, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(32, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(33, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(34, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz'),
(35, 'Telefon', 'Samsung', 'Galaxy S23 Ultra', '2023', '2023-10-23', 'Jó'),
(36, 'Telefon', 'Apple', 'iPhone 14', '2023', '2023-10-23', 'Rossz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userid` int(4) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `teljesnev` varchar(50) NOT NULL,
  `igazolvanyszam` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `teljesnev`, `igazolvanyszam`) VALUES
(3, 'admin', 'admin', 'admin@admin.hu', 'Admin Ka', '123456AB'),
(4, 'Lajcsi', '1234', 'zoli@posta.hu', 'Kovács Zoltán', '123456CA'),
(5, 'HELLO', '1234', 'asd2@asd.hu', 'Kovács Zoltán Bandi', '123456er');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `termekid` (`termekid`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termekid`),
  ADD UNIQUE KEY `termekid` (`termekid`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `igazolvanyszam` (`igazolvanyszam`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termekid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `fk_rendeles_termek` FOREIGN KEY (`termekid`) REFERENCES `termekek` (`termekid`),
  ADD CONSTRAINT `fk_rendeles_users` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
