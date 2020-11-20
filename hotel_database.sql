-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2020 г., 07:37
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hotel_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_begin` date NOT NULL,
  `room` varchar(50) NOT NULL,
  `guests` int(10) UNSIGNED NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id`, `login`, `full_name`, `date_begin`, `room`, `guests`, `date_end`) VALUES
(7, 'anton', 'Бондарь', '2020-10-01', 'Полулюкс', 3, '2020-10-09'),
(8, 'anton', 'Бондарь', '2020-09-30', 'Полулюкс', 2, '2020-10-09'),
(9, 'anton', 'Бондарь', '2020-11-05', 'Полулюкс', 3, '2020-10-28'),
(10, 'anton', 'Бондарь', '2020-10-10', 'Полулюкс', 1, '2020-10-04'),
(11, 'anton', 'Бондарь', '2020-10-06', 'Стандарт-комфорт 2-местный', 5, '2020-10-10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(2) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `root` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `login`, `password`, `phone`, `root`) VALUES
(18, 'Бондарь Антон Викторович', 'bondar.av00@mail.ru', 'admin', 'd2ef29988724518420501a5756143135', '+79061759642', 10),
(20, 'Бондарь', 'bondar.av00@aga.ry', 'anton', 'ba8aaf4e8e40b27872846ee35b68e892', 'fdfd', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
