-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2019 г., 01:39
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `recepti`
--

-- --------------------------------------------------------

--
-- Структура таблицы `coldeat`
--

CREATE TABLE IF NOT EXISTS `coldeat` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `kr_descript` varchar(150) NOT NULL,
  `descript` varchar(150) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `coldeat`
--

INSERT INTO `coldeat` (`id`, `name`, `photo`, `title`, `kr_descript`, `descript`, `category`) VALUES
(6, '', 'images/coldslider.jpg', 'Блюдо холодное', 'Создано для теста', 'Создано для теста', 'Роллы');

-- --------------------------------------------------------

--
-- Структура таблицы `desert`
--

CREATE TABLE IF NOT EXISTS `desert` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `kr_descript` varchar(150) NOT NULL,
  `descript` varchar(150) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `desert`
--

INSERT INTO `desert` (`id`, `name`, `photo`, `title`, `kr_descript`, `descript`, `category`) VALUES
(6, '', 'images/desertslider.jpg', 'Тортик "Вишенка"', 'Не плохой тортик', 'Не плохой тортик среди десертов', 'Торты');

-- --------------------------------------------------------

--
-- Структура таблицы `hoteat`
--

CREATE TABLE IF NOT EXISTS `hoteat` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `kr_descript` varchar(150) NOT NULL,
  `descript` varchar(150) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hoteat`
--

INSERT INTO `hoteat` (`id`, `name`, `photo`, `title`, `kr_descript`, `descript`, `category`) VALUES
(7, '', 'images/hotslider.jpg ', 'Гарнир "Тестируемый"', 'Гарнир создан для теста страницы', 'Гарнир создан для теста страницы', 'Гарнир');

-- --------------------------------------------------------

--
-- Структура таблицы `trash`
--

CREATE TABLE IF NOT EXISTS `trash` (
  `id` int(11) NOT NULL,
  `getid` varchar(50) NOT NULL,
  `userlog` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trash`
--

INSERT INTO `trash` (`id`, `getid`, `userlog`, `cat`) VALUES
(6, '7', 'test@mail', 'Горячие'),
(7, '6', 'test@mail', 'Холод'),
(8, '6', 'test@mail', 'Дес');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `salt`, `status`) VALUES
(1, 'admin', '0f188d0be4e65a70f995bef730d9759769f417e59d671de9bbe4a0a96a29e53f', '415906e47a313d397e5c03e37267ea7b', 'admin'),
(2, 'test@mail', '42e8e44cf54f30f9ba6a97d1b8e0def8ba7f8e20281f533ac785c4214a48937e', 'ac5baad0d5e7bef61887f01542a6d552', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `coldeat`
--
ALTER TABLE `coldeat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `desert`
--
ALTER TABLE `desert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hoteat`
--
ALTER TABLE `hoteat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coldeat`
--
ALTER TABLE `coldeat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `desert`
--
ALTER TABLE `desert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `hoteat`
--
ALTER TABLE `hoteat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `trash`
--
ALTER TABLE `trash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
