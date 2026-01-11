<?php
/**
 * Скрипт для добавления новых полей в таблицу tours
 * Запускать один раз из браузера или через командную строку
 */

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации (только для админов)
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    die('Доступ запрещен. Необходимы права администратора.');
}

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    die('Ошибка подключения к базе данных');
}

$fields = [
    'tour_description' => "TEXT NULL COMMENT 'Подробное описание тура'",
    'tour_difficulty' => "VARCHAR(1) NULL COMMENT 'Сложность маршрута от 1 до 5'",
    'tour_group_size' => "VARCHAR(100) NULL COMMENT 'Размер группы (например: 6 – 10 человек)'",
    'tour_price_includes' => "TEXT NULL COMMENT 'Что входит в стоимость тура'",
    'tour_price_excludes' => "TEXT NULL COMMENT 'Что не входит в стоимость тура'",
    'tour_guides' => "TEXT NULL COMMENT 'Список сопровождающих в формате JSON'",
    'tour_program' => "TEXT NULL COMMENT 'Программа тура по дням в формате JSON'"
];

$added = [];
$errors = [];
$existing = [];

foreach ($fields as $fieldName => $fieldDefinition) {
    // Проверяем, существует ли поле
    $checkQuery = "SHOW COLUMNS FROM tours LIKE '$fieldName'";
    $result = $connect->query($checkQuery);
    
    if ($result && $result->num_rows > 0) {
        $existing[] = $fieldName;
        continue;
    }
    
    // Добавляем поле после tour_color или после предыдущего поля
    $afterField = 'tour_color';
    if ($fieldName === 'tour_description') {
        $afterField = 'tour_color';
    } elseif ($fieldName === 'tour_difficulty') {
        $afterField = 'tour_description';
    } elseif ($fieldName === 'tour_group_size') {
        $afterField = 'tour_difficulty';
    } elseif ($fieldName === 'tour_price_includes') {
        $afterField = 'tour_group_size';
    } elseif ($fieldName === 'tour_price_excludes') {
        $afterField = 'tour_price_includes';
    } elseif ($fieldName === 'tour_guides') {
        $afterField = 'tour_price_excludes';
    } elseif ($fieldName === 'tour_program') {
        $afterField = 'tour_guides';
    }
    
    $query = "ALTER TABLE tours ADD COLUMN `$fieldName` $fieldDefinition AFTER `$afterField`";
    
    if ($connect->query($query)) {
        $added[] = $fieldName;
    } else {
        $errors[] = "$fieldName: " . $connect->error;
    }
}

// Выводим результат
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Миграция базы данных - Добавление полей для туров</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: 0 auto; }
        .success { color: #28a745; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .info { color: #17a2b8; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        h1 { color: #333; }
        ul { line-height: 1.8; }
        a { color: #667eea; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Миграция базы данных</h1>
    <h2>Добавление полей для полного контента туров</h2>
    
    <?php if (!empty($added)): ?>
        <div class="success">
            <strong>Успешно добавлены поля:</strong>
            <ul>
                <?php foreach ($added as $field): ?>
                    <li><?php echo htmlspecialchars($field); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($existing)): ?>
        <div class="info">
            <strong>Уже существующие поля (пропущены):</strong>
            <ul>
                <?php foreach ($existing as $field): ?>
                    <li><?php echo htmlspecialchars($field); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($errors)): ?>
        <div class="error">
            <strong>Ошибки:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if (empty($added) && empty($errors)): ?>
        <div class="info">
            Все поля уже существуют в таблице. Миграция не требуется.
        </div>
    <?php endif; ?>
    
    <p><a href="/admin/admin.php">← Вернуться в админ-панель</a></p>
</body>
</html>






