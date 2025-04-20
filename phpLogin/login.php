
<?php
session_start();
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);


require_once 'connect.php';

$email = filter_var(trim($data['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$password = $data['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(['success' => false, 'message' => 'Все поля обязательны']);
    exit;
}

$stmt = $connect->prepare('SELECT id, name, password_hash FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password_hash'])) {
        echo json_encode(['success' => true, 'name' => htmlspecialchars($user['name'])]);
        $_SESSION['user_id'] = $user['id'];
    } else {
        echo json_encode(['success' => false, 'message' => 'Неверный пароль']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Пользователь не найден']);
}
?>