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

if (!isset($data['tour_id']) || empty($data['tour_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID тура не указан']);
    exit;
}

$tour_id = (int)$data['tour_id'];

// Проверка подключения к БД
if (!($connect instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных']);
    exit;
}

// Функция для нормализации пути (работает на Windows и Linux)
function normalizePath($path) {
    // Заменяем обратные слеши на прямые
    $path = str_replace('\\', '/', $path);
    // Убираем начальный слеш, если есть
    $path = ltrim($path, '/');
    return $path;
}

// Функция для получения полного пути к файлу
function getFullPath($relativePath) {
    $normalized = normalizePath($relativePath);
    $docRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    $docRoot = rtrim($docRoot, '/');
    return $docRoot . '/' . $normalized;
}

try {
    // Получаем данные тура перед удалением
    $checkStmt = $connect->prepare("SELECT tour_linkPage, tour_imgSrc FROM tours WHERE tour_id = ?");
    $checkStmt->bind_param('i', $tour_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Тур не найден']);
        $checkStmt->close();
        exit;
    }
    
    $tour = $result->fetch_assoc();
    $checkStmt->close();
    
    $deletedFiles = [];
    $errors = [];
    
    // Удаляем файл страницы тура
    if (!empty($tour['tour_linkPage'])) {
        $pagePath = trim($tour['tour_linkPage']);
        $fullPagePath = getFullPath($pagePath);
        
        // Логируем для отладки
        error_log("Удаление страницы тура. Исходный путь из БД: '" . $tour['tour_linkPage'] . "', Полный путь: '" . $fullPagePath . "', DOCUMENT_ROOT: '" . $_SERVER['DOCUMENT_ROOT'] . "'");
        
        // Проверяем, существует ли файл и удаляем его
        if (file_exists($fullPagePath) && is_file($fullPagePath)) {
            if (@unlink($fullPagePath)) {
                $deletedFiles[] = 'Страница тура: ' . $pagePath;
                error_log("Файл страницы успешно удален: " . $fullPagePath);
            } else {
                $lastError = error_get_last();
                $errorMsg = $lastError ? $lastError['message'] : 'Неизвестная ошибка';
                $errors[] = 'Не удалось удалить файл страницы: ' . $pagePath;
                error_log("ОШИБКА удаления файла страницы тура: " . $fullPagePath . " (ошибка: " . $errorMsg . ")");
            }
        } else {
            $errors[] = 'Файл страницы не найден: ' . $pagePath . ' (полный путь: ' . $fullPagePath . ')';
            error_log("Файл страницы не найден. file_exists=" . (file_exists($fullPagePath) ? 'true' : 'false') . ", is_file=" . (is_file($fullPagePath) ? 'true' : 'false') . ", путь: " . $fullPagePath);
        }
    }
    
    // Удаляем файл картинки
    if (!empty($tour['tour_imgSrc'])) {
        $imgPath = trim($tour['tour_imgSrc']);
        $fullImgPath = getFullPath($imgPath);
        
        // Логируем для отладки
        error_log("Удаление изображения тура. Исходный путь из БД: '" . $tour['tour_imgSrc'] . "', Полный путь: '" . $fullImgPath . "', DOCUMENT_ROOT: '" . $_SERVER['DOCUMENT_ROOT'] . "'");
        
        // Проверяем, существует ли файл и удаляем его
        if (file_exists($fullImgPath) && is_file($fullImgPath)) {
            if (@unlink($fullImgPath)) {
                $deletedFiles[] = 'Изображение: ' . $imgPath;
                error_log("Файл изображения успешно удален: " . $fullImgPath);
            } else {
                $lastError = error_get_last();
                $errorMsg = $lastError ? $lastError['message'] : 'Неизвестная ошибка';
                $errors[] = 'Не удалось удалить файл изображения: ' . $imgPath;
                error_log("ОШИБКА удаления файла изображения тура: " . $fullImgPath . " (ошибка: " . $errorMsg . ")");
            }
        } else {
            $errors[] = 'Файл изображения не найден: ' . $imgPath . ' (полный путь: ' . $fullImgPath . ')';
            error_log("Файл изображения не найден. file_exists=" . (file_exists($fullImgPath) ? 'true' : 'false') . ", is_file=" . (is_file($fullImgPath) ? 'true' : 'false') . ", путь: " . $fullImgPath);
        }
    }
    
    // Удаляем тур из базы данных
    $stmt = $connect->prepare("DELETE FROM tours WHERE tour_id = ?");
    $stmt->bind_param('i', $tour_id);
    
    if ($stmt->execute()) {
        $message = 'Тур успешно удален';
        if (!empty($deletedFiles)) {
            $message .= '. Удалены файлы: ' . implode(', ', $deletedFiles);
        }
        if (!empty($errors)) {
            $message .= '. Ошибки: ' . implode(', ', $errors);
        }
        echo json_encode([
            'success' => true, 
            'message' => $message,
            'deleted_files' => $deletedFiles,
            'errors' => $errors
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка при удалении: ' . $stmt->error]);
    }
    
    $stmt->close();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка: ' . $e->getMessage()]);
}

$connect->close();
?>

