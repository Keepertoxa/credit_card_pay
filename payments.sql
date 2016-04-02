-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Апр 02 2016 г., 20:16
-- Версия сервера: 5.5.35-33.0
-- Версия PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u0074366_card`
--

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` char(255) DEFAULT NULL,
  `cash` char(255) DEFAULT NULL,
  `currency` char(255) DEFAULT NULL,
  `card_number` char(255) DEFAULT NULL,
  `v_name` char(255) DEFAULT NULL,
  `month` char(255) DEFAULT NULL,
  `year` char(255) DEFAULT NULL,
  `cvv` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `order_number`, `cash`, `currency`, `card_number`, `v_name`, `month`, `year`, `cvv`) VALUES
(49, '77777', '55555', 'RUB', '7777777777777777', 'ANTON CHUMAK', '12', '77', '777');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
