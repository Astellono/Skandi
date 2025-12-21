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

$excursion_id = isset($data['excursion_id']) ? (int)$data['excursion_id'] : null;

if (!$excursion_id) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Не указан ID экскурсии']);
    exit;
}

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных']);
    exit;
}

try {
    // Получаем информацию об экскурсии перед удалением (для удаления изображения и связи)
    $stmt = $connect->prepare("SELECT excursion_imgSrc, excursion_link_id, excursion_name FROM excursions WHERE excursion_id = ?");
    $stmt->bind_param('i', $excursion_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $excursion = $result->fetch_assoc();
    $stmt->close();
    
    if (!$excursion) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Экскурсия не найдена']);
        exit;
    }
    
    // Удаляем все связанные записи людей из excursion_signings
    $deletedSignings = 0;
    
    // Проверяем, существует ли таблица excursion_signings
    $tableCheck = $connect->query("SHOW TABLES LIKE 'excursion_signings'");
    if ($tableCheck && $tableCheck->num_rows > 0) {
        // Основная связь идет через excursion_link_id
        // Записи сохраняются с excursion_link_id из таблицы excursions
        if (!empty($excursion['excursion_link_id'])) {
            $deleteSigningsStmt = $connect->prepare("DELETE FROM excursion_signings WHERE excursion_link_id = ?");
            if ($deleteSigningsStmt) {
                $deleteSigningsStmt->bind_param('s', $excursion['excursion_link_id']);
                if ($deleteSigningsStmt->execute()) {
                    $deletedSignings = $deleteSigningsStmt->affected_rows;
                } else {
                    error_log('Ошибка удаления записей по excursion_link_id: ' . $deleteSigningsStmt->error);
                }
                $deleteSigningsStmt->close();
            }
        } else {
            // Если excursion_link_id пустой, удаляем по названию экскурсии
            if (!empty($excursion['excursion_name'])) {
                $deleteByNameStmt = $connect->prepare("DELETE FROM excursion_signings WHERE excursion_name = ?");
                if ($deleteByNameStmt) {
                    $deleteByNameStmt->bind_param('s', $excursion['excursion_name']);
                    if ($deleteByNameStmt->execute()) {
                        $deletedSignings = $deleteByNameStmt->affected_rows;
                    }
                    $deleteByNameStmt->close();
                }
            }
        }
    }
    
    // Удаляем изображение, если оно существует
    if (!empty($excursion['excursion_imgSrc'])) {
        $imgPath = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($excursion['excursion_imgSrc'], '/');
        if (file_exists($imgPath)) {
            @unlink($imgPath);
        }
    }
    
    // Удаляем экскурсию из БД
    $stmt = $connect->prepare("DELETE FROM excursions WHERE excursion_id = ?");
    $stmt->bind_param('i', $excursion_id);
    
    if ($stmt->execute()) {
        $message = 'Экскурсия успешно удалена';
        if ($deletedSignings > 0) {
            $message .= '. Удалено записей людей: ' . $deletedSignings;
        }
        echo json_encode([
            'success' => true,
            'message' => $message
        ]);
    } else {
        throw new Exception('Ошибка выполнения запроса: ' . $stmt->error);
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка при удалении экскурсии: ' . $e->getMessage()
    ]);
}

$connect->close();

