<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
ob_start();
require_once 'connect.php';




$name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
$email = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';
$pass = isset($_POST['user_pass']) ? trim($_POST['user_pass']) : '';



// Check existence
$stmt = $connect->prepare('SELECT user_id FROM users WHERE user_email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();


$hash = password_hash($pass, PASSWORD_DEFAULT);

$stmtIns = $connect->prepare('INSERT INTO users (user_name, user_email, user_pass) VALUES (?, ?, ?)');
$stmtIns->bind_param('sss', $name, $email, $hash);
if ($stmtIns->execute()) {
    $newId = $stmtIns->insert_id;
    $_SESSION['user_id'] = (int) $newId;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    ob_end_clean();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
    
?>