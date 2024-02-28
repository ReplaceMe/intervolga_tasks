-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 28 2024 г., 15:50
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `intervolga`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(800) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `message`, `date`) VALUES
(1, 'Петя', 'дээээ, конечно', '0000-00-00'),
(2, 'Катя', 'а я катюха', '2024-02-27'),
(3, 'Леонид', 'dsa', '2024-02-27'),
(4, 'Виктория', 'Очень нравятся именно наушники такого типажа,не вылетают из ушей вообще,до этого были вкладыши от jbl за 4тыс безумно неудобные по сравнению с этими,это конечно индивидуально,но мне кажется в большинстве случаев будут сидеть идеально,хотя я вообще не ожид', '2024-02-28'),
(5, 'dasd', 'Очень нравятся именно наушники такого типажа,не вылетают из ушей вообще,до этого были вкладыши от jbl за 4тыс безумно неудобные по сравнению с этими,это конечно индивидуально,но мне кажется в большинстве случаев будут сидеть идеально,хотя я вообще не ожидал такого если честно.На счёт звука, преимущественно играют басы(качественные неплохие такие),я лично не любитель такого,если вы тоже то без проблем в эквалайзере просто под себя подогнать всегда можно,что я и сделал,звук намного лучше чем в тех предыдущих вкладышах,которые у меня были,звуком прям не разочаруетесь это точно.Ну и автономность тоже хорошая,хватит надолго.', '2024-02-28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
