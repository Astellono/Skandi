<?php
session_start();
require_once 'connect.php';
header('Content-Type: application/json');

// Проверяем, что файл был отправлен
if (!isset($_FILES['image'])) {
    echo json_encode(['success' => false, 'error' => 'Файл не загружен.']);
    exit;
}

$file = $_FILES['image'];

// Проверка на ошибки загрузки
if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'error' => 'Ошибка загрузки: ' . $file['error']]);
    exit;
}

// Проверка типа файла (MIME)
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
if (!in_array($file['type'], $allowedTypes)) {
    echo json_encode(['success' => false, 'error' => 'Только JPG, PNG или GIF!']);
    exit;
}

// Проверка размера (уже есть в JS, но на сервере — дополнительная защита)
$maxSize = 5 * 1024 * 1024; // 5 МБ
if ($file['size'] > $maxSize) {
    echo json_encode(['success' => false, 'error' => 'Файл слишком большой (макс. 5 МБ)']);
    exit;
}

// Создаем папку uploads, если её нет
$uploadDir = '../../uploads/avatars/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Генерируем уникальное имя файла
$fileName = uniqid() . '_' . basename($file['name']);
$uploadPath = $uploadDir . $fileName;

// Перемещаем файл из временной директории
if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
    echo json_encode([
        'success' => true,
        'path' => $uploadPath,
        'url' => 'http://ваш-сайт/' . $uploadPath // Опционально: полный URL к файлу
    ]);
    
} else {
    echo json_encode(['success' => false, 'error' => 'Ошибка сохранения файла.']);
}

$user_id = $_SESSION['user_id'];
$sql = "UPDATE `users` SET `avatar_path` = '$uploadPath' WHERE id = '$user_id'";
$connect->query($sql);
    
    


?>