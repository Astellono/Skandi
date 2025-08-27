<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}

require_once __DIR__ . '/../php/connect.php';

if (!($connect instanceof mysqli)) {
    die('Ошибка подключения к базе данных');
}

$userId = (int)$_SESSION['user_id'];

function prepare_first_success(mysqli $db, array $sqlVariants) {
    foreach ($sqlVariants as $sql) {
        $stmt = $db->prepare($sql);
        if ($stmt !== false) {
            return $stmt;
        }
    }
    return false;
}

// Fetch user data (support two possible schemas)
$userStmt = prepare_first_success($connect, [
    'SELECT user_name, user_email FROM users WHERE user_id = ? LIMIT 1',
    'SELECT name AS user_name, email AS user_email FROM users WHERE id = ? LIMIT 1',
]);
if ($userStmt === false) {
    die('Ошибка запроса профиля пользователя: ' . $connect->error);
}
$userStmt->bind_param('i', $userId);
$userStmt->execute();
$userRes = $userStmt->get_result();
$user = $userRes ? $userRes->fetch_assoc() : null;

// Fetch tour sign-ups
$tourStmt = prepare_first_success($connect, [
    'SELECT signing_tour_id AS tour_id FROM signing WHERE signing_user_id = ? ORDER BY signing_id DESC',
]);
$tours = [];
if ($tourStmt) {
    $tourStmt->bind_param('i', $userId);
    $tourStmt->execute();
    $tourRes = $tourStmt->get_result();
    if ($tourRes) {
        while ($row = $tourRes->fetch_assoc()) {
            $tours[] = $row['tour_id'];
        }
    }
}

// Traveler questionnaire
$rqStmt = prepare_first_success($connect, [
    'SELECT fio, age, tel, city, email FROM tour_requests WHERE user_id = ? LIMIT 1',
]);
$request = null;
if ($rqStmt) {
    $rqStmt->bind_param('i', $userId);
    $rqStmt->execute();
    $rqRes = $rqStmt->get_result();
    $request = $rqRes ? $rqRes->fetch_assoc() : null;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/lk/style/styleLk.css?ver=<?php echo time(); ?>">
</head>
<body>
<div class="lk-container">
    <header class="lk-header">
        <a class="lk-logo" href="/index.php">
            <img src="/img/header/logo.svg" alt="">
        </a>
        <div class="lk-actions">
            <a href="/index.php" class="btn btn-outline-secondary">На главную</a>
            <a href="/php/logout.php" class="btn btn-danger">Выйти</a>
        </div>
    </header>

    <main class="lk-main">
        <section class="lk-card">
            <div class="lk-card__header">
                <h2>Личные данные</h2>
            </div>
            <div class="lk-card__content lk-profile">
                <div class="lk-avatar">
                    <?php
                        $avatarPath = '/uploads/avatars/' . $userId . '.jpg';
                        if (!file_exists(__DIR__ . '/../' . ltrim($avatarPath, '/'))) {
                            $png = '/uploads/avatars/' . $userId . '.png';
                            $webp = '/uploads/avatars/' . $userId . '.webp';
                            if (file_exists(__DIR__ . '/../' . ltrim($png, '/'))) {
                                $avatarPath = $png;
                            } elseif (file_exists(__DIR__ . '/../' . ltrim($webp, '/'))) {
                                $avatarPath = $webp;
                            } else {
                                 $avatarPath = '/img/icon.svg';
                            }
                        }
                    ?>
                    <img id="userAvatarImg" src="<?php echo htmlspecialchars($avatarPath); ?><?php echo $avatarPath !== '' ? ('?v=' . time()) : ''; ?>" alt="avatar" style="cursor:pointer;">
                    <div class="lk-avatar__overlay">
                        <span class="lk-avatar__plus">+</span>
                    </div>
                    <form id="avatarForm" class="mt-3" action="/php/upload_avatar.php" method="post" enctype="multipart/form-data">
                        <input id="avatarInput" style="display:none;" type="file" name="avatar" accept="image/jpeg,image/png,image/webp" required>
                        <button id="avatarSubmit" class="btn btn-primary mt-2" type="submit" style="display:none;">Сменить аватар</button>
                    </form>
                </div>
                <div class="lk-fields">
                    <div class="lk-field">
                        <div class="lk-label">Имя</div>
                        <div class="lk-value"><?php echo htmlspecialchars($user['user_name'] ?? ''); ?></div>
                    </div>
                    <div class="lk-field">
                        <div class="lk-label">Email</div>
                        <div class="lk-value"><?php echo htmlspecialchars($user['user_email'] ?? ''); ?></div>
                    </div>
                    <?php if ($request): ?>
                        <div class="lk-sep"></div>
                        <div class="lk-field">
                            <div class="lk-label">Город</div>
                            <div class="lk-value"><?php echo htmlspecialchars($request['city'] ?? ''); ?></div>
                        </div>
                        <div class="lk-field">
                            <div class="lk-label">Телефон</div>
                            <div class="lk-value"><?php echo htmlspecialchars($request['tel'] ?? ''); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="lk-card">
            <div class="lk-card__header">
                <h2>Мои туры</h2>
            </div>
            <div class="lk-card__content">
                <?php if (count($tours) === 0): ?>
                    <div class="lk-empty">Вы пока не записаны на туры.</div>
                <?php else: ?>
                    <ul class="lk-list">
                        <?php foreach ($tours as $tourId): ?>
                            <li class="lk-list__item">
                                <div class="lk-list__title">Тур #<?php echo htmlspecialchars($tourId); ?></div>
                                <div class="lk-list__actions">
                                    <a class="btn btn-outline-primary btn-sm" href="/tour.php">К списку туров</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <a class="btn btn-outline-primary" href="/tour.php">Перейти в туры</a>
            </div>
        </section>

        <section class="lk-card">
            <div class="lk-card__header">
                <h2>Мои экскурсии</h2>
            </div>
            <div class="lk-card__content">
                <div class="lk-empty">Вы пока не записаны на экскурсии.</div><!-- <div class="lk-empty">История записей на экскурсии пока недоступна. Запись оформляется через форму на странице «Сканди-мероприятия».</div> -->
                <a class="btn btn-outline-primary" href="/excursions.php">Перейти к экскурсиям</a>
            </div>
        </section>
    </main>

    <footer class="lk-footer">
        <p>© По миру с палками</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function(){
        var img = document.getElementById('userAvatarImg');
        var input = document.getElementById('avatarInput');
        var form = document.getElementById('avatarForm');
        if (!img || !input || !form) return;

        img.addEventListener('click', function(){
            input.click();
        });

        input.addEventListener('change', function(){
            if (!input.files || input.files.length === 0) return;
            var file = input.files[0];
            var reader = new FileReader();
            reader.onload = function(e){
                if (typeof e.target.result === 'string') {
                    img.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
            form.submit();
        });
    })();
</script>
</body>
</html>

