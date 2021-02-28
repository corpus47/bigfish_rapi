-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2021. Feb 28. 22:25
-- Kiszolgáló verziója: 8.0.23-0ubuntu0.20.10.1
-- PHP verzió: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bigfish_api`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `apikeys`
--

CREATE TABLE `apikeys` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `api_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salt` varchar(255) NOT NULL,
  `active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `apikeys`
--

INSERT INTO `apikeys` (`id`, `user_id`, `api_key`, `salt`, `active`) VALUES
(1, 1, '5ab33507aeb0f70c57476bf1ee058e84e80cedda', 'f8631efc12', 1),
(2, 2, 'e4375ac3bdfc80af9c0acf6c8f863b0ca7ce84e1', '6bea928a93', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `players`
--

CREATE TABLE `players` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `active` int DEFAULT NULL,
  `age` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `active`, `age`) VALUES
(3, 'Víz', 'Elek', NULL, NULL),
(4, 'Kuka', 'Kálmán', NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `apikeys`
--
ALTER TABLE `apikeys`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `apikeys`
--
ALTER TABLE `apikeys`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
