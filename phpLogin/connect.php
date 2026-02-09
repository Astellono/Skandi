<?php
/**
 * Конфигурация подключения к базе данных Timeweb
 * Для подключения с локального сервера MAMP
 */

// Настройки подключения к базе данных Timeweb
// ВАЖНО: Замените эти значения на реальные данные из панели управления Timeweb

// Хост базы данных Timeweb
// Обычно это либо IP-адрес сервера, либо домен вида: mysql.timeweb.ru
// Или может быть: localhost (если БД на том же сервере) или внешний IP
$host = '185.114.245.201'; // или IP сервера Timeweb, например: '185.68.21.123'

// Порт базы данных (обычно 3306 для MySQL)
$port = 3306;

// Имя пользователя базы данных (из панели Timeweb)
$username = 'astellono_skandi'; // Замените на ваше имя пользователя БД

// Пароль базы данных (из панели Timeweb)
$password = '111'; // Замените на ваш пароль БД

// Название базы данных
$database = 'astellono_skandi'; // Замените на название вашей БД

// Создаем подключение
try {
    // Используем mysqli для подключения
    $connect = new mysqli($host, $username, $password, $database, $port);
    
    // Проверяем подключение
    if ($connect->connect_error) {
        // Логируем ошибку (не выводим напрямую для безопасности)
        error_log("Ошибка подключения к БД: " . $connect->connect_error);
        die("Ошибка подключения к базе данных. Проверьте настройки подключения.");
    }
    
    // Устанавливаем кодировку utf8mb4 для поддержки эмодзи и 4-байтовых символов
    $connect->set_charset("utf8mb4");
    $connect->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
    
    // Устанавливаем часовой пояс (Москва)
    $connect->query("SET time_zone = '+03:00'");
    
    // Устанавливаем режим SQL (для безопасности)
    $connect->query("SET sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO'");
    
} catch (Exception $e) {
    error_log("Исключение при подключении к БД: " . $e->getMessage());
    die("Ошибка подключения к базе данных.");
}

// Альтернативный вариант с PDO (раскомментируйте, если нужно использовать PDO)
/*
try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    error_log("Ошибка PDO подключения: " . $e->getMessage());
    die("Ошибка подключения к базе данных.");
}
*/

// echo "<!-- Подключение к БД успешно установлено -->";
?>
