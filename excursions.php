<?php
session_start();
require_once 'phpLogin/connect.php'; // Подключение к базе данных
require_once 'getDATA/getAncetaData.php';
require_once 'getDATA/getUserData.php';
require_once 'parts/formEx.php';

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
            m[i].l = 1 * new Date(); k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(89691443, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/89691443" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description"
        content="Сканди-путешествия и экскурсии по Москве, Московской области, России и странам СНГ, зарубеж!">
    <link rel="stylesheet" href="style/clear.css">
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">
    <link rel="icon" sizes="120x120" href="img/icon.svg" type="image/svg+xml">

    <script defer src="js/scroll.js"></script>
    <title>Сканди-экскурсии</title>
</head>

<body>
    <header class="header" id="header">

        <?php include 'parts/headerPHP.php'; ?>

    </header>

    <section class="excursions">
        <div class="container">
            <h1 class="excursions__title">Сканди-мероприятия</h1>
            <ul class="excursions__list" id="excursions-list">
                <?php
                // Загружаем экскурсии из БД
                $excursions = [];
                $tableCheck = $connect->query("SHOW TABLES LIKE 'excursions'");
                if ($tableCheck && $tableCheck->num_rows > 0) {
                    require_once __DIR__ . '/admin/functions/tour_helpers.php';
                    $query = "SELECT * FROM excursions";
                    $result = $connect->query($query);
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $excursions[] = $row;
                        }
                        // Сортировка по дате по возрастанию (поддержка форматов "6 декабря 2025г" и Y-m-d)
                        if (function_exists('parse_excursion_date_for_sort')) {
                            usort($excursions, function ($a, $b) {
                                $d1 = parse_excursion_date_for_sort($a['excursion_date'] ?? null);
                                $d2 = parse_excursion_date_for_sort($b['excursion_date'] ?? null);
                                return strcmp($d1, $d2);
                            });
                        }
                    }
                }
                
                // Если нет экскурсий в БД, показываем заглушку или ничего
                if (empty($excursions)) {
                    echo '<!-- Нет экскурсий в базе данных. Добавьте их через админ-панель. -->';
                } else {
                    foreach ($excursions as $excursion):
                        $imgSrc = !empty($excursion['excursion_imgSrc']) ? $excursion['excursion_imgSrc'] : '/img/excursion/default.jpeg';
                        if (strpos($imgSrc, '/') !== 0) $imgSrc = '/' . $imgSrc; // Убедимся, что путь абсолютный
                        
                        // Генерируем linkId из названия или используем существующий
                        if (!empty($excursion['excursion_link_id'])) {
                            $linkId = $excursion['excursion_link_id'];
                        } else {
                            require_once 'admin/functions/tour_helpers.php';
                            if (function_exists('generateTourFileName')) {
                                $linkId = basename(generateTourFileName($excursion['excursion_name']), '.php');
                            } else {
                                $linkId = 'excursion-' . $excursion['excursion_id'];
                            }
                        }
                        
                        $formTourParam = !empty($excursion['excursion_formTour_param']) 
                            ? $excursion['excursion_formTour_param'] 
                            : $excursion['excursion_name'];
                        
                        // Форматируем дату для отображения
                        $dateText = '';
                        if (!empty($excursion['excursion_date'])) {
                            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $excursion['excursion_date'])) {
                                // Если дата в формате YYYY-MM-DD, форматируем
                                $date = new DateTime($excursion['excursion_date']);
                                $months = [
                                    1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
                                    5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
                                    9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
                                ];
                                $dateText = $date->format('d') . ' ' . $months[(int)$date->format('n')] . ' ' . $date->format('Y') . 'г';
                            } else {
                                // Иначе используем как есть (текстовое поле)
                                $dateText = htmlspecialchars($excursion['excursion_date']);
                            }
                        }
                        $timeText = !empty($excursion['excursion_time']) ? '<br><strong>НАЧАЛО: ' . htmlspecialchars($excursion['excursion_time']) . '</strong>' : '';
                ?>
                <li class="excursions__item" onclick="expandCard(this)" id="<?php echo htmlspecialchars($linkId); ?>">
                    <img style="object-position: 50% 50%;" class="excursions__img" src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($excursion['excursion_name']); ?>">
                    <div class="excursions__info">
                        <h2 class="excursions__info__title"><?php echo htmlspecialchars($excursion['excursion_name']); ?></h2>
                        <hr>
                        <p class="excursions__info__date"><?php echo $dateText . $timeText; ?></p>
                        <hr>
                        <?php if (!empty($excursion['excursion_description'])): ?>
                        <div class="excursions__info__description">
                            <?php echo $excursion['excursion_description']; ?>
                        </div>
                        <?php endif; ?>
                        <div class="excursions__details">
                            <?php if (!empty($excursion['excursion_details'])): ?>
                            <div class="excursions__details__desc">
                                <?php echo $excursion['excursion_details']; ?>
                            </div>
                            <?php endif; ?>
                            <hr>
                            <?php if (!empty($excursion['excursion_price']) || !empty($excursion['excursion_price_included']) || !empty($excursion['excursion_price_additional'])): ?>
                            <div class="excursions__price">
                                <?php if (!empty($excursion['excursion_price'])): ?>
                                <div class="excursions__price-title">Стоимость</div>
                                <div class="excursions__price-amounts">
                                    <?php
                                    // Проверяем, является ли это HTML из Quill редактора
                                    if (strip_tags($excursion['excursion_price']) !== $excursion['excursion_price']) {
                                        // Это HTML, выводим как есть
                                        echo '<div class="excursions__price-amount">' . $excursion['excursion_price'] . '</div>';
                                    } else {
                                        // Это обычный текст, обрабатываем построчно
                                        $priceLines = explode("\n", $excursion['excursion_price']);
                                        foreach ($priceLines as $priceLine):
                                            $priceLine = trim($priceLine);
                                            if (!empty($priceLine)):
                                        ?>
                                        <div class="excursions__price-amount"><?php echo nl2br(htmlspecialchars($priceLine)); ?></div>
                                        <?php
                                            endif;
                                        endforeach;
                                    }
                                    ?>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($excursion['excursion_price_included'])): ?>
                                <div class="excursions__price-included"><?php echo $excursion['excursion_price_included']; ?></div>
                                <?php endif; ?>
                                <?php if (!empty($excursion['excursion_price_additional'])): ?>
                                <div class="excursions__price-additional"><?php echo $excursion['excursion_price_additional']; ?></div>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <?php endif; ?>
                            <br>
                            <a class="excursions__link" onclick="event.stopPropagation();" data-name="<?php echo htmlspecialchars($formTourParam); ?>" data-id="<?php echo htmlspecialchars($linkId); ?>">Записаться</a>
                        </div>
                    </div>
                </li>
                <?php
                    endforeach;
                }
                ?>
            </ul>

        </div>
    </section>

    <section class="questions" id="questions">
        <script src="parts/questions.js?ver=<? echo time(); ?>"></script>
    </section>

    <section class="contacts" id="contacts">
        <script src="parts/contact.js?ver=<? echo time(); ?>"></script>
    </section>


    <!-- Модальные   ------------------------------------>
    <!-- <div onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на Сканди-мерориятие</h3>
                    <button class="modal-form-btn btn-auto" id="btnAuto">Автозаполнение</button>
                    <button title="Close" class="close">×</button>
                </div>
                <div class="modal-b">

                    <form action="" method="POST" id="exForm" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" id="fio" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" id="age" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" id="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" id="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" id="btn" class="modal-form-btn">

                        <a href="#" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <?php formEx(); ?>

    <footer class="footer"></footer>
    <script>
        <?php if ($_SESSION["user_id"] != '') { ?>
            let anceta = <?= json_encode($ancetaData); ?>[0];
            let fio = '<?= $user['user_familia'] . ' ' . $user['user_name'] . ' ' . $user['user_otch'] ?>';
            let email = '<?= $user['user_email'] ?>';
        <?php } ?>
    </script>
    <script src="js/anceta.js"></script>
    <!-- <script src="js/regEx.js?ver=<? echo time(); ?>"></script> -->
    <script defer src="parts/exForm.js?ver=<? echo time(); ?>"></script>
    <script defer src="js/ex.js?ver=<? echo time(); ?>"></script>
    <script src="parts/footer.js?ver=<? echo time(); ?>"></script>
    <script src="modal/bootstrap.bundle.js"></script>

    <!-- <script src="modal/modal.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>



</body>

</html>
    <!-- <script src="modal/modal.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>



</body>


</html>
    <!-- <script src="modal/modal.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>



</body>


</html>