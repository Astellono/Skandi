<?php
// Отключаем вывод ошибок, чтобы они не попадали в JSON
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

try {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/tour_helpers.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка загрузки функций: ' . $e->getMessage()]);
    exit;
}

if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
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
$required = ['tour_name', 'tour_date_start', 'tour_date_end', 'tour_color', 'tour_price'];
foreach ($required as $field) {
    if (!isset($data[$field]) || (is_string($data[$field]) && trim($data[$field]) === '') || $data[$field] === null) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => "Поле '$field' обязательно для заполнения", 'debug' => ['received_data' => $data]]);
        exit;
    }
}

$tour_id = isset($data['tour_id']) && !empty($data['tour_id']) ? (int)$data['tour_id'] : null;
$tour_name = trim($data['tour_name']);
$tour_date = isset($data['tour_date']) ? trim($data['tour_date']) : null;
$tour_price = isset($data['tour_price']) ? trim($data['tour_price']) : null;
$tour_linkPage = isset($data['tour_linkPage']) ? trim($data['tour_linkPage']) : '';
$tour_imgSrc = isset($data['tour_imgSrc']) ? trim($data['tour_imgSrc']) : '';
$tour_color = trim($data['tour_color']);
$tour_date_start = isset($data['tour_date_start']) && !empty($data['tour_date_start']) ? trim($data['tour_date_start']) : null;
$tour_date_end = isset($data['tour_date_end']) && !empty($data['tour_date_end']) ? trim($data['tour_date_end']) : null;
$tour_formTour_param = isset($data['tour_formTour_param']) && !empty(trim($data['tour_formTour_param'])) ? trim($data['tour_formTour_param']) : $tour_name;

// Новые поля
$tour_description = isset($data['tour_description']) ? trim($data['tour_description']) : null;
$tour_difficulty = isset($data['tour_difficulty']) ? trim($data['tour_difficulty']) : null;
$tour_group_size = isset($data['tour_group_size']) ? trim($data['tour_group_size']) : null;
$tour_price_includes = isset($data['tour_price_includes']) ? trim($data['tour_price_includes']) : null;
$tour_price_excludes = isset($data['tour_price_excludes']) ? trim($data['tour_price_excludes']) : null;
$tour_guides = isset($data['tour_guides']) ? $data['tour_guides'] : null; // JSON строка
$tour_program = isset($data['tour_program']) ? $data['tour_program'] : null; // JSON строка

// Автоматическая генерация путей, если они не указаны
if (empty($tour_linkPage)) {
    // При редактировании тура получаем существующий путь из БД
    if ($tour_id) {
        $stmt_check = $connect->prepare("SELECT tour_linkPage FROM tours WHERE tour_id = ?");
        if ($stmt_check) {
            $stmt_check->bind_param('i', $tour_id);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            if ($row_check = $result_check->fetch_assoc()) {
                $tour_linkPage = $row_check['tour_linkPage'] ?? '';
            }
            $stmt_check->close();
        }
    }
    
    // Если все еще пусто, генерируем новый
    if (empty($tour_linkPage)) {
        if (function_exists('generateTourFileName')) {
            $fileName = generateTourFileName($tour_name);
            $tour_linkPage = 'page_tour/' . $fileName;
        } else {
            // Fallback если функция не определена
            $fileName = 'tour_' . time() . '.php';
            $tour_linkPage = 'page_tour/' . $fileName;
        }
    }
}

if (empty($tour_imgSrc)) {
    // Используем название тура для имени файла изображения
    if (function_exists('generateTourFileName') && !empty($tour_name)) {
        $baseName = generateTourFileName($tour_name);
        $tour_imgSrc = 'img/act-tour/' . $baseName . '.jpg';
    } else {
        // Fallback: используем имя файла страницы
        $baseName = basename($tour_linkPage, '.php');
        $tour_imgSrc = 'img/act-tour/' . $baseName . '.jpg';
    }
}

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных']);
    exit;
}

try {
    // Проверяем наличие новых полей в таблице (проверяем tour_description как индикатор)
    $checkFields = $connect->query("SHOW COLUMNS FROM tours LIKE 'tour_description'");
    $hasNewFields = ($checkFields && $checkFields->num_rows > 0);
    
    // Альтернативный способ проверки через описание колонок
    if (!$hasNewFields) {
        $result = $connect->query("SHOW COLUMNS FROM tours");
        if ($result) {
            $columns = [];
            while ($row = $result->fetch_assoc()) {
                $columns[] = $row['Field'];
            }
            $hasNewFields = in_array('tour_description', $columns);
        }
    }
    
    // Проверяем наличие поля tour_formTour_param
    $checkFormTourParam = $connect->query("SHOW COLUMNS FROM tours LIKE 'tour_formTour_param'");
    $hasFormTourParam = ($checkFormTourParam && $checkFormTourParam->num_rows > 0);
    
    if (!$hasFormTourParam) {
        $result = $connect->query("SHOW COLUMNS FROM tours");
        if ($result) {
            $columns = [];
            while ($row = $result->fetch_assoc()) {
                $columns[] = $row['Field'];
            }
            $hasFormTourParam = in_array('tour_formTour_param', $columns);
        }
    }
    
    if ($tour_id) {
        // Обновление существующего тура
        if ($hasNewFields) {
            if ($hasFormTourParam) {
                $stmt = $connect->prepare("UPDATE tours SET 
                    tour_name = ?, 
                    tour_date = ?, 
                    tour_price = ?, 
                    tour_linkPage = ?, 
                    tour_imgSrc = ?, 
                    tour_color = ?, 
                    tour_date_start = ?, 
                    tour_date_end = ?,
                    tour_description = ?,
                    tour_difficulty = ?,
                    tour_group_size = ?,
                    tour_price_includes = ?,
                    tour_price_excludes = ?,
                    tour_guides = ?,
                    tour_program = ?,
                    tour_formTour_param = ?
                    WHERE tour_id = ?");
                
                $stmt->bind_param('ssssssssssssssssi', 
                    $tour_name, 
                    $tour_date, 
                    $tour_price,
                    $tour_linkPage, 
                    $tour_imgSrc, 
                    $tour_color, 
                    $tour_date_start, 
                    $tour_date_end,
                    $tour_description,
                    $tour_difficulty,
                    $tour_group_size,
                    $tour_price_includes,
                    $tour_price_excludes,
                    $tour_guides,
                    $tour_program,
                    $tour_formTour_param,
                    $tour_id
                );
            } else {
                $stmt = $connect->prepare("UPDATE tours SET 
                    tour_name = ?, 
                    tour_date = ?, 
                    tour_price = ?, 
                    tour_linkPage = ?, 
                    tour_imgSrc = ?, 
                    tour_color = ?, 
                    tour_date_start = ?, 
                    tour_date_end = ?,
                    tour_description = ?,
                    tour_difficulty = ?,
                    tour_group_size = ?,
                    tour_price_includes = ?,
                    tour_price_excludes = ?,
                    tour_guides = ?,
                    tour_program = ?
                    WHERE tour_id = ?");
                
                $stmt->bind_param('sssssssssssssssi', 
                    $tour_name, 
                    $tour_date, 
                    $tour_price,
                    $tour_linkPage, 
                    $tour_imgSrc, 
                    $tour_color, 
                    $tour_date_start, 
                    $tour_date_end,
                    $tour_description,
                    $tour_difficulty,
                    $tour_group_size,
                    $tour_price_includes,
                    $tour_price_excludes,
                    $tour_guides,
                    $tour_program,
                    $tour_id
                );
            }
        } else {
            // Если новых полей нет, используем старый запрос
            $stmt = $connect->prepare("UPDATE tours SET 
                tour_name = ?, 
                tour_date = ?, 
                tour_price = ?, 
                tour_linkPage = ?, 
                tour_imgSrc = ?, 
                tour_color = ?, 
                tour_date_start = ?, 
                tour_date_end = ? 
                WHERE tour_id = ?");
            
            $stmt->bind_param('ssssssssi', 
                $tour_name, 
                $tour_date, 
                $tour_price,
                $tour_linkPage, 
                $tour_imgSrc, 
                $tour_color, 
                $tour_date_start, 
                $tour_date_end, 
                $tour_id
            );
        }
    } else {
        // Добавление нового тура
        if ($hasNewFields) {
            if ($hasFormTourParam) {
                $stmt = $connect->prepare("INSERT INTO tours 
                    (tour_name, tour_date, tour_price, tour_linkPage, tour_imgSrc, tour_color, tour_date_start, tour_date_end,
                     tour_description, tour_difficulty, tour_group_size, tour_price_includes, tour_price_excludes, tour_guides, tour_program, tour_formTour_param) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $stmt->bind_param('ssssssssssssssss', 
                    $tour_name, 
                    $tour_date, 
                    $tour_price,
                    $tour_linkPage, 
                    $tour_imgSrc, 
                    $tour_color, 
                    $tour_date_start, 
                    $tour_date_end,
                    $tour_description,
                    $tour_difficulty,
                    $tour_group_size,
                    $tour_price_includes,
                    $tour_price_excludes,
                    $tour_guides,
                    $tour_program,
                    $tour_formTour_param
                );
            } else {
                $stmt = $connect->prepare("INSERT INTO tours 
                    (tour_name, tour_date, tour_price, tour_linkPage, tour_imgSrc, tour_color, tour_date_start, tour_date_end,
                     tour_description, tour_difficulty, tour_group_size, tour_price_includes, tour_price_excludes, tour_guides, tour_program) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $stmt->bind_param('sssssssssssssss', 
                    $tour_name, 
                    $tour_date, 
                    $tour_price,
                    $tour_linkPage, 
                    $tour_imgSrc, 
                    $tour_color, 
                    $tour_date_start, 
                    $tour_date_end,
                    $tour_description,
                    $tour_difficulty,
                    $tour_group_size,
                    $tour_price_includes,
                    $tour_price_excludes,
                    $tour_guides,
                    $tour_program
                );
            }
        } else {
            // Если новых полей нет, используем старый запрос
            $stmt = $connect->prepare("INSERT INTO tours 
                (tour_name, tour_date, tour_price, tour_linkPage, tour_imgSrc, tour_color, tour_date_start, tour_date_end) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->bind_param('ssssssss', 
                $tour_name, 
                $tour_date, 
                $tour_price,
                $tour_linkPage, 
                $tour_imgSrc, 
                $tour_color, 
                $tour_date_start, 
                $tour_date_end
            );
        }
    }
    
    if ($stmt->execute()) {
        $new_tour_id = $tour_id ?: $connect->insert_id;
        
        // Автоматически создаем файл страницы тура
        $pageFileCreated = false;
        $fileCreationError = null;
        
        try {
            if (function_exists('generateTourPageFile')) {
                $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $tour_linkPage;
                $tourDataForFile = [
                    'tour_name' => $tour_name,
                    'tour_date' => $tour_date,
                    'tour_date_start' => $tour_date_start,
                    'tour_date_end' => $tour_date_end,
                    'tour_price' => $tour_price,
                    'tour_description' => $tour_description,
                    'tour_difficulty' => $tour_difficulty,
                    'tour_group_size' => $tour_group_size,
                    'tour_price_includes' => $tour_price_includes,
                    'tour_price_excludes' => $tour_price_excludes,
                    'tour_imgSrc' => $tour_imgSrc,
                    'tour_guides' => $tour_guides,
                    'tour_program' => $tour_program,
                    'tour_formTour_param' => $tour_formTour_param
                ];
                
                // Создаем/обновляем файл страницы тура (всегда пересоздаем, чтобы обновить данные)
                $pageFileCreated = generateTourPageFile($filePath, $tourDataForFile);
                if (!$pageFileCreated) {
                    $fileCreationError = 'Не удалось создать файл страницы тура';
                }
            }
        } catch (Exception $e) {
            $fileCreationError = 'Ошибка создания файла: ' . $e->getMessage();
        }
        
        $message = $tour_id ? 'Тур успешно обновлен' : 'Тур успешно добавлен';
        if ($pageFileCreated) {
            $message .= '. Файл страницы создан: ' . $tour_linkPage;
        } elseif ($fileCreationError) {
            $message .= '. ' . $fileCreationError;
        }
        
        echo json_encode([
            'success' => true, 
            'message' => $message,
            'tour_id' => $new_tour_id,
            'tour_linkPage' => $tour_linkPage,
            'tour_imgSrc' => $tour_imgSrc,
            'page_file_created' => $pageFileCreated
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка при сохранении: ' . $stmt->error]);
    }
    
    if (isset($stmt)) {
        $stmt->close();
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка: ' . $e->getMessage()]);
    if (isset($connect) && $connect instanceof mysqli) {
        $connect->close();
    }
    exit;
}

if (isset($connect) && $connect instanceof mysqli) {
    $connect->close();
}
?>

