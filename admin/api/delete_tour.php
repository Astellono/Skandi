<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
if (!isset($_SESSION['user_id']) || ($_SESSION['user_id']!=7)) {
    header('Location: /');
    exit;
}
// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Не авторизован']);
    exit;
}

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
    exit;
}

// Получаем данные из JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['tour_id']) || empty($data['tour_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID тура не указан']);
    exit;
}

$tour_id = (int)$data['tour_id'];

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных']);
    exit;
}

try {
    // Проверяем, существует ли тур
    $checkStmt = $connect->prepare("SELECT tour_id FROM tours WHERE tour_id = ?");
    $checkStmt->bind_param('i', $tour_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Тур не найден']);
        $checkStmt->close();
        exit;
    }
    $checkStmt->close();
    
    // Удаляем тур
    $stmt = $connect->prepare("DELETE FROM tours WHERE tour_id = ?");
    $stmt->bind_param('i', $tour_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Тур успешно удален']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка при удалении: ' . $stmt->error]);
    }
    
    $stmt->close();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка: ' . $e->getMessage()]);
}

$connect->close();
?>

