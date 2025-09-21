<?php
session_start();
require_once '../phpLogin/connect.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo 'Не авторизован';
    exit;
}

$userId = (int)$_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['avatar'])) {
    http_response_code(400);
    echo 'Некорректный запрос';
    exit;
}

$file = $_FILES['avatar'];
if ($file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo 'Ошибка загрузки файла';
    exit;
}

// Validate size (max 5MB)
if ($file['size'] > 5 * 1024 * 1024) {
    http_response_code(400);
    echo 'Файл слишком большой (до 5MB)';
    exit;
}

// Validate mime
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file['tmp_name']);
$allowed = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp',
];
if (!isset($allowed[$mime])) {
    http_response_code(400);
    echo 'Недопустимый формат изображения';
    exit;
}

$ext = $allowed[$mime];
$uploadDir = __DIR__ . '/../uploads/avatars';
if (!is_dir($uploadDir)) {
    @mkdir($uploadDir, 0775, true);
}

// Remove old files with other extensions
$pattern = $uploadDir . '/' . $userId . '.*';
foreach (glob($pattern) as $old) {
    @unlink($old);
}

$target = $uploadDir . '/' . $userId . '.' . $ext;
if (!move_uploaded_file($file['tmp_name'], $target)) {
    http_response_code(500);
    echo 'Не удалось сохранить файл';
    exit;
}

// Optional: restrict permissions
@chmod($target, 0644);

// Update session hint path (optional)
$_SESSION['user_avatar'] = '/uploads/avatars/' . $userId . '.' . $ext;

header('Location: /lk/lk.php');
exit;
?>



