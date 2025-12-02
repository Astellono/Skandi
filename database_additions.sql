-- Добавление таблиц для работы системы записей на туры и экскурсии

-- --------------------------------------------------------

--
-- Структура таблицы `signing`
-- Таблица для хранения записей пользователей на туры
--

CREATE TABLE IF NOT EXISTS `signing` (
  `signing_id` int(11) NOT NULL AUTO_INCREMENT,
  `signing_user_id` int(11) NOT NULL,
  `signing_tour_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`signing_id`),
  KEY `signing_user_id` (`signing_user_id`),
  KEY `signing_tour_id` (`signing_tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
-- Таблица с информацией о турах
--

CREATE TABLE IF NOT EXISTS `tours` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_name` varchar(255) NOT NULL,
  `tour_date` varchar(100) DEFAULT NULL,
  `tour_linkPage` varchar(255) DEFAULT NULL,
  `tour_imgSrc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `excursion_signings`
-- Таблица для хранения записей пользователей на экскурсии
--

CREATE TABLE IF NOT EXISTS `excursion_signings` (
  `excursion_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `excursion_name` varchar(255) NOT NULL,
  `excursion_link_id` varchar(100) DEFAULT NULL,
  `excursion_date` date DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`excursion_id`),
  KEY `user_id` (`user_id`),
  KEY `excursion_link_id` (`excursion_link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Если таблица уже существует, добавляем поле excursion_link_id
-- Раскомментируйте, если нужно обновить существующую таблицу:
-- ALTER TABLE `excursion_signings` ADD COLUMN `excursion_link_id` VARCHAR(100) DEFAULT NULL AFTER `excursion_name`;
-- ALTER TABLE `excursion_signings` ADD KEY `excursion_link_id` (`excursion_link_id`);

-- --------------------------------------------------------

--
-- Ограничения внешнего ключа
--

-- Ограничения для таблицы `signing`
-- ВНИМАНИЕ: Если внешние ключи уже существуют, команды выдадут ошибку - это нормально, просто пропустите их
-- Выполняйте эти команды только после создания всех таблиц

ALTER TABLE `signing`
  ADD CONSTRAINT `signing_ibfk_1` FOREIGN KEY (`signing_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `signing`
  ADD CONSTRAINT `signing_ibfk_2` FOREIGN KEY (`signing_tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE CASCADE;

-- Ограничения для таблицы `excursion_signings`
ALTER TABLE `excursion_signings`
  ADD CONSTRAINT `excursion_signings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

-- --------------------------------------------------------

--
-- Пример данных для таблицы `tours`
-- Раскомментируйте и выполните, если хотите добавить примеры туров
-- ВАЖНО: tour_id должен соответствовать idTour, который передается в URL при записи на тур
--

/*
INSERT INTO `tours` (`tour_id`, `tour_name`, `tour_date`, `tour_linkPage`, `tour_imgSrc`) VALUES
(1, 'Торжок: Императорский шаг', '12 декабря - 14 декабря 2025г', 'page_tour/torzhok.php', 'img/act-tour/torzhok.jpg'),
(2, 'Алтайская зимняя сказка', '2 января - 9 января 2026г', 'page_tour/altay.php', 'img/act-tour/altay.jpg'),
(3, 'Тур «Сибирская Масленица: Тобольск в ритме скандинавской ходьбы»', '19 февраля - 23 февраля 2026г', 'page_tour/masl.php', 'img/act-tour/masl.jpeg'),
(4, 'Карелия. Паанаярви.', '7 марта - 11 марта 2026г', 'page_tour/pan.php', 'img/act-tour/pan.jpg'),
(5, 'Корея', '29 марта - 6 апреля 2026г', 'page_tour/koreya.php', 'img/act-tour/koreya.jpg'),
(6, 'Узбекистан', '3 мая - 10 мая 2026г', 'page_tour/uz.php', 'img/act-tour/uz.jpg'),
(7, 'Карелия. В КРАЮ КАЛЕВАЛЬСКИХ ПЕСЕН', '6 июня - 11 июня 2026г', 'page_tour/kalev.php', 'img/act-tour/kalev.jpg'),
(8, 'Тур «СЕВЕРНЫЙ ШАГ: Архангельск, Поморье и Каргополье»', '12 июля - 18 июля 2026г', 'page_tour/sever.php', 'img/act-tour/sever.png'),
(9, 'Юг Киргизии', '6 августа - 15 августа 2026г', 'page_tour/kirg.php', 'img/act-tour/kirg.jpg'),
(10, 'Тур: «Грузия в бархатный сезон: вино, стиль и сезон ртвели»', '7 сентября - 13 сентября 2026г', 'page_tour/gruz.php', 'img/act-tour/gruz.jpeg'),
(11, 'Тур: «Дыхание Казахстана: Алматинские горы и легенды Великой Степи»', '4 октября - 11 октября 2026г', 'page_tour/kazah.php', 'img/act-tour/kazah.jpeg');
*/

