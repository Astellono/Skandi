<?php
session_start();
require_once '../phpLogin/connect.php';
$user_id = $_SESSION['user_id'];
$tour_id = $_GET['idTour'];
print_r($user_id);
print_r($tour_id);

$sql = "INSERT INTO `signing` (`signing_id`, `signing_user_id`, `signing_tour_id`) VALUES (NULL, '$user_id', '$tour_id');";
if ($connect->query($sql)) {
    echo "Данные успешно добавлены";
} else {
    echo "Ошибка: " . $conn->error;
}
?>