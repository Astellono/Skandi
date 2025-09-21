<?php
// ВКЛЮЧАЕМ БУФЕРИЗАЦИЮ В САМОМ НАЧАЛЕ
ob_start();
session_start();

// Проверяем авторизацию пользователя
if (!isset($_SESSION['user_id'])) {
    ob_end_clean();
    header('Location: /index.php');
    exit;
}

require_once '../phpLogin/connect.php';

if (!($connect instanceof mysqli)) {
    ob_end_clean();
    die('Ошибка подключения к базе данных');
}

$userId = (int) $_SESSION['user_id'];

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    ob_end_clean();
    header('Location: /lk/lk.php');
    exit;
}

// Получаем данные из формы
$age = trim($_POST['age'] ?? '');
$tel = trim($_POST['tel'] ?? '');
$city = trim($_POST['city'] ?? '');
$rost = trim($_POST['rost'] ?? '');
$ves = trim($_POST['ves'] ?? '');
$staj = trim($_POST['staj'] ?? '');
$fizNagr = trim($_POST['fizNagr'] ?? '');
$zabolevaniya = trim($_POST['zabolevaniya'] ?? '');
$davlenie = trim($_POST['davlenie'] ?? '');
$chrono = trim($_POST['chrono'] ?? '');
$opora = trim($_POST['opora'] ?? '');
$perenosimost = trim($_POST['perenosimost'] ?? '');
$level = trim($_POST['level'] ?? '');
$prohod = trim($_POST['prohod'] ?? '');
$perenosimostGori = trim($_POST['perenosimostGori'] ?? '');
$ravn = trim($_POST['ravn'] ?? '');
$comment = trim($_POST['comment'] ?? '');

// Проверяем обязательные поля
if (empty($age) || empty($tel) || empty($city)) {
    $_SESSION['error'] = 'Пожалуйста, заполните все обязательные поля (возраст, телефон, город)';
    ob_end_clean();
    header('Location: /lk/lk.php');
    exit;
}

// Проверяем, существует ли уже запись для этого пользователя
$checkStmt = $connect->prepare('SELECT id FROM tour_requests WHERE user_id = ? LIMIT 1');
if (!$checkStmt) {
    $_SESSION['error'] = 'Ошибка подготовки запроса: ' . $connect->error;
    ob_end_clean();
    header('Location: /lk/lk.php');
    exit;
}

$checkStmt->bind_param('i', $userId);
$checkStmt->execute();
$result = $checkStmt->get_result();
$existingRecord = $result->fetch_assoc();
$checkStmt->close();

if ($existingRecord) {
    // Обновляем существующую запись
    $updateStmt = $connect->prepare('
        UPDATE tour_requests SET 
            age = ?, tel = ?, city = ?, rost = ?, ves = ?, staj = ?, 
            fizNagr = ?, zabolevaniya = ?, davlenie = ?, chrono = ?, 
            opora = ?, perenosimost = ?, level = ?, prohod = ?, 
            perenosimostGori = ?, ravn = ?, comment = ?
        WHERE user_id = ?
    ');

    if (!$updateStmt) {
        $_SESSION['error'] = 'Ошибка подготовки запроса обновления: ' . $connect->error;
        ob_end_clean();
        header('Location: /lk/lk.php');
        exit;
    }

    $updateStmt->bind_param(
        'sssssssssssssssssi',
        $age,
        $tel,
        $city,
        $rost,
        $ves,
        $staj,
        $fizNagr,
        $zabolevaniya,
        $davlenie,
        $chrono,
        $opora,
        $perenosimost,
        $level,
        $prohod,
        $perenosimostGori,
        $ravn,
        $comment,
        $userId
    );

    if (!$updateStmt->execute()) {
        $_SESSION['error'] = 'Ошибка обновления данных: ' . $updateStmt->error;
        ob_end_clean();
        header('Location: /lk/lk.php');
        exit;
    }

    $updateStmt->close();

    $_SESSION['success'] = 'Анкета успешно обновлена!';
    ob_end_clean();
    header("Location: /lk/lk.php");
    exit();

} else {
    // Создаем новую запись
    $insertStmt = $connect->prepare('
        INSERT INTO tour_requests (
            user_id, age, tel, city, rost, ves, staj, 
            fizNagr, zabolevaniya, davlenie, chrono, 
            opora, perenosimost, level, prohod, 
            perenosimostGori, ravn, comment
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ');

    if (!$insertStmt) {
        $_SESSION['error'] = 'Ошибка подготовки запроса вставки: ' . $connect->error;
        ob_end_clean();
        header('Location: /lk/lk.php');
        exit;
    }

    $insertStmt->bind_param(
        'isssssssssssssssss',
        $userId,
        $age,
        $tel,
        $city,
        $rost,
        $ves,
        $staj,
        $fizNagr,
        $zabolevaniya,
        $davlenie,
        $chrono,
        $opora,
        $perenosimost,
        $level,
        $prohod,
        $perenosimostGori,
        $ravn,
        $comment
    );

    if (!$insertStmt->execute()) {
        $_SESSION['error'] = 'Ошибка сохранения данных: ' . $insertStmt->error;
        ob_end_clean();
        header('Location: /lk/lk.php');
        exit;
    }

    $insertStmt->close();
    $_SESSION['success'] = 'Анкета успешно сохранена!';
    ob_end_clean();
    header("Location: /lk/lk.php");
    exit;
}