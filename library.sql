-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 07 2018 г., 00:43
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name_author` varchar(255) NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id_author`, `name_author`) VALUES
(1, 'Жюль Верн'),
(2, 'Дмитрий Котеров'),
(3, 'Робин Никсон'),
(4, 'Андре Моруа'),
(5, 'Антуан де Сент-Экзюпери'),
(6, 'Эрих Мария Ремарк'),
(7, 'Сунь-цзы'),
(10, 'Автор1');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id_books` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `id_author` int(11) DEFAULT NULL,
  `UDC_chipher` varchar(50) DEFAULT NULL,
  `page` int(4) DEFAULT NULL,
  `parent` int(11) NOT NULL,
  `id_publishing_house` int(11) DEFAULT NULL,
  `id_type_PH` int(11) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_books`),
  KEY `FK_publishing_house` (`id_publishing_house`),
  KEY `FK_type_PH` (`id_type_PH`),
  KEY `FK_city` (`id_city`),
  KEY `FK_author_idx` (`id_author`),
  KEY `FK_category` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id_books`, `title`, `id_author`, `UDC_chipher`, `page`, `parent`, `id_publishing_house`, `id_type_PH`, `id_city`, `year`) VALUES
(13, 'Таинственный остров', 1, '15498564', 223, 7, 1, 1, 1, 2018),
(14, 'История Франции', 4, '19653415', 184, 7, 1, 1, 2, 2016),
(16, 'Три товарища', 6, '89561989', 100, 7, 2, 2, 2, 2017),
(17, 'Искусство войны', 7, '535212ас', 126, 7, 3, 1, 2, 2017),
(18, 'Создаем динамические веб-сайты с помощью PHP, MySQ', 3, '15623', 852, 2, 1, 1, 1, 2000),
(19, 'PHP 7 в подлиннике', 2, '452415', 1088, 2, 2, 1, 1, 2017),
(34, 'Дети капитана Гранта', 1, '870', 100, 5, 1, 1, 1, 3000),
(35, 'Книга', 1, '', 0, 5, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(256) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `parent`) VALUES
(1, 'Профильная литература', 0),
(2, 'Программирование', 1),
(3, 'Архитектура', 1),
(4, 'Электронные приборы и устройства', 1),
(5, 'Гидрогеология', 1),
(6, 'Строительство и эксплуатация зданий', 1),
(7, 'Художественная', 0),
(8, 'Бухгалтера ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id_city`, `city`) VALUES
(1, 'Москва'),
(2, 'Санкт-Петербург'),
(3, 'Город');

-- --------------------------------------------------------

--
-- Структура таблицы `publishing_house`
--

CREATE TABLE IF NOT EXISTS `publishing_house` (
  `id_publishing_house` int(11) NOT NULL AUTO_INCREMENT,
  `name_publishing_house` varchar(255) NOT NULL,
  PRIMARY KEY (`id_publishing_house`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `publishing_house`
--

INSERT INTO `publishing_house` (`id_publishing_house`, `name_publishing_house`) VALUES
(1, 'Дрофа'),
(2, 'Просвещение'),
(3, 'Феникс'),
(4, 'Издательсво');

-- --------------------------------------------------------

--
-- Структура таблицы `type_ph`
--

CREATE TABLE IF NOT EXISTS `type_ph` (
  `id_type_ph` int(11) NOT NULL AUTO_INCREMENT,
  `name_type_ph` varchar(256) NOT NULL,
  PRIMARY KEY (`id_type_ph`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `type_ph`
--

INSERT INTO `type_ph` (`id_type_ph`, `name_type_ph`) VALUES
(1, 'Книга'),
(2, 'Справочник'),
(3, 'Журнал'),
(4, 'Брошюра');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_author` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`parent`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_city` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_publishing_house` FOREIGN KEY (`id_publishing_house`) REFERENCES `publishing_house` (`id_publishing_house`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_type_PH` FOREIGN KEY (`id_type_PH`) REFERENCES `type_ph` (`id_type_ph`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
