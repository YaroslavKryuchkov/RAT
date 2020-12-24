-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 24 2020 г., 02:56
-- Версия сервера: 8.0.18
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taxipark`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calls`
--

CREATE TABLE `calls` (
  `FromAdress` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ToAdress` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `CallNum` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `CalledBy` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Свободен',
  `lifetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `calls`
--

INSERT INTO `calls` (`FromAdress`, `ToAdress`, `CallNum`, `CalledBy`, `lifetime`) VALUES
('123', '123', '123124', '12312', '2020-12-02 20:01:54'),
('123', '124', '2353251245', 'Никто', '2020-12-13 12:28:25'),
('123', '123', '123', 'Свободен', '2020-12-17 04:41:05');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `Mark` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Number` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `Stealed` char(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `Will` tinyint(1) NOT NULL DEFAULT '1',
  `CarStop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`Mark`, `Number`, `Stealed`, `Will`, `CarStop`) VALUES
('Нее', '123йцу', '0', 1, 3),
('Велосипед', 'А123ПА', '0', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `carstop`
--

CREATE TABLE `carstop` (
  `ID` int(11) NOT NULL,
  `Addres` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `AllSpace` smallint(6) NOT NULL,
  `FreeSpace` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `carstop`
--

INSERT INTO `carstop` (`ID`, `Addres`, `AllSpace`, `FreeSpace`) VALUES
(1, 'Восточнее Западного проспекта', 2, 1),
(3, 'Ул.Пушкина 13', 23, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `joblist`
--

CREATE TABLE `joblist` (
  `JobId` tinyint(4) NOT NULL,
  `Name` char(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `joblist`
--

INSERT INTO `joblist` (`JobId`, `Name`) VALUES
(0, 'Admin'),
(1, 'Phoner'),
(2, 'Driver'),
(3, 'Mechanic'),
(4, 'Recruter');

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `WorkerID` int(11) NOT NULL,
  `Login` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `FirstName` char(40) COLLATE utf8mb4_general_ci NOT NULL,
  `SecondName` char(40) COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` char(40) COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNum` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Salary` int(11) NOT NULL,
  `Exp` decimal(5,2) NOT NULL,
  `FormWork` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `JobId` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`WorkerID`, `Login`, `Password`, `FirstName`, `SecondName`, `LastName`, `PhoneNum`, `Salary`, `Exp`, `FormWork`, `JobId`) VALUES
(1, 'admin', 'pass', 'Admin', 'Admin', 'Admin', '0000000000', 1, '9.99', 'Always', 0),
(2, 'disp', 'disp', '123', '123', '123', '123', 123, '1.00', '123', 1),
(3, 'driv', 'driv', '123', '123', '312', '123', 123, '1.00', '123', 2),
(4, 'mech', 'mech', '123', '123', '123', '123', 123, '0.00', '1235444', 3),
(5, 'rec', 'rec', '123', '123', '123', '1213', 123, '1.21', '123412312412', 4),
(6, 'ad1', 'pa1', 'Trreee', '123', '123124', '124', 213, '24.66', '1', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `Number` (`Number`);

--
-- Индексы таблицы `carstop`
--
ALTER TABLE `carstop`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`JobId`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`WorkerID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carstop`
--
ALTER TABLE `carstop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `WorkerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
