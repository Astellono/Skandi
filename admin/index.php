<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || ($_SESSION['user_id']!=7)) {
    header('Location: /');
    exit;
}

// Параметры сортировки
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'tour_date_start';
$sort_order = isset($_GET['sort_order']) ? strtoupper($_GET['sort_order']) : 'DESC';

// Разрешенные поля для сортировки
$allowed_sort_fields = ['tour_id', 'tour_name', 'tour_date_start', 'tour_date_end', 'tour_linkPage', 'tour_color'];
$allowed_sort_orders = ['ASC', 'DESC'];

// Валидация параметров сортировки
if (!in_array($sort_by, $allowed_sort_fields)) {
    $sort_by = 'tour_date_start';
}
if (!in_array($sort_order, $allowed_sort_orders)) {
    $sort_order = 'DESC';
}

// Получаем список всех туров с сортировкой
$query = "SELECT * FROM tours ORDER BY $sort_by $sort_order";
$result = $connect->query($query);
$tours = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $tours[] = $row;
    }
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
    <title>Админ-панель - Управление турами</title>
    <link rel="stylesheet" href="/admin/style/admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Админ-панель</h1>
            <div class="admin-header-actions">
                <a href="/index.php" class="btn btn-secondary" target="_blank">На сайт</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выход</a>
            </div>
        </header>

        <main class="admin-main">
            <div class="admin-section">
                <div class="admin-section-header">
                    <h2>Управление турами</h2>
                    <div class="header-actions-group">
                        <div class="sort-info">
                            <?php if ($sort_by !== 'tour_date_start' || $sort_order !== 'DESC'): ?>
                                <span class="sort-badge">
                                    Сортировка: <?php echo htmlspecialchars($sort_by); ?> (<?php echo $sort_order; ?>)
                                    <a href="/admin/index.php" class="sort-reset">×</a>
                                </span>
                            <?php endif; ?>
                        </div>
                        <a href="/admin/edit_tour.php" class="btn btn-primary">+ Добавить тур</a>
                    </div>
                </div>

                <div class="tours-table-container">
                    <table class="tours-table">
                        <thead>
                            <tr>
                                <th class="sortable <?php echo $sort_by === 'tour_id' ? 'active' : ''; ?>" data-sort="tour_id">
                                    <a href="<?php echo getSortUrl('tour_id'); ?>" class="sort-link">
                                        ID <span class="sort-icon"><?php echo getSortIcon('tour_id'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'tour_name' ? 'active' : ''; ?>" data-sort="tour_name">
                                    <a href="<?php echo getSortUrl('tour_name'); ?>" class="sort-link">
                                        Название <span class="sort-icon"><?php echo getSortIcon('tour_name'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'tour_date_start' ? 'active' : ''; ?>" data-sort="tour_date_start">
                                    <a href="<?php echo getSortUrl('tour_date_start'); ?>" class="sort-link">
                                        Дата начала <span class="sort-icon"><?php echo getSortIcon('tour_date_start'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'tour_date_end' ? 'active' : ''; ?>" data-sort="tour_date_end">
                                    <a href="<?php echo getSortUrl('tour_date_end'); ?>" class="sort-link">
                                        Дата окончания <span class="sort-icon"><?php echo getSortIcon('tour_date_end'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'tour_linkPage' ? 'active' : ''; ?>" data-sort="tour_linkPage">
                                    <a href="<?php echo getSortUrl('tour_linkPage'); ?>" class="sort-link">
                                        Ссылка <span class="sort-icon"><?php echo getSortIcon('tour_linkPage'); ?></span>
                                    </a>
                                </th>
                                <th>Цвет</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($tours)): ?>
                                <tr>
                                    <td colspan="7" class="empty-state">
                                        Туры не найдены. <a href="/admin/edit_tour.php">Добавить первый тур</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($tours as $tour): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($tour['tour_id']); ?></td>
                                        <td class="tour-name"><?php echo htmlspecialchars($tour['tour_name']); ?></td>
                                        <td><?php echo $tour['tour_date_start'] ? date('d.m.Y', strtotime($tour['tour_date_start'])) : '-'; ?></td>
                                        <td><?php echo $tour['tour_date_end'] ? date('d.m.Y', strtotime($tour['tour_date_end'])) : '-'; ?></td>
                                        <td>
                                            <a href="/<?php echo htmlspecialchars($tour['tour_linkPage']); ?>" target="_blank" class="link-preview">
                                                <?php echo htmlspecialchars($tour['tour_linkPage']); ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="color-preview" style="background-color: <?php echo htmlspecialchars($tour['tour_color'] ?: '#4a90e2'); ?>"></span>
                                            <?php echo htmlspecialchars($tour['tour_color'] ?: '#4a90e2'); ?>
                                        </td>
                                        <td class="actions">
                                            <a href="/admin/edit_tour.php?id=<?php echo $tour['tour_id']; ?>" class="btn btn-sm btn-edit">Редактировать</a>
                                            <button onclick="deleteTour(<?php echo $tour['tour_id']; ?>, '<?php echo htmlspecialchars(addslashes($tour['tour_name'])); ?>')" class="btn btn-sm btn-delete">Удалить</button>
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

    <script src="/admin/js/admin.js"></script>
</body>
</html>

