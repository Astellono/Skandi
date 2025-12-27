<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Доступ запрещен']);
    exit;
}

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
    exit;
}

// Получаем данные из тела запроса
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Ошибка парсинга JSON']);
    exit;
}

$lesson_id = isset($data['lesson_id']) ? (int)$data['lesson_id'] : null;

if (!$lesson_id) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Не указан ID занятия']);
    exit;
}

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных']);
    exit;
}

$stmt = null;
$checkStmt = null;
try {
    // Проверяем, существует ли занятие перед удалением
    $checkStmt = $connect->prepare("SELECT lesson_id FROM lessons_schedule WHERE lesson_id = ?");
    if (!$checkStmt) {
        throw new Exception('Ошибка подготовки запроса проверки: ' . $connect->error);
    }
    $checkStmt->bind_param('i', $lesson_id);
    
    if (!$checkStmt->execute()) {
        throw new Exception('Ошибка выполнения запроса проверки: ' . $checkStmt->error);
    }
    
    $result = $checkStmt->get_result();
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Занятие не найдено']);
        exit;
    }
    $checkStmt->close();
    $checkStmt = null;
    
    // Удаляем занятие
    $stmt = $connect->prepare("DELETE FROM lessons_schedule WHERE lesson_id = ?");
    if (!$stmt) {
        throw new Exception('Ошибка подготовки запроса: ' . $connect->error);
    }
    
    $stmt->bind_param('i', $lesson_id);
    
    if (!$stmt->execute()) {
        $errorMsg = $stmt->error ? $stmt->error : $connect->error;
        // Проверяем, не является ли ошибка связанной с внешним ключом
        if (strpos($errorMsg, 'foreign key constraint') !== false || 
            strpos($errorMsg, 'Cannot delete or update') !== false ||
            strpos($errorMsg, '1451') !== false) {
            throw new Exception('Невозможно удалить занятие: существуют связанные записи в других таблицах');
        }
        throw new Exception('Ошибка при удалении: ' . $errorMsg);
    }
    
    $affectedRows = $stmt->affected_rows;
    $stmt->close();
    $stmt = null;
    
    if ($affectedRows === 0) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Занятие не было удалено (возможно, уже не существует)']);
        exit;
    }
    
    echo json_encode(['success' => true, 'message' => 'Занятие успешно удалено']);
    
} catch (Exception $e) {
    http_response_code(500);
    $errorMessage = $e->getMessage();
    // Логируем ошибку для отладки
    error_log("Ошибка при удалении занятия (ID: $lesson_id): " . $errorMessage);
    echo json_encode(['success' => false, 'message' => $errorMessage]);
} finally {
    if ($stmt !== null) {
        $stmt->close();
    }
    if ($checkStmt !== null) {
        $checkStmt->close();
    }
    if (isset($connect) && $connect instanceof mysqli) {
        $connect->close();
    }
}
?>

