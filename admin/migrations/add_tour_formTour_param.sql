-- Добавление поля tour_formTour_param для хранения параметра функции formTour()
ALTER TABLE tours ADD COLUMN IF NOT EXISTS tour_formTour_param VARCHAR(255) NULL DEFAULT NULL COMMENT 'Параметр для функции formTour(). Если не указан, используется название тура';


