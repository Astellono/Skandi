<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();
header('Content-Type: application/json; charset=utf-8');

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения: ' . $e->getMessage()]);
    exit;
}

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

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Неверный формат данных']);
    exit;
}

$required = ['park_name', 'address'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => "Поле '$field' обязательно для заполнения"]);
        exit;
    }
}

$lesson_id = isset($data['lesson_id']) && !empty($data['lesson_id']) ? (int)$data['lesson_id'] : null;
$park_name = trim($data['park_name']);
$park_image = isset($data['park_image']) ? trim($data['park_image']) : '';
$address = isset($data['address']) ? trim($data['address']) : '';
$latitude = isset($data['latitude']) && !empty($data['latitude']) ? (float)$data['latitude'] : null;
$longitude = isset($data['longitude']) && !empty($data['longitude']) ? (float)$data['longitude'] : null;
$monday = isset($data['monday']) ? trim($data['monday']) : '-';
$tuesday = isset($data['tuesday']) ? trim($data['tuesday']) : '-';
$wednesday = isset($data['wednesday']) ? trim($data['wednesday']) : '-';
$thursday = isset($data['thursday']) ? trim($data['thursday']) : '-';
$friday = isset($data['friday']) ? trim($data['friday']) : '-';
$saturday = isset($data['saturday']) ? trim($data['saturday']) : '-';
$sunday = isset($data['sunday']) ? trim($data['sunday']) : '-';
$map_link = isset($data['map_link']) ? trim($data['map_link']) : '';
$modal_id = isset($data['modal_id']) ? trim($data['modal_id']) : '';
$order = isset($data['order']) ? (int)$data['order'] : 0;

$connect->begin_transaction();

try {
    if ($lesson_id) {
        // Обновление существующего занятия
        if ($latitude !== null && $longitude !== null) {
            $stmt = $connect->prepare("UPDATE lessons_schedule SET park_name = ?, park_image = ?, address = ?, latitude = ?, longitude = ?, monday = ?, tuesday = ?, wednesday = ?, thursday = ?, friday = ?, saturday = ?, sunday = ?, map_link = ?, modal_id = ?, `order` = ? WHERE lesson_id = ?");
            $stmt->bind_param('sssddsssssssssii', $park_name, $park_image, $address, $latitude, $longitude, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $map_link, $modal_id, $order, $lesson_id);
        } else {
            $stmt = $connect->prepare("UPDATE lessons_schedule SET park_name = ?, park_image = ?, address = ?, monday = ?, tuesday = ?, wednesday = ?, thursday = ?, friday = ?, saturday = ?, sunday = ?, map_link = ?, modal_id = ?, `order` = ? WHERE lesson_id = ?");
            $stmt->bind_param('ssssssssssssii', $park_name, $park_image, $address, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $map_link, $modal_id, $order, $lesson_id);
        }
    } else {
        // Добавление нового занятия
        if ($latitude !== null && $longitude !== null) {
            $stmt = $connect->prepare("INSERT INTO lessons_schedule (park_name, park_image, address, latitude, longitude, monday, tuesday, wednesday, thursday, friday, saturday, sunday, map_link, modal_id, `order`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssddsssssssssi', $park_name, $park_image, $address, $latitude, $longitude, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $map_link, $modal_id, $order);
        } else {
            $stmt = $connect->prepare("INSERT INTO lessons_schedule (park_name, park_image, address, monday, tuesday, wednesday, thursday, friday, saturday, sunday, map_link, modal_id, `order`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssssssssssi', $park_name, $park_image, $address, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $map_link, $modal_id, $order);
        }
    }

    if (!$stmt->execute()) {
        throw new Exception('Ошибка выполнения запроса к БД: ' . $stmt->error);
    }

    $new_lesson_id = $lesson_id ?: $connect->insert_id;

    $connect->commit();
    echo json_encode(['success' => true, 'message' => 'Занятие успешно сохранено!', 'lesson_id' => $new_lesson_id]);

} catch (Exception $e) {
    $connect->rollback();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка сохранения занятия: ' . $e->getMessage()]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $connect->close();
}
?>

