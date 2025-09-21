<?php
// Подключение модального окна авторизации и скрипта login.js
// Этот файл должен подключаться на всех страницах, где есть headerPHP.php

// Определяем относительный путь к корню сайта
$currentDir = dirname($_SERVER['SCRIPT_NAME']);
$rootPath = '';

// Если мы в подпапке page_tour, нужно подняться на уровень выше
if (strpos($currentDir, '/page_tour') !== false) {
    $rootPath = '../';
}

// Подключаем модальное окно авторизации
if (file_exists(__DIR__ . '/../modal/auth.html')) {
    include __DIR__ . '/../modal/auth.html';
} else {
    // Fallback если файл не найден
    echo '<!-- Модальное окно авторизации не найдено -->';
}
?>


