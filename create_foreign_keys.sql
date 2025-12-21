-- SQL для создания внешних ключей (Foreign Keys) между таблицами
-- Версия: 2025-12-20

-- ВАЖНО: В таблице excursion_signings поле excursion_id является PRIMARY KEY (ID записи регистрации).
-- Для создания связи с excursions.excursion_id нужно:
-- 1. Переименовать текущий excursion_id в signing_id
-- 2. Добавить новое поле excursion_id для связи с excursions

-- Шаг 1: Переименование PRIMARY KEY в signing_id
ALTER TABLE `excursion_signings`
  CHANGE COLUMN `excursion_id` `signing_id` INT(11) NOT NULL AUTO_INCREMENT;

-- Шаг 2: Добавление нового поля excursion_id для связи с таблицей excursions
ALTER TABLE `excursion_signings`
  ADD COLUMN `excursion_id` INT(11) NULL DEFAULT NULL AFTER `signing_id`,
  ADD KEY `idx_excursion_id` (`excursion_id`);

-- Шаг 3: Связь excursion_signings.excursion_id -> excursions.excursion_id
ALTER TABLE `excursion_signings`
  ADD CONSTRAINT `fk_excursion_signings_excursion_id` 
  FOREIGN KEY (`excursion_id`) 
  REFERENCES `excursions` (`excursion_id`) 
  ON DELETE RESTRICT 
  ON UPDATE CASCADE;

-- 1. Связь excursion_signings.user_id -> users.user_id
ALTER TABLE `excursion_signings`
  ADD CONSTRAINT `fk_excursion_signings_user_id` 
  FOREIGN KEY (`user_id`) 
  REFERENCES `users` (`user_id`) 
  ON DELETE RESTRICT 
  ON UPDATE CASCADE;

-- 2. Связь signing.signing_user_id -> users.user_id
ALTER TABLE `signing`
  ADD CONSTRAINT `fk_signing_user_id` 
  FOREIGN KEY (`signing_user_id`) 
  REFERENCES `users` (`user_id`) 
  ON DELETE RESTRICT 
  ON UPDATE CASCADE;

-- 3. Связь signing.signing_tour_id -> tours.tour_id
ALTER TABLE `signing`
  ADD CONSTRAINT `fk_signing_tour_id` 
  FOREIGN KEY (`signing_tour_id`) 
  REFERENCES `tours` (`tour_id`) 
  ON DELETE RESTRICT 
  ON UPDATE CASCADE;

-- 4. Связь tour_requests.user_id -> users.user_id
ALTER TABLE `tour_requests`
  ADD CONSTRAINT `fk_tour_requests_user_id` 
  FOREIGN KEY (`user_id`) 
  REFERENCES `users` (`user_id`) 
  ON DELETE RESTRICT 
  ON UPDATE CASCADE;

