<?php
session_start();
// require_once 'phpLogin/connect.php';
$user_id = $_SESSION['user_id'];


$user_query = $connect->query("SELECT * FROM users WHERE id = '$user_id'");
$user_data = $user_query->fetch_assoc();
?>
<div class="container__header">
    <div class="header__contant">
        <div class="header__logo">
            <a href="/index.php">
                <img src="/img/header/logo.svg" alt="" srcset="">
            </a>
        </div>
        <ul class="header__menu">
            <li class="header__item header__burger-cross ">
                <img class="header__cross-img" src="/img/header/cross.png" alt="">
            </li>
            <li class="header__item">
                <a href="/index.php" class="header__link">
                    О нас
                </a>
            </li>
            <li class="header__item">
                <a href="/menu.php" class="header__link">
                    Сканди-активности
                </a>
            </li>
            <li class="header__item">
                <a href="/shop.php" class="header__link">
                    Товары
                </a>
            </li>
            <li class="header__item">
                <a href="/video.php" class="header__link">
                    Медиа
                </a>
            </li>
        </ul>
        <div class="header__burger">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 24 24">
                <path
                    d="M3.5,7 C3.22385763,7 3,6.77614237 3,6.5 C3,6.22385763 3.22385763,6 3.5,6 L20.5,6 C20.7761424,6 21,6.22385763 21,6.5 C21,6.77614237 20.7761424,7 20.5,7 L3.5,7 Z M3.5,12 C3.22385763,12 3,11.7761424 3,11.5 C3,11.2238576 3.22385763,11 3.5,11 L20.5,11 C20.7761424,11 21,11.2238576 21,11.5 C21,11.7761424 20.7761424,12 20.5,12 L3.5,12 Z M3.5,17 C3.22385763,17 3,16.7761424 3,16.5 C3,16.2238576 3.22385763,16 3.5,16 L20.5,16 C20.7761424,16 21,16.2238576 21,16.5 C21,16.7761424 20.7761424,17 20.5,17 L3.5,17 Z" />
            </svg>
        </div>
        <div class="header__contacts">
            <?php if ($user_id == '') {
                ?>
                <button class="login-btn" id="loginBtn">Войти в аккаунт</button>
            <?php } else { ?>
                <ul class="acc__block">
                    <li class="acc__item">
                        <div class="acc__ava__box">
                            <img class="acc__ava" src="<?= $user_data['avatar_path'] ?>">
                        </div>
                    </li>
                    <li class="acc__item">
                        <a href="lk/lk.php" class="acc__link"><?= $user_data['email'] ?></a>
                    </li>
                </ul>

            <?php } ?>

                <hr style="margin: 10px 0;">
            <ul class="header__soc-list">
                <li class="header__soc-item">
                    <a href="tel: +79162027390" class="header__soc-link" target="_blank">
                        <img class="header__soc-icon" src="/img/header/phone.svg" alt="">
                    </a>
                </li>
                <li class="header__soc-item">
                    <a href="https://vk.com/pomiru_spalkami" class="header__soc-link" target="_blank">
                        <img class="header__soc-icon" src="/img/header/vk.svg" alt="">
                    </a>
                </li>
                <a href="https://t.me/pomiruspalkami" class="header__soc-link" target="_blank">
                    <img class="header__soc-icon" src="/img/header/telega.svg" alt="">
                </a>
                </li>
            </ul>
            </ul>
        </div>
    </div>