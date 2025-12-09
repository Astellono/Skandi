<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/getDATA/getUserData.php';


?>
<style>
    .acc__link i {
        margin-right: 8px;
    }

    .acc__item:last-child .acc__link {
        color: #ff4444;
        /* красный цвет для кнопки выхода */
        transition: opacity 0.3s;
    }

    .acc__item:last-child .acc__link:hover {
        opacity: 0.8;
    }

    .admin-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
        margin: 5px 0;
    }

    .admin-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    .admin-btn i {
        font-size: 16px;
    }

    .admin-btn-mobile {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 10px 16px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
        margin: 8px 0;
        width: 100%;
        justify-content: center;
    }

    .admin-btn-mobile:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    .header__link.admin-link {
        color: #667eea;
        font-weight: 600;
        position: relative;
    }

    .header__link.admin-link:hover {
        color: #764ba2;
    }

    .header__link.admin-link i {
        margin-right: 6px;
    }
</style>
<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

} ?>
<div class="container__header">
    <div class="header__contant">
        <div class="header__logo">
            <a href="/index.php">
                <img src="/img/header/logo.svg" alt="" srcset="">
            </a>
        </div>
        <ul class="header__menu ">
            <li class="header__item header__burger-cross ">
                <img class="header__cross-img" src="/img/header/cross.png" alt="">
            </li>
            <li class="header__item">
                <a href="/index" class="header__link">
                    О нас
                </a>
            </li>
            <li class="header__item">
                <a href="/menu" class="header__link">
                    Сканди-активности
                </a>
            </li>
            <li class="header__item">
                <a href="/shop" class="header__link">
                    Товары
                </a>
            </li>
            <li class="header__item">
                <a href="/video" class="header__link">
                    Медиа
                </a>
            </li>
            <?php if (isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] === 7): ?>
            <li class="header__item">
                <a href="/admin/admin.php" class="header__link admin-link">
                    </i> Админ
                </a>
            </li>
            <?php endif; ?>
            <li class="header__item  header__mobile-auth">

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <button class="login-btn-mobile"  id="loginBtnMobile" data-bs-toggle="modal"
                        data-bs-target="#authModal">Войти в аккаунт</button>
                <?php else: ?>
                    <div class="acc__block-mobile">
                        <div class="acc__ava__box-mobile">
                            <?php
                            $mobileUserId = (int) ($_SESSION['user_id'] ?? 0);
                            $mobileAvatar = $_SERVER['DOCUMENT_ROOT'] .'uploads/avatars/' . $mobileUserId . '.jpg';
                            $mobileBaseDir = $_SERVER['DOCUMENT_ROOT'];
                            if (!file_exists($mobileBaseDir . $mobileAvatar)) {
                                $mobileCandidates = ['png', 'webp'];
                                $mobileFound = false;
                                foreach ($mobileCandidates as $ext) {
                                    $mobileCandidate = '/uploads/avatars/' . $mobileUserId . '.' . $ext;
                                    if (file_exists($mobileBaseDir . $mobileCandidate)) {
                                        $mobileAvatar = $mobileCandidate;
                                        $mobileFound = true;
                                        break;
                                    }
                                }
                                if (!$mobileFound) {
                                    // Fallback to default placeholder
                                    $mobileDefaultAvatar = $_SERVER['DOCUMENT_ROOT'] .'uploads/avatars/default.png';
                                    $mobileAvatar = file_exists($mobileBaseDir . $mobileDefaultAvatar) ? $mobileDefaultAvatar : '/img/icon.svg';
                                }
                            }
                            ?>
                            <img class="acc__ava-mobile"
                                src="<?php echo htmlspecialchars($mobileAvatar); ?>?v=<?php echo time(); ?>" alt="avatar">
                        </div>
                        <a href="/lk/lk.php"
                            class="acc__link-mobile"><?php echo htmlspecialchars($user['user_name'] ?? 'Аккаунт'); ?></a>
                        <a href="/phpLogin/logout.php" class="acc__link-mobile acc__logout-mobile">
                            <i class="fas fa-sign-out-alt"></i> Выход
                        </a>
                    </div>
                <?php endif; ?>
            </li>
        </ul>
        <div class="header__burger">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 24 24">
                <path
                    d="M3.5,7 C3.22385763,7 3,6.77614237 3,6.5 C3,6.22385763 3.22385763,6 3.5,6 L20.5,6 C20.7761424,6 21,6.22385763 21,6.5 C21,6.77614237 20.7761424,7 20.5,7 L3.5,7 Z M3.5,12 C3.22385763,12 3,11.7761424 3,11.5 C3,11.2238576 3.22385763,11 3.5,11 L20.5,11 C20.7761424,11 21,11.2238576 21,11.5 C21,11.7761424 20.7761424,12 20.5,12 L3.5,12 Z M3.5,17 C3.22385763,17 3,16.7761424 3,16.5 C3,16.2238576 3.22385763,16 3.5,16 L20.5,16 C20.7761424,16 21,16.2238576 21,16.5 C21,16.7761424 20.7761424,17 20.5,17 Z" />
            </svg>
        </div>

        <div class="header__contacts">

            <?php if (!isset($_SESSION['user_id'])): ?>
                <button class="login-btn " id="loginBtn" data-bs-toggle="modal" data-bs-target="#authModal">Войти в
                    аккаунт</button>
            <?php else: ?>
                <ul class="acc__block">
                    <li class="acc__item">
                        <div class="acc__ava__box">
                            <?php


                            $headerUserId = (int) ($_SESSION['user_id'] ?? 0);
                            $headerAvatar = $_SERVER['DOCUMENT_ROOT'] . '/uploads/avatars/' . $headerUserId . '.jpg';

                            $baseDir = $_SERVER['DOCUMENT_ROOT'];
                            if (!file_exists($baseDir . $headerAvatar)) {
                                $candidates = ['png', 'webp'];
                                $found = false;
                                foreach ($candidates as $ext) {
                                    $candidate =  '/uploads/avatars/' . $headerUserId . '.' . $ext;
                                    if (file_exists($baseDir . $candidate)) {
                                        $headerAvatar = $candidate;
                                        $found = true;
                                        break;
                                    }
                                }
                                if (!$found) {
                                    // Fallback to default placeholder
                                    $defaultAvatar =$_SERVER['DOCUMENT_ROOT'] . 'uploads/avatars/default.png';
                                    $headerAvatar = file_exists($baseDir . $defaultAvatar) ? $defaultAvatar : '/img/icon.svg';
                                }
                            }
                            ?>
                            <img class="acc__ava"
                                src="<?php echo htmlspecialchars($headerAvatar); ?>?v=<?php echo time(); ?>" alt="avatar">
                        </div>
                    </li>
                    <li class="acc__item">

                        <a href="/lk/lk.php"
                            class="acc__link"><?php echo htmlspecialchars($user['user_name'] ?? 'Акаунт'); ?></a>
                    </li>
                    <li class="acc__item">
                        <a href="/phpLogin/logout.php" class="acc__link">
                            <i class="fas fa-sign-out-alt"></i> Выход
                        </a>
                       
                    </li>
                </ul>
            <?php endif; ?>
                       


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

        </div>


    </div>
    <script src="/modal/Burger.js"></script>
    <script>

    </script>
    <?php
    // Автоматически подключаем модальное окно авторизации на всех страницах
    $authModalPath = __DIR__ . '/auth_modal_include.php';
    if (file_exists($authModalPath)) {
        include $authModalPath;
    }
    ?>