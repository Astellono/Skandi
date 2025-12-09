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

// Параметры сортировки из запроса
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'tour_date_start';
$sort_order = isset($_GET['sort_order']) ? strtoupper($_GET['sort_order']) : 'ASC';

// Разрешенные поля для сортировки
$allowed_sort_fields = ['tour_id', 'tour_name', 'tour_date_start', 'tour_date_end', 'tour_linkPage'];
$allowed_sort_orders = ['ASC', 'DESC'];

// Валидация параметров сортировки
if (!in_array($sort_by, $allowed_sort_fields)) {
    $sort_by = 'tour_date_start';
}
if (!in_array($sort_order, $allowed_sort_orders)) {
    $sort_order = 'ASC';
}

// Запрос к базе данных с сортировкой
$query = "SELECT 
    tour_id,
    tour_name,
    tour_linkPage,
    tour_imgSrc,
    tour_color,
    tour_date_start,
    tour_date_end,
    tour_price
FROM tours 
ORDER BY $sort_by $sort_order";

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
        'srcImg' => $row['tour_imgSrc'] ?: '',
        'price' => $row['tour_price'] ?: null
    ];
}

echo json_encode($tours, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$connect->close();
?>

