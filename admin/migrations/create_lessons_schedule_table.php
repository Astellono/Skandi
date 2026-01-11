<?php
/**
 * Миграция: Создание таблицы lessons_schedule для управления расписанием занятий
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
    <title>Миграция: Создание таблицы lessons_schedule</title>
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
    <h1>Миграция: Создание таблицы lessons_schedule</h1>
    
    <?php
    try {
        // Проверяем, существует ли таблица
        $checkTable = $connect->query("SHOW TABLES LIKE 'lessons_schedule'");
        
        if ($checkTable && $checkTable->num_rows > 0) {
            echo '<p class="info">✓ Таблица lessons_schedule уже существует</p>';
        } else {
            // Создаем таблицу
            $createTable = "CREATE TABLE IF NOT EXISTS `lessons_schedule` (
                `lesson_id` INT(11) NOT NULL AUTO_INCREMENT,
                `park_name` VARCHAR(255) NOT NULL COMMENT 'Название парка',
                `park_image` VARCHAR(500) NULL DEFAULT NULL COMMENT 'Путь к изображению парка',
                `monday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия в понедельник (например: 07:00 или -)',
                `tuesday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия во вторник',
                `wednesday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия в среду',
                `thursday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия в четверг',
                `friday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия в пятницу',
                `saturday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия в субботу',
                `sunday` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Время занятия в воскресенье',
                `map_link` VARCHAR(100) NULL DEFAULT NULL COMMENT 'ID ссылки на карту (например: mapLuzh)',
                `modal_id` VARCHAR(100) NULL DEFAULT NULL COMMENT 'ID модального окна для записи (например: modal-luzh)',
                `order` INT(11) DEFAULT 0 COMMENT 'Порядок отображения',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (`lesson_id`),
                KEY `order` (`order`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица расписания занятий'";
            
            if ($connect->query($createTable)) {
                echo '<p class="success">✓ Таблица lessons_schedule успешно создана</p>';
                
                // Добавляем начальные данные из текущего расписания
                $initialData = [
                    ['Лужники', 'img/lesson/luzh.jpg', '-', '07:00', '-', '-', '-', '-', '-', 'mapLuzh', 'modal-luzh', 1],
                    ['Царицыно', 'img/lesson/king.jpg', '-', '-', '-', '19:30', '-', '-', '-', 'mapCar', 'modal-caricino', 2],
                    ['Бирюлевский дендропарк', 'img/lesson/ber.jpg', '-', '-', '-', '8:00', '-', '-', '-', 'mapBer', 'modal-ber', 3],
                    ['Парк Шкулева', 'img/lesson/shkul.jpg', '11:00', '-', '-', '9:00', '-', '-', '-', 'mapShkul', 'modal-shkul', 4],
                    ['Парк Кузьминки', 'img/lesson/kuz.jpg', '-', '-', '9:00', '-', '-', '-', '-', 'mapkuz', 'modal-Kuz', 5]
                ];
                
                $stmt = $connect->prepare("INSERT INTO lessons_schedule (park_name, park_image, monday, tuesday, wednesday, thursday, friday, saturday, sunday, map_link, modal_id, `order`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                foreach ($initialData as $data) {
                    $stmt->bind_param('sssssssssssi', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]);
                    $stmt->execute();
                }
                
                $stmt->close();
                echo '<p class="success">✓ Начальные данные добавлены</p>';
            } else {
                throw new Exception('Ошибка при создании таблицы: ' . $connect->error);
            }
        }
        
        echo '<hr>';
        echo '<h2>Статус миграции:</h2>';
        echo '<p class="success"><strong>Миграция завершена успешно!</strong></p>';
        echo '<p><a href="/admin/lessons.php">← Перейти к управлению расписанием</a></p>';
        
    } catch (Exception $e) {
        echo '<p class="error">Ошибка: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    }
    ?>
</body>
</html>


