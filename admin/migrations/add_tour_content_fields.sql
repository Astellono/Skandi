-- Добавление полей для полного контента тура
-- Этот скрипт безопасно добавляет новые поля, если их еще нет в таблице tours

-- Описание тура
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_description` TEXT NULL COMMENT 'Подробное описание тура' AFTER `tour_color`;

-- Сложность маршрута (1-5)
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_difficulty` VARCHAR(1) NULL COMMENT 'Сложность маршрута от 1 до 5' AFTER `tour_description`;

-- Размер группы
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_group_size` VARCHAR(100) NULL COMMENT 'Размер группы (например: 6 – 10 человек)' AFTER `tour_difficulty`;

-- Что входит в стоимость
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_price_includes` TEXT NULL COMMENT 'Что входит в стоимость тура' AFTER `tour_group_size`;

-- Что не входит в стоимость
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_price_excludes` TEXT NULL COMMENT 'Что не входит в стоимость тура' AFTER `tour_price_includes`;

-- Сопровождающие (JSON)
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_guides` TEXT NULL COMMENT 'Список сопровождающих в формате JSON' AFTER `tour_price_excludes`;

-- Программа по дням (JSON)
ALTER TABLE `tours` 
ADD COLUMN IF NOT EXISTS `tour_program` TEXT NULL COMMENT 'Программа тура по дням в формате JSON' AFTER `tour_guides`;


