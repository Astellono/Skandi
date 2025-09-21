<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
if (isset($_SESSION["user_id"])) {
  $userId = $_SESSION["user_id"];

  $query = "SELECT 
  age, 
  tel, 
  city, 
  rost, 
  ves, 
  staj, 
  fizNagr, 
  zabolevaniya, 
  davlenie, 
  chrono, 
  opora, 
  perenosimost, 
  level, 
  prohod, 
  perenosimostGori, 
  ravn, 
  comment
FROM 
  tour_requests
  WHERE
  user_id = '$userId'
";
  $ancetaResult = $connect->query($query);

  $ancetaData = [];
  if ($ancetaResult->num_rows > 0) {
    while ($row = $ancetaResult->fetch_assoc()) {
      $ancetaData[] = $row;
    }
  }
 
}
