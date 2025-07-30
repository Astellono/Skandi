<?php
session_start();
require 'php/connect.php';
$user_id = $_SESSION['user_id'];
if (!$user_id) {
    header("Location: /", true, 301);
}
// print_r($_SESSION['user_id']);
// Получаем данные пользователя
$user_query = $connect->query("SELECT * FROM users WHERE id = '$user_id'");
$user_data = $user_query->fetch_assoc();
// print_r($user_data['avatar_path']);
// Получаем данные анкеты
$result = $connect->query("SELECT * FROM tour_requests WHERE user_id = '$user_id'");
$data = $result->fetch_assoc();

$myTourList = $connect->query("SELECT t.*
FROM tours t
JOIN signing s ON t.tour_id = s.signing_tour_id
JOIN users u ON s.signing_user_id = u.id
WHERE u.id = $user_id;");

if ($myTourList->num_rows > 0) {
    // Получение данных
    $tours = $myTourList->fetch_all(MYSQLI_ASSOC);

} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой профиль здоровья</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/style/clear.css">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/style-adaptive.css">
    <link rel="stylesheet" href="style/styleLk.css">
    <script defer src="/js/login.js"></script>
    <script src="/modal/Burger.js" defer></script>
    <script src="js/mainLK.js" defer></script>
    <script src="js/btnChange.js" defer></script>
    <script src="js/uploadAvatar.js" defer></script>
    <script src="js/switchMenu.js" defer></script>
    <script src="js/interactiveMenu.js" defer></script>
    <script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
    <script>
    // Инициализация полифила
    if ('scrollBehavior' in document.documentElement.style === false) {
        smoothscroll.polyfill();
    }
    </script>
    <style>

    </style>
</head>

<body>
    <header class="header" id="header">
        <?php include '../parts/headerPHP.php'; ?>

    </header>

    <div class="container">
        <div class="profile-header">
            <h1 class="profile-title">Личный кабинет</h1>

        </div>

        <div class="dashboard">
            <!-- Sidebar -->
            <aside class="profile-sidebar">
                <div class="user-card">
                    <form id="uploadForm" enctype="multipart/form-data" class="avatar__form">
                        <input id="imageInput" type="file" name="image" accept="image/*" hidden required>

                        <!-- <button type="submit">Загрузить</button> -->
                        <label for="imageInput">
                            <div class="image-container">
                                <img src="<?= isset($user_data['avatar_path']) ? $user_data['avatar_path'] : '/img/otziv/zagl1.png'; ?>"
                                    alt="Аватар" class="avatar" id="avatarImage">
                            </div>

                        </label>
                    </form>

                    <h3 class="user-name" id="fio">Иванов Иван Иванович</h3>
                    <p class="user-email" id="email">ivanov@example.com</p>
                </div>

                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#anceta" class="nav-link">
                            <i class="fas fa-clipboard-list"></i><span class="nav-text">Анкета участника</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#myTour" class="nav-link">
                            <i class="fas fa-plane"></i> <span class="nav-text">Мои туры</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-map-marked-alt"></i> <span class="nav-text">Мои экскурсии</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="php/logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i> <span class="nav-text">Выход</span>
                        </a>
                    </li>

                </ul>
            </aside>

            <!-- Main content -->
            <main class="profile-content">
            <div id="anceta" class="content-section">
                    <div class="content-header">
                        <h2 class="content-title">
                            <i class="fas fa-clipboard-list"></i>
                            <?php
                            echo isset($data) ? "Ваша Анкета" : "Заполните анкету";
                            ?>
                        </h2>
                        <?php echo isset($data) ? " <button id='btnChange' class='change-data-btn'>Изменить</button>" : "";?>
                    </div>

                    <form action="<?php echo isset($data) ? "php/changeDataHealth.php" : "php/addDataHealth.php";?>" class="modal__form" method="POST">
                        Мой возраст:
                        <input name="age" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['age'] ?>">
                        Мой телефон:
                        <input name="tel" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['tel'] ?>">
                        Мой город:
                        <input name="city" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['city'] ?>">
                        Мой рост:
                        <input name="rost" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['rost'] ?>">
                        Мой вес:
                        <input name="ves" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['ves'] ?>">
                        Мой стаж занятия Скандинавской ходьбой:
                        <input name="staj" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['staj'] ?>">
                        Физические нагрузки:
                        <input name="fizNagr" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['fizNagr'] ?>">
                        Наличие сердечно-сосудистных заболеваний:
                        <input name="zabolevaniya" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?>value="<?= $data['zabolevaniya'] ?>">
                        Давление:
                        <input name="davlenie" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['davlenie'] ?>">
                        Хронические заболевания, Аллергии:
                        <input name="chrono" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['chrono'] ?>">
                        Заболевания опорно-двигательного аппарата?
                        <input name="opora" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['opora'] ?>">
                        Максимальные расстояния:
                        <input name="perenosimost" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?>
                            value="<?= $data['perenosimost'] ?>">
                        Переносимость сложных маршрутов с перепадами высоты:
                        <input name="level" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['level'] ?>">
                        Готовность проходить в среднем 15 - 20 км:
                        <input name="prohod" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['prohod'] ?>">
                        Переносимость сложных маршрутов:
                        <input name="perenosimostGori" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?>
                            value="<?= $data['perenosimostGori'] ?>">
                        Только равнинные маршруты:
                        <input name="ravn" type="text" class="change-form-input  "<?php echo isset($data) ? "disabled" : "";?> value="<?= $data['ravn'] ?>">
                        <input type="submit" id="sendDataBtn" value="Отправить" class="modal-form-btn"
                            style="cursor:pointer; text-align: center;">
                    </form>

            </div>

                <div id="myTour" class="content-section">
                        <div class="tours-container">

                            <h3 class="tours-title">Мои туры ✈️</h3>
                            <div class="tours-grid">
                                <?php foreach ($tours as $tour) { ?>

                                    <div class="tour-card">
                                        <div class="tour-image-wrapper">
                                            <img src="../<?= $tour['tour_imgSrc'] ?>" alt="Горный поход" class="tour-image">

                                        </div>
                                        <div class="tour-content">
                                            <h4 class="tour-name"><?= $tour['tour_name'] ?></h4>
                                            <div class="tour-meta">
                                                <span class="tour-date">📅 <?= $tour['tour_date'] ?></span>
                                                <span class="tour-price">💵 24 900 ₽</span>
                                            </div>
                                            <a href="../<?= $tour['tour_linkPage'] ?>" class="tour-button">Подробнее →</a>
                                        </div>
                                    </div>
                                    <?php }?>
                              
                                <!-- Тур 2 -->

                            </div>
                        </div>
                    </div>

            </main>

    </div>

    
<div class="mobile-nav" id="mobileNav">
    <a href="#anceta" class="mobile-nav-link" data-target="anceta">
        <i class="fas fa-clipboard-list"></i>
        <span>Анкета</span>
    </a>
    <a href="#myTour" class="mobile-nav-link" data-target="myTour">
        <i class="fas fa-plane"></i>
        <span>Туры</span>
    </a>
    <a href="#" class="mobile-nav-link" data-target="excursions">
        <i class="fas fa-map-marked-alt"></i>
        <span>Экскурсии</span>
    </a>
    <a href="php/logout.php" class="mobile-nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>Выход</span>
    </a>
</div>
    <script src="../js/get_info_user.js"></script>
</body>

</html>
