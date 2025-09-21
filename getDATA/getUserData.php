<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
if ($_SESSION) {
    $userId = (int) $_SESSION['user_id'];
}
function prepare_first_success(mysqli $db, array $sqlVariants)
{
    foreach ($sqlVariants as $sql) {
        $stmt = $db->prepare($sql);
        if ($stmt !== false) {
            return $stmt;
        }
    }
    return false;
}
$userStmt = prepare_first_success($connect, [
    'SELECT * FROM users WHERE user_id = ? LIMIT 1',
]);
if ($userStmt === false) {
    die('Ошибка запроса профиля пользователя: ' . $connect->error);
}
$userStmt->bind_param('i', $userId);
$userStmt->execute();
$userRes = $userStmt->get_result();
$user = $userRes ? $userRes->fetch_assoc() : null;
?>