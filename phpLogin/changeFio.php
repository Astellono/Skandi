<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();

if (!isset($_SESSION['user_id'])) {
    ob_end_clean();
    header('Location: /index.php');
    exit;
}

require_once 'connect.php';

$userId = (int) $_SESSION['user_id'];

$familia = trim($_POST['user_fam'] ?? '');
$name = trim($_POST['user_name'] ?? '');
$otch = trim($_POST['user_otch'] ?? '');

try {
    // Подготовленный запрос для MySQLi
    $stmt = $connect->prepare("UPDATE users 
                          SET user_name = ?, user_familia = ?, user_otch = ? 
                          WHERE user_id = ?");
    
    // Привязываем параметры для MySQLi
    $stmt->bind_param("sssi", $name, $familia, $otch, $userId);
    
    // Выполняем запрос без параметров
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        // $_SESSION['success'] = 'Данные успешно обновлены';
        $_SESSION['user_name'] = $name;
        $_SESSION['user_familia'] = $familia;
    } else {
        // $_SESSION['error'] = 'Данные не были изменены или совпадают с текущими';
    }
    
} catch (Exception $e) {
    $_SESSION['error'] = 'Ошибка при обновлении данных: ' . $e->getMessage();
}

header('Location: ../lk/lk.php');
exit;