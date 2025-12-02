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
        .result-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Восстановление пароля</h4>
                <?php
                session_start();
                // Читаем и сразу удаляем сообщения из сессии
                $error = '';
                $success = '';
                if (isset($_SESSION['forgot_password_error'])) {
                    $error = $_SESSION['forgot_password_error'];
                    unset($_SESSION['forgot_password_error']);
                }
                if (isset($_SESSION['forgot_password_success'])) {
                    $success = $_SESSION['forgot_password_success'];
                    unset($_SESSION['forgot_password_success']);
                }
                ?>
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <h5 class="alert-heading">Ошибка</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($error); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success">
                        <h5 class="alert-heading">Письмо отправлено</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($success); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (empty($error) && empty($success)): ?>
                    <div class="alert alert-info">
                        <p class="mb-0">Нет данных для отображения. Вернитесь на главную страницу.</p>
                    </div>
                <?php endif; ?>
                
                <div class="d-flex gap-2 justify-content-center">
                    <a href="/" class="btn btn-primary">Вернуться на главную</a>
                    <a href="/" class="btn btn-outline-secondary" onclick="window.history.back(); return false;">Назад</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

