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

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Неверный формат данных']);
    exit;
}

// Валидация обязательных полей
$required = ['tour_name', 'tour_date_start', 'tour_date_end', 'tour_linkPage', 'tour_imgSrc', 'tour_color'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => "Поле '$field' обязательно для заполнения"]);
        exit;
    }
}

$tour_id = isset($data['tour_id']) && !empty($data['tour_id']) ? (int)$data['tour_id'] : null;
$tour_name = trim($data['tour_name']);
$tour_date = isset($data['tour_date']) ? trim($data['tour_date']) : null;
$tour_linkPage = trim($data['tour_linkPage']);
$tour_imgSrc = trim($data['tour_imgSrc']);
$tour_color = trim($data['tour_color']);
$tour_date_start = $data['tour_date_start'];
$tour_date_end = $data['tour_date_end'];

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных']);
    exit;
}

try {
    if ($tour_id) {
        // Обновление существующего тура
        $stmt = $connect->prepare("UPDATE tours SET 
            tour_name = ?, 
            tour_date = ?, 
            tour_linkPage = ?, 
            tour_imgSrc = ?, 
            tour_color = ?, 
            tour_date_start = ?, 
            tour_date_end = ? 
            WHERE tour_id = ?");
        
        $stmt->bind_param('sssssssi', 
            $tour_name, 
            $tour_date, 
            $tour_linkPage, 
            $tour_imgSrc, 
            $tour_color, 
            $tour_date_start, 
            $tour_date_end, 
            $tour_id
        );
    } else {
        // Добавление нового тура
        $stmt = $connect->prepare("INSERT INTO tours 
            (tour_name, tour_date, tour_linkPage, tour_imgSrc, tour_color, tour_date_start, tour_date_end) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param('sssssss', 
            $tour_name, 
            $tour_date, 
            $tour_linkPage, 
            $tour_imgSrc, 
            $tour_color, 
            $tour_date_start, 
            $tour_date_end
        );
    }
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => $tour_id ? 'Тур успешно обновлен' : 'Тур успешно добавлен',
            'tour_id' => $tour_id ?: $connect->insert_id
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка при сохранении: ' . $stmt->error]);
    }
    
    $stmt->close();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка: ' . $e->getMessage()]);
}

$connect->close();
?>

