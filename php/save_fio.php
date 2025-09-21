<?php
session_start();
require_once '../phpLogin/connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}





