<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

$tour = null;
$isEdit = false;

// Если передан ID, загружаем тур для редактирования
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $tour_id = (int)$_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM tours WHERE tour_id = ?");
    $stmt->bind_param('i', $tour_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $tour = $result->fetch_assoc();
        $isEdit = true;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEdit ? 'Редактирование тура' : 'Добавление тура'; ?> - Админ-панель</title>
    <link rel="stylesheet" href="/admin/style/admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1><?php echo $isEdit ? 'Редактирование тура' : 'Добавление тура'; ?></h1>
            <div class="admin-header-actions">
                <a href="/admin/admin.php" class="btn btn-secondary">← Назад к списку</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выход</a>
            </div>
        </header>

        <main class="admin-main">
            <div class="admin-section">
                <form id="tourForm" class="tour-form">
                    <input type="hidden" name="tour_id" value="<?php echo $tour ? $tour['tour_id'] : ''; ?>">
                    
                    <div class="form-group">
                        <label for="tour_name">Название тура *</label>
                        <input type="text" id="tour_name" name="tour_name" required 
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_name']) : ''; ?>"
                               placeholder="Например: Торжок: Императорский шаг">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tour_date_start">Дата начала *</label>
                            <input type="date" id="tour_date_start" name="tour_date_start" required
                                   value="<?php echo $tour && $tour['tour_date_start'] ? date('Y-m-d', strtotime($tour['tour_date_start'])) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="tour_date_end">Дата окончания *</label>
                            <input type="date" id="tour_date_end" name="tour_date_end" required
                                   value="<?php echo $tour && $tour['tour_date_end'] ? date('Y-m-d', strtotime($tour['tour_date_end'])) : ''; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_date">Текстовая дата (для отображения)</label>
                        <input type="text" id="tour_date" name="tour_date"
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_date']) : ''; ?>"
                               placeholder="Например: 12 декабря - 14 декабря 2025г">
                        <small>Это поле используется для отображения даты на сайте</small>
                    </div>

                    <div class="form-group">
                        <label for="tour_linkPage">Ссылка на страницу тура *</label>
                        <input type="text" id="tour_linkPage" name="tour_linkPage" required
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_linkPage']) : 'page_tour/TestTour.php'; ?>"
                               placeholder="page_tour/torzhok.php">
                    </div>

                    <div class="form-group">
                        <label for="tour_imgSrc">Путь к изображению *</label>
                        <input type="text" id="tour_imgSrc" name="tour_imgSrc" required
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_imgSrc']) : 'img/act-tour/TestTour.jpg'; ?>"
                               placeholder="img/act-tour/torzhok.jpg">
                    </div>

                    <div class="form-group">
                        <label for="tour_color">Цвет (для календаря) *</label>
                        <div class="color-input-group">
                            <input type="color" id="tour_color_picker" 
                                   value="<?php echo $tour && $tour['tour_color'] ? $tour['tour_color'] : '#4a90e2'; ?>">
                            <input type="text" id="tour_color" name="tour_color" required
                                   value="<?php echo $tour ? htmlspecialchars($tour['tour_color']) : '#4a90e2'; ?>"
                                   placeholder="#4a90e2 или rgba(74, 144, 226, 1)">
                        </div>
                        <small>Можно использовать hex (#4a90e2) или rgba/rgb формат</small>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <?php echo $isEdit ? 'Сохранить изменения' : 'Добавить тур'; ?>
                        </button>
                        <a href="/admin/admin.php" class="btn btn-secondary">Отмена</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="/admin/js/admin.js"></script>
    <script>
        // Синхронизация color picker с текстовым полем
        document.getElementById('tour_color_picker').addEventListener('input', function(e) {
            // Конвертируем hex в rgb для совместимости
            const hex = e.target.value;
            const r = parseInt(hex.slice(1, 3), 16);
            const g = parseInt(hex.slice(3, 5), 16);
            const b = parseInt(hex.slice(5, 7), 16);
            document.getElementById('tour_color').value = `rgb(${r}, ${g}, ${b})`;
        });

        // Обработка отправки формы
        document.getElementById('tourForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            try {
                const response = await fetch('/admin/api/save_tour.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('Тур успешно сохранен!');
                    window.location.href = '/admin/admin.php';
                } else {
                    alert('Ошибка: ' + (result.message || 'Не удалось сохранить тур'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Произошла ошибка при сохранении тура');
            }
        });
    </script>
</body>
</html>

