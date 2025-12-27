<?php
/**
 * Миграция: Изменение типа поля excursion_date с DATE на VARCHAR
 * Это необходимо, так как дата хранится в текстовом формате (например: "6 декабря 2025г")
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
    <title>Миграция: Изменение типа поля excursion_date</title>
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
    </style>
</head>
<body>
    <h1>Миграция: Изменение типа поля excursion_date</h1>
    <?php
    if (!($connect instanceof mysqli)) {
        die('<p class="error">Ошибка подключения к базе данных.</p>');
    }

    try {
        // Проверяем, существует ли таблица
        $checkTable = $connect->query("SHOW TABLES LIKE 'excursions'");
        if (!$checkTable || $checkTable->num_rows === 0) {
            echo '<p class="error">Таблица excursions не существует. Сначала создайте таблицу.</p>';
            echo '<p><a href="/admin/migrations/create_excursions_table.php">Создать таблицу</a></p>';
        } else {
            // Проверяем текущий тип поля
            $checkColumn = $connect->query("SHOW COLUMNS FROM excursions LIKE 'excursion_date'");
            if ($checkColumn && $checkColumn->num_rows > 0) {
                $columnInfo = $checkColumn->fetch_assoc();
                $currentType = strtoupper($columnInfo['Type']);
                
                if (strpos($currentType, 'DATE') !== false) {
                    // Изменяем тип поля на VARCHAR(255)
                    $alterQuery = "ALTER TABLE excursions MODIFY COLUMN excursion_date VARCHAR(255) NULL DEFAULT NULL COMMENT 'Дата экскурсии (текстовый формат)'";
                    
                    if ($connect->query($alterQuery)) {
                        echo '<p class="success">✓ Поле excursion_date успешно изменено с DATE на VARCHAR(255).</p>';
                    } else {
                        throw new Exception('Ошибка при изменении типа поля: ' . $connect->error);
                    }
                } else {
                    echo '<p class="info">Поле excursion_date уже имеет тип ' . htmlspecialchars($currentType) . '. Изменение не требуется.</p>';
                }
            } else {
                echo '<p class="error">Поле excursion_date не найдено в таблице excursions.</p>';
            }
        }
        
        echo '<hr>';
        echo '<p><a href="/admin/excursions.php">← Вернуться к управлению экскурсиями</a></p>';
        
    } catch (Exception $e) {
        echo '<p class="error">Ошибка: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
    
    $connect->close();
    ?>
</body>
</html>





