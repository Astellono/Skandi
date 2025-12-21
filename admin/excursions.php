<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

// Параметры сортировки
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'excursion_date';
$sort_order = isset($_GET['sort_order']) ? strtoupper($_GET['sort_order']) : 'ASC';

// Разрешенные поля для сортировки
$allowed_sort_fields = ['excursion_id', 'excursion_name', 'excursion_date'];
$allowed_sort_orders = ['ASC', 'DESC'];

// Валидация параметров сортировки
if (!in_array($sort_by, $allowed_sort_fields)) {
    $sort_by = 'excursion_date';
}
if (!in_array($sort_order, $allowed_sort_orders)) {
    $sort_order = 'ASC';
}

// Проверяем существование таблицы
$tableExists = false;
$tableCheck = $connect->query("SHOW TABLES LIKE 'excursions'");
if ($tableCheck && $tableCheck->num_rows > 0) {
    $tableExists = true;
    
    // Получаем список всех экскурсий с сортировкой
    $query = "SELECT * FROM excursions ORDER BY $sort_by $sort_order";
    $result = $connect->query($query);
    $excursions = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $excursions[] = $row;
        }
    }
} else {
    $excursions = [];
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
    <title>Админ-панель - Управление экскурсиями</title>
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
                ?>
                <a href="/admin/admin.php" class="btn btn-secondary <?php echo $is_tours ? 'active' : ''; ?>">Туры</a>
                <a href="/admin/excursions.php" class="btn btn-secondary <?php echo $is_excursions ? 'active' : ''; ?>">Экскурсии</a>
                <a href="/admin/users.php" class="btn btn-secondary <?php echo $is_users ? 'active' : ''; ?>">Пользователи</a>
                <a href="/index.php" class="btn btn-secondary" target="_blank">На сайт</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выход</a>
            </div>
        </header>

        <main class="admin-main">
            <div class="admin-section">
                <?php if (!$tableExists): ?>
                    <div class="alert alert-warning" style="padding: 20px; background: #fff3cd; border: 1px solid #ffc107; border-radius: 5px; margin-bottom: 20px;">
                        <strong>Таблица excursions не существует.</strong> 
                        <a href="/admin/migrations/create_excursions_table.php" target="_blank" style="color: #856404; text-decoration: underline;">Запустите миграцию для создания таблицы</a>
                    </div>
                <?php endif; ?>
                
                <div class="admin-section-header">
                    <h2>Управление экскурсиями</h2>
                    <div class="header-actions-group">
                        <div class="sort-info">
                            <?php if ($sort_by !== 'excursion_date' || $sort_order !== 'ASC'): ?>
                                <span class="sort-badge">
                                    Сортировка: <?php echo htmlspecialchars($sort_by); ?> (<?php echo $sort_order; ?>)
                                    <a href="/admin/excursions.php" class="sort-reset">×</a>
                                </span>
                            <?php endif; ?>
                        </div>
                            <a href="/admin/edit_excursion.php" class="btn btn-primary">+ Добавить экскурсию</a>
                            <a href="/admin/migrations/change_excursion_date_to_varchar.php" class="btn btn-secondary" target="_blank" title="Изменить тип поля excursion_date на VARCHAR">Миграция БД (дата)</a>
                    </div>
                </div>

                <div class="tours-table-container">
                    <table class="tours-table">
                        <thead>
                            <tr>
                                <th class="sortable <?php echo $sort_by === 'excursion_id' ? 'active' : ''; ?>" data-sort="excursion_id">
                                    <a href="<?php echo getSortUrl('excursion_id'); ?>" class="sort-link">
                                        ID <span class="sort-icon"><?php echo getSortIcon('excursion_id'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'excursion_name' ? 'active' : ''; ?>" data-sort="excursion_name">
                                    <a href="<?php echo getSortUrl('excursion_name'); ?>" class="sort-link">
                                        Название <span class="sort-icon"><?php echo getSortIcon('excursion_name'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'excursion_date' ? 'active' : ''; ?>" data-sort="excursion_date">
                                    <a href="<?php echo getSortUrl('excursion_date'); ?>" class="sort-link">
                                        Дата <span class="sort-icon"><?php echo getSortIcon('excursion_date'); ?></span>
                                    </a>
                                </th>
                                <th>Время</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($excursions)): ?>
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        <?php if ($tableExists): ?>
                                            Экскурсии не найдены. <a href="/admin/edit_excursion.php">Добавить первую экскурсию</a>
                                        <?php else: ?>
                                            Таблица не создана. <a href="/admin/migrations/create_excursions_table.php" target="_blank">Запустите миграцию</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($excursions as $excursion): ?>
                                    <tr>
                                        <td data-label="ID"><?php echo htmlspecialchars($excursion['excursion_id']); ?></td>
                                        <td class="tour-name" data-label="Название"><?php echo htmlspecialchars($excursion['excursion_name']); ?></td>
                                        <td data-label="Дата"><?php echo htmlspecialchars($excursion['excursion_date'] ?? '-'); ?></td>
                                        <td data-label="Время"><?php echo htmlspecialchars($excursion['excursion_time'] ?? '-'); ?></td>
                                        <td class="actions" data-label="">
                                            <a href="/admin/edit_excursion.php?id=<?php echo $excursion['excursion_id']; ?>" class="btn btn-sm btn-edit">Редактировать</a>
                                            <button onclick="deleteExcursion(<?php echo $excursion['excursion_id']; ?>, '<?php echo htmlspecialchars(addslashes($excursion['excursion_name'])); ?>')" class="btn btn-sm btn-delete">Удалить</button>
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
        function deleteExcursion(id, name) {
            if (confirm('Вы уверены, что хотите удалить экскурсию "' + name + '"?')) {
                fetch('/admin/api/delete_excursion.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ excursion_id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Ошибка: ' + (data.message || 'Не удалось удалить экскурсию'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Произошла ошибка при удалении экскурсии');
                });
            }
        }
    </script>
    <script src="/admin/js/admin.js"></script>
</body>
</html>

