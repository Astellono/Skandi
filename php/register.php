<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/connect.php';

// Expect: POST user_name, user_email, user_pass
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Метод не поддерживается']);
    exit;
}

$name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
$email = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';
$pass = isset($_POST['user_pass']) ? trim($_POST['user_pass']) : '';

if ($name === '' || $email === '' || $pass === '') {
    echo json_encode(['success' => false, 'message' => 'Заполните все поля']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Некорректный email']);
    exit;
}

if (strlen($pass) < 6) {
    echo json_encode(['success' => false, 'message' => 'Пароль должен быть не менее 6 символов']);
    exit;
}

// Check existence
$stmt = $connect->prepare('SELECT user_id FROM users WHERE user_email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
if ($res->fetch_assoc()) {
    echo json_encode(['success' => false, 'message' => 'Пользователь с таким email уже зарегистрирован']);
    exit;
}

$hash = password_hash($pass, PASSWORD_DEFAULT);

$stmtIns = $connect->prepare('INSERT INTO users (user_name, user_email, user_pass) VALUES (?, ?, ?)');
$stmtIns->bind_param('sss', $name, $email, $hash);
if ($stmtIns->execute()) {
    $newId = $stmtIns->insert_id;
    $_SESSION['user_id'] = (int)$newId;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    echo json_encode(['success' => true, 'message' => 'Регистрация успешна', 'user' => [
        'id' => (int)$newId,
        'name' => $name,
        'email' => $email
    ]]);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка регистрации']);
}
?>


