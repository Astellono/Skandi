<?php
/* Здесь проверяется существование переменных */
if (isset($_POST['fio'])) {$fio = $_POST['fio'];}
if (isset($_POST['age'])) {$age = $_POST['age'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['ves'])) {$ves = $_POST['ves'];}
if (isset($_POST['rost'])) {$rost = $_POST['rost'];}
if (isset($_POST['staj'])) {$staj = $_POST['staj'];}
if (isset($_POST['fizNagr'])) {$fizNagr = $_POST['fizNagr'];}
if (isset($_POST['zabolevaniya'])) {$zabolevaniya = $_POST['zabolevaniya'];}
if (isset($_POST['davlenie'])) {$davlenie = $_POST['davlenie'];}
if (isset($_POST['chrono'])) {$chrono = $_POST['chrono'];}
if (isset($_POST['opora'])) {$opora = $_POST['opora'];}
if (isset($_POST['perenosimost'])) {$perenosimost = $_POST['perenosimost'];}
if (isset($_POST['level'])) {$level = $_POST['level'];}
if (isset($_POST['prohod'])) {$prohod = $_POST['prohod'];}
if (isset($_POST['perenosimostGori'])) {$perenosimostGori = $_POST['perenosimostGori'];}
if (isset($_POST['ravn'])) {$ravn = $_POST['ravn'];}

/* Сюда впишите свою эл. почту */
$myaddres  = "milko-v@yandex.ru"; // кому отправляем
 
/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes = 
"ФИО: $fio
Возраст: $age
Ваш рост: $rost
Ваш телефон: $tel
Ваш email: $email
Ваш вес (на некоторых маршрутах лишиний вес является противопоказанием): $ves
Стаж занятия Скандинавской ходьбой: $staj \n
Занимаетесь ли Вы активно физическими нагрузками? Какими?\n$fizNagr\n
Есть ли сердечно-сосудистные заболевания?\n$zabolevaniya\n
Бывает ли повышенное или пониженное давление? Какое именно?\n$davlenie\n
Хронические заболевания?\n$chrono\n
Заболевания опорно-двигательного аппарата?\n$opora\n
На какие расстояния ходите?\n$perenosimost\n
Как переносите сложные маршруты со спусками и подъемами?\n$level\n
Готовы ли проходить в среднем 15 - 20 км?\n$prohod\n
Как переносите нагрузки на горных маршрутах?\n$perenosimostGori\n
Вам подходят только равнинные маршруты?\n$ravn\n";
 
 
/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub="Анкета $fio"; //сабж
$email="Архыз"; // от кого
$send = mail ($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email <pomiruspalkami@website.ru>");
 
ini_set('short_open_tag', 'On');
header('Refresh: 3; URL=index.html');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="3; url=index.html">
<title>Спасибо! Мы свяжемся с вами!</title>
<meta name="generator">
<script type="text/javascript">
setTimeout('location.replace("/index.html")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 
</head>
<body>
<h1>Спасибо! Мы свяжемся с вами!</h1>
</body>
</html>