<!-- <?php
$name = $_GET['name'];
if ($_POST['fio'] == '') {

    exit(1);

}
if (isset($_POST['fio'])) {
    $fio = $_POST['fio'];
}
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
if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
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
$email = $name; // от кого
$sub = '=?UTF-8?B?' . base64_encode($sub) . '?=';
$email = '=?UTF-8?B?' . base64_encode($email) . '?=';
$send = mail($myaddres, $sub, $mes, "Content-type:text/plain; charset = utf-8\r\nFrom:$email <pomiruspalkami@website.ru>");

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

</html> -->




<?php
session_start();
require_once '../../phpLogin/connect.php';

if (!isset($_SESSION['user_id'])) {
    die('Вы не авторизованы');
}

$user_id = $_SESSION['user_id'];

// Проверяем, существует ли пользователь в таблице users
$check_user = $connect->prepare('SELECT id FROM users WHERE id = ?');
$check_user->bind_param('i', $user_id);
$check_user->execute();
$check_user->store_result();
if ($check_user->num_rows === 0) {
    die('Пользователь с таким user_id не найден в таблице users');
}

// Получаем все поля из POST
$fio = $_POST['fio'] ?? '';
$age = $_POST['age'] ?? '';
$tel = $_POST['tel'] ?? '';
$city = $_POST['city'] ?? '';
$email = $_POST['email'] ?? '';
$ves = $_POST['ves'] ?? '';
$rost = $_POST['rost'] ?? '';
$staj = $_POST['staj'] ?? '';
$fizNagr = $_POST['fizNagr'] ?? '';
$zabolevaniya = $_POST['zabolevaniya'] ?? '';
$davlenie = $_POST['davlenie'] ?? '';
$chrono = $_POST['chrono'] ?? '';
$opora = $_POST['opora'] ?? '';
$perenosimost = $_POST['perenosimost'] ?? '';
$level = $_POST['level'] ?? '';
$prohod = $_POST['prohod'] ?? '';
$perenosimostGori = $_POST['perenosimostGori'] ?? '';
$ravn = $_POST['ravn'] ?? '';
$comment = $_POST['comment'] ?? '';

// Логируем всё в debug.log
file_put_contents('debug.log', print_r([
    'user_id' => $user_id,
    'POST' => $_POST
], true), FILE_APPEND);

// Проверяем — заявка уже существует?
$check = $connect->prepare('SELECT id FROM tour_requests WHERE user_id = ?');
$check->bind_param('i', $user_id);
$check->execute();
$result = $check->get_result();

if ($result && $result->num_rows > 0) {
    $stmt = $connect->prepare("UPDATE tour_requests SET
        fio=?, age=?, tel=?, city=?, email=?, rost=?, ves=?, staj=?,
        fizNagr=?, zabolevaniya=?, davlenie=?, chrono=?, opora=?,
        perenosimost=?, level=?, prohod=?, perenosimostGori=?, ravn=?, comment=?
        WHERE user_id=?");

    if (!$stmt) {
        file_put_contents('debug.log', "Ошибка подготовки UPDATE: " . $connect->error . "\n", FILE_APPEND);
        die('Ошибка подготовки UPDATE: ' . $connect->error);
    }

    $stmt->bind_param(
        'sssssssssssssssssssi',
        $fio, $age, $tel, $city, $email, $rost, $ves, $staj,
        $fizNagr, $zabolevaniya, $davlenie, $chrono, $opora,
        $perenosimost, $level, $prohod, $perenosimostGori, $ravn, $comment,
        $user_id
    );
} else {
    $stmt = $connect->prepare("INSERT INTO tour_requests (
        user_id, fio, age, tel, city, email, rost, ves, staj,
        fizNagr, zabolevaniya, davlenie, chrono, opora, perenosimost,
        level, prohod, perenosimostGori, ravn, comment
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        file_put_contents('debug.log', "Ошибка подготовки INSERT: " . $connect->error . "\n", FILE_APPEND);
        die('Ошибка подготовки INSERT: ' . $connect->error);
    }

    $stmt->bind_param(
        'issssssssssssssssss',
        $user_id, $fio, $age, $tel, $city, $email, $rost, $ves, $staj,
        $fizNagr, $zabolevaniya, $davlenie, $chrono, $opora,
        $perenosimost, $level, $prohod, $perenosimostGori, $ravn, $comment
    );
}

if (!$stmt->execute()) {
    file_put_contents('debug.log', "Ошибка выполнения запроса: " . $stmt->error . "\n", FILE_APPEND);
    die('Ошибка выполнения запроса: ' . $stmt->error);
}

header('Content-Type: text/html; charset=UTF-8');
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
    </script>
</head>
<body>
    <img src="https://www.pomiru-spalkami.ru/img/lesson/solo.png" alt="" srcset="">
    <h1>Спасибо! Мы свяжемся с вами!</h1>
</body>
</html>