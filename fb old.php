<?php
if (isset($_POST['contactFF'])) {
  $to = "pomiruspalkami@yandex.ru";
  // поменять на свой электронный адрес
  $mail = $_POST['contactFF'];
  $mail = '=?UTF-8?B?' . base64_encode($mail) . '?=';
  $from = 'Обратная связь';
  $from = '=?UTF-8?B?' . base64_encode($from) . '?=';
  $subject = $_POST['nameFF'];
  $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

  $message = "Имя: " . $_POST['nameFF'] . "\nEmail: " . $mail . "\nIP: " . $_SERVER['REMOTE_ADDR'] . "\nСообщение: " . $_POST['messageFF'];
  $boundary = md5(date('r', time()));
  $filesize = '';

  $message = "
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message";
  for ($i = 0; $i < count($_FILES['fileFF']['name']); $i++) {
    if (is_uploaded_file($_FILES['fileFF']['tmp_name'][$i])) {
      $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'][$i])));
      $filename = $_FILES['fileFF']['name'][$i];
      $filetype = $_FILES['fileFF']['type'][$i];
      $filesize += $_FILES['fileFF']['size'][$i];
      $message .= "

--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
    }
  }
  $message .= "
--$boundary--";

  if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
    mail($to, $subject, $message, "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n; charset = utf-8\r\nFrom:$from");
    // mail($to, $subject, $message, $headers);
    echo $_POST['nameFF'] . ', Ваше сообщение получено, спасибо!';
  } else {
    echo 'Извините, письмо не отправлено. Размер всех файлов превышает 10 МБ.';
  }
}
?>