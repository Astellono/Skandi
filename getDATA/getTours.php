<?php
header('Content-Type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Функция для генерации массива дат между start и end
function getDatesArray($start, $end) {
    $arr = [];
    $startDate = new DateTime($start);
    $endDate = new DateTime($end);
    
    while ($startDate <= $endDate) {
        $arr[] = $startDate->format('d.m.Y');
        $startDate->modify('+1 day');
    }
    
    return $arr;
}

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка подключения к базе данных'], JSON_UNESCAPED_UNICODE);
    exit;
}

// Запрос к базе данных
$query = "SELECT 
    tour_id,
    tour_name,
    tour_linkPage,
    tour_imgSrc,
    tour_color,
    tour_date_start,
    tour_date_end
FROM tours 
ORDER BY tour_date_start ASC";

$result = $connect->query($query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка выполнения запроса: ' . $connect->error], JSON_UNESCAPED_UNICODE);
    exit;
}

$tours = [];

while ($row = $result->fetch_assoc()) {
    // Генерируем массив дат, если есть даты начала и конца
    $dateArray = [];
    if ($row['tour_date_start'] && $row['tour_date_end']) {
        $dateArray = getDatesArray($row['tour_date_start'], $row['tour_date_end']);
    }
    
    $tours[] = [
        'nameT' => $row['tour_name'],
        'date' => $dateArray,
        'link' => $row['tour_linkPage'] ?: '',
        'color' => $row['tour_color'] ?: '#4a90e2',
        'srcImg' => $row['tour_imgSrc'] ?: ''
    ];
}

echo json_encode($tours, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$connect->close();
?>

