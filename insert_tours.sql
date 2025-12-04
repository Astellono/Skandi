-- SQL скрипт для добавления всех туров в таблицу tours
-- Выполните этот скрипт после обновления структуры таблицы

-- Если нужно очистить таблицу перед добавлением (раскомментируйте):
-- TRUNCATE TABLE `tours`;

-- Добавление всех туров
INSERT INTO `tours` (`tour_id`, `tour_name`, `tour_date`, `tour_linkPage`, `tour_imgSrc`, `tour_color`, `tour_date_start`, `tour_date_end`) VALUES
(1, 'Торжок: Императорский шаг', '12 декабря - 14 декабря 2025г', 'page_tour/torzhok.php', 'img/act-tour/torzhok.jpg', '#7a5e3a', '2025-12-12', '2025-12-14'),
(2, 'Алтайская зимняя сказка', '2 января - 9 января 2026г', 'page_tour/altay.php', 'img/act-tour/altay.jpg', '#bd1e73', '2026-01-02', '2026-01-09'),
(3, 'Тур «Сибирская Масленица: Тобольск в ритме скандинавской ходьбы»', '19 февраля - 23 февраля 2026г', 'page_tour/masl.php', 'img/act-tour/masl.jpeg', '#1e48bdff', '2026-02-19', '2026-02-23'),
(4, 'Карелия. Паанаярви.', '7 марта - 11 марта 2026г', 'page_tour/pan.php', 'img/act-tour/pan.jpg', 'rgba(53, 109, 56, 1)', '2026-03-07', '2026-03-11'),
(5, 'Корея', '29 марта - 6 апреля 2026г', 'page_tour/koreya.php', 'img/act-tour/koreya.jpg', 'rgba(56, 126, 126, 1)', '2026-03-29', '2026-04-06'),
(6, 'Узбекистан', '3 мая - 10 мая 2026г', 'page_tour/uz.php', 'img/act-tour/uz.jpg', 'rgba(126, 120, 68, 1)', '2026-05-03', '2026-05-10'),
(7, 'Карелия. В КРАЮ КАЛЕВАЛЬСКИХ ПЕСЕН', '6 июня - 11 июня 2026г', 'page_tour/kalev.php', 'img/act-tour/kalev.jpg', 'rgba(126, 120, 68, 1)', '2026-06-06', '2026-06-11'),
(8, 'Тур «СЕВЕРНЫЙ ШАГ: Архангельск, Поморье и Каргополье»', '12 июля - 18 июля 2026г', 'page_tour/sever.php', 'img/act-tour/sever.png', 'rgb(139, 167, 221)', '2026-07-12', '2026-07-18'),
(9, 'Юг Киргизии', '6 августа - 15 августа 2026г', 'page_tour/kirg.php', 'img/act-tour/kirg.jpg', 'rgba(33, 13, 56, 1)', '2026-08-06', '2026-08-15'),
(10, 'Тур: «Грузия в бархатный сезон: вино, стиль и сезон ртвели»', '7 сентября - 13 сентября 2026г', 'page_tour/gruz.php', 'img/act-tour/gruz.jpeg', 'rgba(119, 104, 138, 1)', '2026-09-07', '2026-09-13'),
(11, 'Тур: «Дыхание Казахстана: Алматинские горы и легенды Великой Степи»', '4 октября - 11 октября 2026г', 'page_tour/kazah.php', 'img/act-tour/kazah.jpeg', 'rgba(110, 182, 116, 1)', '2026-10-04', '2026-10-11');

-- Если туры уже существуют и нужно обновить их (раскомментируйте и используйте вместо INSERT):
/*
INSERT INTO `tours` (`tour_id`, `tour_name`, `tour_date`, `tour_linkPage`, `tour_imgSrc`, `tour_color`, `tour_date_start`, `tour_date_end`) VALUES
(1, 'Торжок: Императорский шаг', '12 декабря - 14 декабря 2025г', 'page_tour/torzhok.php', 'img/act-tour/torzhok.jpg', '#7a5e3a', '2025-12-12', '2025-12-14'),
(2, 'Алтайская зимняя сказка', '2 января - 9 января 2026г', 'page_tour/altay.php', 'img/act-tour/altay.jpg', '#bd1e73', '2026-01-02', '2026-01-09'),
(3, 'Тур «Сибирская Масленица: Тобольск в ритме скандинавской ходьбы»', '19 февраля - 23 февраля 2026г', 'page_tour/masl.php', 'img/act-tour/masl.jpeg', '#1e48bdff', '2026-02-19', '2026-02-23'),
(4, 'Карелия. Паанаярви.', '7 марта - 11 марта 2026г', 'page_tour/pan.php', 'img/act-tour/pan.jpg', 'rgba(53, 109, 56, 1)', '2026-03-07', '2026-03-11'),
(5, 'Корея', '29 марта - 6 апреля 2026г', 'page_tour/koreya.php', 'img/act-tour/koreya.jpg', 'rgba(56, 126, 126, 1)', '2026-03-29', '2026-04-06'),
(6, 'Узбекистан', '3 мая - 10 мая 2026г', 'page_tour/uz.php', 'img/act-tour/uz.jpg', 'rgba(126, 120, 68, 1)', '2026-05-03', '2026-05-10'),
(7, 'Карелия. В КРАЮ КАЛЕВАЛЬСКИХ ПЕСЕН', '6 июня - 11 июня 2026г', 'page_tour/kalev.php', 'img/act-tour/kalev.jpg', 'rgba(126, 120, 68, 1)', '2026-06-06', '2026-06-11'),
(8, 'Тур «СЕВЕРНЫЙ ШАГ: Архангельск, Поморье и Каргополье»', '12 июля - 18 июля 2026г', 'page_tour/sever.php', 'img/act-tour/sever.png', 'rgb(139, 167, 221)', '2026-07-12', '2026-07-18'),
(9, 'Юг Киргизии', '6 августа - 15 августа 2026г', 'page_tour/kirg.php', 'img/act-tour/kirg.jpg', 'rgba(33, 13, 56, 1)', '2026-08-06', '2026-08-15'),
(10, 'Тур: «Грузия в бархатный сезон: вино, стиль и сезон ртвели»', '7 сентября - 13 сентября 2026г', 'page_tour/gruz.php', 'img/act-tour/gruz.jpeg', 'rgba(119, 104, 138, 1)', '2026-09-07', '2026-09-13'),
(11, 'Тур: «Дыхание Казахстана: Алматинские горы и легенды Великой Степи»', '4 октября - 11 октября 2026г', 'page_tour/kazah.php', 'img/act-tour/kazah.jpeg', 'rgba(110, 182, 116, 1)', '2026-10-04', '2026-10-11')
ON DUPLICATE KEY UPDATE
    `tour_name` = VALUES(`tour_name`),
    `tour_date` = VALUES(`tour_date`),
    `tour_linkPage` = VALUES(`tour_linkPage`),
    `tour_imgSrc` = VALUES(`tour_imgSrc`),
    `tour_color` = VALUES(`tour_color`),
    `tour_date_start` = VALUES(`tour_date_start`),
    `tour_date_end` = VALUES(`tour_date_end`);
*/

