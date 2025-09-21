<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}

require_once '../phpLogin/connect.php';

if (!($connect instanceof mysqli)) {
    die('Ошибка подключения к базе данных');
}





// Fetch user data (support two possible schemas)
require '../getDATA/getUserData.php';

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
    'SELECT age, tel, city, rost, ves, staj, fizNagr, zabolevaniya, davlenie, chrono, opora, perenosimost, level, prohod, perenosimostGori, ravn, comment FROM tour_requests WHERE user_id = ? LIMIT 1',
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
    <script src="jsLK/changeBtn.js?ver=<?php echo time(); ?>" defer></script>
</head>

<body>
    <div class="lk-container">
        <header class="lk-header">
            <a class="lk-logo" href="/index.php">
                <img src="/img/header/logo.svg" alt="">
            </a>
            <div class="lk-actions">
                <a href="/index.php" class="btn btn-outline-secondary">На главную</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выйти</a>
            </div>
        </header>

        <main class="lk-main">
            <section class="lk-card">
                <div class="lk-card__header">
                    <h2>Личные данные</h2>
                </div>
                <div class="lk-card__content lk-profile">
                    <button id="changeBtn" class="lk_change_fio"><img src="imgLk/change.svg" alt=""></button>
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
                        <img id="userAvatarImg"
                            src="<?php echo htmlspecialchars($avatarPath); ?><?php echo $avatarPath !== '' ? ('?v=' . time()) : ''; ?>"
                            alt="avatar" style="cursor:pointer;">
                        <div class="lk-avatar__overlay">
                            <span class="lk-avatar__plus">+</span>
                        </div>
                        <form id="avatarForm" class="mt-3" action="/php/upload_avatar.php" method="post"
                            enctype="multipart/form-data">
                            <input id="avatarInput" style="display:none;" type="file" name="avatar"
                                accept="image/jpeg,image/png,image/webp" required>
                            <button id="avatarSubmit" class="btn btn-primary mt-2" type="submit"
                                style="display:none;">Сменить аватар</button>
                        </form>
                    </div>
                    <form class="lk-fields">
                        <div class="lk-field">
                            <div class="lk-label">Фамилия</div>
                            <div class="lk-value" name="user_name">
                                <input type="text" class="form-control form-control-input" disabled id="user_fam" name="user_fam"
                                    value="<?php echo htmlspecialchars($user['user_fam'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="lk-field">
                            <div class="lk-label">Имя</div>
                            <div class="lk-value" name="user_name">
                                <input type="text" class="form-control form-control-input" disabled id="user_name"
                                    name="user_name" value="<?php echo htmlspecialchars($user['user_name'] ?? ''); ?>">
                            </div>
                        </div>
                        
                        <div class="lk-field">
                            <div class="lk-label">Отчество</div>
                            <div class="lk-value" name="user_name">
                                <input type="text" class="form-control form-control-input" disabled id="user_otch" name="otch"
                                    value="Вячеславович">
                            </div>
                        </div>
                        <div class="lk-field">
                            <div class="lk-label"></div>
                            <div class="lk-value lk__btn__send" name="user_name">
                               <input type="submit" class="lk_change_send" value="Сохранить" id="changeSend">
                            </div>
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
                    </form>
                </div>
            </section>

            <section class="lk-card">
                <div class="lk-card__header">
                    <h2>Мои туры</h2>
                </div>
                <div class="lk-card__content">
                    <?php if (count($tours) === 0): ?>
                        <div class="lk-empty">В разработке...</div>
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
                    <!-- <a class="btn btn-outline-primary" href="/tour.php">Перейти в туры</a> -->
                </div>
            </section>

            <section class="lk-card">
                <div class="lk-card__header">
                    <h2>Мои экскурсии</h2>
                </div>
                <div class="lk-card__content">
                    <div class="lk-empty">В разработке...</div>
                    <!-- <div class="lk-empty">История записей на экскурсии пока недоступна. Запись оформляется через форму на странице «Сканди-мероприятия».</div> -->
                    <!-- <a class="btn btn-outline-primary" href="/excursions.php">Перейти к экскурсиям</a> -->
                </div>
            </section>

            <section class="lk-card">
                <div class="lk-card__header">
                    <h2>Личная анкета для туров</h2>
                </div>
                <div class="lk-card__content">
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?php echo htmlspecialchars($_SESSION['success']); ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($_SESSION['error']); ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <?php if ($request): ?>
                        <div class="alert alert-info">
                            <strong>Анкета заполнена!</strong> Ваши данные сохранены и будут использованы при регистрации на
                            туры.
                        </div>
                    <?php endif; ?>

                    <form id="tourRequestForm" method="post" action="/php/save_tour_request.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="age" class="form-label">Возраст *</label>
                                    <input type="text" class="form-control" id="age" name="age"
                                        value="<?php echo htmlspecialchars($request['age'] ?? ''); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tel" class="form-label">Телефон *</label>
                                    <input type="tel" class="form-control" id="tel" name="tel"
                                        value="<?php echo htmlspecialchars($request['tel'] ?? ''); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">Город *</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="<?php echo htmlspecialchars($request['city'] ?? ''); ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rost" class="form-label">Рост (см)</label>
                                    <input type="text" class="form-control" id="rost" name="rost"
                                        value="<?php echo htmlspecialchars($request['rost'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ves" class="form-label">Вес (кг)</label>
                                    <input type="text" class="form-control" id="ves" name="ves"
                                        value="<?php echo htmlspecialchars($request['ves'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="staj" class="form-label">Опыт ходьбы с палками</label>
                            <select class="form-select" id="staj" name="staj">
                                <option value="">Выберите опыт</option>
                                <option value="Нет опыта" <?php echo ($request['staj'] ?? '') === 'Нет опыта' ? 'selected' : ''; ?>>Нет опыта</option>
                                <option value="До 1 года" <?php echo ($request['staj'] ?? '') === 'До 1 года' ? 'selected' : ''; ?>>До 1 года</option>
                                <option value="1-3 года" <?php echo ($request['staj'] ?? '') === '1-3 года' ? 'selected' : ''; ?>>1-3 года</option>
                                <option value="Более 3 лет" <?php echo ($request['staj'] ?? '') === 'Более 3 лет' ? 'selected' : ''; ?>>Более 3 лет</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fizNagr" class="form-label">Физическая нагрузка в обычной жизни</label>
                            <textarea class="form-control" id="fizNagr" name="fizNagr"
                                rows="3"><?php echo htmlspecialchars($request['fizNagr'] ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="zabolevaniya" class="form-label">Сердечно-сосудистые заболевания</label>
                            <textarea class="form-control" id="zabolevaniya" name="zabolevaniya"
                                rows="3"><?php echo htmlspecialchars($request['zabolevaniya'] ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="davlenie" class="form-label">Артериальное давление</label>
                            <textarea class="form-control" id="davlenie" name="davlenie"
                                rows="2"><?php echo htmlspecialchars($request['davlenie'] ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="chrono" class="form-label">Хронические заболевания</label>
                            <textarea class="form-control" id="chrono" name="chrono"
                                rows="3"><?php echo htmlspecialchars($request['chrono'] ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="opora" class="form-label">Заболевания опорно-двигательного аппарата</label>
                            <textarea class="form-control" id="opora" name="opora"
                                rows="3"><?php echo htmlspecialchars($request['opora'] ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="perenosimost" class="form-label">Переносимость физических нагрузок</label>
                            <select class="form-select" id="perenosimost" name="perenosimost">
                                <option value="">Выберите уровень</option>
                                <option value="Хорошая" <?php echo ($request['perenosimost'] ?? '') === 'Хорошая' ? 'selected' : ''; ?>>Хорошая</option>
                                <option value="Средняя" <?php echo ($request['perenosimost'] ?? '') === 'Средняя' ? 'selected' : ''; ?>>Средняя</option>
                                <option value="Плохая" <?php echo ($request['perenosimost'] ?? '') === 'Плохая' ? 'selected' : ''; ?>>Плохая</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Уровень подготовки</label>
                            <select class="form-select" id="level" name="level">
                                <option value="">Выберите уровень</option>
                                <option value="Начинающий" <?php echo ($request['level'] ?? '') === 'Начинающий' ? 'selected' : ''; ?>>Начинающий</option>
                                <option value="Средний" <?php echo ($request['level'] ?? '') === 'Средний' ? 'selected' : ''; ?>>Средний</option>
                                <option value="Продвинутый" <?php echo ($request['level'] ?? '') === 'Продвинутый' ? 'selected' : ''; ?>>Продвинутый</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="prohod" class="form-label">Cколько километров можете пройти</label>
                            <textarea class="form-control" id="prohod" name="prohod"
                                rows="3"><?php echo htmlspecialchars($request['opora'] ?? ''); ?></textarea>

                        </div>

                        <div class="mb-3">
                            <label for="perenosimostGori" class="form-label">Переносимость гор</label>
                            <select class="form-select" id="perenosimostGori" name="perenosimostGori">
                                <option value="">Выберите переносимость</option>
                                <option value="Хорошая" <?php echo ($request['perenosimostGori'] ?? '') === 'Хорошая' ? 'selected' : ''; ?>>Хорошая</option>
                                <option value="Средняя" <?php echo ($request['perenosimostGori'] ?? '') === 'Средняя' ? 'selected' : ''; ?>>Средняя</option>
                                <option value="Плохая" <?php echo ($request['perenosimostGori'] ?? '') === 'Плохая' ? 'selected' : ''; ?>>Плохая</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ravn" class="form-label">Равновесие</label>
                            <select class="form-select" id="ravn" name="ravn">
                                <option value="">Выберите уровень</option>
                                <option value="Хорошее" <?php echo ($request['ravn'] ?? '') === 'Хорошее' ? 'selected' : ''; ?>>Хорошее</option>
                                <option value="Среднее" <?php echo ($request['ravn'] ?? '') === 'Среднее' ? 'selected' : ''; ?>>Среднее</option>
                                <option value="Плохое" <?php echo ($request['ravn'] ?? '') === 'Плохое' ? 'selected' : ''; ?>>Плохое</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label">Дополнительные комментарии</label>
                            <textarea class="form-control" id="comment" name="comment"
                                rows="4"><?php echo htmlspecialchars($request['comment'] ?? ''); ?></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Сохранить анкету</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <footer class="lk-footer">
            <p>© По миру с палками</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            var img = document.getElementById('userAvatarImg');
            var input = document.getElementById('avatarInput');
            var form = document.getElementById('avatarForm');
            if (!img || !input || !form) return;

            img.addEventListener('click', function () {
                input.click();
            });

            input.addEventListener('change', function () {
                if (!input.files || input.files.length === 0) return;
                var file = input.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
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