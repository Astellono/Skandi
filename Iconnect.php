<?php
session_start();
require_once 'phpLogin/connect.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_query = $connect->query("SELECT * FROM users WHERE id = '$user_id'");
    $user_data = $user_query->fetch_assoc();

} else {
    $user_id = '';
}


