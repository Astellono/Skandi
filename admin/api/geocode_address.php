<?php
/**
 * API для геокодирования адреса через Yandex Geocoder
 */

session_start();
header('Content-Type: application/json; charset=utf-8');

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Не авторизован']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || empty($data['address'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Адрес не указан']);
    exit;
}

$address = trim($data['address']);

// API ключ Yandex Maps (используем тот же, что в lesson.php)
$apiKey = '199de9b4-eaf5-45e1-95c2-3510af592354';

// URL для геокодирования
$url = 'https://geocode-maps.yandex.ru/1.x/?apikey=' . urlencode($apiKey) . 
       '&geocode=' . urlencode($address) . 
       '&format=json&results=1';

try {
    // Выполняем запрос к Yandex Geocoder API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($curlError) {
        throw new Exception('Ошибка cURL: ' . $curlError);
    }
    
    if ($httpCode !== 200) {
        throw new Exception('HTTP ошибка: ' . $httpCode);
    }
    
    $result = json_decode($response, true);
    
    if (!$result || !isset($result['response']['GeoObjectCollection']['featureMember'][0])) {
        throw new Exception('Адрес не найден');
    }
    
    $geoObject = $result['response']['GeoObjectCollection']['featureMember'][0]['GeoObject'];
    $pos = $geoObject['Point']['pos'];
    
    // Формат: "долгота широта"
    list($longitude, $latitude) = explode(' ', $pos);
    
    echo json_encode([
        'success' => true,
        'latitude' => (float)$latitude,
        'longitude' => (float)$longitude,
        'formatted_address' => $geoObject['metaDataProperty']['GeocoderMetaData']['text'] ?? $address
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка геокодирования: ' . $e->getMessage()
    ]);
}
?>



