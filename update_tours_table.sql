-- Скрипт для обновления существующей таблицы tours
-- Добавляет новые поля: tour_color, tour_date_start, tour_date_end

-- Добавляем поле tour_color (выполните только если поле еще не существует)
-- Если поле уже существует, команда выдаст ошибку - это нормально, просто пропустите её
ALTER TABLE `tours` 
ADD COLUMN `tour_color` VARCHAR(50) DEFAULT NULL AFTER `tour_imgSrc`;

-- Добавляем поле tour_date_start
ALTER TABLE `tours` 
ADD COLUMN `tour_date_start` DATE DEFAULT NULL AFTER `tour_color`;

-- Добавляем поле tour_date_end
ALTER TABLE `tours` 
ADD COLUMN `tour_date_end` DATE DEFAULT NULL AFTER `tour_date_start`;

-- Пример обновления существующих записей (раскомментируйте и адаптируйте под ваши данные)
/*
UPDATE `tours` SET 
    `tour_color` = '#7a5e3a',
    `tour_date_start` = '2025-12-12',
    `tour_date_end` = '2025-12-14'
WHERE `tour_name` = 'Торжок: Императорский шаг';

UPDATE `tours` SET 
    `tour_color` = '#bd1e73',
    `tour_date_start` = '2026-01-02',
    `tour_date_end` = '2026-01-09'
WHERE `tour_name` = 'Алтайская зимняя сказка';

-- И так далее для остальных туров...
*/

