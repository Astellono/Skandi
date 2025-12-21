-- SQL для отмены изменений в таблице excursion_signings
-- Откатывает переименование и добавление поля excursion_id

-- Шаг 1: Удаление внешнего ключа fk_excursion_signings_excursion_id (если был создан)
ALTER TABLE `excursion_signings`
  DROP FOREIGN KEY IF EXISTS `fk_excursion_signings_excursion_id`;

-- Шаг 2: Удаление индекса для excursion_id (если был создан)
ALTER TABLE `excursion_signings`
  DROP INDEX IF EXISTS `idx_excursion_id`;

-- Шаг 3: Удаление поля excursion_id (если было добавлено)
ALTER TABLE `excursion_signings`
  DROP COLUMN IF EXISTS `excursion_id`;

-- Шаг 4: Переименование signing_id обратно в excursion_id (если было переименовано)
ALTER TABLE `excursion_signings`
  CHANGE COLUMN `signing_id` `excursion_id` INT(11) NOT NULL AUTO_INCREMENT;



