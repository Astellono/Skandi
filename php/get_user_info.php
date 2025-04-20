<?php
session_start();
header('Content-Type: application/json');
require_once '../phpLogin/connect.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован']);
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $connect->prepare('SELECT name, email FROM users WHERE id = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'name' => $user['name'], 'email' => $user['email']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Пользователь не найден']);
}
