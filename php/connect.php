<?php
// ПРИМЕР настройки подключения к базе данных для хостинга TimeWeb
// Скопируйте этот файл как connect.php и замените данные на реальные

// Настройки для хостинга TimeWeb
$host = 'localhost'; // обычно localhost на TimeWeb
$username = 'root'; // имя пользователя БД от TimeWeb
$password = '123137'; // пароль от БД от TimeWeb
$database = 'astellono_skandi'; // название вашей БД

// Создаем подключение
$connect = new mysqli($host, $username, $password, $database);








?>
