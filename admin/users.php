<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации (допускаем только администраторов с user_id 7 или 10)
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'user_id';
$sort_order = isset($_GET['sort_order']) ? strtoupper($_GET['sort_order']) : 'DESC';
$search = isset($_GET['q']) ? trim($_GET['q']) : '';

$allowed_sort_fields = ['user_id', 'user_name', 'user_email'];
$allowed_sort_orders = ['ASC', 'DESC'];

if (!in_array($sort_by, $allowed_sort_fields, true)) {
    $sort_by = 'user_id';
}
if (!in_array($sort_order, $allowed_sort_orders, true)) {
    $sort_order = 'DESC';
}

function getSortUrl($field)
{
    global $sort_by, $sort_order, $search;
    $new_order = ($sort_by === $field && $sort_order === 'ASC') ? 'DESC' : 'ASC';
    $params = [
        'sort_by' => $field,
        'sort_order' => $new_order
    ];
    if ($search !== '') {
        $params['q'] = $search;
    }
    return '?' . http_build_query($params);
}

function getSortIcon($field)
{
    global $sort_by, $sort_order;
    if ($sort_by !== $field) {
        return '↕️';
    }
    return $sort_order === 'ASC' ? '↑' : '↓';
}

// Получаем список пользователей
$users = [];
$totalUsers = 0;

// Общее количество для информации
$countRes = $connect->query("SELECT COUNT(*) AS total FROM users");
if ($countRes) {
    $row = $countRes->fetch_assoc();
    $totalUsers = isset($row['total']) ? (int) $row['total'] : 0;
}

if ($search !== '') {
    $like = '%' . $search . '%';
    $stmt = $connect->prepare("SELECT user_id, user_name, user_email FROM users WHERE user_name LIKE ? OR user_email LIKE ? ORDER BY $sort_by $sort_order");
    $stmt->bind_param('ss', $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    $stmt->close();
} else {
    $result = $connect->query("SELECT user_id, user_name, user_email FROM users ORDER BY $sort_by $sort_order");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель - Пользователи</title>
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
                <div class="admin-section-header">
                    <div>
                        <h2>Пользователи</h2>
                        <p style="color:#6c757d; margin-top: 4px;">Всего зарегистрировано: <?php echo $totalUsers; ?></p>
                    </div>
                    <div class="header-actions-group">
                        <form method="get" class="search-form">
                            <input type="text" name="q" value="<?php echo htmlspecialchars($search); ?>" placeholder="Поиск по имени или email" class="search-input">
                            <button type="submit" class="btn btn-primary btn-sm">Поиск</button>
                            <?php if ($search !== ''): ?>
                                <a href="/admin/users.php" class="btn btn-secondary btn-sm">Сброс</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>

                <div class="tours-table-container">
                    <table class="tours-table">
                        <thead>
                            <tr>
                                <th class="sortable <?php echo $sort_by === 'user_id' ? 'active' : ''; ?>">
                                    <a href="<?php echo getSortUrl('user_id'); ?>" class="sort-link">
                                        ID <span class="sort-icon"><?php echo getSortIcon('user_id'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'user_name' ? 'active' : ''; ?>">
                                    <a href="<?php echo getSortUrl('user_name'); ?>" class="sort-link">
                                        Имя <span class="sort-icon"><?php echo getSortIcon('user_name'); ?></span>
                                    </a>
                                </th>
                                <th class="sortable <?php echo $sort_by === 'user_email' ? 'active' : ''; ?>">
                                    <a href="<?php echo getSortUrl('user_email'); ?>" class="sort-link">
                                        Email <span class="sort-icon"><?php echo getSortIcon('user_email'); ?></span>
                                    </a>
                                </th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($users)): ?>
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        Пользователи не найдены.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($users as $user): ?>
                                    <?php $isAdmin = in_array((int)$user['user_id'], [7, 10], true); ?>
                                    <tr data-user-id="<?php echo (int) $user['user_id']; ?>">
                                        <td data-label="ID"><?php echo (int) $user['user_id']; ?></td>
                                        <td data-label="Имя">
                                            <?php echo htmlspecialchars($user['user_name'] ?: '—'); ?>
                                            <?php if ($isAdmin): ?>
                                                <span class="badge badge-admin">Администратор</span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="Email">
                                            <a href="mailto:<?php echo htmlspecialchars($user['user_email']); ?>" class="link-preview">
                                                <?php echo htmlspecialchars($user['user_email']); ?>
                                            </a>
                                        </td>
                                        <td class="actions" data-label="">
                                            <?php if ($isAdmin): ?>
                                                <span style="color:#6c757d;">Нельзя удалить</span>
                                            <?php else: ?>
                                                <button class="btn btn-sm btn-delete" onclick='deleteUser(<?php echo (int) $user["user_id"]; ?>, <?php echo json_encode($user["user_name"] ?: $user["user_email"]); ?>)'>Удалить</button>
                                            <?php endif; ?>
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

    <script src="/admin/js/users.js"></script>
</body>
</html>

