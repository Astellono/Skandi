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
    $excursionLinkId = isset($_GET['id']) ? trim($_GET['id']) : '';
    
    // Инициализируем переменные
    $fio = '';
    $age = '';
    $tel = '';
    $email = '';
    $comment = '';

    // Проверяем наличие обязательных полей
    if (!isset($_POST['fio']) || trim($_POST['fio']) == '') {
        die('Ошибка: не заполнено поле ФИО');
    }
    
    $fio = isset($_POST['fio']) ? trim($_POST['fio']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';
    $tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    // Сохраняем запись в БД, если пользователь авторизован
    if (isset($_SESSION['user_id']) && isset($connect) && $connect instanceof mysqli) {
        try {
            $userId = (int) $_SESSION['user_id'];
            $excursionName = trim($name);
            
            // Определяем дату экскурсии на основе названия (можно расширить)
            $excursionDate = null;
            if (strpos($excursionName, 'Северный маршрут') !== false) {
                $excursionDate = '2025-12-06';
            } elseif (strpos($excursionName, 'Остров') !== false) {
                $excursionDate = '2025-12-13';
            } elseif (strpos($excursionName, 'Вахтангов') !== false || strpos($excursionName, 'Новогодняя') !== false) {
                $excursionDate = '2025-12-20';
            } elseif (strpos($excursionName, 'Из прошлого') !== false || strpos($excursionName, 'Москва-Сити') !== false) {
                $excursionDate = '2026-01-17';
            }
            
            // Проверяем, существует ли таблица, если нет - создаем
            $checkTable = $connect->query("SHOW TABLES LIKE 'excursion_signings'");
            if ($checkTable === false) {
                // Ошибка запроса, но продолжаем работу
            } elseif ($checkTable->num_rows == 0) {
                $createTable = "CREATE TABLE IF NOT EXISTS `excursion_signings` (
                    `excursion_id` INT(11) NOT NULL AUTO_INCREMENT,
                    `user_id` INT(11) NOT NULL,
                    `excursion_name` VARCHAR(255) NOT NULL,
                    `excursion_link_id` VARCHAR(100) DEFAULT NULL,
                    `excursion_date` DATE DEFAULT NULL,
                    `fio` VARCHAR(255) DEFAULT NULL,
                    `age` VARCHAR(50) DEFAULT NULL,
                    `tel` VARCHAR(50) DEFAULT NULL,
                    `email` VARCHAR(255) DEFAULT NULL,
                    `comment` TEXT DEFAULT NULL,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (`excursion_id`),
                    KEY `user_id` (`user_id`),
                    KEY `excursion_link_id` (`excursion_link_id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                $connect->query($createTable);
            } else {
                // Проверяем, есть ли поле excursion_link_id, если нет - добавляем
                $checkColumn = $connect->query("SHOW COLUMNS FROM `excursion_signings` LIKE 'excursion_link_id'");
                if ($checkColumn && $checkColumn->num_rows == 0) {
                    $alterTable = "ALTER TABLE `excursion_signings` ADD COLUMN `excursion_link_id` VARCHAR(100) DEFAULT NULL AFTER `excursion_name`, ADD KEY `excursion_link_id` (`excursion_link_id`)";
                    $connect->query($alterTable);
                }
            }
            
            // Сохраняем запись с excursion_link_id
            if ($excursionDate === null) {
                // Если дата не определена, используем NULL
                $insertStmt = $connect->prepare('
                    INSERT INTO excursion_signings 
                    (user_id, excursion_name, excursion_link_id, excursion_date, fio, age, tel, email, comment) 
                    VALUES (?, ?, ?, NULL, ?, ?, ?, ?, ?)
                ');
                if ($insertStmt) {
                    $insertStmt->bind_param('isssssss', 
                        $userId, 
                        $excursionName, 
                        $excursionLinkId, 
                        $fio, 
                        $age, 
                        $tel, 
                        $email, 
                        $comment
                    );
                }
            } else {
                $insertStmt = $connect->prepare('
                    INSERT INTO excursion_signings 
                    (user_id, excursion_name, excursion_link_id, excursion_date, fio, age, tel, email, comment) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                ');
                if ($insertStmt) {
                    $insertStmt->bind_param('issssssss', 
                        $userId, 
                        $excursionName, 
                        $excursionLinkId, 
                        $excursionDate, 
                        $fio, 
                        $age, 
                        $tel, 
                        $email, 
                        $comment
                    );
                }
            }
            
            if ($insertStmt && !$insertStmt->execute()) {
                // Ошибка при сохранении, но продолжаем отправку email
                error_log('Ошибка сохранения записи на экскурсию: ' . $insertStmt->error);
            }
            if ($insertStmt) {
                $insertStmt->close();
            }
        } catch (Exception $e) {
            // Логируем ошибку, но продолжаем отправку email
            error_log('Ошибка при сохранении записи на экскурсию: ' . $e->getMessage());
        }
    }

    /* Сюда впишите свою эл. почту */
    $myaddres = "pomiruspalkami@yandex.ru"; // кому отправляем

    /* А здесь прописывается текст сообщения, \n - перенос строки */
    $mes = "ФИО: " . ($fio ?: 'не указано') . "\n" .
           "Возраст: " . ($age ?: 'не указано') . "\n" .
           "Телефон: " . ($tel ?: 'не указано') . "\n" .
           "Email: " . ($email ?: 'не указано') . "\n" .
           "Комментарий, промокод:\nОтвет: " . ($comment ?: 'нет') . "\n";

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