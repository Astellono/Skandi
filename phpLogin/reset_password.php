<?php
session_start();
ob_start();
require_once 'connect.php';

// Очищаем старые сообщения перед обработкой нового запроса
unset($_SESSION['reset_password_error']);
unset($_SESSION['reset_password_success']);

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = trim($_POST['token'] ?? '');
    $new_password = trim($_POST['new_password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
    
    if (empty($token) || empty($new_password) || empty($confirm_password)) {
        $_SESSION['reset_password_error'] = 'Все поля обязательны для заполнения';
        ob_end_clean();
        header('Location: /reset_password_page.php?token=' . urlencode($token));
        exit;
    }
    
    if ($new_password !== $confirm_password) {
        $_SESSION['reset_password_error'] = 'Пароли не совпадают';
        ob_end_clean();
        header('Location: /reset_password_page.php?token=' . urlencode($token));
        exit;
    }
    
    if (strlen($new_password) < 6) {
        $_SESSION['reset_password_error'] = 'Пароль должен содержать минимум 6 символов';
        ob_end_clean();
        header('Location: /reset_password_page.php?token=' . urlencode($token));
        exit;
    }
    
    // Проверяем токен
    $query = $connect->prepare("SELECT user_id FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $query->bind_param('s', $token);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $user_id = $user_data['user_id'];
        
        // Хешируем новый пароль
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Обновляем пароль и очищаем токен
        $update_query = $connect->prepare("UPDATE users SET user_pass = ?, reset_token = NULL, reset_token_expiry = NULL WHERE user_id = ?");
        $update_query->bind_param('si', $hashed_password, $user_id);
        
        if ($update_query->execute()) {
            $_SESSION['reset_password_success'] = 'Пароль успешно изменен. Теперь вы можете войти с новым паролем.';
            ob_end_clean();
            header('Location: /');
            exit;
        } else {
            $_SESSION['reset_password_error'] = 'Ошибка при обновлении пароля. Попробуйте позже.';
            ob_end_clean();
            header('Location: /reset_password_page.php?token=' . urlencode($token));
            exit;
        }
    } else {
        $_SESSION['reset_password_error'] = 'Недействительная или истекшая ссылка для восстановления пароля.';
        ob_end_clean();
        header('Location: /reset_password_page.php?token=' . urlencode($token));
        exit;
    }
} else {
    ob_end_clean();
    header('Location: /');
    exit;
}
?>

