<?php
/**
 * Миграция: Создание таблицы excursions для управления экскурсиями
 */

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    die('Доступ запрещен');
}

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Миграция: Создание таблицы excursions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        pre { background: #f0f0f0; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Миграция: Создание таблицы excursions</h1>
    
    <?php
    try {
        // Проверяем, существует ли таблица
        $checkTable = $connect->query("SHOW TABLES LIKE 'excursions'");
        
        if ($checkTable && $checkTable->num_rows > 0) {
            echo '<p class="info">✓ Таблица excursions уже существует</p>';
        } else {
            // Создаем таблицу
            $createTable = "CREATE TABLE IF NOT EXISTS `excursions` (
                `excursion_id` INT(11) NOT NULL AUTO_INCREMENT,
                `excursion_name` VARCHAR(255) NOT NULL COMMENT 'Название экскурсии',
                `excursion_date` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Дата экскурсии (текстовый формат)',
                `excursion_time` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время начала (например: 09:30)',
                `excursion_description` TEXT NULL DEFAULT NULL COMMENT 'Краткое описание',
                `excursion_details` TEXT NULL DEFAULT NULL COMMENT 'Подробное описание/программа',
                `excursion_price` TEXT NULL DEFAULT NULL COMMENT 'Стоимость (может быть разной по датам)',
                `excursion_price_included` TEXT NULL DEFAULT NULL COMMENT 'Что входит в стоимость',
                `excursion_price_additional` TEXT NULL DEFAULT NULL COMMENT 'Что оплачивается дополнительно',
                `excursion_imgSrc` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Путь к изображению',
                `excursion_link_id` VARCHAR(100) NULL DEFAULT NULL COMMENT 'ID для связи с формой записи',
                `excursion_formTour_param` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Параметр для функции formTour()',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (`excursion_id`),
                KEY `excursion_date` (`excursion_date`),
                KEY `excursion_link_id` (`excursion_link_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица экскурсий'";
            
            if ($connect->query($createTable)) {
                echo '<p class="success">✓ Таблица excursions успешно создана</p>';
            } else {
                throw new Exception('Ошибка при создании таблицы: ' . $connect->error);
            }
        }
        
        echo '<hr>';
        echo '<h2>Статус миграции:</h2>';
        echo '<p class="success"><strong>Миграция завершена успешно!</strong></p>';
        echo '<p><a href="/admin/excursions.php">← Перейти к управлению экскурсиями</a></p>';
        
    } catch (Exception $e) {
        echo '<p class="error">Ошибка: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    }
    ?>
</body>
</html>

