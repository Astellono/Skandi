<?php
session_start();
ob_start();
require_once 'connect.php';

// Очищаем старые сообщения перед обработкой нового запроса
unset($_SESSION['forgot_password_error']);
unset($_SESSION['forgot_password_success']);

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['user_email'] ?? '');
    
    if (empty($email)) {
        $_SESSION['forgot_password_error'] = 'Пожалуйста, введите email';
        ob_end_clean();
        header('Location: /forgot_password_result.php');
        exit;
    }
    
    // Проверяем, существует ли пользователь с таким email
    $query = $connect->prepare("SELECT user_id, user_name FROM users WHERE user_email = ?");
    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        
        // Генерируем токен для сброса пароля
        $token = bin2hex(random_bytes(32));
        $token_expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Токен действителен 1 час
        
        // Сохраняем токен в базе данных
        $update_query = $connect->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE user_email = ?");
        $update_query->bind_param('sss', $token, $token_expiry, $email);
        
        if ($update_query->execute()) {
            // Формируем ссылку для сброса пароля
            $reset_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
                         "://" . $_SERVER['HTTP_HOST'] . 
                         "/reset_password_page.php?token=" . $token;
            
            // Отправляем email
            $subject = "Password";
            $message = "Здравствуйте, " . $user_data['user_name'] . "!\n\n";
            $message .= "Вы запросили восстановление пароля. Перейдите по ссылке ниже, чтобы установить новый пароль:\n\n";
            $message .= $reset_link . "\n\n";
            $message .= "Ссылка действительна в течение 1 часа.\n\n";
            $message .= "Если вы не запрашивали восстановление пароля, проигнорируйте это письмо.";
            
            $headers = "From: PoMiru@" . $_SERVER['HTTP_HOST'] . "\r\n";
            $headers .= "Reply-To: PoMiru@" . $_SERVER['HTTP_HOST'] . "\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            // Отправляем email
            $mail_sent = @mail($email, $subject, $message, $headers);
            
            // Сохраняем сообщение об успехе в сессии
            $_SESSION['forgot_password_success'] = 'Письмо с инструкциями по восстановлению пароля отправлено на указанный email. Если письмо не пришло в течение нескольких минут, проверьте папку "Спам".';
        } else {
            $_SESSION['forgot_password_error'] = 'Ошибка при обработке запроса. Попробуйте позже.';
        }
    } else {
        // Email не найден в системе
        $_SESSION['forgot_password_error'] = 'Пользователь с указанным email не найден в системе. Проверьте правильность введенного адреса.';
    }
    
    ob_end_clean();
    header('Location: /forgot_password_result.php');
    exit;
} else {
    ob_end_clean();
    header('Location: /');
    exit;
}
?>

