-- SQL запрос для добавления исходного расписания занятий
-- Используйте этот файл для восстановления исходного расписания из lesson.php

-- Очистка таблицы (опционально, раскомментируйте если нужно)
-- TRUNCATE TABLE lessons_schedule;

-- Вставка исходного расписания занятий
INSERT INTO `lessons_schedule` 
    (`park_name`, `park_image`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `map_link`, `modal_id`, `order`) 
VALUES
    -- Лужники: ВТ 07:00
    ('Лужники', 'img/lesson/luzh.jpg', '-', '07:00', '-', '-', '-', '-', '-', 'mapLuzh', 'modal-luzh', 1),
    
    -- Царицыно: ЧТ 19.30
    ('Царицыно', 'img/lesson/king.jpg', '-', '-', '-', '19.30', '-', '-', '-', 'mapCar', 'modal-caricino', 2),
    
    -- Бирюлевский дендропарк: ЧТ 8.00
    ('Бирюлевский дендропарк', 'img/lesson/ber.jpg', '-', '-', '-', '8.00', '-', '-', '-', 'mapBer', 'modal-ber', 3),
    
    -- Парк Шкулева: ПН 11:00, ЧТ 9.00
    ('Парк Шкулева', 'img/lesson/shkul.jpg', '11:00', '-', '-', '9.00', '-', '-', '-', 'mapShkul', 'modal-shkul', 4),
    
    -- Парк Кузьминки: СР 9.00
    ('Парк Кузьминки', 'img/lesson/kuz.jpg', '-', '-', '9.00', '-', '-', '-', '-', 'mapkuz', 'modal-Kuz', 5);

-- Проверка вставленных данных
-- SELECT * FROM lessons_schedule ORDER BY `order` ASC;



