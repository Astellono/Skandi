<?php
/**
 * Миграция: Добавление полей address, latitude, longitude в таблицу lessons_schedule
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
    <title>Миграция: Добавление полей адреса</title>
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
    <h1>Миграция: Добавление полей адреса</h1>
    
    <?php
    try {
        // Проверяем, существует ли таблица
        $checkTable = $connect->query("SHOW TABLES LIKE 'lessons_schedule'");
        
        if (!$checkTable || $checkTable->num_rows == 0) {
            echo '<p class="error">✗ Таблица lessons_schedule не существует.</p>';
            echo '<p><a href="/admin/migrations/create_lessons_schedule_table.php">Сначала создайте таблицу</a></p>';
        } else {
            echo '<p class="info">✓ Таблица lessons_schedule существует</p>';
            
            // Проверяем, существует ли поле address
            $checkAddress = $connect->query("SHOW COLUMNS FROM lessons_schedule LIKE 'address'");
            if ($checkAddress && $checkAddress->num_rows > 0) {
                echo '<p class="info">✓ Поле address уже существует</p>';
            } else {
                $addAddress = "ALTER TABLE lessons_schedule ADD COLUMN address VARCHAR(500) NULL DEFAULT NULL COMMENT 'Адрес точки сбора' AFTER park_image";
                if ($connect->query($addAddress)) {
                    echo '<p class="success">✓ Поле address добавлено</p>';
                } else {
                    throw new Exception('Ошибка при добавлении поля address: ' . $connect->error);
                }
            }
            
            // Проверяем, существует ли поле latitude
            $checkLat = $connect->query("SHOW COLUMNS FROM lessons_schedule LIKE 'latitude'");
            if ($checkLat && $checkLat->num_rows > 0) {
                echo '<p class="info">✓ Поле latitude уже существует</p>';
            } else {
                $addLat = "ALTER TABLE lessons_schedule ADD COLUMN latitude DECIMAL(10, 8) NULL DEFAULT NULL COMMENT 'Широта' AFTER address";
                if ($connect->query($addLat)) {
                    echo '<p class="success">✓ Поле latitude добавлено</p>';
                } else {
                    throw new Exception('Ошибка при добавлении поля latitude: ' . $connect->error);
                }
            }
            
            // Проверяем, существует ли поле longitude
            $checkLng = $connect->query("SHOW COLUMNS FROM lessons_schedule LIKE 'longitude'");
            if ($checkLng && $checkLng->num_rows > 0) {
                echo '<p class="info">✓ Поле longitude уже существует</p>';
            } else {
                $addLng = "ALTER TABLE lessons_schedule ADD COLUMN longitude DECIMAL(11, 8) NULL DEFAULT NULL COMMENT 'Долгота' AFTER latitude";
                if ($connect->query($addLng)) {
                    echo '<p class="success">✓ Поле longitude добавлено</p>';
                } else {
                    throw new Exception('Ошибка при добавлении поля longitude: ' . $connect->error);
                }
            }
            
            // Заполняем координаты для существующих записей на основе map_link
            echo '<hr>';
            echo '<h2>Заполнение координат для существующих занятий:</h2>';
            
            // Массив соответствий map_link -> координаты и адреса
            $coordinatesData = [
                'mapLuzh' => [
                    'address' => 'Москва, Лужники, метро Воробьевы горы, выход 3',
                    'latitude' => 55.616092,
                    'longitude' => 37.674804
                ],
                'mapCar' => [
                    'address' => 'Москва, Царицыно, метро Царицыно',
                    'latitude' => 55.667296,
                    'longitude' => 37.533005
                ],
                'mapBer' => [
                    'address' => 'Москва, Бирюлевский дендропарк',
                    'latitude' => 55.592555,
                    'longitude' => 37.673502
                ],
                'mapShkul' => [
                    'address' => 'Москва, Парк Шкулева',
                    'latitude' => 55.690477,
                    'longitude' => 37.753919
                ],
                'mapkuz' => [
                    'address' => 'Москва, Парк Кузьминки',
                    'latitude' => 55.700602,
                    'longitude' => 37.764278
                ]
            ];
            
            $updated = 0;
            foreach ($coordinatesData as $mapLink => $data) {
                // Обновляем только если координаты еще не заполнены
                $stmt = $connect->prepare("UPDATE lessons_schedule SET address = ?, latitude = ?, longitude = ? WHERE map_link = ? AND (latitude IS NULL OR longitude IS NULL)");
                $stmt->bind_param('sdds', $data['address'], $data['latitude'], $data['longitude'], $mapLink);
                
                if ($stmt->execute()) {
                    $affected = $stmt->affected_rows;
                    if ($affected > 0) {
                        echo '<p class="success">✓ Обновлено занятие с map_link = ' . htmlspecialchars($mapLink) . ' (' . $affected . ' записей)</p>';
                        $updated += $affected;
                    }
                } else {
                    echo '<p class="error">✗ Ошибка при обновлении ' . htmlspecialchars($mapLink) . ': ' . $stmt->error . '</p>';
                }
                $stmt->close();
            }
            
            if ($updated > 0) {
                echo '<p class="success"><strong>Всего обновлено записей: ' . $updated . '</strong></p>';
            } else {
                echo '<p class="info">Все координаты уже заполнены или записи не найдены</p>';
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

