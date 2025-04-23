<?php
session_start();
require_once 'connect.php';
$user_id = $_SESSION['user_id'];

if (isset($_POST['age'])) {
    $age = $_POST['age'];
}
if (isset($_POST['tel'])) {
    $tel = $_POST['tel'];
}
if (isset($_POST['city'])) {
    $city = $_POST['city'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['ves'])) {
    $ves = $_POST['ves'];
}
if (isset($_POST['rost'])) {
    $rost = $_POST['rost'];
}
if (isset($_POST['staj'])) {
    $staj = $_POST['staj'];
}
if (isset($_POST['fizNagr'])) {
    $fizNagr = $_POST['fizNagr'];
}
if (isset($_POST['zabolevaniya'])) {
    $zabolevaniya = $_POST['zabolevaniya'];
}
if (isset($_POST['davlenie'])) {
    $davlenie = $_POST['davlenie'];
}
if (isset($_POST['chrono'])) {
    $chrono = $_POST['chrono'];
}
if (isset($_POST['opora'])) {
    $opora = $_POST['opora'];
}
if (isset($_POST['perenosimost'])) {
    $perenosimost = $_POST['perenosimost'];
}
if (isset($_POST['level'])) {
    $level = $_POST['level'];
}
if (isset($_POST['prohod'])) {
    $prohod = $_POST['prohod'];
}
if (isset($_POST['perenosimostGori'])) {
    $perenosimostGori = $_POST['perenosimostGori'];
}
if (isset($_POST['ravn'])) {
    $ravn = $_POST['ravn'];
}


$sql = "INSERT INTO `tour_requests` (`id`, `user_id`, `age`, `tel`, `city`, `rost`, `ves`, `staj`, `fizNagr`, `zabolevaniya`, `davlenie`, `chrono`, `opora`, `perenosimost`, `level`, `prohod`, `perenosimostGori`, `ravn`, `created_at`) 
VALUES (NULL, '$user_id', '$age', '$tel', '$city', '$rost', '$ves', '$staj', '$fizNagr', '$zabolevaniya', '$davlenie', '$chrono', '$opora', '$perenosimost', '$level', '$prohod', '$perenosimostGori', '$ravn', CURRENT_TIMESTAMP);";
if($connect->query($sql)){
    header('Location: '. '/lk/lk.php');
} else{
    echo "Ошибка: " . $connect->error;
}