<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

// Параметры сортировки
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'order';
$sort_order = isset($_GET['sort_order']) ? strtoupper($_GET['sort_order']) : 'ASC';

// Разрешенные поля для сортировки
$allowed_sort_fields = ['lesson_id', 'park_name', 'order'];
$allowed_sort_orders = ['ASC', 'DESC'];

// Валидация параметров сортировки
if (!in_array($sort_by, $allowed_sort_fields)) {
    $sort_by = 'order';
}
if (!in_array($sort_order, $allowed_sort_orders)) {
    $sort_order = 'ASC';
}

// Проверяем существование таблицы
$tableExists = false;
$tableCheck = $connect->query("SHOW TABLES LIKE 'lessons_schedule'");
if ($tableCheck && $tableCheck->num_rows > 0) {
    $tableExists = true;
    
    // Получаем список всех занятий с сортировкой
    // Используем обратные кавычки для поля order, так как это зарезервированное слово
    $sortField = ($sort_by === 'order') ? '`order`' : $sort_by;
    $query = "SELECT * FROM lessons_schedule ORDER BY $sortField $sort_order";
    $result = $connect->query($query);
    $lessons = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $lessons[] = $row;
        }
    } else {
        // Логируем ошибку для отладки
        error_log("Ошибка запроса lessons_schedule: " . $connect->error);
    }
} else {
    $lessons = [];
}

// Функция для генерации URL сортировки
function getSortUrl($field) {
    global $sort_by, $sort_order;
    $new_order = ($sort_by === $field && $sort_order === 'ASC') ? 'DESC' : 'ASC';
    return '?sort_by=' . $field . '&sort_order=' . $new_order;
}

// Функция для получения иконки сортировки
function getSortIcon($field) {
    global $sort_by, $sort_order;
    if ($sort_by !== $field) {
        return '↕️';
    }
    return $sort_order === 'ASC' ? '↑' : '↓';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель - Управление расписанием занятий</title>
    <link rel="stylesheet" href="/admin/style/admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Админ-панель</h1>
            <div class="admin-header-actions">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                $is_tours = ($current_page === 'admin.php' || $current_page === 'edit_tour.php');
                $is_excursions = ($current_page === 'excursions.php' || $current_page === 'edit_excursion.php');
                $is_users = ($current_page === 'users.php');
                $is_lessons = ($current_page === 'lessons.php' || $current_page === 'edit_lesson.php');
                ?>
                <a href="/admin/admin.php" class="btn btn-secondary <?php echo $is_tours ? 'active' : ''; ?>">Туры</a>
                <a href="/admin/excursions.php" class="btn btn-secondary <?php echo $is_excursions ? 'active' : ''; ?>">Экскурсии</a>
                <a href="/admin/lessons.php" class="btn btn-secondary <?php echo $is_lessons ? 'active' : ''; ?>">Расписание</a>
                <a href="/admin/users.php" class="btn btn-secondary <?php echo $is_users ? 'active' : ''; ?>">Пользователи</a>
                <a href="/index.php" class="btn btn-secondary" target="_blank">На сайт</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выход</a>
            </div>
        </header>

        <main class="admin-main">
            <div class="admin-section">
                <?php if (!$tableExists): ?>
                    <div class="alert alert-warning" style="padding: 20px; background: #fff3cd; border: 1px solid #ffc107; border-radius: 5px; margin-bottom: 20px;">
                        <strong>Таблица lessons_schedule не существует.</strong> 
                        <a href="/admin/migrations/create_lessons_schedule_table.php" target="_blank" style="color: #856404; text-decoration: underline;">Запустите миграцию для создания таблицы</a>
                    </div>
                <?php endif; ?>
                
                <div class="admin-section-header">
                    <h2>Управление расписанием занятий</h2>
                    <div class="header-actions-group">
                        <div class="sort-info">
                            <?php if ($sort_by !== 'order' || $sort_order !== 'ASC'): ?>
                                <span class="sort-badge">
                                    Сортировка: <?php echo htmlspecialchars($sort_by); ?> (<?php echo $sort_order; ?>)
                                    <a href="/admin/lessons.php" class="sort-reset">×</a>
                                </span>
                            <?php endif; ?>
                        </div>
                        <a href="/admin/edit_lesson.php" class="btn btn-primary">+ Добавить занятие</a>
                    </div>
                </div>

                <div class="tours-table-container">
                    <table class="tours-table">
                        <thead>
                            <tr>
                                <th class="sortable <?php echo $sort_by === 'lesson_id' ? 'active' : ''; ?>" data-sort="lesson_id">
                                    <a href="<?php echo getSortUrl('lesson_id'); ?>" class="sort-link">
                                        ID <span class="sort-icon"><?php echo getSortIcon('lesson_id'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'park_name' ? 'active' : ''; ?>" data-sort="park_name">
                                    <a href="<?php echo getSortUrl('park_name'); ?>" class="sort-link">
                                        Парк <span class="sort-icon"><?php echo getSortIcon('park_name'); ?></span>
                                    </a>
                                </th>
                                <th>Изображение</th>
                                <th>Расписание</th>
                                <th class="sortable <?php echo $sort_by === 'order' ? 'active' : ''; ?>" data-sort="order">
                                    <a href="<?php echo getSortUrl('order'); ?>" class="sort-link">
                                        Порядок <span class="sort-icon"><?php echo getSortIcon('order'); ?></span>
                                    </a>
                                </th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($lessons)): ?>
                                <tr>
                                    <td colspan="6" class="empty-state">
                                        <?php if ($tableExists): ?>
                                            <div style="padding: 20px;">
                                                <p><strong>Занятия не найдены.</strong></p>
                                                <p>Таблица существует, но в ней нет данных.</p>
                                                <p style="margin-top: 10px;">
                                                    <a href="/admin/edit_lesson.php" class="btn btn-primary" style="display: inline-block; margin-right: 10px;">Добавить первое занятие</a>
                                                    <a href="/admin/migrations/insert_initial_lessons_data.php" target="_blank" class="btn btn-secondary" style="display: inline-block; margin-right: 10px;">Добавить начальные данные</a>
                                                    <a href="/insert_lessons_schedule.sql" target="_blank" style="display: inline-block; margin-right: 10px;">Или выполните SQL запрос</a>
                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <div style="padding: 20px;">
                                                <p><strong>Таблица lessons_schedule не существует.</strong></p>
                                                <p style="margin-top: 10px;">
                                                    <a href="/admin/migrations/create_lessons_schedule_table.php" target="_blank" class="btn btn-primary">Запустить миграцию для создания таблицы</a>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($lessons as $lesson): ?>
                                    <tr>
                                        <td data-label="ID"><?php echo htmlspecialchars($lesson['lesson_id']); ?></td>
                                        <td class="tour-name" data-label="Парк">
                                            <strong><?php echo htmlspecialchars($lesson['park_name']); ?></strong>
                                            <?php if (!empty($lesson['address'])): ?>
                                                <br><small style="color: #666;"><?php echo htmlspecialchars($lesson['address']); ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="Изображение">
                                            <?php if (!empty($lesson['park_image'])): ?>
                                                <img src="/<?php echo htmlspecialchars($lesson['park_image']); ?>" alt="<?php echo htmlspecialchars($lesson['park_name']); ?>" style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 4px;">
                                            <?php else: ?>
                                                <span style="color: #999;">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="Расписание">
                                            <div style="font-size: 0.85em;">
                                                <strong>ПН:</strong> <?php echo htmlspecialchars($lesson['monday'] ?? '-'); ?> | 
                                                <strong>ВТ:</strong> <?php echo htmlspecialchars($lesson['tuesday'] ?? '-'); ?> | 
                                                <strong>СР:</strong> <?php echo htmlspecialchars($lesson['wednesday'] ?? '-'); ?><br>
                                                <strong>ЧТ:</strong> <?php echo htmlspecialchars($lesson['thursday'] ?? '-'); ?> | 
                                                <strong>ПТ:</strong> <?php echo htmlspecialchars($lesson['friday'] ?? '-'); ?> | 
                                                <strong>СБ:</strong> <?php echo htmlspecialchars($lesson['saturday'] ?? '-'); ?> | 
                                                <strong>ВС:</strong> <?php echo htmlspecialchars($lesson['sunday'] ?? '-'); ?>
                                            </div>
                                        </td>
                                        <td data-label="Порядок"><?php echo htmlspecialchars($lesson['order'] ?? 0); ?></td>
                                        <td class="actions" data-label="">
                                            <a href="/admin/edit_lesson.php?id=<?php echo $lesson['lesson_id']; ?>" class="btn btn-sm btn-edit">Редактировать</a>
                                            <button onclick="deleteLesson(<?php echo $lesson['lesson_id']; ?>, '<?php echo htmlspecialchars(addslashes($lesson['park_name'])); ?>')" class="btn btn-sm btn-delete">Удалить</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function deleteLesson(id, name) {
            if (confirm('Вы уверены, что хотите удалить занятие "' + name + '"?')) {
                fetch('/admin/api/delete_lesson.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ lesson_id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Ошибка: ' + (data.message || 'Не удалось удалить занятие'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Произошла ошибка при удалении занятия');
                });
            }
        }
    </script>
    <script src="/admin/js/admin.js"></script>
</body>
</html>

