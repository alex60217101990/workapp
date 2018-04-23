-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 24 2018 г., 01:20
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
  `ImageLocation` varchar(300) DEFAULT '700x300.png',
  `Status` enum('New','Ready') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Tasks`
--

INSERT INTO `Tasks` (`Id`, `Name`, `Mail`, `Description`, `ImageLocation`, `Status`) VALUES
(1, 'YName0', 'mail0@mail.com', ' Description0', '493fe9cd.', 'New'),
(2, 'Name1', 'mail1@mail.com', ' Description1', '700x300.png', 'New'),
(3, 'Name2', 'mail2@mail.com', ' Description2', '700x300.png', 'New'),
(4, 'Name3 jfdhghrigriog', 'mail3@mail.com djfkvfrg', 'Description3', 'bff8ba84.', 'Ready'),
(5, 'Name4', 'mail4@mail.com', ' Description4', '57e1321f.jpg', 'New'),
(6, 'Name5', 'mail5@mail.com', ' Description5', '42203038.jpg', 'New'),
(7, 'Name6', 'mail6@mail.com', ' Description6', '36f35f77.jpg', 'New'),
(8, 'Name7', 'mail7@mail.com', ' Description7', 'e038fa81.jpg', 'New'),
(9, 'Name8', 'Mail9@mail.com', 'Description999', '6fe2e0e4.jpg', 'Ready'),
(17, 'Edit Column Test', 'Test', 'Test', '6f258a9c.jpg', 'New');

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
