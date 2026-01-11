<?php
/**
 * Скрипт для добавления начальных данных в таблицу lessons_schedule
 * Используйте этот скрипт, если таблица существует, но пуста
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
    <title>Добавление начальных данных расписания</title>
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
        .warning { color: orange; }
        pre { background: #f0f0f0; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Добавление начальных данных расписания</h1>
    
    <?php
    try {
        // Проверяем, существует ли таблица
        $checkTable = $connect->query("SHOW TABLES LIKE 'lessons_schedule'");
        
        if (!$checkTable || $checkTable->num_rows == 0) {
            echo '<p class="error">✗ Таблица lessons_schedule не существует.</p>';
            echo '<p><a href="/admin/migrations/create_lessons_schedule_table.php">Сначала создайте таблицу</a></p>';
        } else {
            echo '<p class="info">✓ Таблица lessons_schedule существует</p>';
            
            // Проверяем, есть ли уже данные
            $countResult = $connect->query("SELECT COUNT(*) as count FROM lessons_schedule");
            $count = 0;
            if ($countResult) {
                $row = $countResult->fetch_assoc();
                $count = (int)$row['count'];
            }
            
            if ($count > 0) {
                echo '<p class="warning">⚠ В таблице уже есть ' . $count . ' записей.</p>';
                echo '<p>Если вы хотите добавить данные повторно, сначала очистите таблицу или удалите существующие записи.</p>';
            } else {
                echo '<p class="info">Таблица пуста. Добавляем начальные данные...</p>';
                
                // Начальные данные из исходного расписания
                $initialData = [
                    ['Лужники', 'img/lesson/luzh.jpg', '-', '07:00', '-', '-', '-', '-', '-', 'mapLuzh', 'modal-luzh', 1],
                    ['Царицыно', 'img/lesson/king.jpg', '-', '-', '-', '19.30', '-', '-', '-', 'mapCar', 'modal-caricino', 2],
                    ['Бирюлевский дендропарк', 'img/lesson/ber.jpg', '-', '-', '-', '8.00', '-', '-', '-', 'mapBer', 'modal-ber', 3],
                    ['Парк Шкулева', 'img/lesson/shkul.jpg', '11:00', '-', '-', '9.00', '-', '-', '-', 'mapShkul', 'modal-shkul', 4],
                    ['Парк Кузьминки', 'img/lesson/kuz.jpg', '-', '-', '9.00', '-', '-', '-', '-', 'mapkuz', 'modal-Kuz', 5]
                ];
                
                $stmt = $connect->prepare("INSERT INTO lessons_schedule (park_name, park_image, monday, tuesday, wednesday, thursday, friday, saturday, sunday, map_link, modal_id, `order`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $inserted = 0;
                foreach ($initialData as $data) {
                    $stmt->bind_param('sssssssssssi', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]);
                    if ($stmt->execute()) {
                        $inserted++;
                    } else {
                        echo '<p class="error">Ошибка при добавлении: ' . htmlspecialchars($data[0]) . ' - ' . $stmt->error . '</p>';
                    }
                }
                
                $stmt->close();
                
                if ($inserted > 0) {
                    echo '<p class="success">✓ Успешно добавлено ' . $inserted . ' записей</p>';
                } else {
                    echo '<p class="error">✗ Не удалось добавить данные</p>';
                }
            }
        }
        
        echo '<hr>';
        echo '<h2>Статус:</h2>';
        echo '<p class="success"><strong>Операция завершена!</strong></p>';
        echo '<p><a href="/admin/lessons.php">← Перейти к управлению расписанием</a></p>';
        
    } catch (Exception $e) {
        echo '<p class="error">Ошибка: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    }
    ?>
</body>
</html>


