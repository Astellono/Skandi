<?php
header('Content-Type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

try {
    // Получаем все занятия, отсортированные по порядку
    $query = "SELECT * FROM lessons_schedule ORDER BY `order` ASC, lesson_id ASC";
    $result = $connect->query($query);
    
    $lessons = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $lessons[] = $row;
        }
    }
    
    echo json_encode(['success' => true, 'lessons' => $lessons], JSON_UNESCAPED_UNICODE);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка получения расписания: ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
} finally {
    if (isset($connect)) {
        $connect->close();
    }
}
?>



