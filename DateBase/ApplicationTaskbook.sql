-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2018 г., 16:57
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ApplicationTaskbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Tasks`
--

CREATE TABLE `Tasks` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `ImageLocation` text NOT NULL,
  `Status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Tasks`
--

INSERT INTO `Tasks` (`Id`, `Name`, `Mail`, `Description`, `ImageLocation`, `Status`) VALUES
(1, 'Name0', 'mail0@mail.com', ' Description0', 'http://placehold.it/320x240', b'0'),
(2, 'Name1', 'mail1@mail.com', ' Description1', 'http://placehold.it/321x240', b'0'),
(3, 'Name2', 'mail2@mail.com', ' Description2', 'http://placehold.it/322x240', b'0'),
(4, 'Name3', 'mail3@mail.com', ' Description3', 'http://placehold.it/323x240', b'0'),
(5, 'Name4', 'mail4@mail.com', ' Description4', 'http://placehold.it/324x240', b'0'),
(6, 'Name5', 'mail5@mail.com', ' Description5', 'http://placehold.it/325x240', b'0'),
(7, 'Name6', 'mail6@mail.com', ' Description6', 'http://placehold.it/326x240', b'0'),
(8, 'Name7', 'mail7@mail.com', ' Description7', 'http://placehold.it/327x240', b'0'),
(9, 'Name8', 'mail8@mail.com', ' Description8', 'http://placehold.it/328x240', b'1'),
(17, 'Edit Column Test', 'Test', 'Test', 'Test', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Login` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `AccountType` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Mail`, `Login`, `Password`, `AccountType`) VALUES
(1, 'Admin', 'Admin@mail.com', 'Admin', '1', 'Admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UniqName` (`Name`),
  ADD UNIQUE KEY `UniqMail` (`Mail`),
  ADD UNIQUE KEY `UniqLogin` (`Login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
