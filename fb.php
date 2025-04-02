<?php
if (isset($_POST['contactFF'])) {


$to = 'pomiruspalkami@yandex.ru';
$mail = $_POST['contactFF'];
$from = 'Обратная связь';
$subject = $_POST['nameFF'];

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
$from = '=?UTF-8?B?'.base64_encode($from).'?=';
$message = "Имя: " . $_POST['nameFF'] . "\nEmail: " . $mail  . "\nСообщение: " . $_POST['messageFF'];



    // Генерируем уникальный boundary
    $boundary = md5(time());
    
    // Заголовки
    $headers = "From: $from <pomiruspalkami@website.ru>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
 
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
    
    // Тело письма
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= $message . "\r\n\r\n";
    
    // Обрабатываем картинку
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['image']['type'];
        
        if (in_array($file_type, $allowed_types)) {
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_name = $_FILES['image']['name'];
            $file_content = file_get_contents($file_tmp);
            $file_encoded = chunk_split(base64_encode($file_content));
            
            $body .= "--$boundary\r\n";
            $body .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n";
            $body .= $file_encoded . "\r\n";
        } else {
            die('Допустимы только изображения в формате JPG, PNG или GIF');
        }
    }
    
    // Добавляем вложение
    $body .= "--$boundary--";
    
    // Отправляем письмо
    if (mail($to, $subject, $body, $headers)) {
        echo 'Спасибо за отзыв!';
        
    } else {
        echo 'Ошибка при отправке письма.';
    }
} else {
    echo 'Ошибка загрузки файла.';
}




?>
<script type="text/javascript">
setTimeout('location.replace("/index.html")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 