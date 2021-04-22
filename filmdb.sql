-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2021 г., 19:03
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `filmdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) UNSIGNED NOT NULL,
  `actor_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `actor_dob` date NOT NULL,
  `actor_country` varchar(255) COLLATE utf8_bin NOT NULL,
  `actor_rating` tinyint(10) UNSIGNED NOT NULL,
  `actor_description` varchar(255) COLLATE utf8_bin NOT NULL,
  `actor_awards` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`actor_id`, `actor_name`, `actor_dob`, `actor_country`, `actor_rating`, `actor_description`, `actor_awards`) VALUES
(1, 'Аль Пачино', '1940-04-25', 'США', 10, 'Наиболее знаменит своими ролями гангстеров &mdash; Майкл Корлеоне в трилогии &laquo;Крёстный отец&raquo; Фрэнсиса Форда Копполы и Тони Монтана в фильме Брайана Де Пальма &laquo;Лицо со шрамом&raquo;. Роль Фрэнка Слейда в фильме &laquo;Запах женщины&raquo;', '&laquo;Оскар&raquo; (1993) &laquo;Золотой глобус&raquo; (1974, 1993, 2001, 2004, 2011) &laquo;BAFTA&raquo; (1976) &laquo;Тони&raquo; (1969, 1977) &laquo;Золотой лев&raquo; (1994) &laquo;Эмми&raquo; (2004, 2010)'),
(5, 'Дэнни Де Вито', '1944-11-17', 'США', 9, 'Дэ́ниел Майкл &laquo;Дэ́нни&raquo; Де Ви́то-мла́дший &mdash; американский актёр, режиссёр, продюсер. Номинант на премию &laquo;Оскар&raquo; за фильм &laquo;Эрин Брокович&raquo;.', '&laquo;Золотой глобус&raquo; (1980) &laquo;Эмми&raquo; (1981)'),
(8, 'Тестовый актер', '1111-11-11', 'Отсутствует', 0, 'Проверка вывода БД', 'Отсутствуют');

-- --------------------------------------------------------

--
-- Структура таблицы `connects`
--

CREATE TABLE `connects` (
  `connect_id` int(11) NOT NULL,
  `connect_user_id` int(11) NOT NULL,
  `connect_token` char(32) COLLATE utf8_bin NOT NULL,
  `connect_token_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `connects`
--

INSERT INTO `connects` (`connect_id`, `connect_user_id`, `connect_token`, `connect_token_time`) VALUES
(23, 3, '0183021aa5e950140e8f1aadaa6d6144', '2021-04-22'),
(31, 1, '9d1ac0ded117df6c8a56325660a75ee3', '2021-04-22'),
(32, 1, '13155186c8f9c87053e3fc8a8c090b9c', '2021-04-22'),
(33, 1, '18dc8aeadfcf608aedc3407ea55b271f', '2021-04-22'),
(34, 1, 'ce73e4ac67eaebc2ab35096cee7e87a8', '2021-04-22');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `genre_description` varchar(400) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`, `genre_description`) VALUES
(1, 'Криминал', 'Жанр, сосредоточившее своё внимание непосредственно на преступлении, его раскрытии, образах преступников и их мотива');

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) UNSIGNED NOT NULL,
  `movie_producer_id` int(11) UNSIGNED NOT NULL,
  `movie_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `movie_description` varchar(500) COLLATE utf8_bin NOT NULL,
  `movie_release_date` date NOT NULL,
  `movie_rating` tinyint(10) UNSIGNED NOT NULL,
  `movie_genre_id` int(11) NOT NULL,
  `movie_awards` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_producer_id`, `movie_name`, `movie_description`, `movie_release_date`, `movie_rating`, `movie_genre_id`, `movie_awards`) VALUES
(17, 1, ' Ирландец', 'В доме престарелых сильно пожилой мужчина по имени Фрэнк Ширан вспоминает свою жизнь. В 1950-е он работал простым водителем грузовика, совсем не хотел быть гангстером и думал, что маляры - это те, кто красят дома, когда случайно познакомился с криминальным авторитетом Расселом Буфалино. Тот взял парня под своё крыло, начал давать ему небольшие поручения, и вот уже Фрэнк по прозвищу Ирландец сам работает &laquo;маляром&raquo;, мафиозным киллером.', '0000-00-00', 10, 1, 'Оскар, Золотой глобус, награды британской академии, премия гильдии актеров'),
(27, 1, '23', '213', '0000-00-00', 10, 1, 'Отсутствуют');

-- --------------------------------------------------------

--
-- Структура таблицы `producers`
--

CREATE TABLE `producers` (
  `producer_id` int(11) UNSIGNED NOT NULL,
  `producer_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `producer_dob` date NOT NULL,
  `producer_country` varchar(255) COLLATE utf8_bin NOT NULL,
  `producer_description` varchar(255) COLLATE utf8_bin NOT NULL,
  `producer_awards` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `producers`
--

INSERT INTO `producers` (`producer_id`, `producer_name`, `producer_dob`, `producer_country`, `producer_description`, `producer_awards`) VALUES
(1, 'Мартин Скорсезе', '1942-11-17', 'США', 'Американский кинорежиссёр, продюсер, сценарист и актёр. Фильмам Скорсезе присущи выразительная жестокость и насилие, в кинематографических кругах он известен как мастер гангстерских лент.', 'В 2020 год за  &quot;Ирландца&quot; награжден Оскаром, Золотым глобусом, удостоен награды Британской академии');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_dob` date NOT NULL,
  `user_is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_address`, `user_phone`, `user_password`, `user_dob`, `user_is_admin`) VALUES
(1, 'admin', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 1),
(2, 'user', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 0),
(3, 'user1', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Индексы таблицы `connects`
--
ALTER TABLE `connects`
  ADD PRIMARY KEY (`connect_id`),
  ADD KEY `connect_user_id` (`connect_user_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `movie_director_id` (`movie_producer_id`),
  ADD KEY `movie_genre_id` (`movie_genre_id`);

--
-- Индексы таблицы `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`producer_id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `connects`
--
ALTER TABLE `connects`
  MODIFY `connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `producers`
--
ALTER TABLE `producers`
  MODIFY `producer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `connects`
--
ALTER TABLE `connects`
  ADD CONSTRAINT `connects_ibfk_1` FOREIGN KEY (`connect_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`movie_producer_id`) REFERENCES `producers` (`producer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`movie_genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
