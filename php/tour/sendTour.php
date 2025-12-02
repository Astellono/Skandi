<?php
    // Включаем отображение ошибок для отладки (можно убрать в продакшене)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    session_start();
    require_once '../../phpLogin/connect.php';
    
    // Проверяем подключение к БД
    if (!isset($connect) || !($connect instanceof mysqli)) {
        error_log('Ошибка: не удалось подключиться к базе данных');
        // Продолжаем работу, даже если БД недоступна
    } elseif ($connect->connect_error) {
        error_log('Ошибка подключения к БД: ' . $connect->connect_error);
    }
    
    $name = isset($_GET['name']) ? urldecode($_GET['name']) : '';
    $tourId = isset($_GET['idTour']) ? (int)$_GET['idTour'] : null;
    
    // Инициализируем переменные
    $fio = '';
    $age = '';
    $tel = '';
    $city = '';
    $email = '';
    $ves = '';
    $rost = '';
    $staj = '';
    $fizNagr = '';
    $zabolevaniya = '';
    $davlenie = '';
    $chrono = '';
    $opora = '';
    $perenosimost = '';
    $level = '';
    $prohod = '';
    $perenosimostGori = '';
    $ravn = '';
    $comment = '';

    // Проверяем наличие обязательных полей
    if (!isset($_POST['fio']) || trim($_POST['fio']) == '') {
        die('Ошибка: не заполнено поле ФИО');
    }
    
    $fio = isset($_POST['fio']) ? trim($_POST['fio']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';
    $tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $ves = isset($_POST['ves']) ? trim($_POST['ves']) : '';
    $rost = isset($_POST['rost']) ? trim($_POST['rost']) : '';
    $staj = isset($_POST['staj']) ? trim($_POST['staj']) : '';
    $fizNagr = isset($_POST['fizNagr']) ? trim($_POST['fizNagr']) : '';
    $zabolevaniya = isset($_POST['zabolevaniya']) ? trim($_POST['zabolevaniya']) : '';
    $davlenie = isset($_POST['davlenie']) ? trim($_POST['davlenie']) : '';
    $chrono = isset($_POST['chrono']) ? trim($_POST['chrono']) : '';
    $opora = isset($_POST['opora']) ? trim($_POST['opora']) : '';
    $perenosimost = isset($_POST['perenosimost']) ? trim($_POST['perenosimost']) : '';
    $level = isset($_POST['level']) ? trim($_POST['level']) : '';
    $prohod = isset($_POST['prohod']) ? trim($_POST['prohod']) : '';
    $perenosimostGori = isset($_POST['perenosimostGori']) ? trim($_POST['perenosimostGori']) : '';
    $ravn = isset($_POST['ravn']) ? trim($_POST['ravn']) : '';
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
    
    // Сохраняем запись на тур в БД, если пользователь авторизован
    if (isset($_SESSION['user_id']) && isset($connect) && $connect instanceof mysqli && $tourId) {
        try {
            $userId = (int) $_SESSION['user_id'];
            
            // Проверяем, существует ли таблица signing
            $checkTable = $connect->query("SHOW TABLES LIKE 'signing'");
            if ($checkTable === false) {
                // Ошибка запроса, но продолжаем работу
            } elseif ($checkTable->num_rows == 0) {
                // Создаем таблицу signing, если её нет
                $createTable = "CREATE TABLE IF NOT EXISTS `signing` (
                    `signing_id` INT(11) NOT NULL AUTO_INCREMENT,
                    `signing_user_id` INT(11) NOT NULL,
                    `signing_tour_id` INT(11) NOT NULL,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (`signing_id`),
                    KEY `signing_user_id` (`signing_user_id`),
                    KEY `signing_tour_id` (`signing_tour_id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                $connect->query($createTable);
            }
            
            // Проверяем, не записан ли уже пользователь на этот тур
            $checkStmt = $connect->prepare('SELECT signing_id FROM signing WHERE signing_user_id = ? AND signing_tour_id = ? LIMIT 1');
            if ($checkStmt) {
                $checkStmt->bind_param('ii', $userId, $tourId);
                $checkStmt->execute();
                $checkResult = $checkStmt->get_result();
                
                // Если записи нет, создаем новую
                if ($checkResult->num_rows == 0) {
                    $insertStmt = $connect->prepare('INSERT INTO signing (signing_user_id, signing_tour_id) VALUES (?, ?)');
                    if ($insertStmt) {
                        $insertStmt->bind_param('ii', $userId, $tourId);
                        if (!$insertStmt->execute()) {
                            error_log('Ошибка сохранения записи на тур: ' . $insertStmt->error);
                        }
                        $insertStmt->close();
                    }
                }
                $checkStmt->close();
            }
        } catch (Exception $e) {
            // Логируем ошибку, но продолжаем отправку email
            error_log('Ошибка при сохранении записи на тур: ' . $e->getMessage());
        }
    } elseif (isset($_SESSION['user_id']) && isset($connect) && $connect instanceof mysqli && !$tourId) {
        // Если tour_id не передан, пытаемся найти по названию
        try {
            $userId = (int) $_SESSION['user_id'];
            $tourName = trim($name);
            
            $findTourStmt = $connect->prepare('SELECT tour_id FROM tours WHERE tour_name LIKE ? LIMIT 1');
            if ($findTourStmt) {
                $searchName = '%' . $tourName . '%';
                $findTourStmt->bind_param('s', $searchName);
                $findTourStmt->execute();
                $tourResult = $findTourStmt->get_result();
                
                if ($tourResult && $tourRow = $tourResult->fetch_assoc()) {
                    $tourId = (int) $tourRow['tour_id'];
                    
                    // Проверяем, не записан ли уже пользователь на этот тур
                    $checkStmt = $connect->prepare('SELECT signing_id FROM signing WHERE signing_user_id = ? AND signing_tour_id = ? LIMIT 1');
                    if ($checkStmt) {
                        $checkStmt->bind_param('ii', $userId, $tourId);
                        $checkStmt->execute();
                        $checkResult = $checkStmt->get_result();
                        
                        if ($checkResult->num_rows == 0) {
                            $insertStmt = $connect->prepare('INSERT INTO signing (signing_user_id, signing_tour_id) VALUES (?, ?)');
                            if ($insertStmt) {
                                $insertStmt->bind_param('ii', $userId, $tourId);
                                if (!$insertStmt->execute()) {
                                    error_log('Ошибка сохранения записи на тур: ' . $insertStmt->error);
                                }
                                $insertStmt->close();
                            }
                        }
                        $checkStmt->close();
                    }
                }
                $findTourStmt->close();
            }
        } catch (Exception $e) {
            error_log('Ошибка при поиске тура по названию: ' . $e->getMessage());
        }
    }
/* Сюда впишите свою эл. почту */
$myaddres = "pomiruspalkami@yandex.ru"; // кому отправляем

/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes =
    "ФИО: $fio
Возраст: $age
Рост: $rost
Город: $city
Телефон: $tel
Email: $email
Вес: $ves
Стаж занятия Скандинавской ходьбой: $staj \n
Занимаетесь ли Вы активно физическими нагрузками? Какими?\nОтвет: $fizNagr\n
Есть ли сердечно-сосудистные заболевания?\nОтвет: $zabolevaniya\n
Бывает ли повышенное или пониженное давление? Какое именно?\nОтвет: $davlenie\n
Хронические заболевания?\nОтвет: $chrono\n
Заболевания опорно-двигательного аппарата?\nОтвет: $opora\n
На какие расстояния ходите?\nОтвет: $perenosimost\n
Как переносите сложные маршруты со спусками и подъемами?\nОтвет: $level\n
Готовы ли проходить в среднем 15 - 20 км?\nОтвет: $prohod\n
Как переносите нагрузки на горных маршрутах?\nОтвет: $perenosimostGori\n
Вам подходят только равнинные маршруты?\nОтвет: $ravn\n
Комментарий, промокод:\nОтвет: $comment\n";


    /* А эта функция как раз занимается отправкой письма на указанный вами email */
    $sub = "Анкета $fio"; //сабж
    $emailFrom = $name; // от кого
    $sub = '=?UTF-8?B?' . base64_encode($sub) . '?=';
    $emailFrom = '=?UTF-8?B?' . base64_encode($emailFrom) . '?=';
    $send = mail($myaddres, $sub, $mes, "Content-type:text/plain; charset = utf-8\r\nFrom:$emailFrom <pomiruspalkami@website.ru>");

ini_set('short_open_tag', 'On');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="refresh" content="3; url=index.html">
    <title>Спасибо! Мы свяжемся с вами!</title>
    <meta name="generator">
    <script type="text/javascript">
        setTimeout('location.replace("../../index.php")', 3000);
        /*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
    </script>
</head>

<body>
    <img src="https://www.pomiru-spalkami.ru/img/lesson/solo.png" alt="" srcset="">
    <h1>Спасибо! Мы свяжемся с вами!</h1>
</body>

</html>