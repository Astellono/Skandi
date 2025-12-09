<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Доступ только администраторам (id 7 или 10)
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

// Проверка метода
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
    exit;
}

// Читаем JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['user_id']) || empty($data['user_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID пользователя не указан']);
    exit;
}

$user_id = (int) $data['user_id'];

// Не позволяем удалить администраторов
if (in_array($user_id, [7, 10], true)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Нельзя удалить администратора']);
    exit;
}

// Проверяем, что пользователь существует
$checkStmt = $connect->prepare("SELECT user_id FROM users WHERE user_id = ? LIMIT 1");
$checkStmt->bind_param('i', $user_id);
$checkStmt->execute();
$checkRes = $checkStmt->get_result();
if ($checkRes->num_rows === 0) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Пользователь не найден']);
    $checkStmt->close();
    exit;
}
$checkStmt->close();

// Удаляем пользователя
$delStmt = $connect->prepare("DELETE FROM users WHERE user_id = ?");
$delStmt->bind_param('i', $user_id);

if ($delStmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка при удалении: ' . $delStmt->error]);
}

$delStmt->close();
$connect->close();

