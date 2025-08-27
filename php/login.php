<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/connect.php';

// Expect: POST user_email, user_pass
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Метод не поддерживается']);
    exit;
}

$email = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';
$pass = isset($_POST['user_pass']) ? trim($_POST['user_pass']) : '';

if ($email === '' || $pass === '') {
    echo json_encode(['success' => false, 'message' => 'Заполните email и пароль']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Некорректный email']);
    exit;
}

// users: user_id, user_name, user_email, user_pass
$stmt = $connect->prepare('SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo json_encode(['success' => false, 'message' => 'Неверный логин или пароль']);
    exit;
}

$hash = $user['user_pass'];
// Support both password_hash and legacy plain text (if any). Prefer hash.
$isValid = false;
if (strlen($hash) >= 20) {
    $isValid = password_verify($pass, $hash);
} else {
    $isValid = hash('sha256', $pass) === $hash || $pass === $hash;
}

if (!$isValid) {
    echo json_encode(['success' => false, 'message' => 'Неверный логин или пароль']);
    exit;
}

$_SESSION['user_id'] = (int)$user['user_id'];
$_SESSION['user_name'] = $user['user_name'];
$_SESSION['user_email'] = $user['user_email'];

echo json_encode(['success' => true, 'message' => 'Успешный вход', 'user' => [
    'id' => (int)$user['user_id'],
    'name' => $user['user_name'],
    'email' => $user['user_email']
]]);
?>


