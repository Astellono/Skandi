<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .reset-password-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="reset-password-container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Восстановление пароля</h4>
                <?php
                session_start();
                // Читаем и сразу удаляем сообщения из сессии, чтобы они не оставались после перезагрузки
                $resetError = '';
                $resetSuccess = '';
                if (isset($_SESSION['reset_password_error'])) {
                    $resetError = $_SESSION['reset_password_error'];
                    unset($_SESSION['reset_password_error']);
                }
                if (isset($_SESSION['reset_password_success'])) {
                    $resetSuccess = $_SESSION['reset_password_success'];
                    unset($_SESSION['reset_password_success']);
                }
                ?>
                <?php if (!empty($resetError)): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($resetError); ?></div>
                <?php endif; ?>
                <?php if (!empty($resetSuccess)): ?>
                    <div class="alert alert-success"><?php echo htmlspecialchars($resetSuccess); ?></div>
                <?php endif; ?>
                <form id="resetPasswordForm" action="/phpLogin/reset_password.php" method="POST">
                    <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Новый пароль</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" minlength="6" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Подтвердите пароль</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="6" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Изменить пароль</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="/" class="text-decoration-none">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

