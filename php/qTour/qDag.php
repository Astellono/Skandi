<?php
/* Здесь проверяется существование переменных */
if ($_POST['name'] == '') {
    
    exit(1);
    
}
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['message'])) {$message = $_POST['message'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
/* Сюда впишите свою эл. почту */
$myaddres  = "pomiruspalkami@yandex.ru"; // кому отправляем
 
/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes = "Имя: $name\nТелефон: $tel \nemail: $email\nВопрос: $message";
 
/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub=$name; //сабж
$email='Вопрос Дагестан'; // от кого
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