<?php
session_start();
header('Content-Type: application/json');
require_once 'connect.php';

// $data = json_decode(file_get_contents('php://input'), true);
// $name = htmlspecialchars(trim($data['name'] ?? ''));
// $email = filter_var(trim($data['email'] ?? ''), FILTER_VALIDATE_EMAIL);
// $password = $data['password'] ?? '';

$name = isset($_POST['name']);
$email = isset($_POST['email']);
$password = isset($_POST['password']);

if (!$name || !$email || !$password) {
    echo json_encode(['success' => false, 'message' => 'Все поля обязательны']);
    exit;
}

$stmt = $connect->prepare('SELECT id FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Email уже зарегистрирован']);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $connect->prepare('INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $name, $email, $hash);
$stmt->execute();

echo json_encode(['success' => true]);

