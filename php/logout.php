<?php
session_start();
session_unset();
session_destroy();

// If called via browser, redirect to home; if via XHR, return JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => true]);
} else {
    header('Location: /index.php');
}
?>


