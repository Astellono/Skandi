<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Отключаем вывод ошибок
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/tour_helpers.php';

// Проверка авторизации администратора
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Не авторизован']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
    exit;
}

// Проверяем наличие файла
if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Файл не загружен или произошла ошибка']);
    exit;
}

$file = $_FILES['image'];
$type = isset($_POST['type']) ? $_POST['type'] : (isset($_POST['upload_type']) && $_POST['upload_type'] === 'guide_photo' ? 'guide' : 'tour'); // 'tour', 'excursion' или 'guide'
$tour_name = isset($_POST['tour_name']) ? trim($_POST['tour_name']) : (isset($_POST['excursion_name']) ? trim($_POST['excursion_name']) : ''); // Название тура/экскурсии для генерации имени файла

// Проверка размера (максимум 10MB)
if ($file['size'] > 10 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Файл слишком большой (максимум 10MB)']);
    exit;
}

// Проверка типа файла
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file['tmp_name']);
$allowed = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp',
    'image/gif' => 'gif',
];

if (!isset($allowed[$mime])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Недопустимый формат изображения. Допустимы: JPG, PNG, WEBP, GIF']);
    exit;
}

$ext = $allowed[$mime];

// Определяем директорию для сохранения
if ($type === 'guide') {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/partner';
    $urlPath = '/img/partner';
} elseif ($type === 'excursion') {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/excursion';
    $urlPath = '/img/excursion';
} else {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/act-tour';
    $urlPath = '/img/act-tour';
}

// Создаем директорию, если её нет
if (!is_dir($uploadDir)) {
    @mkdir($uploadDir, 0755, true);
}

// Генерируем уникальное имя файла
if (($type === 'tour' || $type === 'excursion') && !empty($tour_name) && function_exists('generateTourFileName')) {
    // Для туров и экскурсий используем транслит названия (без расширения .php)
    $baseName = basename(generateTourFileName($tour_name), '.php');
    $fileName = $baseName . '.' . $ext;
} else {
    // Для гидов и остальных случаев используем оригинальное имя файла
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    // Транслитерация и очистка имени файла
    $cleanName = preg_replace('/[^a-z0-9_\-]/i', '_', $originalName);
    $cleanName = preg_replace('/_+/', '_', $cleanName);
    $cleanName = trim($cleanName, '_');

    // Если имя пустое, используем временную метку
    if (empty($cleanName)) {
        $cleanName = 'img_' . time();
    }

    // Добавляем временную метку для уникальности, чтобы избежать перезаписи
    $fileName = $cleanName . '_' . time() . '.' . $ext;
}

$target = $uploadDir . '/' . $fileName;

// Если файл с таким именем существует, добавляем дополнительный суффикс
$counter = 1;
$baseFileName = pathinfo($fileName, PATHINFO_FILENAME);
$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
while (file_exists($target)) {
    $fileName = $baseFileName . '_' . $counter . '.' . $fileExt;
    $target = $uploadDir . '/' . $fileName;
    $counter++;
}

// Перемещаем загруженный файл
if (!move_uploaded_file($file['tmp_name'], $target)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Не удалось сохранить файл']);
    exit;
}

// Устанавливаем права доступа
@chmod($target, 0644);

// Возвращаем путь к файлу (относительный путь от корня сайта)
$relativePath = $urlPath . '/' . $fileName;

echo json_encode([
    'success' => true,
    'message' => 'Изображение успешно загружено',
    'path' => $relativePath,
    'fileName' => $fileName
]);
?>

