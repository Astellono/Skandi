<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();
header('Content-Type: application/json; charset=utf-8');

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/tour_helpers.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения или загрузки функций: ' . $e->getMessage()]);
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

$required = ['excursion_name', 'excursion_date', 'excursion_price'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => "Поле '$field' обязательно для заполнения"]);
        exit;
    }
}

$excursion_id = isset($data['excursion_id']) && !empty($data['excursion_id']) ? (int)$data['excursion_id'] : null;
$excursion_name = trim($data['excursion_name']);
$excursion_date = isset($data['excursion_date']) ? trim($data['excursion_date']) : null;
$excursion_time = isset($data['excursion_time']) ? trim($data['excursion_time']) : null;
$excursion_price = isset($data['excursion_price']) ? trim($data['excursion_price']) : null;
$excursion_imgSrc = isset($data['excursion_imgSrc']) ? trim($data['excursion_imgSrc']) : '';
$excursion_link_id = isset($data['excursion_link_id']) ? trim($data['excursion_link_id']) : null;
$excursion_formTour_param = isset($data['excursion_formTour_param']) ? trim($data['excursion_formTour_param']) : null;

$excursion_description = isset($data['excursion_description']) ? trim($data['excursion_description']) : null;
$excursion_details = isset($data['excursion_details']) ? trim($data['excursion_details']) : null;
$excursion_difficulty = isset($data['excursion_difficulty']) ? trim($data['excursion_difficulty']) : null;
$excursion_group_size = isset($data['excursion_group_size']) ? trim($data['excursion_group_size']) : null;
$excursion_price_included = isset($data['excursion_price_included']) ? trim($data['excursion_price_included']) : null;
$excursion_price_additional = isset($data['excursion_price_additional']) ? trim($data['excursion_price_additional']) : null;


// Автоматическая генерация excursion_imgSrc, если не указан
if (empty($excursion_imgSrc)) {
    if ($excursion_id) {
        // При редактировании, если поле пустое, берем из БД
        $stmt = $connect->prepare("SELECT excursion_imgSrc FROM excursions WHERE excursion_id = ?");
        $stmt->bind_param('i', $excursion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $excursion_imgSrc = $row['excursion_imgSrc'];
        }
        $stmt->close();
    }
    if (empty($excursion_imgSrc) && !empty($excursion_name)) {
        if (function_exists('generateTourFileName')) {
            $excursion_imgSrc = '/img/excursion/' . basename(generateTourFileName($excursion_name), '.php') . '.jpeg';
        } else {
            $excursion_imgSrc = '/img/excursion/excursion_' . time() . '.jpeg';
        }
    }
}

// Устанавливаем кодировку utf8mb4 для совместимости с таблицей
$connect->set_charset("utf8mb4");
$connect->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");

$connect->begin_transaction();

try {
    // Проверяем наличие полей в таблице
    $result = $connect->query("SHOW COLUMNS FROM excursions");
    $columns = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
    }
    
    $hasDescription = in_array('excursion_description', $columns);
    $hasDetails = in_array('excursion_details', $columns);
    $hasDifficulty = in_array('excursion_difficulty', $columns);
    $hasGroupSize = in_array('excursion_group_size', $columns);
    $hasPriceIncluded = in_array('excursion_price_included', $columns);
    $hasPriceAdditional = in_array('excursion_price_additional', $columns);
    $hasFormTourParam = in_array('excursion_formTour_param', $columns);
    $hasLinkId = in_array('excursion_link_id', $columns);
    $hasTime = in_array('excursion_time', $columns);

    if ($excursion_id) {
        // Обновление существующей экскурсии
        $updateFields = "excursion_name = ?, excursion_date = ?, excursion_price = ?, excursion_imgSrc = ?";
        $bindTypes = 'ssss';
        $bindParams = [$excursion_name, $excursion_date, $excursion_price, $excursion_imgSrc];

        if ($hasTime) {
            $updateFields .= ", excursion_time = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_time;
        }
        
        if ($hasLinkId) {
            $updateFields .= ", excursion_link_id = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_link_id;
        }

        if ($hasDescription) {
            $updateFields .= ", excursion_description = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_description;
        }
        
        if ($hasDetails) {
            $updateFields .= ", excursion_details = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_details;
        }
        
        if ($hasDifficulty) {
            $updateFields .= ", excursion_difficulty = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_difficulty;
        }
        
        if ($hasGroupSize) {
            $updateFields .= ", excursion_group_size = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_group_size;
        }
        
        if ($hasPriceIncluded) {
            $updateFields .= ", excursion_price_included = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_price_included;
        }
        
        if ($hasPriceAdditional) {
            $updateFields .= ", excursion_price_additional = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_price_additional;
        }
        
        if ($hasFormTourParam) {
            $updateFields .= ", excursion_formTour_param = ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_formTour_param;
        }

        $stmt = $connect->prepare("UPDATE excursions SET $updateFields WHERE excursion_id = ?");
        $bindParams[] = $excursion_id;
        $stmt->bind_param($bindTypes . 'i', ...$bindParams);

    } else {
        // Добавление новой экскурсии
        $insertFields = "excursion_name, excursion_date, excursion_price, excursion_imgSrc";
        $insertValues = "?, ?, ?, ?";
        $bindTypes = 'ssss';
        $bindParams = [$excursion_name, $excursion_date, $excursion_price, $excursion_imgSrc];

        if ($hasTime) {
            $insertFields .= ", excursion_time";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_time;
        }
        
        if ($hasLinkId) {
            $insertFields .= ", excursion_link_id";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_link_id;
        }

        if ($hasDescription) {
            $insertFields .= ", excursion_description";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_description;
        }
        
        if ($hasDetails) {
            $insertFields .= ", excursion_details";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_details;
        }
        
        if ($hasDifficulty) {
            $insertFields .= ", excursion_difficulty";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_difficulty;
        }
        
        if ($hasGroupSize) {
            $insertFields .= ", excursion_group_size";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_group_size;
        }
        
        if ($hasPriceIncluded) {
            $insertFields .= ", excursion_price_included";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_price_included;
        }
        
        if ($hasPriceAdditional) {
            $insertFields .= ", excursion_price_additional";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_price_additional;
        }
        
        if ($hasFormTourParam) {
            $insertFields .= ", excursion_formTour_param";
            $insertValues .= ", ?";
            $bindTypes .= 's';
            $bindParams[] = $excursion_formTour_param;
        }

        $stmt = $connect->prepare("INSERT INTO excursions ($insertFields) VALUES ($insertValues)");
        $stmt->bind_param($bindTypes, ...$bindParams);
    }

    if (!$stmt->execute()) {
        throw new Exception('Ошибка выполнения запроса к БД: ' . $stmt->error);
    }

    $new_excursion_id = $excursion_id ?: $connect->insert_id;

    $connect->commit();
    echo json_encode(['success' => true, 'message' => 'Экскурсия успешно сохранена!', 'excursion_id' => $new_excursion_id]);

} catch (Exception $e) {
    $connect->rollback();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка сохранения экскурсии: ' . $e->getMessage()]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $connect->close();
}
?>
