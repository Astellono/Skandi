<?php
header('Content-Type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/tour_helpers.php';

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка подключения к базе данных'], JSON_UNESCAPED_UNICODE);
    exit;
}

// Параметры сортировки из запроса (по умолчанию — по дате по возрастанию)
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'excursion_date';
$sort_order = isset($_GET['sort_order']) ? strtoupper($_GET['sort_order']) : 'ASC';

// Разрешенные поля для сортировки
$allowed_sort_fields = ['excursion_id', 'excursion_name', 'excursion_date', 'excursion_link_id'];
$allowed_sort_orders = ['ASC', 'DESC'];

// Валидация параметров сортировки
if (!in_array($sort_by, $allowed_sort_fields)) {
    $sort_by = 'excursion_date';
}
if (!in_array($sort_order, $allowed_sort_orders)) {
    $sort_order = 'ASC';
}

// Проверяем существование таблицы
$tableCheck = $connect->query("SHOW TABLES LIKE 'excursions'");
if (!$tableCheck || $tableCheck->num_rows === 0) {
    echo json_encode([], JSON_UNESCAPED_UNICODE);
    exit;
}

// Запрос без ORDER BY — сортировка по дате делается в PHP (дата в БД — VARCHAR, формат "6 декабря 2025г")
$query = "SELECT 
    excursion_id,
    excursion_name,
    excursion_date,
    excursion_time,
    excursion_description,
    excursion_details,
    excursion_price,
    excursion_price_included,
    excursion_price_additional,
    excursion_imgSrc,
    excursion_link_id,
    excursion_formTour_param
FROM excursions";

$result = $connect->query($query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка выполнения запроса: ' . $connect->error], JSON_UNESCAPED_UNICODE);
    exit;
}

$excursions = [];

while ($row = $result->fetch_assoc()) {
    $excursions[] = [
        'id' => $row['excursion_id'],
        'name' => $row['excursion_name'],
        'date' => $row['excursion_date'],
        'time' => $row['excursion_time'],
        'description' => $row['excursion_description'],
        'details' => $row['excursion_details'],
        'price' => $row['excursion_price'],
        'price_included' => $row['excursion_price_included'],
        'price_additional' => $row['excursion_price_additional'],
        'imgSrc' => $row['excursion_imgSrc'],
        'link_id' => $row['excursion_link_id'],
        'formTour_param' => $row['excursion_formTour_param']
    ];
}

// Сортировка по дате по возрастанию (поддержка "6 декабря 2025г" и Y-m-d)
if ($sort_by === 'excursion_date' && function_exists('parse_excursion_date_for_sort')) {
    usort($excursions, function ($a, $b) use ($sort_order) {
        $d1 = parse_excursion_date_for_sort($a['date'] ?? null);
        $d2 = parse_excursion_date_for_sort($b['date'] ?? null);
        $cmp = strcmp($d1, $d2);
        return $sort_order === 'DESC' ? -$cmp : $cmp;
    });
} elseif ($sort_by !== 'excursion_date') {
    usort($excursions, function ($a, $b) use ($sort_by, $sort_order) {
        $v1 = $a[$sort_by === 'excursion_id' ? 'id' : ($sort_by === 'excursion_name' ? 'name' : ($sort_by === 'excursion_link_id' ? 'link_id' : ''))] ?? '';
        $v2 = $b[$sort_by === 'excursion_id' ? 'id' : ($sort_by === 'excursion_name' ? 'name' : ($sort_by === 'excursion_link_id' ? 'link_id' : ''))] ?? '';
        $cmp = strcmp((string)$v1, (string)$v2);
        return $sort_order === 'DESC' ? -$cmp : $cmp;
    });
}

echo json_encode($excursions, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);


