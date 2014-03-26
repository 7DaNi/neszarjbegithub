-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2014. Már 26. 02:07
-- Szerver verzió: 5.6.11
-- PHP verzió: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `szakdoga`
--
CREATE DATABASE IF NOT EXISTS `szakdoga` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `szakdoga`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `arak`
--

CREATE TABLE IF NOT EXISTS `arak` (
  `arid` int(11) NOT NULL AUTO_INCREMENT,
  `termekid` int(11) NOT NULL,
  `kategoria` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `etelnev` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `meret` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `ar` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`arid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `arak`
--

INSERT INTO `arak` (`arid`, `termekid`, `kategoria`, `etelnev`, `meret`, `ar`) VALUES
(1, 1, 'pizzák', 'Carbonara', '32', '1250');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cimek`
--

CREATE TABLE IF NOT EXISTS `cimek` (
  `cimid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `kerulet` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `utca` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `hazszam` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `emelet` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `csengo` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`cimid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `cimek`
--

INSERT INTO `cimek` (`cimid`, `userid`, `kerulet`, `utca`, `hazszam`, `emelet`, `csengo`) VALUES
(1, 3, '11', 'Bartók Béla út', '33', '4', '18 Varga'),
(2, 3, '11', 'Elemér utca', '11', '8', '21');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE IF NOT EXISTS `rendeles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategoria` text COLLATE utf8_hungarian_ci NOT NULL,
  `etelnev` text COLLATE utf8_hungarian_ci NOT NULL,
  `tipus` text COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `teszta` text COLLATE utf8_hungarian_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `rendelesid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `rendeles`
--

INSERT INTO `rendeles` (`id`, `kategoria`, `etelnev`, `tipus`, `ar`, `teszta`, `userid`, `rendelesid`) VALUES
(1, 'pizzák', 'Carbonara', '32 cm', 1350, 'klasszikus', 3, 1),
(2, 'pizzák', 'Pomodoro', '32 cm', 1350, 'klasszikus', 3, 1),
(3, 'saláták', 'Cézár saláta', 'ezersziget', 1500, '', 3, 1),
(4, 'desszertek', 'Profitterol', '', 500, '', 3, 1),
(5, 'pizzák', 'Dolce Vita', '45 cm', 1600, 'klasszikus', 12, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE IF NOT EXISTS `rendelesek` (
  `rendelesid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `nev` text NOT NULL,
  `datum` text NOT NULL,
  `allapot` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`rendelesid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `rendelesek`
--

INSERT INTO `rendelesek` (`rendelesid`, `userid`, `nev`, `datum`, `allapot`) VALUES
(1, 3, 'Fehér András', '', ''),
(2, 12, 'Almási János', '', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek_hibas`
--

CREATE TABLE IF NOT EXISTS `rendelesek_hibas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rendelesid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nev` text COLLATE utf8_hungarian_ci NOT NULL,
  `datum` text COLLATE utf8_hungarian_ci NOT NULL,
  `allapot` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek_teljesitett`
--

CREATE TABLE IF NOT EXISTS `rendelesek_teljesitett` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rendelesid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nev` text COLLATE utf8_hungarian_ci NOT NULL,
  `datum` text COLLATE utf8_hungarian_ci NOT NULL,
  `allapot` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE IF NOT EXISTS `termekek` (
  `termekid` int(11) NOT NULL AUTO_INCREMENT,
  `kategoria` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `etelnev` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `kep` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`termekid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termekid`, `kategoria`, `etelnev`, `leiras`, `kep`) VALUES
(1, 'pizzák', 'Carbonara', '(tejszín, fokhagyma, bacon, tojás, mozzarella)', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `userek`
--

CREATE TABLE IF NOT EXISTS `userek` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL,
  `nev` text COLLATE utf8_hungarian_ci NOT NULL,
  `user` text COLLATE utf8_hungarian_ci NOT NULL,
  `pw` text COLLATE utf8_hungarian_ci NOT NULL,
  `telszam` text COLLATE utf8_hungarian_ci NOT NULL,
  `email` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=58 ;

--
-- A tábla adatainak kiíratása `userek`
--

INSERT INTO `userek` (`userid`, `rang`, `nev`, `user`, `pw`, `telszam`, `email`) VALUES
(3, 1, 'Fehér András', 'abcd', 'abcd', '+36/20-213-3445', 'daniili9393@gmail.com'),
(4, 2, '', 'fekete', 'fekete', '', ''),
(5, 3, '', 'admin', 'admin', '', ''),
(12, 1, 'Almási János', 'hhjbhb', 'hbhbhb', 'hbhbhb', 'hbbh'),
(13, 1, 'hh', 'hh', 'hh', 'hh', 'hh'),
(15, 1, 'hbhbbh', 'hbbh', 'hbbhbhhb', 'njjnjnjnnj', 'vhvhhv@gjhbbhj'),
(16, 1, 'njjnnj', 'jnnjjn', 'abcdef', 'ergdrgergdf', 'sdfasdf@dsfdsfsd'),
(26, 1, 'jnjnjn', 'jnjnjn', 'njnjn', 'njnj', 'nnjnnjn@dsfds.hu'),
(53, 1, 'nkjnjjnkjnk', 'jknknjkjnjknkjnnjk', 'abcd', 'dsfdsfsdf', 'vsdvds@.'),
(54, 1, 'fdgfdgfdg', 'fdsgfdsgfdgfdg', '1234', 'sdfdsfsdfds', 'dfgdssdfsd@.'),
(55, 1, '&#336', 'ab12', '1234', '1234sadsadasd', 'fsafdasf@.'),
(57, 1, 'őöüűádsvsdf', 'abcdabcd', '1234', 'asdasdasdasd', 'fsfdsfsd@.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
