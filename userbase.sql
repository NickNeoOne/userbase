-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~trusty.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 16 2017 г., 20:48
-- Версия сервера: 5.5.54-0ubuntu0.14.04.1
-- Версия PHP: 7.0.15-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `userbase`
--
DROP DATABASE IF EXISTS `userbase`;
CREATE DATABASE IF NOT EXISTS `userbase` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `userbase`;

-- --------------------------------------------------------

--
-- Структура таблицы `adm_usertbl`
--

CREATE TABLE `adm_usertbl` (
  `id` int(11) NOT NULL,
  `full_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `domain_pc`
--

CREATE TABLE `domain_pc` (
  `id_pc` int(11) NOT NULL,
  `pc_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `location_pc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `domain_user`
--

CREATE TABLE `domain_user` (
  `id` int(11) NOT NULL,
  `family` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pin_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `notation` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adm_usertbl`
--
ALTER TABLE `adm_usertbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `domain_pc`
--
ALTER TABLE `domain_pc`
  ADD PRIMARY KEY (`id_pc`);

--
-- Индексы таблицы `domain_user`
--
ALTER TABLE `domain_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adm_usertbl`
--
ALTER TABLE `adm_usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `domain_user`
--
ALTER TABLE `domain_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Дамп данных таблицы `adm_usertbl`
--

INSERT INTO `adm_usertbl` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(1, 'Admin', 'admin@admin.ru', 'admin', '21232f297a57a5a743894a0e4a801fc3');
