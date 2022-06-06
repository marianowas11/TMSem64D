-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql01.marianowas11.beep.pl:3306
-- Czas generowania: 06 Cze 2022, 09:23
-- Wersja serwera: 5.7.31-34-log
-- Wersja PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tmsem64d`
--
CREATE DATABASE IF NOT EXISTS `tmsem64d` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `tmsem64d`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nazwa_srodka`
--

CREATE TABLE `nazwa_srodka` (
  `idnazwa` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `nazwa_pliku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `nazwa_srodka`
--

INSERT INTO `nazwa_srodka` (`idnazwa`, `nazwa`, `nazwa_pliku`) VALUES
(1, 'krzeslo', 'testlink'),
(2, 'komputer', 'testlink');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podklad`
--

CREATE TABLE `podklad` (
  `idpod` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `nazwa_pliku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `podklad`
--

INSERT INTO `podklad` (`idpod`, `nazwa`, `nazwa_pliku`) VALUES
(1, 'parter', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pomieszczenie`
--

CREATE TABLE `pomieszczenie` (
  `idpom` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pomieszczenie`
--

INSERT INTO `pomieszczenie` (`idpom`, `nazwa`) VALUES
(1, 'serwerownia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `idp` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `haslo` varchar(45) DEFAULT NULL,
  `stan` varchar(45) DEFAULT NULL,
  `X_pracownika` varchar(45) DEFAULT NULL,
  `Y_pracownika` varchar(45) DEFAULT NULL,
  `nazwa_pliku` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pracownik`
--

INSERT INTO `pracownik` (`idp`, `username`, `haslo`, `stan`, `X_pracownika`, `Y_pracownika`, `nazwa_pliku`) VALUES
(2, 'test', 'test', 'praca lokalna', '450', '293', 'test.png'),
(8, 'mariusz', 'mariusz', 'praca zdalna online', '620', '320', 'mariusz.png'),
(9, 'janusz', 'janusz', 'urlop', '0', '320', 'janusz.png'),
(11, 'q', 'q', 'dyżur pod telefonem', '310', '160', 'Screenshot_1.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `srodek`
--

CREATE TABLE `srodek` (
  `ids` int(11) NOT NULL,
  `nazwa` varchar(45) DEFAULT NULL,
  `identyfikator` varchar(45) DEFAULT NULL,
  `koszt` varchar(45) DEFAULT NULL,
  `datatime` datetime DEFAULT CURRENT_TIMESTAMP,
  `X_srodka` varchar(45) DEFAULT NULL,
  `Y_srodka` varchar(45) DEFAULT NULL,
  `uwagi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `srodek`
--

INSERT INTO `srodek` (`ids`, `nazwa`, `identyfikator`, `koszt`, `datatime`, `X_srodka`, `Y_srodka`, `uwagi`) VALUES
(7, 'Krzew', '5', '222', '2022-05-19 17:36:23', '139', '74', 'testtt'),
(8, 'Lawka', '6', '314', '2022-05-19 17:53:28', '501', '281', 'ssss'),
(9, 'Komputer', '7', '42', '2022-05-22 16:24:35', '144', '133', 'BRAK'),
(11, 'Krzeslo', '10', '100', '2022-05-30 09:58:30', '325', '175', 'brak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ_srodka`
--

CREATE TABLE `typ_srodka` (
  `idtyp` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `typ_srodka`
--

INSERT INTO `typ_srodka` (`idtyp`, `nazwa`) VALUES
(1, 'wyposazenie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `nazwa_srodka`
--
ALTER TABLE `nazwa_srodka`
  ADD PRIMARY KEY (`idnazwa`);

--
-- Indeksy dla tabeli `podklad`
--
ALTER TABLE `podklad`
  ADD PRIMARY KEY (`idpod`);

--
-- Indeksy dla tabeli `pomieszczenie`
--
ALTER TABLE `pomieszczenie`
  ADD PRIMARY KEY (`idpom`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`idp`);

--
-- Indeksy dla tabeli `srodek`
--
ALTER TABLE `srodek`
  ADD PRIMARY KEY (`ids`);

--
-- Indeksy dla tabeli `typ_srodka`
--
ALTER TABLE `typ_srodka`
  ADD PRIMARY KEY (`idtyp`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `nazwa_srodka`
--
ALTER TABLE `nazwa_srodka`
  MODIFY `idnazwa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `podklad`
--
ALTER TABLE `podklad`
  MODIFY `idpod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `pomieszczenie`
--
ALTER TABLE `pomieszczenie`
  MODIFY `idpom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `srodek`
--
ALTER TABLE `srodek`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `typ_srodka`
--
ALTER TABLE `typ_srodka`
  MODIFY `idtyp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
