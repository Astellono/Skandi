<?php
// ПРИМЕР настройки подключения к базе данных для хостинга TimeWeb
// Скопируйте этот файл как connect.php и замените данные на реальные

// Настройки для хостинга TimeWeb
$host = 'MySQL-8.0'; // обычно localhost на TimeWeb
$username = 'root'; // имя пользователя БД от TimeWeb
$password = ''; // пароль от БД от TimeWeb
$database = 'skandi'; // название вашей БД

// Создаем подключение
$connect = new mysqli($host, $username, $password, $database);

// Проверяем подключение
if (!$connect) {
    // Логируем ошибку
    error_log("Ошибка подключения к БД: " . mysqli_connect_error());
    
  
}

// Устанавливаем кодировку
$connect->set_charset("utf8");

// Устанавливаем часовой пояс (опционально)
$connect->query("SET time_zone = '+03:00'");


// Устанавливаем режим SQL (опционально, для безопасности)
$connect->query("SET sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO'");

// echo "<!-- Подключение к БД успешно установлено -->";
?>
