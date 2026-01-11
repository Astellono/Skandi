<?php
/**
 * Миграция: Добавление поля tour_formTour_param в таблицу tours
 * Это поле используется для хранения параметра функции formTour()
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
    <title>Миграция: Добавление поля tour_formTour_param</title>
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
    <h1>Миграция: Добавление поля tour_formTour_param</h1>
    
    <?php
    try {
        // Проверяем, существует ли поле
        $checkQuery = "SHOW COLUMNS FROM tours LIKE 'tour_formTour_param'";
        $result = $connect->query($checkQuery);
        
        if ($result && $result->num_rows > 0) {
            echo '<p class="info">✓ Поле tour_formTour_param уже существует в таблице tours</p>';
        } else {
            // Добавляем поле
            $alterQuery = "ALTER TABLE tours ADD COLUMN tour_formTour_param VARCHAR(255) NULL DEFAULT NULL COMMENT 'Параметр для функции formTour(). Если не указан, используется название тура'";
            
            if ($connect->query($alterQuery)) {
                echo '<p class="success">✓ Поле tour_formTour_param успешно добавлено в таблицу tours</p>';
            } else {
                throw new Exception('Ошибка при добавлении поля: ' . $connect->error);
            }
        }
        
        echo '<hr>';
        echo '<h2>Статус миграции:</h2>';
        echo '<p class="success"><strong>Миграция завершена успешно!</strong></p>';
        echo '<p><a href="/admin/admin.php">← Вернуться в админ-панель</a></p>';
        
    } catch (Exception $e) {
        echo '<p class="error">Ошибка: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    }
    ?>
</body>
</html>






