<?php
session_start();
require 'connect.php'; 
header('Content-Type: application/json');

// Debug информации
error_log("Текущая директория: " . __DIR__);
error_log("Содержимое FILES: " . print_r($_FILES, true));

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Требуется авторизация']);
    exit;
}

try {
    $user_id = $_SESSION['user_id'];
    $upload_dir = __DIR__ . '/../../uploads/avatars/'; // Путь относительно php-скрипта
    
    error_log("Целевая директория: $upload_dir");

    // // Создаем директорию если не существует
    // if (!file_exists($upload_dir)) {
    //     mkdir($upload_dir, 0755, true);
    // }

    // Проверяем загруженный файл
    if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Ошибка загрузки файла');
    }

    $file = $_FILES['avatar'];
    
    // Проверка типа файла
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    
    if (!in_array($mime, $allowed_types)) {
        throw new Exception('Недопустимый тип файла');
    }

    // Генерация уникального имени
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = "avatar_{$user_id}_" . bin2hex(random_bytes(8)) . ".$extension";
    $target_path = $upload_dir . $filename;

    // Перемещение файла
    if (!move_uploaded_file($file['tmp_name'], $target_path)) {
        throw new Exception('Ошибка сохранения файла');
    }

    // Обновление БД
    $relative_path = '/uploads/avatars/' . $filename; // Путь для браузера
    $stmt = $connect->prepare("UPDATE users SET avatar_path = ? WHERE id = ?");
    $stmt->bind_param("si", $relative_path, $user_id);
    
    if (!$stmt->execute()) {
        throw new Exception('Ошибка базы данных: ' . $stmt->error);
    }

    echo json_encode([
        'success' => true,
        'avatarPath' => $relative_path
    ]);

} catch (Exception $e) {
    error_log("Ошибка: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>